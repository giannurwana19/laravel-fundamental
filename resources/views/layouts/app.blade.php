<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Just Post - Ayo tulis & abadikan tulisan kamu">
    <meta name="description" content="Ayo tulis & abadikan tulisan kamu">
    <meta name="keywords" content="post, post blog, blog post, just-blog, just post, juspos, just-post">
    <meta name="robots" content="noindex, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Gian Nurwana">

    <meta property="og:type" content="website" />

    <meta property="og:locale" content="en_US" />
    <meta property="og:title" content="Aplikasi Sistem Informasi Desa | DigitalDesa.id" />
    <meta property="og:description" content="Ayo tulis & abadikan tulisan kamu" />
    <meta property="og:url" content="https://justpost7.herokuapp.com" />
    <meta property="og:site_name" content="Just Post" />
    <!-- <meta property="og:updated_time" content="2018-07-13T13:52:03+02:00" /> -->
    <meta property="og:image" content="{{ asset('favicon') }}/favicon-96x96.png" />
    <meta property="og:image:secure_url" content="{{ asset('favicon') }}/favicon-96x96.png" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="200" />
    <meta property="og:image:alt" content="Just Post" />

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('favicon') }}/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('favicon') }}/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('favicon') }}/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('favicon') }}/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{ asset('favicon') }}/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
        href="{{ asset('favicon') }}/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{ asset('favicon') }}/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152"
        href="{{ asset('favicon') }}/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="{{ asset('favicon') }}/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="{{ asset('favicon') }}/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="{{ asset('favicon') }}/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('favicon') }}/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="{{ asset('favicon') }}/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ asset('favicon') }}/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="{{ asset('favicon') }}/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="{{ asset('favicon') }}/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="{{ asset('favicon') }}/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="{{ asset('favicon') }}/mstile-310x310.png" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('includes.navigation')

        <main class="py-4 content">
            @include('comp.alert-session')
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
