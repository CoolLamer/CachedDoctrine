<?php

// Uncomment this line if you must temporarily take down your site for maintenance.
// require '.maintenance.php';
define('WWW_DIR', __DIR__);
define('APP_DIR', WWW_DIR . '/../app');

// Let bootstrap create Dependency Injection container.
$container = require __DIR__ . '/../app/bootstrap.php';

// Run application.
$container->application->run();
