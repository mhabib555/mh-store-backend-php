<?php
// Load Config
$app_config = require_once '../config/app.php';
$db_config = require_once '../config/database.php';

//set constants 
define('APP_ROOT', $app_config['app_url']);

// Load Helper functions
require_once('functions/helpers.php');


//error logging
$setErrorLogging = function() use ($app_config){
    if($app_config['app_enviroment']== 'development') {
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors', FALSE);
    }

    ini_set('ignore_repeated_errors', TRUE); 
    ini_set('log_errors', TRUE); 
    ini_set('error_log',  APP_ROOT. 'system/log/error_log.php'); // Logging file path

};
$setErrorLogging();



?>