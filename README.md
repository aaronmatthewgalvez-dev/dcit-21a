# CvSU Campus Map - Simple Version

This is a simplified version of the campus map project, designed to be appropriate for DCIT 21A (Introduction to Computing) finals.

## Features

✅ **Basic Login System**
- Admin login with hardcoded credentials
- Guest access
- Simple session management

✅ **Interactive Campus Map**
- Static map image with clickable pins
- View location details in a modal
- Simple, clean interface

✅ **Admin Features**
- Add new pins by clicking on the map
- Delete existing pins
- Edit pin information

✅ **Guest Features**
- View all pins on the map
- Read location details
- Read-only access

## Technologies Used

- **HTML5** - Basic structure and forms
- **CSS3** - Simple styling (no advanced features)
- **JavaScript** - Basic DOM manipulation and fetch API
- **PHP** - Session management and authentication
- **JSON** - Data storage (no database required)

## Login Credentials

**Admin:**
- Email: `admin@cvsu.edu.ph`
- Password: `admin123`

**Guest:**
- Click "Continue as Guest" button

## File Structure

```
DCIT 21A Finals - Simple Version/
├── index.php           # Login page
├── login.php           # Login handler
├── logout.php          # Logout handler
├── main.php            # Main map page
├── css/
│   └── style.css       # Simple CSS styling
├── js/
│   └── map.js          # Basic JavaScript
├── api/
│   ├── get_pins.php    # Get all pins
│   ├── save_pin.php    # Save/update pin
│   └── delete_pin.php  # Delete pin
├── data/
│   └── pins.json       # Pin data storage
└── images/
    └── campus_map.jpg  # Campus map image
```

## Setup Instructions

1. Copy the `campus_map.jpg` from the original project to the `images/` folder
2. Make sure the `data/` folder is writable by the web server
3. Access `index.php` in your browser
4. Login as admin or guest to start using the map

## What Makes This "First Year Appropriate"

### Removed Advanced Features:
- ❌ CSS custom properties (variables)
- ❌ Backdrop filters and glassmorphism
- ❌ Complex animations and transitions
- ❌ Pan and zoom functionality
- ❌ Image upload with previews
- ❌ Advanced transform effects
- ❌ Google Fonts (using Arial instead)

### Kept Simple Features:
- ✅ Basic HTML forms
- ✅ Simple CSS with standard properties
- ✅ Basic JavaScript (fetch, DOM manipulation)
- ✅ Simple PHP sessions
- ✅ JSON file storage (no database)
- ✅ Clean, readable code

## Notes

This version demonstrates fundamental web development concepts without overwhelming complexity. It's perfect for explaining during a presentation and shows understanding of:

- HTML structure and forms
- CSS styling basics
- JavaScript event handling
- PHP session management
- AJAX/Fetch API
- JSON data format
- File I/O operations

Good luck with your finals! 🎓
