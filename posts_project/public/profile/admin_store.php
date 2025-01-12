<?php

require_once __DIR__ .'/../../vendor/autoload.php';
require_once '../../load.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use public\Classes\ {
    Model
};

$data = $_POST;
$name = $data['user_name'] ?? '';
$new_role = $data['new_role'] ?? '';

if (empty($name)) {
    $_SESSION['error_update'] = 'User name cannot be empty';
    header('location: profile.php');
    exit;
}


$qry = "SELECT id FROM `pst_users` WHERE `name` = ?";
$res = Model::$db->prepare($qry);
$res->bind_param('s', $name);
$res->execute();
$result = $res->get_result();

if ($result->num_rows > 0) {
 
    $user = $result->fetch_assoc();
    $id = $user['id'];
    
    if ($id == $_SESSION['user_id'])
     { $_SESSION['error_update'] = 'You cannot update your own role';
    header('location: profile.php'); 
    exit; }
   
    $qry = "UPDATE `pst_users` SET `roles` = ? WHERE id = ?;";
    $res = Model::$db->prepare($qry);
    $res->bind_param('si', $new_role, $id);

    if ($res->execute()) {
        $_SESSION['success_update'] = 'Role Updated Successfully';
        if ($id == $_SESSION['user_id']) {
            $_SESSION['roles'] = $new_role;
        }
    } else {
        $_SESSION['error_update'] = 'Failed to update';
    }
} else {
   
    $qry = "SELECT id FROM `pst_users` WHERE `name` LIKE ?";
    $res = Model::$db->prepare($qry);
    $search_name = "%" . $name . "%";
    $res->bind_param('s', $search_name);
    $res->execute();
    $result = $res->get_result();

    if ($result->num_rows > 0) {
    
        $_SESSION['partial_match_found'] = 'Multiple users found with similar names. Please refine your search.';
    } else {
     
        $_SESSION['id_notfound'] = 'User name not found';
    }
}

header('location: profile.php');