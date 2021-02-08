@extends('teacher.layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/fonts/simple-line-icons/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminpanel/app-assets/css-rtl/pages/chat-application.css') }}">
@endsection

@section('content')
    <div class="app-content content">

        <div class="sidebar-left sidebar-fixed">
            <div class="sidebar">
                <div class="sidebar-content card d-none d-lg-block">
                    <div class="card-body chat-fixed-search">
                        <fieldset class="form-group position-relative has-icon-left m-0">
                            <input type="text" class="form-control" id="iconLeft1" placeholder="Search user">
                            <div class="form-control-position">
                                <i class="ft-search"></i>
                            </div>
                        </fieldset>
                    </div>
                    <div id="users-list" class="list-group position-relative">
                        <div class="users-list-padding media-list">
                            <a href="#" class="media border-0">
                                <div class="media-left pr-1">
                  <span class="avatar avatar-md avatar-online">
                    <img class="media-object rounded-circle" src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-3.png') }}"
                         alt="Generic placeholder image">
                    <i></i>
                  </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading">Elizabeth Elliott
                                        <span class="font-small-3 float-right info">4:14 AM</span>
                                    </h6>
                                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Okay
                                        <span class="float-right primary"><i class="font-medium-1 icon-pin blue-grey lighten-3"></i></span>
                                    </p>
                                </div>
                            </a>
                            <a href="#" class="media border-0">
                                <div class="media-left pr-1">
                  <span class="avatar avatar-md avatar-busy">
                    <img class="media-object rounded-circle" src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-7.png') }}"
                         alt="Generic placeholder image">
                    <i></i>
                  </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading">Kristopher Candy
                                        <span class="font-small-3 float-right info">9:04 PM</span>
                                    </h6>
                                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Thank you
                                        <span class="float-right primary">
                      <span class="badge badge-pill badge-danger">12</span>
                    </span>
                                    </p>
                                </div>
                            </a>
                            <a href="#" class="media border-0">
                                <div class="media-left pr-1">
                  <span class="avatar avatar-md avatar-away">
                    <img class="media-object rounded-circle" src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-8.png') }}"
                         alt="Generic placeholder image">
                    <i></i>
                  </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading">Sarah Woods
                                        <span class="font-small-3 float-right info">2:14 AM</span>
                                    </h6>
                                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check font-small-2"></i> Hello krish!
                                        <span class="float-right primary"><i class="font-medium-1 icon-volume-off blue-grey lighten-3 mr-1"></i>
                      <span class="badge badge-pill badge-danger">3</span>
                    </span>
                                    </p>
                                </div>
                            </a>
                            <a href="#" class="media bg-blue-grey bg-lighten-5 border-right-info border-right-2">
                                <div class="media-left pr-1">
                  <span class="avatar avatar-md avatar-online">
                    <img class="media-object rounded-circle" src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-7.png') }}"
                         alt="Generic placeholder image">
                    <i></i>
                  </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading">Wayne Burton
                                        <span class="font-small-3 float-right info">Today</span>
                                    </h6>
                                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Can we connect?</p>
                                </div>
                            </a>
                            <a href="#" class="media border-0">
                                <div class="media-left pr-1">
                  <span class="avatar avatar-md avatar-away">
                    <img class="media-object rounded-circle" src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-5.png') }}"
                         alt="Generic placeholder image">
                    <i></i>
                  </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading">Sarah Montgomery
                                        <span class="font-small-3 float-right info">Yesterday</span>
                                    </h6>
                                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check font-small-2"></i> Will connect you</p>
                                </div>
                            </a>
                            <a href="#" class="media border-0">
                                <div class="media-left pr-1">
                  <span class="avatar avatar-md avatar-online">
                    <img class="media-object rounded-circle" src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-9.png') }}"
                         alt="Generic placeholder image">
                    <i></i>
                  </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading">Heather Howell
                                        <span class="font-small-3 float-right info">Friday</span>
                                    </h6>
                                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check font-small-2"></i> Thank you
                                        <span class="float-right primary">
                      <span class="badge badge-pill badge-danger">4</span>
                    </span>
                                    </p>
                                </div>
                            </a>
                            <a href="#" class="media border-0">
                                <div class="media-left pr-1">
                  <span class="avatar avatar-md avatar-busy">
                    <img class="media-object rounded-circle" src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-7.png') }}"
                         alt="Generic placeholder image">
                    <i></i>
                  </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading">Kelly Reyes
                                        <span class="font-small-3 float-right info">Thrusday</span>
                                    </h6>
                                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check font-small-2"></i> I love you </p>
                                </div>
                            </a>
                            <a href="#" class="media border-0">
                                <div class="media-left pr-1">
                  <span class="avatar avatar-md avatar-online">
                    <img class="media-object rounded-circle" src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-14.png') }}"
                         alt="Generic placeholder image">
                    <i></i>
                  </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading">Vincent Nelson</h6>
                                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Who you are?</p>
                                </div>
                            </a>
                            <a href="#" class="media border-0">
                                <div class="media-left pr-1">
                  <span class="avatar avatar-md avatar-online">
                    <img class="media-object rounded-circle" src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-3.png') }}"
                         alt="Generic placeholder image">
                    <i></i>
                  </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading">Elizabeth Elliott
                                        <span class="font-small-3 float-right info">4:14 AM</span>
                                    </h6>
                                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check font-small-2"></i> Okay
                                        <span class="float-right primary"><i class="font-medium-1 icon-pin blue-grey lighten-3"></i></span>
                                    </p>
                                </div>
                            </a>
                            <a href="#" class="media border-0">
                                <div class="media-left pr-1">
                  <span class="avatar avatar-md avatar-busy">
                    <img class="media-object rounded-circle" src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-7.png') }}"
                         alt="Generic placeholder image">
                    <i></i>
                  </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading">Kristopher Candy
                                        <span class="font-small-3 float-right info">9:04 PM</span>
                                    </h6>
                                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Thank you
                                        <span class="float-right primary">
                      <span class="badge badge-pill badge-danger">12</span>
                    </span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-right">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="chat-app-window">
                        <div class="badge badge-default mb-1">Chat History</div>
                        <div class="chats">
                            <div class="chats chat-container">
                                @foreach(DB::connection('mongodb')->collection('class_room_' . $class->id)->orderBy('_id', 'desc')->paginate(PAGINATION_COUNT)->reverse() as $chat)
                                    <div class="chat @if($chat['message_owner'] == 100 + \Illuminate\Support\Facades\Auth::guard('teacher')->id()) chat-left @endif">
                                        <div class="chat-avatar">
                                            <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title=""
                                               data-original-title="">
                                                <img src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-1.png') }}" alt="avatar"
                                                />
                                            </a>
                                        </div>
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>{{ $chat['message'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <section class="chat-app-form">
                        <form class="chat-app-input d-flex">
                            <fieldset class="form-group position-relative has-icon-left col-10 m-0">
                                <div class="form-control-position">
                                    <i class="icon-emoticon-smile"></i>
                                </div>
                                <input type="text" class="form-control messageBody" id="iconLeft4" placeholder="Type your message">
                                <div class="form-control-position control-position-right">
                                    <i class="ft-image"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left col-2 m-0">
                                <button type="button" class="btn btn-info submit-button"><i class="la la-paper-plane-o d-lg-none"></i>
                                    <span class="d-none d-lg-block">Send</span>
                                </button>
                            </fieldset>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('adminpanel/app-assets/js/scripts/pages/chat-application.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        //
        // var pusher = new Pusher('2a997422ebd3ae863e88', {
        //     cluster: 'eu'
        // });
        //
        // var channel = pusher.subscribe('my-channel');
        // channel.bind('my-event', function(data) {
        //     alert(JSON.stringify(data));
        // });

        Pusher.logToConsole = true;
        let pusher = new Pusher('2a997422ebd3ae863e88', {
            encrypted: true,
            cluster: 'eu'
        });
        let channel = pusher.subscribe(`class_token.{{ $class->class_token }}`);
        channel.bind('App\\Events\\newMessage', function (data) {
            console.log(data + ' from notification');
        });

        $(document).ready(function () {
            $('.chat-app-input').submit(function (e) {
                e.preventDefault();
            });

            $(document).on('click', '.submit-button', function () {
                let message = $('.messageBody').val();

                $.ajax({
                    url: '{{ route('class_room.chat', $class->class_token) }}',
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        message: message,
                    },
                    success: function (data) {
                        if (data.status == true){
                            $('.chat-container').append(`
                                <div class="chat chat-left">
                                    <div class="chat-avatar">
                                        <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title=""
                                           data-original-title="">
                                            <img src="{{ asset('adminpanel/app-assets/images/portrait/small/avatar-s-1.png') }}" alt="avatar"
                                            />
                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                            <p>${message}</p>
                                        </div>
                                    </div>
                                </div>
                            `);
                            $('.messageBody').val('');
                        }
                    },
                });
            });
        });
    </script>
@endsection
