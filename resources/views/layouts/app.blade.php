@include('partials/start')

@livewireStyles
@yield('css')
@include('partials/navbar')


<!-- strat wrapper -->
<div class="h-screen flex flex-row flex-wrap">
  
  @include('partials/sidebar')

  <!-- strat content -->
  <div class="bg-gray-100 flex-1 p-6 md:mt-16"> 

    
    <!-- General Report -->
    @yield('content')
    {{-- {{ $slot }} --}}
    <!-- End General Report -->


  </div>
  <!-- end content -->

</div>
<!-- end wrapper -->
@stack('modals')
@livewireScripts
@yield('js')
@include('partials.end')
