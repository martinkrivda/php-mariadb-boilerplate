<?php

function env_get($key, $default = null)
{
    $value = getenv($key);
    if ($value === false || $value === '') {
        return $default;
    }

    return $value;
}

function env_required($key)
{
    $value = getenv($key);
    if ($value === false || $value === '') {
        http_response_code(500);
        echo 'Missing required env var: ' . $key;
        exit;
    }

    return $value;
}
