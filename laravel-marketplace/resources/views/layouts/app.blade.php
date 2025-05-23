<!DOCTYPE html>
<html lang="en" class="bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="min-h-screen flex flex-col">
    <div class="min-h-screen flex-grow">
        @if (!isset($hideNav) || !$hideNav)
            @include('partials.nav')
        @endif

        @if(view()->hasSection('header1') && !view()->hasSection('header2'))
            @include('partials.header1')
            
        @elseif(view()->hasSection('header2'))
            @include('partials.header2')
        @endif

        @yield('content')
    </div>
    
    @if (!isset($hideFooter) || !$hideFooter)
        @include('partials.footer')
    @endif

    @vite('resources/js/app.js')
</body>
</html>