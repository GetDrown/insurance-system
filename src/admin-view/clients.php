<?php include '../../includes/header.php'; ?>

<body>
    <!-- add clients modal -->
    <dialog data-clients-modal class="w-[550px] h-[500px]">
        <div>
            <form method="POST" action="../../phpscript/addclient.php"  class="flex flex-col px-3">
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
                    <input type="password" name="confirm_password"
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
                                placeholder="Lastname...">
                            <input type="text" name="firstname"
                                class="h-[35px] col-span-2  border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="Firstname...">
                            <input type="text" name="middle"
                                class="h-[35px] col-span-1 border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="M.I">
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
                    <button type="submit" class="bg-lime-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Save</button>
                    <button data-close-clients-modal type="button"
                        class="bg-red-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Cancel</button>
                </div>
            </form>
        </div>
    </dialog>

    <!-- policy status dialog -->
    <dialog data-status-modal class=" w-11/12 h-5/6">
        <div>
            <form action="" class="flex flex-col px-3">
                <!-- account info -->
                <div>
                    <h1 class="mb-5 font-medium text-lime-600 pla">Account Info</h1>
                    <!-- username -->
                    <input type="text"
                        class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                        placeholder="Username...">

                    <!-- password -->
                    <input type="text"
                        class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                        placeholder="Password...">
                    <!-- confirm password -->
                    <input type="text"
                        class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                        placeholder="Confirm Password...">
                </div>
                <!-- clients info -->
                <div>
                    <h1 class="mb-5 font-medium text-lime-600">Client Info</h1>
                    <!-- username -->
                    <div>
                        <!-- name -->
                        <div class="grid grid-cols-6 gap-2">
                            <input type="text"
                                class="h-[35px] col-span-2 border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="Las tName...">
                            <input type="text"
                                class="h-[35px] col-span-2  border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="First Name...">
                            <input type="text"
                                class="h-[35px] col-span-1 border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="Middle Initial...">
                            <input type="text"
                                class="h-[35px] col-span-1 border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="Ext...">
                        </div>

                        <!-- contacts -->
                        <div class="grid grid-cols-2 gap-3">
                            <input type="text"
                                class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="Phone no...">
                            <input type="text"
                                class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                                placeholder="Email...">
                        </div>
                        <!-- address-->
                        <input type="text"
                            class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none"
                            placeholder="Address...">
                    </div>
                </div>
                <!-- buttns -->
                <div class="flex justify-around items-center ">
                    <button class="bg-lime-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Save</button>
                    <button data-close-status-modal
                        class="bg-red-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Cancel</button>
                </div>
            </form>
        </div>
    </dialog>


    <!-- sidebar -->
    <?php include '../../includes/sidebar.php'; ?>

    <!-- main-content -->
    <div class="basis-5/6  h-dvh p-3 rounded-lg overflow-hidden bg-gray-200 flex flex-col">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between mb-4 drop-shadow-md">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Clients</h1>
            </div>
            <div class="flex gap-4">
                <div class="border-2 border-lime-600 rounded-md flex justify-between items-center pr-2">
                    <div class="bg-lime-600 h-full p-2 text-white">
                        Search Client
                    </div>
                    <input id="searchBar" type="text" placeholder="type here.."
                        class="px-2 py-2 rounded-md focus:outline-none">
                    <span><i class="fa-solid fa-magnifying-glass text-lime-600"></i></span>
                </div>

                <button data-open-clients-modal
                    class="bg-lime-600 px-3 py-2 rounded-md drop-shadow-md font-semibold text-white"><i
                        class="fa-regular fa-square-plus"></i> Add
                    Client</button>
            </div>
        </div>
        <!-- body -->
        <div class="h-full rounded-md overflow-y-auto bg-white drop-shadow-md p-5 grid grid-cols-3 gap-5 relative"
            id="clientContainer">
            <p id="noClientsMessage" class="absolute inset-0 flex items-center justify-center text-gray-500">"No
                clients found"</p>

            <?php for ($i = 0; $i < 24; $i++) { ?>
            <div class="client bg-gray-100 h-[220px] rounded-md drop-shadow-md p-5 ">
                <div class="flex items-center justify-start border-b-2 border-gray-500 ">
                    <span class="border-2 border-gray-500 rounded-md p-3 mr-5 mb-3 ">
                        <i class="fa-solid fa-user text-[46px]"></i>
                    </span>
                    <div>
                        <p class="username">JohnDoe <?php echo $i; ?></p>
                        <button data-open-status-modal
                            class="text-lime-800 font-medium text-[14px] p-1 rounded-md drop-shadow-sm data-open-status-modal">View
                            Policy
                            Status</button>
                    </div>
                </div>
                <div class="mt-3">
                    <p>John Doe</p>
                    <p>0986 797 2980</p>
                    <p>Brgy. New Visayas, Panabo City, Davao del Norte</p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <script>
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

    // Add event listener to each open modal button
    openStatusBtn.forEach(btn => {
        btn.addEventListener("click", () => {
            modalStatus.showModal();
        });
    });

    // Add event listener to each close modal button
    closeStatusBtn.forEach(btn => {
        btn.addEventListener("click", () => {
            modalStatus.close();
        });
    });

    // const buttons = document.querySelectorAll('[data-open-status-modal]');

    // buttons.forEach(button => {
    //     button.addEventListener('click', function() {
    //         const modalId = button.getAttribute('data-open-status-modal');
    //         const modal = document.getElementById(`modal-${modalId}`);
    //         modal.classList.remove('hidden');
    //     });
    // });

    // const closeButtons = document.querySelectorAll('.close');
    // closeButtons.forEach(button => {
    //     button.addEventListener('click', function() {
    //         const modal = button.closest('.modal');
    //         modal.classList.add('hidden');
    //     });
    // });


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

        document.getElementById('noClientsMessage').classList.toggle('hidden', hasVisibleClients);
    });
    
    </script>
</body>

</html>