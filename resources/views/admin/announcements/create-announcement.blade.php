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



</style>



@section('content')



    <form id="regForm" name="createAnnouncementForm" action="{{route('announcements-create')}}" method="POST">

        @csrf
        <h1>Announcement (İlan)</h1>
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
            <div class="col-md-6 col-sm-12">
                Name
                <input id="name" value="{{old('name')}}" placeholder="Announcement Name (For admin panel)"  name="name"></p>
            </div>
            <div class="col-md-6 col-sm-12">
                Title
                <input id="title" value="{{old('title')}}" placeholder="Title"  name="title">
            </div>
        </div>

        <div class="row">
            <br>
            <div id="rDateAlert" class="col-md-6 col-sm-12 announcement-alert alert alert-danger nomargin">Entered release date is incorrect</div>
            <div id="dDateAlert" class="col-md-6 col-sm-12 announcement-alert alert alert-danger nomargin">Entered due date is incorrect</div>
            <div class="col-md-6 col-sm-12">
                Release Date<br>
                <input id="rDate" value="{{old('release_date')}}" class="dateMask" placeholder="Ex: 2020-02-31 14:41" type="datetime-local" id="release_date" name="release_date">
            </div>
            <div class="col-md-6 col-sm-12">
                Due Date<br>
                <input id="dDate" value="{{old('due_date')}}" class="dateMask" placeholder="Ex: 2020-02-31 14:41" type="datetime-local" id="due_date" name="due_date">
            </div>
        </div>
        <div class="row">
            <br>
            <div id="contentAlert" class="col-xs-12 announcement-alert alert alert-danger nomargin">Content must be filled out</div>
            <div class="col-xs-12">
                <br>Content<br>
                <textarea id="content" class="col-xs-12" rows="10" placeholder="Content"  name="content">{{old('content')}}</textarea></p>
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

