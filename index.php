<?php include './dbconf/db_config.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="./assets/css/output.css">
    <link rel="stylesheet" href="./assets/css/custom-style.css">

</head>


<body class="bg-neutral-800 h-screen justify-center items-center flex flex-col">
    <!-- register customer -->
    <dialog data-customer-modal class="w-[550px] h-[500px] ">
        <div>
            <form action="./phpscript/addcustomer.php" method="POST" class="flex flex-col px-3">
                <!-- account info -->
                <div>
                    <h1 class="mb-5 font-medium text-lime-600 pla">Account Info</h1>
                    <!-- username -->
                    <input type="text" name="username" class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none" placeholder="Username...">

                    <!-- password -->
                    <input type="password" name="password" class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none" placeholder="Password...">
                    <!-- confirm password -->
                    <input type="password" name="re_enterpass" class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none" placeholder="Confirm Password...">
                </div>
                <!-- clients info -->
                <div>
                    <h1 class="mb-5 font-medium text-lime-600">Customer Info</h1>
                    <!-- username -->
                    <div>
                        <!-- name -->
                        <div class="grid grid-cols-6 gap-2">
                            <input type="text" name="lastname" class="h-[35px] col-span-2 border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none" placeholder="Last Name...">
                            <input type="text" name="firstname" class="h-[35px] col-span-2  border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none" placeholder="First Name...">
                            <input type="text" name="middle_ini" class="h-[35px] col-span-1 border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none" placeholder="Middle Initial...">
                            <input type="text" name="name_ext" class="h-[35px] col-span-1 border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none" placeholder="Ext...">
                        </div>

                        <!-- contacts -->
                        <div class="grid grid-cols-2 gap-3">
                            <input type="text" name="phone_num" class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none" placeholder="Phone no...">
                            <input type="email" name="email_add" class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none" placeholder="Email...">
                        </div>
                        <!-- address-->
                        <input type="text" name="customeraddress" class="h-[35px] w-full border-2 px-3 py-2 mb-5 rounded-md  active:outline-none focus:outline-none" placeholder="Address...">
                    </div>
                </div>
                <!-- buttns -->
                <div class="flex justify-around items-center ">
                    <button type="submit" class="bg-lime-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Save</button>
                    <button type="button" data-close-customer-modal class="bg-red-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Cancel</button>
                </div>
            </form>
        </div>
    </dialog>
    <div class="bg-[#ECECEC] relative overflow-hidden h-[643px] w-[1055px] rounded-[25px]">

        <div class="flex flex-row ">
            <div class=" ml-[100px] mt-[150px] mr-[90px]">
                <img class="w-[334px] h-[343px]" src="./assets/image/logo.png" alt="">
            </div>
            <form action="./phpscript/login_process.php" method="POST" class="w-[465px] h-[536px] border bg-white mt-[55px] shadow-[7px_9px_4.3px_rgba(0,0,0,0.3)] rounded-[28px]">
                <div class="ml-[52px] mt-[64px] flex flex-col">
                    <div class="flex flex-row mb-[45px]">
                        <div class="mr-[11px] mt-[2px]">
                            <label for="user_role" class="font-poppins text-[16px]">Login as:</label>
                        </div>
                        <select name="user_role" id="" class="bg-white rounded border px-[2px] w-[144px] h-[28px]">
                            <option hidden disabled selected value>-- Select User --</option>
                            <!-- <option value="">Owner</option>
                            <option value="">Staff</option>
                            <option value="">Customer</option> -->
                            <?php
                            $sql = "SELECT * FROM user_role";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["role_id"] . "'>" . $row["role_name"] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="flex flex-col mb-[34px]">
                        <div class="mb-[12px]">
                            <label for="username" class="font-poppins text-[16px]">Username</label>
                        </div>
                        <input name="username" type="text" placeholder="Username" class="ml-[2px] pl-[8px] py-[10px] rounded-[8px] border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500 w-[360px] h-[38px] font-poppins" required>
                    </div>
                    <div class="flex flex-col mb-[19px]">
                        <div class="mb-[12px]">
                            <label for="password" class="font-poppins text-[16px]">Password</label>
                        </div>
                        <input name="password" type="password" placeholder="Password" class="ml-[2px] pl-[8px] py-[10px] rounded-[8px] border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500 w-[360px] h-[38px] font-poppins" required>
                    </div>

                    <div class="grid grid-cols-2 gap-[10px] mb-[32px]">
                        <div class="flex flex-row space-x-[4px]">
                            <input type="checkbox" class="ml-[2px] accent-lime-500">
                            <label for="" class="font-poppins text-[14px]">Keep me Logged In</label>
                        </div>
                        <div class="ml-[5px]">
                            <p class="font-inter text-[14px] ">For customers <button data-open-customer-modal class="ml-[2px] underline underline-offset-2 text-blue-500">Click Here</button></p>
                        </div>
                    </div>
                    <div class="justify-center items-center mb-[12px]">
                        <button type="submit" class="rounded-[6px] bg-[#90EC48] hover:bg-[#75C138] transition ease-in-out duration-300 w-[360px] h-[57px] font-poppins shadow-[3px_4px_4px_rgba(0,0,0,0.3)]">Login</button>
                    </div>

                    <div class="ml-[85px]">
                        <p class="font-inter text-[16px] ">Forgot password?<a href="#" class="ml-[2px] underline underline-offset-2 text-blue-500">Click Here</a></p>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <script>
        const openCustomerBtn = document.querySelector("[data-open-customer-modal]");
        const closeCustomerBtn = document.querySelector("[data-close-customer-modal]");
        const modalCustomer = document.querySelector("[data-customer-modal]");

        openCustomerBtn.addEventListener('click', () => {
            modalCustomer.showModal();
            event.preventDefault();
        });
        closeCustomerBtn.addEventListener('click', () => {
            modalCustomer.close();
        });
    </script>

</body>

</html>