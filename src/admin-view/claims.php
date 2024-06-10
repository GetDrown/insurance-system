<?php 
    include '../../includes/header.php';
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
                        <p class="font-medium">Police Report</p>
                        <button class="text-sky-500 font-medium mt-4 rounded-md">view File</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="w-[300px] grid grid-cols-2  gap-3">
                <button class="px-3 py-1 mt-2 rounded-md bg-lime-500 text-white border ">Apporved
                    Claim</button>
                <button data-check-file-modal-close
                    class="px-3 py-1 mt-2 rounded-md bg-red-500 text-white border ">Cancel</button>
            </div>
        </div>
    </dialog>
    <!-- sidebar -->
    <?php include '../../includes/sidebar.php'; ?>
    <!-- main content -->
    <div class="basis-5/6  h-dvh p-3 rounded-lg overflow-hidden bg-gray-200 flex flex-col">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between  shadow-md">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Dashboard </h1>
                <p class="text-gray-500">Admin</p>
            </div>
            <div>
                <h1 id="currentDate"></h1>
                <h1 class="text-[28px] font-semibold text-end" id="currentTime"></h1>
            </div>
        </div>
        <!-- body -->
        <div class="w-full h-[577px] bg-white mt-4 p-2 rounded-md shadow-md overflow-hidden">
            <div class="grid grid-cols-1 gap-3 w-full h-[560px] mt-3 overflow-y-auto">
                <?php for ($i=0; $i < 3; $i++) {  ?>
                <div class="h-[200px] bg-white rounded-md shadow-md border">
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
                    <div class="p-2 grid grid-cols-4">
                        <div class="border-r-2 h-[125px] text-center pt-3">
                            <p class="text-[18px] text-gray-400">Client Name</p>
                            <p class="text-[28px] mt-3">John Doe <?php echo $i; ?></p>
                        </div>
                        <div class="border-r-2 h-[125px] text-center pt-3">
                            <p class="text-[18px] text-gray-400">Premium</p>
                            <p class="text-[28px] mt-3">₱250/mos.</p>
                        </div>
                        <div class="border-r-2 h-[125px] text-center pt-3">
                            <p class="text-[18px] text-gray-400">Duration</p>
                            <p class="text-[24px] mt-4">11 months and 20 days</p>
                        </div>
                        <div class="h-[125px] text-center pt-3">
                            <p class="text-[18px] text-gray-400">View Attached Files</p>
                            <button data-check-file-modal-open
                                class="px-5 py-2 border rounded-md shadow-md mt-3 bg-sky-500 text-white">Check
                                Files</button>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script>
    function updateTime() {
        var currentDate = new Date();
        var options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById("currentDate").innerHTML = currentDate.toLocaleDateString('en-US', options);
        var hours = currentDate.getHours();
        var minutes = currentDate.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        var currentTime = hours + ':' + minutes + ' ' + ampm;
        document.getElementById("currentTime").innerHTML = currentTime;
    }
    setInterval(updateTime, 1000);
    updateTime();

    const filesModal = document.querySelector('[data-check-file-modal]');
    const closeModal = document.querySelector('[data-check-file-modal-close]');
    document.querySelectorAll('[data-check-file-modal-open]').forEach(btn => {
        btn.addEventListener('click', function() {
            filesModal.showModal();
        });
    });

    closeModal.addEventListener('click', function() {
        filesModal.close();
    });
    </script>
</body>

</html>