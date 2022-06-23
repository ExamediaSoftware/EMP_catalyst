<div>
    {{-- Stop trying to control. --}}
    <div class="flex flex-row-reverse mb-4 text-sm">
        
        <button onclick="openModal('modal_notify_applicant')" type="submit" class="btn-shadow">{{ __('Notify Successfull Applicant') }}</button>
       
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        {{ __('Company name') }}
                    </th>
                    <th scope="col"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        {{ __('Submission date') }}
                    </th>
                    <th scope="col"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col"
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $item->company_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                <span class="relative">
                                    @if (!$item->currentStatus == null)
                                        {{ $item->currentStatus->status_id }}
                                    @else
                                        ""
                                    @endif
                                </span>
                            </span>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.show', $item->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Open</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Modal confirm to notify successfull applicant --}}
    <div id="modal_notify_applicant" class="fixed inset-0 z-50 hidden h-screen w-full px-4"
            style="background-color:rgba(30, 30, 30, 0.801)">
            <div class="mt-20 relative top-40 mx-auto max-w-md rounded-md bg-white shadow-lg">

                <div class="max-h-48 p-4">
                    <p>Are you sure to notify successfull applicant via email and system?</p>
                </div>
                <!-- Modal footer border-t border-t-gray-500-->
                <div class="flex items-center justify-end space-x-4 gap-2 px-4 py-2">
                    <button
                        class="rounded-md bg-gray-300 px-4 py-2 text-black hover:text-white transition hover:bg-gray-700"
                        onclick="closeModal('modal_notify_applicant')">CANCEL</button>
                    {{-- <button class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                        onclick="test()">YES</button> --}}
                    <button class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                        wire:click="$emit('sendnotification_to_successfull')">YES</button>
                </div>
            </div>
        </div>
</div>
