{{--Get Fetch User Data--}}
<?php

$user_profiel_data = \Illuminate\Support\Facades\Auth::user();

?>

        <!DOCTYPE html>
<html lang="fa">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mamaji Panel</title>
    <link rel="stylesheet" href="/admin-assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/admin-assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/admin-assets/css/style.css">
    <link rel="stylesheet" href="/admin-assets/css/castum_style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin-assets/images/ico.png')}}"/>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="/"><img src="{{asset('admin-assets/images/logo.png')}}"
                                                                      alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="/"><img
                        src="{{asset('admin-assets/images/ico.png')}}" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>

            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                       aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{asset('admin-assets/images/faces/face.png')}}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{$user_profiel_data->username}}</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <form action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="mdi mdi-logout mr-2 text-primary"></i>{{__('all_strings.Exit')}}
                            </button>
                        </form>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
                <li class="nav-item dropdown" onclick="Get_Seen_All_Notificatio(this)">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                       data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>

                        @if(count(\App\Models\Notification::join('users','notifications.user_id','=','users.id')->where('users.login_token',session('login_token'))->where('seen',false)->get())>0)
                            <span class="count-symbol bg-danger"></span>
                        @endif

                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                         aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0" style="text-align: center;">{{__('all_strings.Nofigs')}}</h6>
                        <div class="dropdown-divider"></div>


                        @foreach(\App\Models\Notification::join('users','notifications.user_id','=','users.id')->where('users.login_token',\Illuminate\Support\Facades\Auth::user()->login_token)->get() as $notification)
                            <a class="dropdown-item preview-item" href="{{$notification->link}}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-reddit">
                                        <i class="mdi mdi-bell"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 style="margin: 5px;"
                                        class="preview-subject font-weight-normal mb-1">{{$notification->title}}</h6>
                                    <p style="margin: 5px;"
                                       class="text-gray ellipsis mb-0">{{$notification->content}}</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                        @endforeach


                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">


            @if($user_profiel_data->user_type=="admin")
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="{{url('/Admin/Profile')}}" class="nav-link">
                            <div class="nav-profile-image">
                                @if($user_profiel_data->profile_image_file_id==0)
                                    <img src="{{asset('admin-assets/images/faces/face.png')}}" alt="profile">
                                @else
                                    <img src="\File\{{App\Models\File::where('id',$user_profiel_data->profile_image_file_id)->first()->file_hash}}"
                                         alt="profile">
                                @endif
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column" style="margin-right: 10px;">
                                <span class="font-weight-bold mb-2">{{$user_profiel_data->username}}</span>
                                @if($user_profiel_data->user_type=="admin")
                                    <span class="text-secondary text-small">{{__('all_strings.Admin')}}</span>
                                @endif
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/Dashboard')}}">
                            <span class="menu-title">{{__('all_strings.Dashboard')}}</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/categories')}}">
                            <span class="menu-title">{{__('all_strings.categories')}}</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/NewPost')}}">
                            <span class="menu-title">{{__('all_strings.newpost')}}</span>
                            <i class="mdi mdi-package-variant-closed menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/NewSoundPost')}}">
                            <span class="menu-title">{{__('all_strings.newsoundpost')}}</span>
                            <i class="mdi mdi-soundcloud menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users.index')}}">
                            <span class="menu-title">{{__('all_strings.users')}}</span>
                            <i class="mdi mdi-soundcloud menu-icon"></i>
                        </a>
                    </li>
