<script src="https://cdn.tailwindcss.com"></script>
<?php

require_once '../../load.php';

$current_data = $_SESSION['current_data'] ?? [];

$errors = $_SESSION['errors'] ?? [];

$save_error = $_SESSION['save_error'] ?? [];

// dd($_SESSION);

?>
<style>
@keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.fade-in {
    animation: fadeIn 2s ease-in-out;
}
</style>
<body class="bg-gray-900 flex flex-col items-center justify-center min-h-screen fade-in overflow-x-hidden fade-in">
    
    <div
        class="text-sm bg-parent p-8 rounded-lg shadow-xlg w-full max-w-3xl border-2 overflow-hidden border-x-transparent text-center font-bold">
        <h2 class="text-2xl font-bold mb-6 text-white text-center border-2 border-white p-1 rounded-xl bg-blue-500">
            Create A New Account</h2>
            
        <form action="register_store.php" method="POST" novalidate class="overflow-hidden">
            <!-- FirstName -->
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="first-name" class="block text-white p-1 rounded-lg bg-black mb-2">First Name</label>
                    <input type="text" name="first_name" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 mb-2"
                        value="<?= @$current_data['first_name'] ?>">
                    <span
                        class="text-red-500 font-bold bg-black p-1 rounded-xl flex justify-center items-center w-full overflow-hidden text-ellipsis">
                        <?= @$errors['first_name_err'] ?>
                    </span>
                </div>
                <!-- LastName -->
                <div class="w-1/2">
                    <label for="last-name" class="block text-white p-1 rounded-lg bg-black mb-2">Last Name</label>
                    <input type="text" name="last_name" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 mb-2"
                        value="<?= @$current_data['last_name'] ?>">
                    <span>
                        <span
                            class="text-red-500 font-bold bg-black p-1 rounded-xl flex justify-center items-center w-full overflow-hidden text-ellipsis">
                            <?= @$errors['last_name_err'] ?>
                        </span>
                </div>
            </div>
            <!-- Email -->
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="email" class="block text-white p-1 rounded-lg bg-black mb-2">Email</label>
                    <input type="email" name="email" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 mb-2"
                        value="<?= @$current_data['email'] ?>">
                    <span>
                        <span
                            class="text-red-500 font-bold bg-black p-1 rounded-xl flex justify-center items-center w-full overflow-hidden text-ellipsis">
                            <?= @$errors['email_err'] ?>
                        </span>
                </div>
                <!-- Mobile -->
                <div class="w-1/2">
                    <label for="mobile" class="block text-white p-1 rounded-lg bg-black mb-2">Mobile Number</label>
                    <input type="text" name="mobile" required maxlength="11"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 mb-2"
                        value="<?= @$current_data['mobile'] ?>">
                    <span>
                        <span
                            class="text-red-500 font-bold bg-black p-1 rounded-xl flex justify-center items-center w-full overflow-hidden text-ellipsis">
                            <?= @$errors['mobile_err'] ?>
                        </span>
                </div>
            </div>
            <!-- Password -->
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label for="password" class="block text-white p-1 rounded-lg bg-black mb-2">Password</label>
                    <input type="password" name="password" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 mb-2"
                        value="<?= @$current_data['password'] ?>">
                    <span
                        class='text-red-500 font-bold bg-black p-1 rounded-xl whitespace-nowrap flex justify-center items-center w-full'>
                        <?= @$errors['password_err'] ?>
                    </span>
                </div>
                <!-- Confirm Password -->
                <div class="w-1/2">
                    <label for="confirm_password" class="block text-white p-1 rounded-lg bg-black mb-2">Confirm
                        Password</label>
                    <input type="password" name="confirm_password" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 mb-2"
                        value="<?= @$current_data['confirm_password'] ?>">
                    <span
                        class='text-red-500 font-bold bg-black p-1 rounded-xl whitespace-nowrap flex justify-center items-center w-full'>
                        <?= @$errors['confirm_password_err'] ?>
                    </span>
                </div>
            </div>
            <!-- Button -->
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200">
                CREATE ACCOUNT
            </button>
            <a href="../login.php"
                class="bg-green-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200">
                Login
            </a>
        </form>
    </div>
</body>

</html>