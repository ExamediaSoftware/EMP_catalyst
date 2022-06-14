{{-- <x-app-layout> --}}
@extends('layouts.app')

@section('css')
    <style></style>
@endsection
@section('content')
    <div class="container mt-1">
        <div class="row mt-1 justify-content-center">
            <div class="mt-1 col-md-12">
                <div class="card">

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ $message }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        {{-- @if (Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif --}}
                        @livewire('list-application')
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection
@section('js')
    <script type="text/javascript">
        function openModal(modalId) {
            modal = document.getElementById(modalId)
            modal.classList.remove('hidden')
        }

        function closeModal() {
            modal = document.getElementById('modal');
            modal.classList.add('hidden');
        }
    </script>
@endsection
{{-- </x-app-layout> --}}
