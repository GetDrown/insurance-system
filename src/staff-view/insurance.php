<?php include '../../includes/header.php'; ?>

<body>
    <!-- sidebar -->
    <?php include '../../includes/sidebar-staff.php'; ?>
    <!-- add policy modal -->
    <dialog data-policy-modal>
        <div>
            <h1 class="mb-5 font-medium text-lime-600">Add Policy</h1>
            <form action="" class="flex flex-col px-3">
                <!-- username -->
                <div class="h-[45px] flex mb-5 w-full">
                    <select name="" id="" class="rounded-md px-[6px] py-[7px] bg-white border-[3px] w-full">
                        <option hidden disabled selected value>-- Select Policy --</option>
                        <option value="motorcycle_policy">Motorcycle Policy</option>
                        <option value="private_car_policy">Private Car Policy</option>
                        <option value="commercial_vehicle_policy">Commercial Vehicle Policy</option>
                        <option value="lto_policy">Land Transportation Operators Policy</option>
                    </select>
                </div>
                <!-- password -->
                <div class="h-[35px] flex mb-5">
                    <div
                        class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                        Quantity</div>
                    <input type="text"
                        class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
                </div>
                <!-- buttns -->
                <div class="flex justify-around items-center ">
                    <button class="bg-lime-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Save</button>
                    <button type="button" data-close-policy-modal
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
                <h1 class="font-medium text-[28px] text-lime-700">Insurance Policy</h1>
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

                <button data-open-policy-modal
                    class="bg-lime-600 py-2 px-5 rounded-lg font-medium shadow-md text-white"><i
                        class="fa-regular fa-square-plus mr-2"></i>Add Policy
                </button>
            </div>
        </div>
        <!-- body -->
        <div class="h-full rounded-md overflow-y-auto bg-white drop-shadow-md p-5 grid grid-cols-1 gap-5 relative"
            id="clientContainer">
            <p id="noClientsMessage" class="absolute inset-0 text-gray-500 hidden">"No
                Policy Found"</p>
            <?php for ($i = 0; $i < 10; $i++) { ?>
            <div
                class="client bg-white h-[80px] rounded-md drop-shadow-md p-5 flex justify-between items-center border-t border-gray-200">

                <div>
                    <p class="text-sm font-medium text-gray-400 normal-case">No.</p>
                    <p class="text-[22px] font-medium text-gray-600 normal-case"><?php echo $i ?></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-400 normal-case">Name.</p>
                    <p class="text-[22px] font-medium text-gray-600 normal-case">Motorcycle Policy</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-400 normal-case">Type</p>
                    <p class="text-[22px] font-medium text-gray-600 normal-case">Non Life</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-400 normal-case">Quantity</p>
                    <p class="text-[22px] font-medium text-gray-600 normal-case"><?php echo $i + 1 *2?></p>
                </div>

            </div>
            <?php } ?>
        </div>
    </div>
    <script>
    const openPolicyBtn = document.querySelector("[data-open-policy-modal]");
    const closePolicyBtn = document.querySelector("[data-close-policy-modal]");
    const modalPolicy = document.querySelector("[data-policy-modal]");


    openPolicyBtn.addEventListener("click", () => {
        modalPolicy.showModal();
    });

    closePolicyBtn.addEventListener("click", () => {
        modalPolicy.close();
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
    </script>

</body>

</html>