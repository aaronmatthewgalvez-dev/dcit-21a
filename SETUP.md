# Quick Setup Guide

## Step 1: Check Your Files

Make sure you have these files:
```
✓ index.php
✓ login.php
✓ logout.php
✓ main.php
✓ css/style.css
✓ js/map.js
✓ api/get_pins.php
✓ api/save_pin.php
✓ api/delete_pin.php
✓ data/pins.json
✓ images/campus_map.jpg
```

## Step 2: Add the Campus Map Image

If the campus map image wasn't copied automatically:

1. Go to the original project folder
2. Copy `images/campus_map.jpg`
3. Paste it into `DCIT 21A Finals - Simple Version/images/`

**OR** use any campus map image you have and name it `campus_map.jpg`

## Step 3: Set Permissions (Linux/Mac)

```bash
chmod 755 data/
chmod 666 data/pins.json
```

## Step 4: Run the Project

### Option A: Using PHP Built-in Server
```bash
cd "DCIT 21A Finals - Simple Version"
php -S localhost:8000
```

Then open: `http://localhost:8000`

### Option B: Using XAMPP/WAMP
1. Copy the folder to `htdocs/` (XAMPP) or `www/` (WAMP)
2. Start Apache
3. Open: `http://localhost/DCIT%2021A%20Finals%20-%20Simple%20Version/`

## Step 5: Test the Login

**Admin Login:**
- Email: `admin@cvsu.edu.ph`
- Password: `admin123`

**Guest Access:**
- Click "Continue as Guest"

## Step 6: Test Admin Features

1. Login as admin
2. Click "Add New Pin"
3. Click anywhere on the map
4. Fill in the form and save
5. Click on the pin to view details
6. Try deleting a pin

## Step 7: Test Guest Features

1. Logout
2. Login as guest
3. Click on pins to view details
4. Verify you can't add or delete pins

## Troubleshooting

### Pins not showing?
- Check if `data/pins.json` exists and is readable
- Open browser console (F12) and check for errors

### Can't save pins?
- Make sure `data/` folder is writable
- Check file permissions

### Map image not showing?
- Verify `images/campus_map.jpg` exists
- Check the file path in `main.php`

### Session issues?
- Make sure PHP sessions are enabled
- Clear browser cookies and try again

## What to Present

1. **Show the login page** - Explain the two access levels
2. **Demo guest access** - Show read-only functionality
3. **Demo admin access** - Add, view, and delete pins
4. **Explain the code** - Be ready to walk through:
   - How login works (`login.php`)
   - How pins are stored (`data/pins.json`)
   - How JavaScript loads pins (`js/map.js`)
   - How the modal works (`main.php`)

## Final Checklist

- [ ] All files are in place
- [ ] Campus map image is added
- [ ] Can login as admin
- [ ] Can login as guest
- [ ] Can add pins (admin)
- [ ] Can view pins (both)
- [ ] Can delete pins (admin)
- [ ] Understand how the code works
- [ ] Ready to explain during presentation

Good luck! 🎓
