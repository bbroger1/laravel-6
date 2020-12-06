<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page - @yield('title')</title>
    @stack('styles')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <!-- stack pode ser usado para incluir scripts e style em páginas especificas -->
    @stack('scripts')
</body>
</html>
