@extends('layouts.app')

@section('content')
    <style>
        @media screen and (max-width: 768px) {
            .list-group div div li:last-child > div {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .list-group div div li:last-child > div>div{
                width: auto !important;
                margin-bottom: 5px;
            }
        }

        .hidden {
            display: none;
        }

        button {
            padding: 5px 10px;
            border: 1px solid black;
            transition: 250ms background-color;
        }

        button:hover {
            cursor: pointer;
            background-color: black;
            color: white;
        }

        button:disabled:hover {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .text-center {
            text-align: center;
        }

        .container {
            width: 100%;
            margin: 20px auto 0 auto;
        }

        #stepProgressBar {
            display: flex;
            margin: 0 auto;
            margin-bottom: 40px;
            justify-content: flex-start;
            align-items: flex-end;
        }

        @media only screen and (max-width: 768px) {
            #stepProgressBar {
                overflow-x: auto;
            }

            .step {
                min-width: 80px;
            }
        }

        .step {
            text-align: center;
            width: calc(100% / 8);
            position: relative;
        }

        .step:last-child::after {
            content: "";
            width: 0 !important;
        }

        .step-text {
            margin-bottom: 10px;
            padding: 10px;
            color: black;
            font-weight: bold;
            font-size: 0.85em;
        }

        .bullet {
            height: 40px;
            width: 40px;
            border-radius: 100%;
            border: 3px solid #ff6271;
            color: black;
            background-color: #ff6271;
            display: inline-block;
            position: relative;
            z-index: 3;
            transition: background-color 500ms;
            line-height: 40px;
        }

        .step.completed::after {
            content: '';
            position: absolute;
            height: 4px;
            width: 100%;
            background-color: #84cc95;
            right: -50%;
            bottom: 15px;
        }

        .step.here::after {
            content: '';
            position: absolute;
            height: 4px;
            width: 95%;
            background-color: #ffe48d;
            right: -50%;
            bottom: 15px;
            z-index: 3;
        }

        .step:last-child .bullet::after {
            content: none;
        }

        .step.completed .bullet {
            color: white;
            background-color: #84cc95;
            border: 2px solid #84cc95;
        }

        .step::after {
            content: '';
            position: absolute;
            height: 4px;
            width: 100%;
            background-color: #ff6271;
            right: -50%;
            bottom: 15px;
        }

        .progressbar li:first-child:after {
            content: none;
        }

        .step.here .bullet {
            color: #000000;
            background-color: #ffe48d;
            border-color: #ffe07a;
        }

        .here-after:after {
            color: #000000 !important;
            background-color: #ffe48d !important;
            border-color: #ffe07a !important;
        }
    </style>

    <div class="container-fluid">
        <div class="block-header">
            @if(\Illuminate\Support\Facades\Auth::user()->role=='Aday')
                <h1 class="home-page-title">
                    @lang('student/index.home_page')
                </h1>
            @else
                <h1 class="home-page-title">@lang('student/index.home_page')</h1>
            @endif
        </div>
        <div class="row clearfix">

            @if(\Illuminate\Support\Facades\Auth::user()->role=='Aday')
                <div class="container" style="background-color: whitesmoke; box-shadow: 0 0px 17px -3px rgba(0 ,0 ,0, 0.5)!important">
                    <h1 id="stepProgressBar-title" style="margin-bottom: 25px;">@lang('student/index.progress_header')</h1>
                    <div id="stepProgressBar-description">
                        <p>@lang('student/index.progress_red_info')</p>
                        <p>@lang('student/index.progress_yellow_info').</p>
                        <p>@lang('student/index.progress_green_info')</p>
                    </div>
                    <br>
                    <div id="stepProgressBar">
                        <div class="step">
                            <p class="step-text">@lang('student/index.progress_step_one')</p>
                            <div class="bullet">1</div>
                        </div>
                        <div class="step">
                            <p class="step-text">@lang('student/index.progress_step_two')</p>
                            <div class="bullet">2</div>
                        </div>
                        <div class="step">
                            <p class="step-text">@lang('student/index.progress_step_three')</p>
                            <div class="bullet">3</div>
                        </div>
                        <div class="step">
                            <p class="step-text">@lang('student/index.progress_step_four')</p>
                            <div class="bullet">4</div>
                        </div>
                        <div class="step">
                            <p class="step-text">@lang('student/index.progress_step_five')</p>
                            <div class="bullet">5</div>
                        </div>
                        <div class="step">
                            <p class="step-text">@lang('student/index.progress_step_six')</p>
                            <div class="bullet">6</div>
                        </div>
                        <div class="step">
                            <p class="step-text">@lang('student/index.progress_step_seven')</p>
                            <div class="bullet">7</div>
                        </div>
                        <div class="step">
                            <p class="step-text">@lang('student/index.progress_step_eight')</p>
                            <div class="bullet">8</div>
                        </div>
                    </div>


                </div>

            @endif


            <hr style="border: 0.5px solid;color:#057a55">
            @if(\App\Models\Student::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->first())
                @if(\App\Models\Appeals::where('student_id',\App\Models\Student::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->first()->id)->get()->count()>0)
                    @if(\App\Models\Appeals::where('student_id',\App\Models\Student::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->first()->id)->get()->count() == 1)
                        <div style="margin-left: 15px" class="block-header">
                            <h2>
                                @lang('student/index.application_status')
                            </h2>
                        </div>
                    @else
                        <div style="margin-left: 15px" class="block-header">
                            <h2>
                                @lang('student/index.applications_status')
                            </h2>
                        </div>
                    @endif
                    @foreach(\App\Models\Appeals::where('student_id',\App\Models\Student::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->first()->id)->get() as $appeal)
                        <div class="col-lg-6 col-md-6 col-sm-9 col-xs-12">
                            <div class="info-box hover-zoom-effect" style="min-height: 100px;">
                                @if($appeal->is_approved == 0)
                                    <div class="icon bg-blue-grey"> @elseif($appeal->is_approved == 1 || 3)
                                            <div class="icon bg-green"> @elseif($appeal->is_approved == 2)
                                                    <div class="icon bg-red"> @else
                                                            <div class="icon bg-spurple"> @endif
                                                                <i class="material-icons">@if($appeal->is_approved == 0)
                                                                        find_in_page @elseif($appeal->is_approved == 1)
                                                                        thumb_up_alt @elseif($appeal->is_approved == 2)
                                                                        thumb_down_alt @elseif($appeal->is_approved == 3)
                                                                        verified @else report_problem @endif</i>
                                                            </div>
                                                            <div class="content" style="padding: 10px 10px;">
                                                                <div class="text" style="font-size: 16px;margin-top: 0;">
                                                                    <strong>@lang('student/index.applied announcement') :</strong> {{\App\Models\Announcements::where('id',$appeal->announcements_id)->first()->name}}
                                                                </div>
                                                                @if($appeal->is_approved == 0)
                                                                    <div class="text bg-amber text-padding">
                                                                        @lang('student/index.applied_announcement_waiting')
                                                                    </div>
                                                                @elseif($appeal->is_approved == 1)
                                                                    <div class="text bg-cyan text-padding">
                                                                        @lang('student/index.applied_announcement_approved')
                                                                    </div>
                                                                @elseif($appeal->is_approved == 2)
                                                                    <div class="text bg-red text-padding">
                                                                        @lang('student/index.applied_announcement_rejected')
                                                                    </div>
                                                                @elseif($appeal->is_approved == 3)
                                                                    <div class="text bg-green text-padding">
                                                                        @lang('student/index.applied_announcement_approved_mail')
                                                                    </div>
                                                                @else
                                                                    <div class="text"></div>
                                                                @endif
                                                            </div>
                                                    </div>
                                            </div>
                                            @endforeach

                                        @endif

                                        @endif

                                        @if(\Illuminate\Support\Facades\Auth::user()->role=='Super Admin')
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="info-box hover-zoom-effect">
                                                    <div class="icon bg-yellow">
                                                        <i class="material-icons">face</i>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">@lang('student/index.total_super_admin')</div>
                                                        <div class="number count-to" data-from="0" data-to="{{$counterSuperAdmin}}" data-speed="1000" data-fresh-interval="20"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if(\Illuminate\Support\Facades\Auth::user()->role=='Admin' || \Illuminate\Support\Facades\Auth::user()->role=='Super Admin')

                                            <div id="general_statistics" class="container" style="margin-top: 35px;">
                                                <h3 style="text-decoration: underline">@lang('student/index.general_statistics')</h3><br>

                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="info-box bg-blue hover-expand-effect">
                                                        <div class="icon">
                                                            <i class="material-icons">bookmark</i>
                                                        </div>
                                                        <div class="content">
                                                            <div class="text">@lang('student/index.total_active_institute')</div>
                                                            <div class="number count-to" data-from="0" data-to="2" data-speed="1000" data-fresh-interval="20">257</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="info-box bg-light-blue hover-expand-effect">
                                                        <div class="icon">
                                                            <i class="material-icons">face</i>
                                                        </div>
                                                        <div class="content">
                                                            <div class="text">@lang('student/index.total_students_all_institue')</div>
                                                            <div class="number count-to" data-from="0" data-to="{{$counterAday}}" data-speed="1000" data-fresh-interval="20">257</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="info-box bg-cyan hover-expand-effect">
                                                        <div class="icon">
                                                            <i class="material-icons">face</i>
                                                        </div>
                                                        <div class="content">
                                                            <div class="text">@lang('student/index.total_applied_students')</div>
                                                            <div class="number count-to" data-from="{{$totalAppliedStudent}}" data-to="2" data-speed="1000" data-fresh-interval="20">257</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div id="institute_statistics" class="container" style="margin-top: 35px; margin-bottom: 35px;">
                                                <h3 style="text-decoration: underline">@lang('student/index.institute_statistics')</h3><br>

                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="info-box hover-zoom-effect">
                                                        <div class="icon bg-red">
                                                            <i class="material-icons">devices</i>
                                                        </div>
                                                        <div class="content">
                                                            <div class="text">@lang('student/index.total_institute_admins')</div>
                                                            <div class="number count-to" data-from="0" data-to="{{$counterInstituteAdmin}}" data-speed="1000" data-fresh-interval="20"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="info-box hover-zoom-effect">
                                                        <div class="icon bg-green">
                                                            <i class="material-icons">face</i>
                                                        </div>
                                                        <div class="content">
                                                            <div class="text">@lang('student/index.total_candidate_student')</div>
                                                            <div class="number count-to" data-from="0" data-to="{{$totalInstituteStudent}}" data-speed="1000" data-fresh-interval="20"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="info-box hover-zoom-effect">
                                                        <div class="icon bg-teal">
                                                            <i class="material-icons">face</i>
                                                        </div>
                                                        <div class="content">
                                                            <div class="text">@lang('student/index.total_applied_student')</div>
                                                            <div class="number count-to" data-from="0" data-to="{{$totalAppliedInstituteStudent}}" data-speed="1000" data-fresh-interval="20"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            @if(\App\Models\Student::all()->count()>0)
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="card">
                                                        <div class="header">
                                                            <h1 class="header-big-h-tags">@lang('student/index.applied_student_nations')</h1>
                                                        </div>
                                                        <div class="body row">
                                                            <div id="table-tr-bg-color" class="col-md-6 col-sm-12 table-responsive " style="border-right: 4px dashed grey;">
                                                                <h3 style="text-align: center;">@lang('student/index.master')</h3>
                                                                <table class="table table-hover dashboard-task-infos">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>@lang('student/index.nationality')</th>
                                                                        <th>@lang('student/index.number_of_students')</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @php $array = \App\Models\Student::where('institute', \Illuminate\Support\Facades\Auth::user()->institute)->whereHas('getEducationInfo', function ($q) {
                                                                            $q->where('is_master', 0);
                                                                                })
                                                                             ->select('nations', DB::raw('count(*) as total'))
                                                                             ->groupBy('nations')
                                                                             ->orderBy('total','desc')
                                                                             ->get();
                                                                            $sayac = 1 ;

                                                                    @endphp
                                                                    @foreach($array as $a)
                                                                        <tr>
                                                                            <td>{{$sayac++}}</td>
                                                                            <td>{{$a->nations}}</td>
                                                                            <td>{{$a->total}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div id="table-tr-bg-color" class="col-md-6 col-sm-12 table-responsive">
                                                                <h3 style="text-align: center;">@lang('student/index.doctorate')</h3>
                                                                <table class="table table-hover dashboard-task-infos">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>@lang('student/index.nationality')</th>
                                                                        <th>@lang('student/index.number_of_students')</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @php $i=0; @endphp
                                                                    @php $array = \App\Models\Student::where('institute', \Illuminate\Support\Facades\Auth::user()->institute)->whereHas('getEducationInfo', function ($q) {
                                                                        $q->where('is_master', 1);
                                                                    })
                                                                 ->select('nations', DB::raw('count(*) as total'))
                                                                 ->groupBy('nations')
                                                                 ->orderBy('total','desc')
                                                                 ->get();
                                                                $sayac = 1 ;

                                                                    @endphp
                                                                    @foreach($array as $a)

                                                                        <tr>
                                                                            <td>{{$sayac++}}</td>
                                                                            <td>{{$a->nations}}</td>
                                                                            <td>{{$a->total}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                            </div>

                            @if(\Illuminate\Support\Facades\Auth::user()->role=='Aday')

                                <div class="card card-warring" style="box-shadow: 0 2px 25px rgb(0 0 0 / 50%)!important">
                                    <div class="header bg-orange">
                                        <h2>@lang('student/index.warning')</h2>
                                    </div>
                                    <div class="body card-warring-body">
                                        <h4>@lang('student/index.warning_header')</h4>
                                        <ul>
                                            <li>
                                                <b>@lang('student/index.first'),</b> @lang('student/index.first_explanation')<strong style="color: green;">"@lang('student/index.success')"</strong> @lang('student/index.first_explanation_last')
                                            </li>
                                            <li>
                                                <b>@lang('student/index.second'),</b> @lang('student/index.second_explanation')
                                            </li>
                                            <li>
                                                <b>@lang('student/index.third'),</b> @lang('student/index.third_explanation') <strong>@lang('student/index.third_strong')</strong> @lang('student/index.third_explanation_last')
                                            </li>
                                            <li>
                                                <b>@lang('student/index.last'),</b> @lang('student/index.last_explanation')
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="close-card-warring">
                                    <span class="material-icons">
                                        highlight_off
                                    </span>
                                    </div>
                                </div>
                                @php
                                    $student = \App\Models\Student::where('user_id' , \Illuminate\Support\Facades\Auth::user()->id)->first();
                                    if(!is_null($student)){
                                    $isThereAppeals = count(\App\Models\Appeals::where('student_id' , $student->id)->get());
                                    }
                                @endphp
                                <div class="card" style="box-shadow: 0 2px 25px rgb(0 0 0 / 50%)!important">

                                    <div class="header bg-blue-grey">
                                        <h2>@lang('student/index.referencer_status')
                                            <small>@lang('student/index.referencer_status_small_one') </small>
                                            <small>
                                                <span class="col-red font-bold">@lang('student/index.referencer_red')</span>
                                                @lang('student/index.referencer_declined')<br>
                                                <span class="col-yellow font-bold">@lang('student/index.referencer_yellow')</span>
                                                @lang('student/index.referencer_waiting')<br>
                                                <span class="col-cyan font-bold">@lang('student/index.referencer_blue')</span>
                                                @lang('student/index.referencer_approved')
                                            </small>
                                        </h2>

                                    </div>
                                    <div class="body">
                                        <div style=" margin:auto ;width: 98%">

                                            @if(isset($student->getReference) && isset($student->getEducationInfo))

                                                <ul class="list-group">

                                                    <div style="width: 100%; display: flex; flex-wrap: wrap;" id="referencer">
                                                        @foreach($student->getReference as $reference)


                                                            <div
                                                                style="margin-left: auto;margin-right: auto;border-radius: 0 0 10px 10px; background-color: #eee; @if($student->getEducationInfo->is_master == 0 ) width: 49%; @else width:33.1%  @endif;display: inline-block">
                                                                <li class="list-group-item item-w"
                                                                    style="display: flex; justify-content: space-between; align-items: center;">
                                                                    <p>
                                                                        @lang('student/index.referencer_name') :
                                                                    </p>
                                                                    <p>
                                                                        {{$reference->referencer_name}}
                                                                    </p>
                                                                </li>
                                                                <li class="list-group-item item-w"
                                                                    style="display: flex; justify-content: space-between; align-items: center;">
                                                                    <p>
                                                                        @lang('student/index.referencer_name') :
                                                                    </p>
                                                                    <p>
                                                                        {{$reference->referencer_university_name}}
                                                                    </p>
                                                                </li>
                                                                <li class="list-group-item item-w"
                                                                    style="display: flex; justify-content: space-between; align-items: center;">
                                                                    <p>@lang('student/index.referencer_mail') :</p>
                                                                    <p>{{$reference->referencer_email}}</p>

                                                                </li>


                                                                @if($reference->is_confirmed == 0)
                                                                    <li class="list-group-item item-w"
                                                                        id="statusConfirmed"
                                                                        style="background-color: red !important; color: white !important;">
                                                                        @lang('student/index.referencer_mail_declined_explanation')
                                                                    </li>
                                                                @elseif($reference->is_confirmed == 1)
                                                                    <li class="list-group-item item-w"
                                                                        id="statusConfirmed"
                                                                        style="background-color: yellow !important">
                                                                        @lang('student/index.referencer_mail_waiting_explanation')
                                                                    </li>
                                                                @elseif($reference->is_confirmed == 2)
                                                                    <li class="list-group-item item-w"
                                                                        id="statusConfirmed"
                                                                        style="background-color: #32BCD4 !important; color: white !important;">
                                                                        @lang('student/index.referencer_mail_approved_explanation')
                                                                    </li>
                                                                @endif


                                                                <li class="list-group-item item-w"
                                                                    @if($isThereAppeals != 0) style="display: none" @endif >
                                                                    <div style="flex-direction:column;">
                                                                        <div style="width: 23% ; display: inline-block">
                                                                            <form style="width: 20%; "
                                                                                  action="{{route('student.info')}}">
                                                                                <input name="whereFrom" type="hidden"
                                                                                       value="1">
                                                                                <button type="submit"
                                                                                        class="btn btn-green"
                                                                                        style="
                                                            line-height: 25px;
                                                            font-size: 15px; "
                                                                                >@lang('student/index.update')
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                        <div style="display: inline-block">
                                                                            <button
                                                                                onclick="resendMail({{$reference->id}})"
                                                                                class="btn btn-white"
                                                                                style=" line-height: 25px; font-size: 15px;"
                                                                            >@lang('student/index.resend')
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </div>

                                                        @endforeach
                                                    </div>
                                                </ul>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @endsection

                            @section('script')

                                {{--    abdullah--}}
                                <script>
                                    //this script for open and close the warring

                                    let temp = true;

                                    $(".card-warring div.header.bg-orange").click(() => {
                                        if (temp) {
                                            $(".card-warring .card-warring-body").hide(300);
                                            $(".card-warring .close-card-warring span").addClass('warring-active');
                                            temp = !temp;
                                        } else {
                                            $(".card-warring .card-warring-body").show(300);
                                            $(".card-warring .close-card-warring span").removeClass('warring-active');
                                            temp = !temp;
                                        }
                                    });

                                    $(".card-warring .close-card-warring span").click(() => {
                                        if (temp) {
                                            $(".card-warring .card-warring-body").hide(300);
                                            $(".card-warring .close-card-warring span").addClass('warring-active');
                                            temp = !temp;
                                        } else {
                                            $(".card-warring .card-warring-body").show(300);
                                            $(".card-warring .close-card-warring span").removeClass('warring-active');
                                            temp = !temp;
                                        }
                                    });

                                </script>
                                {{--    abdullah--}}


                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                <script>
                                    function resendMail(id) {
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });

                                        var closeSwal = null;

                                        $.ajax({
                                            type: 'POST',
                                            url: '{{route('resendMail')}}',
                                            data: {id: id},

                                            beforeSend: function () {
                                                closeSwal = Swal.fire({
                                                    title: 'Please wait...',
                                                    position: 'center',
                                                    showConfirmButton: false,
                                                });
                                            },
                                            success: function () {
                                                closeSwal.close();
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Success',
                                                    text: 'Re send mail success',
                                                    showConfirmButton: true,
                                                });
                                            },
                                            error: function () {
                                                closeSwal.close();
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error',
                                                    text: 'Something went wrong!',
                                                    showConfirmButton: true,
                                                });
                                            }
                                        })
                                    }


                                    const previousBtn = document.getElementById('previousBtn');
                                    const nextBtn = document.getElementById('nextBtn');
                                    const finishBtn = document.getElementById('finishBtn');
                                    const content = document.getElementById('content');
                                    const bullets = [...document.querySelectorAll('.step')];

                                    const MAX_STEPS = 8;
                                    let currentStep = 1;
                                    /*
                                                                        nextBtn.addEventListener('click', () => {
                                                                            const currentBullet = bullets[currentStep - 1].classList.add('completed');
                                                                            currentStep++;
                                                                            previousBtn.disabled = false;
                                                                            if (currentStep == MAX_STEPS) {
                                                                                nextBtn.disabled = true;
                                                                                finishBtn.disabled = false;
                                                                            }
                                                                            content.innerText = 'Step Number' + currentStep;
                                                                        });

                                                                        previousBtn.addEventListener('click', () => {
                                                                            const previousBullet = bullets[currentStep - 2];
                                                                            previousBullet.classList.remove('completed');
                                                                            currentStep--;
                                                                            nextBtn.disabled = false;
                                                                            finishBtn.disabled = true;
                                                                            if (currentStep == 1) {
                                                                                previous.disabled = true;
                                                                            }
                                                                            content.innerText = 'Step Number' + currentStep;
                                                                        })*/

                                    console.clear();
                                    console.log('buradayım');
                                    let std_personal = {!! json_encode($is_student_personal) !!};
                                    console.log('Std personal:' + std_personal);

                                    //console.log(typeof std_personal);
                                    for (var i = 0; i <= std_personal; i++) {
                                        bullets[i].classList.add('completed');
                                        console.log(i);
                                    }
                                    bullets[std_personal + 1].classList.add('here');

                                    //const currentBullet = bullets.slice(0,currentStep - 1).classList.add('completed');

                                    console.clear()
                                    console.log($('.step .here').parent().prev().children().eq(1).addClass('here-after'));


                                </script>
@endsection
