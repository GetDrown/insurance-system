<dialog data-policy-modal>
    <div>
        <h1 class="mb-5 font-medium text-lime-600">Add Policy</h1>
        <form action="" class="flex flex-col">
            <!-- username -->
            <div class="h-[35px] flex mb-5">
                <div
                    class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                    Policy</div>
                <input type="text"
                    class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
            </div>
            <!-- password -->
            <div class="h-[35px] flex mb-5">
                <div
                    class="basis-1/5  bg-gray-700 flex justify-center items-center h-full text-white rounded-tl-md rounded-bl-md text-sm px-2">
                    Quantity</div>
                <input type="text"
                    class="basis-4/5  h-full border-2 px-3 py-2 rounded-tr-md rounded-br-md active:outline-none focus:outline-none">
            </div>
            <!-- buttns -->
            <div class="flex justify-around items-center ">
                <button class="bg-lime-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Add Staff</button>
                <button data-close-policy-modal
                    class="bg-red-300 py-2 px-2 rounded-lg font-medium w-[100px] shadow-md">Cancel</button>
            </div>
        </form>
    </div>
</dialog>