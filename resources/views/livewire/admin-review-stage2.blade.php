<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="flex flex-1 flex-col gap-3">
        <div class="rounded shadow-lg bg-white border-2 border-gray-200 mx-2 my-4 p-2 pb-4">
            <div class="mx-2 my-6 font-bold text-black">Status</div>
            <div class="mx-3 mb-2 px-2 font-bold text-gray-600">{{$application_current_status}}</div>
            <div class="font-bla mx-3 mb-2 px-2 text-gray-600">This application has been
                reviewed. Pending video scoring</div>

            <div class="mx-4">
                <div class="col-span-2 grid">
                    <button
                        class="mt-4 rounded border border-blue-700 bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700"
                        onclick="openModalIV('modal_selected_iv')">SCORE</button>

                </div>
            </div>
        </div>
    </div>

    <!-- modal_reviewed_query -->
    <div wire:ignore.self id="modal_selected_iv"
        class="fixed inset-0 z-50 hidden h-full w-full overflow-y-auto bg-gray-200 bg-opacity-10 px-4"
        style="background-color:rgba(30, 30, 30, 0.801)">
        <div class="mt-20 relative top-40 mx-auto max-w-md rounded-md bg-white shadow-lg">
            <div class="max-h-screen p-4 ">
                <p>Please enter the scoring that you would like to put for the video.
                    (minimum score = 0; maximum score = 100):</p>
                <div class="relative inline-flex ">
                    <div class="py-2">
                        <div class"">Video Score</div>
                        <input type="number" wire:model="videoScore"
                            class="border border-gray-300 rounded-lg text-gray-600 h-10 pr-2 bg-gray-100 hover:border-gray-400 ">
                        @error('videoScore')
                            <span class="pl-3 error text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Modal footer border-t border-t-gray-500-->
            <div class="flex items-center justify-end space-x-4 gap-2 px-4 py-2">
                <button class="rounded-md bg-gray-300 px-4 py-2 text-blue transition hover:bg-blue-700"
                    onclick="closeModalIV()">CANCEL</button>
                <button class="rounded-md bg-blue-500 px-4 py-2 text-white transition hover:bg-blue-700"
                    wire:click="$emit('submitvideoscore')">SUBMIT</button>
            </div>
        </div>
    </div>
    <!-- modal_reviewed_query -->
</div>
