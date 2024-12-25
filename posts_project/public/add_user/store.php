<?php


include '../load.php';

// save the old data i ll write it into the filed

$current_data = $_POST;

// save  a copy of the user data 

$data = $_POST;

// create an empty array to push in it the errors 

$errors = [];


// First_name_validate
if($data['first_name'] === ''){
    $errors['first_name_err'] = 'first Name is require';
} elseif(strlen($data['first_name']) < 3){
    $errors['first_name_err'] = 'First name should be more than 3 letters';
}elseif(strlen($data['first_name']) > 15){
    $errors['first_name_err'] = 'first name must be less than 15 letters';
}elseif(!preg_match("/[A-Z]/", $data['first_name'])){
    $errors['first_name_err'] = 'First Name must contain at least 1 Letter';
};

// Last_name_validate
if($data['last_name'] === ''){
    $errors['last_name_err'] = 'Last name is require';
}elseif(strlen($data['last_name']) < 3 ){
    $errors['last_name_err'] = 'last name must be more than 3 letters';
}elseif(strlen($data['last_name']) > 15 ) {
    $errors['last_name_err'] = 'last name must less than 15 letters';
}elseif(!preg_match("/[A-Z]/", $data['last_name'])){
    $errors['last_name_err'] = 'last Name Must Contain At Least 1 Uppre Letter';
};

// email_validate
if($data['email'] === ''){
    $errors['email_err'] = 'email is requier';
}elseif(filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false){
    $errors['email_err'] = 'Email not Accepted';
};

// mobile_validate 
if($data['mobile'] === ''){
    $errors['mobile_err'] = 'mobile is require';
}elseif(strlen($data['mobile']) <> 11 ){
    $errors['mobile_err'] = 'Invaild mobile number';
}elseif(!preg_match("/^(010|011|012|015)[\d]{8}$/", $data['mobile'])){
    $errors['mobile_err'] = 'mobile must be start 01 [0,1,2,5]';
};

// password_validate
if($data['password'] === ''){
    $errors['password_err'] = 'password require';

}elseif(strlen($data['password']) < 6){
    $errors['password_err'] = 'password must be more than 6 letters';
}elseif(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[\W])[A-Za-z\d@$!%*?&]{8,}$/", $data['password'])){
$errors['password_err'] ='<ul>Password must contain at least:<li>One uppercase letter</li><li>One lowercase letter</li><li>One digit</li><li>One special character</li></ul>';
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

if($db->query($add_new_user)){

    $id = $db->insert_id;
    
    $_SESSION['success'] = 'User Created Added Successfully';

    header("location: ../users/user.php?id=$id");

}else{

    $_SESSION['save_error'] = 'Cannot add new user';

    header('location: /add_user.php');
    
}
}

dd($_SESSION);

?>