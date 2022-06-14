<div>
    <div class="flex flex-row-reverse mb-4 text-sm">
        <button wire:click="add" type="button" class="btn-shadow text-sm">{{ __('Create New Shareholder') }}</button>
    </div>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form wire:submit.prevent="update_ownership">
        <input name="application_id" type="hidden" value="{{ $application->id }}">
        <input wire:model="ownership_count" id="ownership_count" name="ownership_count" type="hidden">
        <div id="list" class="px-4 py-5 bg-white sm:p-6">

            <div class="col-span-9 mb-3">
                <span class="text-sm font-bold">Shareholder 1</span>
            </div>
            <div class="grid grid-cols-12 gap-6 ml-4">
                <div class="col-span-8 sm:col-span-4">
                    <label for="shareholder_name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input wire:model="shareholder_name.0" type="text" name="shareholder_name[]" id="shareholder_name1"
                        autocomplete="given-name"
                        class="mt-1 px-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shareholder_name.0')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-4 sm:col-span-2">
                    <label for="shareholder_percentage"
                        class="block text-sm font-medium text-gray-700">Percentage</label>
                    <input wire:model="shareholder_percentage.0" type="text" name="shareholder_percentage[]"
                        id="shareholder_percentage1" autocomplete="family-name"
                        class="mt-1 w-1/4 px-2 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shareholder_percentage.0')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="shareholder_race" class="block text-sm font-medium text-gray-700">Race</label>
                    <select wire:model="shareholder_race.0" id="shareholder_race.1" name="shareholder_race[]"
                        autocomplete="country"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Please Choose</option>
                        @foreach ($global_race as $item)
                            @if (Request::old('shareholder_race.0') == $item->type_id)
                                <option value="{{ $item->type_id }}" selected>
                                    {{ $item->type_name }}</option>
                            @else
                                <option value="{{ $item->type_id }}">
                                    {{ $item->type_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('shareholder_race.0')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="shareholder_religion" class="block text-sm font-medium text-gray-700">Religion</label>
                    <select wire:model="shareholder_religion.0" id="shareholder_religion1" name="shareholder_religion[]"
                        autocomplete="shareholder_religion"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Please Choose</option>
                        @foreach ($global_religion_type as $item)
                            @if (Request::old('shareholder_race.0') == $item->type_id)
                                <option value="{{ $item->type_id }}" selected>
                                    {{ $item->type_name }}</option>
                            @else
                                <option value="{{ $item->type_id }}">
                                    {{ $item->type_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('shareholder_religion.0')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-3 sm:col-span-1">
                    <label for="shareholder_gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select wire:model="shareholder_gender.0" id="shareholder_gender1" name="shareholder_gender[]"
                        autocomplete="shareholder_gender"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Please Choose</option>
                        @foreach ($global_gender_type as $item)
                            @if (Request::old('shareholder_gender.0') == $item->type_id)
                                <option value="{{ $item->type_id }}" selected>
                                    {{ $item->type_name }}</option>
                            @else
                                <option value="{{ $item->type_id }}">
                                    {{ $item->type_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('shareholder_gender.0')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-3 sm:col-span-1">
                    <label for="shareholder_age" class="block text-sm font-medium text-gray-700">Age</label>
                    <select wire:model="shareholder_age.0" id="shareholder_age1" name="shareholder_age[]"
                        autocomplete="shareholder_age"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Please Choose</option>
                        @foreach ($global_age_type as $item)
                            @if (Request::old('shareholder_age.0') == $item->type_id)
                                <option value="{{ $item->type_id }}" selected>
                                    {{ $item->type_name }}</option>
                            @else
                                <option value="{{ $item->type_id }}">
                                    {{ $item->type_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('shareholder_age.0')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-span-12 mt-5">
                <span class="text-sm font-bold">Shareholder 2</span>
            </div>

            <div class="grid grid-cols-12 gap-6 ml-4">
                <div class="col-span-8 sm:col-span-4">
                    <label for="shareholder_name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input wire:model="shareholder_name.1" type="text" name="shareholder_name[]" id="shareholder_name2"
                        autocomplete="given-name"
                        class="mt-1  px-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shareholder_name.1')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-4 sm:col-span-2">
                    <label for="shareholder_percentage"
                        class="block text-sm font-medium text-gray-700">Percentage</label>
                    <input wire:model="shareholder_percentage.1" type="text" name="shareholder_percentage[]"
                        id="shareholder_percentage2" autocomplete="family-name"
                        class="mt-1 w-1/4 px-2  focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('shareholder_percentage.1')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="shareholder_race" class="block text-sm font-medium text-gray-700">Race</label>
                    <select wire:model="shareholder_race.1" id="shareholder_race2" name="shareholder_race[]"
                        autocomplete="country"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Please Choose</option>
                        @foreach ($global_race as $item)
                            @if (Request::old('shareholder_race.1') == $item->type_id)
                                <option value="{{ $item->type_id }}" selected>
                                    {{ $item->type_name }}</option>
                            @else
                                <option value="{{ $item->type_id }}">
                                    {{ $item->type_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('shareholder_race.1')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="shareholder_religion" class="block text-sm font-medium text-gray-700">Religion</label>
                    <select wire:model="shareholder_religion.1" id="shareholder_religion2" name="shareholder_religion[]"
                        autocomplete="shareholder_religion"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Please Choose</option>
                        @foreach ($global_religion_type as $item)
                            @if (Request::old('shareholder_race.1') == $item->type_id)
                                <option value="{{ $item->type_id }}" selected>
                                    {{ $item->type_name }}</option>
                            @else
                                <option value="{{ $item->type_id }}">
                                    {{ $item->type_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('shareholder_religion.1')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-3 sm:col-span-1">
                    <label for="shareholder_gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select wire:model="shareholder_gender.1" id="shareholder_gender2" name="shareholder_gender[]"
                        autocomplete="shareholder_gender"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Please Choose</option>
                        @foreach ($global_gender_type as $item)
                            @if (Request::old('shareholder_gender.1') == $item->type_id)
                                <option value="{{ $item->type_id }}" selected>
                                    {{ $item->type_name }}</option>
                            @else
                                <option value="{{ $item->type_id }}">
                                    {{ $item->type_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('shareholder_gender.1')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-span-3 sm:col-span-1">
                    <label for="shareholder_age" class="block text-sm font-medium text-gray-700">Age</label>
                    <select wire:model="shareholder_age.1" id="shareholder_age2" name="shareholder_age[]"
                        autocomplete="shareholder_age"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Please Choose</option>
                        @foreach ($global_age_type as $item)
                            @if (Request::old('shareholder_age.1') == $item->type_id)
                                <option value="{{ $item->type_id }}" selected>
                                    {{ $item->type_name }}</option>
                            @else
                                <option value="{{ $item->type_id }}">
                                    {{ $item->type_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('shareholder_age.1')
                        <span class="text-xs text-red-400 error">{{ $message }}</span>
                    @enderror
                </div>
            </div>



            @foreach ($inputs as $key => $value)
                <div class="col-span-12 mt-5">
                    <span class="text-sm font-bold">Shareholder {{ $value }}</span>
                </div>

                <div class="grid grid-cols-12 gap-6 ml-4">
                    <div class="col-span-8 sm:col-span-4">
                        <label for="shareholder_name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input wire:model="shareholder_name.{{ $value - 1 }}" type="text" name="shareholder_name[]"
                            id="shareholder_name.{{ $value }}" autocomplete="given-name"
                            class="mt-1 px-2  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('shareholder_name.' . ($value - 1))
                            <span class="text-xs text-red-400 error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-4 sm:col-span-2">
                        <label for="shareholder_percentage"
                            class="block text-sm font-medium text-gray-700">Percentage</label>
                        <input wire:model="shareholder_percentage.{{ $value - 1 }}" type="text"
                            name="shareholder_percentage[]" id="shareholder_percentage{{ $value }}"
                            autocomplete="family-name"
                            class="mt-1 w-1/4 px-2  focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('shareholder_percentage.' . ($value - 1))
                            <span class="text-xs text-red-400 error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-3 sm:col-span-2">
                        <label for="shareholder_race" class="block text-sm font-medium text-gray-700">Race</label>
                        <select wire:model="shareholder_race.{{ $value - 1 }}"
                            id="shareholder_race{{ $value }}" name="shareholder_race[]" autocomplete="country"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Please Choose</option>
                            @foreach ($global_race as $item)
                                @if (Request::old('shareholder_race.{{ $value - 1 }}') == $item->type_id)
                                    <option value="{{ $item->type_id }}" selected>
                                        {{ $item->type_name }}</option>
                                @else
                                    <option value="{{ $item->type_id }}">
                                        {{ $item->type_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('shareholder_race.' . ($value - 1))
                            <span class="text-xs text-red-400 error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-3 sm:col-span-2">
                        <label for="shareholder_religion"
                            class="block text-sm font-medium text-gray-700">Religion</label>
                        <select wire:model="shareholder_religion.{{ $value - 1 }}"
                            id="shareholder_religion{{ $value }}" name="shareholder_religion[]"
                            autocomplete="shareholder_religion"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Please Choose</option>
                            @foreach ($global_religion_type as $item)
                                @if (Request::old('shareholder_religion.{{ $value - 1 }}') == $item->type_id)
                                    <option value="{{ $item->type_id }}" selected>
                                        {{ $item->type_name }}</option>
                                @else
                                    <option value="{{ $item->type_id }}">
                                        {{ $item->type_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('shareholder_religion.' . ($value - 1))
                            <span class="text-xs text-red-400 error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-3 sm:col-span-1">
                        <label for="shareholder_gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select wire:model="shareholder_gender.{{ $value - 1 }}"
                            id="shareholder_gender{{ $value }}" name="shareholder_gender[]"
                            autocomplete="shareholder_gender"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Please Choose</option>
                            @foreach ($global_gender_type as $item)
                                @if (Request::old('shareholder_gender.{{ $value - 1 }}') == $item->type_id)
                                    <option value="{{ $item->type_id }}" selected>
                                        {{ $item->type_name }}</option>
                                @else
                                    <option value="{{ $item->type_id }}">
                                        {{ $item->type_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('shareholder_gender.' . ($value - 1))
                            <span class="text-xs text-red-400 error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-3 sm:col-span-1">
                        <label for="shareholder_age" class="block text-sm font-medium text-gray-700">Age</label>
                        <select wire:model="shareholder_age.{{ $value - 1 }}"
                            id="shareholder_age{{ $value }}" name="shareholder_age[]"
                            autocomplete="shareholder_age"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Please Choose</option>
                            @foreach ($global_age_type as $item)
                                @if (Request::old('shareholder_age.{{ $value - 1 }}') == $item->type_id)
                                    <option value="{{ $item->type_id }}" selected>
                                        {{ $item->type_name }}</option>
                                @else
                                    <option value="{{ $item->type_id }}">
                                        {{ $item->type_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('shareholder_age.' . ($value - 1))
                            <span class="text-xs text-red-400 error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endforeach
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>

    </form>
</div>
