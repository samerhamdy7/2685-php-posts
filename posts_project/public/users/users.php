<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Users</title>

</head>

<body class='bg-gray-600 flex flex-wrap justify-center'>

    <nav
        class='w-full flex items-center justify-around gap-3 outline-none bg-gray-500 p-2 m-2 rounded-xl font-bold hover:text-blue-400'>

        <img src="samer_logo2.jpg" width='50px' class='rounded-xl border-2 border-black hover:scale-125'>
        <a class='hover:text-blue-900' href="/" id="home">Home</a>
        <a class='text-black p-2 rounded-xl bg-green-600 hover:bg-green-400 block cursor-pointer'
            href='../add_user/add_user.php'>Add New User</a>

    </nav>

</html>

<?php

include '../load.php';


$qry = "SELECT * FROM `pst_users`;";

$res = $db->query($qry);

$users_data = mysqli_fetch_all($res , MYSQLI_ASSOC);




foreach($users_data as $u):
  
    include 'usersPage.php';
    
    endforeach
?>