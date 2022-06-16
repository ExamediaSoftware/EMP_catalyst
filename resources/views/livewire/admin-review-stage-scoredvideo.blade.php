<div>
    {{-- Be like water. --}}

    <!-- START Scored_Video   bg-white-->
    <div class="flex flex-1 flex-col gap-3">
        <div class="rounded shadow-lg bg-white border-2 border-gray-200 mx-2 my-4 p-2 pb-4">
            <div class="mx-2 my-6 font-bold text-black">Status</div>


            <div class="mx-3 mb-2 px-2 font-bold text-gray-600">Scored - Video</div>
            <div class="font-bla mx-3 mb-2 px-2 text-gray-600">This application’s video submission has been
                completely scored.</div>

            <div class="mx-4">
                <div class="col-span-2 grid">

                    <button
                        class="rounded border border-blue-700 bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700"
                        onclick="openModalVideoSelect('modal_scored_video_select')">SELECT</button>


                    <button
                        class="mt-4 rounded border border-blue-700 bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700"
                        onclick="openModalVideoReject('modal_scored_video_reject')">REJECT</button>

                </div>
            </div>
        </div>
    </div>
    <!-- END Scored_Video  ROW -->

    <!-- modal_reviewed_review -->
    <div id="modal_scored_video_select" wire:ignore.self
        class="fixed inset-0 z-50 hidden h-full w-full overflow-y-auto bg-gray-200 bg-opacity-10 px-4"
        style="background-color:rgba(30, 30, 30, 0.801)">
        <div class="mt-20 relative top-40 mx-auto max-w-md rounded-md bg-white shadow-lg">

            <!-- Modal body -->
            <div class="max-h-48 p-4">
                <p>You are about to select this application for the Interview Stage. Please
                    fill the date of the interview and click Confirm.</p>
            </div>
            <div>
                <div class="flex items-center justify-center">
                    <div class="datepicker relative form-floating mb-3 xl:w-96" data-mdb-toggle-button="false">
                        <input wire:model="date_interview" type="date"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Select a date" />
                        @error('date_interview')
                            <span class="pl-3 error text-xs text-red-400">{{ $message }}</span>
                        @enderror
                        <label for="floatingInput" class="text-gray-700">Select a
                            date</label>
                        <button class="datepicker-toggle-button" data-mdb-toggle="datepicker">
                            <i class="fas fa-calendar datepicker-toggle-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Modal footer border-t border-t-gray-500-->
            <div class="flex items-center justify-end space-x-4 gap-2 px-4 py-2">
                <button class="rounded-md bg-gray-300 px-4 py-2 text-blue transition hover:bg-blue-700"
                    onclick="closeModalVideoSelect()">CANCEL</button>
                <button class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                    wire:click="$emit('selectforinterview')">YES</button>
            </div>
        </div>
    </div>
    <!-- modal_reviewed_review -->

    <!-- modal_reviewed_query -->
    <div id="modal_scored_video_reject" wire:ignore.self
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
                    onclick="closeModalVideoReject()">CANCEL</button>
                <button class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                    wire:click="$emit('rejectbeforeinterview')">YES</button>
            </div>
        </div>
    </div>
    <!-- modal_reviewed_query -->
</div>
