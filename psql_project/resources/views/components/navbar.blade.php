<!doctype html>
<html lang="en">

<head>
    <title></title>
    <!-- Required meta tags -->
    @include('stylesheet')
{{--    @vite('resources/css/app.css')--}}
    @vite('resources/js/app.js')
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">PostgreSQL Project Educative</span>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>
