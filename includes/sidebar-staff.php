<div class="basis-2/12 bg-neutral-800 h-dvh flex flex-col justify-start items-center p-3">
    <div class="h-[100px] mb-[30px]">
        <img class="h-full" src="../../assets/image/logo.png" alt="">
    </div>
    <ul>
        <!-- dashboard link -->
        <li class="mb-[25px] ">
            <a href="index.php"
                class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg <?php echo ($current_page == 'index.php') ? 'bg-lime-500' : ''; ?>">
                <div class="img-container">
                    <img src="../../assets/image/dashboard.png" alt="">
                </div>
                <span class="ml-3 text-white">Dashboard</span>
            </a>
        </li>
        <!-- report link -->
        <li class="mb-[25px]">
            <a href="reports.php"
                class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg <?php echo ($current_page == 'reports.php') ? 'bg-lime-500' : ''; ?>">
                <div class="img-container">
                    <img src="../../assets/image/reports.png" alt="">
                </div>
                <span class="ml-3 text-white">Reports</span>
            </a>
        </li>
        <!-- clients link -->
        <li class="mb-[25px]">
            <a href="clients.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                <div class="img-container">
                    <img src="../../assets/image/Customer.png" alt="">
                </div>
                <span class="ml-3 text-white">Customer</span>
            </a>
        </li>
        <!-- insurance -->
        <li class="mb-[25px]">
            <a href="insurance.php"
                class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg text-white <?php echo ($current_page == 'insurance.php') ? 'bg-lime-500' : ''; ?>">
                <i class="fa-solid fa-file-contract"></i>s
                <span class="ml-3 ">Insurance</span>
            </a>
        </li>
        <!-- sms -->
        <li class="mb-[25px]">
            <a href="sms.php"
                class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg <?php echo ($current_page == 'sms.php') ? 'bg-lime-500' : ''; ?>">
                <div class="img-container">
                    <img src="../../assets/image/sms.png" alt="">
                </div>
                <span class="ml-3 text-white">SMS</span>
            </a>
        </li>
        <!-- claims -->
        <li class="mb-[25px]">
            <a href="claims.php"
                class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg <?php echo ($current_page == 'claims.php') ? 'bg-lime-500' : ''; ?>">
                <i class="fa-solid fa-person-circle-exclamation text-white"></i>
                <span class="ml-3 text-white">Claims</span>
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