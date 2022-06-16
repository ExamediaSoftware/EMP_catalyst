<div>
    {{-- Be like water. --}}
    <!-- START Scored_IV   bg-white-->
    <div class="flex flex-1 flex-col gap-3">
        <div class="rounded shadow-lg bg-white border-2 border-gray-200 mx-2 my-4 p-2 pb-4">
            <div class="mx-2 my-6 font-bold text-black">Status</div>
            <div class="mx-3 mb-2 px-2 font-bold text-gray-600">Scored - Interview</div>
            <div class="font-bla mx-3 mb-2 px-2 text-gray-600">This application interview has been scored.
            </div>

            <div class="mx-4">
                <div class="col-span-2 grid">

                    <button
                        class="rounded border border-blue-700 bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700"
                        onclick="openModalIVSelect('modal_scored_IV_select')">SELECT</button>


                    <button
                        class="mt-4 rounded border border-blue-700 bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700"
                        onclick="openModalIVReject('modal_scored_IV_reject')">REJECT</button>

                </div>
            </div>
        </div>
    </div>
    <!-- END Scored_IV  ROW -->

    <!-- modal_reviewed_review -->
    <div id="modal_scored_IV_select" wire:ignore.self
        class="fixed inset-0 z-50 hidden h-full w-full overflow-y-auto bg-gray-200 bg-opacity-10 px-4"
        style="background-color:rgba(30, 30, 30, 0.801)">
        <div class="mt-20 relative top-40 mx-auto max-w-md rounded-md bg-white shadow-lg">


            <div class="max-h-screen p-4 ">
                <p>You are about to select this application as a successful candidate. Are
                    you sure you want to proceed</p>
            </div>
            <!-- Modal footer border-t border-t-gray-500-->
            <div class="flex items-center justify-end space-x-4 gap-2 px-4 py-2">
                <button class="rounded-md bg-gray-300 px-4 py-2 text-blue transition hover:bg-blue-700"
                    onclick="closeModalIVSelect()">CANCEL</button>
                <button class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                    wire:click="$emit('successfullcandidate')">SUBMIT</button>
            </div>
        </div>
    </div>
    <!-- modal_reviewed_review -->

    <!-- modal_reviewed_query -->
    <div id="modal_scored_IV_reject" wire:ignore.self
        class="fixed inset-0 z-50 hidden h-full w-full overflow-y-auto bg-gray-200 bg-opacity-10 px-4"
        style="background-color:rgba(30, 30, 30, 0.801)">
        <div class="mt-20 relative top-40 mx-auto max-w-md rounded-md bg-white shadow-lg">

            <div class="max-h-screen p-4 ">
                <p>You are about to reject this application. Are you sure you want to
                    proceed?</p>
            </div>
            <!-- Modal footer border-t border-t-gray-500-->
            <div class="flex items-center justify-end space-x-4 gap-2 px-4 py-2">
                <button class="rounded-md bg-gray-300 px-4 py-2 text-blue transition hover:bg-blue-700"
                    onclick="closeModalIVReject()">CANCEL</button>
                <button class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                    wire:click="$emit('rejectafterscoreinterview')">YES</button>
            </div>
        </div>
    </div>
    <!-- modal_reviewed_query -->
</div>
