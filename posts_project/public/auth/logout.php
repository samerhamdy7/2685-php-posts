<?php 

require_once '../load.php';

session_destroy();

header('location: login.php');