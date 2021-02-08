<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">{{ __('admin.class_rooms') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ \App\Helper\countTeacherClasses() }}</span></a>
                <ul class="menu-content">
                    @foreach( \App\Models\Teacher::find(App\Helper\getCurrentTeacherID())->classes as $class )
                        <li class="active"><a class="menu-item" href="{{ route('teacher.class', $class->id) }}" data-i18n="nav.dash.ecommerce">{{ $class->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">{{ __('admin.chat') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ \App\Helper\countTeacherClasses() }}</span></a>
                <ul class="menu-content">
                    @foreach( \App\Models\Teacher::find(App\Helper\getCurrentTeacherID())->classes as $class )
                        <li class="active"><a class="menu-item" href="{{ route('teacher.chat', $class->id) }}" data-i18n="nav.dash.ecommerce">{{ $class->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>
