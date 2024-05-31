<?php include '../../includes/header.php'; ?>

<body>
    <!-- sidebar -->
    <?php include '../../includes/sidebar-staff.php'; ?>
    <!-- main-content -->
    <div class="basis-5/6  h-dvh bg-gray-200 flex flex-col overflow-hidden p-3 ">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between mb-1 shadow-md   ">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Messaging</h1>
                <p class="text-gray-500">Staff: JaneDoe1</p>
            </div>
            <div>
                <h1 id="currentDate"></h1>
                <h1 class="text-[28px] font-semibold text-end" id="currentTime"></h1>
            </div>
        </div>
        <div class="h-[280px] grid grid-cols-2 gap-2 overflow-hidden">
            <div class="bg-white shadow-md my-2 rounded-md p-2">
                <div class="w-full p-1 border-b h-[42px] bg-white flex justify-between items-center pb-3">
                    <p class="text-lime-700 font-medium">Clients</p>
                    <div class="border-2 border-lime-600 rounded-md flex justify-between items-center pr-2">
                        <div class="bg-lime-600 h-full p-1 text-white">
                            Search Client
                        </div>
                        <input id="searchBar" type="text" placeholder="type here.."
                            class="px-2 py-1 h-full rounded-md focus:outline-none">
                        <span><i class="fa-solid fa-magnifying-glass text-lime-600"></i></span>
                    </div>
                </div>
                <div class="h-[214px] overflow-y-auto clients relative">
                    <p id="noClientsMessage" class="absolute inset-0 text-gray-500 hidden">"No
                        clients found"</p>
                    <?php for ($i=0; $i < 7; $i++) { ?>
                    <div class="bg-white shadow-md mb-3 py-3 px-2 flex justify-between items-center client">
                        <p class="name text-xs font-medium text-gray-500">JohnDoe <?php echo $i+1; ?></p>
                        <p class="num text-xs font-medium text-gray-500">0986 797 2981</p>
                        <p class="text-xs font-medium  text-gray-500">Motorcycle Policy</p>
                        <button
                            class="selectClientBtn py-1 px-2 text-xs text-green-700 font-semibold border rounded-sm hover:bg-green-600 hover:text-white">Select</button>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="bg-white shadow-md my-2 rounded-md p-2 h-full  overflow-hidden">
                <div class="w-full p-1 border-b h-[42px] bg-white">
                    <p class="text-lime-700 font-medium">Messaging</p>
                </div>
                <form class="h-[214px] grid grid-cols-4 gap-2 p-1  overflow-hidden">
                    <div class=" col-span-3 p-1">
                        <div class="flex justify-between items-center">
                            <label for="client" class="text-xs font-medium text-green-700">Send to:</label>
                            <input disabled id="clientNameMsg" type="text"
                                class="focus:outline-none border-b rounded-md text-gray-800 text-xs py-2 px-2">
                            <input disabled id="clientNumMsg" type="text"
                                class="focus:outline-none border-b rounded-md text-gray-800 text-xs py-1 px-2">
                        </div>
                        <textarea name="msg" id="msg"
                            class="border w-full mt-3 resize-none focus:outline-none p-1 text-xs text-gray-400"
                            rows="9"></textarea>
                    </div>


                    <div class="p-1 flex flex-col justify-evenly items-center">
                        <button class="bg-lime-500 w-[100px] py-2 rounded-md shadow-md">Send</button>
                        <button class="bg-red-500 w-[100px] py-2 rounded-md shadow-md text-white">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white shadow-md h-[310px] rounded-md overflow-hidden p-2 mt-2">
            <div class="w-full p-1 border-b h-[42px] bg-white">
                <p class="text-lime-700 font-medium">History</p>
            </div>
            <div class="flex items-center justify-between mb-1 px-[100px]">
                <p class="text-gray-500 text-sm font-bold">No.</p>
                <p class="text-gray-500 text-sm font-bold">Client</p>
                <p class="text-gray-500 text-sm font-bold">Content</p>
                <p class="text-gray-500 text-sm font-bold">Date</p>
                <p class="text-gray-500 text-sm font-bold">Action</p>
            </div>
            <div class="h-[225px] overflow-y-auto p-1">
                <?php for ($i=0; $i < 10; $i++) { ?>
                <div class="flex items-center justify-around mb-4 shadow-md py-3 border h-[125px]">
                    <p class="text-gray-500 text-sm">0986 797 2981</p>
                    <p class="text-gray-500 text-sm">JohnDoe <?php echo $i ?></p>
                    <div class="w-[200px] h-[125px] flex justify-center items-center text-ellipsis overflow-hidden">
                        <p class="text-gray-500 text-sm text-justify">
                            Hi, we are from Zilka Life Insurance Services, and
                            w're happy to inform that your aplication for
                            Motorcycle policy have been apporoved.

                        </p>
                    </div>
                    <p class="text-gray-500 text-sm">May 31, 1:17am</p>
                    <div>
                        <button class="text-sm text-lime-500 mr-3">view</button>
                        <button class="text-sm text-red-500">delete</button>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src=" ../../assets/js/time.js">
    </script>
    <script>
    document.getElementById('searchBar').addEventListener('input', function() {
        var searchTerm = this.value.toLowerCase();
        var clients = document.querySelectorAll('.client');
        var hasVisibleClients = false;

        clients.forEach(function(client) {
            var username = client.querySelector('.name').textContent.toLowerCase();
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

    const selectClientBtn = document.querySelectorAll(".selectClientBtn")
    const clientNameMsg = document.getElementById("clientNameMsg");
    const clientNumMsg = document.getElementById("clientNumMsg");

    selectClientBtn.forEach(btn => {
        btn.addEventListener("click", function() {
            const clientDiv = btn.closest('.client');
            const name = clientDiv.querySelector('.name').textContent;
            const num = clientDiv.querySelector('.num').textContent;

            clientNameMsg.value = name;
            clientNumMsg.value = num;
        });


    });
    </script>
</body>

</html>