@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container mt-1">
        <div class="row mt-1 justify-content-center">
            <div class="mt-1 col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{-- @php echo Request::url() ;  @endphp --}}
                        @if (Request::is('user'))
                            @livewire('list-user')
                        @endif
                        @if (Request::is('user/create'))
                            {{-- @php echo "test"; @endphp --}}
                            @livewire('create-user',['p_userId' => NULL])
                        @endif
                        @if (Request::is('user/*/edit'))
                            {{-- @php echo "test"; @endphp --}}
                            @livewire('create-user', ['p_userId' => $userID])
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
