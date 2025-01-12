<?php

require __DIR__ .'/../../load.php';

$id = $_GET['id'];

if($id === ''){
    header('location: posts.php');
}

use public\Classes\{
  Post
};

$post = Post::single_item($id);
// dd($post);

use public\Classes\ {
    Comments
};
$user_comment = Comments::user_comments($id);
// dd($comment);

use public\Classes\ {
    Replies
};
$user_replies = Replies::user_replies($id);
// dd($user_replies);

$single_post = Post::single_user_post($id);
// dd($single_post);


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
?>

<link rel="stylesheet" href="../css/styles.css">

<body class="text-white bg-[#090620] bg-opacity-90 border-b-2 z-10 fade-in overflow-x-hidden">

    <?php require '../layout/navbar.php'?>

    <div class="w-full flex justify-center items-center p-2 flex-col">
        <div class='w-full max-w-4xl p-2 font-bold border-2 border-black m-2 rounded-lg'>
            <p class='p-2 bg-gray-400 rounded-xl flex items-cente justify-center text-black gap-3'>
                <?php if(isset($single_post['name'])):?> <?= $single_post['name']?> <?php else:?> No Name Available <?php endif?><span class=' text-amber-300'>Post</span>
            </p>
            <!-- Post Title -->
            <p class='flex justify-center items-center bg-black p-2 rounded-lg'>
                <?=$post['title'] ?>
            </p>

            <!-- Post Body -->
            <p class='p-2 font-bold border-2 border-black m-2 rounded-xl bg-gray-900'>
                <?=$post['body'] ?>
            </p>

            <!-- Comments -->
            <div class="border-2 border-black p-4 rounded-xl m-2 bg-black">
                <?php foreach($user_comment as $comment): ?>
                <?php $color = match($comment['roles']) {
                    'admin' => 'green',
                    'moderator' => 'purple',
                    'user' => 'yellow',
                    'guest' => 'blue',
                    default => 'white'
                }; ?>
                <div class='mb-6'>
                    <?php if(empty($comment['comment'])): ?>
                    <h2 class="flex items-center justify-center">No comments</h2>
                    <?php else: ?>
                    <h1 style="color: <?=$color?>"><?= $comment['name'] ?> <span class="text-white">Comment</span></h1>
                    <div
                        class="flex flex-col justify-between  p-2 border-2 border-gray-700 rounded-xl bg-black">
                        <p class="flex text-left"><?= $comment['comment'] ?></p>
                        <span class="text-white">
                            <?php if (!empty(time_stamp($comment['created_at']))): ?>
                            <h2 class="text-white text-right"><?= time_stamp($comment['created_at']) ?></h2>
                            <?php endif; ?>
                        </span>

                        <!-- Replies Section -->
                        <?php foreach($user_replies as $reply): ?>
                            <?php if(!empty($reply['reply'])): ?>
                            <div class="mt-4">
                            <div class="p-2 border-2 border-black rounded-xl bg-gray-800 w-full flex flex-col">
                                <span class="text-white" style="color: <?= $color?>"><?= $reply['name'] ?> <span class='text-white'>replied:</span></span>
                                <p><?= $reply['reply'] ?></p>
                                <h6 class="text-white text-right"><?= time_stamp($reply['created_at'])?></h6>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


</body>