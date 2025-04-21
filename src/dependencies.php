<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dependencies
 *
 * @author JPenagos
 */

$container = $app->getContainer();

// Database connection
$container['db'] = function ($c) {
    $settings = $c->get('settings')['db'];
   /* $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'],
        $settings['user'], $settings['pass']);*/
    $pdo = new PDO("sqlsrv:Server=" . $settings['host'] . ";Database=" . $settings['dbname'],
        $settings['user'], $settings['pass']);        
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

