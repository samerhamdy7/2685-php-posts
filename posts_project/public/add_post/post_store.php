<?php 

include '../load.php';

// save a current data
$current_post_data = $_POST;

// save a copy data 
$post_data = $_POST;

// create array to push the erreos in it 
$post_errors = [];

// insert_new_post

$new_post = [
    "user_id" => $post_data['user_id'],
    "post_status_id" => $post_data['post_status_id'],
    "title" => $post_data['title'],
    "body" => $post_data['body'],
];

$resualt = Post::post_store($new_post);

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

     header('location: ../posts/post.php?id=' . $resualt['id']);

}


