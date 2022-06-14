<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <form wire:submit.prevent="saveFiles">
        <label>Please fill up the form below accurately. Any discrepency between the information below and the document
            provided will be considered as misinformation.</label>
        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <tbody>
                    <!--Business Registration Certificate -->
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Business Registration Certificate</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <div class="max-w-2xl mx-auto">
                                <input wire:model="business_reg_cert"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    type="file">
                                    <div wire:loading wire:target="business_reg_cert">Uploading...</div>
                                @if ($business_reg_cert)
                                    <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        wire:click="$emit('openPreview2', '{{ $business_reg_cert->temporaryUrl() }}')">Preview</button>
                                    {{-- <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50" 
                                    onclick="document.dispatchEvent(new Event('openPreview'))"> Open Preview </a> --}}
                                    {{-- Photo Preview:
                                    <img width="200" height="200" src="{{ $business_reg_cert->temporaryUrl() }}"> --}}
                                @endif
                                @if ($business_reg_cert_path)
                                    <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        wire:click="$emit('openPreview2', '{{ asset($business_reg_cert_path) }}')">Uploaded</button>
                                @endif
                            </div>
                            @error('business_reg_cert')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <!--Owner’s IC -->
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Owner’s IC</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <div class="max-w-2xl mx-auto">
                                <input wire:model="owner_ic_file"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    type="file">
                                    <div wire:loading wire:target="owner_ic_file">Uploading...</div>
                                @if ($owner_ic_file)
                                    <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        wire:click="$emit('openPreview2', '{{ $owner_ic_file->temporaryUrl() }}')">Preview</button>
                                    
                                @endif
                                @if ($owner_ic_file_path)
                                    <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        wire:click="$emit('openPreview2', '{{ asset($owner_ic_file_path) }}')">Uploaded</button>
                                @endif
                            </div>
                            @error('owner_ic_file')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <!--Financial Statement (Year 2020) -->
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Financial Statement (Year 2020)</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <div class="max-w-2xl mx-auto">
                                <input wire:model="fin_state_2020"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    type="file">
                                @if ($fin_state_2020)
                                    <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        wire:click="$emit('openPreview2', '{{ $fin_state_2020->temporaryUrl() }}')">Preview</button>
                                    
                                @endif
                                @if ($fin_state_2020_path)
                                    <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        wire:click="$emit('openPreview2', '{{ asset($fin_state_2020_path) }}')">Uploaded</button>
                                @endif
                            </div>
                            @error('fin_state_2020')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <!--Financial Statement (Year 2021) -->
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">Financial Statement (Year 2021)</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <div class="max-w-2xl mx-auto">
                                <input wire:model="fin_state_2021"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    type="file">
                                @if ($fin_state_2021)
                                    <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        wire:click="$emit('openPreview2', '{{ $fin_state_2021->temporaryUrl() }}')">Preview</button>
                                    
                                @endif
                                @if ($fin_state_2021_path)
                                    <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        wire:click="$emit('openPreview2', '{{ asset($fin_state_2021_path) }}')">Uploaded</button>
                                @endif
                            </div>
                            @error('fin_state_2021')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <!--EPF Contribution Statement/Payslips -->
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">EPF Contribution Statement/Payslips</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <div class="max-w-2xl mx-auto">
                                <input wire:model="epf_or_payslip"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    type="file">
                                @if ($epf_or_payslip)
                                    <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        wire:click="$emit('openPreview2', '{{ $epf_or_payslip->temporaryUrl() }}')">Preview</button>
                                    
                                @endif
                                @if ($epf_or_payslip_path)
                                    <button type="button"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        wire:click="$emit('openPreview2', '{{ asset($epf_or_payslip_path) }}')">Uploaded</button>
                                @endif
                            </div>
                            @error('epf_or_payslip')
                                <span class="error text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>


</div>
