<?php include '../../includes/header.php';
session_start();
if (!isset($_SESSION["username"]) || $_SESSION["user_role"] != 3) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<body class="bg-gray-300">
    <!-- add files -->
    <dialog data-add-file-modal class="h-[500px] w-[500px] p-5 text-center ">
        <div class="h-full flex flex-col items-center justify-between">
            <div>
                <p class="text-[28px] text-gray-500">Provide Scanned Proofs</p>
                <p class="italic text-sm text-gray-500">(example: Police Report)</p>
            </div>
            <div class="border-dashed border-4 w-full h-[330px] flex flex-col justify-evenly items-center">
                <i class="fa-solid fa-cloud-arrow-up text-[100px] text-gray-500"></i>
                <div>
                    <p class="font-medium">Drop Files Here</p>
                    <p class="font-medium">or</p>
                    <button class="border bg-sky-500 text-white px-3 py-1 mt-4 rounded-md">Browse</button>
                </div>
                <div>
                    <p class="text-gray-400 text-sm">Current Size Size: 0 MB</p>
                    <p class="text-gray-400 text-sm">Maximum Total Size: 4.5 MB</p>
                </div>
            </div>
            <div class="w-full flex justify-end items-end gap-3">
                <button class="px-3 py-1 mt-2 rounded-md bg-lime-500 text-white border">Submit</button>
                <button data-add-file-modal-close class="px-3 py-1 mt-2 rounded-md bg-red-500 text-white border">Cancel</button>
            </div>
        </div>
    </dialog>
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
    <div class="basis-10/12 h-dvh flex flex-col justify-start items-center p-3  drop-shadow-lg md:basis-3/4 lg:basis-5/6 overflow-hidden">
        <div class="basis-10/12 h-dvh flex flex-col justify-start items-center p-3  drop-shadow-lg md:basis-3/4 lg:basis-5/6 overflow-hidden">
            <!-- header -->
            <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between">
                <div>
                    <h1 class="font-medium text-[28px] text-lime-700">Dashboard </h1>
                    <p class="text-gray-500">Welcome Customer</p>
                </div>
                <div>
                    <button id="mainBtn" class="bg-lime-600 px-3 py-2 rounded-md drop-shadow-md font-semibold text-white"><i class="fa-regular fa-square-plus"></i> Apply for Insurance</button>
                    <div id="dropdownBtn" class="absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="mainBtbn">
                            <button id="nonLifeBtn" class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100">Non-Life
                                Policy</button>
                            <button id="lifePolicyBtn" class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100">Life Policy</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- policies and stuff -->
            <div class="w-full h-[600px] rounded-md overflow-hidden">
                <div class="grid grid-cols-1 gap-3 w-full h-[590px] mt-3 overflow-y-auto">
                    <?php for ($i = 0; $i < 3; $i++) {  ?>
                        <div class="h-[200px] bg-white rounded-md shadow-md">
                            <div class="p-2 border-b flex justify-between items-center">
                                <div>
                                    <p class="text-xs font-medium text-gray-400">Policy:</p>
                                    <p class="font-medium text-lime-700">Motorcycle Policy </p>
                                </div>
                                <div class="">
                                    <p class="text-end text-xs font-medium text-gray-400">Effective Date</p>
                                    <p class="font-medium text-lime-700">June 5, 2024</p>
                                </div>
                            </div>
                            <div class="p-2 grid grid-cols-3">
                                <div class="border-r-2 h-[125px] text-center pt-3">
                                    <p class="text-[18px] text-gray-400">Premium</p>
                                    <p class="text-[28px]">₱250/mos.</p>
                                </div>
                                <div class="border-r-2 h-[125px] text-center pt-3">
                                    <p class="text-[18px] text-gray-400">Duration</p>
                                    <p class="text-[24px]">11 months and 20 days</p>
                                </div>
                                <div class="h-[125px] text-center pt-3">
                                    <p class="text-[18px] text-gray-400">Claims Inurance</p>
                                    <button data-add-file-modal-open class="px-5 py-2 border rounded-md shadow-md mt-3 bg-lime-500 text-white">Claim</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <script>
            const filesModal = document.querySelector('[data-add-file-modal]');
            const closeModal = document.querySelector('[data-add-file-modal-close]');
            document.querySelectorAll('[data-add-file-modal-open]').forEach(btn => {
                btn.addEventListener('click', function() {
                    filesModal.showModal();
                });
            });

            closeModal.addEventListener('click', function() {
                filesModal.close();
            });


            document.getElementById('mainBtn').addEventListener('click', function() {
                var dropdownButtons = document.getElementById('dropdownBtn');
                dropdownButtons.classList.toggle('hidden');
            });

            document.getElementById('nonLifeBtn').addEventListener('click', (event) => {
                window.location.href = './nonlifepolicy.php';
            });
            document.getElementById('lifePolicyBtn').addEventListener('click', (event) => {
                window.location.href = './lifepolicy.php';
            });
        </script>
</body>