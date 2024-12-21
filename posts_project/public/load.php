<?php 

session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$database = '2685_php_posts';


$db = new mysqli($host , $user , $password , $database);

function dd($item){
    echo '</pre style="background: #112; color: #3f3; padding: 10px;">';
    var_dump($item);
    echo'</pre>';
};


