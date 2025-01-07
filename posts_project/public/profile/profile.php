<?php 
require_once  '../../vendor/autoload.php';
require_once '../../load.php';

if(session_status() ===  PHP_SESSION_NONE){
    session_start();
};

$success_update = $_SESSION['success_update'] ?? [] ;
$update_error = $_SESSION['error_update'] ?? [] ;
$failed_id = $_SESSION['id_notfound'] ?? [] ;

unset($_SESSION['success_update'],
 $_SESSION['error_update'],
 $_SESSION['id_notfound']);
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
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>



<body class="min-h-screen text-white bg-purple-900 fade-in overflow-x-hidden fade-in">
  <?php require_once '../layout/navbar.php'?>

    <!-- notify msg -->
  <div class="fixed top-0 inset-x-0 z-50 text-center" id='msg_hide'>
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
        <div class='p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg'>
          <span class="font-medium"><?= @$failed_id ?></span>
        </div> 
      <?php endif; ?> 
    </div> 
  </div> 

  <form class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md my-10" method='POST' action='admin_profile_store.php'>
      <!-- Updated layout -->
    <div class="flex items-center justify-between mb-6"> 
      <div class="flex items-center space-x-4">
        <?php if ($profile_img): ?>
          <img src="<?= $profile_img ?>" alt="Profile Picture" class="w-32 h-32 rounded-full border-4 border-purple-500 object-cover">
        <?php else: ?>
          <div class="w-32 h-32 rounded-full border-4 border-purple-500 flex items-center justify-center bg-purple-500 text-white text-4xl gap-2">
            <h2><?= $name_init ?></h2>
          </div>
        <?php endif; ?>

        <div>
          <div class="flex gap-2 items-center">
            <div class="text-3xl font-bold text-gray-800"><?= $_SESSION['username'] ?> <h2 class="text-gray-600 uppercase text-sm"><?= $_SESSION['roles'] ?></h2></div>
          </div>
        </div>
      </div>

      <div class="flex items-center gap-2 fade-in">
        <button type="button" class="text-black flex items-center bg-yellow-300 p-2 rounded hover:bg-yellow-600 transition" id="edit_button" onclick="editbutton()"> Edit </button>
        <div id="edit_form" style="display: none" class="flex flex-col gap-2 justify-end fade-in">
          <input type="text" name='new_name' placeholder="Enter your name" class="text-black p-2 border border-gray-300 rounded mb-1">
          <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
          <div class="flex gap-2 fade-in">
            <button type="submit" class="text-white bg-blue-500 p-2 rounded hover:bg-blue-600 transition fade-in">Update</button>
            <button id="cancel_edit" type="button" onclick="cancelbutton()" class="text-white bg-red-500 p-2 rounded hover:bg-red-600 transition fade-in">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-6">
      <h2 class="text-2xl font-semibold text-gray-800">About Me</h2>
      <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim.</p>
    </div>
  </form>

  <!-- onlyadmin -->
  <?php if ($_SESSION['roles'] === 'admin'): ?>
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md my-10 mb-6 border-t pt-6">
      <h2 class="text-2xl font-semibold text-gray-800 mb-2">Admin Control</h2>
      <form class="flex flex-col gap-4" action='admin_store.php' method='POST'>
        <div>
          <label for='user_id' class='text-gray-800'>User ID:</label>
          <input type='text' id='user_id' name='user_id' class='text-black border-2 border-black rounded-xl size-min'>
        </div>
        <div>
          <label for='new_role' class='text-gray-800'>Role Of User:</label>
          <select name="new_role" id="new_role" class="bg-gray-200 border-2 border-gray-400 text-gray-800 p-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500">
            <?php foreach($all as $roles): ?>
              <option class="bg-gray-100 text-gray-800" name='new_role' value=<?= $roles['role_name']?>> <?= $roles['role_name']?> </option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type='submit' class='text-black bg-purple-500 rounded-md p-2'>Update Role</button>
      </form>
    </div>
  <?php endif; ?>

    <!-- script -->
    <script>
    const editform = edit_form;
    const edit_but = edit_button;

    const editbutton = () => {
        editform.style.display = 'block';
        edit_but.style.display = 'none';
    };

    const cancelbutton = () => {
        editform.style.display = 'none';
        edit_but.style.display = 'block';
    };


    const msgHide = msg_hide;
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