
<div class="w-full sm:w-1/1 sm:justify-center sm:items-center md:w-1/2 lg:w-1/3 p-2">
        <div class="overflow-hidden shadow-lg p-8 rounded-xl bg-gray-500 h-full">
            <div class="border-2 border-black rounded-md p-2 mx-auto h-full flex flex-col ">
                
                <!-- ID -->
                <p class="text-xl font-bold">ID : <?= $p['id'] ?></p>

                <!-- Title -->
                <p class="text-white font-bold p-1 gap-4"><span class="text-black">TITLE : </span><span
                        class="block"><?= $p['title'] ?></span></p>

                        <!-- Body -->
                <p class="text-white font-bold p-1 gap-4"><span class="text-black">Body : </span> <span
                        class="block"><?= $p['body'] ?></span></p>

                        <!-- Post From User_ID -->
                <p class="text-white font-bold p-1 gap-4 flex "><span class="text-black">This Post From User_ID :
                    </span><?= $p['user_id'] ?></p>

                    <!-- Post Status_ID -->
                <p class="text-white font-bold p-1 gap-4 flex "><span class="text-black">This Post Status Id :
                    </span><?= $p['post_status_id'] ?></p>

                    <!-- TimeStamp  -->
                <div class="border-4 border-gray-700 flex justify-between items-center flex-wrap gap-2 rounded-lg mt-auto w-full">
                    <p class="text-white font-bold p-1 flex gap-6"><span
                            class="text-green-800">Created_at:</span><?= $p['created_at'] ?> </p>
                    <p class="text-white font-bold p-1 flex gap-6"><span
                            class="text-yellow-700">Updated_at:</span><?= $p['updated_at'] ?> </p>
                    <p class="text-white font-bold p-1 flex gap-6"><span class="text-red-900">Deleted_at:</span>
                        <?php if(is_null($p['deleted_at'])): ?>
                        <span>Not Deleted</span>
                        <?php else: ?> <span>
                            <? echo $p['Deleted_at']?>
                        </span>
                    </p>
                    <?php endif ?>

                </div>
            </div>


        </div>

    </div>