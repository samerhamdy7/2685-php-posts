<?php

namespace public\Classes;

class Replies {

    const TABLE = 'replies';
    const SOFT_DELET =false;

    static function user_replies($id){
        $db = new \mysqli('localhost' , 'root' , '' , '2685_php_posts');
          
        $qry = "SELECT * FROM `pst_replies` AS r 
        JOIN 
        `pst_users` AS u
        ON  
        r.user_id = u.id
        WHERE 
        r.comment_id = '$id';";

        $res = $db->query($qry);

        return mysqli_fetch_all($res, MYSQLI_ASSOC);

    }
}







