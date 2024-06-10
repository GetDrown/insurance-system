<?php include '../../includes/header.php';
include '../../dbconf/db_config.php'
?>
<?php

$users = array();
$currentIndex = 0;

$userNum = 0;
$sql = "SELECT COUNT(customer_id) AS total_customers FROM customers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userNum = $row['total_customers'];
}
main
?>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.view-status-btn').on("click", function(e) {
            e.preventDefault();
            var customerId = $(this).data('index');
            var customerName = $(this).siblings('.username').text();
            $('#modalUsername').text(customerName);

            $.get('../../phpscript/fetch_data/fetch_transactions.php', {
                customer_id: customerId
            }, function(data) {
                $('#transactionTableBody').html(data);
                $('[data-status-modal]')[0].showModal();
            });
        });

        $(['data-close-status-modal']).on('click', function() {
            $(['data-status-modal'])[0].close();
        })
    });
</script>

<body>
    <!-- sidebar -->
    <?php include '../../includes/sidebar.php'; ?>
    <!-- main-content -->
    <div class="basis-5/6  h-dvh p-3 rounded-lg overflow-hidden bg-gray-200 flex flex-col">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between mb-4 drop-shadow-md">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Customers</h1>
                <p class="text-gray-500">Total Customers: <?php echo $userNum;
                                                            ?></p>

            </div>
            <div class="flex gap-4">
                <div class="border-2 border-lime-600 rounded-md flex justify-between items-center pr-2">
                    <div class="bg-lime-600 h-full p-2 text-white">
                        Search Customers
                    </div>
                    <input id="searchBar" type="text" placeholder="type here.."
                        class="px-2 py-2 rounded-md focus:outline-none">
                    <span><i class="fa-solid fa-magnifying-glass text-lime-600"></i></span>
                </div>


                <button data-open-clients-modal class="bg-lime-600 px-3 py-2 rounded-md drop-shadow-md font-semibold text-white"><i class="fa-regular fa-square-plus"></i> Add
                    Customers</button>
