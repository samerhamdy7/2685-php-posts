<?php

require '../load.php';

$current_data = $_SESSION['current_data'] ?? [];

$errors = $_SESSION['errors'] ?? [];

$save_error = $_SESSION['save_error'];


// dd($save_error);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
    body {
        background-image: url('3.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .bg-overlay {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-up {
        animation: fadeInUp 1s ease-out;
    }
    </style>

</head>

<body class="bg-gray-900 flex flex-col items-center justify-center min-h-screen">
    <nav
        class='w-full flex items-center justify-around gap-3 outline-none bg-gray-500 p-2 m-2 rounded-xl font-bold hover:text-blue-400 '>
        <img src="samer_logo2.jpg" width='50px' class='rounded-xl border-2 border-black'>
        <a class='hover:text-blue-900' href="/" id="home">Home</a>
        <a class='text-black p-2 rounded-xl bg-green-600 hover:bg-green-400 block cursor-pointer'
            href='../login/login.php'>Add New User</a>
        <a class='text-black p-2 rounded-xl bg-blue-600 hover:bg-blue-400 block cursor-pointer'
            href='../add_post/add_post.php'>Add New Post</a>


    </nav>
    <div
        class="bg-parent p-8 rounded-lg shadow-xlg w-full max-w-3xl border-2 border-x-transparent text-center font-bold fade-in-up">
        <h2 class="text-2xl font-bold mb-6 text-white text-center border-2 border-white p-2 rounded-xl bg-blue-500">Add
            New User
        </h2>
        <form action="store.php" method="POST" novalidate>
            <!-- FirstName -->
            <div class="mb-4 flex space-x-4 ">
                <div class="w-1/2">
                    <label for="first-name" class="block text-white p-2 rounded-lg bg-black mb-2">First Name</label>
                    <input type="text" name="first_name" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2
                         focus:ring-blue-500 transition duration-200 mb-2" value=<?= @$current_data['first_name'] ?>>
                    <span
                        class='text-red-500 font-bold bg-black p-2 rounded-xl whitespace-nowrap justify-center w-auto'><?= @$errors['first_name_err']?></span>
                </div>
                <!-- LastName -->
                <div class="w-1/2">
                    <label for="last-name" class="block text-white p-2 rounded-lg bg-black mb-2">Last Name</label>
                    <input type="text" name="last_name" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                        focus:ring-blue-500 transition duration-200 mb-2" value=<?= @$current_data['last_name']?>>
                        
                        <span
                            class='mt-2 text-ellipsis text-red-500 font-bold bg-black p-2 rounded-xl whitespace-nowrap justify-center w-auto'><?= @$errors['last_name_err']?>
                        </span>
                </div>
            </div>
            <!-- Email -->
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="email" class="block text-white p-2 rounded-lg bg-black mb-2">Email</label>
                    <input type="email" name="email" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                        focus:ring-blue-500 transition duration-200 mb-2" value=<?= @$current_data['email']?>>
                    <span
                        class='text-red-500 font-bold bg-black border-xl p-2 rounded-xl'><?= @$errors['email_err']?></span>

                </div>
                <!-- Mobile -->
                <div class="w-1/2">
                    <label for="mobile" class="block text-white p-2 rounded-lg bg-black mb-2">Mobile Number</label>
                    <input type="text" name="mobile" required maxlength="11" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                        focus:ring-blue-500 transition duration-200 mb-2" value=<?= @$current_data['mobile'] ?>>
                    <span
                        class='text-red-500 font-bold bg-black border-xl p-2 rounded-xl'><?= @$errors['mobile_err']?></span>

                </div>
            </div>
            <!-- Password -->
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="password" class="block text-white p-2 rounded-lg bg-black mb-2">Password</label>
                    <input type="password" name="password" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                        focus:ring-blue-500 transition duration-200 mb-2" value=<?= @$current_data['password']?>>
                    <span
                        class='text-red-500 font-bold bg-black border-xl p-2 rounded-xl'><?= @$errors['password_err']?></span>
                </div>
                <!-- confirm_password -->
                <div class="w-1/2">
                    <label for="confirm_password" class="block text-white p-2 rounded-lg bg-black mb-2">Confirm
                        Password</label>
                    <input type="password" name="confirm_password" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
                            focus:ring-blue-500 transition duration-200 mb-2"
                        value=<?= @$current_data['confirm_password']?>>
                    <span
                        class='text-red-500 font-bold bg-black border-xl p-2 rounded-xl'><?= @$errors['confirm_password_err']?></span>
                </div>
            </div>
            <!-- button -->
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200">Add
                User</button>
        </form>

        <div class='text-red-500'>
              <?php $save_error ?? ''; ?>
        </div>
    </div>
</body>

</html>