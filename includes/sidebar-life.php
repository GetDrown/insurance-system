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
       
        <li class="logout">
            <a href="../phpscript/logout.php" class="flex w-[230px] hover:bg-red-500 p-3 rounded-lg">
                <div class="img-container">
                    <img src="../../assets/image/logout.png" alt="">
                </div>
                <span class="ml-3 text-white">Logout</span>
            </a>
        </li>
    </ul>
</div>