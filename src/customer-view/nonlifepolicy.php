<?php
include '../../includes/header.php';
include '../../dbconf/db_config.php';

session_start();
// retrieve customer id from url
$customer_id = isset($_GET['customer_id']) ? $_GET['customer_id'] : null;

// check customer if valid
if ($customer_id) {
    $sql = "select * from customers where customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    }
}
// get prices of each premiums
// if (isset($_GET['id'])) {
//     $non_life_id = intval($_GET['id']);
//     $sql_nonlife = "SELECT non_life_premium, non_life_docstamp, non_life_govtax, non_life_others WHERE non_life_id = ?";
//     $stmt_nonlife = $conn->prepare($sql_nonlife);
//     $stmt_nonlife->bind_param("i", $non_life_id);
//     $stmt_nonlife->execute();
//     $result = $stmt_nonlife->get_result();

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         echo json_encode($row);
//     } else {
//         echo json_encode([]);
//     }
//     $stmt->close();
//     $conn->close();
// }

?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#non_life_selection').change(function() {
            var nonLifeId = $(this).val();

            $.ajax({
                type: "POST",
                url: "../../phpscript/fetch_data/fetch_nonlifepolicy.php",
                data: {
                    non_life_id: nonLifeId
                },
                dataType: "json",
                success: function(response) {
                    $('#vehicle_premium').val(response.non_life_premium);
                    $('#vehicle_docstamp').val(response.non_life_docstamp);
                    $('#vehicle_govtax').val(response.non_life_govtax);
                    $('#vehicle_others').val(response.non_life_others);

                    realculateTotal();
                    // var total = parseFloat(response.non_life_premium) + parseFloat(response.non_life_docstamp) + parseFloat(response.non_life_govtax) + parseFloat(response.non_life_others);
                    // $('#vehicle_totalpaid').val(total);
                }
            });
        });

        $('#vehicle_premium, #vehicle_docstamp, #vehicle_govtax, #vehicle_others').on('input', function() {
            recalculateTotal();
        });

        function recalculateTotal() {
            var premium = parseFloat($('#vehicle_premium').val()) || 0;
            var docStamp = parseFloat($('#vehicle_docstamp').val()) || 0;
            var govTax = parseFloat($('#vehicle_govtax').val()) || 0;
            var others = parseFloat($('#vehicle_others').val()) || 0;

            var total = premium + docStamp + govTax + others;
            $('#vehicle_totalpaid').val(total.toFixed(2));
        }
    });
</script>

