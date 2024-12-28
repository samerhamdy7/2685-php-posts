<script src="https://cdn.tailwindcss.com"></script>
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
</style>
<nav
    class="w-full flex items-center justify-around bg-opacity-90 bg-[#2e0e44] p-2 text-white font-bold rounded-xl z-20 shadow-lg transition-all duration-500 ease-in-out transform hover:scale-105 text-sm">
    <img src="samer_logo2.jpg" width="50px"
        class="rounded-xl border-2 border-black transition-transform duration-300 hover:scale-125">
    <a class='nav-link' href="/">Home</a>
    <a class="nav-link  p-1 rounded-xl block cursor-pointer transition-all duration-300 ease-in-out transform hover:scale-110"
        href="../add_user/add_user.php">Add New User</a>
    <a class="nav-link p-1 rounded-xl block cursor-pointer transition-all duration-300 ease-in-out transform hover:scale-110"
        href="../users/users.php">All Users</a>
    <a class="nav-link p-1 rounded-xl block cursor-pointer transition-all duration-300 ease-in-out transform hover:scale-110"
        href="../add_post/add_post.php">Add New Post</a>
    <a class="nav-link p-1 rounded-xl block cursor-pointer transition-all duration-300 ease-in-out transform hover:scale-110"
        href="../posts/posts.php">All Posts</a>
</nav>

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
</script>