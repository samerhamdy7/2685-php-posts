<?php

namespace public\Classes;

class Auth
{

    static function login($email, $password){
        
        // Validation Of Auth

        $errors = [];
      
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        if($email === false){
            $errors['email'] = 'Email Is Not Valied';
        }

        $password_valiadte = preg_match('/[a-z\d\w]{8,16}/i', $password);

        if($password_valiadte === 0){
            $errors['password'] = 'Password Should be between 8 and 16 characters';
        }

        if(count($errors) > 0){
            return $errors;
        }

        // Authen //
        $qry = "SELECT * FROM `pst_users` WHERE `email` = '$email';";

        $res = Model::$db->query($qry);

        $user = mysqli_fetch_assoc($res);

        if(!$user){
            $errors['general'] = 'Invalied Credinitials';
            return $errors;
        }

        $password_match = password_verify($password , $user['password']);

        if(!$password_match){
            $errors['general'] = 'Invalied Credinitials';
            return $errors;
        }

        // create token
        $token = sha1(mt_rand());
        $_SESSION['token'] = $token;

        $_SESSION['roles'] = $user['roles']; 
        $_SESSION['username'] = $user['name'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['success'] = 'Welcom Back';

        return true;
    
    }

}

