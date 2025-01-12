<?php

require_once __DIR__ .'/../../vendor/autoload.php';
require_once '../../load.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use public\Classes\ {
    Model
};

$user_id = $_SESSION['user_id'];

$qry = "SELECT m.*, sender.name AS sender_name, receiver.name AS receiver_name
        FROM `pst_messages` m
        JOIN `pst_users` sender ON m.sender_id = sender.id
        JOIN `pst_users` receiver ON m.receiver_id = receiver.id
        WHERE m.sender_id = ? OR m.receiver_id = ?
        ORDER BY m.timestamp DESC";
$res = Model::$db->prepare($qry);
$res->bind_param('ii', $user_id, $user_id);
$res->execute();
$result = $res->get_result();

$messages = [];
while ($message = $result->fetch_assoc()) {
    $messages[] = $message;
}