<body class="bg-gray-300">
    <!-- sidebar -->
    <div class="basis-2/12 bg-neutral-800 h-dvh flex flex-col justify-start items-center p-3 md:basis-1/4 lg:basis-1/6">
        <div class="h-[150px] mb-[30px]">
            <img class="h-full" src="../../assets/image/logo.png" alt="">
        </div>
        <ul class="w-full">
            <li class="mb-[25px] ">
                <a href="index.php" class="flex w-full hover:bg-lime-500 p-3 rounded-lg">
                    <div class="h-6 w-6">
                        <img src="../../assets/image/dashboard.png" alt="" class="h-full w-full">
                    </div>
                    <span class="ml-3 text-white">Dashboard</span>
                </a>
            </li>

            <li class="w-full">
                <a href="../../phpscript/logout.php" class="flex w-full hover:bg-red-500 p-3 rounded-lg">
                    <div class="h-6 w-6">
                        <img src="../../assets/image/logout.png" alt="" class="h-full w-full">
                    </div>
                    <span class="ml-3 text-white">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- main-content -->


    <div class=" basis-5/6 h-dvh flex flex-col justify-start items-center py-3 px-5 overflow-y-auto">

        <div class="h-[1150px] w-full md:w-full bg-white rounded-lg border p-3 drop-shadow-md flex flex-col ">
            <!-- <label for="" class="mb-2 text-[14px]">Step 2</label> -->


            <form action="../../phpscript/addnonlife.php" method="POST" class="flex flex-col ">
                <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer_id); ?>">
                <dialog data-upload-file-modal class="h-[500px] w-[500px] p-5 text-center ">
                    <div class="h-full flex flex-col items-center justify-between">
                        <div>
                            <p class="text-[28px] text-gray-500">Provide Picture of OR/CR</p>
                            <!-- <p class="italic text-sm text-gray-500">(example: Police Report)</p> -->
                        </div>
                        <div class="border-dashed border-4 w-full h-[330px] flex flex-col justify-evenly items-center">
                            <i class="fa-solid fa-cloud-arrow-up text-[100px] text-gray-500"></i>
                            <div>
                                <p class="font-medium">Drop Files Here</p>
                                <p class="font-medium">or</p>
                                <button class="border bg-sky-500 text-white px-3 py-1 mt-4 rounded-md">Browse</button>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Current Size Size: 0 MB</p>
                                <p class="text-gray-400 text-sm">Maximum Total Size: 4.5 MB</p>
                            </div>
                        </div>
                        <div class="w-full flex justify-end items-end gap-3">
                            <button class="px-3 py-1 mt-2 rounded-md bg-lime-500 text-white border">Submit</button>
                            <button data-upload-file-modal-close class="px-3 py-1 mt-2 rounded-md bg-red-500 text-white border">Cancel</button>
                        </div>
                    </div>
                </dialog>
                <div class="mt-4 flex mb-[25px] space-x-4">
                    <label class="text-3xl ml-2 font-poppins text-lime-700">Non-Life Insurance Policy Application</label>
                    <select name="non_life_selection" id="non_life_selection" class="rounded-md px-[6px] py-[7px] bg-white border-[3px]">
                        <option hidden disabled selected value>-- Select Policy --</option>

                        <?php
                        $sql = "SELECT * FROM non_life_policy";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["non_life_id"] . "'>" . $row["non_life_name"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <!-- <div class="flex flex-row space-x-6 ml-[10px] md:ml-[7px] mb-[25px]">
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Name and Address of Insured:</label>
                        <textarea name="name_and_address" id="" placeholder="Name and Address of Insured" class="text-md pt-[2px] placeholder:pt-[2px] placeholder:text-sm placeholder:pl-[2px] resize-y rounded-md w-[300px] h-[100px] border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500 px-[4px]" required></textarea>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Business Profession</label>
                        <input name="business_prof" type="text" placeholder="Business Profession" class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Date Issued</label>
                        <input name="date_issued" type="date" class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Confirmation of Cover No.</label>
                        <input name="conf_cover" type="text" placeholder="Confirmation of Cover No." class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Official Receipt No.</label>
                        <input name="official_receipt" type="text" placeholder="Official Receipt No." class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="font-poppins">Period of Issuance</label>
                        <input name="from_issuance" type="date" class="mt-2 mb-[8px] rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">To</label>
                        <input name="to_issuance" type="date" class="mt-2 rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                </div> -->

                <div class="mb-[25px]">
                    <label class="text-3xl ml-2 font-poppins">Scheduled Vehicle</label>
                </div>

                <div class="flex flex-row ml-[10px] md:ml-[7px] space-x-4 mb-[25px]">
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Model</label>
                        <input name="vehicle_model" type="text" placeholder="Model" class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Plate No.</label>
                        <input name="vehicle_platenum" type="text" placeholder="Plate No." class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Make</label>
                        <input name="vehicle_make" type="text" placeholder="Make" class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Serial/Chassis No.</label>
                        <input name="vehicle_chassis" type="text" placeholder="Serial/Chassis No." class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Type of Body</label>
                        <input name="vehicle_type" type="text" placeholder="Type of Body" class="rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Motor No.</label>
                        <input name="vehicle_motornum" type="text" placeholder="Motor No." class="rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Color</label>
                        <input name="vehicle_color" type="text" placeholder="Color" class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Authorized Capacity</label>
                        <input name="vehicle_auth" type="text" placeholder="Authorized Capacity" class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Blt File No.</label>
                        <input name="vehicle_blt" type="text" placeholder="Blt File No." class="rounded-md w-[170px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Unladen Weight (kgs.)</label>
                        <input name="vehicle_weight" type="text" placeholder="Motor No." class="rounded-md w-[170px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                </div>

                <div class="mb-[9px] grid grid-cols-2">
                    <label class="text-3xl ml-2 font-poppins tracking-wide">Section I & II</label>
                    <label class="text-3xl ml-2 font-poppins tracking-wide">Section III Premiums</label>
                </div>

                <div class="grid grid-cols-2 gap-1">
                    <div class="flex flex-col space-y-4 mt-[9px] ml-[10px]">
                        <div class="flex flex-row justify-start ">
                            <label for="" class="font-poppins mt-[5px] mr-[10px]">Limit of Liability</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[4px]">
                            <input type="text" placeholder="100,000.00" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" disabled>

                        </div>
                        <div class="flex flex-row justify-start">
                            <label for="" class="font-poppins mt-[5px] mr-[15px]">Premium Paid</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[4px]">
                            <input name="vehicle_paid" type="text" placeholder="100,000.00" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">

                        </div>
                    </div>
                    <!-- <label class="text-2xl font-poppins tracking-wide ml-[10px] md:ml-[7px] mb-[10px]">Premiums</label> -->
                    <div class="flex flex-row ml-[15px] md:ml-[18px] mb-[30px] ">
                        <div class="flex flex-col space-y-4 mr-[60px] mt-[10px]">
                            <div class="flex flex-row gap-[15px] justify-between">
                                <label for="" class="font-poppins mt-[3px] mr-[25px]">Premium Paid</label>
                                <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                                <input name="vehicle_premium" id="vehicle_premium" type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                            </div>
                            <div class="flex flex-row justify-between ">
                                <label for="" class="font-poppins mt-[3px] mr-[35px]">Doc. Stamps</label>
                                <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                                <input name="vehicle_docstamp" id="vehicle_docstamp" type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" readonly>
                            </div>
                            <div class="flex flex-row justify-between">
                                <label for="" class="font-poppins mt-[3px] mr-[20px]">Local Gov't Tax</label>
                                <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                                <input name="vehicle_govtax" id="vehicle_govtax" type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" readonly>
                            </div>
                            <div class="flex flex-row  mb-[20px] justify-between">
                                <label for="" class="font-poppins mt-[3px] mr-[80px]">Others</label>
                                <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                                <input name="vehicle_others" id="vehicle_others" type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" readonly>
                            </div>
                            <div class="flex flex-row justify-between ">
                                <label for="" class="font-poppins mt-[3px] mr-[90px] font-semibold">Total</label>
                                <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                                <input name="vehicle_totalpaid" id="vehicle_totalpaid" type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col ml-[7px]">
                    <div class="flex flex-row mb-[20px]">
                        <label for="" class="font-poppins mt-[3px] mr-[8px]">Forms and Endorsements Made Part of this Policy
                            at time of Issue</label>
                        <input name="form_endorsement" type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-row">
                        <label for="" class="font-poppins mt-[20px] mr-[8px]">Upload hard copy of OR/CR</label>
                        <button data-upload-file-modal-open class="px-5 py-2 border rounded-md shadow-md mt-3 bg-lime-500 text-white">Upload Here</button>
                    </div>
                </div>


                <div class="flex flex-row justify-end space-x-4 mr-7 mt-4">
                    <button type="submit" class="rounded-md px-[6px] py-[9px] bg-lime-500 hover:bg-lime-600  transition ease-in-out duration-300">Approve
                        Application</button>
                    <button class="rounded-md px-[14px] py-[9px] bg-red-300 ">Cancel</button>
                </div>

            </form>
        </div>



    </div>
    <script>
        const filesModal = document.querySelector('[data-upload-file-modal]');
        const closeModal = document.querySelector('[data-upload-file-modal-close]');
        document.querySelectorAll('[data-upload-file-modal-open]').forEach(btn => {
            btn.addEventListener('click', function() {
                filesModal.showModal();
                event.preventDefault();
            });
        });

        closeModal.addEventListener('click', function() {
            filesModal.close();
            event.preventDefault();
        });
    </script>

</body>

</html>