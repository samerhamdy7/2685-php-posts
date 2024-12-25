<?php 

session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$database = '2685_php_posts';


$db = new mysqli($host , $user , $password , $database);

function dd($item){
    echo '</pre style="background: #112; color: #3f3; padding: 10px;">';
    var_dump($item);
    echo'</pre>';
};

if(isset($_SESSION['success'])){
    ?>
    <div class="px-2 py-1 max-w-96 mx-auto my-3 border-2 border-green-300 rounded-md bg-green-100 text-green-600 text-lg font-bold shadow-md">
            <?= $_SESSION['success']?>
    </div>
    
    <?php

    unset($_SESSION['success']);
}


