<div class="w-full sm:w-1/1 sm:justify-center sm:items-center md:w-1/2 lg:w-1/3 p-2 fade-in overflow-x-hidden">
    <div class="overflow-hidden shadow-lg p-8 rounded-xl bg-gray-600 bg-opacity-90 border-b-2 border-purple-900 z-10 h-full">
        <div class="border-2 border-black rounded-md p-2 mx-auto h-full flex flex-col ">

            <!-- ID -->
            <p class="text-xl font-bold">ID : <?= $post['id'] ?></p>

            <!-- Title -->
            <p class="text-white font-bold p-1 gap-4"><span class="text-black">TITLE : </span><span
                    class="block"><?= $post['title'] ?></span></p>

            <!-- Body -->
            <p class="text-white font-bold p-1 gap-4"><span class="text-black">Body : </span> <span
                    class="block"><?= $post['body'] ?></span></p>

            <!-- Post From User_ID -->
            <p class="text-white font-bold p-1 gap-4 flex "><span class="text-black">This Post From User_ID :
                </span><?= $post['user_id'] ?></p>

            <!-- Post Status_ID -->
            <p class="text-white font-bold p-1 gap-4 flex "><span class="text-black">This Post Status Id :
                </span><?= $post['post_status_id'] ?></p>

            <!-- TimeStamp  -->
            <div
                class="border-2 border-black flex justify-between items-center flex-wrap gap-2 rounded-lg mt-auto w-full">
                <p class="text-white font-bold p-1 flex gap-6"><span
                        class="text-green-600">Created_at:</span><?= $post['created_at'] ?> </p>
                <p class="text-white font-bold p-1 flex gap-6"><span
                        class="text-yellow-600">Updated_at:</span><?= $post['updated_at'] ?> </p>
                <p class="text-white font-bold p-1 flex gap-6"><span class="text-red-600">Deleted_at:</span>
                    <?php if(is_null($post['deleted_at'])): ?>
                    <span>Not Deleted</span>
                    <?php else: ?> <span>
                        <?= $post['Deleted_at']?>
                    </span>
                </p>
                <?php endif ?>

            </div>
            <div
                class="font-bold flex justify-center items-center border-2 border-black p-2 rounded-xl hover:border-gray-900 hover:text-gray-900 m-2">
                <a href="post.php?id=<?= $post['id'] ?>">View Post</a>
            </div>
        </div>

    </div>

</div>