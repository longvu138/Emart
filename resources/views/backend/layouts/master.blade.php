<!doctype html>
<html lang="en">

<head>
    @include('backend.layouts.head')
</head>

<body >

    <div class="wrapper">

    @include('backend.layouts.nav')
    
    @yield('content')
    </div>
        
    <!-- Wrapper End-->
    @include('backend.layouts.footer')
  
</body>

</html>
