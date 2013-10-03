<?php

//----------------------------
// DATABASE CONFIGURATION
//----------------------------

/*

Valid types (adapters) are Postgres & MySQL:

'type' must be one of: 'pgsql' or 'mysql'

*/

if(is_file('app/config/config.php')) {
    $config = include_once 'app/config/config.php';
} else {
    $config = include_once 'www/app/config/config.php';
}

return array(
    'db' => array(
        'development' => array(
            'type'      => $config['db']['ruckus_type'],
            'host'      => $config['db']['host'],
            'port'      => $config['db']['port'],
            'database'  => $config['db']['dbname'],
            'user'      => $config['db']['user'],
            'password'  => $config['db']['password'],
            'directory' => '/',
            //'socket' => '/var/run/mysqld/mysqld.sock'
        ),
    ),
    'migrations_dir' => RUCKUSING_WORKING_BASE . DIRECTORY_SEPARATOR . 'migrations',
    'db_dir' => RUCKUSING_WORKING_BASE . DIRECTORY_SEPARATOR . 'db',
    'log_dir' => RUCKUSING_WORKING_BASE . DIRECTORY_SEPARATOR . 'logs',
    'ruckusing_base' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/ruckusing/ruckusing-migrations'
);
