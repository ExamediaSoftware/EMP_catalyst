<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <!-- START Selected_FINAL   bg-white-->
    <div class="flex flex-1 flex-col gap-3 ">
        <div class="rounded shadow-lg bg-white border-2 border-gray-200 mx-2 my-4 p-2 pb-4">
            <div class="mx-2 my-6 font-bold text-black">Status</div>
            <div class="mx-3 mb-2 px-2 font-bold text-gray-600">Selected - Final</div>
            <div class="font-bla mx-3 mb-2 px-2 text-gray-600">This application interview has been selected
                on the final stage. It just needs to be verified by the higher ups.</div>

            <div class="mx-4">
                <div class="col-span-2 grid">

                    <button
                        class="rounded border border-blue-700 bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700"
                        onclick="openModalVerify('modal_verify')">VERIFY</button>
                    <!-- modal_reviewed_review -->
                    <div id="modal_verify"
                        class="fixed inset-0 z-50 hidden h-full w-full overflow-y-auto bg-gray-200 bg-opacity-10 px-4">
                        <div class="relative top-40 mx-auto max-w-md rounded-md bg-white shadow-lg">
                            <!-- Modal header -->
                            <!-- <div class="flex items-center justify-between rounded-t-md bg-blue-500 px-4 py-2 text-xl text-white">
          <h3>Modal header</h3>
          <button onclick="closeModal()">x</button>
        </div>
        Modal body -->
                            <div class="max-h-screen p-4 ">
                                <p>VERIFY? You are about to reject this application. Are you sure you want
                                    to proceed?</p>
                            </div>
                            <!-- Modal footer border-t border-t-gray-500-->
                            <div class="flex items-center justify-end space-x-4 gap-2 px-4 py-2">
                                <button class="rounded-md bg-gray-300 px-4 py-2 text-blue transition hover:bg-blue-700"
                                    onclick="closeModalVerify()">CANCEL</button>
                                <button class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                                wire:click="$emit('verify')">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                    <!-- modal_reviewed_review -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Selected_FINAL  ROW -->
</div>
