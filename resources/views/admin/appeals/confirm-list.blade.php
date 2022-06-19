@extends('layouts.app')

@section('content')
    <div style="margin: 20px;">

        <center><h4>Confirmed Appeals</h4></center>
        <br><br>
        <a class="btn btn-danger" href="{{route('appeals-declined-list-page', $id)}}">Declined Appeals</a>
        <form action="" method="POST">
            @csrf
            <select style="float: right" onchange="this.form.submit()" name="department" id="request_department_of">
                <option value='Hepsi' @if($department == 'Hepsi') selected @endif >All</option>
                <option value="Su Ürünleri Yetiştiriciliği" @if($department=="Su Ürünleri Yetiştiriciliği") selected @endif >Aquaculture</option>
                <option value="Mimarlık" @if($department=="Mimarlık") selected @endif >Architecture</option>
                <option value="Otomotiv Mühendisliği" @if($department=="Otomotiv Mühendisliği") selected @endif >Automotive engineering</option>
                <option value="Biyoloji" @if($department=="Biyoloji") selected @endif > Biology</option>
                <option value="Biyoteknoloji  (Disiplinlerarası)" @if($department=="Biyoteknoloji  (Disiplinlerarası)") selected @endif >Biotechnology (Interdisciplinary)</option>
                <option value="İş ve Mühendislik Yönetimi (Disiplinlerarası)" @if($department=="İş ve Mühendislik Yönetimi (Disiplinlerarası)") selected @endif >Business and Engineering Management (Interdisciplinary)</option>
                <option value="Kimya Mühendisliği" @if($department=="Kimya Mühendisliği") selected @endif >Chemical Engineering</option>
                <option value="Kimya" @if($department=="Kimya") selected @endif >Chemistry</option>
                <option value="İnşaat Mühendisliği" @if($department=="İnşaat Mühendisliği") selected @endif >Civil Engineering</option>
                <option value="İnşaat Mühendisliği Teknolojileri" @if($department=="İnşaat Mühendisliği Teknolojileri") selected @endif >Civil Engineering Technologies</option>
                <option value="Bilgisayar Mühendisliği" @if($department=="Bilgisayar Mühendisliği") selected @endif > Computer Engineering</option>
                <option value="Savunma Teknolojileri (Disiplinlerarası)" @if($department=="Savunma Teknolojileri (Disiplinlerarası)") selected @endif >Defense Technologies (Interdisciplinary)</option>
                <option value="Adli Bilişim Mühendisliği" @if($department=="Adli Bilişim Mühendisliği") selected @endif > Digital Forensic Engineering</option>
                <option value="Ekobilişim (Disiplinlerarası)" @if($department=="Ekobilişim (Disiplinlerarası)") selected @endif >Ecoinformatics (Interdisciplinary)</option>
                <option value="Elektrik-Elektronik Mühendisliği" @if($department=="Elektrik-Elektronik Mühendisliği") selected @endif >Electrical Electronics Engineering</option>
                <option value="Enerji Sistemleri Mühendisliği" @if($department=="Enerji Sistemleri Mühendisliği") selected @endif >Energy Systems Engineering</option>
                <option value="Çevre Mühendisliği" @if($department=="Çevre Mühendisliği") selected @endif >Environmental Engineering</option>
                <option value="Su Ürünleri Temel Bilimler" @if($department=="Su Ürünleri Temel Bilimler") selected @endif >Fisheries Basic Sciences</option>
                <option value="Su Ürünleri Avlama ve İşleme Teknolojisi" @if($department=="Su Ürünleri Avlama ve İşleme Teknolojisi") selected @endif >Fisheries Fishing and Processing Technologys</option>
                <option value="Jeodezi ve Coğrafi Bilgi Teknolojileri (Disiplinlerarası)" @if($department=="Jeodezi ve Coğrafi Bilgi Teknolojileri (Disiplinlerarası)") selected @endif >Geodesy and Geographic Information Technologies (Interdisciplinary)</option>
                <option value="Jeoloji Mühendisliği" @if($department=="Jeoloji Mühendisliği") selected @endif >Geological Engineering</option>
                <option value="Matematik" @if($department=="Matematik") selected @endif >Mathematics</option>
                <option value="Makine Mühendisliği" @if($department=="Makine Mühendisliği") selected @endif >Mechanical engineering</option>
                <option value="Makine Mühendisliği Teknolojileri" @if($department=="Makine Mühendisliği Teknolojileri") selected @endif >Mechanical Engineering Technologies</option>
                <option value="Mekatronik Mühendisliği" @if($department=="Mekatronik Mühendisliği") selected @endif >Mechatronic Engineering</option>
                <option value="Metalurji ve Malzeme Mühendisliği" @if($department=="Metalurji ve Malzeme Mühendisliği") selected @endif >Metallurgy and Materials Engineering</option>
                <option value="Metalurji ve Malzeme Mühendisliği Teknolojileri" @if($department=="Metalurji ve Malzeme Mühendisliği Teknolojileri") selected @endif >Metallurgy and Materials Engineering Technologies</option>
                <option value="Fizik" @if($department=="Fizik") selected @endif >Physics</option>
                <option value="Yazılım Mühendisliği" @if($department=="Yazılım Mühendisliği") selected @endif >Software Engineering</option>
                <option value="İstatistik" @if($department=="İstatistik") selected @endif >Statistics</option>
            </select>
        </form>
        <br><br>
        <table id="confirmed-appeals" class="display nowrap dataTable cell-border" style="width:100%">
            <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
        </table>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="decline-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Decline Appeal</h4>
                </div>
                <form>

                    <div class="modal-body">
                        <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>


                        <div class="form-group">
                            <textarea  style="width: 100%; height: 200px;" type="text" name="name" id="description" required></textarea>
                        </div>
                        <input type="hidden" name="appeal-id" id="appeal-id" value="">


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary appeal-decline-submit">Send</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <!--Accept Ajax-->
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var fileSwal = null;

        function acceptAppeal(id){

            Swal.fire({
                title: 'Are you sure?',
                html: 'Are you sure you want to approve this student?',
                showDenyButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Approve',
                denyButtonText: 'Cancel'
            })
            .then((result) => {
                if (result.isConfirmed) {
                    fileSwal = Swal.fire({
                        title: 'Please select pdf file',
                        html: '<div style="width: 100%;" align="center">\n' +
                            '        <form id="addConfirmFileForm" enctype="multipart/form-data">\n' +
                            '            <input required id="confirmFile" name="confirmFile" type="file">\n' +
                            //'<input type="hidden" id="confirmFileId" name="confirmFileId">' +
                            '        </form>\n' +
                            //'<button onclick="addConfirmFile()" class="btn btn-primary d-inline">Add File</button>' +
                            '    </div>',
                        showDenyButton: true,
                        showConfirmButton: true,
                        confirmButtonText: 'Approve',
                        denyButtonText: 'Cancel'
                    })
                        .then((result) => {
                            if (result.isConfirmed) {

                                var formD = new FormData(document.getElementById('addConfirmFileForm'));
                                formD.append('id',id);

                                $.ajax({
                                    type: 'POST',
                                    url: "{{ route('accept-appeal-second') }}",
                                    data: formD,
                                    dataType: "json",
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    enctype: 'multipart/form-data',
                                    beforeSend: function (){
                                        Swal.fire({
                                            title: 'Please wait...',
                                            position: 'center',
                                            showConfirmButton:false,
                                        });
                                    },
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
                                        }else if(data.errors == 'Failed'){
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error!',
                                                html: "Mail couldn't send, progress cancelled",
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
                                            appealsTable.ajax.reload();
                                        }
                                    },
                                    error: function (data) {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
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
            });

        }
    </script>

    <script type="text/javascript">
        appealsTable = null;
        $(document).ready(function() {
            appealsTable = $('#confirmed-appeals').DataTable( {
                order: [
                    [0,'DESC']
                ],
                processing: true,
                serverSide: true,
                ajax: '{!! route('appeals-confirmed-table-fetch', [$id,$department]) !!}',
                columns: [

                    {data: 'id'},
                    {data: 'name'},
                    {data: 'accept'},
                    {data: 'see'}


                ]
            } );
        } );

    </script>


    <script>
        function addConfirmFile(){
            var formData = new FormData(document.getElementById('addConfirmFileForm'));



            $.ajax({
                url: '{!! route('add_confirm_file') !!}',
                type: 'POST',
                data: formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                enctype: 'multipart/form-data',
                success: function (data) {
                    if (data.success == 'false') {

                    } else {
                        $('#confirmFileId').val(data.id);
                    }
                },
                error: function (data) {

                }
            });

        }

        function deleteConfirmFile(id){
            $.ajax({
                url: '{!! route('delete_confirm_file') !!}',
                type: 'POST',
                data: {id: id},
                success: function (){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        html: 'Successfully deleted',
                        confirmButtonText: 'Okay'
                    });
                },
                error: function (){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: 'Unknown error',
                        confirmButtonText: 'Okay'
                    });
                }
            });
        }
    </script>

    <script type="text/javascript">
        confirmFilesTable = null;
        $(document).ready(function() {
            confirmFilesTable = $('#confirm-files').DataTable( {
                order: [
                    [0,'DESC']
                ],
                processing: true,
                serverSide: true,
                ajax: '{!! route('accept-files-fetch') !!}',
                columns: [

                    {data: 'id'},
                    {data: 'original_file_name'},
                    {data: 'see'},
                    {data: 'delete'}


                ]
            } );
        } );

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@endsection
