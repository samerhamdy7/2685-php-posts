<?php 
if (session_status() === PHP_SESSION_NONE)
 { session_start(); 
}

require_once 'vendor/autoload.php';

require_once 'function.php';

if(!isset($_SESSION['token']) && strpos($_SERVER['REQUEST_URI'], 'auth/') === false) {
    
    header('Location:/auth/login.php');

}

Model::connect();

