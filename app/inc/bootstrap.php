<?php

require_once __DIR__ . '/env.php';
require_once __DIR__ . '/utils.php';

error_reporting(E_ALL);
ini_set('display_errors', '0');

set_exception_handler(function ($exception) {
    error_log($exception);
    http_response_code(500);
    echo 'Internal Server Error';
});
