<link rel="stylesheet" href="../css/styles.css">

<body class="bg-gray-600 text-white min-h-screen p-6">


    <?php

include '../load.php';


$id = $_GET['id'];

$qry = "SELECT * FROM `pst_users` WHERE `id` = $id ;";


$posts_qry = "SELECT * FROM `pst_posts` WHERE `user_id` = $id ; "; 


$com_qry = "SELECT c.`comment` , c.`created_at` , u.`name` FROM `pst_comments` AS c 
JOIN 
`pst_users` AS u 
ON 
c.user_id = u.id
WHERE 
c.user_id = $id ;";


$user_rep = 
"SELECT 
r.`reply` , r.`created_at` , u.`name` FROM `pst_replies` AS r 
JOIN 
`pst_users` AS u 
ON 
r.user_id = u.id 
WHERE
r.user_id = $id;";

$res = $db->query($qry);
$user = mysqli_fetch_object($res);


$post_res = $db->query($posts_qry);
$posts = mysqli_fetch_all($post_res, MYSQLI_ASSOC);


$com_res = $db->query($com_qry);
$comments = mysqli_fetch_object($com_res);

//var_dump($comments);

$user_res = $db->query($user_rep);
$user_replies = mysqli_fetch_object($user_res);

// var_dump($user_replies);

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


$color = match($user->roles) 
{
    'admin' => 'green',
    'moderator' => 'black' ,
    'user' => 'yellow' ,
    'guest' => 'blue',
    default => 'white'
};

$background = $color === 'black' ? 'gray' : $color;
    
    echo "<div class='border-2 border-gray-900 text-white bg-black flex justify-center items-center rounded-xl '>
    <span <span style='color: $background;'  class='font-bold text-xl uppercase' style='color: $color' >$user->roles</span>
    </p><h2  class='flex justify-center items-center font-bold p-4 uppercase'>$user->name</h2>
    </div>";
    
    echo "<p class='border-2 border-black text-blue font-bold flex justify-center items-center p-4 rounded-xl gap-4 bg-gray-900 m-1'>
    The Posts Of <span style='color: $background;' style='color: $color'>$user->name</span>
    </p>";
    
foreach($posts as $p ):
    ?>
    <div class="w-full flex justify-center items-center p-2 flex-col">

        <div class='w-full max-w-4xl p-2 font-bold border-2 border-black m-2 rounded-lg'>
            <p class='flex justify-center items-center bg-black p-2 rounded-lg'>
                <?= $p['title']?>
            </p>

            <p class='p-2 font-bold border-2 border-black m-2 rounded-xl bg-gray-900'>
                <?= $p['body']?>
            </p>

            <div class='p-4 mb-6'>
                <div class="border-2 border-black p-2 rounded-xl gap-4 flex flex-col">
                    <h1 style="color: <?=$color?>">
                        <?php if(empty($comments->comment)): ?>
                        <h2 class="flex items-center justify-center">No comments</h2>
                        <?php else : ?>
                        <?=$comments->name?> <span class="text-white "> Comment</span>
                    </h1>

                    <div class="flex flex-col justify-between items-end"><?= $comments->comment ?>
                        <span clss="text-black">
                            <h2><?php if (empty(time_stamp($comments->created_at))): ?>
                                <?php else: ?>
                                <h2 class="text-black"><?= time_stamp($comments->created_at) ?></h2>
                                <?php endif; ?>
                            </h2>
                        </span>
                    </div>

                    <div class="flex flex-col gap-4 w-full">
                        <?php if(empty($user_replies->name) || empty($user_replies)): ?>

                        <?php else: ?>

                        <div style=color:<?=$color?> class="border-2 border-black p-2 rounded-xl">
                            <?= $user_replies->name?>
                            <span class="text-white">Reply </span>
                            <div class="flex justify-between">
                                <span class="text-white"><?= $user_replies->reply?></span>
                                <h6 class="text-black"><?= time_stamp($user_replies->created_at) ?></h6>
                            </div>
                        </div>
                    </div>

                    <?php endif ?>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <?php endforeach ?>

</body>