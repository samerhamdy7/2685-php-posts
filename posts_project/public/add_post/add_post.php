<?php
include '../load.php';

$current_post_data = $_SESSION['current_post_data'] ?? [];

$post_errors = $_SESSION['post_errors'] ?? [];

//  dd($_SESSION);

$post_status = "SELECT * FROM `pst_post_statuses`;";
$res = $db->query($post_status);
$status = MYSQLI_FETCH_ALL($res , MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Post</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
    body {
        background-image: url('back.jpg');
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

<body class="bg-gray-800 flex flex-col items-center justify-center min-h-screen">
    <nav
        class='w-full flex items-center justify-around gap-3 outline-none bg-gray-500 p-2 m-2 rounded-xl font-bold hover:text-blue-400'>

        <img src="samer_logo2.jpg" width='50px' class='rounded-xl border-2 border-black hover:scale-125'>
        <a class='hover:text-blue-900' href="/" id="home">Home</a>
        <a class='text-black p-2 rounded-xl bg-green-600 hover:bg-green-400 block cursor-pointer'
            href='../add_user/add_user.php'>Add New User</a>
        <a class='text-black p-2 rounded-xl bg-blue-600 hover:bg-blue-400 block cursor-pointer'
            href='../add_post/add_post.php'>Add New Post</a>

    </nav>
    <form
        class="bg-parent p-8 rounded-lg shadow-xlg w-full max-w-3xl border-2 border-x-transparent text-center font-bold fade-in-up"
        action="post_store.php" method="POST" novalidate>
        <h2 class="text-2xl font-bold mb-6 text-white text-center border-2 border-white p-2 rounded-xl bg-blue-500">Add
            New Post
        </h2>

        <div class="space-y-4">
            <!-- title -->
            <div>
                <label for="title" class="block text-white font-bold mb-2 bg-black p-2 ">Title</label>
                <input type="text" name="title" required
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                    placeholder="Enter post title" value=<?= @$current_post_data['title'] ?>>
            </div>
            <span class='text-red-500 font-bold'><?= @$post_errors['title_err']?></span>
            <!-- body -->

            <div>
                <label for="body" class="block text-white font-bold mb-2 bg-black p-2">Body</label>
                <textarea name="body" rows="6" required
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                    placeholder="Write your post content here" value=<?= @$current_post_data['body'] ?>></textarea>
            </div>
            <span class='text-red-500 font-bold'><?= @$post_errors['body_err']?></span>

            <!-- User_ID -->
            <div>
                <label for="user_id" class="block text-white font-bold mb-2 bg-black p-2">User ID</label>
                <input type="number" name="user_id" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
            focus:ring-blue-500 transition duration-200" placeholder="User ID"
                    value=<?= @$current_post_data['user_id']?>>
            </div>
            <span class='text-red-500 font-bold'><?= @$post_errors['user_id_err']?></span>

            <!-- status-->
            <div>
                <label for="status" class="block text-white font-bold mb-2 bg-black p-2"
                    value=<?= @$current_post_data['status']?>>post status </label>

                <select name="status" required class="w-full p-3 border border-gray-300 rounded-xl 
                     focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 font-bold">
                    <?php if(!empty($status)): ?>
                    <?php  foreach($status as $s): ?>
                    <option class="bg-gray-900 text-white font-bold rounded-x" value="<?= $s['id']?>"><?= $s['type']?>
                    </option>
                    <?php endforeach?>
                    <?php endif ?>
                </select>
            </div>
            <span class='text-red-500 font-bold'><?= @$post_errors['status_err']?></span>

            <!-- submite button -->

            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline transition duration-200">
                    Add Post
                </button>
            </div>
        </div>
    </form>

</body>

</html>