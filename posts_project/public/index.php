<?php require_once 'load.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
    .animated-bg {
        background: linear-gradient(135deg, #2e0e44, #feb47b, #ff6a88, #ff9988);
        background-size: 400% 400%;
        animation: gradientAnimation 15s ease infinite;
    }

    .slide-up {
        animation: slideUp 2s ease-in-out forwards;
    }

    @keyframes slideUp {
        0% {
            transform: translateY(-100px);
        }

        100% {
            transform: translateY(10px);
        }
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
    </style>
</head>

<body class="animated-bg text-white bg-[#2e0e44] flex flex-col min-h-screen fade-in justify-center items-center">
    <div class='w-full fixed top-0 z-10'>
        <?php require 'layout/navbar.php' ?>
    </div>
    <div class="flex flex-grow justify-center items-center slide-up z-10 mt-24" id='welcome-container'>
        <h1 class="welcome-text text-3xl font-bold text-black text-center fade-in border-2 border-black p-2 rounded-xl">
            Welcome to Our Website<br>
            We Are 2685 Group
        </h1>
    </div>
</body>
<div class="fade-in mt-8" id='welcome-container'>
    <?php require 'our_group/groups.php' ?>
</div>

<script>
window.onload = function() {
    setTimeout(function() {
        const welcom = welcome - container;
        welcome.classList.add('slide-up')
    }, 2000);
};

</script>

</html>