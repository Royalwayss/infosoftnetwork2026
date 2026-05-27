# Infosoft Network – PHP Admin Panel
## Setup Instructions

### 1. File Structure
```
infosoft-admin/
├── config.php          ← DB config + helpers
├── index.php           ← Login page
├── contacts.php        ← Contacts listing
├── mark_read.php       ← AJAX: mark contact as read
├── logout.php          ← Session destroy + redirect
└── include/
    ├── header.php      ← Shared header (HTML open + nav)
    └── footer.php      ← Shared footer + modal + JS
```

### 2. Database Setup
Run this SQL in phpMyAdmin or MySQL CLI:

```sql
-- Create admins table
CREATE TABLE `admins` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Create contacts table
CREATE TABLE `contacts` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `view_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert a test admin (password: Admin@123)
INSERT INTO `admins` (`name`, `email`, `password`) VALUES
('Admin', 'admin@infosoftnetwork.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Or generate your own hash in PHP:
-- echo password_hash('YourPassword', PASSWORD_BCRYPT);
```

> **Important:** Passwords use `password_hash()` / `password_verify()` (bcrypt).  
> The test hash above is for password: `password` (Laravel default test hash).  
> Generate your own: `php -r "echo password_hash('YourPassword', PASSWORD_BCRYPT);"`

### 3. Configure DB Connection
Edit `config.php`:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_db_password');
define('DB_NAME', 'your_db_name');
```

### 4. Upload to Server
Upload the `infosoft-admin/` folder to your server via FTP/cPanel File Manager.

### 5. Access
Visit: `https://yourdomain.com/infosoft-admin/`

---

## Features
- ✅ Secure login with bcrypt password verification
- ✅ Session-based authentication with guard on all pages
- ✅ Contacts table with live search filter
- ✅ Date format: dd/mm/YYYY h:i A (e.g. 27/05/2026 10:30 AM)
- ✅ Red View button = Unread | Green View button = Read
- ✅ Click View → modal popup with full contact details
- ✅ Auto-marks contact as read via AJAX on modal open
- ✅ Stats bar: Total / Unread / Read counts
- ✅ Logout clears session completely
- ✅ Responsive design matching Infosoft brand (#ff5900)
