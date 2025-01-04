<?php 

require_once '../load.php';

$register_msg = $_SESSION['success'] ?? null ;
unset($_SESSION['success']);

    if(isset($_SESSION['token'])){
        
        header('Location: /');
    }

if(isset($_POST['email']) && isset($_POST['password']) ){
    
    $res = Auth::login($_POST['email'] , $_POST['password']);

    if($res === true){
        header('location: /');
        
    };

    $errors = $res;

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">

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

</head>

<body class="bg-gray-900 flex items-center justify-center h-screen fade-in">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 id='success_msg' class='text-green-600 p-2 rounded-xl flex justify-center text-center font-bold'><?= $register_msg?></h2>
        <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
        <form action="" method="POST" novalidate>
            <div class="mb-4">
                <label for="email">
                    <input type="email" id="email" name="email" placeholder="Email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <p class="text-red-500 text-sm font-bold"><?= @$errors['email']; ?></p>
                </label>
            </div>
            <div class="mb-4">
                <label for="password">
                    <input type="password" name="password" placeholder="Password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <p class="text-red-500 text-sm font-bold"><?= @$errors['password']; ?></p>
                </label>
            </div>
            <p class='text-red-500 text-sm font-bold'><?= @$errors['general']; ?></p>
        <div class="flex flex-col gap-3">
        <button type="submit"
                class="w-full py-2 bg-green-500 text-white font-bold rounded-lg hover:bg-blue-600">Login</button>
                <a href="register/register.php"
                class="w-full text-center py-2 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600">REGISTER</a>
        </div>
        </form>
    </div>

    <script>
        successMsg = success_msg;

        const hide_msg = ()=> {
            successMsg.style.opacity = '0';
             setTimeout(()=> {successMsg.style.display = 'none'} , 3000);
        }
        hide_msg();
    </script>
</body>

</html>