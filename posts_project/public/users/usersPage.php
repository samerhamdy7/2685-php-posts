<div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2 fade-in overflow-x-hidden">
    <div class="overflow-hidden shadow-lg p-6 rounded-xl bg-gray-500 h-full flex flex-col justify-between">
        <div class="border-2 border-black rounded-md p-2 h-full flex flex-col">
            <!-- ID -->
            <p class="text-xl font-bold">ID: <?= $user['id'] ?></p>
            <!-- Role -->
            <p class="text-white font-bold p-1 flex gap-4">
                <span class="text-black">Role:</span>
                <?php $color = match($user['roles']) {
                    'admin' => 'green',
                    'moderator' => 'black',
                    'user' => 'yellow',
                    'guest' => 'blue',
                    default => 'white'
                } ?>
                <span style="color: <?= $color ?>"><?= $user['roles'] ?></span>
            </p>
            <!-- Name -->
            <p class="text-white font-bold p-1">
                <span class="text-black">Name:</span>
                <?= $user['name'] ?>
            </p>
            <!-- Email -->
            <p class="text-white font-bold p-1">
                <span class="text-black">Email:</span>
                <?= $user['email'] ?>
            </p>
            <!-- Mobile -->
            <p class="text-white font-bold p-1">
                <span class="text-black">Mobile:</span>
                <?= $user['mobile'] ?>
            </p>
            <!-- TimeStamp -->
            <div class="border-2 border-black p-2 rounded-lg w-full mt-auto">
                <p class="text-white font-bold p-1 flex gap-6">
                    <span class="text-green-800">Created_at:</span><?= $user['created_at'] ?>
                </p>
                <p class="text-white font-bold p-1 flex gap-6">
                    <span class="text-yellow-700">Updated_at:</span><?= $user['updated_at'] ?>
                </p>
                <p class="text-white font-bold p-1 flex gap-6">
                    <span class="text-red-900">Deleted_at:</span>
                    <?php if (is_null($user['deleted_at'])): ?>
                        <span>Not Deleted</span>
                    <?php else: ?>
                        <span><?= $user['deleted_at'] ?></span>
                    <?php endif ?>
                </p>
            </div>
            <div class="font-bold flex justify-center items-center border-2 border-black p-2 rounded-xl hover:border-gray-900 hover:text-gray-900 m-2">
                <a href="user.php?id=<?= $user['id'] ?>">View Profile</a>
            </div>
        </div>
    </div>
</div>
