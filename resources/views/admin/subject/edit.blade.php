@extends('admin.layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/css-rtl/core/colors/palette-callout.css') }}">
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('admin.subjects') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('admin.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('admin.edit_subject') }}
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
                                <h4 class="card-title">{{ __('admin.edit_subject') }}</h4>
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
                                <form class="form" method="post" action="{{ route('subject.update', $subject->id) }}">
                                    @csrf
                                    <input type="hidden" value="{{ $subject->id }}" name="id">

                                    <div class="form-body">
                                        <h4 class="form-section"><i class="ft-user"></i> {{ __('admin.info') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{{ __('admin.name') }}</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $subject->name }}">
                                                    @error('name')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="card-title">{{ __('admin.school_year') }}</label>
                                                <select class="form-control" name="school_year_id">
                                                    <option>{{ __('admin.select_school_year') }}</option>
                                                    @foreach(\App\Models\SchoolYear::all() as $school_year)
                                                        <option value="{{ $school_year->id }}" @if($school_year->id == $subject->school_year_id) selected @endif>{{ $school_year->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('school_year_id')
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
