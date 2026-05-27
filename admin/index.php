<?php 
session_start();
require_once 'config.php';

// Redirect if already logged in
if (!empty($_SESSION['admin_id'])) {
    header('Location: contacts.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        $error = 'Please enter both email and password.';
    } else {
        
            $email_safe = mysqli_real_escape_string($conn, $email);

            $result = mysqli_query($conn, "SELECT id, name, email, password FROM admins WHERE email = '$email_safe' and password = '".md5($password)."' LIMIT 1");
            $admin  = mysqli_fetch_assoc($result);

            if ($admin) {
                $_SESSION['admin_id']    = $admin['id'];
                $_SESSION['admin_name']  = $admin['name'];
                $_SESSION['admin_email'] = $admin['email'];
                mysqli_close($conn);
                header('Location: contacts.php');
                exit;
            } else {
                $error = 'Invalid email or password. Please try again.';
            }

            mysqli_close($conn);
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login – Infosoft Network</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@300;400;500&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root {
    --orange: #ff5900;
    --orange-dark: #d94d00;
    --bg: #f4f6f9;
    --surface: #ffffff;
    --surface2: #f8f9fb;
    --border: #e2e6ed;
    --text: #1a1a2e;
    --muted: #7a8499;
    --error: #dc3545;
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html, body { height: 100%; background: var(--bg); color: var(--text); font-family: 'DM Sans', sans-serif; }

/* BG subtle pattern */
body::before {
    content: '';
    position: fixed; inset: 0;
    background-image:
        linear-gradient(rgba(255,89,0,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,89,0,0.04) 1px, transparent 1px);
    background-size: 48px 48px;
    pointer-events: none; z-index: 0;
}
/* Top glow */
body::after {
    content: '';
    position: fixed;
    top: -10%; left: 50%; transform: translateX(-50%);
    width: 700px; height: 400px;
    background: radial-gradient(ellipse at center, rgba(255,89,0,0.07) 0%, transparent 65%);
    pointer-events: none; z-index: 0;
}

.login-wrap {
    position: relative; z-index: 1;
    min-height: 100vh;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    padding: 40px 20px;
}

.login-card {
    width: 100%; max-width: 420px;
    background: var(--surface);
    border: 1px solid var(--border);
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    padding: 48px 40px;
    animation: card-in 0.6s cubic-bezier(0.16,1,0.3,1) both;
}
@keyframes card-in {
    from { opacity: 0; transform: translateY(24px); }
    to   { opacity: 1; transform: none; }
}

/* ── LOGO ── */
.login-logo {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 36px; justify-content: center;
}
.login-logo img {
    height: 38px;
    /* NO filter — show original logo colours on white background */
    display: block;
}
.login-logo-text {
    font-family: 'Syne', sans-serif;
    font-weight: 700; font-size: 18px;
    color: var(--text);
}
.login-logo-text span { color: var(--orange); }

.login-divider {
    height: 1px; background: var(--border);
    margin-bottom: 32px;
}

.login-heading {
    font-family: 'Syne', sans-serif;
    font-weight: 700; font-size: 22px;
    color: var(--text); margin-bottom: 6px;
}
.login-sub {
    font-size: 13px; font-weight: 300;
    color: var(--muted); margin-bottom: 28px;
}

/* Error alert */
.alert-error {
    background: rgba(220,53,69,0.07);
    border: 1px solid rgba(220,53,69,0.25);
    color: var(--error);
    font-size: 13px; padding: 11px 14px;
    margin-bottom: 20px;
    display: flex; align-items: center; gap: 8px;
}
.alert-error::before { content: '⚠'; flex-shrink: 0; }

/* Form */
.form-group { margin-bottom: 18px; }
label {
    display: block;
    font-family: 'DM Mono', monospace;
    font-size: 10px; letter-spacing: 0.15em;
    text-transform: uppercase; color: var(--muted);
    margin-bottom: 8px;
}
input[type="email"],
input[type="password"] {
    width: 100%;
    background: var(--surface2);
    border: 1px solid var(--border);
    color: var(--text);
    font-family: 'DM Sans', sans-serif;
    font-size: 14px; padding: 13px 16px;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    -webkit-appearance: none;
}
input[type="email"]:focus,
input[type="password"]:focus {
    border-color: var(--orange);
    box-shadow: 0 0 0 3px rgba(255,89,0,0.10);
    background: #fff;
}
input::placeholder { color: #bbc2ce; }

/* ── LOGIN BUTTON ── */
.btn-login {
    width: 100%;
    background: var(--orange);
    color: #ffffff;
    font-family: 'DM Mono', monospace;
    font-size: 12px; letter-spacing: 0.12em;
    text-transform: uppercase;
    border: 2px solid var(--orange);
    padding: 15px;
    cursor: pointer; margin-top: 8px;
    transition: background 0.2s, border-color 0.2s, transform 0.15s, box-shadow 0.2s;
    display: flex; align-items: center; justify-content: center; gap: 8px;
    font-weight: 600;
    box-shadow: 0 4px 14px rgba(255,89,0,0.35);
}
.btn-login:hover {
    background: var(--orange-dark);
    border-color: var(--orange-dark);
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(255,89,0,0.40);
}
.btn-login:active {
    transform: translateY(0);
    box-shadow: 0 2px 8px rgba(255,89,0,0.25);
}

.login-footer {
    text-align: center; margin-top: 24px;
    font-size: 12px; color: var(--muted); font-weight: 300;
}
.login-footer a { color: var(--orange); text-decoration: none; }
.login-footer a:hover { text-decoration: underline; }
</style>
</head>
<body>
<div class="login-wrap">
    <div class="login-card">
        <div class="login-logo">
            <img src="https://www.infosoftnetwork.com/images/infosoft.png" alt="Infosoft" onerror="this.style.display='none'">
            <span class="login-logo-text">Infosoft <span>Network</span></span>
        </div>
        <div class="login-divider"></div>

        <h1 class="login-heading">Admin Login</h1>
        <p class="login-sub">Sign in to access the admin panel.</p>

        <?php if ($error): ?>
            <div class="alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email"
                       placeholder="admin@infosoftnetwork.com"
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                       required autocomplete="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"
                       placeholder="Enter your password"
                       required autocomplete="current-password">
            </div>
            <button type="submit" class="btn-login">Sign In →</button>
        </form>

        <p class="login-footer">
            Infosoft Network &mdash; <a href="https://www.infosoftnetwork.com" target="_blank">infosoftnetwork.com</a>
        </p>
    </div>
</div>
</body>
</html>