main
            </div>
        </div>
        <!-- body -->
        <div class="h-full rounded-md overflow-y-auto bg-white drop-shadow-md p-5 grid grid-cols-3 gap-5 relative"
            id="clientContainer">
            <p id="noClientsMessage" class="absolute inset-0 text-gray-500 hidden">"No
                clients found"</p>

            <?php
            $sql = "SELECT * FROM customers";
            $result = $conn->query($sql);
            $users = [1];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // $users[] = $row['last_name'] . ", " . $row['first_name']; ?>
            <div class="client bg-gray-600 h-[220px] rounded-md drop-shadow-md p-5 text-white">
                <div class="flex items-center justify-start border-b-2 border-gray-500 ">
                    <span class="border-2 border-gray-500 rounded-md p-3 mr-5 mb-3 ">
                        <i class="fa-solid fa-user text-[46px]"></i>
                    </span>
                    <div>
                        <p class="username font-semibold"><?php echo $row['last_name'] . ", " . $row['first_name']; ?>
                        </p>
                        <button data-open-status-modal data-index="<?php echo $row['customer_id']; ?>"
                            class="view-status-btn text-amber-600 font-medium text-[14px] data-open-status-modal">View
                            Policy
                            Status</button>
                    </div>
                </div>
                <div class="mt-3">
                    <p class="font-semibold"><?php echo $row['last_name'] . ", " . $row['first_name']; ?></p>
                    <p><?php echo $row['phone_num']; ?></p>
                    <p><?php echo $row['customer_address']; ?></p>
                    <!-- <p class="font-semibold">John Doe</p>
                            <p>0986 797 2980</p>
                            <p>Brgy. New Visayas, Panabo City, Davao del Norte</p> -->
                </div>
            </div>
            <?php } ?>
            <?php } ?>
            <?php $conn->close(); ?>
        </div>
    </div>
    <!-- add clients modal -->
    <dialog data-clients-modal class="w-[550px] h-[500px]">
        <div>
            <form action="../../phpscript/addcustomer.php" method="POST" class="flex flex-col px-3">
                <!-- account info -->
                <div>
                    <h1 class="mb-5 font-medium text-lime-600 pla">Account Info</h1>
                    <!-- username -->
                    <input type="text" name="username"
                        class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                        placeholder="Username...">

                    <!-- password -->
                    <input type="password" name="password"
                        class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                        placeholder="Password...">
                    <!-- confirm password -->
                    <input type="password" name="re_enterpass"
                        class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                        placeholder="Confirm Password...">
                </div>
                <!-- clients info -->
                <div>
                    <h1 class="mb-5 font-medium text-lime-600">Customer Info</h1>
                    <!-- username -->
                    <div>
                        <!-- name -->
                        <div class="grid grid-cols-6 gap-2">
                            <input type="text" name="lastname"
                                class="h-[35px] col-span-2 border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="Last Name...">
                            <input type="text" name="firstname"
                                class="h-[35px] col-span-2  border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="First Name...">
                            <input type="text" name="middle_ini"
                                class="h-[35px] col-span-1 border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="Middle Initial...">
                            <input type="text" name="name_ext"
                                class="h-[35px] col-span-1 border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="Ext...">
                        </div>

                        <!-- contacts -->
                        <div class="grid grid-cols-2 gap-3">
                            <input type="text" name="phone_num"
                                class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="Phone no...">
                            <input type="email" name="email_add"
                                class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="Email...">
                        </div>
                        <!-- address-->
                        <input type="text" name="customeraddress"
                            class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                            placeholder="Address...">
                    </div>
                </div>
                <!-- buttns -->
                <div class="flex justify-around items-center ">
                    <button type="submit"
                        class="bg-lime-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Save</button>
                    <button type="button" data-close-clients-modal
                        class="bg-red-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Cancel</button>
                </div>
            </form>
        </div>
    </dialog>
    <!-- policy status dialog -->
    <dialog data-status-modal class=" w-11/12 h-5/6 p-5">

        <div class="flex justify-between items-start">
            <h1 id="modalUsername" class="mb-5 font-medium text-[24px] text-lime-600">test</h1>
            <button data-close-status-modal class=" text-red-500 text-[24px] rounded-lg"><i
                    class="fa-solid fa-circle-xmark"></i></button>
            <!-- username -->
        </div>
        <!-- user policy status table -->
        <div>
            <table class="table-fixed border-collapse border border-lime-500 w-full ">
                <thead>
                    <tr>
                        <th class="border border-lime-500 bg-lime-600 text-white">Policy No.</th>
                        <th class="border border-lime-500 bg-lime-600 text-white">Year</th>
                        <th class="border border-lime-500 bg-lime-600 text-white">Policy</th>
                        <th class="border border-lime-500 bg-lime-600 text-white">Type</th>
                        <th class="border border-lime-500 bg-lime-600 text-white">Status</th>
                        <th class="border border-lime-500 bg-lime-600 text-white">Action</th>
                    </tr>
                </thead>

                <tbody id="transactionTableBody">
                    <!-- <?php for ($i = 0; $i < 3; $i++) { ?>
                        <tr>
                            <td class="py-3 border border-lime-500 text-center">001</td>
                            <td class="py-3 border border-lime-500 text-center">2024</td>
                            <td class="py-3 border border-lime-500 text-center">Motorcycle Policy</td>
                            <td class="py-3 border border-lime-500 text-center"> Non-Life Insurance</td>
                            <td class="py-3 border border-lime-500 text-center flex items-center justify-center">
                                <div id="status" class="w-[100px] text-green-600 bg-white p-2 font-semibold">Active
                                </div>
                            </td>
                            <td class="py-3 border border-lime-500 text-center">
                                <button class="  w-[100px] text-white bg-amber-600 p-1 font-semibold rounded-md">Renew</button>
                            </td>
                        </tr>
 main
                </tbody>
            </table>
        </div>
        <!-- add polciy to client -->
        <div class="relative inline-block text-left mt-5">
            <button id="mainButton" class="px-4 py-2 bg-gray-500 text-white rounded-md">
                <i class="fa-solid fa-square-plus mr-2"></i> Create new Policy
            </button>
            <div id="dropdownButtons"
                class="absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="mainButton">
                    <button id="nonLifeBtn" class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100">Non-Life
                        Policy</button>
                    <button id="lifePolicyBtn" class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100">Life
                        Policy</button>
                </div>
            </div>
        </div>
    </dialog>
    <script>
    document.getElementById('mainButton').addEventListener('click', function() {
        var dropdownButtons = document.getElementById('dropdownButtons');
        dropdownButtons.classList.toggle('hidden');
    });

main

    const openClientsBtn = document.querySelector("[data-open-clients-modal]");
    const closeClientsBtn = document.querySelector("[data-close-clients-modal]");
    const modalClients = document.querySelector("[data-clients-modal]");


    openClientsBtn.addEventListener("click", () => {
        modalClients.showModal();
    });

    closeClientsBtn.addEventListener("click", () => {
        modalClients.close();
    });

    const openStatusBtn = document.querySelectorAll("[data-open-status-modal]");
    const closeStatusBtn = document.querySelectorAll("[data-close-status-modal]");
    const modalStatus = document.querySelector("[data-status-modal]");

    var users = <?php echo json_encode($users); ?>;


    // Add event listener to each open modal button
    openStatusBtn.forEach(btn => {
        btn.addEventListener("click", function() {
            var index = this.getAttribute('data-index');
            document.getElementById('modalUsername').innerText = users[index];
            modalStatus.showModal();


            document.getElementById('nonLifeBtn').setAttribute('data-customer-id', index);
            document.getElementById('lifePolicyBtn').setAttribute('data-customer-id', index);
        });
    });
    // redirect to nonlifepolicy
    document.getElementById('nonLifeBtn').addEventListener('click', (event) => {
        var index = event.target.getAttribute('data-customer-id');
        window.location.href = './nonlifepolicy.php?customer_id=' + index;

        // window.location.href = './nonlifepolicy.php';
    });
    // redirect to life
    document.getElementById('lifePolicyBtn').addEventListener('click', (event) => {
        var index = event.target.getAttribute('data-customer-id');
        window.location.href = './lifepolicy.php?customer_id=' + index;

        // window.location.href = './lifepolicy.php';
    });

    // Add event listener to each close modal button
    closeStatusBtn.forEach(btn => {
        btn.addEventListener("click", function() {
            modalStatus.close();
        });
    });

    document.getElementById('searchBar').addEventListener('input', function() {
        var searchTerm = this.value.toLowerCase();
        var clients = document.querySelectorAll('.client');
        var hasVisibleClients = false;

        clients.forEach(function(client) {
            var username = client.querySelector('.username').textContent.toLowerCase();
            if (username.includes(searchTerm)) {
                client.classList.remove('hidden');
                hasVisibleClients = true;
            } else {
                client.classList.add('hidden');
            }
        });

 main
        // document.getElementById('noClientsMessage').classList.toggle('hidden', hasVisibleClients);
        var element = document.getElementById('noClientsMessage');

        if (!hasVisibleClients) {
            element.classList.remove('hidden');
            element.classList.add('flex', 'items-center', 'justify-center');
        } else {
            element.classList.remove('flex', 'items-center', 'justify-center');
            element.classList.add('hidden');
        }

        document.getElementById('noClientsMessage').classList.toggle('hidden', hasVisibleClients);
    });

    </script>
</body>

</html>