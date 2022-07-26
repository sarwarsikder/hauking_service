<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Quantum Upgrade</title>
    @include('partials.frontend_styles')
    @stack('css-styles')
</head>

<body>
<div class="container-fluid">
    @include('partials.frontend_nav_menu')
    @yield('content')
    @include('partials.frontend_news_latter')
    @include('partials.frontend_footer')
    @include('partials.frontend_scripts')
    @yield('scripts')
</div>

</body>

</html>
