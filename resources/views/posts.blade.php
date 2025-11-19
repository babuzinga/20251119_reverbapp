<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    @yield('script')
</head>
<body>
<div id="app">
   <h1>POSTS</h1>
    <pre id="data"></pre>
</div>
</body>

<script type="module">
    window.Echo.channel('posts')
        .listen('.create', (data) => {
            console.log('Order status updated: ', data);
            document.getElementById('data').innerHTML = data.message;
        });
</script>

</html>