<?php
namespace public\Classes;

class Comments extends Model {


    const TABLE = 'comments';

    static function comments_count(){

        $db = new \mysqli ('localhost' , 'root' , '' , '2685_php-posts');

        $qry = "SELECT COUNT(*) FROM `pst_comments`";

        $res = $db->quer($qry);

        return mysqli_fetch_column($res);
    }


    static function user_comments($id){
      $db = new \mysqli ('localhost' , 'root' , '' , '2685_php_posts');

      $qry = "SELECT * FROM `pst_comments` AS c 
      JOIN
      `pst_users` AS u 
      ON
      c.user_id = u.id
      WHERE 
      c.post_id = '$id'";

      $res = $db->query($qry);

      return mysqli_fetch_all($res , MYSQLI_ASSOC);
    }

}