<?php include '../../includes/header.php'; ?>

<body>
    <!-- sidebar -->
    <?php include '../../includes/sidebar.php'; ?>
    <!-- main-content -->
    <div class="basis-5/6  h-dvh bg-gray-200 flex flex-col overflow-hidden p-3 ">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between mb-1 shadow-md   ">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Messaging</h1>
                <p class="text-gray-500">Admin</p>
            </div>
            <div>
                <h1 id="currentDate"></h1>
                <h1 class="text-[28px] font-semibold text-end" id="currentTime"></h1>
            </div>
        </div>
        <div class=" h-[280px] grid grid-cols-2 gap-2 ">
            <div class="bg-white shadow-md  my-2 rounded-md p-2">
                <div class="w-full p-1 border-b h-[42px] bg-white flex justify-between items-center pb-3">
                    <p class="text-lime-700 font-medium">Users</p>
                    <div class="border-2 border-lime-600 rounded-md flex justify-between items-center   pr-2">
                        <div class="bg-lime-600 h-full p-1 text-white">
                            Search Client
                        </div>
                        <input id="searchBar" type="text" placeholder="type here.."
                            class="px-2 py-1 h-full rounded-md focus:outline-none">
                        <span><i class="fa-solid fa-magnifying-glass text-lime-600"></i></span>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-md  my-2 rounded-md p-2">
                <div class="w-full p-1 border-b h-[42px] bg-white">
                    <p class="text-lime-700 font-medium">Messaging</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md h-[320px] rounded-md overflow-hidden p-2">
            <div class="w-full p-1 border-b h-[42px] bg-white">
                <p class="text-lime-700 font-medium">History</p>
            </div>
        </div>
    </div>
    <script src="../../assets/js/time.js"></script>
</body>

</html>