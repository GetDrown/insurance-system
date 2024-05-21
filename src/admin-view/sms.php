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
                <a href="sms.php"
                    class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg <?php echo ($current_page == 'sms.php') ? 'bg-lime-500' : ''; ?>">
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
        <h1 class="">sms test </h1>
    </div>
</body>

</html>