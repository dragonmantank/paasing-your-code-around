<?php

$env = getenv('APP_ENV');
$env = strtolower($env);

// Production server
$config = array(
    'db' => array(
        'driver' => 'pdo_mysql',
        'host' => '127.0.0.1',
        'dbname' => 'paasing',
        'user' => 'root',
        'password' => 'vagrant',
    ),
    'debug' => false,
);

// QA Server
if($env == 'qa') {
    // Not used right now
}

// Dev Server
if($env == 'dev') {
    $config['debug'] = true;
}

// Local development server
if($env == 'local') {
    $config['debug'] = true;
}

// Local development server
if($env == 'vagrant') {
    $config['debug'] = true;
}

return $config;
