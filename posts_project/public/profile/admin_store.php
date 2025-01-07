<?php

require_once __DIR__ .'/../../vendor/autoload.php';

require_once '../../load.php';

if(session_status() === PHP_SESSION_NONE){
    session_start();
};

use public\Classes\ {
Model
};

$data = $_POST;
$id = $data['user_id'] ??'';
$new_role=$data['new_role'] ??'';

if (empty($id))
 { $_SESSION['error_update'] = 'User ID cannot be empty';
     header('location: profile.php'); 
    exit;}

$count = "SELECT COUNT(*) AS id_check FROM `pst_users` WHERE id = ?;";
$res = Model::$db->prepare($count);
 $res->bind_param('i', $id);
 $res->execute();
 $res->bind_result($id_check);
 $res->fetch(); 
$res->close();
  
if ($id_check > 0) {
   
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
    };
} else{
 
    $_SESSION['id_notfound'] = 'This ID is not correct';
}

header('location: profile.php');