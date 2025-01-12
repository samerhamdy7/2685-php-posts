<?php

include __DIR__ . '/../../load.php';

use public\Classes\{
    Model
};
// save the old data i ll write it into the filed
$current_data = $_POST;

// save  a copy of the user data 
$data = $_POST;

// create an empty array to push in it the errors 
$errors = [];

// First_name_validate
if (!preg_match("/^(?=.*[A-Z])[A-Za-z]{3,15}$/", $data['first_name'])) {
    $errors['first_name_err'] = 'First name must be 3-15 characters long and contain at least 1 uppercase letter.';
};

// Last_name_validate
if (!preg_match("/^(?=.*[A-Z])[A-Za-z]{3,15}$/", $data['last_name'])) {
    $errors['last_name_err'] = 'last name must be 3-15 characters long and contain at least 1 uppercase letter.';
};

// email_validate
if($data['email'] === ''){
    $errors['email_err'] = 'email is requier';
}elseif(filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false){
    $errors['email_err'] = 'Email not Accepted';
};

// mobile_validate 
if (!preg_match("/^(010|011|012|015)\d{8}$/", $data['mobile'])) {
    $errors['mobile_err'] = 'Mobile number must be 11 digits long and start with 010, 011, 012, or 015';
}

// password_validate
if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[\W]).{8,}$/", $data['password'])) {
    $errors['password_err'] = '<ul>Password must contain at least:<li>One uppercase letter</li><li>One lowercase letter</li><li>One digit</li><li>One special character</li></ul>';
}

// repassword_validate
if($data['confirm_password'] === ''){
    $errors['confirm_password_err'] = 'repassword is require';
}elseif($data['password'] !== $data['confirm_password']) {

    $errors['confirm_password_err'] = 'Password is dosnt match';
 };
 
$created_at = date('y-m-d h-m-s');

// if no error go to users page
if(count($errors) > 0 ){
    $_SESSION['current_data'] = $current_data;

    $_SESSION['errors'] = $errors;

    header('location: add_user.php');

}else{
 $name = $data['first_name']. ' ' . $data['last_name'];
 $email = $data['email'];
 $mobile = $data['mobile'];
 $password = password_hash($data['password'], PASSWORD_DEFAULT);

    $add_new_user = "INSERT INTO 

    `pst_users` (`name`, `email`, `mobile`, `password` , `created_at`)

    VALUES ('$name' , '$email' , '$mobile', '$password' , '$created_at');";

if(Model::$db->query($add_new_user)){

    $id = Model::$db->insert_id;
    
    $_SESSION['success'] = 'User Created Added Successfully';

    header("location: ../users/user.php?id=$id");

}else{

    $_SESSION['save_error'] = 'Cannot add new user';

    header('location: /add_user.php');
    
}
}

// dd($_SESSION);

?>