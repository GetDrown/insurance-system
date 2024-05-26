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
    <div class="basis-5/6  h-dvh p-3 rounded-lg overflow-hidden bg-gray-200 flex flex-col">
        <!-- header -->
        <div class="h-[100px] w-full bg-white rounded-lg p-4 flex items-center justify-between mb-4 drop-shadow-md">
            <div>
                <h1 class="font-medium text-[28px] text-lime-700">Reports </h1>
            </div>
            <div
                class="custom-select flex justify-between items-center w-[270px] bg-lime-300 rounded-sm  overflow-hidden">
                <div class="pl-2 drop-shadow-sm">
                    <label for="">Select Year</label>
                </div>
                <select>
                    <option value="">2020</option>
                    <option value="">2021</option>
                    <option value="">2022</option>
                    <option value="">2023</option>
                    <option value="">2024</option>
                </select>
            </div>
        </div>
        <!-- top row -->
        <div class="h-[250px] grid grid-cols-4 gap-4 mb-4">
            <div class="rounded-md bg-white drop-shadow-lg col-span-3 [300px] p-3">
                <canvas id="line-chart" class="rounded-md"></canvas>

            </div>

            <div class="flex flex-col gap-3 justify-between">
                <div class=" rounded-md drop-shadow-lg flex items-center justify-between px-7 bg-lime-600 basis-2/4 ">
                    <div class="text-white ">
                        <p class="font-bold text-[36px]">173</p>
                        <h1>Policy Holder </h1>
                    </div>
                    <span><i class="fa-solid fa-hand-holding-hand text-[70px] text-white"></i></span>

                </div>
                <div class=" rounded-md drop-shadow-lg flex items-center justify-between px-7 bg-amber-500 basis-2/4">
                    <div class="text-white ">
                        <p class="font-bold text-[36px]">10,102</p>
                        <h1>Total Income </h1>
                    </div>
                    <span><i class="fa-solid fa-peso-sign text-[70px] text-white"></i></span>
                </div>
            </div>
        </div>
        <!-- bottom row -->
        <div class="h-[310px] flex justify-between items-center gap-3">
            <div class="bg-white drop-shadow-lg p-3 rounded-lg basis-1/4 h-full">
                <p class="text-lime-700 font-medium text-[18px]">Policy Holder Distribution</p>
                <canvas id="donut-chart" class="rounded-md"></canvas>
            </div>
            <div class="bg-white drop-shadow-lg rounded-lg basis-3/4 h-full p-5">
                <canvas id="line-graph" class="rounded-md"></canvas>
            </div>
        </div>
    </div>
    <script src="../../assets/js/remaining-polices-charts.js"></script>
    <script src="../../assets/js/policy-distribution-chart.js"></script>
    <script src="../../assets/js/income-graph.js"></script>
</body>

</html>