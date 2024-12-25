<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Posts</title>
</head>

<body class="bg-gray-600 flex flex-wrap justify-center">

    <!-- <nav
        class='w-full flex items-center justify-around gap-3 outline-none bg-gray-500 p-2 m-2 rounded-xl font-bold hover:text-blue-400 '>
        <a class='hover:text-blue-900' href="/" id="home">Home</a>
        <a class='hover:text-blue-900' href="users.php">Users</a>
        <a class='hover:text-blue-900' href="comment.php">Comments</a>
        <a class='hover:text-blue-900' href="status.php">Post Status</a>
        <a class='hover:text-blue-900' href="posts.php">Posts</a>
        <a class='hover:text-blue-900' href="reactions.php">ٌReactions</a>
    </nav> -->


    <?php

include '../load.php';

$qry = "SELECT * FROM `pst_posts`;";

$res = $db->query($qry);

$data = MYSQLI_FETCH_ALL($res , MYSQLI_BOTH);

//var_dump($data);


?>
<nav
        class='w-full flex items-center justify-around gap-3 outline-none bg-gray-500 p-2 m-2 rounded-xl font-bold hover:text-blue-400'>

        <img src="samer_logo2.jpg" width='50px' class='rounded-xl border-2 border-black hover:scale-125'>
        <a class='hover:text-blue-900' href="/" id="home">Home</a>
        <a class='text-black p-2 rounded-xl bg-green-600 hover:bg-green-400 block cursor-pointer'
            href='../add_user/add_user.php'>Add New User</a>
        <a class='text-black p-2 rounded-xl bg-blue-600 hover:bg-blue-400 block cursor-pointer'
            href='../add_post/add_post.php'>Add New Post</a>

    </nav>
    <h2
        class="w-full text-center text-2xl font-bold text-black border-4 p-2 rounded-xl border-gray-800 hover:text-gray-800 hover:border-black">
        All posts</h2>
      
    <?php 
foreach($data as $p):
    
    include 'posts_page.php';
    
    ?>
    <?php endforeach ?>


</body>

</html>