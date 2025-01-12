<?php 

require_once __DIR__ . '/../../vendor/autoload.php';

require_once '../../load.php';

if(session_status() === PHP_SESSION_NONE){
    session_start();
    
};

use public\Classes\{
    Model
};

$data = $_POST;
$new_name = trim($data['new_name']);
$user_id = $_SESSION['user_id'];

if (empty($new_name)) 
{ 
    $_SESSION['error_update'] = 'You need to write something to update your name'; 
    header('location:profile.php'); 
    exit; }

$qry = "UPDATE `pst_users` SET `name` = ? WHERE `id` = ?";

$res = Model::$db->prepare($qry);

$res->bind_param("si" , $new_name , $user_id);

$_SESSION['username'] = $new_name;

if ($res->execute()) {
     $_SESSION['username'] = $new_name; 

    $_SESSION['success_update'] = 'Name updated successfully';
 } else{ 
    $_SESSION['error_update'] = 'Failed to update name';
}

header('location:profile.php');