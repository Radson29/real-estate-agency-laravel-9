
    @include('admin.includes._head')
      
        @include('admin.includes._loader')
        @include('admin.includes._header')
            
        @include('admin.includes._sidebar')   
        @include('admin.includes._notification')

            @yield('content')
   
      
        @include('admin.includes._scripts')
  