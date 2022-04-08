<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('layouts/app.app_page_title') | FINT </title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.css') }}">
    <!-- Waves Effect Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/waves.css') }}">
    <!-- Animation Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/animate.css') }}">
    <!-- Morris Chart Css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/morris.css') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/all-themes.css') }}">

    <!-- Colorpicker Css -->
    <link href="{{ asset('front/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />
    <!-- Dropzone Css -->
    <link href="{{ asset('front/css/dropzone.css') }}" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="{{ asset('front/css/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('front/css/bootstrap-select.css') }}" rel="stylesheet" />
    <!-- Sweet Alert Css -->
    <link href="{{ asset('front/css/sweetalert.css') }}" rel="stylesheet" />

    <link href="{{ asset('front/css/input-file.css') }}" rel="stylesheet" />

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

    <style>
        .flag{
            position: absolute;
            top: 0;
            left: 0;
            z-index: 20;
        }

        .flag img,
        .flag{
            width: 100%;
            height: 100vh;
        }

        .flag-close{
            opacity: 0;
            visibility: hidden;
            transition: 1s all;
        }
    </style>


</head>

<body class="theme-red">

{{--<div class="flag">--}}
{{--    <img src="{{asset('front/assets/images/flag.svg')}}" alt="">--}}
{{--</div>--}}

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>@lang('layouts/app.app_please_wait')</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->


<!-- Top Bar -->
<nav style="background-color: #394241;" class="navbar" >
    <div class="container-fluid">

        <div class="navbar-header" id="navbar-header">
            <div id="logos">
                <a href="">
                    <img src="{{asset('front/images/fu-logo.png')}}" alt="F Ü" id="nav-fu-logo">
                </a>
                @if(\Illuminate\Support\Facades\Auth::user()->institute == 'Science Sciences')
                    <div id="fint-logo">
                        <img src="{{asset('front/assets/images/fint-logo-2.png')}}" alt="fint">
                    </div>

                @endif
            </div>
            <div id="page-title">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand deneme2a" >
                <span> FINT ||
                    @if(\Illuminate\Support\Facades\Auth::user()->institute == 'Educational Sciences')
                        @lang('layouts/app.app_education_sciences')
                    @elseif(\Illuminate\Support\Facades\Auth::user()->institute == 'Science Sciences')
                        @lang('layouts/app.app_science_sciences')
                    @elseif(\Illuminate\Support\Facades\Auth::user()->institute == 'Social Sciences')
                        @lang('layouts/app.app_social_sciences')
                    @else
                        @lang('layouts/app.app_health_sciences')
                    @endif
                </span>
                </a>
            </div>

        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>

    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        @if(\Illuminate\Support\Facades\Auth::user()->role == 'Super Admin' || \Illuminate\Support\Facades\Auth::user()->role == 'Admin' || \Illuminate\Support\Facades\Auth::user()->role == 'Aday'  )
            <div id="dropdown-menu2">
                <a>
                    <div style="display: flex; color: white;">
                        <i class="material-icons">
                            account_circle
                        </i>
                        <span>
                                @lang('layouts/app.app_profile')
                            </span>
                    </div>
                </a>
                <ul>
                    <li class="user-name">
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </li>
                    <li id="logout">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input class="btn btn-info waves-effect form-input-s" type="submit" value="Logout">
                        </form>
                    </li>

                </ul>

            </div>
    @endif

    <!-- User Info -->
        <div class="user-info" style="position: relative;">
            {{--            <img src="{{asset('front/assets/images/firat.jpg')}}" alt=""--}}
            {{--            style="--}}
            {{--            height: 85%;--}}
            {{--            position: absolute;--}}
            {{--            left: 50%;--}}
            {{--            transform: translate(-50%, 0);">--}}
            <div class="info-container">


            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu" >
            <ul class="list2" style="background-color: #8D9695; text-align: center !important; color: white; ">

                <li class="header" style="font-weight: 600;font-size: larger; background-color:  #394241; color: white; text-align: center;">MENU</li>

                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="material-icons" style="transition: 200ms all;">home</i>
                        <span style="color: white; letter-spacing: 1px;">@lang('layouts/app.app_home')</span>
                    </a>
                </li>
                @if (\Illuminate\Support\Facades\Auth::user()->role == 'Admin')
                    <li>
                        <a href="{{route('backendStudentList')}}" class=" waves-effect waves-block">
                            <i class="material-icons" style="color: white;transition: 200ms all;">layers</i>
                            <span style="color: white; letter-spacing: 1px;">@lang('layouts/app.app_students')</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('announcements')}}" >
                            <i class="material-icons" style="transition: 200ms all;">view_list</i>
                            <span style="color: white; letter-spacing: 1px;">@lang('layouts/app.app_announcements')</span>
                        </a>
                    </li>


                @endif

                @if (\Illuminate\Support\Facades\Auth::user()->role == 'Aday')
                    <li>
                        <a href="{{route('appeals.index')}}" class=" waves-effect waves-block">
                            <i class="material-icons">layers</i>
                            <span style="color: white; letter-spacing: 1px;">@lang('layouts/app.app_applications')</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('student.info')}}" >
                            <i class="material-icons">view_list</i>
                            <span style="color: white; letter-spacing: 1px;">@lang('layouts/app.app_information')</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('student.faqList')}}" >
                            <i class="material-icons">view_list</i>
                            <span style="color: white; letter-spacing: 1px;">@lang('layouts/app.app_faq')</span>
                        </a>
                    </li>
                @endif

                @if (\Illuminate\Support\Facades\Auth::user()->role == 'Super Admin')


                    <li>
                        <a href="{{route('supA.faq.index')}}" >
                            <i class="material-icons" style="transition: 200ms all;">view_list</i>
                            <span style="color: white; letter-spacing: 1px;">@lang('layouts/app.app_faq')</span>
                        </a>
                    </li>

                    <li id="dropdown-menu">
                        <a>
                            <div style="display: flex;">
                                <i class="material-icons">
                                    arrow_drop_down
                                </i>
                                <span>
                            @lang('layouts/app.app_users')
                        </span>
                            </div>
                        </a>
                        <ul>
                            <li class="dropdown-menu-item" onclick="window.location='{{route('superAdmin.adminCreate')}}'">
                                <button >
                                    @lang('layouts/app.app_create_admin')
                                </button>
                            </li>
                            <li class="dropdown-menu-item" onclick="window.location='{{route('superAdmin.adminIndex')}}'">
                                <button >
                                    @lang('layouts/app.app_list_admin')
                                </button>
                            </li>
                        </ul>

                    </li>

                    <li>
                        <a href="{{route('supA.studentList')}}" >
                            <i class="material-icons" style="transition: 200ms all;">view_list</i>
                            <span style="color: white; letter-spacing: 1px;">Öğrenciler</span>
                        </a>
                    </li>


                @endif

            </ul>


        </div>
        <!-- #Menu -->

    </aside>
    <!-- #END# Left Sidebar -->

