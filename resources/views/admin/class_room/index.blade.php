@extends('admin.layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/css-rtl/core/colors/palette-callout.css') }}">
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('admin.class_rooms') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('admin.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('admin.class_rooms') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
{{--                <div class="content-header-right col-md-6 col-12">--}}
{{--                    <div class="dropdown float-md-right">--}}
{{--                        <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"--}}
{{--                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton"><a class="dropdown-item" href="#"><i class="la la-calendar-check-o"></i> Calender</a>--}}
{{--                            <a class="dropdown-item" href="#"><i class="la la-cart-plus"></i> Cart</a>--}}
{{--                            <a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Support</a>--}}
{{--                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            @include('admin.layouts.message')

            <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('admin.class_rooms') }}</h4>
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
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            @if($class_rooms->count() > 0)
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('admin.name') }}</th>
                                                <th>{{ __('admin.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($class_rooms as $class_room)
                                                <tr>
                                                    <th scope="row">{{ $class_room->id }}</th>
                                                    <td>{{ $class_room->name }}</td>
                                                    <td>
                                                        <a class="btn btn-primary" style="color: white" href="{{ route('class_room.edit', $class_room->id) }}">{{ __('admin.edit') }}</a>
                                                        <a class="btn btn-danger deleteItem" style="color: white" href="{{ route('class_room.delete', $class_room->id) }}">{{ __('admin.delete') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @else
                                            <h3 class="text-center "> {{ __('admin.no_data_to_show') }} </h3>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trigger the modal with a button -->
                <button type="button" id="modelButton" class="btn btn-info btn-lg d-none" data-toggle="modal" data-target="#myModal">Open Modal</button>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">{{ __('admin.delete') }}</h4>
                            </div>
                            <div class="modal-body">
                                <p>{{ __('admin.delete_message') }}</p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" id="yesButton" class="btn btn-danger" data-dismiss="modal">{{ __('admin.yes') }}</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('admin.close') }}</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{ $class_rooms->links() }}
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.deleteItem', function (e) {
                e.preventDefault();
                let href = $(this).attr('href');

                $('#modelButton').trigger('click');
                $(document).on('click', '#yesButton', function () {
                    window.location.replace(href);
                });
            });
        });
    </script>
@endsection
