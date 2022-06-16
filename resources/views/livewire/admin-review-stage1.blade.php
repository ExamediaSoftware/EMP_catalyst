<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="gap-6">
        <div class="rounded shadow-lg bg-white border-2 border-gray-200 mx-2 my-4 p-2 pb-4">
            <div class="mx-2 my-2 font-bold text-black">Status</div>
            {{-- <div class="mx-3 mb-2 px-2 font-bold text-gray-600">{{ $UI_status }}</div>
            <div class="font-bla mx-3 mb-2 px-2 text-gray-600">{{ $UI_status_desc }}</div> --}}

            <div class="mx-4">
                <div class="col-span-2 grid">

                    <button
                        class="rounded border border-blue-700 bg-blue-500 py-2 px-4 font-bold text-sm text-white hover:bg-blue-700"
                        onclick="openModalReview('modal_reviewed_review')">REVIEW</button>


                    <button
                        class="mt-4 rounded border border-blue-700 bg-blue-500 py-2 px-4 text-sm font-bold text-white hover:bg-blue-700"
                        onclick="openModalQuery('modal_reviewed_query')">QUERY</button>

                </div>
            </div>
        </div>

        <!-- modal_reviewed_review -->
        <div id="modal_reviewed_review" class="fixed inset-0 z-50 hidden h-screen w-full px-4"
            style="background-color:rgba(30, 30, 30, 0.801)">
            <div class="mt-20 relative top-40 mx-auto max-w-md rounded-md bg-white shadow-lg">

                <div class="max-h-48 p-4">
                    <p>Are you sure you have checked all the automatic scores given to the
                        application? If there is any discrepency with the application, please
                        query it back to the applicant first. If everything checks out, then
                        please proceed.</p>
                </div>
                <!-- Modal footer border-t border-t-gray-500-->
                <div class="flex items-center justify-end space-x-4 gap-2 px-4 py-2">
                    <button
                        class="rounded-md bg-gray-300 px-4 py-2 text-black hover:text-white transition hover:bg-gray-700"
                        onclick="closeModalReview()">CANCEL</button>
                    {{-- <button class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                        onclick="test()">YES</button> --}}
                    <button class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                        wire:click="$emit('submitreview')">YES</button>
                </div>
            </div>
        </div>
        <!-- modal_reviewed_review -->


        <!-- modal_reviewed_query -->
        <div wire:ignore id="modal_reviewed_query" class="fixed inset-0 z-50 hidden h-full w-full overflow-y-auto px-4"
            style="background-color:rgba(30, 30, 30, 0.601)">
            <div class="mt-20 relative top-40 mx-auto max-w-xl rounded-md bg-white shadow-lg">
                <div class="max-h-screen p-4 ">
                    <p>You are about to query this application back to the applicant. Please
                        specify which section that needs to be rechecked by the applicant</p>
                    <div class="relative inline-flex ">
                        <div class="py-2">
                            <div class"">Section</div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center">
                                    <input wire:model="checkbox.0" type="checkbox" value=""
                                        class="form-checkbox text-pink-500" />
                                    <span class="ml-2 text-sm">General</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input wire:model="checkbox.1" type="checkbox" value=""
                                        class="form-checkbox text-pink-500" />
                                    <span class="ml-2 text-sm">Ownership</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input wire:model="checkbox.2" type="checkbox" value=""
                                        class="form-checkbox text-pink-500" />
                                    <span class="ml-2 text-sm">Financial</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input wire:model="checkbox.3" type="checkbox" value=""
                                        class="form-checkbox text-pink-500" />
                                    <span class="ml-2 text-sm">Employees</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input wire:model="checkbox.4" type="checkbox" value=""
                                        class="form-checkbox text-pink-500" />
                                    <span class="ml-2 text-sm">Assistance</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input wire:model="checkbox.5" type="checkbox" value=""
                                        class="form-checkbox text-pink-500" />
                                    <span class="ml-2 text-sm">Document</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input wire:model="checkbox.6" type="checkbox" value=""
                                        class="form-checkbox text-pink-500" />
                                    <span class="ml-2 text-sm">Video</span>
                                </label>
                            </div>
                          
                        </div>
                    </div>
                    <div class="py-2">
                        <div class"">Comment</div>
                        <textarea wire:model="comment" rows="3"
                            class="block p-2.5 w-full text-sm text-gray-600 bg-gray-100 rounded-lg border border-gray-300 "
                            placeholder="Your message..."></textarea>
                    </div>
                </div>
                <!-- Modal footer border-t border-t-gray-500-->
                <div class="flex items-center justify-end space-x-4 gap-2 px-4 py-2">
                    <button class="rounded-md bg-gray-300 px-4 py-2 text-blue transition hover:bg-blue-700"
                        onclick="closeModalQuery()">CANCEL</button>
                    <button class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                        wire:click="$emit('submitquery')">SUBMIT</button>
                </div>
            </div>
        </div>
        <!-- modal_reviewed_query -->
    </div>


</div>
