<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <!-- plugins: [
    require('tailwind-scrollbar-hide')
    //..
      ], -->
    <!-- component -->
    <div class="grid grid-cols-9 select-none gap-4 rounded-2xl bg-sky-200 sm:h-auto sm:flex-row sm:p-4">
        <!-- APPLICATION DIV bg-green-500-->
        <div class="col-span-6 gap-5 sm:p-2">

            <div class="mx-2 font-bold text-black ">Application Details</div>

            <div class="max-h-screen scrollbar-hide gap-6 overflow-y-auto pb-14 mt-4">
                <!-- START Genreal ROW -->
                <div class="rounded shadow-lg bg-white border-2 border-gray-200 mx-2 my-4 p-2">
                    <div class="flex flex-row px-2 py-6">
                        <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                            <div class="mx-3 px-2 font-semibold text-gray-600">General</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <div class="mx-3 mb-2 px-2 text-2xl font-bold text-black">{{$application->company_name}}</div>
                            <div class="mx-3 mb-3 px-2 text-sm text-black">
                                {{-- {{$output = str_replace(',', ', \n', $application->address) }} --}}
                                {!! preg_replace("/:/", ",<br/>", ($application->address)) !!}
                            </div>
                        </div>
                        
                        <div>
                            <div class="mx-3 mb-2 px-2 text-2xl text-black">{{$application->business_reg_no}}</div>
                            <div class="mx-3 mb-2 px-2 text-black">Type: {{$application->company_type_name}}</div>
                            <div class="mx-3 mb-2 px-2 text-black">Sector: {{$application->sector_type_name}}</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mx-3 mb-6 px-2 text-sm text-black">O: {{$application->office_number}}</div>
                        <div class="mx-3 mb-6 ml-2 px-2 text-left text-sm text-black">F: {{$application->fax_number}}</div>
                    </div>
                </div>
                <!-- END of Genreal ROW -->

                <!-- START Ownership ROW -->
                <div class="rounded shadow-lg border-2 border-gray-200 mx-2 my-4 p-2">
                    <div class="mx-3 flex flex-row px-2 py-3">
                        <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                            <div class="mx-3 px-2 font-semibold text-gray-600">Ownership</div>
                        </div>
                    </div>
                    <div class="h-32">
                        <div class="mx-3 mb-2 px-2 text-black">Line graph</div>
                    </div>

                    <div class="mb-2 grid grid-cols-1 md:grid-cols-2">
                        <div class="text-center">
                            <div class="mx-3 mb-2 px-2 text-black">Owner 1: 34.00 %</div>
                            <div class="mx-3 mb-2 px-2 text-black">Owner 2: 33.00 %</div>
                            <div class="mx-3 mb-2 px-2 text-black">Owner 3: 33.00 %</div>
                        </div>

                        <div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">Bumiputera Owenership</div>
                            <div class="row-span-2 mx-3 mb-2 px-2 text-center text-4xl text-black">100 %</div>
                        </div>
                    </div>
                </div>
                <!-- END of Ownership ROW -->

                <!-- START Financials ROW -->
                <div class="rounded shadow-lg border-2 border-gray-200 mx-2 my-4 p-2">
                    <div class="mx-3 flex flex-row px-2 py-3">
                        <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                            <div class="mx-3 px-2 font-semibold text-gray-600">Financials</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="h-96">
                            <div class="mx-3 mb-2 px-2 text-black">Bar graph</div>
                        </div>

                        <div>
                            <header class="my-2 text-center font-bold">Annual Revenue</header>
                            <div class="my-4">
                                <div class="mx-3 mb-2 px-2 text-center font-bold text-black underline">2020</div>
                                <div class="row-span-2 mx-3 mb-2 px-2 text-center text-black">Revenue: RM 300,00.00
                                </div>
                                <div class="row-span-2 mx-3 mb-2 px-2 text-center text-black">Expenses: RM 300,00.00
                                </div>
                            </div>
                            <div class="my-4">
                                <div class="mx-3 mb-2 px-2 text-center font-bold text-black underline">2021</div>
                                <div class="row-span-2 mx-3 mb-2 px-2 text-center text-black">Revenue: RM 300,00.00
                                </div>
                                <div class="row-span-2 mx-3 mb-2 px-2 text-center text-black">Expenses: RM 300,00.00
                                </div>
                            </div>
                            <div class="my-4">
                                <div class="mx-3 mb-2 px-2 text-center font-bold text-black underline">2021</div>
                                <div class="row-span-2 mx-3 mb-2 px-2 text-center text-black">Revenue: RM 300,00.00
                                </div>
                                <div class="row-span-2 mx-3 mb-2 px-2 text-center text-black">Expenses: RM 300,00.00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END of Financials ROW -->

                <!-- START Employees ROW -->
                <div class="rounded shadow-lg border-2 border-gray-200 mx-2 my-4 p-2">
                    <div class="mx-3 flex flex-row px-2 py-3">
                        <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                            <div class="mx-3 px-2 font-semibold text-gray-600">Employees</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 md:grid-cols-3">
                        <div>
                            <div class="mx-3 mb-2 px-2 text-center font-bold text-black underline">Representative 1</div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">{{$application->representative[0]->rep_name}}</div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">{{$application->representative[0]->rep_email}}</div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">{{$application->representative[0]->rep_phone}}</div>
                        </div>

                        <div class="border-gray-400 lg:border-x-4">
                            <div class="mx-3 mb-2 px-2 text-center font-bold text-black underline">Representative 2</div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">{{$application->representative[1]->rep_name}}</div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">{{$application->representative[1]->rep_email}}</div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">{{$application->representative[1]->rep_phone}}</div>
                        </div>

                        <div>
                            <div>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($application->employee as $emp)
                                    @php $n = $emp->emp_total_no; $total = $total+$n; @endphp
                                    
                                    
                                    <div class="grid grid-cols-2 divide-x">
                                        <div class="mx-2 mb-2 px-1 font-bold text-black">{{$emp->emp_type}}</div>
                                        <div class="ml-2 mr-8 mb-2 px-3 text-right font-bold text-black">{{$n}}</div>
                                    </div>
                                    
                                    {{-- @if ($emp->emp_type == 'Part-time')
                                    <div class="grid grid-cols-2 divide-x">
                                        <div class="mx-3 mb-2 px-2 font-bold text-black">Part-time</div>
                                        <div class="mx-3 mb-2 px-2 font-bold text-black">{{$n}}</div>
                                    </div>
                                    @endif --}}
                                @endforeach
                                {{-- <div class="grid grid-cols-2 divide-x">
                                    <div class="mx-3 mb-2 px-2 font-bold text-black">Full-time</div>
                                    <div class="mx-3 mb-2 px-2 font-bold text-black">{{$application->employee->}}</div>
                                </div> --}}
                                {{-- <div class="grid grid-cols-2 divide-x">
                                    <div class="mx-3 mb-2 px-2 font-bold text-black">Contract</div>
                                    <div class="mx-3 mb-2 px-2 font-bold text-black"></div>
                                </div> --}}
                                {{-- <div class="grid grid-cols-2 divide-x">
                                    <div class="mx-3 mb-2 px-2 font-bold text-black">Part-time</div>
                                    <div class="mx-3 mb-2 px-2 font-bold text-black"></div>
                                </div> --}}
                                <div class="border-center mx-8 border-b-2 border-gray-400"></div>
                                <div class="grid grid-cols-2 divide-x">
                                    <div class="mx-2 mb-2 px-1 font-bold text-black">TOTAL</div>
                                    <div class="ml-2 mr-8 mb-2 px-3 text-right font-bold text-black">{{$total}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END of Employees ROW -->

                <!-- START Assistance ROW -->
                <div class="rounded shadow-lg border-2 border-gray-200 mx-2 my-4 p-2">
                    <div class="mx-3 flex flex-row px-2 py-3">
                        <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                            <div class="mx-3 px-2 font-semibold text-gray-600">Assistance</div>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-1 grid-cols-1">
                        <div>
                            <div class="grid grid-flow-col grid-rows-2">
                                <div class="row-span-2 mr-2 text-right text-6xl font-extrabold">1</div>
                                <div class="font-bold">Primary</div>
                                <div class="">{{$bus_issue[0]->business_issue_name}}</div>
                            </div>
                        </div>

                        <div>
                            <div class="grid grid-flow-col grid-rows-2">
                                <div class="row-span-2 mr-2 text-right text-6xl font-extrabold">2</div>
                                <div class="col-span-2 font-bold">Secondary</div>
                                <div class="col-span-2 row-span-1">{{$bus_issue[1]->business_issue_name}}</div>
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-flow-col grid-rows-2">
                                <div class="row-span-2 mr-2 text-right text-6xl font-extrabold">2</div>
                                <div class="col-span-2 font-bold">Tertiary</div>
                                <div class="col-span-2 row-span-1">{{$bus_issue[2]->business_issue_name}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="mx-3 mb-4 px-2 font-bold text-black">Problem Description</div>
                        <div class="mx-3 mb-6 px-2 font-semibold text-black">Lorem ipsum dolor hatta dolmat</div>
                    </div>
                </div>
                <!-- END of Assistance ROW -->

                <!-- START Documents ROW -->
                <div class="rounded shadow-lg border-2 border-gray-200 mx-2 my-4 p-2">
                    <div class="mx-3 flex flex-row px-2 py-3">
                        <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                            <div class="mx-3 px-2 font-semibold text-gray-600">Documents</div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <div class="mb-2 grid grid-cols-2 divide-x">
                                <div class="mx-3 mb-2 px-2 font-bold text-black">Registration Certificate</div>
                                <button
                                    class="w-32 rounded-xl border border-blue-700 bg-blue-500 px-4 font-bold text-white hover:bg-blue-700">VIEW</button>
                            </div>
                            <div class="mb-2 grid grid-cols-2 divide-x">
                                <div class="mx-3 mb-2 px-2 font-bold text-black">Owner's IC</div>
                                <button
                                    class="w-32 rounded-xl border border-blue-700 bg-blue-500 px-4 font-bold text-white hover:bg-blue-700">VIEW</button>
                            </div>
                            <div class="mb-2 grid grid-cols-2 divide-x">
                                <div class="mx-3 mb-2 px-2 font-bold text-black">Financials Statement</div>
                                <button
                                    class="w-32 rounded-xl border border-blue-700 bg-blue-500 px-4 font-bold text-white hover:bg-blue-700">VIEW</button>
                            </div>
                            <div class="mb-2 grid grid-cols-2 divide-x">
                                <div class="mx-3 mb-2 px-2 font-bold text-black">EPF Contribution Statement</div>
                                <button
                                    class="w-32 rounded-xl border border-blue-700 bg-blue-500 px-4 font-bold text-white hover:bg-blue-700">VIEW</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END of Documents ROW -->

                <!-- START Video ROW -->
                <div class="rounded shadow-lg border-2 border-gray-200 mx-2 my-4 p-2">
                    <div class="mx-3 flex flex-row px-2 py-3">
                        <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                            <div class="mx-3 px-2 font-semibold text-gray-600">Video</div>
                        </div>
                    </div>

                    <div class="mx-auto flex h-72 w-full max-w-lg overflow-hidden rounded-lg bg-gray-500 shadow-md">
                        <div class="mx-24 flex flex-col justify-end">
                            <div class="relative">
                                <video class=" ">
                                    <source class="h-72 w-72 bg-black" src="" type="video/mp4" />
                                </video>
                                <div class="absolute bottom-0 w-full bg-gradient-to-r from-black">
                                    <span class="px-2 text-xs uppercase text-white"> Ekuinas </span>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div class="relative h-1 bg-gray-200">
                                        <div class="absolute flex h-full w-1/2 items-center justify-end bg-blue-500">
                                            <div class="h-3 w-3 rounded-full bg-white shadow"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between py-1 text-xs font-medium text-blue-500">
                                    <div>1:50</div>
                                    <div class="flex space-x-3 pt-5">
                                        <button class="focus:outline-none">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="blue"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polygon points="19 20 9 12 19 4 19 20"></polygon>
                                                <line x1="5" y1="19" x2="5" y2="5"></line>
                                            </svg>
                                        </button>
                                        <button
                                            class="flex h-8 w-8 items-center justify-center rounded-full pl-0.5 ring-2 ring-blue-500 focus:outline-none">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="blue"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                            </svg>
                                        </button>
                                        <button class="focus:outline-none">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="blue"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polygon points="5 4 15 12 5 20 5 4"></polygon>
                                                <line x1="19" y1="5" x2="19" y2="19"></line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div>3:00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END of Video ROW -->
            </div>
        </div>
        <!-- APPLICATION DIV -->

        <!-- EVALUATION DIV bg-yellow-200-->
        <div class="max-h-screen overflow-y-auto rounded-xl col-span-3">
            <!-- START Status ROW -->
            <div class="h-80 gap-3 overflow-y-auto scrollbar-hide rounded-md sm:p-2">

                {{ $no }}
                {{ $statusComponent }}
                {{-- @livewire($statusComponent, key($key)) --}}
                @livewire($statusComponent, ['application' => $application], key($key))


            </div>

            <div
                class="scrollbar-hide mt-8 flex max-h-96 flex-1 flex-col overflow-y-auto rounded-md py-1 shadow-2xl sm:p-2">
                <div class="mx-2 my-2 font-bold text-black">Evaluation</div>
                <div class="flex flex-1 flex-col gap-8 pb-8">
                    <!-- START Score Summary -->
                    <div class="w-full rounded-2xl shadow-xl">
                        <div class="mx-3 flex flex-row px-2 py-3">
                            <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                                <div class="mx-3 px-2 font-semibold text-gray-600">Score Summary</div>
                            </div>
                        </div>

                        <div class="my-2 grid grid-cols-3 gap-2">
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Automatic Score</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Manual Score</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Interview Score</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Total Score</div>
                            </div>
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                            </div>
                            <div class="col-span-1 -ml-8 grid">
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Score Summary -->

                    <!--START Automatic Score -->
                    <div class="w-full rounded-2xl shadow-xl">
                        <div class="mx-3 flex flex-row px-2 py-3">
                            <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                                <div class="mx-3 px-2 font-semibold text-gray-600">Score Summary</div>
                            </div>
                        </div>

                        <div class="my-2 grid grid-cols-3 gap-2">
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Automatic Score</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Manual Score</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Interview Score</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Total Score</div>
                            </div>
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                            </div>
                            <div class="col-span-1 -ml-8 grid">
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Automatic Score -->

                    <!-- START Interview Score -->
                    <div class="w-full rounded-2xl shadow-xl">
                        <div class="mx-3 flex flex-row px-2 py-3">
                            <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                                <div class="mx-3 px-2 font-semibold text-gray-600">Interview Score</div>
                            </div>
                        </div>

                        <div class="my-2 grid grid-cols-3 gap-2">
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Automatic Score</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Manual Score</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Interview Score</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Total Score</div>
                            </div>
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                            </div>
                            <div class="col-span-1 -ml-8 grid">
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">00</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Interview Score -->

                    <!-- START Video Score -->
                    <div class="w-full rounded-2xl shadow-xl">
                        <div class="mx-3 flex flex-row px-2 py-3">
                            <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                                <div class="mx-3 px-2 font-semibold text-gray-600">Video Score</div>
                            </div>
                        </div>

                        <div class="my-2 grid grid-cols-3 gap-2">
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-2 px-2 font-bold text-black">Automatic Score</div>
                                <div class="mx-3 mb-2 px-2 font-bold text-black">Manual Score</div>
                                <div class="mx-3 mb-2 px-2 font-bold text-black">Interview Score</div>
                                <div class="mx-3 mb-2 px-2 font-bold text-black">Total Score</div>
                            </div>
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-2 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-2 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-2 px-2 font-bold text-black">:</div>
                                <div class="mx-3 mb-2 px-2 font-bold text-black">:</div>
                            </div>
                            <div class="col-span-1 -ml-8 grid">
                                <div class="mx-3 mb-2 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-2 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-2 px-2 font-bold text-black">00</div>
                                <div class="mx-3 mb-2 px-2 font-bold text-black">00</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Video Score -->
                </div>
            </div>
        </div>
        <!-- EVALUATION DIV -->
    </div>

    <script type="text/javascript">
        function openModalReview(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModalReview() {
            modal = document.getElementById('modal_reviewed_review')
            modal.classList.add('hidden')
        }

        function openModalQuery(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModalQuery() {
            modal = document.getElementById('modal_reviewed_query')
            modal.classList.add('hidden')
        }

        function openModalIV(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModalIV() {
            modal = document.getElementById('modal_selected_iv')
            modal.classList.add('hidden')
        }

        function openModalVideoSelect(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModalVideoSelect() {
            modal = document.getElementById('modal_scored_video_select')
            modal.classList.add('hidden')
        }

        function openModalVideoReject(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModalVideoReject() {
            modal = document.getElementById('modal_scored_video_reject')
            modal.classList.add('hidden')
        }

        function openModalIVii(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModalIVii() {
            modal = document.getElementById('modal_selected_iv_ii')
            modal.classList.add('hidden')
        }

        function openModalIVSelect(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModalIVSelect() {
            modal = document.getElementById('modal_scored_IV_select')
            modal.classList.add('hidden')
        }

        function openModalIVReject(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModalIVReject() {
            modal = document.getElementById('modal_scored_IV_reject')
            modal.classList.add('hidden')
        }

        function openModalVerify(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModalVerify() {
            modal = document.getElementById('modal_verify')
            modal.classList.add('hidden')
        }

        function test() {
            Livewire.emit('submitreview');
        }
    </script>
</div>
