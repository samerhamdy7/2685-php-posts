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
};

// Last_name_validate
if($data['last_name'] === ''){
    $errors['last_name_err'] = 'Last name is require';
}elseif(strlen($data['last_name']) < 3 ){
    $errors['last_name_err'] = 'last name must be more than 3 letters';
}elseif(strlen($data['last_name']) > 15 ) {
    $errors['last_name_err'] = 'last name must less than 15 letters';
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
};

// password_validate
if($data['password'] === ''){
    $errors['password_err'] = 'password require';

}elseif(strlen($data['password']) < 6){
    $errors['password_err'] = 'password must be more than 6 letters';
};

// repassword_validate

if($data['confirm_password'] === ''){
    $errors['confirm_password_err'] = 'repassword is require';
}elseif($data['password'] !== $data['confirm_password']) {

    $errors['confirm_password_err'] = 'Password is dosnt match';
 };
 

$created_at = date('y-m-d h-m-s');


 $first_name = $current_data ['first_name'];

 $last_name = $current_data['last_name'];

 $full_name = $first_name . $last_name;


// if no error go to users page
if(count($errors) > 0 ){
    $_SESSION['current_data'] = $current_data;

    $_SESSION['errors'] = $errors;

    header('location: add_user.php');
}else {
 
    $add_new_user = "INSERT INTO 

    `pst_users` (`name`, `email`, `mobile`, `password` , `created_at`)

    VALUES 

    ('{$full_name}' , '{$current_data['email']}' , '{$current_data['mobile']}', '{$current_data['password']}' , '{$created_at}');";

$db->query($add_new_user);


header('location: ../users/users.php');
}

dd($_SESSION);
?>