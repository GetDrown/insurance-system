<?php
include '../../includes/header.php';
include '../../dbconf/db_config.php';

$totalStaff = 0;
$staffs = [];
$sql = "SELECT * FROM users WHERE role_id = 2";
$result = $conn->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $staffs[] = $row;
    }
    $totalStaff = count($staffs);
}
?>

<body>
    <!-- sidebar -->
    <?php include '../../includes/sidebar.php'; ?>
    <!-- add staff -->
    <dialog data-staff-modal class="h-[270px]">
        <div class="px-2">
            <h1 class="mb-5 font-medium text-lime-600">Add new Staff</h1>

            <form action="../../phpscript/addstaff.php" s method="POST" class="flex flex-col">
                <!-- username -->
                <div class="h-[35px] flex mb-5">
                    <div class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                        Staff name</div>
                    <input type="text" name="name" class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
                </div>
                <!-- username -->
                <div class="h-[35px] flex mb-5">
                    <div class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                        Username</div>
                    <input type="text" name="username" class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
                </div>
                <!-- password -->
                <div class="h-[35px] flex mb-5">
                    <div class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                        Password</div>
                    <input name="password" type="password" class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
                </div>
                <!-- buttns -->
                <div class="flex justify-around items-center ">
                    <button type="submit" class="bg-lime-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Add
                        Staff</button>
                    <button type="button" data-close-staff-modal class="bg-red-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Cancel</button>
                </div>
            </form>
        </div>
    </dialog>
    <!-- deletes taff -->
    <dialog data-delete-staff-modal class="h-[130px] w-[300px]">
        <div class="px-2">
            <h1 class="mb-5 font-medium text-lime-600 text-center">Confirm Delete</h1>
            <form action="../../phpscript/deletStaff.php" method="get" class="flex flex-col">
                <!-- staff id -->
                <input type="hidden" name="staffId" id="staffId" class="border" value="">
                <!-- buttns -->
                <div class="flex justify-around items-center ">
                    <button type="submit" class="bg-lime-300 py-2 px-1 rounded-lg font-medium w-[100px] shadow-md">
                        Delete
                    </button>
                    <button data-close-delete-modal class="bg-red-300 py-2 px-1 rounded-lg font-medium w-[100px] shadow-md">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </dialog>
    <!-- edit staff -->
    <dialog data-edit-staff-modal class="h-[270px]">
        <div class="px-2">
            <h1 class="mb-5 font-medium text-lime-600">Edit Staff Info</h1>
            <form action="../../phpscript/editStaff.php" method="get" class="flex flex-col">
                <input type="hidden" name="editStaffId" id="editStaffId" class="border" value="">
                <!-- rname -->
                <div class="h-[35px] flex mb-5">
                    <div class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                        Staff name</div>
                    <input type="text" name="editStaffName" id="editStaffName" value="" class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
                </div>
                <!-- username -->
                <div class="h-[35px] flex mb-5">
                    <div class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                        Username</div>
                    <input type="text" name="editStaffUserName" id="editStaffUserName" class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
                </div>
                <!-- password -->
                <div class="h-[35px] flex mb-5">
                    <div class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                        Password</div>
                    <input name="editStaffPassword" id="editStaffPassword" type="text" class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
                </div>
                <!-- buttns -->
                <div class="flex justify-around items-center ">
                    <button type="submit" class="bg-lime-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Save
                    </button>
                    <button type="button" data-close-edit-modal class="bg-red-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Cancel</button>
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
                <p class="text-gray-500">Total Staff: <?php echo $totalStaff; ?></p>

            </div>
            <div class="flex gap-4">
                <div class="border-2 border-lime-600 rounded-md flex justify-between items-center pr-2">
                    <div class="bg-lime-600 h-full p-2 text-white">
                        Search Staff
                    </div>
                    <input id="searchBar" type="text" placeholder="type here.." class="px-2 py-2 rounded-md focus:outline-none">
                    <span><i class="fa-solid fa-magnifying-glass text-lime-600"></i></span>
                </div>

                <button data-open-staff-modal class="bg-lime-600 py-2 px-5 rounded-lg font-medium shadow-md text-white"><i class="fa-regular fa-square-plus mr-2"></i>Add Staff
                </button>
            </div>
        </div>
        <!-- body -->
        <div class="h-full rounded-md overflow-y-auto bg-white drop-shadow-md p-5 grid grid-cols-3 gap-5 relative" id="clientContainer">
            <p id="noClientsMessage" class="absolute inset-0 text-gray-500 hidden">"No
                Staff Found"</p>

            <?php foreach ($staffs as $staff) { ?>
                <div class="client bg-gray-600 h-[200px] rounded-md drop-shadow-md p-5 text-white">
                    <div class="flex items-center justify-start border-b-2 border-gray-500 ">
                        <span class="border-2 border-gray-500 rounded-md p-3 mr-5 mb-3 ">
                            <i class="fa-solid fa-clipboard-user text-[46px]"></i>
                        </span>
                        <div>
                            <input staffEditIdInputHidden type="hidden" class="border" value="<?php echo $staff['user_id'] ?>">
                            <p staffName class="username font-semibold"><?php echo $staff['name']; ?></p>
                            <div class="flex justify-between items-center w-[250px] mt-2">
                                <input type="hidden" name="staffRditId" id="staffEditId" class="border" value="">
                                <button name="editBtn" value="<?php echo $staff['user_id']; ?>" class="view-status-btn text-gray-400 font-medium text-[14px] data-open-status-modal editStaffBtn">
                                    <i class="fa-solid fa-user-pen mr-3"></i> Edit Staff
                                </button>
                                <button name="delBtn" value="<?php echo $staff['user_id']; ?>" class="view-status-btn text-red-100 font-medium text-[14px] data-open-status-modal delStaffBtn">
                                    <i class="fa-solid fa-user-minus  mr-3"></i></i> Delete Staff
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="flex">
                            <p class="font-medium">Username:</p>
                            <p staffUserName class="ml-3"> <?php echo $staff['username'] ?></p>
                        </div>
                        <div class="flex mt-3 justify-between items-center password-container">
                            <p class="font-semibold">Password:</p>
                            <div class="relative flex items-center">
                                <input staffPassword type="password" class="password-field text-gray-500 bg-gray-100 rounded-md px-2 py-1 w-52 border border-gray-300" value="<?php echo $staff['password'] ?>" disabled>
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

        const staffIdInput = document.getElementById("staffId");
        const staffEditIdInput = document.getElementById("staffEditId");
        const deleteModal = document.querySelector("[data-delete-staff-modal ]");
        const editModal = document.querySelector("[data-edit-staff-modal ]");

        // Modal elements
        var editStaffId = document.getElementById('editStaffId');
        var editStaffName = document.getElementById('editStaffName');
        var editStaffUserName = document.getElementById('editStaffUserName');
        var editStaffPassword = document.getElementById('editStaffPassword');

        document.querySelectorAll('.editStaffBtn').forEach(btn => {
            btn.addEventListener('click', function(event) {
                event.preventDefault();
                // Get the closest card element
                var card = btn.closest('.client');
                // Find elements within the same card
                var staffEditIdInputHidden = card.querySelector('[staffEditIdInputHidden]');
                var staffName = card.querySelector('[staffName]');
                var staffUserName = card.querySelector('[staffUserName]');
                var staffPassword = card.querySelector('[staffPassword]');

                // Set modal input values
                editStaffId.value = staffEditIdInputHidden.value;
                editStaffName.value = staffName.textContent;
                editStaffUserName.value = staffUserName.textContent;
                editStaffPassword.value = staffPassword.value;

                // Show modal
                editModal.showModal();
            });
        });

        document.querySelector('[data-close-edit-modal]').addEventListener('click', function() {
            event.preventDefault();
            editModal.close();
        });

        document.querySelectorAll('.delStaffBtn').forEach(btn => {
            btn.addEventListener('click', function() {
                event.preventDefault();
                staffIdInput.value = btn.value;
                deleteModal.showModal();
            });
        });

        document.querySelector('[data-close-delete-modal]').addEventListener('click', function() {
            event.preventDefault();
            deleteModal.close();
        });
    </script>
</body>

</html>