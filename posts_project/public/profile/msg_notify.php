<?php 
require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ .'/../../load.php';

use public\Classes\{
    Model
};


function unread_msg($user_id) {

    $qry = "SELECT COUNT(*) as unread_count FROM `pst_messages` WHERE `receiver_id` = ? AND `is_read` = 0";
    $res = Model::$db->prepare($qry);
    $res->bind_param('i', $user_id);
    $res->execute();
    $res->bind_result($unread_count);
    $res->fetch();
    $res->close();

    return $unread_count;
}



