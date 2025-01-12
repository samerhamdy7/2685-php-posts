<?php 
require_once  '../../vendor/autoload.php';
require_once '../../load.php';

if(session_status() ===  PHP_SESSION_NONE){
    session_start();
};

$success_update = $_SESSION['success_update'] ?? [] ;
$update_error = $_SESSION['error_update'] ?? [] ;
$failed_id = $_SESSION['id_notfound'] ?? [] ;
$send_msg =  $_SESSION['success_msg'] ?? [] ;
$send_err =  $_SESSION['error_msg'] ?? [] ;

unset($_SESSION['success_update'],
 $_SESSION['error_update'],
 $_SESSION['id_notfound'],
 $_SESSION['success_msg'],
 $_SESSION['error_msg'] );
 
use public\Classes\{
    Roles
};
$all = Roles::all();

function getinit($name) {


    $f_l = substr($name , 0 , 1);

    $name_part = explode(' ', $name);
    
    $l_name = end($name_part);
    
    $s_l = substr($l_name , 0 , 1);

    return $f_l . $s_l;

    }

    $name_init = getinit($_SESSION['username']); 

    $profile_img = '';


     include 'messages.php';
     if (!isset($messages)) 
     { $messages = []; }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="min-h-screen text-white bg-purple-900 fade-in overflow-x-hidden">
    <?php require_once '../layout/navbar.php' ?>

    <!-- notify messages -->
    <div class="fixed top-16 inset-x-0 z-50 text-center" id="msg_hide">
        <div class="container mx-auto mt-4">
            <?php if ($success_update): ?>
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                <span class="font-medium"><?= @$success_update ?></span>
            </div>
            <?php elseif ($update_error): ?>
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                <span class="font-medium"><?= @$update_error ?></span>
            </div>
            <?php elseif ($failed_id): ?>
            <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg">
                <span class="font-medium"><?= @$failed_id ?></span>
            </div>
            <?php endif; ?>
            <?php if ($send_msg): ?>
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                <span class="font-medium"><?= @$send_msg ?></span>
            </div>
            <?php endif; ?>
            <?php if ($send_err): ?>
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                <span class="font-medium"><?= @$send_err ?></span>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <form class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md my-10" method="POST"
        action="admin_profile_store.php">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-4">
                <?php if ($profile_img): ?>
                <img src="<?= $profile_img ?>" alt="Profile Picture"
                    class="w-32 h-32 rounded-full border-4 border-purple-500 object-cover">
                <?php else: ?>
                <div
                    class="w-32 h-32 rounded-full border-4 border-purple-500 flex items-center justify-center bg-purple-500 text-white text-4xl gap-2">
                    <h2><?= $name_init ?></h2>
                </div>
                <?php endif; ?>

                <div>
                    <div class="flex gap-2 items-center">
                        <div class="text-3xl font-bold text-gray-800"><?= $_SESSION['username'] ?></div>
                        <h2 class="text-gray-600 uppercase text-sm"><?= $_SESSION['roles'] ?></h2>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-2 fade-in">
                <button type="button"
                    class="text-black flex items-center bg-yellow-300 p-2 rounded hover:bg-yellow-600 transition"
                    id="edit_button" onclick="editbutton()">Edit</button>
                <div id="edit_form" style="display: none" class="flex flex-col gap-2 justify-end fade-in">
                    <input type="text" name="new_name" placeholder="Enter your name"
                        class="text-black p-2 border border-gray-300 rounded mb-1">
                    <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
                    <div class="flex gap-2 fade-in">
                        <button type="submit"
                            class="text-white bg-blue-500 p-2 rounded hover:bg-blue-600 transition fade-in">Update</button>
                        <button id="cancel_edit" type="button" onclick="cancelbutton()"
                            class="text-white bg-red-500 p-2 rounded hover:bg-red-600 transition fade-in">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">About Me</h2>
            <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet,
                nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim.</p>
        </div>
    </form>

    <!-- admin control -->
    <?php if ($_SESSION['roles'] === 'admin'): ?>
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md my-10 mb-6 border-t pt-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Admin Control</h2>
        <form class="flex flex-col gap-4" action="admin_store.php" method="POST">
            <div>
                <label for="user_name" class="text-gray-800">User Name:</label>
                <input type="text" id="user_name" name="user_name"
                    class="text-black border-2 border-black rounded-xl p-1">
            </div>
            <div>
                <label for="new_role" class="text-gray-800">Role Of User:</label>
                <select name="new_role" id="new_role"
                    class="bg-gray-200 border-2 border-gray-400 text-gray-800 p-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <?php foreach ($all as $roles): ?>
                    <option class="bg-gray-100 text-gray-800" value="<?= $roles['role_name'] ?>">
                        <?= $roles['role_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="text-black bg-purple-500 rounded-md p-2">Update Role</button>
        </form>
    </div>
    <?php endif; ?>

    <!-- Send mssage  -->
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md my-10 mb-6 border-t pt-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Send a Message</h2>
        <form method="POST" action="sender.php" class="flex flex-col gap-4">
            <div>
                <label for="receiver_name" class="text-gray-800">Receiver Name:</label>
                <input type="text" id="receiver_name" name="receiver_name"
                    class="text-black border-2 border-gray-300 rounded-lg p-2" placeholder="Enter Receiver Name">
            </div>
            <div>
                <label for="message" class="text-gray-800">Message:</label>
                <textarea id="message" name="message" class="text-black border-2 border-gray-300 rounded-lg p-2"
                    placeholder="Enter your message"></textarea>
            </div>
            <button type="submit"
                class="text-white bg-purple-600 rounded-md p-2 hover:bg-purple-700 transition ease-in-out">Send
                Message</button>
        </form>

        <h2 class="text-2xl font-semibold text-gray-800 mt-6">Messages</h2>
        <?php foreach ($messages as $message): ?>
        <div class="mt-4 p-4 bg-gray-200 text-black rounded-lg shadow-sm">
            <strong><?= $message['sender_name']; ?></strong> to <strong><?= $message['receiver_name']; ?></strong>:
            <p><?= $message['message']; ?></p>
            <small><?= $message['timestamp']; ?></small>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Search for Users -->
    <form method="POST" action="" class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md my-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Search a User</h2>
        <div class="mb-4"> <label for="search_name" class="block text-black font-bold mb-2">Search by Name:</label>
            <input type="text" id="search_name" name="search_name" class="w-full border p-2 rounded text-black"> </div>
        <div class="mb-4"> <label for="search_role" class="block text-black font-bold mb-2">Search by Role:</label>
            <select id="search_role" name="search_role" class="w-full border p-2 rounded text-black">
                <option value="">Select Role</option>
                <?php $roles = ["Admin", "moderator", "User" , "guest"]; foreach($roles as $role) { echo "<option value=\"$role\">$role</option>"; } ?>
            </select> </div> <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
    </form>
 

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        include 'search.php'; 
        if ($res->num_rows > 0): ?> 
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md my-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Search Results</h2>
        <table class="min-w-full bg-white rounded-lg">
            <thead>
                <tr class='text-left'>
                    <th class="py-2 px-4 border-b text-black">ID</th>
                    <th class="py-2 px-4 border-b text-black">Name</th>
                    <th class="py-2 px-4 border-b text-black">Role</th>
                </tr>
            </thead>
            <tbody> 
                <?php while ($row = $res->fetch_assoc()): ?> 
                <tr>
                    <td class="py-2 px-4 border-b text-black"><?= $row['id'] ?></td>
                    <td class="py-2 px-4 border-b text-black font-bold"><?= $row['name'] ?></td>
                    <td class="py-2 px-4 border-b text-black"><?= $row['roles'] ?></td>
                </tr> 
                <?php endwhile; ?> 
            </tbody>
        </table>
    </div> 
    <?php else: ?> 
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md my-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Search Results</h2>
        <p class="text-gray-600">No User Found</p>
    </div> 
    <?php endif; 
} ?>




    <script>
    const editform = edit_form;
    const edit_but = edit_button;
    const editbutton = () => {
        editform.style.display = 'block';
        edit_but.style.display =
            'none';
    };
    const cancelbutton = () => {
        editform.style.display = 'none';
        edit_but.style.display = 'block';
    };
    const
        msgHide = msg_hide;
    const hideMessage = () => {
        msgHide.style.transition = "opacity 1s ease";
        msgHide.style.opacity = '0';
        setTimeout(() => {
            msgHide.style.display = 'none';
        }, 3000);
    }
    setTimeout(hideMessage, 3000);
    </script>

</body>

</html>