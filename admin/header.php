<?php
// include/header.php — included at top of every protected page
// Call requireLogin() BEFORE including this file.
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle ?? 'Admin Panel') ?> – Infosoft Network</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@300;400;500&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
/* ══════════════════════════════════════════════════════════════════
   GLOBAL RESET & VARIABLES
══════════════════════════════════════════════════════════════════ */
:root {
    --orange:   #ff5900;
    --orange-d: #d94d00;
    --bg:       #f4f6f9;
    --surface:  #ffffff;
    --surface2: #f8f9fb;
    --border:   #e2e6ed;
    --text:     #1a1a2e;
    --muted:    #7a8499;
    --green:    #16a34a;
    --red:      #dc3545;
}
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body {
    background: var(--bg);
    color: var(--text);
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    line-height: 1.6;
    min-height: 100vh;
}

/* ── SUBTLE BG GRID ── */
body::before {
    content: '';
    position: fixed; inset: 0;
    background-image:
        linear-gradient(rgba(255,89,0,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,89,0,0.03) 1px, transparent 1px);
    background-size: 48px 48px;
    pointer-events: none; z-index: 0;
}

/* ══════════════════════════════════════════════════════════════════
   HEADER
══════════════════════════════════════════════════════════════════ */
.site-header {
    position: sticky; top: 0; z-index: 200;
    background: #ffffff;
    border-bottom: 1px solid var(--border);
    box-shadow: 0 1px 8px rgba(0,0,0,0.06);
}
.header-inner {
    max-width: 1300px; margin: 0 auto;
    padding: 0 32px;
    height: 62px;
    display: flex; align-items: center; justify-content: space-between; gap: 20px;
}

/* Logo */
.header-logo {
    display: flex; align-items: center; gap: 10px;
    text-decoration: none; flex-shrink: 0;
}
.header-logo img { height: 30px; }
.header-logo-text {
    font-family: 'Syne', sans-serif;
    font-weight: 700; font-size: 17px;
    color: var(--text); white-space: nowrap;
}
.header-logo-text span { color: var(--orange); }

/* Nav links */
.header-nav {
    display: flex; align-items: center; gap: 4px;
    list-style: none;
}
.header-nav a {
    display: flex; align-items: center; gap: 6px;
    font-size: 13px; font-weight: 400;
    color: var(--muted); text-decoration: none;
    padding: 7px 14px;
    border: 1px solid transparent;
    transition: color 0.2s, border-color 0.2s, background 0.2s;
    white-space: nowrap;
}
.header-nav a:hover {
    color: var(--text);
    background: var(--surface2);
    border-color: var(--border);
}
.header-nav a.active {
    color: var(--orange);
    border-color: rgba(255,89,0,0.2);
    background: rgba(255,89,0,0.05);
}
.header-nav .nav-icon { font-size: 14px; }

/* Contact info strip */
.header-contacts {
    display: flex; align-items: center; gap: 20px;
    flex-shrink: 0;
}
.header-contact-item {
    display: flex; align-items: center; gap: 6px;
    font-family: 'DM Mono', monospace;
    font-size: 11px; color: var(--muted);
    text-decoration: none;
    transition: color 0.2s;
    white-space: nowrap;
}
.header-contact-item:hover { color: var(--orange); }
.header-contact-item .ci-icon { font-size: 13px; }
.header-divider {
    width: 1px; height: 22px;
    background: var(--border); flex-shrink: 0;
}

/* Logout btn */
.btn-logout {
    display: inline-flex; align-items: center; gap: 6px;
    font-family: 'DM Mono', monospace;
    font-size: 10px; letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--muted);
    background: transparent;
    border: 1px solid var(--border);
    padding: 7px 14px; cursor: pointer;
    text-decoration: none;
    transition: color 0.2s, border-color 0.2s, background 0.2s;
    white-space: nowrap;
}
.btn-logout:hover {
    color: var(--red);
    border-color: var(--red);
    background: rgba(220,53,69,0.05);
}

/* ══════════════════════════════════════════════════════════════════
   PAGE WRAPPER
══════════════════════════════════════════════════════════════════ */
.page-wrap {
    position: relative; z-index: 1;
    max-width: 1300px; margin: 0 auto;
    padding: 36px 32px 60px;
}

/* Page title bar */
.page-title-bar {
    display: flex; align-items: flex-end; justify-content: space-between;
    gap: 16px; margin-bottom: 28px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--border);
}
.page-title-bar h1 {
    font-family: 'Syne', sans-serif;
    font-weight: 700; font-size: 26px;
    color: var(--text); line-height: 1.1;
}
.page-title-bar h1 span { color: var(--orange); }
.page-breadcrumb {
    font-family: 'DM Mono', monospace;
    font-size: 10px; letter-spacing: 0.15em;
    text-transform: uppercase; color: var(--muted);
    margin-bottom: 5px;
}

