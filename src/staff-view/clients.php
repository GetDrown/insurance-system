<?php include '../../includes/header.php'; ?>

<body>
    <!-- sidebar -->
    <?php include '../../includes/sidebar.php'; ?>

    <!-- main-content -->
    <div class="basis-5/6  h-dvh p-3 rounded-lg overflow-hidden bg-gray-200 flex flex-col">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between mb-4 drop-shadow-md">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Clients</h1>
            </div>
            <div class="border-2 border-lime-600 rounded-md flex justify-between items-center pr-2">
                <div class="bg-lime-600 h-full p-2 text-white">
                    Search Client
                </div>
                <input id="searchBar" type="text" placeholder="type here.."
                    class="px-3 py-2 rounded-md focus:outline-none">
                <span><i class="fa-solid fa-magnifying-glass text-lime-600"></i></span>
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
                        <button class="text-lime-800 font-medium text-[14px] p-1 rounded-md drop-shadow-sm">View Client
                            Info</button>
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