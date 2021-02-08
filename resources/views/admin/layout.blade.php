<!doctype html>
<html class="loading" lang="en" data-textdirection="rtl">
    <head>
        @include('admin.layouts.header')

        <title>
            @yield('title')
        </title>

        @yield('head')
    </head>
    <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
    data-open="click" data-menu="vertical-menu" data-col="2-columns">
        @include('admin.layouts.navbar')
        @include('admin.layouts.menu')
        @yield('content')
        @include('admin.layouts.footer')
        @yield('script')
    </body>
</html>