</section>

<section class="content">
    @yield('content')
</section>

<!-- Footer -->
<div class="legal">
    &copy; @lang('layouts/app.app_copyright')
</div>
<!-- #Footer -->

<script>
    $("#dropdown-menu a").click(()=>{
        $("#dropdown-menu  >ul").toggle(300);
    });

    $("#dropdown-menu2 a").click(()=>{
        $("#dropdown-menu2 >ul").toggle(300);
    });
</script>

{{--<script>--}}
{{--    $(document).ready( ()=>{--}}
{{--        setTimeout( ()=>{--}}
{{--            $(".flag").addClass("flag-close");--}}
{{--        },1000);--}}
{{--    });--}}
{{--</script>--}}


<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<!-- Bootstrap Core Js -->
<script src="{{asset('front/js/bootstrap.js')}}"></script>
<!-- Select Plugin Js -->
<!-- Slimscroll Plugin Js -->
<script src="{{asset('front/js/jquery.slimscroll.js')}}"></script>
<!-- Waves Effect Plugin Js -->
<script src="{{asset('front/js/waves.js')}}"></script>
<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('front/js/jquery.countTo.js')}}"></script>
<!-- Morris Plugin Js -->
<script src="{{asset('front/js/raphael.min.js')}}"></script>
<script src="{{asset('front/js/morris.js')}}"></script>
<!-- ChartJs -->
<script src="{{asset('front/js/Chart.bundle.js')}}"></script>
<!-- Flot Charts Plugin Js -->
<script src="{{asset('front/js/jquery.flot.js')}}"></script>
<script src="{{asset('front/js/jquery.flot.resize.js')}}"></script>
<script src="{{asset('front/js/jquery.flot.pie.js')}}"></script>
<script src="{{asset('front/js/jquery.flot.categories.js')}}"></script>
<script src="{{asset('front/js/jquery.flot.time.js')}}"></script>
<!-- Sparkline Chart Plugin Js -->
<script src="{{asset('front/js/jquery.sparkline.js')}}"></script>
<script src="{{asset('front/js/jquery.steps.js')}}"></script>
<script src="{{asset('front/js/jquery.validate.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('front/js/admin.js')}}"></script>
<script src="{{asset('front/js/index.js')}}"></script>
<!-- Demo Js -->
<script src="{{asset('front/js/demo.js')}}"></script>

<!-- Bootstrap Colorpicker Js -->
<script src="{{asset('front/js/bootstrap-colorpicker.js')}}"></script>
<!-- Dropzone Plugin Js -->
<script src="{{asset('front/js/dropzone.js')}}"></script>
<!-- Input Mask Plugin Js -->
<script src="{{asset('front/js/jquery.inputmask.bundle.js')}}"></script>
<!-- Multi Select Plugin Js -->
<script src="{{asset('front/js/jquery.multi-select.js')}}"></script>
<!-- Bootstrap Tags Input Plugin Js -->
<script src="{{asset('front/js/bootstrap-tagsinput.js')}}"></script>

<script src="{{asset('front/js/modals.js')}}"></script>

<script src="{{asset('front/js/animation.js')}}"></script>
{{--<script src="{{asset('front/js/bootstrap-select.js')}}"></script>--}}
<script src="{{asset('front/js/dialogs.js')}}"></script>
<script src="{{asset('front/js/notifications.js')}}"></script>
<script src="{{asset('front/js/range-sliders.js')}}"></script>
<script src="{{asset('front/js/sortable-nestable.js')}}"></script>
<script src="{{asset('front/js/tooltips-popovers.js')}}"></script>
<script src="{{asset('front/js/bootstrap-notify.js')}}"></script>
@yield('script')

</body>
</html>
