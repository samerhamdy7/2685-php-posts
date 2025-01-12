<?php 


if (session_status() === PHP_SESSION_NONE)
 { session_start(); 
 }
 
 $login_msg = $_SESSION['success'] ?? null ;
 unset($_SESSION['success']);

 $user_role = $_SESSION['roles'] ?? 'guest';

   require_once __DIR__ . '/../profile/msg_notify.php';
 $unread_msg = unread_msg($_SESSION['user_id']);

?>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    transition: all 0.3s
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.slide-up {
    animation: slideUp 1s ease-in-out forwards;
}

.fade-in {
    animation: fadeIn 1s ease-in-out;
}

.active {
    background-color: #6b46c1;
    color: #000000;
    padding: 0.25rem;
    border-radius: 0.5rem;
    display: block;
    cursor: pointer;
    transition: all 300ms ease-in-out;
    transform: scale(1.10);
}


@keyframes fadeOut {
    0% {
        opacity: 1;
    }

    100% {
        opacity: 0;
    }
}

.fade-out {
    animation: fadeOut 0.5s forwards;
}
</style>

<nav
    class="w-full flex items-center justify-around bg-opacity-90 bg-[#2e0e44] p-2 text-white font-bold rounded-xl z-20 shadow-lg transition-all duration-500 ease-in-out transform hover:scale-105 text-sm">
    <img src="../layout/samer_logo2.jpg" width="50px"
        class="rounded-xl border-2 border-black transition-transform duration-300 hover:scale-125">
    <a class='nav-link' href="/">Home</a>
    <?php if($_SESSION['roles'] === 'admin'): ?>
    <a class="nav-link p-1 rounded-xl block cursor-pointer transition-all duration-300 ease-in-out transform hover:scale-110"
        href="../add_user/add_user.php">Add New User</a>
    <?php endif ?>

    <a class="nav-link p-1 rounded-xl block cursor-pointer transition-all duration-300 ease-in-out transform hover:scale-110"
        href="../users/users.php">All Users</a>
    <?php if ($_SESSION['roles'] === 'admin' || $_SESSION['roles'] === 'user'): ?>
    <a class="nav-link p-1 rounded-xl block cursor-pointer transition-all duration-300 ease-in-out transform hover:scale-110"
        href="../add_post/add_post.php">Add New Post</a>
    <?php endif ?>
    <a class="nav-link p-1 rounded-xl block cursor-pointer transition-all duration-300 ease-in-out transform hover:scale-110"
        href="../posts/posts.php">All Posts</a>

    <!-- notify -->

    <a class="nav-link p-1 rounded-xl block cursor-pointer transition-all duration-300 ease-in-out transform hover:scale-110 relative"
        href="../profile/profile.php" id="notification-icon" onclick="notify_msg(event)">
        <i class="fas fa-bell"></i>
        <?php if($unread_msg > 0): ?>
        <span id="unread-count"
            class="absolute top-0 right-0 inline-block w-4 h-4 bg-red-600 text-white text-xs font-bold rounded-full text-center"><?= $unread_msg ?></span>
        <?php endif; ?>
    </a>

    <!-- username -->
    <div class='border-2 border-black text-amber-400 p-1 rounded-xl flex gap-2 bg-black flex-col'>
        <span class='text-white flex gap-1'> Welcome</span>
        <?php if (isset($_SESSION['username'])): ?>
        <a href="../profile/profile.php"
            class='text-amber-400 hover:text-yellow-300 transition ease-in-out duration-300'>
            <?= $_SESSION['username']?>
        </a>
        <?php endif ?>
    </div>

    <!-- login and logout buttons -->
    <div>
        <?php if (isset($_SESSION['token'])): ?>
        <form action="../auth/logout.php">
            <button type="submit"
                class="bg-red-500 p-2 rounded-xl block cursor-pointer transition-all duration-300 ease-in-out transform hover:scale-110">Log
                Out</button>
        </form>
        <?php else: ?>
        <form action="../auth/login.php">
            <button type="submit"
                class="bg-green-500 p-2 rounded-xl block cursor-pointer transition-all duration-300 ease-in-out transform hover:scale-110">Log
                In</button>
        </form>
        <?php endif ?>
    </div>
</nav>



<h2 id='success_msg'
    class='slide-up text-green-500 font-bold text-xl text-center w-2/3 md:w-1/3 lg:w-1/4 p-2 flex items-center justify-center rounded-xl'>
    <?= $login_msg ?></h2>


<script>
document.addEventListener('DOMContentLoaded', () => {
    const nav_links = document.querySelectorAll('.nav-link');

    function setActiveLink(event) {
        nav_links.forEach(link => link.classList.remove('active'));
        event.currentTarget.classList.add('active');
        localStorage.setItem('activeLink', event.currentTarget.href);
    }

    const activeLink = localStorage.getItem('activeLink');
    if (activeLink) {
        nav_links.forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('active');
            }
        });
    }

    nav_links.forEach(link => {
        link.addEventListener('click', setActiveLink);
    });
});

successMsg = success_msg;
const hide_msg = () => {
    setTimeout(() => {
        successMsg.classList.add('fade-out');
    }, 2500);

    setTimeout(() => {
        successMsg.style.display = 'none';
    }, 5000);
}
hide_msg();



function notify_msg(event) {

    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../profile/unread_msg.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText === "success") {
                const unread_msg = unread-count;
                if (unread_msg) {
                    unread_msg.style.display = 'none';
                }
                window.location.href = '../profile/profile.php';
            }
        }
    };
    xhr.send();
}
</script>