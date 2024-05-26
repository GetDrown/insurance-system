<?php include '../../includes/header.php'; ?>

<body>
    <!-- sidebar -->
    <?php include '../../includes/sidebar.php'; ?>

    <!-- main-content -->
    <div class="basis-5/6  h-dvh p-3 rounded-lg overflow-hidden bg-gray-200 flex flex-col">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between mb-4 drop-shadow-md">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Clients</h1>
            </div>
            <div class="border-2 border-lime-600 rounded-md flex justify-between items-center pr-2">
                <div class="bg-lime-600 h-full p-2 text-white">
                    Search Client
                </div>
                <input type="text" placeholder="type here.." class="px-3 py-2 rounded-md focus:outline-none">
                <span><i class="fa-solid fa-magnifying-glass text-lime-600"></i></span>
            </div>
        </div>
        <!-- body -->
        <div class="h-full rounded-md overflow-y-auto bg-white drop-shadow-md p-5 grid grid-cols-3 gap-5">
            <?php for ($i=0; $i < 24; $i++) {  ?>
            <div class="bg-lime-300 h-[220px] rounded-md drop-shadow-md p-5 ">
                <div class="flex items-center justify-start border-b-2 border-gray-500 ">
                    <span class="border-2 border-gray-500 rounded-md p-3 mr-5 mb-3 ">
                        <i class=" fa-solid fa-user text-[44px] text-white"></i>
                    </span>
                    <div>
                        <p>Username</p>
                        <p>Password</p>
                    </div>
                </div>
                <div class="mt-3">
                    <p>Name</p>
                    <p>Contact No.</p>
                    <p>Address</p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>