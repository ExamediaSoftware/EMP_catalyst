<div>
    {{-- The Master doesn't talk, he acts. --}}

    <div class="container mt-1">
        <div class="row mt-1 justify-content-center">
            <div class="mt-1 col-md-12">
                <div class="card">
                    <div class=" font-extrabold text-black p-5">NOTIFICATION</div>
                    <div class="p-4 h-full overflow-auto">
                        <!-- START Documents ROW -->
                        
                        <div class=" p-2 bg-gray-100">
                            {{ $allnotification->links('partials.pagination-links') }}
                            @foreach ($allnotification as $item)
                                <div class="mt-4 px-4 py-3 w-full rounded-2xl shadow-md grid grid-cols-3 bg-white">
                                    <div class=" col-span-2 ">
                                        {{-- <div class=" font-bold text-black">Application Status: REVIEW</div> --}}
                                        <div class=" text-black">{{ $item->message }}
                                        </div>
                                    </div>
                                    <div class="self-center text-center ">
                                        <button
                                            class="p-2 rounded-lg border border-blue-700 bg-blue-500 px-4 font-bold text-white text-sm hover:bg-blue-800 ">VIEW
                                            DETAIL</button>
                                    </div>
                                </div>
                            @endforeach
                            {{ $allnotification->links('partials.pagination-links') }}
                        </div>
                        <!-- END of Documents ROW -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
