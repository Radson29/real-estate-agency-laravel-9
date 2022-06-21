
        @include('strona.includes.head')
        @include('sweetalert::alert')
   
    @include('strona.includes.header')
    @yield('content')

 
    @include('strona.includes.footer')
    @include('sweetalert::alert')
    @include('strona.includes.skrypty')
  



