<div>
    <form wire:submit.prevent="saveVideo">
        <label class="px-5 text-sm">Please fill up the form below accurately. Any discrepency between the information below and the document
            provided will be considered as misinformation.</label>
        <div class="flex justify-center mt-2">
            <div class="p-6 max-w-2xl rounded-lg shadow-xl bg-gray-50">
                <div class="m-2">
                    <label class="inline-block mb-2 text-gray-500">File Upload</label>
                    <div class="flex items-center justify-center w-full">
                        <label
                            class="flex flex-col w-full h-82 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                            <div class="flex flex-col items-center justify-center pt-7">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8 text-gray-400 group-hover:text-gray-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                    Attach a file</p>
                            </div>

                            <input wire:model="video" type="file" class="opacity-0" />
                        </label>

                    </div>
                </div>
                @error('video')
                    <span class="pl-3 error text-xs text-red-400">{{ $message }}</span>
                @enderror
                @if ($video)
                    <button type="button"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:click="$emit('openPreview3', '{{ $video->temporaryUrl() }}')">Preview</button>
                @endif
                @if ($video_path)
                    <button type="button"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:click="$emit('openPreview3', '{{ asset($video_path) }}')">Uploaded</button>
                @endif
                <div class="flex justify-center p-2">
                    <button type="submit"
                        class="w-full px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded shadow-xl">Upload</button>
                    

                </div>
                <span class="text-sm">(Maximum file size is 5MB. Only .mp4 file accepted) </span>
            </div>

        </div>
    </form>
</div>
