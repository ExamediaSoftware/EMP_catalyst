<div>
    <div class="mt-10 sm:mt-0">
  
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form wire:submit.prevent="update_employee">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-3 sm:col-span-1">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Full-Time Employees</label>
                    <input wire:model="emp_total_no.0" type="text" autocomplete="given-name" class="px-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-1/2 shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                  <div class="col-span-3 sm:col-span-1">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Part-Time Employees</label>
                    <input wire:model="emp_total_no.1" type="text" autocomplete="family-name" class="px-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-1/2 shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>                
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Save
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
