<?php

require_once __DIR__ . '/env.php';

function db_connect()
{
    $host = env_required('DB_HOST');
    $user = env_required('DB_USER');
    $pass = env_required('DB_PASS');
    $name = env_required('DB_NAME');
    $port = (int) env_get('DB_PORT', '3306');
    $charset = env_get('DB_CHARSET', 'utf8mb4');

    $dsn = 'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $name . ';charset=' . $charset;

    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo 'DB connection failed.';
        exit;
    }

    return $pdo;
}
