<?php

// Session security (i.e. session fixation)
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

// MySQL database configuration
$connectionOptions = [
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'kennwort',
    'dbname' => 'travelkids',
];

// Application/Doctrine configuration
$applicationOptions = [
    'debug_mode' => true,
];
