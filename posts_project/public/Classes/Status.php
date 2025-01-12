<?php
namespace public\Classes;

class Status extends Model {
    static function all_status(){

        $db = new \mysqli('localhost' , 'root' , '' , '2685_php_posts');

        $qry = 'SELECT * FROM `pst_post_statuses`';

        $res = $db->query($qry);

        return mysqli_fetch_all($res , MYSQLI_ASSOC);
    }
}