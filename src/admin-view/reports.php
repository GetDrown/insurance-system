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
                <a href="reports.php"
                    class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg <?php echo ($current_page == 'reports.php') ? 'bg-lime-500' : ''; ?>">
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
    <div class="basis-5/6  h-dvh">
        <h1 class="">reports</h1>
        <form action="" class="flex flex-col w-[300px]">
            <div class="h-[35px] flex mb-5">
                <div
                    class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                    Username</div>
                <input type="text"
                    class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
            </div>

            <div class="h-[35px] flex mb-5">
                <div
                    class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                    Password</div>
                <input type="text"
                    class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
            </div>

            <div class="flex justify-around items-center ">
                <button class="bg-lime-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Add Staff</button>
                <button class="bg-red-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>