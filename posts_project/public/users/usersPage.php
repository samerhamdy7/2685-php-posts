<link rel="stylesheet" href="../css/styles.css">

<div class="w-full sm:w-1/1 sm:justify-center sm:items-center md:w-1/2 lg:w-1/3 p-2">
    <div class=" overflow-hidden shadow-lg p-8 rounded-xl bg-gray-500 h-full ">
        <div class="text-center mb-6">
            <img src="back developer.png" alt="User Image" class="w-full rounded-full mx-auto" />
        </div>
        <div class="flex-col items-center justify-evenly border-2 border-black rounded-md p-2 mx-auto">
            <h2 class="text-xl font-bold">ID: <?= $u['id'] ?></h2>
            <p class="text-white font-bold p-1 flex gap-4"><span class="text-gray-900">Role:</span>
                <?php $color = match($u ['roles']) {'admin' => 'green', 'moderator' => 'black' , 'user' => 'yellow' , 'guest' => 'blue', default => 'white'} ?>
                <span style="color: <?= $color ?>"><?=$u['roles']?> </span>
            </p>
            <!-- Name -->
            <p class="text-white font-bold p-1 flex gap-4"><span class="text-gray-900">Name:</span> <?= $u ['name']?>
            </p>
            <!-- Email -->
            <p class="text-white font-bold p-1 flex gap-4"><span class="text-gray-900">Email:</span> <?= $u ['email'] ?>
            </p>
            <!-- Mobile -->
            <p class="text-white font-bold p-1 flex gap-4"><span class="text-gray-900">Mobile:</span><?= $u['mobile'] ?>
            </p>
            <!-- TimeStamp -->
            <div class="border-4 border-gray-700 flex justify-center items-center flex-wrap gap-2 rounded-lg">
                <p class="text-white font-bold p-1 flex gap-6"><span
                        class="text-green-800">Created_at:</span><?= $u['created_at'] ?> </p>
                <p class="text-white font-bold p-1 flex gap-6"><span
                        class="text-yellow-700">Updated_at:</span><?= $u['updated_at'] ?> </p>
                <p class="text-white font-bold p-1 flex gap-6"><span class="text-red-900">Deleted_at:</span>
                    <?php if(is_null($u['deleted_at'])): ?>
                    <span>Not Deleted</span>
                    <?php else: ?> <span>
                        <? echo $u['Deleted_at']?>
                    </span>
                </p>
                <?php endif ?>

                
            </div>
            <div class="font-bold flex justify-center items-center border-2 border-black p-2 rounded-xl hover:border-gray-900 hover:text-gray-900 m-2">
                <a href="user.php?id=<?= $u['id'] ?>">View Profile</a>
            </div>
        </div>
    </div>
</div>