<!--
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users.index')}}?midwives=1">
                            <span class="menu-title">{{__('all_strings.doctors')}}</span>
                            <i class="mdi mdi-soundcloud menu-icon"></i>
                        </a>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                           aria-controls="ui-basic">
                            <span class="menu-title">{{__('all_strings.store')}}</span>
                            <i class="mdi mdi-store menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li style="display: none;" class="nav-item"><a class="nav-link"
                                                                               href="{{url('/Admin/Store/CatStore')}}">{{__('all_strings.categories')}}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{url('/Admin/Store/NewStore')}}">{{__('all_strings.new_product')}}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{url('/Admin/Store/AllStores')}}">{{__('all_strings.allstorepost')}}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{url('/Admin/Store/AllOrders')}}">{{__('all_strings.orders')}}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{url('/Admin/Store/CurrentOrders')}}">{{__('all_strings.curentorders')}}</a>
                                </li>
                                <li style="display: none;" class="nav-item"><a class="nav-link"
                                                                               href="{{url('/Admin/Store/Discount')}}">{{__('all_strings.coponall')}}</a>
                                </li>
                                <li style="display: none;" class="nav-item"><a class="nav-link"
                                                                               href="{{url('/Admin/Store/Coupon')}}">{{__('all_strings.coponone')}}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/Transactions')}}">
                            <span class="menu-title">{{__('all_strings.transations')}}</span>
                            <i class="mdi mdi-card menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/Questions')}}">
                            <span class="menu-title">پرسش پاسخ</span>
                            <i class="mdi mdi-comment-question-outline menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/AllPosts')}}">
                            <span class="menu-title">{{__('all_strings.posts')}}</span>
                            <i class="mdi mdi-paperclip menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/UserManager')}}">
                            <span class="menu-title">{{__('all_strings.User Managment')}}</span>
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/Visite')}}">
                            <span class="menu-title">{{__('all_strings.visites')}}</span>
                            <i class="mdi mdi-application menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/Charts')}}">
                            <span class="menu-title">{{__('all_strings.Chart')}}</span>
                            <i class="mdi mdi-chart-bar menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/Hospitals')}}">
                            <span class="menu-title">{{__('all_strings.HospitalsMgmt')}}</span>
                            <i class="mdi mdi-hospital-building menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item" style="display: none;">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                           aria-controls="ui-basic">
                            <span class="menu-title">{{__('all_strings.Reports')}}</span>
                            <i class="mdi mdi-chart-bubble menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{url('/Admin/Reports')}}">{{__('all_strings.All Reports')}}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{url('/Admin/NewReport')}}">{{__('all_strings.New Report')}}</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    @if(\Illuminate\Support\Facades\Auth::user()->username=="rezafta")
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/Admin/Groups')}}">
                                <span class="menu-title">{{__('all_strings.Accessiblity')}}</span>
                                <i class="mdi mdi-fingerprint menu-icon"></i>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/Cities')}}">
                            <span class="menu-title">{{__('all_strings.cities')}}</span>
                            <i class="mdi mdi-map menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/FileManager')}}">
                            <span class="menu-title">{{__('all_strings.filemanager')}}</span>
                            <i class="mdi mdi-folder menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/Profile')}}">
                            <span class="menu-title">{{__('all_strings.Profile')}}</span>
                            <i class="mdi mdi-account menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/Settings')}}">
                            <span class="menu-title">{{__('all_strings.Settings')}}</span>
                            <i class="mdi mdi-settings menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">

                        <form action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="nav-link" >
                                <span class="menu-title">{{__('all_strings.Exit')}}</span>
                                <i class="mdi mdi-logout menu-icon"></i>
                            </button>
                        </form>

                    </li>

                </ul>
            @elseif($user_profiel_data->user_type!="USER")
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="{{url('/Admin/Profile')}}" class="nav-link">
                            <div class="nav-profile-image">
                                @if($user_profiel_data->profile_image_file_id==0)
                                    <img src="{{asset('admin-assets/images/faces/face.png')}}" alt="profile">
                                @else
                                    <img src="\File\{{App\Models\File::where('id',$user_profiel_data->profile_image_file_id)->first()->file_hash}}"
                                         alt="profile">
                                @endif
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column" style="margin-right: 10px;">
                                <span class="font-weight-bold mb-2">{{$user_profiel_data->username}}</span>
                                {{ $user_profiel_data->user_type  }}
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <span class="menu-title">{{__('all_strings.Dashboard')}}</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.hospitals.index')}}">
                            <span class="menu-title">{{__('all_strings.hospitals')}}</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.visits.index') }}">
                            <span class="menu-title">{{__('all_strings.visites')}}</span>
                            <i class="mdi mdi-application menu-icon"></i>
                        </a>
                    </li>

<!--
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/categories')}}">
                            <span class="menu-title">{{__('all_strings.categories')}}</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/NewSoundPost')}}">
                            <span class="menu-title">{{__('all_strings.newsoundpost')}}</span>
                            <i class="mdi mdi-soundcloud menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/AllPosts')}}">
                            <span class="menu-title">{{__('all_strings.posts')}}</span>
                            <i class="mdi mdi-paperclip menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/Questions')}}">
                            <span class="menu-title">پرسش پاسخ</span>
                            <i class="mdi mdi-comment-question-outline menu-icon"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/Admin/Profile')}}">
                            <span class="menu-title">{{__('all_strings.Profile')}}</span>
                            <i class="mdi mdi-account menu-icon"></i>
                        </a>
                    </li>
                    -->



                    <li class="nav-item">

                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="nav-link border-0 w-100 bg-transparent" >
                                <span class="menu-title">{{__('all_strings.Exit')}}</span>
                                <i class="mdi mdi-logout menu-icon"></i>
                            </button>
                        </form>

                    </li>

                </ul>
            @endif


        </nav>
