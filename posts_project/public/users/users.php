<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Users</title>
    <style>
    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .gradient-bg {
        background: linear-gradient(135deg, #4b0082, #800080, #9932cc, #8a2be2);
        background-size: 400% 400%;
        animation: gradientAnimation 15s ease infinite;
    }
    </style>
</head>

<body class="flex flex-wrap justify-center bg-[#090620] bg-opacity-90 border-b-2 z-10 fade-in overflow-x-hidden">
 <?php require '../layout/navbar.php' ?> 
    <h2
        class="w-full text-center text-2xl font-bold text-white p-2 rounded-x hover:border-black">
        All Users
    </h2>
    <div class="flex flex-wrap justify-center p-1 gap-1 w-full">

        <?php
        include '../load.php';
        $all_users = User::all_users();
        foreach($all_users as $user):
            include 'usersPage.php';
        endforeach;
        ?>
    </div>

</body>

</html>