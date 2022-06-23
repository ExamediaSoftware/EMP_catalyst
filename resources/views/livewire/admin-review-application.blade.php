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
                            <div class="mx-3 mb-2 px-2 text-2xl font-bold text-black">{{ $application->company_name }}
                            </div>
                            <div class="mx-3 mb-3 px-2 text-sm text-black">
                                {{-- {{$output = str_replace(',', ', \n', $application->address) }} --}}
                                {!! preg_replace('/:/', ',<br/>', $application->address) !!}
                            </div>
                        </div>

                        <div>
                            <div class="mx-3 mb-2 px-2 text-2xl text-black">{{ $application->business_reg_no }}</div>
                            <div class="mx-3 mb-2 px-2 text-black">Type: {{ $application->company_type_name }}</div>
                            <div class="mx-3 mb-2 px-2 text-black">Sector: {{ $application->sector_type_name }}</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mx-3 mb-6 px-2 text-sm text-black">O: {{ $application->office_number }}</div>
                        <div class="mx-3 mb-6 ml-2 px-2 text-left text-sm text-black">F:
                            {{ $application->fax_number }}
                        </div>
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
                            <div class="mx-3 mb-2 px-2 text-center font-bold text-black underline">Representative 1
                            </div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">
                                {{ $application->representative[0]->rep_name }}</div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">
                                {{ $application->representative[0]->rep_email }}</div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">
                                {{ $application->representative[0]->rep_phone }}</div>
                        </div>

                        <div class="border-gray-400 lg:border-x-4">
                            <div class="mx-3 mb-2 px-2 text-center font-bold text-black underline">Representative 2
                            </div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">
                                {{ $application->representative[1]->rep_name }}</div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">
                                {{ $application->representative[1]->rep_email }}</div>
                            <div class="mx-3 mb-2 px-2 text-center text-black">
                                {{ $application->representative[1]->rep_phone }}</div>
                        </div>

                        <div>
                            <div>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($application->employee as $emp)
                                    @php
                                        $n = $emp->emp_total_no;
                                        $total = $total + $n;
                                    @endphp


                                    <div class="grid grid-cols-2 divide-x">
                                        <div class="mx-2 mb-2 px-1 font-bold text-black">{{ $emp->emp_type }}</div>
                                        <div class="ml-2 mr-8 mb-2 px-3 text-right font-bold text-black">
                                            {{ $n }}</div>
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
                                    <div class="ml-2 mr-8 mb-2 px-3 text-right font-bold text-black">
                                        {{ $total }}</div>
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
                                <div class="">{{ $bus_issue[0]->business_issue_name }}</div>
                            </div>
                        </div>

                        <div>
                            <div class="grid grid-flow-col grid-rows-2">
                                <div class="row-span-2 mr-2 text-right text-6xl font-extrabold">2</div>
                                <div class="col-span-2 font-bold">Secondary</div>
                                <div class="col-span-2 row-span-1">{{ $bus_issue[1]->business_issue_name }}</div>
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-flow-col grid-rows-2">
                                <div class="row-span-2 mr-2 text-right text-6xl font-extrabold">3</div>
                                <div class="col-span-2 font-bold">Tertiary</div>
                                <div class="col-span-2 row-span-1">{{ $bus_issue[2]->business_issue_name }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="mx-3 mb-4 px-2 font-bold text-black">Problem Description</div>
                        <div class="mx-3 mb-6 px-2 font-semibold text-black">Lorem ipsum dolor hatta dolmat</div>
                    </div>
                </div>
                <!-- END of Assistance ROW -->

                <!-- START Assistance ROW -->
                <div class="rounded shadow-lg border-2 border-gray-200 mx-2 my-4 p-2">
                    <div class="mx-3 flex flex-row px-2 py-3">
                        <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                            <div class="mx-3 px-2 font-semibold text-gray-600">Assistance</div>
                        </div>
                    </div>

                    <div class="">
                        <!-- problem 1 -->
                        <div class="p-2">
                            <div class="grid grid-flow-col grid-rows-3">
                                <div class="row-span-1 m-2 self-center">
                                    <div
                                        class="float-left grid grid-flow-col grid-rows-2 rounded-full border-8 border-blue-500 pr-4">
                                        <div
                                            class="text-center row-span-2 m-2 h-10 w-10 self-center rounded-full bg-blue-500 text-3xl font-extrabold text-white">
                                            1</div>
                                        <div class="col-span-2 font-bold">Area of Asisstance Needed (Primary)</div>
                                        <div class="col-span-2">{{ $bus_issue[0]->business_issue_name }}</div>
                                    </div>
                                </div>

                                <div class="row-span-2 m-2">
                                    <div class="">
                                        <p class="m-2 font-bold text-black">Description</p>
                                    </div>
                                    <div class="m-2 text-black">
                                        <p>{{ $bus_issue[0]->issue_desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- problem 1 -->
                        <div class="p-2">
                            <div class="grid grid-flow-col grid-rows-3">
                                <div class="row-span-1 m-2 self-center">
                                    <div
                                        class="float-left grid grid-flow-col grid-rows-2 rounded-full border-8 border-red-800 pr-4">
                                        <div
                                            class="text-center row-span-2 m-2 h-10 w-10 self-center rounded-full bg-red-800 text-3xl font-extrabold text-white">
                                            2</div>
                                        <div class="col-span-2 font-bold">Area of Asisstance Needed (Secondary)</div>
                                        <div class="col-span-2">{{ $bus_issue[1]->business_issue_name }}</div>
                                    </div>
                                </div>

                                <div class="row-span-2 m-2">
                                    <div class="">
                                        <p class="m-2 font-bold text-black">Description</p>
                                    </div>
                                    <div class="m-2 text-black">
                                        <p>{{ $bus_issue[1]->issue_desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- problem 1 -->
                        <div class="p-2">
                            <div class="grid grid-flow-col grid-rows-3">
                                <div class="row-span-1 m-2 self-center">
                                    <div
                                        class="float-left grid grid-flow-col grid-rows-2 rounded-full border-8 border-green-700 pr-4">
                                        <div
                                            class="text-center row-span-2 m-2 h-10 w-10 self-center rounded-full bg-green-700 text-3xl font-extrabold text-white">
                                            3</div>
                                        <div class="col-span-2 font-bold">Area of Asisstance Needed (Tertiary)</div>
                                        <div class="col-span-2">{{ $bus_issue[2]->business_issue_name }}</div>
                                    </div>
                                </div>

                                <div class="row-span-2 m-2">
                                    <div class="">
                                        <p class="m-2 font-bold text-black">Description</p>
                                    </div>
                                    <div class="m-2 text-black">
                                        <p>{{ $bus_issue[2]->issue_desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="p-2">
                        <h2 class="font-bold text-black">Leadership Issues</h2>

                        <div class="grid gap-2 p-2 sm:grid-cols-2">
                            @foreach ($leadership_issue as $item)
                                <div class="float-left flex w-full gap-2 rounded-full border-8 border-sky-700  p-2">
                                    <div
                                        class="text-center h-10 w-10 rounded-full bg-sky-700 text-3xl font-extrabold text-white">
                                        1</div>
                                    <div class="text-md self-center  font-bold sm:text-lg md:row-start-2">
                                        {{ $item->issue_name }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <!-- START Documents ROW -->
                <div class="rounded shadow-lg border-2 border-gray-200 mx-2 my-4 p-2">
                    <div class="mx-3 flex flex-row px-2 py-3">
                        <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                            <div class="mx-3 px-2 font-semibold text-gray-600">Documents</div>
                        </div>
                    </div>

                    <div>
                        <div>
                            @foreach ($string_document as $key => $item)
                                <div class="mb-2 grid grid-cols-2 divide-x">
                                    <div class="mx-3 mb-2 px-2 font-bold text-black">{{ $item }}</div>
                                    <button onclick="openPreview('{{ asset($string_path[$key]) }}')"
                                        class="w-24 rounded-md border border-blue-700 bg-blue-500 px-4 text-sm font-bold text-white hover:bg-blue-700">
                                        VIEW</button>
                                </div>
                            @endforeach

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
                        <div class="m-4 p-4 flex flex-col justify-center">
                            <div class="relative mt-2">
                                <video id="videoInterview" width="600" controls>
                                    <source id="videoDiv" src="{{ asset($video_path) }}" type="video/mp4">

                                    Your browser does not support HTML video.
                                </video>

                            </div>
                            {{-- <div>
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
                            </div> --}}
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
            <div class="h-80 gap-3 scrollbar-hide rounded-md sm:p-2">

                {{ $no }}
                {{ $statusComponent }}
                {{-- @livewire($statusComponent, key($key)) --}}
                @livewire($statusComponent, ['application' => $application], key($key))


            </div>

            <div
                class="mt-8 flex overflow-y-auto flex-1 flex-col rounded shadow-lg py-1 border-2 border-gray-200 sm:p-2">
                <div class="mx-2 my-2 font-bold text-black">Evaluation</div>
                <div class="flex flex-1 flex-col gap-4 pb-8">
                    <!-- START Score Summary -->
                    <div class="rounded shadow-lg border-2 border-gray-200 m-1 p-2">
                        <div class="mx-3 flex flex-row px-2 py-3">
                            <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                                <div class="mx-3 px-2 font-semibold text-gray-600">Score Summary</div>
                            </div>
                        </div>

                        <div class="my-2 grid grid-cols-3 gap-2">
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Automatic Score</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Video Score</div>
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
                                <div class="mx-3 mb-6 px-2 font-bold text-black">{{ $automaticTotalScore }}</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">{{ $videoTotalScore }}</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">{{ $interviewScore }}</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">
                                    {{ $automaticTotalScore + $videoTotalScore + $interviewScore }}</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Score Summary -->

                    <!--START Automatic Score -->
                    <div class="rounded shadow-lg border-2 border-gray-200 m-1 p-2">
                        <div class="mx-3 flex flex-row px-2 py-3">
                            <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                                <div class="mx-3 px-2 font-semibold text-gray-600">Automatic Score Summary</div>
                            </div>
                        </div>

                        <div class="my-2 grid grid-cols-3 gap-2">
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-6 px-2 text-black">Bumiputera Score</div>
                                <div class="mx-3 mb-6 px-2 text-black">Revenue Score</div>
                                <div class="mx-3 mb-6 px-2 text-black">Staf Score</div>
                                <div class="mx-3 mb-6 px-2 text-black">Document Score</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Total Score</div>
                            </div>
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-6 px-2 text-black">:</div>
                                <div class="mx-3 mb-6 px-2 text-black">:</div>
                                <div class="mx-3 mb-6 px-2 text-black">:</div>
                                <div class="mx-3 mb-6 px-2 text-black">:</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                            </div>
                            <div class="col-span-1 -ml-8 grid">
                                <div class="mx-3 mb-6 px-2 text-black">{{ $automaticScore['bumi'] }}</div>
                                <div class="mx-3 mb-6 px-2 text-black">{{ $automaticScore['revenue'] }}</div>
                                <div class="mx-3 mb-6 px-2 text-black">{{ $automaticScore['staf'] }}</div>
                                <div class="mx-3 mb-6 px-2 text-black">{{ $automaticScore['document'] }}</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">{{ $automaticTotalScore }} / 5
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Automatic Score -->

                    <!-- START Interview Score -->
                    <div class="rounded shadow-lg border-2 border-gray-200 m-1 p-2">
                        <div class="mx-3 flex flex-row px-2 py-3">
                            <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                                <div class="mx-3 px-2 font-semibold text-gray-600">Video Score</div>
                            </div>
                        </div>

                        <div class="my-2 grid grid-cols-3 gap-2">
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-6 px-2 text-black">Score 1</div>
                                <div class="mx-3 mb-6 px-2 text-black">Score 2</div>
                                <div class="mx-3 mb-6 px-2 text-black">Score 3</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">Total Score</div>
                            </div>
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-6 px-2 text-black">:</div>
                                <div class="mx-3 mb-6 px-2 text-black">:</div>
                                <div class="mx-3 mb-6 px-2 text-black">:</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">:</div>
                            </div>
                            <div class="col-span-1 -ml-8 grid">
                                <div class="mx-3 mb-6 px-2 text-black">{{ $videoScore[0]->video_score }}</div>
                                <div class="mx-3 mb-6 px-2 text-black">{{ $videoScore[1]->video_score }}</div>
                                <div class="mx-3 mb-6 px-2 text-black">{{ $videoScore[2]->video_score }}</div>
                                <div class="mx-3 mb-6 px-2 font-bold text-black">{{ $videoTotalScore }}</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Interview Score -->

                    <!-- START Video Score -->
                    <div class="rounded shadow-lg border-2 border-gray-200 m-1 p-2">
                        <div class="mx-3 flex flex-row px-2 py-3">
                            <div class="h-auto w-auto rounded-lg border-2 border-gray-600">
                                <div class="mx-3 px-2 font-semibold text-gray-600">Interview Score</div>
                            </div>
                        </div>

                        <div class="my-2 grid grid-cols-3 gap-2">
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-2 px-2 font-bold text-black">Total Score</div>

                            </div>
                            <div class="col-span-1 grid">
                                <div class="mx-3 mb-2 px-2 font-bold text-black">:</div>

                            </div>
                            <div class="col-span-1 -ml-8 grid">
                                <div class="mx-3 mb-2 px-2 font-bold text-black">{{ $interviewScore }}</div>
                            </div>
                        </div>
                    </div>
                    <!-- END Video Score -->
                </div>
            </div>
        </div>
        <!-- EVALUATION DIV -->
    </div>

    <div id="previewFile"
        class="fixed hidden z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full px-4">
        <div class="mt-4 relative top-40 mx-auto shadow-lg rounded-md bg-white bg-opacity-10 max-w-xl">

            <!-- Modal header -->
            <div class="flex justify-between items-center bg-green-500 text-white text-xl rounded-t-md px-4 py-2">
                <p class="text-white">Photo Preview:</p>

                {{-- <img id="imgDiv" width="700" height="700" src=""> --}}

                <button onclick="closeModal2('previewFile')">x</button>
            </div>

            <!-- Modal body -->
            <div class="max-h-48 overflow-y-scroll p-4">
                <p class="text-sm text-gray-800" id="message"></p>
                <img id="imgDiv" width="700" height="700" src="">
            </div>

            <!-- Modal footer -->
            <div class="px-4 py-2 border-t border-t-gray-500 flex justify-end items-center space-x-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition"
                    onclick="closeModal2('previewFile')">Close</button>
            </div>
        </div>
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

        function openModal(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModal2(modalId) {
            modal = document.getElementById(modalId);
            modal.classList.add('hidden');
        }

        function openPreview(src) {
            $('#imgDiv').attr("src", src);
            openModal('previewFile');
        }

        Livewire.on('openPreview2', event => {
            // alert('hai');

            // alert(event);
            // document.getElementById("imgDiv").src="newSource.png";
            $('#imgDiv').attr("src", event);
            // alert($('#imgDiv'));
            openModal('previewFile');
        })
    </script>
</div>
