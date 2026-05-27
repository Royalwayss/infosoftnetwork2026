<?php
require_once 'config.php';
requireLogin();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    echo json_encode(['success' => false, 'error' => 'Invalid ID']);
    exit;
}

try {
    $db   = getDB();
    $stmt = $db->prepare('UPDATE contacts SET view_status = "1" WHERE id = ? AND view_status = "0"');
    $stmt->execute([$id]);
    echo json_encode(['success' => true, 'affected' => $stmt->rowCount()]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
