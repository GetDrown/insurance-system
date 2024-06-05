<?php include '../../includes/header.php'; ?>

<body class="bg-gray-300">
    <!-- Sidebar -->
    <div class="basis-2/12 bg-neutral-800 h-dvh flex flex-col justify-start items-center p-3 md:basis-1/4 lg:basis-1/6">
        <div class="h-[150px] mb-[30px]">
            <img class="h-full" src="../../assets/image/logo.png" alt="">
        </div>
        <ul class="w-full">
            <li class="mb-[25px] ">
                <a href="index.php" class="flex w-full hover:bg-lime-500 p-3 rounded-lg">
                    <div class="h-6 w-6">
                        <img src="../../assets/image/dashboard.png" alt="" class="h-full w-full">
                    </div>
                    <span class="ml-3 text-white">Dashboard</span>
                </a>
            </li>

            <li class="w-full">
                <a href="../../phpscript/logout.php" class="flex w-full hover:bg-red-500 p-3 rounded-lg">
                    <div class="h-6 w-6">
                        <img src="../../assets/image/logout.png" alt="" class="h-full w-full">
                    </div>
                    <span class="ml-3 text-white">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- main-content -->
    <div
        class="basis-10/12 h-dvh flex flex-col justify-start items-center p-3  drop-shadow-lg md:basis-3/4 lg:basis-5/6 overflow-y-auto">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Dashboard </h1>
                <p class="text-gray-500">Welcome Customer</p>
            </div>
            <div>
                <h1 id="currentDate"></h1>
                <h1 class="text-[28px] font-semibold text-end" id="currentTime"></h1>
            </div>
        </div>
        <div class="h-[410px] w-full bg-white rounded-lg mt-4">
            <div class="">
                <div class="w-full p-2 h-[42px] bg-white border-b rounded-lg">
                    <p class="text-lime-700 font-medium">Policy Application Status</p>
                </div>
                <div class="w-full h-[310px] overflow-y-auto py-[5px] px-3">
                    <?php for ($i = 0; $i < 10; $i++) { ?>
                    <div class="w-full h-[50px] shadow-md mb-3 flex justify-around items-center px-3 rounded-md">
                        <div class="w-full h-[50px] shadow-md mb-3 flex justify-around items-center px-3 rounded-md">
                            <!-- type of transaction and date -->
                            <div>
                                <p class="text-sm font-medium">Application for Insurance Policy</p>
                                <p class="text-xs text-gray-400">May 19, 2024</p>
                            </div>
                            <!-- cliente name -->
                            <!--  <div>
                                    <h1 class="text-sm font-medium">Client <?php echo $i + 1; ?></h1>
                                </div> -->
                            <!-- payment and status -->
                            <div>
                                <p class="text-sm font-medium">₱ 1,200.59</p>
                                <p class="text-xs text-red-500">For Approval</p>
                            </div>
                        </div>

                    </div>
                    <?php $i += 1;
                    } ?>
                </div>
            </div>
        </div>

        <div class="h-[410px] w-full bg-white rounded-lg mt-4">
            <div class="">
                <div class="w-full p-2 h-[42px] bg-white border-b rounded-lg">
                    <p class="text-lime-700 font-medium">Policy Status</p>
                </div>
                <div class="w-full h-[310px] overflow-y-auto py-[5px] px-2 rounded-md">
                    <?php for ($i = 0; $i < 10; $i++) { ?>
                    <div class="w-full h-[50px] shadow-md mb-3 flex justify-around items-center px-3 rounded-md">
                        <div class="w-full h-[50px] shadow-md mb-3 flex justify-around items-center px-3 rounded-md">
                            <!-- type of transaction and date -->
                            <div>
                                <p class="text-sm font-medium">Motorcycle Policy</p>
                                <p class="text-xs text-gray-400">May 17, 2024</p>
                            </div>
                            <!-- cliente name
                                <div>
                                    <h1 class="text-sm font-medium">Client <?php echo $i + 2; ?></h1>
                                </div> -->
                            <!-- payment and status -->
                            <div>
                                <p class="text-sm font-medium">₱ 1,340.79</p>
                                <p class="text-xs text-lime-500">Active</p>
                            </div>
                        </div>

                    </div>
                    <?php $i += 1;
                    } ?>
                </div>
            </div>
        </div>
    </div>
</body>