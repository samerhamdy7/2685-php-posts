<?php

require '../load.php';


$status = Status::all_status();

?>

<link rel="stylesheet" href="../css/styles.css">

<body class="bg-gray-900 flex flex-col items-center justify-center min-h-screen fade-in overflow-x-hidden">
<?php require '../layout/navbar.php'?>
    <form
        class="text-sm bg-parent p-4 rounded-lg shadow-xlg w-full max-w-3xl border-2 border-x-transparent text-center font-bold fade-in-up"
        action="post_store.php" method="POST" novalidate>
        <h2 class="text-2xl font-bold mb-4 text-white text-center border-2 border-white p-1 rounded-xl bg-blue-500">Add
            New Post
        </h2>

        <div class="space-y-4">
            <!-- title -->
            <div>
                <label for="title" class="block text-white font-bold mb-2 bg-black p-1 ">Title</label>
                <input type="text" name="title" required
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                    placeholder="Enter post title" value=<?= @$current_post_data['title'] ?>>
            </div>
            <span class='text-red-500 font-bold'><?= @$post_errors['title_err']?></span>
            <!-- body -->

            <div>
                <label for="body" class="block text-white font-bold mb-2 bg-black p-1">Body</label>
                <textarea name="body" rows="6" required
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
                    placeholder="Write your post content here" value=<?= @$current_post_data['body'] ?>></textarea>
            </div>
            <span class='text-red-500 font-bold'><?= @$post_errors['body_err']?></span>

            <!-- User_ID -->
            <div>
                <label for="user_id" class="block text-white font-bold mb-2 bg-black p-1">User ID</label>
                <input type="number" name="user_id" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 
            focus:ring-blue-500 transition duration-200" placeholder="User ID"
                    value=<?= @$current_post_data['user_id']?>>
            </div>
            <span class='text-red-500 font-bold'><?= @$post_errors['user_id_err']?></span>

            <!-- status-->
            <div>
                <label for="post_status_id" class="block text-white font-bold mb-2 bg-black p-1"
                    value=<?= @$current_post_data['status']?>>post status </label>

                <select name="post_status_id" required class="w-full p-3 border border-gray-300 rounded-xl 
                     focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 font-bold">
                    <?php if(!empty($status)): ?>
                    <?php  foreach($status as $s): ?>
                    <option class="bg-gray-900 text-white font-bold rounded-x" value="<?= $s['id']?>"><?= $s['type']?>
                    </option>
                    <?php endforeach?>
                    <?php endif ?>
                </select>
            </div>
            <span class='text-red-500 font-bold'><?= @$post_errors['status_err']?></span>

            <!-- submite button -->

            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline transition duration-200">
                    Add Post
                </button>
            </div>
        </div>
    </form>

</body>

</html>