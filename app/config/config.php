<?php

$env = getenv('APP_ENV');
$env = strtolower($env);

// Production server
$config = array(
    'db' => array(
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'paasing',
        'user' => 'root',
        'password' => 'vagrant',
        'ruckus_type' => 'mysql',
        'port' => 3306,
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
    $config['db'] = array(
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'paasing',
        'user' => 'root',
        'password' => 'vagrant',
        'ruckus_type' => 'mysql',
        'port' => 3306,
    );
}

return $config;
