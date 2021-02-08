<!doctype html>
<html class="loading" lang="en" data-textdirection="rtl">
    <head>
        @include('student.layouts.header')

        <title>
            @yield('title')
        </title>

        @yield('head')
    </head>
    <body class="vertical-layout vertical-menu content-left-sidebar chat-application  menu-expanded fixed-navbar"
          data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar">
        @include('student.layouts.navbar')
        @include('student.layouts.menu')
        @yield('content')
        @include('student.layouts.footer')
        @yield('script')
    </body>
</html>
