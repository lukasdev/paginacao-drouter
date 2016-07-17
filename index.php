<?php
    require 'vendor/autoload.php';

    $app = new DRouter\App();
    $app->render->setViewsFolder(__DIR__.'/views/');
    
    $app->get('/', 'DownsMaster\Controllers\HomeController:index')->setName('home');

    $app->run();