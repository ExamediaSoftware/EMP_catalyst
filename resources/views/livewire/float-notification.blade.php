<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="fixed w-fit left-0 bottom-0 my-2 mx-2 bg-transparent">
        <div id="toast-success"
            class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert" style="background-color: rgba(255, 255, 255, 0.6)">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="ml-3 text-sm font-normal">{{ $message }}</div>
            {{-- <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button> --}}
        </div>
        {{-- <audio id="ting" controls>
        <source id="ting2" src="{{ asset('music/pristine-609.mp3') }}" type="audio/mpeg">

        Your browser does not support the audio element.
    </audio> --}}
    </div>
    <script>
        $('document').ready(function() {
            var ting = $('#ting')[0];
            var ting2 = $('#ting2')[0];

            // unlockAudio();

            // this unlockAudio function is for Safari browser that do not allow sound play automatically,
            // we need to play sound when user touch/click any part of the page for a dummy
            // then we can play sound programmatically 

            function unlockAudio() {
                const sound = new Audio("{{ asset('music/pristine-609.mp3') }}");

                sound.play();
                sound.pause();
                sound.currentTime = 0;

                document.body.removeEventListener('click', unlockAudio)
                document.body.removeEventListener('touchstart', unlockAudio)
            }

            document.body.addEventListener('click', unlockAudio);
            document.body.addEventListener('touchstart', unlockAudio);


            document.addEventListener('orderCompleted', function() {
                //  new Audio("{{ asset('music/pristine-609.mp3') }}").play();
                var audio = new Audio("{{ asset('music/pristine-609.mp3') }}");
                audio.play();
                // ting.muted = false;
                // ting.play();
                // soundEffect.src = "{{ asset('music/pristine-609.mp3') }}";
                // soundEffect.play();

                // alert("Test");
            });
        });
    </script>
</div>
