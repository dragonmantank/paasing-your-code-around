<?php

use Symfony\Component\HttpFoundation\Request;

$config = include_once(__DIR__.'/config/config.php');

$app['config'] = $config;
$app['debug'] = $config['debug'];

$app->register(new Silex\Provider\ServiceControllerServiceProvider())
    ->register(new Silex\Provider\UrlGeneratorServiceProvider())
    ->register(new Silex\Provider\FormServiceProvider())
    ->register(new Silex\Provider\ValidatorServiceProvider())
    ->register(new \Silex\Provider\TranslationServiceProvider())
    ->register(new Silex\Provider\SwiftmailerServiceProvider());
;

$env = getenv('APP_ENV') ?: 'prod';

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => array(
        __DIR__.'/../templates/',
    ),
    'twig.options' => array('debug' => $app['debug']),
));

$app->register(new \Silex\Provider\SessionServiceProvider(), array(
    'session.storage.save_path' => __DIR__.'/../tmp/sessions',
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => $app['config']['db']
));