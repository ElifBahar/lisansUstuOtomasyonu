@extends('layouts.app')

@section('content')

    <style>

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

    <div style="margin: 20px;">
        <br>
        <h2>İLAN LİSTESİ</h2>
        <hr style="border: 0.5px solid;color:#057a55">
        <br><br>

        <a class="btn btn-primary" href="{{route('announcements-create-page')}}">Yeni İlan</a>
        <a href="{{route('export-announcements')}}" class="btn btn-success">Excel'e Dönüştür</a>



        <br><br><br><br><br>

        <div class="row">
            <p style="text-align: center;margin: 0; text-decoration: underline; font-weight: bold; font-size: 20px; margin-bottom: 15px;">İLAN DURUMU :</p>
            <div class="switch-field" style="justify-content: center">
                <input type="radio" checked="" id="radio-one" name="status" value="1">
                <label class="fix-lab" for="radio-one" onclick="pasif()"><strong>İNAKTİF İLANLAR</strong></label>
                <input type="radio" id="radio-two" name="status" value="0">
                <label class="fix-lab" for="radio-two" onclick="aktif()"><strong>AKTİF İLANLAR</strong></label>
            </div>
        </div>
        <table id="announcements" class="display nowrap dataTable cell-border" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>İsim</th>
                <th>Yayınlanma Tarihi</th>
                <th>Bitiş Tarihi</th>
                <th>Tür</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>İsim</th>
                <th>Yayınlanma Tarihi</th>
                <th>Bitiş Tarihi</th>
                <th>Tür</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>

    <script type="text/javascript">

        function pasif(){
            announcementsTable.ajax.url ('{{route('announcements-pasif')}}');

            announcementsTable.ajax.reload();
        }

        function aktif(){
            announcementsTable.ajax.url('{{route('announcements-aktif')}}') ;
            announcementsTable.ajax.reload();
        }


        announcementsTable = null;
        $(document).ready(function() {
            announcementsTable = $('#announcements').DataTable( {
                order: [
                  [0,'DESC']
                ],
                processing: true,
                serverSide: true,
                ajax: '{!! route('announcements-table-fetch') !!}',
                columns: [

                    {data: 'id'},
                    {data: 'name'},
                    {data: 'release_date'},
                    {data: 'due_date'},
                    {data: 'announcement_type'},
                    {data: 'button'},
                    {data: 'update'},
                    {data: 'delete'}

                ],
                "language":{
                    "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/tr.json"
                }
            } );
        } );

    </script>


    <script>

        $(document).ready(function (){
            if('{{session('success')}}' == '1'){
                Swal.fire({
                    title: "UPDATED",
                    text: "Announcement updated successfully!",
                    icon: "success",
                    button: "Okay",
                })
            }
        });


        function deleteAnnouncement(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            Swal.fire({
                title: 'Are you sure you want to delete?',
                showDenyButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'Cancel'
            })
                .then((result) => {
                    if (result.isConfirmed) {


                        $.ajax({
                            type: 'POST',
                            url: "{{ route('announcements-delete') }}",
                            data: {id: id},
                            success: function (data) {
                                if (data.success == 'false') {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        html: data.errors,
                                        position: 'center',
                                        showConfirmButton: true,
                                        confirmButtonText: "Okay"
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        html: data.success,
                                        position: 'center',
                                        showConfirmButton: true,
                                        confirmButtonText: "Okay"
                                    });
                                    announcementsTable.ajax.reload();
                                }
                            },
                            error: function (data) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    html: 'Operation failed',
                                    position: 'center',
                                    showConfirmButton: true,
                                    confirmButtonText: "Okay"
                                });
                            }

                        });
                    }
                });

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@endsection
