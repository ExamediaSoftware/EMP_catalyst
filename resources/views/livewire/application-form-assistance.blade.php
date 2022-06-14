<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form wire:submit.prevent="update_issue">
        <h4 class=" mb-3">Business Issue</h4>
        <div class="mx-4 grid grid-cols-12 gap-5">
            <div class="col-span-8">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Issues
                    (Most Pressing)</label>
                <input wire:model="issue_priority.0" type="hidden">
                <select wire:model="issue.0" name="issue[]"
                    class="mt-1 block w-full text-sm py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Please Choose</option>
                    @php
                        $firstValue = true;
                        $counter = 1;
                        $prevType = $global_bussiness_issue[0]->type_id;
                    @endphp
                    @foreach ($global_bussiness_issue as $item)
                        @php
                            $currentType = substr($item->type_id, 0, 4); //BI01
                        @endphp
                        @if (Request::old('sector_type') == $item->type_id)
                            <option value="{{ $item->type_id }}" selected>
                                {{ $item->type_name }}</option>
                        @else
                            @if ($currentType == $prevType)
                                @if ($firstValue)
                                    <option disabled value="{{ $item->type_id }}"><span class="text-gray-300">
                                            {{ $item->type_name }}</span></option>
                                    @php $firstValue = false; @endphp
                                @endif
                                <option value="{{ $item->type_id }}">
                                    <p class="pl-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;{{ $item->subtype_name }}</p>
                                </option>
                            @else
                                @php
                                    $prevType = $currentType;
                                    $firstValue = true;
                                @endphp
                            @endif
                        @endif
                        @php $counter++; @endphp
                    @endforeach
                </select>
                @error('issue.0')
                    <span class="text-xs text-red-400 error">{{ $message }}</span>
                @enderror
                <textarea wire:model="issue_desc.0" class="form-input block w-full my-4" placeholder="Description"></textarea>
            </div>

            <div class="col-span-8">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Issues
                    (2nd Most Pressing)</label>
                <input wire:model="issue_priority.1" type="hidden">
                <select wire:model="issue.1" name="issue[]"
                    class="mt-1 block w-full text-sm py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Please Choose</option>
                    @php
                        $firstValue = true;
                        $counter = 1;
                        $prevType = $global_bussiness_issue[0]->type_id;
                    @endphp
                    @foreach ($global_bussiness_issue as $item)
                        @php
                            $currentType = substr($item->type_id, 0, 4); //BI01
                        @endphp
                        @if (Request::old('sector_type') == $item->type_id)
                            <option value="{{ $item->type_id }}" selected>
                                {{ $item->type_name }}</option>
                        @else
                            @if ($currentType == $prevType)
                                @if ($firstValue)
                                    <option disabled value="{{ $item->type_id }}"><span class="text-gray-300">
                                            {{ $item->type_name }}</span></option>
                                    @php $firstValue = false; @endphp
                                @endif
                                <option value="{{ $item->type_id }}">
                                    <p class="pl-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;{{ $item->subtype_name }}</p>
                                </option>
                            @else
                                @php
                                    $prevType = $currentType;
                                    $firstValue = true;
                                @endphp
                            @endif
                        @endif
                        @php $counter++; @endphp
                    @endforeach
                </select>
                @error('issue.1')
                    <span class="text-xs text-red-400 error">{{ $message }}</span>
                @enderror
                <textarea wire:model="issue_desc.1" class="form-input block w-full my-4" placeholder="Description"></textarea>
            </div>
            <div class="col-span-8">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Issues
                    (3rd Most Pressing)</label>
                <input wire:model="issue_priority.2" type="hidden">
                <select wire:model="issue.2" name="issue[]"
                    class="mt-1 block w-full text-sm py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Please Choose</option>
                    @php
                        $firstValue = true;
                        $counter = 1;
                        $prevType = $global_bussiness_issue[0]->type_id;
                    @endphp
                    @foreach ($global_bussiness_issue as $item)
                        @php
                            $currentType = substr($item->type_id, 0, 4); //BI01
                        @endphp
                        @if (Request::old('sector_type') == $item->type_id)
                            <option value="{{ $item->type_id }}" selected>
                                {{ $item->type_name }}</option>
                        @else
                            @if ($currentType == $prevType)
                                @if ($firstValue)
                                    <option disabled value="{{ $item->type_id }}"><span class="text-gray-300">
                                            {{ $item->type_name }}</span></option>
                                    @php $firstValue = false; @endphp
                                @endif
                                <option value="{{ $item->type_id }}">
                                    <p class="pl-4">
                                        &nbsp;&nbsp;&nbsp;&nbsp;{{ $item->subtype_name }}</p>
                                </option>
                            @else
                                @php
                                    $prevType = $currentType;
                                    $firstValue = true;
                                @endphp
                            @endif
                        @endif
                        @php $counter++; @endphp
                    @endforeach
                </select>
                @error('issue.2')
                    <span class="text-xs text-red-400 error">{{ $message }}</span>
                @enderror
                <textarea wire:model="issue_desc.2" class="form-input block w-full my-4" placeholder="Description"></textarea>
            </div>
        </div>

        <h4 class=" mb-3">Leadership Issue</h4>
        <div class="mx-4 form-select block w-full my-4"">
            <div class=" flex flex-col">
            @foreach ($global_leadership_issue as $key => $value)
                {{-- {{$value}} --}}
                <label class="inline-flex items-center">
                    <input wire:model="checkbox.{{ $key }}" type="checkbox" value="{{ $value['type_id'] }}"
                        class="form-checkbox text-pink-500" />
                    <span class="ml-2 text-sm">{{ $value['type_name'] }}</span>
                </label>
                
                @error('checkbox.' . $key)
                    <span class="text-xs text-red-400 error">{{ $message }}</span>
                @enderror
            @endforeach
            {{-- {{var_export($checkbox)}} --}}
        </div>
</div>

<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
    <button type="submit"
        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Save
    </button>
</div>
</form>
</div>
