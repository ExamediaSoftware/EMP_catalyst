<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit.prevent="submitApplication">
        <div class="w-10/12 mx-auto">
            <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                    <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <tbody>

                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">
                                <input wire:model="acknowledgement_checkbox" type="checkbox" value="Yes"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                            </td>
                            <td class="py-2 px-2 border-b border-grey-light">
                                <div class="max-w-2xl mx-auto">
                                    <label>
                                        <h4 class="p-2">
                                            I hereby declare that the information provided is true and correct. I also
                                            understand that any willful dishonesty may render for refusal of this
                                            application.
                                        </h4>
                                        <h4 class="p-2">
                                            If this application is successful, I authorize Ekuinas to keep this
                                            information in my personal file, otherwise, all information will be
                                            destroyed within 3 months after the date of application.
                                        </h4>
                                        <h4 class="p-2">
                                            I authorize Ekuinas to disclose in a confidential manner of any information
                                            supplied in this application to the parties namely the Human Resources
                                            staff, concerning department head or above for and assessment.
                                        </h4>
                                    </label>

                                </div>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="flex justify-center p-2">
                @error('acknowledgement_checkbox')
                    <span class="pl-3 error text-xs text-red-400">{{ $message }}</span>
                @enderror
                {{-- {{$error_sini}} --}}
                @if (count($error_sini))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Please complete tab:</strong>
                        <ul>
                            @foreach ($error_sini as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        
                    </div>
                @endif
            </div>

            <div class="flex justify-center p-2">

                <button type="submit"
                    class="w-1/4 px-4 py-2 text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 rounded shadow-xl">
                    @if ($application->currentStatus->status_id == 'Queried')
                        RESUBMIT APPLICATION
                    @else
                        SUBMIT APPLICATION
                    @endif
                </button>


            </div>
        </div>

    </form>
</div>
