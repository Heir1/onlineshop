<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">              
        @include('admin_styles.styles')
    </head>
    <body class="hold-transition fixed skin-blue sidebar-mini">
        <div class="wrapper">

            {{-- start header --}}
                @include('admin_layout.header')
            {{-- end header --}}

            {{-- start sidebar --}}
                @include('admin_layout.sidebar')
            {{-- end sidebar --}}

            {{-- start content --}}
                @yield('content')
            {{-- end content --}}

        </div>

        @include('admin_scripts.scripts')

    </body>
</html>