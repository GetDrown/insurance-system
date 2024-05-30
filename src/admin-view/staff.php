<?php include '../../includes/header.php'; ?>
<?php
    $userNum = 3;
    $users = array();
    $currentIndex = 0;
?>

<body>
    <!-- sidebar -->
    <?php include '../../includes/sidebar.php'; ?>
    <!-- add staff -->
    <dialog data-staff-modal>
        <div class="px-2">
            <h1 class="mb-5 font-medium text-lime-600">Add new Staff</h1>

            <form action="../../phpscript/addstaff.php" s method="POST" class="flex flex-col">
                <!-- username -->
                <div class="h-[35px] flex mb-5">
                    <div
                        class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                        Username</div>
                    <input type="text" name="username"
                        class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
                </div>
                <!-- password -->
                <div class="h-[35px] flex mb-5">
                    <div
                        class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                        Password</div>
                    <input name="password" type="password"
                        class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
                </div>
                <!-- buttns -->
                <div class="flex justify-around items-center ">
                    <button type="submit" class="bg-lime-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Add
                        Staff</button>
                    <button data-close-staff-modal
                        class="bg-red-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Cancel</button>
                </div>
            </form>
        </div>
    </dialog>
    <!-- main-content -->
    <div class="basis-5/6  h-dvh p-3 rounded-lg overflow-hidden bg-gray-200 flex flex-col">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between mb-4 drop-shadow-md">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Staff</h1>
                <p class="text-gray-500">Total Clients: <?php echo $userNum?></p>

            </div>
            <div class="flex gap-4">
                <div class="border-2 border-lime-600 rounded-md flex justify-between items-center pr-2">
                    <div class="bg-lime-600 h-full p-2 text-white">
                        Search Staff
                    </div>
                    <input id="searchBar" type="text" placeholder="type here.."
                        class="px-2 py-2 rounded-md focus:outline-none">
                    <span><i class="fa-solid fa-magnifying-glass text-lime-600"></i></span>
                </div>

                <!-- <button data-open-clients-modal
                    class="bg-lime-600 px-3 py-2 rounded-md drop-shadow-md font-semibold text-white"><i
                        class="fa-regular fa-square-plus"></i> Add
                    Staff</button> -->
                <button data-open-staff-modal
                    class="bg-lime-600 py-2 px-5 rounded-lg font-medium shadow-md text-white"><i
                        class="fa-regular fa-square-plus mr-2"></i>Add Staff
                </button>
            </div>
        </div>
        <!-- body -->
        <div class="h-full rounded-md overflow-y-auto bg-white drop-shadow-md p-5 grid grid-cols-3 gap-5 relative"
            id="clientContainer">
            <p id="noClientsMessage" class="absolute inset-0 text-gray-500 hidden">"No
                Staff Found"</p>

            <?php for ($i = 0; $i < $userNum; $i++) { ?>
            <div class="client bg-gray-600 h-[200px] rounded-md drop-shadow-md p-5 text-white">
                <div class="flex items-center justify-start border-b-2 border-gray-500 ">
                    <span class="border-2 border-gray-500 rounded-md p-3 mr-5 mb-3 ">
                        <i class="fa-solid fa-clipboard-user text-[46px]"></i>
                    </span>
                    <div>
                        <p class="username font-semibold">JaneDoe <?php echo $i; ?></p>
                        <?php 
                            $users[] = "JaneDoe". " " . $i;
                        ?>
                        <div class="flex justify-between items-center w-[250px] mt-2">
                            <button data-index="<?php echo $i;?>"
                                class="view-status-btn text-gray-400 font-medium text-[14px] data-open-status-modal"> <i
                                    class="fa-solid fa-user-pen mr-3"></i> Edit Staff
                            </button>
                            <button data-index="<?php echo $i;?>"
                                class="view-status-btn text-red-100 font-medium text-[14px] data-open-status-modal"> <i
                                    class="fa-solid fa-user-minus  mr-3"></i></i> Delete Staff
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="flex justify-between">
                        <p class="font-medium">Username:</p>
                        <p>JaneDoe</p>
                        <span></span>
                    </div>
                    <div class="flex mt-3 justify-between items-center password-container">
                        <p class="font-semibold">Password:</p>
                        <div class="relative flex items-center">
                            <input type="password"
                                class="password-field text-gray-500 bg-gray-100 rounded-md px-2 py-1 w-52 border border-gray-300"
                                value="JaneDoe123123" disabled>
                            <button class="toggle-password ml-2 focus:outline-none focus:border-none w-[50px]">
                                <i class="fa-solid fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <?php } ?>
        </div>
    </div>
    <script>
    const openStaffBtn = document.querySelector("[data-open-staff-modal]");
    const closeStaffBtn = document.querySelector("[data-close-staff-modal]");
    const modalStaff = document.querySelector("[data-staff-modal]");

    openStaffBtn.addEventListener("click", () => {
        modalStaff.showModal();
    });

    closeStaffBtn.addEventListener("click", () => {
        modalStaff.close();
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

        // document.getElementById('noClientsMessage').classList.toggle('hidden', hasVisibleClients);
        var element = document.getElementById('noClientsMessage');

        if (!hasVisibleClients) {
            element.classList.remove('hidden');
            element.classList.add('flex', 'items-center', 'justify-center');
        } else {
            element.classList.remove('flex', 'items-center', 'justify-center');
            element.classList.add('hidden');
        }

    });

    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function() {
            const passwordField = this.previousElementSibling;
            const passwordFieldType = passwordField.getAttribute('type') === 'password' ? 'text' :
                'password';
            passwordField.setAttribute('type', passwordFieldType);

            this.innerHTML = passwordFieldType === 'password' ?
                '<i class="fa-solid fa-eye-slash"></i>' :
                '<i class="fa-solid fa-eye"></i>';
        });
    });
    </script>
</body>

</html>