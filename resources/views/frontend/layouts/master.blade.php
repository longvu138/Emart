
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    @include('frontend.layouts.head')
   
</head>

<body>
   
    @include('frontend.layouts.header')
    
    @yield('content')
    

    @include('frontend.layouts.footer')

    <!-- JS here -->

    @include('frontend.layouts.script')
    
</body>
</html>