<?php 

class Post extends Model
{
    const TABLE = 'posts';

    const SOFT_DELET = false;

    static function post_store(array $data){

        $db = new mysqli('localhost', 'root' , '' , '2685_php_posts');

        $title = $data['title'];
        $body = $data['body'];
        $user_id = $data['user_id'];
        $post_status_id = $data['post_status_id'];
        $timestamp = date('y-m-d h:m:s');

        $qry = "INSERT INTO `pst_posts` 
        (`title`, `body`, `user_id`, `post_status_id`, `created_at`, `updated_at`)
        VALUES
        ('$title' , '$body' , '$user_id', '$post_status_id' , '$timestamp' , '$timestamp')";

        $res = $db->query($qry);

        if($res){

            $new_post = $db->insert_id;

            $data['id'] = $new_post; 

            return $data;
        }
        return false;
    }

    static function user_posts($id) {

        $db = new mysqli('localhost' , 'root' , '' , '2685_php_posts');

        $qry = "SELECT * FROM `pst_posts` WHERE `user_id` = '$id';";

        $res = $db->query($qry);

        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }

    static function single_user_post($id) {

        $db = new mysqli('localhost' , 'root' , '' , '2685_php_posts');

        $qry = "SELECT * FROM `pst_posts` AS p
        JOIN 
        `pst_users` AS u 
        ON 
        p.user_id = u.id
        WHERE 
        p.user_id = '$id';";

        $res = $db->query($qry);

        return mysqli_fetch_assoc($res);
    }


} 