/* ══════════════════════════════════════════════════════════════════
   SHARED TABLE STYLES
══════════════════════════════════════════════════════════════════ */
.table-card {
    background: var(--surface);
    border: 1px solid var(--border);
    box-shadow: 0 2px 12px rgba(0,0,0,0.05);
    overflow: hidden;
}
.table-toolbar {
    padding: 16px 20px;
    display: flex; align-items: center; justify-content: space-between;
    gap: 12px; border-bottom: 1px solid var(--border);
    flex-wrap: wrap;
    background: var(--surface2);
}
.table-toolbar-title {
    font-family: 'DM Mono', monospace;
    font-size: 11px; letter-spacing: 0.12em;
    text-transform: uppercase; color: var(--muted);
    display: flex; align-items: center; gap: 8px;
}
.table-toolbar-title strong {
    background: var(--orange);
    color: #fff; font-size: 10px;
    padding: 2px 7px; font-style: normal;
    font-family: 'DM Mono', monospace;
}

/* Search input */
.tbl-search {
    background: var(--surface);
    border: 1px solid var(--border);
    color: var(--text);
    font-family: 'DM Sans', sans-serif;
    font-size: 13px; padding: 8px 14px;
    outline: none; width: 220px;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.tbl-search:focus {
    border-color: var(--orange);
    box-shadow: 0 0 0 3px rgba(255,89,0,0.08);
}
.tbl-search::placeholder { color: #bbc2ce; }

.table-scroll { overflow-x: auto; }
table {
    width: 100%; border-collapse: collapse;
    font-size: 13.5px;
}
thead th {
    background: var(--surface2);
    padding: 12px 16px;
    text-align: left;
    font-family: 'DM Mono', monospace;
    font-size: 10px; letter-spacing: 0.12em;
    text-transform: uppercase; color: var(--muted);
    font-weight: 500;
    border-bottom: 2px solid var(--border);
    white-space: nowrap;
}
tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background 0.15s;
}
tbody tr:last-child { border-bottom: none; }
tbody tr:hover { background: #fff8f5; }
tbody td {
    padding: 13px 16px;
    color: var(--text);
    vertical-align: middle;
}
.td-mono {
    font-family: 'DM Mono', monospace;
    font-size: 12px; color: var(--muted);
}
.td-name { font-weight: 500; }
.td-email { color: var(--muted); font-size: 13px; }
.td-phone { font-family: 'DM Mono', monospace; font-size: 12.5px; }

/* Row number badge */
.row-num {
    display: inline-flex; align-items: center; justify-content: center;
    width: 26px; height: 26px;
    background: var(--surface2); border: 1px solid var(--border);
    font-family: 'DM Mono', monospace;
    font-size: 10px; color: var(--muted);
}

/* ── View Buttons ── */
.btn-view {
    display: inline-flex; align-items: center; gap: 6px;
    font-family: 'DM Mono', monospace;
    font-size: 10px; letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 7px 14px; border: none; cursor: pointer;
    transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
    font-weight: 500;
}
.btn-view:hover {
    opacity: 0.88;
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(0,0,0,0.12);
}
.btn-view.unread { background: var(--red);   color: #fff; }
.btn-view.read   { background: var(--green); color: #fff; }

/* Status badge */
.badge {
    display: inline-flex; align-items: center; gap: 5px;
    font-family: 'DM Mono', monospace;
    font-size: 10px; letter-spacing: 0.06em;
    text-transform: uppercase; padding: 3px 10px;
}
.badge-new  { background: rgba(220,53,69,0.08);  color: var(--red);   border: 1px solid rgba(220,53,69,0.2);  }
.badge-read { background: rgba(22,163,74,0.08);  color: var(--green); border: 1px solid rgba(22,163,74,0.18); }
.badge-dot  { width: 5px; height: 5px; border-radius: 50%; background: currentColor; }

/* Empty state */
.table-empty {
    text-align: center; padding: 60px 20px;
    color: var(--muted); font-size: 14px;
}
.table-empty-icon { font-size: 36px; display: block; margin-bottom: 12px; }

/* ══════════════════════════════════════════════════════════════════
   MODAL
══════════════════════════════════════════════════════════════════ */
.modal-overlay {
    display: none;
    position: fixed; inset: 0; z-index: 1000;
    background: rgba(26,26,46,0.45);
    backdrop-filter: blur(4px);
    align-items: center; justify-content: center;
    padding: 20px;
}
.modal-overlay.active { display: flex; }

.modal {
    background: var(--surface);
    border: 1px solid var(--border);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    width: 100%; max-width: 560px;
    max-height: 90vh;
    overflow-y: auto;
    animation: modal-in 0.25s cubic-bezier(0.16,1,0.3,1) both;
}
@keyframes modal-in {
    from { opacity: 0; transform: scale(0.96) translateY(12px); }
    to   { opacity: 1; transform: none; }
}
.modal-header {
    padding: 20px 24px 18px;
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; justify-content: space-between; gap: 12px;
    position: sticky; top: 0;
    background: var(--surface); z-index: 2;
}
.modal-title {
    font-family: 'Syne', sans-serif;
    font-weight: 700; font-size: 18px;
    color: var(--text);
    display: flex; align-items: center; gap: 10px;
}
.modal-close {
    width: 32px; height: 32px;
    background: var(--surface2); border: 1px solid var(--border);
    color: var(--muted); font-size: 18px;
    cursor: pointer; display: flex; align-items: center; justify-content: center;
    transition: color 0.2s, border-color 0.2s, background 0.2s;
    flex-shrink: 0; line-height: 1;
}
.modal-close:hover {
    color: var(--red);
    border-color: var(--red);
    background: rgba(220,53,69,0.05);
}
.modal-body { padding: 24px; }

.detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px; margin-bottom: 20px;
}
.detail-field { display: flex; flex-direction: column; gap: 4px; }
.detail-field.full { grid-column: 1 / -1; }
.detail-label {
    font-family: 'DM Mono', monospace;
    font-size: 10px; letter-spacing: 0.15em;
    text-transform: uppercase; color: var(--muted);
}
.detail-value {
    font-size: 14px; color: var(--text);
    background: var(--surface2); border: 1px solid var(--border);
    padding: 10px 14px; line-height: 1.5;
    word-break: break-word;
}
.detail-value.message-val {
    min-height: 80px; white-space: pre-wrap;
}

/* ══════════════════════════════════════════════════════════════════
   STATS ROW
══════════════════════════════════════════════════════════════════ */
.stats-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 16px; margin-bottom: 28px;
}
.stat-box {
    background: var(--surface);
    border: 1px solid var(--border);
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    padding: 20px 22px;
    border-top: 3px solid var(--border);
    transition: border-top-color 0.2s;
}
.stat-box:nth-child(1) { border-top-color: var(--orange); }
.stat-box:nth-child(2) { border-top-color: var(--red);    }
.stat-box:nth-child(3) { border-top-color: var(--green);  }
.stat-box-num {
    font-family: 'Syne', sans-serif;
    font-weight: 700; font-size: 34px;
    line-height: 1; color: var(--text);
    margin-bottom: 4px;
}
.stat-box-num.orange { color: var(--orange); }
.stat-box-num.red    { color: var(--red);    }
.stat-box-num.green  { color: var(--green);  }
.stat-box-label {
    font-family: 'DM Mono', monospace;
    font-size: 10px; letter-spacing: 0.12em;
    text-transform: uppercase; color: var(--muted);
}

/* ══════════════════════════════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════════════════════════════ */
@media (max-width: 768px) {
    .header-inner  { padding: 0 16px; }
    .header-contacts { display: none; }
    .page-wrap     { padding: 24px 16px 48px; }
    .detail-grid   { grid-template-columns: 1fr; }
}
@media (max-width: 480px) {
    .header-nav a span:not(.nav-icon) { display: none; }
}
</style>
</head>
<body>

<!-- ── HEADER ─────────────────────────────────────────────── -->
<header class="site-header">
    <div class="header-inner">

        <!-- Logo -->
        <a href="contacts.php" class="header-logo">
            <img src="https://www.infosoftnetwork.com/images/infosoft.png" alt="Infosoft"
                 onerror="this.style.display='none'">
            <span class="header-logo-text">Infosoft <span>Network</span></span>
        </a>

        <!-- Nav -->
        <ul class="header-nav">
            <li>
                <a href="contacts.php" class="<?= (basename($_SERVER['PHP_SELF']) === 'contacts.php') ? 'active' : '' ?>">
                    <span class="nav-icon">✉</span>
                    <span>Contacts</span>
                </a>
            </li>
        </ul>

        <!-- Contact Info + Logout -->
        <div class="header-contacts">
            
            <div class="header-divider"></div>
            <a href="mailto:info@infosoftnetwork.com" class="header-contact-item">
                <span class="ci-icon">✉</span>
                <span>info@infosoftnetwork.com</span>
            </a>
            <div class="header-divider"></div>
            <a href="logout.php" class="btn-logout">⏏ Logout</a>
        </div>

    </div>
</header>

<!-- ── PAGE CONTENT starts in the including file ─────────── -->
