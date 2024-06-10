<?php 
include '../../includes/header.php';
include '../../dbconf/db_config.php';

// Sums all the policy quantity
$sql = "SELECT SUM(non_life_qty) AS total_remaining_policies FROM non_life_policy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fectch the sum
    $row = $result->fetch_assoc();
    $total_remaining_policies = $row['total_remaining_policies'];
} else {
    $total_remaining_policies = 0;
}


// counts the policy holder
$sql = "SELECT COUNT(DISTINCT transaction_id) AS total_customers FROM transactions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // fetch the number of policy holder
    $row = $result->fetch_assoc();
    $total_customers = $row['total_customers'];
} else {
    $total_customers = 0;
}
?>

<body>
    <!-- check files -->
    <dialog data-check-file-modal class="h-[590px] w-[800px] p-5 text-center ">
        <div class="h-full flex flex-col items-center justify-between">
            <div>
                <p class="text-[28px] text-gray-500">Submitted Scanned Proofs</p>
            </div>
            <div class="overflow-hidden w-full">
                <div class="border-dashed border-4 w-full h-[430px] grid grid-cols-4 gap-4 p-3 overflow-y-auto">
                    <?php for ($i=0; $i < 1 ; $i++) { ?>
                    <div class="border h-[170px]  rounded-md p-3">
                        <i class="fa-solid fa-file-lines text-[70px] text-gray-500"></i>
                        <p class="font-medium">Vehicle Registration Certificate</p>
                        <button class="text-sky-500 font-medium mt-4 rounded-md">view File</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="w-[300px]">
                <button data-check-file-modal-close
                    class="px-3 py-1 mt-2 rounded-md bg-red-500 text-white border ">Close</button>
            </div>
        </div>
    </dialog>
    <!-- expiring dialog -->
    <dialog data-expiring-modal class="h-[300px] w-[600px]">
        <div class="w-full h-full flex flex-col justify-between items-center p-1">
            <!-- title -->
            <div class="flex justify-between items-start w-full">
                <h1 class="font-medium text-lime-600 ">Expiring Policy</h1>
                <button data-close-expiring-modal class=" text-red-500 text-[24px] rounded-lg"><i
                        class="fa-solid fa-circle-xmark"></i></button>
            </div>
            <!-- contnetn -->
            <div class=" w-full h-[270px] flex flex-col justify-center items-center">
                <p id="expiringUsername" class="text-[22px] text-gray-600 font-medium"></p>
                <p id="expiringUserID" class="italic text-gray-500 text-sm">ID: 01</p>
                <div class="grid grid-cols-3 text-center mt-5 h-[150px]">
                    <div class="border-l-2">
                        <p class="text-gray-500 font-medium text-sm mb-3">Policy</p>
                        <p id="expiringPolicy" class="text-[22px]"></p>
                    </div>
                    <div class="border-x-2">
                        <p class="text-gray-500 font-medium text-sm mb-3" mt-3>Expiration</p>
                        <p id="expiringDuration" class="text-[22px]">June 11, 2024, 3:47am</p>
                    </div>
                    <div class="border-r-2 flex flex-col justify-between items-center">
                        <p class="text-gray-500 font-medium text-sm mb-3">Client Notified?</p>
                        <p id="notified" class="text-lime-500 text-[22px]">yes</p>
                        <button
                            class="text-blue-400 text-sm font-medium border py-1 px-3 rounded-md hover:text-white hover:bg-blue-400">Notify
                            Client</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </dialog>
    <!-- pending dialog -->
    <dialog data-pending-modal class=" h-[530px] w-[800px]">
        <div class="flex justify-between items-start w-full">
            <h1 class="font-medium text-lime-600 ">
                Pending Application</h1>
            <button data-close-pending-modal class=" text-red-500 text-[24px] rounded-lg"><i
                    class="fa-solid fa-circle-xmark"></i></button>
        </div>
        <form action="nonlifepolicy.php" method="post" class="w-full h-[450px] grid grid-cols-3 overflow-hidden">
            <input type="hidden" id="previousPage" name="previousPage" value="<?php echo $current_page; ?>">
            <!-- client info -->
            <div class=" w-full h-full flex flex-col justify-center items-center border-r-2 pr-2">
                <div class="border-black border-2 p-2 rounded-3xl"><i class="fa-solid fa-user text-[74px]"></i></div>
                <!-- client name     -->
                <p id="pendingUsername" class="text-[22px] text-gray-600 font-medium mt-5"></p>
                <p class="italic text-gray-500 text-sm">Client Name</p>
                <!-- profession -->
                <p class="text-[18px] text-gray-600 font-medium mt-5 text-center">
                    High School Teacher
                </p>
                <p id="pendingProfession" class="italic text-gray-500 text-sm">Client Profession</p>
                <!-- address -->
                <p class="text-[18px] text-gray-600 font-medium mt-5 text-center">
                    Prk. Melon, New Visayas, Panabo City
                </p>
                <p class="italic text-gray-500 text-sm">Address</p>
                <!-- contatct num -->
                <p class="text-[18px] text-gray-600 font-medium mt-5">0986 797 2981</p>
                <p class="italic text-gray-500 text-sm">Contact Info</p>
            </div>
            <!-- insurance info -->
            <div class=" w-full h-[450px] col-span-2 overflow-hidden grid grid-cols-2">
                <div class="col-span-2 flex flex-col justify-center items-center border-b-2 mb-3">
                    <input type="text" id="pendingPolicy" name="policyName" class="text-[22px] w-full capitalize"
                        value="..." readonly>
                </div>


                <div class="col-span-2 grid grid-cols-2 overflow-y-auto">
                    <!-- left -->
                    <div class="pl-3 border-r-2">
                        <!-- model -->
                        <div class="mb-4">
                            <input type="text" name="model" value="Yamaha YZF-R3"
                                class="font-medium text-gray-500 text-sm w-full focus:outline-none" readonly>
                            <p id="expiringUserID" class="italic text-gray-500 text-sm">Model</p>
                        </div>
                        <!-- maker -->
                        <div class="mb-4">
                            <input type="text" name="make" value="Yamaha"
                                class="font-medium text-gray-500 text-sm w-full focus:outline-none" readonly>
                            <p id="expiringUserID" class="italic text-gray-500 text-sm">Make</p>
                        </div>
                        <!-- body -->
                        <div class="mb-4">
                            <input type="text" name="body" value="Sport"
                                class="font-medium text-gray-500 text-sm w-full focus:outline-none" readonly>
                            <p id="expiringUserID" class="italic text-gray-500 text-sm">Type of Body</p>
                        </div>
                        <!-- color -->
                        <div class="mb-4">
                            <input type="text" name="color" value="Green"
                                class="font-medium text-gray-500 text-sm w-full focus:outline-none" readonly>
                            <p id="expiringUserID" class="italic text-gray-500 text-sm">Color</p>
                        </div>
                        <!-- blt -->
                        <div class="mb-4">
                            <input type="text" name="bltFileNo" value="BLT123456789"
                                class="font-medium text-gray-500 text-sm w-full focus:outline-none" readonly>
                            <p id="expiringUserID" class="italic text-gray-500 text-sm">BLT File No</p>
                        </div>
                    </div>
                    <!-- right -->
                    <div class="pl-3">
                        <!-- plate no -->
                        <div class="mb-4">
                            <input type="text" name="plateNo" value="ABC1234"
                                class="font-medium text-gray-500 text-sm w-full focus:outline-none" readonly>
                            <p id="expiringUserID" class="italic text-gray-500 text-sm">Plate No</p>
                        </div>
                        <!-- serial no -->
                        <div class="mb-4">
                            <input type="text" name="serialNo" value="JYARJ22E7KA000123"
                                class="font-medium text-gray-500 text-sm w-full focus:outline-none" readonly>
                            <p id="expiringUserID" class="italic text-gray-500 text-sm">Serial/Chassis No</p>
                        </div>
                        <!-- motor no -->
                        <div class="mb-4">
                            <input type="text" name="motorNo" value="MTR123456789"
                                class="font-medium text-gray-500 text-sm w-full focus:outline-none" readonly>
                            <p id="expiringUserID" class="italic text-gray-500 text-sm">Motor No</p>
                        </div>
                        <!-- capacity -->
                        <div class="mb-4">
                            <input type="text" name="capacity" value="2 persons"
                                class="font-medium text-gray-500 text-sm w-full focus:outline-none" readonly>
                            <p id="expiringUserID" class="italic text-gray-500 text-sm">Authorized Capacity</p>
                        </div>
                        <!-- unladen weight -->
                        <div class="mb-4">
                            <input type="text" name="unladenWeight" value="169 kg"
                                class="font-medium text-gray-500 text-sm w-full focus:outline-none" readonly>
                            <p id="expiringUserID" class="italic text-gray-500 text-sm">Unladen Weight (kgs)</p>
                        </div>
                    </div>
                </div>
                <!-- buttons -->
                <div class="col-span-2 border-t-2 mt-3 pt-3 flex justify-evenly items-center">
                    <button type="submit"
                        class="text-lime-500 text-sm font-medium border py-1 px-3 rounded-md hover:text-white hover:bg-lime-500">
                        Approved Application
                    </button>
                    <button data-check-file-modal-open type="button"
                        class="text-blue-400 text-sm font-medium border py-1 px-3 rounded-md hover:text-white hover:bg-blue-400">
                        View Documents
                    </button>
                </div>
            </div>
        </form>
    </dialog>
    <!-- Approved dialog -->
    <dialog data-approved-modal class="h-[300px] w-[800px]">
        <div class="flex justify-between items-start w-full">
            <h1 class="font-medium text-lime-600 ">
                Approved Application</h1>
            <button data-close-approved-modal class=" text-red-500 text-[24px] rounded-lg"><i
                    class="fa-solid fa-circle-xmark"></i></button>
        </div>
        <div class="h-[200px] bg-white rounded-md border mt-5 w-full">
            <div class="p-2 border-b flex justify-between items-center">
                <div>
                    <p class="text-xs font-medium text-gray-400">Policy:</p>
                    <p class="font-medium text-lime-700 capitalize" id="approvedPolicy"></p>
                </div>
                <div class="">
                    <p class="text-end text-xs font-medium text-gray-400">Effective Date</p>
                    <p class="font-medium text-lime-700">June 5, 2024</p>
                </div>
            </div>
            <div class="p-2 grid grid-cols-3">
                <div class="border-r-2 h-[125px] text-center pt-3">
                    <p class="text-[18px] text-gray-400">Client Name</p>
                    <p class="text-[28px] mt-3 capitalize" id="approvedUsername"></p>
                </div>
                <div class="border-r-2 h-[125px] text-center pt-3">
                    <p class="text-[18px] text-gray-400">Premium</p>
                    <p class="text-[28px] mt-3">₱250/mos.</p>
                </div>
                <div class=" h-[125px] text-center pt-3">
                    <p class="text-[18px] text-gray-400">Duration</p>
                    <p class="text-[24px] mt-4">11 months and 20 days</p>
                </div>
            </div>
        </div>
    </dialog>
    <!-- sidebar -->
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
                <a href="reports.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
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

                    <span class="ml-3 text-white">Customers</span>
                    main
                </a>
            </li>
            <!-- staff -->
            <li class="mb-[25px]">
                <a href="staff.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                    <i class="fa-solid fa-clipboard-user text-white"></i>
                    <span class="ml-3 text-white">Staff</span>
                </a>
            </li>
            <!-- insurance -->
            <li class="mb-[25px]">
                <a href="insurance.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg text-white">
                    <i class="fa-solid fa-file-contract"></i>s
                    <span class="ml-3 ">Insurance</span>
                </a>
            </li>
            <!-- sms -->
            <li class="mb-[25px]">
                <a href="sms.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
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
                <a href="../../phpscript/logout.php" class="flex w-[230px] hover:bg-red-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/logout.png" alt="">
                    </div>
                    <span class="ml-3 text-white">Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- main-content -->
    <div class="basis-5/6 h-dvh flex flex-col justify-start items-center p-3 bg-gray-200">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between  shadow-md">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Dashboard </h1>
                <p class="text-gray-500">Staff</p>
            </div>
            <div>
                <h1 id="currentDate"></h1>
                <h1 class="text-[28px] font-semibold text-end" id="currentTime"></h1>
            </div>
        </div>
        <!-- today data -->
        <div class="h-[260px] w-full bg-white rounded-lg p-5 mt-4 flex flex-col ">
            <p class="text-lime-700 font-medium text-[18px] basis-1/12 mb-2">Today's Data</p>
            <div class="w-full grid grid-cols-4 gap-3 basis-11/12">
                <!-- total income -->
                <div
                    class="bg-lime-200 hover:bg-amber-500  hover:text-white rounded-md flex flex-col justify-between p-2 shadow-md">
                    <div class="flex justify-around items-center w-full mt-7 px-2">
                        <div>
                            <p class="font-normal text-[18px] tracking-wide">Income</p>
                            <p class="font-medium text-[28px] tracking-wider">₱ 0.00</p>
                        </div>
                        <div class="h-[30px] w-[30px]">
                            <span><i class="fa-solid fa-peso-sign text-[50px]"></i></span>
                        </div>
                    </div>
                    <div class="flex justify-around items-center w-full">

                        <?php for ($i = 0; $i < 20; $i++) {
                            echo ('<p class="text-gray-500">*</p>');
                        } ?>
                    </div>
                </div>
                <!-- policy holder -->
                <div
                    class="bg-lime-200 hover:bg-amber-500  hover:text-white rounded-md flex flex-col justify-between p-2 shadow-md">
                    <div class="flex justify-around items-center w-full mt-7 px-2">
                        <div>
                            <p class="font-normal text-[18px] tracking-wide">Policy Holder</p>
                            <p class="font-medium text-[28px] tracking-wider"><?php echo $total_customers; ?></p>
                        </div>
                        <div class="h-[30px] w-[30px]">
                            <span> <i class="fa-solid fa-user-tie text-[50px]"></i></span>
                        </div>
                    </div>
                    <div class="flex justify-around items-center w-full">

                        <?php for ($i = 0; $i < 20; $i++) {
                            echo ('<p class="text-gray-500">*</p>');
                        } ?>

                    </div>
                </div>
                <!-- remaining policies -->
                <div
                    class="bg-lime-200 hover:bg-amber-500  hover:text-white rounded-md flex flex-col justify-between p-2 shadow-md">
                    <div class="flex justify-around items-center w-full mt-7 px-2">
                        <div>
                            <p class="font-normal text-[18px] tracking-wide">Remaining Policies</p>
                            <p class="font-medium text-[28px] tracking-wider"><?php echo $total_remaining_policies; ?>
                            </p>
                        </div>
                        <div class="h-[30px] w-[30px]">
                            <span><i class="fa-solid fa-file-invoice  fa-peso-sign text-[50px]"></i></span>

                        </div>
                    </div>
                    <div class="flex justify-around items-center w-full">

                        <?php for ($i = 0; $i < 20; $i++) {
                            echo ('<p class="text-gray-500">*</p>');
                        } ?>

                    </div>
                </div>
                <!-- expiring -->
                <div
                    class="bg-lime-200 hover:bg-amber-500  hover:text-white rounded-md flex flex-col justify-between p-2 shadow-md">
                    <div class="flex justify-around items-center w-full mt-7 px-2">
                        <div>
                            <p class="font-normal text-[18px] tracking-wide">Expiring Policies</p>
                            <p class="font-medium text-[28px] tracking-wider">0</p>
                        </div>
                        <div class="h-[30px] w-[30px]">
                            <span><i class="fa-solid  fa-business-time text-[50px]"></i></span>
                        </div>
                    </div>
                    <div class="flex justify-around items-center w-full ">

                        <?php for ($i = 0; $i < 20; $i++) { ?>
                        <p class="text-gray-500 ">*</p>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- add policies and staff and transaction history parent container -->
        <div class="h-[310px] w-full rounded-lg mt-4 grid grid-cols-3 gap-4">
            <!-- transaction history -->
            <div class="bg-white rounded-lg col-span-2 overflow-hidden ">
                <div class="w-full p-2 border-b h-[42px] bg-white flex justify-between items-center">
                    <p class="text-lime-700 font-medium">Transaction History</p>
                    <!-- search field -->
                    <div
                        class="border-2 border-lime-600 rounded-md flex justify-between items-center pr-2 h-full w-[320px]">
                        <div class="bg-lime-600 text-white px-2 h-full">
                            <p class="text-sm">Search Transaction</p>
                        </div>
                        <input id="searchBar" type="text" placeholder="date, name, policy or status..."
                            class="pl-2 rounded-md focus:outline-none h-full w-full text-sm text-gray-400">
                        <span><i class="fa-solid fa-magnifying-glass text-lime-600"></i></span>
                    </div>
                </div>
                <!-- history content -->
                <div class="w-full h-[268px] overflow-y-auto py-[5px] px-2 relative">
                    <p id="noClientsMessage" class="absolute inset-0 text-gray-500 hidden">"No Record"</p>
                    <?php for ($i = 0; $i < 3; $i++) {  ?>
                    <div
                        class="client w-full h-[80px] shadow-md mb-4 flex justify-around items-center py-3  rounded-md border">
                        <!-- type of transaction and date -->
                        <div>
                            <p class="text-sm font-medium policy w-[150px]">
                                <?php echo (($i % 3 == 0) ? 'Land Transportation Operators Policy' : (($i % 2 == 0) ? 'Life Insurance Policy' : 'Motorcycle Policy' )); ?>
                            </p>
                            <p class="text-xs text-gray-400 date">May 17, 2024</p>
                        </div>
                        <!-- cliente name -->
                        <div>
                            <h1 class="text-sm font-medium username"><?php echo 'John Doe' . ' ' . $i; ?>
                            </h1>
                            <p class="text-xs text-gray-400">Client</p>
                        </div>
                        <!-- payment and status -->
                        <div class="w-[100px]">
                            <p data-status
                                class="text-sm font-medium <?php echo (($i % 3 == 0) ? 'text-amber-500' : (($i % 2 == 0) ? 'text-lime-500' : 'text-red-500' )) ?> status">
                                <?php echo (($i % 3 == 0) ? 'Expiring' : (($i % 2 == 0) ? 'Approved' : 'Pending' )); ?>
                            </p>
                            <p class="text-xs text-gray-400">Status</p>
                        </div>
                        <!-- buttton -->
                        <button data-status-btn
                            class=" text-blue-400 text-sm font-medium border py-1 px-3 rounded-md hover:text-white hover:bg-blue-400">View</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- add policies and staff -->
            <div class="bg-white rounded-lg flex justify-around items-center">
                <div class="flex flex-col justify-center items-center h-[200px] w-[150px] overflow-hidden">
                    <div class="h-[100px] w-[100px] mb-3">
                        <img src="../../assets/image/pol.png" alt="">
                    </div>
                    <a href="insurance.php"
                        class="bg-neutral-800 text-white py-2 px-5 rounded-lg font-medium shadow-md">Add
                        Policy</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/staff.js"> </script>
    <script src="../../assets/js/time.js"></script>
</body>

</html>