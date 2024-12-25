<?php 

include '../load.php';

// save a current data
$current_post_data = $_POST;

// save a copy data 
$post_data = $_POST;

// create array to push the erreos in it 
$post_errors = [];

// Get Time For Post 
$created_at = date('y-m-d h:m:s');

// post title validate
if($post_data['title'] === ''){
    $post_errors['title_err'] = 'You Must Write Title';
};

// post body validate
if($post_data['body'] === ''){
    $post_errors['body_err'] = 'You Must Write Body';
}else {

};

// post_user_id validate 
if($post_data['user_id'] === ''){
    $post_errors['user_id_err'] = 'You Must Write Your ID';
}else {
    
}

// if no errors go to posts page
if(count($post_errors) > 0){
    
    $_SESSION['current_post_data'] = $current_post_data;

    $_SESSION['post_errors'] = $post_errors;

    header('location: add_post.php');
}else{
    
    $add_post = "INSERT INTO 

    `pst_posts` (`title` , `body` , `user_id` , `post_status_id` , `created_at`) 

    VALUES

    ('{$current_post_data['title']}', '{$current_post_data['body']}' , '{$current_post_data['user_id']}' , '{$current_post_data['status']}', '{$created_at}' )  ;";

     $db->query($add_post);

     header('location: ../posts/posts.php');

}


// dd($post_errors);