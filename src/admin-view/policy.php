<?php include '../../includes/header.php'; ?>

<body class="bg-gray-300">
    <!-- sidebar -->
    <div class="basis-2/12 bg-neutral-800 h-dvh flex flex-col justify-start items-center p-3 ">
        <div class="h-[150px] mb-[30px]">
            <img class="h-full" src="../../assets/image/logo.png" alt="">
        </div>
        <ul>
            <li class="mb-[25px] ">
                <a href="index.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/dashboard.png" alt="">
                    </div>
                    <label class="ml-3 text-white">Dashboard</label>
                </a>
            </li>
            <li class="mb-[25px]">
                <a href="reports.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/reports.png" alt="">
                    </div>
                    <label class="ml-3 text-white">Reports</label>
                </a>
            </li>
            <li class="mb-[25px]">
                <a href="clients.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/Customer.png" alt="">
                    </div>
                    <label class="ml-3 text-white">Clients</label>
                </a>
            </li>
            <li class="mb-[25px]">
                <a href="policy.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/policy.png" alt="">
                    </div>
                    <label class="ml-3 text-white">Policy</label>
                </a>
            </li>
            <li class="mb-[25px]">
                <a href="sms.php" class="flex w-[230px] hover:bg-lime-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/sms.png" alt="">
                    </div>
                    <label class="ml-3 text-white">SMS</label>
                </a>
            </li>
            <li class="logout">
                <a href="../../index.php" class="flex w-[230px] hover:bg-red-500 p-3 rounded-lg">
                    <div class="img-container">
                        <img src="../../assets/image/logout.png" alt="">
                    </div>
                    <label class="ml-3 text-white">Logout</label>
                </a>
            </li>
        </ul>
    </div>
    <!-- main-content -->
    <div class=" basis-5/6 h-dvh flex flex-col justify-start items-center py-3 px-5 overflow-auto">
        <div class="h-[320px] w-full flex flex-col  bg-white rounded-lg border p-3 drop-shadow-md mb-[20px] ">

            <label for="" class="mb-2 text-[14px]">Step 1</label>
            <div class=" flex mb-[25px]">
                <label class="text-3xl ml-2 font-poppins">Create Customer Account</label>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[24px] h-[24px] mt-[7px] ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
            </div>

            <form action="" class="ml-[10px] mb-[25px] flex flex-col space-y-7">
                <div class="flex flex-row  space-x-[20px] mb-[25px]">
                    <span class=" mt-[3px]">Username:</span>
                    <input type="text" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" placeholder="Username" name="customer_Username">
                    <span class=" mt-[3px]">Password:</span>
                    <input type="text" class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" placeholder="Password" name="customer_Password">
                    <span class=" mt-[3px] ml-3">Name:</span>
                    <input type="text" class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" placeholder="Name" name="customer_Name">
                </div>
                <div class="flex flex-row space-x-4 mb-[40px]">
                    <span class=" mt-[3px]">Address:</span>
                    <input type="text" class="ml-4 rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" placeholder="Address" name="customer_Address">
                    <span class=" mt-[3px]">Contact No.:</span>
                    <input type="text" class="ml-4 rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" placeholder="Contact Number" name="customer_Contactnum">
                </div>
                <div class="flex flex-row justify-end space-x-4 mr-7 mt-4">
                    <button class="rounded-md px-[6px] py-[9px] bg-lime-500 hover:bg-lime-600  transition ease-in-out duration-300">Create Account</button>
                    <button class="rounded-md px-[14px] py-[9px] bg-slate-300">Cancel</button>
                </div>

            </form>

        </div>
        <div class="h-[1150px] w-full md:w-full bg-white rounded-lg border p-3 drop-shadow-md flex flex-col ">
            <label for="" class="mb-2 text-[14px]">Step 2</label>
            <div class=" flex mb-[25px] space-x-4">
                <label class="text-3xl ml-2 font-poppins">Policy Application</label>
                <select name="" id="" class="rounded-md px-[6px] py-[7px] bg-white border-[3px]">
                    <option hidden disabled selected value>-- Select Policy --</option>
                    <option value="motorcycle_policy">Motorcycle Policy</option>
                    <option value="private_car_policy">Private Car Policy</option>
                    <option value="commercial_vehicle_policy">Commercial Vehicle Policy</option>
                    <option value="lto_policy">Land Transportation Operators Policy</option>
                </select>
            </div>

            <form action="" method="" class="flex flex-col ">
                <div class="flex flex-row space-x-6 ml-[10px] md:ml-[7px] mb-[25px]">
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Name and Address of Insured:</label>
                        <textarea name="" id="" placeholder="Name and Address of Insured" class="text-md pt-[2px] placeholder:pt-[2px] placeholder:text-sm placeholder:pl-[2px] resize-y rounded-md w-[300px] h-[100px] border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500 px-[4px]"></textarea>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Business Profession</label>
                        <input type="text" placeholder="Business Profession" class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Date Issued</label>
                        <input type="date" class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Confirmation of Cover No.</label>
                        <input type="text" placeholder="Confirmation of Cover No." class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Official Receipt No.</label>
                        <input type="text" placeholder="Official Receipt No." class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="font-poppins">Period of Issuance</label>
                        <input type="text" placeholder="From 12:00NN" class="mt-2 mb-[8px] rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">To</label>
                        <input type="text" placeholder="To 12:00NN" class="mt-2 rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                </div>

                <div class="mb-[25px]">
                    <label class="text-3xl ml-2 font-poppins">Scheduled Vehicle</label>
                </div>

                <div class="flex flex-row ml-[10px] md:ml-[7px] space-x-4 mb-[25px]">
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Model</label>
                        <input type="text" placeholder="Model" class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Plate No.</label>
                        <input type="text" placeholder="Plate No." class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Make</label>
                        <input type="text" placeholder="Make" class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Serial/Chassis No.</label>
                        <input type="text" placeholder="Serial/Chassis No." class="rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Type of Body</label>
                        <input type="text" placeholder="Type of Body" class="rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Motor No.</label>
                        <input type="text" placeholder="Motor No." class="rounded-md w-[150px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Color</label>
                        <input type="text" placeholder="Color" class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Authorized Capacity</label>
                        <input type="text" placeholder="Authorized Capacity" class="rounded-md w-[200px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="" class="font-poppins">Blt File No.</label>
                        <input type="text" placeholder="Blt File No." class="rounded-md w-[170px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        <label for="" class="font-poppins">Unladen Weight (kgs.)</label>
                        <input type="text" placeholder="Motor No." class="rounded-md w-[170px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
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
                            <input type="text" placeholder="100,000.00" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" disabled>

                        </div>
                        <div class="flex flex-row justify-between space-x-4 ">
                            <label for="" class="font-poppins mt-[5px] mr-[15px]">Premium Paid</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[4px]">
                            <input type="text" placeholder="100,000.00" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">

                        </div>
                    </div>


                    <div class=" flex flex-col items-center">
                        <p class="font-poppins font-semibold text-[14px] text-center">THIRD PARTY LIABILITY</p>
                        <p class="font-poppins italic text-[12px] text-center">(SUBJECT TO THE SCHEDULE OF INDEMNITIES AT THE BACK HEREOF
                        </p>
                        <p class="font-poppins italic text-[12px] text-center">This Confirmation of Cover is evidence of policy of Insurance required under<br>Chapter VI Compulsory Motor Vehicle Liability Insurance of the Insurance code,<br>as amended by Presidential decree No. 1814)
                        </p>
                        <!-- <p class="font-poppins italic">Chapter VI Compulsory Motor Vehicle Liability Insurance of the Insurance code,<br>as amended by Presidential decree No. 1814)
                        </p>
                        <p class="font-poppins italic">as amended by Presidential decree No. 1814)
                        </p> -->
                    </div>
                </div>

                <div class="mb-[20px]">
                    <label class="text-3xl ml-2 font-poppins tracking-wide">Section III</label>
                </div>
                <label class="text-2xl font-poppins tracking-wide ml-[10px] md:ml-[7px] mb-[10px]">Premiums</label>
                <div class="flex flex-row lg:ml-[15px] md:ml-[7px] mb-[30px]">
                    <div class="flex flex-col space-y-4 mr-[60px]">
                        <div class="flex flex-row space-x-4">
                            <label for="" class="font-poppins mt-[3px] mr-[8px]">1</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                            <input type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        </div>
                        <div class="flex flex-row space-x-4">
                            <label for="" class="font-poppins mt-[3px] mr-[8px]">2</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                            <input type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        </div>
                        <div class="flex flex-row space-x-4">
                            <label for="" class="font-poppins mt-[3px] mr-[8px]">3</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                            <input type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        </div>
                        <div class="flex flex-row space-x-4 mb-[20px]">
                            <label for="" class="font-poppins mt-[3px] mr-[8px]">4</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                            <input type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                        </div>
                        <div class="flex flex-row space-x-4">
                            <label for="" class="font-poppins mt-[3px] mr-[8px] font-semibold">Total</label>
                            <img src="../../assets/image/peso.png" alt="" class="w-[20px] h-[20px] mt-[5px]">
                            <input type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500" disabled>
                        </div>
                    </div>
                </div>

                <div class="flex flex-row ml-[7px]">
                    <label for="" class="font-poppins mt-[3px] mr-[8px]">Forms and Endorsements Made Part of this Policy at time of Issue</label>
                    <input type="text" placeholder="" class=" rounded-md w-[250px] py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-black placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                </div>
                <div class="flex flex-row justify-end space-x-4 mr-7 mt-4">
                    <button class="rounded-md px-[6px] py-[9px] bg-lime-500 hover:bg-lime-600  transition ease-in-out duration-300">Submit Application</button>
                    <button class="rounded-md px-[14px] py-[9px] bg-slate-300">Cancel</button>
                </div>

            </form>
        </div>



    </div>


</body>

</html>