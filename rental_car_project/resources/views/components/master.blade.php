<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ env('APP_NAME') }} | {{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/icons8-r-48.png')}}">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
        crossorigin="anonymous"
    />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
        rel="stylesheet"
    />
    <!-- BOX ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>

    @vite(['resources/css/styles1.css', 'resources/css/styles2.css'])
</head>
<body class="p-0 m-0">
@include('partials.flashbag-master')
@include('partials.error-alert')
@include('partials.warning-alert')
<header>
    @auth()
        @if(Route::currentRouteName() !== 'register' && Route::currentRouteName() !== 'login')
            @include('partials.navigation', ['user' => $user ?? null])
        @endif
    @endauth
    @guest()
        @include('partials.navigation')
    @endguest
</header>
<main>
    {{-- content --}}
    {{ $slot }}
</main>
@if(Route::currentRouteName() === "home" || Route::currentRouteName() === "about")
    @include('partials.footer')
@endif
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
    crossorigin="anonymous"
></script>
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>

@vite(['resources/js/script.js'])
</body>
</html>
