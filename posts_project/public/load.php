<?php 

session_start();

    function dd($item, $die= true) {
        echo '<pre>';
        var_dump($item);
        echo '</pre>';

        if($die){
            die();
        }
    };

$db = new mysqli('localhost', 'root', '' , '2685_php_posts');
require 'classes/Post.php';

require 'classes/Status.php';

require 'classes/User.php';

require 'classes/Comments.php';

require 'classes/Replies.php';

