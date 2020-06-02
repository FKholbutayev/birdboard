<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body class="bg-gray-200">
    <div id="app">
        <nav class="bg-white">
            <div class="container mx-auto">
                <div class="flex justify-between items-center py-2">
                    <h1>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="/images/logo.svg" alt="Birdboard">
                        </a>
                    </h1>

                <div>
                        <!-- Authentication Links -->
                    <div class="flex items-center">
                        @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                                <a
                                    class="flex items-center text-sm no-underline"
                                    href="#" role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    v-pre
                                >

                                <img width="35"
                                class="rounded full mr-3"
                                src="https://gravatar.com/avatar/{{ md5(auth()->user()->email) }}"/>
                                {{auth()->user()->name}}

                                </a>
                        @endguest
                    </div>
                </div>
                </div>
        </div>
     </nav>

        <main class="py-4 mx-auto container">
            @yield('content')
        </main>
    </div>
</body>
</html>
