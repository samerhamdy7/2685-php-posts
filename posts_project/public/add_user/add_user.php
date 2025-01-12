<?php

require_once '../../load.php';

$current_data = $_SESSION['current_data'] ?? [];

$errors = $_SESSION['errors'] ?? [];

$save_error = $_SESSION['save_error'] ?? [];

// dd($save_error);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <style>
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
    </style>
</head>
<body class="bg-gray-900 flex flex-col items-center justify-center min-h-screen fade-in overflow-x-hidden">
    <div class="navbar">
        <?php require '../layout/navbar.php';?>
    </div>

    <form
        class="text-sm bg-parent p-4 rounded-lg shadow-xlg w-full max-w-3xl border-2 border-x-transparent text-center font-bold fade-in-up mt-16"
        action="store.php" method="POST" novalidate>
        <h2 class="text-2xl font-bold mb-6 text-white text-center border-2 border-white p-1 rounded-xl bg-green-500">Add New User</h2>
        <div class="space-y-4">
            <!-- FirstName and LastName -->
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="first-name" class="block text-white font-bold mb-2 bg-black p-1">First Name</label>
                    <input type="text" name="first_name" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                        value="<?= @$current_data['first_name'] ?>">
                    <span class="text-red-500 font-bold bg-black p-1 rounded-xl flex justify-center items-center w-full overflow-hidden text-ellipsis mt-2">
                        <?= @$errors['first_name_err'] ?>
                    </span>
                </div>
                <div class="w-1/2">
                    <label for="last-name" class="block text-white font-bold mb-2 bg-black p-1">Last Name</label>
                    <input type="text" name="last_name" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                        value="<?= @$current_data['last_name'] ?>">
                    <span class="text-red-500 font-bold bg-black p-1 rounded-xl flex justify-center items-center w-full overflow-hidden text-ellipsis mt-2">
                        <?= @$errors['last_name_err'] ?>
                    </span>
                </div>
            </div>

            <!-- Email and Mobile -->
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="email" class="block text-white font-bold mb-2 bg-black p-1">Email</label>
                    <input type="email" name="email" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                        value="<?= @$current_data['email'] ?>">
                    <span class="text-red-500 font-bold bg-black p-1 rounded-xl flex justify-center items-center w-full overflow-hidden text-ellipsis mt-2">
                        <?= @$errors['email_err'] ?>
                    </span>
                </div>
                <div class="w-1/2">
                    <label for="mobile" class="block text-white font-bold mb-2 bg-black p-1">Mobile Number</label>
                    <input type="text" name="mobile" required maxlength="11"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                        value="<?= @$current_data['mobile'] ?>">
                    <span class="text-red-500 font-bold bg-black p-1 rounded-xl flex justify-center items-center w-full overflow-hidden text-ellipsis mt-2">
                        <?= @$errors['mobile_err'] ?>
                    </span>
                </div>
            </div>

            <!-- Password and Confirm Password -->
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="password" class="block text-white font-bold mb-2 bg-black p-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                        value="<?= @$current_data['password'] ?>">
                    <span class='text-red-500 font-bold bg-black p-1 rounded-xl whitespace-nowrap flex justify-center items-center w-full mt-2'>
                        <?= @$errors['password_err'] ?>
                    </span>
                </div>
                <div class="w-1/2">
                    <label for="confirm_password" class="block text-white font-bold mb-2 bg-black p-1">Confirm Password</label>
                    <input type="password" name="confirm_password" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                        value="<?= @$current_data['confirm_password'] ?>">
                    <span class='text-red-500 font-bold bg-black p-1 rounded-xl whitespace-nowrap flex justify-center items-center w-full mt-2'>
                        <?= @$errors['confirm_password_err'] ?>
                    </span>
                </div>
            </div>

            <!-- Button -->
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200">
                    Add User
                </button>
            </div>
        </div>
    </form>
</body>
</html>
