<?php 
require_once __DIR__ . '/vendor/autoload.php';

require_once 'function.php';

if (session_status() === PHP_SESSION_NONE)
 { session_start(); 
}


if(!isset($_SESSION['token']) && strpos($_SERVER['REQUEST_URI'], 'auth/') === false) {
    
    header('Location:/auth/login.php');

};

use public\Classes\{
    Model
};

Model::connect();