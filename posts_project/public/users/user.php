<link rel="stylesheet" href="../css/styles.css">

<body class="min-h-screen text-white bg-[#2e0e44] fade-in overflow-x-hidden">

<?php require '../layout/navbar.php'?>


    <?php

include '../load.php';

$id = $_GET['id'];

// single user
$user = User::single_user($id);

// user posts
$posts = Post::user_posts($id);

// comment users
$user_comments = Comments::user_comments($id);

// users replies
$user_replies = Replies::user_replies($id);

function time_stamp($time) 
    {
        $comment_date = new DateTime($time);
         $now = new DateTime();
         $int = $now->diff($comment_date);

           if ($int->days > 0)
            { 
                return $int->days . ' day' . ($int->days > 1 ? 's' : '') . ' ago';
            }

             elseif ($int->h > 0) 
            {
                 return $int->h . ' hour' . ($int->h > 1 ? 's' : '') . ' ago'; 
            }

             elseif ($int->i > 0) 
            { 
                return $int->i . ' minute' . ($int->i > 1 ? 's' : '') . ' ago'; 
            } 
             
             else 
             {
                 return $int->s . ' second' . ($int->s > 1 ? 's' : '') . ' ago';
                 
            }
    }


$color = match($user['roles']) 
{
    'admin' => 'green',
    'moderator' => 'black' ,
    'user' => 'yellow' ,
    'guest' => 'blue',
    default => 'white'
};

$background = $color === 'black' ? 'gray' : $color;
    
    echo "<div class='border-2 border-gray-900 text-white bg-black flex justify-center items-center rounded-xl '>
    <span <span style='color: $background'  class='font-bold text-xl uppercase' style='color: $color'>{$user['roles']}</span>
    </p><h2  class='flex justify-center items-center font-bold p-4 uppercase'>{$user['name']}</h2>
    </div>";
    
    echo "<p class='border-2 border-black text-blue font-bold flex justify-center items-center p-4 rounded-xl gap-4 bg-gray-900 m-1'>
    The Posts Of <span style='color: $background;' style='color: $color'>{$user['name']}</span>
    </p>";
    
    ?>

    <!-- Posts -->
    <?php foreach ($posts as $post): ?>
    <div class="w-full flex justify-center items-center p-2 flex-col ">
        <div class='w-full max-w-4xl p-4 font-bold border-2 border-black m-2 rounded-lg'>
            <!-- Post Title -->
            <div class='flex justify-center items-center bg-black p-2 rounded-lg mb-2'>
                <span class='text-white'><?= $post['title'] ?></span>
            </div>
            <!-- Post Body -->
            <div class='p-2 font-bold border-2 border-black m-2 rounded-xl bg-gray-900'>
                <span class='text-white'><?= $post['body'] ?></span>
            </div>

            <!-- Comments -->
            <?php foreach ($user_comments as $comment): ?>
           
            <div class='p-4 mb-6 rounded-xl'>
                <div class="border-2 border-black p-2 rounded-xl gap-4 flex flex-col bg-black">
                    <div style="color: <?= $color ?>" class='border-2 p-2 rounded-xl border-gray-700'>
                        <?= $comment['name'] ?><span class="text-white"> Comment</span>
                    </div>
                    <div class="flex flex-col justify-between text-white">
                        <span class='text-left'><?= $comment['comment'] ?></span>
                        <span class="text-gray-500 mt-2">
                            <h2 class="text-white text-right "><?= time_stamp($comment['created_at']) ?></h2>
                        </span>
                    </div>

                    <!-- Replies -->
                    <div class="flex flex-col gap-4 w-full mt-4">
                        <?php foreach ($user_replies as $reply): ?>
                        
                        <div class="border-2 p-2 rounded-xl bg-white">
                            <div style="color: <?= $color ?>" class="font-bold">
                                <span class='bg-black rounded-xl flex gap-4 p-2'><?= $reply['name'] ?> <span class='text-white'> Reply</span></span> 
                            </div>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-black"><?= $reply['reply'] ?></span>
                                <h6 class="text-gray-500"><?= time_stamp($reply['created_at']) ?></h6>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endforeach; ?>


</body>