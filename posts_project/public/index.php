<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts Projects</title>
    <link rel="stylesheet" href="../css/styles.css">

    <style>
    body {
        background-image: url('back_developer.png');
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

<body class="bg-gray-500 text-white min-h-screen overflow-hidden">
    <nav
        class='w-full flex items-center justify-around gap-3 outline-none bg-gray-500 p-2 m-2 rounded-xl font-bold hover:text-blue-400'>

        <img src="samer_logo2.jpg" width='50px' class='rounded-xl border-2 border-black hover:scale-125'>
        <a class='hover:text-blue-900' href="/" id="home">Home</a>
        <a class='text-black p-2 rounded-xl bg-green-600 hover:bg-green-400 block cursor-pointer'
            href='../add_user/add_user.php'>Add New User</a>
        <a class='text-black p-2 rounded-xl bg-blue-600 hover:bg-blue-400 block cursor-pointer'
            href='../add_post/add_post.php'>Add New Post</a>

    </nav>
</body>

</html>