// Simple JavaScript for Campus Map

let pins = [];
let currentPinId = null;
let isAddingPin = false;

// Load pins when page loads
window.onload = function () {
    loadPins();
};

// Load pins from JSON file
function loadPins() {
    fetch('api/get_pins.php')
        .then(response => response.json())
        .then(data => {
            pins = data;
            displayPins();
        })
        .catch(error => {
            console.error('Error loading pins:', error);
        });
}

// Display all pins on the map
function displayPins() {
    const container = document.getElementById('pins-container');
    const map = document.getElementById('campus-map');
    container.innerHTML = '';

    // Wait for map to load to get accurate dimensions
    if (map.complete) {
        renderPins();
    } else {
        map.onload = renderPins;
    }

    function renderPins() {
        pins.forEach(pin => {
            const pinElement = document.createElement('div');
            pinElement.className = 'pin';
            pinElement.style.left = pin.x + '%';
            pinElement.style.top = pin.y + '%';
            pinElement.onclick = function () {
                showPinDetails(pin.id);
            };
            container.appendChild(pinElement);
        });
    }
}

// Show pin details in modal
function showPinDetails(pinId) {
    const pin = pins.find(p => p.id === pinId);
    if (!pin) return;

    currentPinId = pinId;

    document.getElementById('pin-name').textContent = pin.name;
    document.getElementById('pin-description').textContent = pin.description;

    // Show image if exists
    const imgElement = document.getElementById('pin-image');
    if (pin.image) {
        imgElement.src = pin.image;
        imgElement.style.display = 'block';
    } else {
        imgElement.style.display = 'none';
    }

    document.getElementById('view-mode').style.display = 'block';
    if (document.getElementById('edit-mode')) {
        document.getElementById('edit-mode').style.display = 'none';
    }

    document.getElementById('modal').style.display = 'block';
}

// Close modal
function closeModal() {
    document.getElementById('modal').style.display = 'none';
    isAddingPin = false;
    currentPinId = null;
}

// Add new pin (admin only)
function addPin() {
    isAddingPin = true;
    alert('Click on the map to place a new pin');

    const mapContainer = document.getElementById('pins-container');

    mapContainer.style.pointerEvents = 'auto';
    mapContainer.style.cursor = 'crosshair';

    mapContainer.onclick = function (e) {
        if (!isAddingPin) return;

        // Get click position relative to the container
        const rect = mapContainer.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;

        // Show edit form
        document.getElementById('pin-id').value = '';
        document.getElementById('pin-x').value = x;
        document.getElementById('pin-y').value = y;
        document.getElementById('input-name').value = '';
        document.getElementById('input-description').value = '';
        document.getElementById('input-image').value = '';

        document.getElementById('view-mode').style.display = 'none';
        document.getElementById('edit-mode').style.display = 'block';
        document.getElementById('modal').style.display = 'block';

        mapContainer.style.cursor = 'default';
        mapContainer.style.pointerEvents = 'none';
        mapContainer.onclick = null;
        isAddingPin = false;
    };
}

// Delete pin (admin only)
function deletePin() {
    if (!confirm('Are you sure you want to delete this pin?')) return;

    fetch('api/delete_pin.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: currentPinId })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                closeModal();
                loadPins();
            } else {
                alert('Error deleting pin');
            }
        });
}

// Save pin (admin only)
if (document.getElementById('pin-form')) {
    document.getElementById('pin-form').onsubmit = function (e) {
        e.preventDefault();

        // Use FormData for file upload
        const formData = new FormData();
        formData.append('id', document.getElementById('pin-id').value);
        formData.append('x', document.getElementById('pin-x').value);
        formData.append('y', document.getElementById('pin-y').value);
        formData.append('name', document.getElementById('input-name').value);
        formData.append('description', document.getElementById('input-description').value);

        const imageFile = document.getElementById('input-image').files[0];
        if (imageFile) {
            formData.append('image', imageFile);
        }

        fetch('api/save_pin.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeModal();
                    loadPins();
                } else {
                    alert('Error saving pin');
                }
            });
    };
}
