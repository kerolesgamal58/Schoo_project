<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">{{ __('admin.admins') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ \App\Models\Admin::count() }}</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('admin.index') }}" data-i18n="nav.dash.ecommerce">{{ __('admin.all') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('admin.add') }}" data-i18n="nav.dash.crypto">{{ __('admin.add') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-building"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('admin.class_rooms') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ \App\Models\ClassRoom::count() }}</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('class_room.index') }}" data-i18n="nav.dash.ecommerce">{{ __('admin.all') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('class_room.add') }}" data-i18n="nav.dash.crypto">{{ __('admin.add') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-building"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('admin.offices') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ \App\Models\Office::count() }}</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('office.index') }}" data-i18n="nav.dash.ecommerce">{{ __('admin.all') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('office.add') }}" data-i18n="nav.dash.crypto">{{ __('admin.add') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-book"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('admin.subjects') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ \App\Models\Subject::count() }}</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('subject.index') }}" data-i18n="nav.dash.ecommerce">{{ __('admin.all') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('subject.add') }}" data-i18n="nav.dash.crypto">{{ __('admin.add') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('admin.activities') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ \App\Models\Activity::count() }}</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('activity.index') }}" data-i18n="nav.dash.ecommerce">{{ __('admin.all') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('activity.add') }}" data-i18n="nav.dash.crypto">{{ __('admin.add') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-graduation-cap"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('admin.school_years') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ \App\Models\SchoolYear::count() }}</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('school_year.index') }}" data-i18n="nav.dash.ecommerce">{{ __('admin.all') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('school_year.add') }}" data-i18n="nav.dash.crypto">{{ __('admin.add') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('admin.teachers') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ \App\Models\Teacher::count() }}</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('teacher.index') }}" data-i18n="nav.dash.ecommerce">{{ __('admin.all') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('teacher.add') }}" data-i18n="nav.dash.crypto">{{ __('admin.add') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-user"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('admin.students') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ \App\Models\Student::count() }}</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('student.index') }}" data-i18n="nav.dash.ecommerce">{{ __('admin.all') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('student.add') }}" data-i18n="nav.dash.crypto">{{ __('admin.add') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.templates.main">{{ __('admin.parents') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{ \App\Models\StudentParent::count() }}</span></a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('parent.index') }}" data-i18n="nav.dash.ecommerce">{{ __('admin.all') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('parent.add') }}" data-i18n="nav.dash.crypto">{{ __('admin.add') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
