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
            padding: 16px;
        }

        .b-nav-tab.active {
            color: #ebebeb;
            background-color: rgb(37 99 235);
        }

    </style>
@endsection
@section('content')
    <div class="container mt-1">
        <div class="row mt-1 justify-content-center">
            <div class="mt-1 col-md-12">
                <div class="card">

                    <div class="card-body">
                        <button data-tab="orange"
                            class="b-nav-tab active inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                            Orange
                        </button>
                        <button data-tab="green"
                            class="b-nav-tab inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                            Green
                        </button>
                        <button data-tab="blue"
                            class="b-nav-tab inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">
                            Blue
                        </button>
                        <div id="orange" class="b-tab active">
                            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-5xl">
                                @livewire('application-form-general')
                            </div>
                        </div>
                        <div id="green" class="b-tab">
                            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-5xl">
                                @livewire('application-form')
                            </div>
                        </div>
                        <div id="blue" class="b-tab">
                            {{-- @livewire('application-form2') --}}
                        </div>


                    </div>
                </div>
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
    </script>
@endsection
{{-- </x-app-layout> --}}
