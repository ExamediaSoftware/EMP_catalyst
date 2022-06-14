<div>
    {{-- <section class="h-screen w-screen bg-gradient-to-br from-pink-50 to-indigo-100 p-8"> --}}
    <label class="block mb-4 lg:text-lg xl:text-xl font-medium text-gray-900 ">Please fill up the form below accurately.
        Any discrepency between the information below and the document provided will be considered as misinformation.
    </label>
    <form wire:submit.prevent="update_financial">
        <div class="grid justify-center md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7 my-10">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
                <span class="text-sm text-primary">2021</span>
                <div class="border-t-2 border-gray-500 ..."></div>
                <div class="p-3">
                    <label for="website-admin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Revenue</label>
                    <div class="flex mb-4">
                        <span
                            class="inline-flex items-center px-8 text-sm text-gray-900  border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            RM
                        </span>
                        <input wire:model="financial_year.0" type="hidden">
                        <input wire:model="financial_revenue.0" type="text"
                            class="rounded-none rounded-r-lg px-2 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                            placeholder="XXX , XXX . XX">
                    </div>

                    <label for="website-admin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Expenses</label>
                    <div class="flex mb-4">
                        <span
                            class="inline-flex items-center px-8 text-sm text-gray-900  border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            RM
                        </span>
                        <input wire:model="financial_expenses.0" type="text"
                            class="rounded-none rounded-r-lg px-2 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                            placeholder="XXX , XXX . XX">
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white rounded-lg border shadow-md max-w-xs md:max-w-none overflow-hidden">
                <span class="text-sm text-primary text-align: center;">2020</span>
                <div class="border-t-2 border-gray-500 ..."></div>
                <div class="p-3">
                    <label for="website-admin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Revenue</label>
                    <div class="flex mb-4">
                        <span
                            class="inline-flex items-center px-8 text-sm text-gray-900  border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            RM
                        </span>
                        <input wire:model="financial_year.1" type="hidden">
                        <input wire:model="financial_revenue.1" type="text"
                            class="rounded-none rounded-r-lg px-2 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                            placeholder="XXX , XXX . XX">

                    </div>

                    <label for="website-admin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Revenue</label>
                    <div class="flex mb-4">
                        <span
                            class="inline-flex items-center px-8 text-sm text-gray-900  border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            RM
                        </span>
                        <input wire:model="financial_expenses.1" type="text"
                            class="rounded-none rounded-r-lg px-2 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                            placeholder="XXX , XXX . XX">
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>
    {{-- </section> --}}
</div>
