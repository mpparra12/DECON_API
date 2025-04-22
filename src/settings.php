<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of settings
 *
 * @author JPenagos
 */
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
         // Database connection settings           
          "db" => [
            "host" => "sql5080.site4now.net",
            "dbname" => "db_a4aa56_decon",
            "user" => "db_a4aa56_decon_admin",
            "pass" => "Paulita1"
        ]
    ],
];

/*return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
         // Database connection settings           
          "db" => [
            "host" => "mysql5035.site4now.net",
            "dbname" => "db_a4aa56_api",
            "user" => "a4aa56_gonzalad",
            "pass" => "Paulita@1997"
        ]
    ],
];*/