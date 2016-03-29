<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div id="wrapper">
    @include('includes.header')
    @yield('content')
</div>
@include('includes.footer')
</body>
</html>