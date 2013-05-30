<?php

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'    => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'mescourses',
        'user'      => 'root',
        'password'  => '',
        'charset'   => 'utf8',
    ),
));
