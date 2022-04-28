@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    * {
        box-sizing: border-box;
    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    select {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }

    .announcement-alert{
        visibility: hidden;
    }

    .ck-editor__editable:not(.ck-editor__nested-editable) {
        min-height: 400px;
    }

    .switch-field {
        display: flex;
        margin-bottom: 36px;
        overflow: hidden;
    }

    .switch-field input {
        position: absolute !important;
        clip: rect(0, 0, 0, 0);
        height: 1px;
        width: 1px;
        border: 0;
        overflow: hidden;
    }

    .switch-field label {
        background-color: #e4e4e4;
        color: rgba(0, 0, 0, 0.6);
        font-size: 14px;
        line-height: 1;
        text-align: center;
        padding: 8px 16px;
        margin-right: -1px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
        transition: all 0.1s ease-in-out;
    }

    .switch-field label:hover {
        cursor: pointer;
    }

    .switch-field input:checked + label {
        background-color: #a5dc86;
        box-shadow: none;
    }

    .switch-field label:first-of-type {
        border-radius: 4px 0 0 4px;
    }

    .switch-field label:last-of-type {
        border-radius: 0 4px 4px 0;
    }

    [type="radio"]:checked + label:after,
    [type="radio"]:checked + label:active,
    [type="radio"]:checked + label:focus,
    [type="radio"]:not(:checked) + label:after,
    [type="radio"]:not(:checked) + label:before, [type="radio"]:not(:checked) + label:after{
        background: transparent !important;
        border: none !important;
    }

    .fix-lab{
        text-align: center !important;
        line-height: 10px !important;
    }

</style>
@section('content')

    <form id="regForm" name="updateAnnouncementForm" action="{{route('announcements-update')}}" method="POST">

        @csrf
        <h1>İlan Güncelleme</h1>
        @if(isset($errors))
            @if(count($errors)>0)
                <div align="center" class="col-sm-12 alert alert-danger nomargin">
                    @foreach($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
                </div>
        @endif
    @endif
    <!-- One "tab" for each step in the form: -->

        <div class="row">
            <div id="nameAlert" class="col-md-6 col-sm-12 announcement-alert alert alert-danger nomargin">Name must be filled out</div>
            <div id="titleAlert" class="col-md-6 col-sm-12 announcement-alert alert alert-danger nomargin">Title must be filled out</div>
            <p style="text-align: center;margin: 0">Status</p>

            <div class="switch-field" style="justify-content: center">
                <input type="radio" @if($announcement->status == 1) checked @endif id="radio-one" name="status" value="1" checked/>
                <label class="fix-lab" for="radio-one">Active</label>
                <input type="radio" @if($announcement->status == 0) checked @endif id="radio-two" name="status" value="0" />
                <label class="fix-lab" for="radio-two">Passive</label>
            </div>
            <div class="col-md-6 col-sm-12">
                Name
                <input id="name" value="{{$announcement->name}}" name="name"></p>
                <input id="id" value="{{$announcement->id}}" name="announcement_id" type="hidden">
            </div>
            <div class="col-md-6 col-sm-12">
                Title
                <input id="title" value="{{$announcement->title}}" name="title">
            </div>
        </div>

        <div class="row">
            <br>
            <div id="rDateAlert" class="col-md-6 col-sm-12 announcement-alert alert alert-danger nomargin">Entered release date is incorrect</div>
            <div id="dDateAlert" class="col-md-6 col-sm-12 announcement-alert alert alert-danger nomargin">Entered due date is incorrect</div>
            <div class="col-md-6 col-sm-12">
                Release Date<br>
                <input id="rDate" value="{{date("Y-m-d"."\T"."H:i:s", strtotime($announcement->release_date))}}" class="dateMask" type="datetime-local" id="release_date" name="release_date">
            </div>
            <div class="col-md-6 col-sm-12">
                Due Date<br>
                <input id="dDate" value="{{date("Y-m-d"."\T"."H:i:s", strtotime($announcement->due_date))}}" class="dateMask" placeholder="Ex: 2020-02-31 14:41" type="datetime-local" id="due_date" name="due_date">
            </div>
        </div>
        <div class="row">
            <br>
            <div id="contentAlert" class="col-xs-12 announcement-alert alert alert-danger nomargin">Content must be filled out</div>
            <div class="col-xs-12">
                <br>Content<br>
                <textarea id="content" class="col-xs-12" rows="10" placeholder="Content"  name="content">{{$announcement->content}}</textarea></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <br>
                <select class="col-xs-12" name="type">
                    <option value="{{\App\Helpers\Enums::DOCTORATE_ENGLISH}}">Doctorate English</option>
                    <option value="{{\App\Helpers\Enums::DOCTORATE_TURKISH}}">Doctorate Turkish</option>
                    <option value="{{\App\Helpers\Enums::GRADUATE_ENGLISH}}">Graduate English</option>
                    <option value="{{\App\Helpers\Enums::GRADUATE_TURKISH}}">Graduate Turkish</option>
                </select></p>
                <h2 class="m-t--5"></h2>


            </div>
        </div>

        <div style="overflow:auto;">
            <div style="margin-top:20px;float:right;">
                <button type="submit" id="submitButton">Submit</button>
            </div>
        </div>

    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>

        function validateForm() {
            var name = document.getElementById("name").value;
            var title = document.getElementById("title").value;
            var institute = document.getElementById("institute")
            var rDate = document.getElementById("rDate").value;
            var dDate = document.getElementById("dDate").value;
            var content = document.getElementById("content").value;
            if (name == "") {
                document.getElementById("nameAlert").style.visibility = "visible";
                return false;
            }else if(title == ""){
                document.getElementById("titleAlert").style.visibility = "visible";
                return false;
            }else if(institute == ""){
                document.getElementById("instituteAlert").style.visibility = "visible";
            }else if(rDate == "" || rDate.substring(4,5)!="-" || rDate.substring(7,8)!="-" || rDate.substring(13,14)!=":"){
                document.getElementById("rDateAlert").style.visibility = "visible";
                return false;
            }else if(dDate == "" || dDate.substring(4,5)!="-" || dDate.substring(7,8)!="-" || dDate.substring(13,14)!=":"){
                document.getElementById("dDateAlert").style.visibility = "visible";
                return false;
            }else if(content == ""){
                document.getElementById("content").style.visibility = "visible";
                return false;
            }
        }
    </script>

    <script type="text/javascript" src="{{asset('/plugins/ckeditor5/build/ckeditor.js')}}"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( 'textarea#content' ), {

                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'indent',
                        'outdent',
                        '|',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo'
                    ]
                },
                language: 'en',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',

            } )
            .then( editor => {
                editor.getData(); // -> '<p>Foo!</p>'
            } )
            .catch( error => {
                console.error( error );
            } );

    </script>






@endsection

