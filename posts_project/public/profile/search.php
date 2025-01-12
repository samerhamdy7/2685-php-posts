<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../../load.php';

$data = $_POST;

use public\Classes\ {
    Model
};

$search_name = isset($data['search_name']) ? $data['search_name'] : '' ;
$search_roles = isset($data['search_role']) ? $data['search_role'] : '' ;

$qry = "SELECT * FROM `pst_users` WHERE 1=1";

if ($search_name) {
    $qry .= " AND `name` LIKE '%" . Model::$db->real_escape_string($search_name) . "%'";
}

if ($search_roles) {
    $qry .= " AND `roles` = '" . Model::$db->real_escape_string($search_roles) . "'";
}

$res = Model::$db->query($qry);



?>
