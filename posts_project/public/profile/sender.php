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
$sender_id = $_SESSION['user_id'];
$receiver_name = $data['receiver_name'] ?? '';
$message = $data['message'] ?? '';

if (empty($receiver_name) || empty($message)) {
    $_SESSION['error_msg'] = 'You should provide both a receiver name and a message';
    header('location: profile.php');
    exit;
}

$qry = "SELECT id, name FROM `pst_users` WHERE name = ?";
$res = Model::$db->prepare($qry);
if (!$res) {
    error_log("Prepare failed: " . Model::$db->error);
}
$res->bind_param('s', $receiver_name);
$res->execute();
$res->store_result();

error_log("Number of rows found: " . $res->num_rows);

if ($res->num_rows === 0) {
    $_SESSION['error_msg'] = 'Receiver name not found';
    header('location: profile.php');
    exit;
}

$res->bind_result($receiver_id, $receiver_name);
$res->fetch();
$res->close();


error_log("Receiver ID: " . $receiver_id);
error_log("Receiver Name: " . $receiver_name);

$qry = "INSERT INTO `pst_messages` (`sender_id`, `receiver_id`, `message`) VALUES (?, ?, ?)";
$res = Model::$db->prepare($qry);
if (!$res) {
    error_log("Prepare failed: " . Model::$db->error);
}
$res->bind_param('iis', $sender_id, $receiver_id, $message);

if ($res->execute()) {
    $_SESSION['success_msg'] = 'Message sent successfully to ' . $receiver_name;
    error_log("Message successfully inserted: Sender ID: $sender_id, Receiver ID: $receiver_id, Message: $message, Receiver Name: $receiver_name");
} else {
    $_SESSION['error_msg'] = 'Failed to send message';
    error_log("Insert error: " . Model::$db->error);
}

header('location: profile.php');
exit;
