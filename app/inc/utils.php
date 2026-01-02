<?php

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function app_title(): string
{
    return 'PHP MariaDB Boilerplate';
}
