<?php

include('include/config.php');

// ── Database Configuration ──────────────────────────────────────────────────
define('DB_HOST', $_host);
define('DB_USER', $_username);         
define('DB_PASS', $_password);             
define('DB_NAME', $_database); 

// ── Session Start ───────────────────────────────────────────────────────────
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ── PDO Connection ──────────────────────────────────────────────────────────
function getDB(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            die('<div style="font-family:sans-serif;padding:40px;color:#c00;">
                <strong>Database Connection Failed:</strong><br>' . htmlspecialchars($e->getMessage()) . '
                </div>');
        }
    }
    return $pdo;
}

// ── Auth Guard ──────────────────────────────────────────────────────────────
function requireLogin(): void {
    if (empty($_SESSION['admin_id'])) {
        header('Location: index.php');
        exit;
    }
}

// ── Helper: Format Date ─────────────────────────────────────────────────────
function formatDate(string $datetime): string {
    if (!$datetime) return '—';
    $dt = new DateTime($datetime);
    return $dt->format('d/m/Y g:i A');
}
