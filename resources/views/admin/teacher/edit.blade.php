@extends('admin.layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/css-rtl/core/colors/palette-callout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/vendors/css/forms/selects/select2.min.css') }}">
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('admin.admins') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('admin.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('admin.edit_admin') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('admin.edit_admin') }}</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="form" method="post" action="{{ route('teacher.update', $teacher->id) }}">
                                    @csrf
                                    <input type="hidden" value="{{ $teacher->id }}" name="id">

                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i> {{ __('admin.personal_info') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __('admin.name') }}</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $teacher->name }}">
                                                    @error('name')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __('admin.email') }}</label>
                                                    <input type="email" class="form-control" name="email" value="{{ $teacher->email }}">
                                                    @error('email')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __('admin.password') }}</label>
                                                    <input type="password" class="form-control" name="password">
                                                    @error('password')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __('admin.phone') }}</label>
                                                    <input type="text" class="form-control" name="phone" value="{{ $teacher->phone }}">
                                                    @error('phone')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="card-title">{{ __('admin.office') }}</label>
                                                <select class="form-control" name="office_id">
                                                    <option>{{ __('admin.select_office') }}</option>
                                                    @foreach(\App\Models\Office::all() as $office)
                                                        <option value="{{ $office->id }}" @if($teacher->office_id == $office->id) selected @endif>{{ $office->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('office_id')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="card-title">{{ __('admin.subjects') }}</label>
                                                    <select class="select2-placeholder-multiple form-control" multiple name="subjects[]" id="multi_placehodler">
                                                        @foreach(\App\Models\SchoolYear::all() as $school_year)
                                                            <optgroup label="{{ $school_year->name }}">
                                                                @foreach(\App\Models\Subject::where('school_year_id', $school_year->id)->get() as $subject)
                                                                    <option value="{{ $subject->id }}" @if( in_array($subject->id, \App\Helper\getTeacherSubject($teacher->id)) ) selected @endif>{{ $subject->name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                                    @error('subjects')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="card-title">{{ __('admin.class_rooms') }}</label>
                                                    <select class="select2-placeholder-multiple form-control" multiple name="class_rooms[]" id="multi_placehodler">
                                                        @foreach(\App\Models\ClassRoom::all() as $class_room)
                                                            <option value="{{ $class_room->id }}" @if( in_array($class_room->id, App\Helper\getTeacherClass($teacher->id)) ) selected @endif>{{ $class_room->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('class_rooms')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
{{--                                        <button type="button" class="btn btn-warning mr-1">--}}
{{--                                            <i class="ft-x"></i> {{ __('admin.cancel') }}--}}
{{--                                        </button>--}}
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> {{ __('admin.save') }}
                                        </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('adminpanel/app-assets/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('adminpanel/app-assets/js/scripts/forms/select/form-select2.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $(document).on('change', '#schoolYear', function () {
                let school_year_id = $('#schoolYear option:selected').val();

                $.ajax({
                    url: '{{ route('get.school_year.subject') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        school_year: school_year_id,
                    },
                    success: function (data) {
                        if (data.status === true){
                            $('#multi_placehodler').children().remove();
                            for (let i = 0, j = data.data.length; i < j; i++){
                                $('#multi_placehodler').append(`
                                    <option value="${data.data[i].id}">${data.data[i].name}</option>
                                `);
                            }
                        }
                    },
                });

                if ( isNaN(school_year_id) ){
                    $('#multi_placehodler').children().remove();
                }
            });
        });
    </script>
@endsection
