<!DOCTYPE html>
<html lang="en">
@include('partials.head')

<body class="bg-gray-50 text-gray-800">

@include('partials.header')

@yield('content')

@include('partials.footer')

@include('components.notifications')

@filamentScripts
@vite('resources/js/app.js')
</body>
</html>
