<div class="mt-2 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                {{-- <h1>{{ $company_name }}</h1> --}}
                <h3 class="text-lg font-medium leading-6 text-gray-900">General</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Use a permanent address where you can receive mail.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="update">
                <input name="application_id" type="hidden" value="{{ $application->id }}">
                {{-- <div class="shadow overflow-hidden sm:rounded-md"> --}}
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-9 sm:grid-cols-9 gap-4 lg:gap-5">
                        {{-- <div class="grid grid-cols-12 lg:grid-cols-12 gap-4"> --}}
                        <div class="col-span-3 sm:col-span-3">
                            <label for="company_name" class="block text-sm font-medium text-gray-700">Company
                                Name</label>
                            <input wire:model="company_name" type="text" name="company_name" id="company_name"
                                autocomplete="given-name"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('company_name')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <label for="business_reg_no" class="block text-sm font-medium text-gray-700">Business
                                Registration No.</label>
                            <input wire:model="business_reg_no" type="text" name="business_reg_no" id="business_reg_no"
                                autocomplete="family-name"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('business_reg_no')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- </div> --}}
                        <div class="col-span-3 sm:col-span-1">
                            <label for="business_reg_year" class="block text-sm font-medium text-gray-700">Registration
                                Year</label>
                            <input wire:model="business_reg_year" type="text" name="business_reg_year"
                                id="business_reg_year"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('business_reg_year')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        @php
                            // print_r($global_company_type);
                        @endphp
                        <div class="col-span-4 sm:col-span-4">
                            <label for="company_type" class="block text-sm font-medium text-gray-700">Company
                                Type</label>
                            <select wire:model="company_type" id="company_type" name="company_type"
                                class="mt-1 text-gray-600 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                <option class="py-2">Please Choose</option>
                                @foreach ($global_company_type as $company_type)
                                    @if (Request::old('company_type') == $company_type->type_id)
                                        <option value="{{ $company_type->type_id }}" selected>
                                            {{ $company_type->type_name }}</option>
                                    @else
                                        <option value="{{ $company_type->type_id }}">
                                            {{ $company_type->type_name }}</option>
                                    @endif
                                @endforeach

                            </select>
                            @error('company_type')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-4 sm:col-span-4">
                            <label for="sector_type" class="block text-sm font-medium text-gray-700">Sector Type</label>
                            <select wire:model="sector_type" id="sector_type" name="sector_type"
                                class="mt-1 text-gray-600 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                <option>Please Choose</option>
                                @php 
                                $firstValue = true;
                                $counter = 1; 
                                
                                @endphp
                                @foreach ($global_sector_type as $sector_type)
                                    @if (Request::old('sector_type') == $sector_type->type_id)
                                        <option value="{{ $sector_type->type_id }}" selected>
                                            {{ $sector_type->type_name }}</option>
                                    @else
                                        @if (substr($sector_type->type_id, 0, 4) == 'ST05')
                                            @if($firstValue)
                                            <option disabled value="{{ $sector_type->type_id }}"><span class="text-gray-300">
                                                {{ $sector_type->type_name }}</span></option>
                                                @php $firstValue = false; @endphp
                                            @else
                                            
                                            @endif
                                            <option value="{{ $sector_type->type_id }}"><p class="pl-4">
                                                &nbsp;&nbsp;&nbsp;&nbsp;{{ $sector_type->subtype_name }}</p></option>
                                        @else
                                            <option value="{{ $sector_type->type_id }}">
                                                {{ $sector_type->type_name }}</option>
                                        @endif
                                    @endif
                                    @php $counter++; @endphp
                                @endforeach

                            </select>
                            @error('sector_type')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-9">
                            <label for="business_desc" class="block text-sm font-medium text-gray-700">Business
                                Desc</label>
                            <textarea wire:model="business_desc" type="text" name="business_desc" id="business_desc" autocomplete="business_desc"
                                class="px-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            @error('business_desc')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-9">
                            <label for="address_line1" class="block text-sm font-medium text-gray-700">Address Line
                                1</label>
                            <input wire:model="address_line1" type="text" name="address_line1" id="address_line1"
                                autocomplete="address_line1"
                                class="px-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('address_line1')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-9">
                            <label for="address_line2" class="block text-sm font-medium text-gray-700">Address Line
                                2</label>
                            <input wire:model="address_line2" type="text" name="address_line2" id="address_line2"
                                autocomplete="address_line2"
                                class="px-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('address_line2')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-2">
                            <label for="postcode" class="block text-sm font-medium text-gray-700">
                                Postcode</label>
                            <input wire:model="postcode" type="text" name="postcode" id="postcode"
                                autocomplete="postal-code"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('postcode')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-6 lg:col-span-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input wire:model="city" type="text" name="city" id="city"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('city')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-2">
                            <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                            <select wire:model="state" id="state" name="state"
                                class="mt-1 text-gray-600 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                <option class="py-2">Please Choose</option>
                                @foreach ($global_states as $state)
                                    @if (Request::old('state') == $state->type_id)
                                        <option value="{{ $state->type_id }}" selected>
                                            {{ $state->type_name }}</option>
                                    @else
                                        <option value="{{ $state->type_id }}">
                                            {{ $state->type_name }}</option>
                                    @endif
                                @endforeach

                            </select>
                            
                            @error('state')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-6 lg:col-span-2">
                            <label for="office_number" class="block text-sm font-medium text-gray-700">Office
                                Number</label>
                            <input wire:model="office_number" type="text" name="office_number" id="office_number"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('office_number')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-2">
                            <label for="fax_number" class="block text-sm font-medium text-gray-700">Fax Number</label>
                            <input wire:model="fax_number" type="text" name="fax_number" id="fax_number"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('fax_number')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <br />
                        <div class="col-span-9 mt-5">
                            <span class="text-sm">Representative 1 (Founder)</span>
                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <label for="rep_name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input wire:model="rep_name.0" type="text" name="rep_name[]" id="rep_name1"
                                autocomplete="given-name"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('rep_name')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <label for="rep_position" class="block text-sm font-medium text-gray-700">Position</label>
                            <input wire:model="rep_position.0" type="text" name="rep_position[]" id="rep_position1"
                                autocomplete="family-name"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('rep_position')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- </div> --}}
                        <div class="col-span-3 sm:col-span-1">
                            <label for="rep_age" class="block text-sm font-medium text-gray-700">Age</label>
                            <input wire:model="rep_age.0" type="text" name="rep_age[]" id="rep_age1"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('rep_age')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-1">
                            <label for="rep_phone1" class="block text-sm font-medium text-gray-700">Mobile
                                Number</label>
                            <input wire:model="rep_phone.0" type="text" name="rep_phone[]" id="rep_phone1"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('rep_phone')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-3 sm:col-span-1">
                            <label for="rep_email1" class="block text-sm font-medium text-gray-700">Email</label>
                            <input wire:model="rep_email.0" type="text" name="rep_email[]" id="rep_email"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('rep_email')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <br />
                        <div class="col-span-9 mt-5">
                            <span class="text-sm">Representative 2 (Co-founder)</span>
                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <label for="rep_name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input wire:model="rep_name.1" type="text" name="rep_name[]" id="rep_name2"
                                autocomplete="given-name"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('rep_name')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <label for="rep_position" class="block text-sm font-medium text-gray-700">Position</label>
                            <input wire:model="rep_position.1" type="text" name="rep_position[]" id="rep_position2"
                                autocomplete="family-name"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('rep_position')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- </div> --}}
                        <div class="col-span-3 sm:col-span-1">
                            <label for="rep_age" class="block text-sm font-medium text-gray-700">Age</label>
                            <input wire:model="rep_age.1" type="text" name="rep_age[]" id="rep_age2"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('rep_age')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-1">
                            <label for="rep_phone1" class="block text-sm font-medium text-gray-700">Mobile
                                Number</label>
                            <input wire:model="rep_phone.1" type="text" name="rep_phone[]" id="rep_phone2"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('rep_phone')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-3 sm:col-span-1">
                            <label for="rep_email2" class="block text-sm font-medium text-gray-700">Email</label>
                            <input wire:model="rep_email.1" type="text" name="rep_email[]" id="rep_email2"
                                class="pl-2 mt-1 bg-gray-200 border-indigo-200 border-solid border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm rounded-md">
                            @error('rep_email')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
                {{-- </div> --}}
            </form>
        </div>
    </div>
</div>
