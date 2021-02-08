<!doctype html>
<html class="loading" lang="en" data-textdirection="rtl">
    <head>
        @include('teacher.layouts.header')

        <title>
            @yield('title')
        </title>

        @yield('head')
    </head>
    <body class="vertical-layout vertical-menu content-left-sidebar chat-application  menu-expanded fixed-navbar"
          data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar">
        @include('teacher.layouts.navbar')
        @include('teacher.layouts.menu')
        @yield('content')
        @include('teacher.layouts.footer')
        @yield('script')
    </body>
</html>
