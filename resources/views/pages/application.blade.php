{{-- <x-app-layout> --}}
@extends('layouts.app')

@section('css')
    <style>
        .b-tab {
            padding: 20px;
            display: none;
        }

        .b-tab.active {
            display: block;
        }

        .b-nav-tab {
            display: inline-block;
            /* padding: 16px; */
        }

        .b-nav-tab.active {
            color: #ebebeb;
            background-color: #2340a1;
        }

        .redSection{
            color: rgb(224, 88, 88);
            
        }
        .redSection.active{
            background-color: #e75b5b
            
        }
        :hover.redSection{
            color: rgb(16, 16, 16);
            background-color: #e75b5b
            
        }

    </style>
@endsection
@section('content')
    <div class="container mt-1">
        <div class="row mt-1 justify-content-center">
            <div class="mt-1 col-md-12">
                <div class="card">
                    {{-- {{$application->currentStatus->status_id}}
                    {{$application->sectionComment}} --}}

                    @php
                        // $array_section = $application->sectionComment->section->toArray();
                        // print_r($array_section);
                        $array_section =[];
                        if($application->currentStatus->status_id == 'Queried'){
                            foreach ($application->sectionComment as $key => $value) {
                                $array_section [] = $value['section'];
                            }
                        }
                        // print_r($array_section);
                    @endphp
                    <div class="card-body">
                        <button data-tab="orange"
                            class="text-xs @if(in_array('General',$array_section))redSection @endif b-nav-tab inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                            General
                        </button>
                        <button data-tab="green"
                            class="text-xs @if(in_array('Ownership',$array_section))redSection @endif b-nav-tab inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                            Ownership
                        </button>
                        <button data-tab="blue"
                            class="text-xs @if(in_array('Financial',$array_section))redSection @endif b-nav-tab inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                            Financials
                        </button>
                        <button data-tab="red"
                            class="text-xs @if(in_array('Employees',$array_section))redSection @endif b-nav-tab inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                            Employees
                        </button>
                        <button data-tab="violet"
                            class="text-xs @if(in_array('Assistance',$array_section))redSection @endif  b-nav-tab inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                            Assistance
                        </button>
                        <button data-tab="velvet"
                            class="text-xs @if(in_array('Document',$array_section))redSection @endif  b-nav-tab inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                            Document
                        </button>
                        <button data-tab="black"
                        class="text-xs @if(in_array('Video',$array_section))redSection @endif  b-nav-tab inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                        Video
                    </button>
                    <button data-tab="white"
                        class="text-xs @if(in_array('Acknowledgement',$array_section))redSection @endif  b-nav-tab active inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                        Acknowledgement
                    </button>
                        <div id="orange" class="b-tab">
                            <div class="block p-2 rounded-lg shadow-lg bg-white max-w-5xl">
                                @livewire('application-form-general', ['application' => $application])
                            </div>
                        </div>
                        <div id="green" class="b-tab">
                            <div class="block pt-2 px-6 rounded-lg shadow-lg bg-white max-w-5xl">
                                @livewire('application-form-ownership', ['application' => $application])
                            </div>
                        </div>
                        <div id="blue" class="b-tab">
                            @livewire('application-form-financial', ['application' => $application])
                        </div>
                        <div id="red" class="b-tab">
                            @livewire('application-form-employee', ['application' => $application])
                        </div>
                        <div id="violet" class="b-tab">
                            @livewire('application-form-assistance', ['application' => $application])
                        </div>
                        <div id="velvet" class="b-tab">
                            @livewire('application-form-document', ['application' => $application])
                        </div>
                        <div id="black" class="b-tab">
                            @livewire('application-form-video', ['application' => $application])
                        </div>
                        <div id="white" class="b-tab active">
                            @livewire('application-form-acknowledgement', ['application' => $application])
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- component -->

    <div id="modal" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
        <div class="relative top-40 mx-auto shadow-lg rounded-md bg-white max-w-md">

            <!-- Modal header -->
            <div class="flex justify-between items-center bg-green-500 text-white text-xl rounded-t-md px-4 py-2">
                <h3>Info</h3>
                <button onclick="closeModal()">x</button>
            </div>

            <!-- Modal body -->
            <div class="max-h-48 overflow-y-scroll p-4">
                <p class="text-sm text-gray-800" id="message"></p>

            </div>

            <!-- Modal footer -->
            <div class="px-4 py-2 border-t border-t-gray-500 flex justify-end items-center space-x-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition"
                    onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>

    <div id="previewFile" class="fixed hidden z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full px-4">
        <div class="mt-4 relative top-40 mx-auto shadow-lg rounded-md bg-white bg-opacity-10 max-w-md">

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

    <div id="previewFile1" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        
        <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Photo Preview
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeModal2()">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        </div>
        
        <div class="p-6 space-y-6 overflow-y-scroll">
            {{-- <img id="imgDiv" width="700" height="500" src=""> --}}
        </div>
        
        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
        <button onclick="closeModal2()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
        
        </div>
        </div>
        </div>
    </div>

    <div id="previewVideo" class="fixed hidden z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full px-4">
        <div class="mt-4 relative top-40 mx-auto shadow-lg rounded-md bg-white bg-opacity-10 max-w-md">

            <!-- Modal header -->
            <div class="flex justify-between items-center bg-green-500 text-white text-xl rounded-t-md px-4 py-2">
                <p class="text-white">Video Preview:</p>
                
                {{-- <img id="imgDiv" width="700" height="700" src=""> --}}
            
                <button onclick="closeModal2('previewVideo')">x</button>
            </div>

            <!-- Modal body -->
            <div class="max-h-48 overflow-y-scroll p-4">
                <p class="text-sm text-gray-800" id="message"></p>
                <video id="videoInterview" width="400" controls>
                    <source id="videoDiv" src="" type="video/mp4">
                    
                    Your browser does not support HTML video.
                  </video>
                  
            </div>

            <!-- Modal footer -->
            <div class="px-4 py-2 border-t border-t-gray-500 flex justify-end items-center space-x-4">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition"
                    onclick="closeModal2('previewVideo')">Close</button>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">

        'use strict';

        

        function Tabs() {
            var bindAll = function() {
                var menuElements = document.querySelectorAll('[data-tab]');
                for (var i = 0; i < menuElements.length; i++) {
                    menuElements[i].addEventListener('click', change, false);
                }
            }

            var clear = function() {
                var menuElements = document.querySelectorAll('[data-tab]');
                for (var i = 0; i < menuElements.length; i++) {
                    menuElements[i].classList.remove('active');
                    var id = menuElements[i].getAttribute('data-tab');
                    document.getElementById(id).classList.remove('active');
                }
            }

            var change = function(e) {
                event.preventDefault();
                clear();
                e.target.classList.add('active');
                var id = e.currentTarget.getAttribute('data-tab');
                document.getElementById(id).classList.add('active');
            }

            bindAll();
        }

        var connectTabs = new Tabs();

        function openModal(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModal() {
            modal = document.getElementById('modal');
            modal.classList.add('hidden');
        }
        var vid = document.getElementById("videoInterview");

        function closeModal2(modalId) {
            // alert('test');            
            vid.pause(); 
            
            modal = document.getElementById(modalId);
            modal.classList.add('hidden');

            
        }

        window.addEventListener('showModal', event => {
            var msg = event.detail.message;
            document.getElementById('message').innerHTML = msg;
            openModal('modal');
        })



        function addFields(ownership_counter) {

            // Get the element where the inputs will be added to
            var container = $('#list');
            var ownership_counter_less_by_1 = ownership_counter-1;
            var str_ownership_counter = ownership_counter.toString();
            var str_ownership_counter_less_by_1 = ownership_counter_less_by_1.toString();
            var snippet2 = '<div>Hai</div>';
            container.append(snippet2);
            var snippet = 
                '        <div class="col-span-12 mt-5">' +
                '            <span class="text-sm">Shareholder ' + str_ownership_counter + '</span>' +
                '        </div>' +

                '        <div class="grid grid-cols-12 gap-6">' +
                '            <div class="col-span-8 sm:col-span-4">' +
                '                <label for="shareholder_name" class="block text-sm font-medium text-gray-700">Name</label>' +
                '                <input wire:model="shareholder_name.'+ (str_ownership_counter_less_by_1) + '" type="text" name="shareholder_name[]" id="shareholder_name'+ (str_ownership_counter) + '"' +
                '                    autocomplete="given-name"' +
                '                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">' +
                '            </div>' +

                '            <div class="col-span-2 sm:col-span-2">' +
                '                <label for="shareholder_percentage" class="block text-sm font-medium text-gray-700">Percentage</label>' +
                '                <input wire:model="shareholder_percentage.'+ (str_ownership_counter_less_by_1) + '" type="text" name="shareholder_percentage[]"' +
                '                    id="shareholder_percentage'+ (str_ownership_counter) + '" autocomplete="family-name"' +
                '                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">' +
                '            </div>' +

                '            <div class="col-span-3 sm:col-span-2">' +
                '                <label for="shareholder_race" class="block text-sm font-medium text-gray-700">Race</label>' +
                '                <select wire:model="shareholder_race.'+ (str_ownership_counter_less_by_1) + '" id="shareholder_race.'+ (str_ownership_counter) + '" name="shareholder_race[]"' +
                '                    autocomplete="country"' +
                '                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">' +
                '                    <option>Please Choose</option>'+
                '                        @foreach ($global_race as $item)'+
                '                            @if (Request::old("shareholder_race.'+ (str_ownership_counter_less_by_1) + '") == $item->type_id)'+
                '                                <option value="{{ $item->type_id }}" selected>'+
                '                                    {{ $item->type_name }}</option>'+
                '                            @else'+
                '                                <option value="{{ $item->type_id }}">'+
                '                                    {{ $item->type_name }}</option>'+
                '                            @endif'+
                '                        @endforeach'+

                '                </select>' +
                '            </div>' +

                '            <div class="col-span-3 sm:col-span-2">' +
                '                <label for="shareholder_religion" class="block text-sm font-medium text-gray-700">Religion</label>' +
                '                <select wire:model="shareholder_religion.'+ (str_ownership_counter_less_by_1) + '" id="shareholder_religion'+ (str_ownership_counter) + '" name="shareholder_religion[]"' +
                '                    autocomplete="shareholder_religion"' +
                '                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">' +
                '                        <option>Please Choose</option>'+
                '                        @foreach ($global_religion_type as $item)'+
                '                            @if (Request::old("shareholder_religion.'+ (str_ownership_counter_less_by_1) + '") == $item->type_id)'+
                '                                <option value="{{ $item->type_id }}" selected>'+
                '                                    {{ $item->type_name }}</option>'+
                '                            @else'+
                '                                <option value="{{ $item->type_id }}">'+
                '                                    {{ $item->type_name }}</option>'+
                '                            @endif'+
                '                        @endforeach'+

                '                </select>' +
                '            </div>' +

                '            <div class="col-span-3 sm:col-span-1">' +
                '                <label for="shareholder_gender" class="block text-sm font-medium text-gray-700">Gender</label>' +
                '                <select wire:model="shareholder_gender.'+ (str_ownership_counter_less_by_1) + '" id="shareholder_gender'+ (str_ownership_counter) + '" name="shareholder_gender[]"' +
                '                    autocomplete="shareholder_gender"' +
                '                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">' +
                '                        <option>Please Choose</option>'+
                '                        @foreach ($global_gender_type as $item)'+
                '                            @if (Request::old("shareholder_gender.'+ (str_ownership_counter_less_by_1) + '") == $item->type_id)'+
                '                                <option value="{{ $item->type_id }}" selected>'+
                '                                    {{ $item->type_name }}</option>'+
                '                            @else'+
                '                                <option value="{{ $item->type_id }}">'+
                '                                    {{ $item->type_name }}</option>'+
                '                            @endif'+
                '                        @endforeach'+

                '                </select>' +
                '            </div>' +

                '            <div class="col-span-3 sm:col-span-1">' +
                '                <label for="shareholder_age" class="block text-sm font-medium text-gray-700">Age</label>' +
                '                <select wire:model="shareholder_age.'+ (str_ownership_counter_less_by_1) + '" id="shareholder_age'+ (str_ownership_counter) + '" name="shareholder_age[]"' +
                '                    autocomplete="shareholder_age"' +
                '                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">' +
                '                        <option>Please Choose</option>'+
                '                        @foreach ($global_age_type as $item)'+
                '                            @if (Request::old("shareholder_age.'+ (str_ownership_counter_less_by_1) + '") == $item->type_id)'+
                '                                <option value="{{ $item->type_id }}" selected>'+
                '                                    {{ $item->type_name }}</option>'+
                '                            @else'+
                '                                <option value="{{ $item->type_id }}">'+
                '                                    {{ $item->type_name }}</option>'+
                '                            @endif'+
                '                        @endforeach'+
                '                </select>' +
                '            </div>' +
                '        </div>'
            ;
            



        }

        // addFields();

        $('#addfield_btn').click(function(e) {
            // alert('hai');
            // addFields();
        });

        window.addEventListener('addFields', event => {
            var count = event.detail.count;
            addFields(count);
        });
        // alert("Test");
        // window.addEventListener('openPreview', event => {
        //     alert("Test");
        //     // var url = event.detail.url;
        //     // openPreview2(url);
        // });

        document.addEventListener('openPreview', function() {
            alert("Test");
            // var url = event.detail.url;
            // openPreview2(url);
        });

        Livewire.on('openPreview2', event => {
                // alert('hai');
           
                // alert(event);
                // document.getElementById("imgDiv").src="newSource.png";
                $('#imgDiv').attr("src", event);
                // alert($('#imgDiv'));
                openModal('previewFile');
            })

            Livewire.on('openPreview3', event => {
                // alert('hai');
           
                // alert(event);
                // document.getElementById("imgDiv").src="newSource.png";
                $('#videoDiv').attr("src", event);
                // alert($('#imgDiv'));
                openModal('previewVideo');
            })

        // function openPreview(url){
        //     alert("Test");
        // }

        // function openPreview2(url){
        //     $('#imgDiv').src(url);
        //     openModal('previewFile');
        // }

        
    </script>
@endsection
{{-- </x-app-layout> --}}
