<?php

class Replies {
    static function all_replies(){

        $db = new mysqli('localhost' , 'root' ,'' , '2685_php_post');

        $qry = 'SELECT * FROM `pst_replies` WHERE `deleted_at` IS NULL ';

        $res = $db->query($qry);
        
        return mysqli_fetch_all($res , MYYSQLI_ASSOC);

    }

    static function user_replies($id){
        $db = new mysqli('localhost' , 'root' , '' , '2685_php_posts');
          
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