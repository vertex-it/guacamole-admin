<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | GuacAdmin</title>
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
    @yield('external-css')

</head>

<body class="menu-position-side menu-side-left full-screen with-content-panel">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    <div class="all-wrapper with-side-panel solid-bg-all">
        <div class="layout-w">

            @include('admin.layouts.mobile-header')

            @include('admin.layouts.sidebar')

            <div class="content-w">
                @include('admin.layouts.topbar')

                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ mix('js/admin.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @include('admin.layouts.alerts')

    @yield('external-js')

</body>
</html>
