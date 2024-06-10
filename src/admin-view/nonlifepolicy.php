<?php
include '../../includes/header.php';
include '../../dbconf/db_config.php';

session_start();
$policyName = '';
$plateNo = "";
$serialNo = "";
$motorNo = "";
$capacity = "";
$unladenWeight = "";

$model = "";
$make = "";
$body = "";
$color = "";
$bltFileNo = "";

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

    $policyName = 'Private Car Policy';
    
    $plateNo = "ABC123";
    $serialNo = "JYARJ22E7KA000123";
    $motorNo = "MTR123456789";
    $capacity = "2 persons";
    $unladenWeight = "169 kg";

    $model = "Yamaha YZF-R3";
    $make = "Yamaha";
    $body = "Sport";
    $color = "Blue";
    $bltFileNo = "BLT123456789";
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

// if from dashboard
$previousPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
if ($previousPage == 'http://localhost/insurance-system/src/admin-view/index.php') {
    $policyName = $_POST['policyName'];

    $plateNo = $_POST['plateNo'];
    $serialNo = $_POST['serialNo'];
    $motorNo = $_POST['motorNo'];
    $capacity = $_POST['capacity'];
    $unladenWeight = $_POST['unladenWeight'];

    $model = $_POST['model'];
    $make = $_POST['make'];
    $body = $_POST['body'];
    $color = $_POST['color'];
    $bltFileNo = $_POST['bltFileNo'];
}
?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
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
    <?php include '../../includes/sidebar.php'; ?>
    <!-- main-content -->
    <div class=" basis-5/6 h-dvh flex flex-col justify-start items-center py-3 px-5 overflow-y-auto">

        <div class="h-[1150px] w-full md:w-full bg-white rounded-lg border p-3 drop-shadow-md flex flex-col ">
            <form action="../../phpscript/addnonlife.php" method="POST" class="flex flex-col ">
                <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer_id); ?>">

                <div class="mt-4 flex mb-[25px] space-x-4">
                    <label class="text-3xl ml-2 font-poppins text-lime-700">Non-Life Insurance Policy
                        Application</label>
                    <select name="non_life_selection" id="" class="rounded-md px-[6px] py-[7px] bg-white border-[3px]">
                        <option hidden disabled selected value>-- Select Policy --</option>
                        <?php
                        if ($previousPage == 'http://localhost/insurance-system/src/admin-view/index.php') {
                            echo "<option value='1' selected>" . $policyName . "</option>";
                        }else{
                            $sql = "SELECT * FROM non_life_policy";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["non_life_id"] . "'>" . $row["non_life_name"] . "</option>";
                            }
                        }
                        }
                        ?>
                    </select>
                </div>
                <div class="flex flex-row space-x-6 ml-[10px] md:ml-[7px] mb-[25px]">
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Name and Address of Insured:</label>
                        <textarea name="name_and_address" id="" placeholder="Name and Address of Insured"
                            class="text-md pt-[2px] placeholder:pt-[2px] placeholder:text-sm placeholder:pl-[2px] resize-y rounded-md w-[300px] h-[100px] border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500 px-[4px]"
                            required></textarea>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Business Profession</label>
                        <input name="business_prof" type="text" placeholder="Business Profession"
                            class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Date Issued</label>
                        <input name="date_issued" type="date"
                            class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Confirmation of Cover No.</label>
                        <input name="conf_cover" type="text" placeholder="Confirmation of Cover No."
                            class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Official Receipt No.</label>
                        <input name="official_receipt" type="text" placeholder="Official Receipt No."
                            class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="font-poppins">Period of Issuance</label>
                        <input name="from_issuance" type="date"
                            class="mt-2 mb-[8px] rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">To</label>
                        <input name="to_issuance" type="date"
                            class="mt-2 rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                </div>

                <div class="mb-[25px]">
                    <label class="text-3xl ml-2 font-poppins">Scheduled Vehicle</label>
                </div>

                <div class="flex flex-row ml-[10px] md:ml-[7px] space-x-4 mb-[25px]">
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Model</label>
                        <input name="vehicle_model" type="text" placeholder="Model"
                            class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Plate No.</label>
                        <input name="vehicle_platenum" type="text" placeholder="Plate No."
                            class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Make</label>
                        <input name="vehicle_make" type="text" placeholder="Make"
                            class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Serial/Chassis No.</label>
                        <input name="vehicle_chassis" type="text" placeholder="Serial/Chassis No."
                            class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Type of Body</label>
                        <input name="vehicle_type" type="text" placeholder="Type of Body"
                            class="rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Motor No.</label>
                        <input name="vehicle_motornum" type="text" placeholder="Motor No."
                            class="rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Color</label>
                        <input name="vehicle_color" type="text" placeholder="Color"
                            class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Authorized Capacity</label>
                        <input name="vehicle_auth" type="text" placeholder="Authorized Capacity"
                            class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Blt File No.</label>
                        <input name="vehicle_blt" type="text" placeholder="Blt File No."
                            class="rounded-md w-[170px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Unladen Weight (kgs.)</label>
                        <input name="vehicle_weight" type="text" placeholder="Motor No."
                            class="rounded-md w-[170px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                </div>

                <div class="mb-[2px]">
                    <label class="text-3xl ml-2 font-poppins tracking-wide">Section I/II</label>
                </div>

                <div class="flex flex-row ml-[10px] md:ml-[7px] space-x-6 mb-[25px]">
                    <div class="flex flex-col space-y-4 mr-[50px] mt-[20px]">
                        <div class="flex flex-row justify-between space-x-4 ">
                            <label for="" class="font-poppins mt-[5px] mr-[10px]">Limit of Liability</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[4px]">
                            <input type="text" placeholder="100,000.00"
                                class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500"
                                disabled>
                        </div>
                        <div class="flex flex-row justify-between space-x-4 ">
                            <label for="" class="font-poppins mt-[5px] mr-[15px]">Premium Paid</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[4px]">
                            <input name="vehicle_paid" type="text" placeholder="100,000.00"
                                class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">

                        </div>
                    </div>

                    <div class=" flex flex-col items-center">
                        <p class="font-poppins font-semibold text-[14px] text-center">THIRD PARTY LIABILITY</p>
                        <p class="font-poppins italic text-[12px] text-center">(SUBJECT TO THE SCHEDULE OF INDEMNITIES
                            AT THE BACK HEREOF
                        </p>
                        <p class="font-poppins italic text-[12px] text-center">This Confirmation of Cover is evidence of
                            policy of Insurance required under<br>Chapter VI Compulsory Motor Vehicle Liability
                            Insurance of the Insurance code,<br>as amended by Presidential decree No. 1814)
                        </p>
                    </div>
                </div>

                <div class="mb-[20px]">
                    <label class="text-3xl ml-2 font-poppins tracking-wide">Section III</label>
                </div>
                <label class="text-2xl font-poppins tracking-wide ml-[10px] md:ml-[7px] mb-[10px]">Premiums</label>
                <div class="flex flex-row ml-[15px] md:ml-[18px] mb-[30px]">
                    <div class="flex flex-col space-y-4 mr-[60px]">
                        <div class="flex flex-row space-x-4">
                            <label for="" class="font-poppins mt-[3px] mr-[8px]">Premium Paid</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                            <input type="text" placeholder=""
                                class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        </div>
                        <div class="flex flex-row space-x-4">
                            <label for="" class="font-poppins mt-[3px] mr-[8px]">Doc. Stamps</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                            <input type="text" placeholder=""
                                class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        </div>
                        <div class="flex flex-row space-x-4">
                            <label for="" class="font-poppins mt-[3px] mr-[8px]">Local Gov't Tax</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                            <input type="text" placeholder=""
                                class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        </div>
                        <div class="flex flex-row  mb-[20px]">
                            <label for="" class="font-poppins mt-[3px] mr-[70px]">Others</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                            <input type="text" placeholder=""
                                class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        </div>
                        <div class="flex flex-row ">
                            <label for="" class="font-poppins mt-[3px] mr-[70px] font-semibold">Total</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                            <input name="vehicle_totalpaid" type="text" placeholder=""
                                class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        </div>
                    </div>
                </div>

                <div class="flex flex-row ml-[7px]">
                    <label for="" class="font-poppins mt-[3px] mr-[8px]">Forms and Endorsements Made Part of this Policy
                        at time of Issue</label>
                    <input name="form_endorsement" type="text" placeholder=""
                        class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                </div>
                <div class="flex flex-row justify-end space-x-4 mr-7 mt-4">
                    <button type="submit"
                        class="rounded-md px-[6px] py-[9px] bg-lime-500 hover:bg-lime-600  transition ease-in-out duration-300">Submit
                        Application</button>
                    <button class="rounded-md px-[14px] py-[9px] bg-red-300 ">Cancel</button>
                </div>

            </form>
        </div>



    </div>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('non_life_selection').addEventListener('change', function() {
                const nonLifeId = this.value;
                if (nonLifeId) {
                    fetch('nonlifepolicy.php?id=' + nonLifeId)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('vehicle_premium').value = data.non_life_premium || '';
                            document.getElementById('vehicle_docstamp').value = data.non_life_docstamp || '';
                            document.getElementById('vehicle_govtax').value = data.non_life_govtax || '';
                            document.getElementById('vehicle_others').value = data.non_life_others || '';
                            document.getElementById('vehicle_totalpaid').value = (parseFloat(data.non_life_premium) || 0) +
                                (parseFloat(data.non_life_docstamp) || 0) +
                                (parseFloat(data.non_life_govtax) || 0) +
                                (parseFloat(data.non_life_others) || 0)
                                .toFixed(2);
                        })
                        .catch(error => console.error('Error fecthing data: ', error));
                }
            });
        });
    </script> -->

</body>

</html>