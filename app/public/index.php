<?php

require __DIR__ . '/../inc/bootstrap.php';

$title = app_title();

?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= h($title) ?></title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
  <h1><?= h($title) ?></h1>
  <p>Procedural PHP, Nginx + PHP-FPM, Docker single image.</p>
  <button id="jquery-alert" type="button">Klikni pro alert</button>
  <ul>
    <li><a href="/health.php">/health.php</a></li>
    <li><a href="/db-check.php">/db-check.php</a></li>
  </ul>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="/assets/js/functions.js"></script>
</body>
</html>
