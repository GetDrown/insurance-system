<?php include '../../includes/header.php'; ?>

<body class="bg-gray-300">
    <!-- Sidebar -->
    <div class="basis-2/12 bg-neutral-800 h-dvh flex flex-col justify-start items-center p-3 md:basis-1/4 lg:basis-1/6">
        <div class="h-[150px] mb-[30px]">
            <img class="h-full" src="../../assets/image/logo.png" alt="">
        </div>
        <u class="w-full">
            <li class="mb-[25px] ">
                <a href="index.php" class="flex w-full hover:bg-lime-500 p-3 rounded-lg">
                    <div class="h-6 w-6">
                        <img src="../../assets/image/dashboard.png" alt="" class="h-full w-full">
                    </div>
                    <span class="ml-3 text-white">Dashboard</span>
                </a>
            </li>

            <li class="w-full">
                <a href="../../login.php" class="flex w-full hover:bg-red-500 p-3 rounded-lg">
                    <div class="h-6 w-6">
                        <img src="../../assets/image/logout.png" alt="" class="h-full w-full">
                    </div>
                    <span class="ml-3 text-white">Logout</span>
                </a>
            </li>
            </ul>
    </div>
    <!-- main-content -->
    <div class="basis-10/12 h-dvh flex flex-col justify-start items-center p-3  drop-shadow-lg md:basis-3/4 lg:basis-5/6">
        <div class="h-[100px] w-full bg-white rounded-lg">
            <h1 class="">admin view </h1>
        </div>
    </div>
</body>