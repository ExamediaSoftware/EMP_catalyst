@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container mt-1">
        <div class="row mt-1 justify-content-center">
            <div class="mt-1 col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (Request::is('admin'))
                            @livewire('admin-list-application')
                        @endif
                        @if (Request::is('admin/*'))
                            @livewire('admin-review-application', ['applicationid' => $id])
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection
