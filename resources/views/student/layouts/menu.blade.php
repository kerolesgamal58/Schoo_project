<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">{{ __('admin.chat') }}</span><span class="badge badge badge-info badge-pill float-right mr-2">1</span></a>
                <ul class="menu-content">
                    @foreach(\App\Models\Student::where('id', App\Helper\getCurrentStudentID())->get() as $student)
                        <li class="active"><a class="menu-item" href="{{ route('student.chat', $student->class_room_id ) }}" data-i18n="nav.dash.ecommerce">{{ $student->class_room->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>
