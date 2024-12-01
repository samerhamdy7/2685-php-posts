<?php

$host = 'localhost';
$database = '2685_php_posts';
$user = 'root';
$password = '';

$db = new mysqli($host, $user, $password, $database);

var_dump($db);