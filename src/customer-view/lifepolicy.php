<?php include '../../dbconf/db_config.php' ?>
<?php
include '../../includes/header.php';
?>



<body class="bg-gray-300">
    <!-- Sidebar -->
    <?php include '../../includes/sidebar-life.php'; ?>
    <!-- Main content -->
    <div class=" basis-5/6 h-dvh flex flex-col justify-start items-center py-3 px-5 overflow-auto">
        <div class="h-[1150px] w-full justify-center items-center bg-white px-4 rounded-md">
            <form action="" class=" mt-4">
                <p class="text-lime-700 font-medium text-[24px] basis-1/12">Life Insurance Policy</p>
                <div class="w-full grid grid-cols-2 mt-[8px] gap-4 basis-11/12">
                    <!-- Protection Package -->
                    <div class="flex flex-col h-[200px] border-2">
                        <div class="bg-lime-200 text-center py-[4px]">
                            <p class=" tracking-wide">TOTAL PROTECTION PACKAGE</p>
                        </div>

                        <div class="flex flex-col items-center mt-4">
                            <div class="flex space-x-2">
                                <div class="mt-[3px]">
                                    <input type="checkbox" class="w-[20px] h-[20px] accent-lime-200">
                                    <label for="" class="text-[18px] ml-2">Economy</label>
                                </div>

                            </div>
                        </div>
                        <div class="flex flex-col items-center mt-4">
                            <div class="flex space-x-2">
                                <div class="mt-[3px]">
                                    <input type="checkbox" class="w-[20px] h-[20px] accent-lime-200">
                                    <label for="" class="text-[18px] ml-2 font-poppins">Premiere</label>
                                </div>

                            </div>
                        </div>
                        <div class="flex flex-col items-center mt-4">
                            <div class="flex space-x-2">
                                <div class="mt-[3px]">
                                    <input type="checkbox" class="w-[20px] h-[20px] accent-lime-200">
                                    <label for="" class="text-[18px] ml-2">Deluxe</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Hospital Package -->
                    <div class="flex flex-col h-[200px] border-2">
                        <div class="bg-lime-200 text-center py-[4px]">
                            <p class=" tracking-wide">HOSPITAL ALLOWANCE PACKAGE</p>
                        </div>
                        <div class="flex flex-col justify-start items-center mt-4">
                            <div class="flex space-x-2">
                                <div class="mt-[3px] mr-2">
                                    <input type="checkbox" class="w-[20px] h-[20px] accent-lime-200">
                                </div>
                                <label for="" class="text-[18px]">Standard</label>
                            </div>
                            <div class="flex space-x-2 mt-4">
                                <div class="mt-[3px] mr-2">
                                    <input type="checkbox" class="w-[20px] h-[20px] accent-lime-200">
                                </div>
                                <label for="" class="text-[18px]">Superior</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PERSONAL DATA -->
                <div class="mt-4">
                    <div class="flex flex-col h-[730px] border-2 rounded-md">
                        <div class="bg-lime-200 text-center py-[4px]">
                            <p class=" tracking-wide">PERSONAL DATA</p>
                        </div>
                        <div class="mt-4 ml-4 pr-2">
                            <div class="grid grid-cols-2 gap-7">
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Name of Applicant:</label>
                                    <input type="text" placeholder="Name of Applicant.." class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Present/Business Address:</label>
                                    <input type="text" placeholder="Present/Business Address" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 ml-4 pr-2">
                            <div class="grid grid-cols-2 gap-7">
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Permanent/Official Mailing Address: <p class="text-[12px]">(leave blank if same with Present/Business Address)</p></label>
                                    <input type="text" placeholder="Permanent/Official Mailing Address" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                                <div class="flex flex-col space-y-[26px]">
                                    <label for="" class="text-[16px]">Occupation</label>
                                    <input type="text" placeholder="Occupation" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 ml-4 pr-2">
                            <div class="grid grid-cols-3 gap-7">
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Source of Funds:</label>
                                    <input type="text" placeholder="Source of Funds" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Date of Birth:</label>
                                    <input type="date" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Place of Birth:</label>
                                    <input type="text" placeholder="Place of Birth" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 ml-4 pr-2">
                            <div class="grid grid-cols-2 gap-7">
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">TIN:</label>
                                    <input type="text" placeholder="TIN No.." class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <div class="flex flex-row">
                                        <label for="" class="text-[16px]">Other ID. </label>
                                        <p class="text-[12px] ml-[2px] mt-[2px]">(SSS/GSIS, if TIN is unavailable)</p>
                                    </div>
                                    <input type="text" placeholder="Other ID. " class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 ml-4 pr-2">
                            <div class="grid grid-cols-3 gap-7">
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Mobile No.:</label>
                                    <input type="text" placeholder="Mobile No" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Telephone No.:</label>
                                    <input type="text" placeholder="Telephone No." class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Email Address:</label>
                                    <input type="email" placeholder="Email Address" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 ml-4 pr-2">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="flex flex-col space-y-2 ">
                                    <label for="" class="text-[16px]">Gender:</label>
                                    <!-- <input type="text" placeholder="Make" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500"> -->
                                    <div class="flex flex-row space-x-2 ml-4">
                                        <div class="flex items-center">
                                            <input type="radio" name="gender" id="" class="  h-4 w-4 accent-lime-200">
                                            <label for="" class="ml-2 mr-5 text-[18px]">Male</label>
                                        </div>
                                        <div class="flex items-center ">
                                            <input type="radio" name="gender" id="" class="  h-4 w-4 accent-lime-200 ">
                                            <label for="" class="ml-2 text-[18px]">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Civil Status:</label>
                                    <div class="flex flex-col items-start mt-4 space-y-4">
                                        <div class="flex items-center">
                                            <input type="radio" name="civil_status" class="w-[20px] h-[20px] accent-lime-200">
                                            <label for="" class="text-[18px] ml-2 mr-[55px]">Single</label>

                                            <input type="radio" name="civil_status" class="w-[20px] h-[20px] accent-lime-200">
                                            <label for="" class="text-[18px] ml-2">Married</label>
                                        </div>
                                        <div class="flex items-center ">
                                            <input type="radio" name="civil_status" class="w-[20px] h-[20px] accent-lime-200">
                                            <label for="" class="text-[18px] ml-2 mr-8">Widowed</label>

                                            <input type="radio" name="civil_status" class="w-[20px] h-[20px] accent-lime-200">
                                            <label for="" class="text-[18px] ml-2">Separated</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 ml-4 pr-2">
                            <div class="grid grid-cols-3 gap-7">
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Nationality:</label>
                                    <input type="text" placeholder="Nationality" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Name of Beneficiary:</label>
                                    <input type="text" placeholder="Name of Beneficiary" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-[16px]">Name of Trustee, if beneficiary is minor:</label>
                                    <input type="text" placeholder="Name of Trustee" class="rounded-md w-full py-[2px] px-[4px] placeholder:pl-[2px] placeholder:text-sm bg-white border-2 border-slate-300 focus:ring-1 focus:outline-none focus:border-lime-500 focus:ring-lime-500">
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex flex-row justify-center space-x-4">
                                <button type="submit" class="bg-lime-300 rounded-md px-4 py-2 text-center text-[18px]">Submit Application</button>
                                <button type="submit" class="bg-red-300 rounded-md px-4 py-2 text-center text-[18px]">Cancel</button>
                            </div>

                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>


</body>