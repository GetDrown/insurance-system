<?php include '../../includes/header.php'; ?>

<body>
    <!-- sidebar -->
    <div class="basis-2/12 bg-neutral-800 h-dvh flex flex-col justify-start items-center p-3">
        <div class="h-[150px] mb-[30px]">
            <img class="h-full" src="../../assets/image/logo.png" alt="">
        </div>
        <ul>
            <li class="mb-[25px] ">
                <a href="index.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/dashboard.png" alt="">
                    </div>
                    <span class="ml-3 text-white">Dashboard</span>
                </a>
            </li>
            <li class="mb-[25px]">
                <a href="reports.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/reports.png" alt="">
                    </div>
                    <span class="ml-3 text-white">Reports</span>
                </a>
            </li>
            <li class="mb-[25px]">
                <a href="clients.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/Customer.png" alt="">
                    </div>
                    <span class="ml-3 text-white">Clients</span>
                </a>
            </li>
            <li class="mb-[25px]">
                <a href="policy.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/policy.png" alt="">
                    </div>
                    <span class="ml-3 text-white">Policy</span>
                </a>
            </li>
            <li class="mb-[25px]">
                <a href="sms.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/sms.png" alt="">
                    </div>
                    <span class="ml-3 text-white">SMS</span>
                </a>
            </li>
            <li class="logout">
                <a href="../../index.php" class="flex w-[230px] hover:bg-red-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/logout.png" alt="">
                    </div>
                    <span class="ml-3 text-white">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- main-content -->
    <div class="basis-5/6 h-dvh flex flex-col justify-start items-center p-3 bg-gray-200 drop-shadow-lg">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Dashboard </h1>
                <p class="text-gray-500">Admin</p>
            </div>
            <div>
                <?php
                    // Set the default timezone (change it to your preferred timezone)
                    date_default_timezone_set('Asia/Manila');
                    
                    // Get the current date and time
                    $currentDate = date('l, F j, Y');
                    $currentTime = date('g:i a');
                ?>

                <h1><?php echo $currentDate; ?></h1>
                <h1 class="text-[28px] font-semibold text-end"><?php echo $currentTime; ?></h1>
            </div>
        </div>
        <!-- today data -->
        <div class="h-[260px] w-full bg-white rounded-lg p-5 mt-4 flex flex-col ">
            <p class="text-lime-700 font-medium text-[18px] basis-1/12 mb-2">Today's Data</p>
            <div class="w-full grid grid-cols-4 gap-3 basis-11/12">
                <!-- total income -->
                <div class="bg-lime-200 rounded-md flex flex-col justify-between p-2 shadow-md">
                    <div class="flex justify-around items-center w-full mt-7">
                        <div>
                            <p class="font-normal text-[18px] tracking-wide">Income</p>
                            <p class="font-medium text-[28px] tracking-wider">₱ 0.00</p>
                        </div>
                        <div class="h-[30px] w-[30px]">
                            <img src="../../assets/image/Us Dollar Circled.png" alt="">
                        </div>
                    </div>
                    <div class="flex justify-around items-center w-full">

                        <?php for ($i=0; $i < 20; $i++) { 
                        echo('<p class="text-gray-500">*</p>');
                    } ?>
                    </div>
                </div>
                <!-- policy holder -->
                <div class="bg-lime-200 rounded-md flex flex-col justify-between p-2 shadow-md">
                    <div class="flex justify-around items-center w-full mt-7">
                        <div>
                            <p class="font-normal text-[18px] tracking-wide">Policy Holder</p>
                            <p class="font-medium text-[28px] tracking-wider">0</p>
                        </div>
                        <div class="h-[30px] w-[30px]">
                            <img src="../../assets/image/policy holder.png" alt="">
                        </div>
                    </div>
                    <div class="flex justify-around items-center w-full">

                        <?php for ($i=0; $i < 20; $i++) { 
                        echo('<p class="text-gray-500">*</p>');
                    } ?>

                    </div>
                </div>
                <!-- remaining policies -->
                <div class="bg-lime-200 rounded-md flex flex-col justify-between p-2 shadow-md">
                    <div class="flex justify-around items-center w-full mt-7">
                        <div>
                            <p class="font-normal text-[18px] tracking-wide">Remaining Policies</p>
                            <p class="font-medium text-[28px] tracking-wider">0</p>
                        </div>
                        <div class="h-[30px] w-[30px]">
                            <img src="../../assets/image/remaining policy.png" alt="">
                        </div>
                    </div>
                    <div class="flex justify-around items-center w-full">

                        <?php for ($i=0; $i < 20; $i++) { 
                        echo('<p class="text-gray-500">*</p>');
                    } ?>

                    </div>
                </div>
                <!-- expiring -->
                <div class="bg-lime-200 rounded-md flex flex-col justify-between p-2 shadow-md">
                    <div class="flex justify-around items-center w-full mt-7">
                        <div>
                            <p class="font-normal text-[18px] tracking-wide">Expiring Policies</p>
                            <p class="font-medium text-[28px] tracking-wider">0</p>
                        </div>
                        <div class="h-[30px] w-[30px]">
                            <img src="../../assets/image/expiring policy.png" alt="">
                        </div>
                    </div>
                    <div class="flex justify-around items-center w-full">

                        <?php for ($i=0; $i < 20; $i++) { 
                        echo('<p class="text-gray-500">*</p>');
                    } ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- add policies and staff and transaction history parent container -->
        <div class="h-[310px] w-full rounded-lg mt-4 grid grid-cols-3 gap-4">
            <!-- add policies and staff -->
            <div class="bg-white rounded-lg flex justify-around items-center">
                <div class="flex flex-col justify-center items-center h-[200px] w-[150px] overflow-hidden">
                    <div class="h-[100px] w-[100px] mb-3">
                        <img src="../../assets/image/pol.png" alt="">
                    </div>
                    <button class="bg-neutral-800 text-white py-2 px-5 rounded-lg font-medium">Add Policy</button>
                </div>
                <div class="flex flex-col justify-center items-center h-[200px] w-[150px] overflow-hidden">
                    <div class="h-[100px] w-[100px] mb-3">
                        <img src="../../assets/image/staff2.png" alt="">
                    </div>
                    <button class="bg-lime-300 py-2 px-5 rounded-lg font-medium">Add Staff</button>
                </div>
            </div>
            <!-- transaction history -->
            <div class="bg-white rounded-lg col-span-2 overflow-hidden ">
                <div class="w-full p-2 border-b h-[42px] bg-white">
                    <p class="text-lime-700 font-medium">Transaction History</p>
                </div>
                <!-- history content -->
                <div class="w-full h-[226px] overflow-y-auto py-[5px] px-2">
                    <?php for ($i=0; $i < 10; $i++) {  ?>
                    <div class="w-full h-[50px] shadow-md mb-3 flex justify-around items-center px-3 rounded-md">
                        <!-- type of transaction and date -->
                        <div>
                            <p class="text-sm font-medium">Application for Insurance Policy</p>
                            <p class="text-xs">May 19, 2024</p>
                        </div>
                        <!-- cliente name -->
                        <div>
                            <h1 class="text-sm font-medium">Client <?php echo $i + 1; ?></h1>
                        </div>
                        <!-- payment and status -->
                        <div>
                            <p class="text-sm font-medium">₱ 1,200.59</p>
                            <p class="text-xs text-red-500">Pending</p>
                        </div>
                    </div>
                    <div class="w-full h-[50px] shadow-md mb-3 flex justify-around items-center px-3 rounded-md">
                        <!-- type of transaction and date -->
                        <div>
                            <p class="text-sm font-medium">Application for Insurance Policy</p>
                            <p class="text-xs">May 17, 2024</p>
                        </div>
                        <!-- cliente name -->
                        <div>
                            <h1 class="text-sm font-medium">Client <?php echo $i + 2; ?></h1>
                        </div>
                        <!-- payment and status -->
                        <div>
                            <p class="text-sm font-medium">₱ 1,340.79</p>
                            <p class="text-xs text-lime-500">Approved</p>
                        </div>
                    </div>
                    <?php  $i += 1; }?>
                </div>
                <!-- view btn -->
                <div class="w-full text-center p-2 border-t border-b h-[42px] bg-white">
                    <p>View All Transactions</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>