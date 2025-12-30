<?php

require __DIR__ . '/../inc/bootstrap.php';
require __DIR__ . '/../inc/db.php';

header('Content-Type: text/plain; charset=utf-8');

$pdo = db_connect();

try {
    $stmt = $pdo->query('SELECT 1 AS ok');
    $row = $stmt->fetch();
} catch (PDOException $e) {
    http_response_code(500);
    echo "db query failed\n";
    exit;
}

if (!isset($row['ok'])) {
    http_response_code(500);
    echo "db unexpected response\n";
    exit;
}

echo "db ok\n";
