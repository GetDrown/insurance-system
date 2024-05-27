<?php
function getCurrentPage() {
    return basename($_SERVER['PHP_SELF']);
}
$current_page = getCurrentPage();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/output.css">
    <link rel="stylesheet" href="../../assets/css/custom-style.css">
    <link rel="stylesheet" href="../../assets/css/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/fontawesome-free-6.5.2-web/css/fontawesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Insurance System</title>
</head>

<body>
    <!-- sidebar -->
    <?php include '../../includes/sidebar.php'; ?>

    <!-- main-content -->
    <div class="basis-5/6 h-dvh p-3 rounded-lg  bg-gray-200 flex flex-col overflow-hidden">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between mb-3 drop-shadow-md">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Reports </h1>
            </div>

            <div
                class="custom-select flex justify-between items-center w-[270px] bg-lime-300 rounded-sm  overflow-hidden">
                <div class="pl-2 drop-shadow-sm">
                    <label for="">Select Year</label>
                </div>
                <select class="yearSelect">
                    <option value="">2020</option>
                    <option value="">2021</option>
                    <option value="">2022</option>
                    <option value="">2023</option>
                    <option value="">2024</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-3 grid-rows-2 gap-3 h-[600px]">
            <!-- side -->
            <div class="h-full bg-white row-span-2 col-span-1 p-2 rounded-md drop-shadow-md overflow-hidden">
                <!-- title and month selecyt -->
                <div class="w-full p-2 border-b bg-white flex justify-between items-center">
                    <p class="text-lime-700 font-medium">Approved Applicants</p>
                    <div class="">
                        <select class="focus:outline-none">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                </div>
                <!-- list -->
                <div class="w-full h-[500px] overflow-y-auto px-2">
                    <?php for ($i = 0; $i < 30; $i++) {  ?>
                    <div class="w-full h-[50px] shadow-md mb-3 flex justify-around items-center px-3 rounded-md">
                        <!-- type of transaction and date -->
                        <div>
                            <p class="text-sm font-medium">Client <?php echo $i+1; ?></p>
                            <p class="text-xs text-gray-400">May 17, 2024</p>
                        </div>
                        <!-- cliente name -->
                        <div>
                            <h1 class="text-sm font-medium">Motorcycle Policy</h1>
                        </div>
                    </div>
                    <?php 
                    } ?>
                </div>
                <!-- footer -->
                <div class="w-full text-center p-2 border-t border-b h-[42px] bg-white">

                </div>
            </div>
            <!-- top row -->
            <div class="h-[290px] gap-4 col-span-2 row-span-1 ">
                <div class="rounded-md bg-white drop-shadow-lg  p-3 h-full">
                    <canvas id="line-chart" class="rounded-md"></canvas>
                </div>
            </div>
            <!-- bottom row -->
            <div class=" h-[290px] col-span-2 row-span-1">
                <!-- <div class="bg-white drop-shadow-lg p-3 rounded-lg basis-1/4 h-full">
                    <p class="text-lime-700 font-medium text-[18px]">Policy Holder Distribution</p>
                    <canvas id="donut-chart" class="rounded-md"></canvas>
                </div> -->
                <div class="bg-white drop-shadow-lg rounded-lg  w-full h-full p-5">
                    <canvas id="line-graph" class="rounded-md"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/js/remaining-polices-charts.js"></script>
    <script src="../../assets/js/policy-distribution-chart.js"></script>
    <script src="../../assets/js/income-graph.js"></script>
</body>

</html>