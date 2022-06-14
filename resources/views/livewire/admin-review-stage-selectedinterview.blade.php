<div>
    {{-- Do your work, then step back. --}}

    <!-- START Status_IV_ii  bg-white-->
    <div class="flex flex-1 flex-col gap-3">
        <div class="rounded shadow-lg bg-white border-2 border-gray-200 mx-2 my-4 p-2 pb-4">
            <div class="mx-2 my-6 font-bold text-black">Status</div>


            <div class="mx-3 mb-2 px-2 font-bold text-gray-600">Selected - Interview </div>
            <div class="font-bla mx-3 mb-2 px-2 text-gray-600">This Application has been selected for
                interview</div>

            <div class="mx-4">
                <div class="col-span-2 grid">
                    <button
                        class="mt-4 rounded border border-blue-700 bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700"
                        onclick="openModalIVii('modal_selected_iv_ii')">SCORE</button>
                    <!-- modal_reviewed_query -->
                    <div id="modal_selected_iv_ii"
                        class="fixed inset-0 z-50 hidden h-full w-full overflow-y-auto bg-gray-200 bg-opacity-10 px-4">
                        <div class="relative top-40 mx-auto max-w-md rounded-md bg-white shadow-lg">
                            <div class="max-h-screen p-4 ">
                                <p>Please enter the scoring that you would like to put for the interview.
                                    (minimum score = 0; maximum score = 100):</p>
                                <div class="relative inline-flex ">
                                    <div class="py-2">
                                        <div class"">Interview Score</div>
                                        <input type="number"
                                            class="border border-gray-300 rounded-lg text-gray-600 h-10 pr-2 bg-gray-100 hover:border-gray-400 ">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer border-t border-t-gray-500-->
                            <div class="flex items-center justify-end space-x-4 gap-2 px-4 py-2">
                                <button
                                    class="rounded-md bg-gray-300 px-4 py-2 text-blue transition hover:bg-blue-700"
                                    onclick="closeModalIVii()">CANCEL</button>
                                <button
                                    class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                                    wire:click="$emit('scoreinterview')">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                    <!-- modal_reviewed_query -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Status_IV_ii ROW -->
</div>
