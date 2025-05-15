<!DOCTYPE html>
<html lang="en">

<head>
    @include('Theme.partials.head')
</head>

<body>
    @include('Theme.partials.header')
    <!--================Header Menu Area =================-->
    @yield('content')
    @include('Theme.partials.footer')

    @include('Theme.partials.scripts')

</body>

</html>
