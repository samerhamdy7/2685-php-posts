<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Posts</title>
    
</head>

<body class="flex flex-wrap justify-center bg-[#090620] bg-opacity-90 border-b-2 z-10 fade-in overflow-x-hidden">
    <?php require '../layout/navbar.php'?>

    <h2
       class="w-full text-center rounded-xl text-2xl font-bold text-white p-2 rounded-x overflow-hidden hover:border-black">
        All posts
</h2>

    <?php
     include '../../load.php';
     use public\Classes\{
        Post
     };
     
    $all_posts = Post::all();

   foreach($all_posts as $post):
    ?>
   

        <?php 
        
        require 'posts_page.php';
        
        ?>
 

    <?php endforeach ?>

</body>

</html>