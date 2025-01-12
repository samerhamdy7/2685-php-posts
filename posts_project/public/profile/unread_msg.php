<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../../load.php';

use public\Classes\Model;

session_start();
$user_id = $_SESSION['user_id'];

$qry = "UPDATE `pst_messages` SET `is_read` = 1 WHERE `receiver_id` = ? AND `is_read` = 0";
$res = Model::$db->prepare($qry);
$res->bind_param('i', $user_id);
if ($res->execute()) {
    echo "success";
} else {
    echo "error";
}
$res->close();
?>
