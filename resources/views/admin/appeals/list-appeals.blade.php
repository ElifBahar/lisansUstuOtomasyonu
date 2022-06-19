@extends('layouts.app')

@section('content')

    <style>
        /* modal width & size increase*/
        @media (min-width: 768px){
            .modal-dialog {
                width: auto !important;
                max-width: 60% !important;
                min-width: 30% !important;
                margin: 30px auto;
            }
            .modal-dialog form{
                height: calc(100% - 110px);
            }
            .modal .modal-content .modal-body {
                height: 100%;
            }
            .form-group {
                height: 100%;
            }
            .form-group textarea {
                height: 90% !important;
                resize: none;
            }
            .modal-content{
                height: 80vh;
            }
        }

        .swal2-title{
            font-size: 4rem;
        }

        .swal2-content{
            font-size: 1.5rem;
        }

        .swal2-styled{
            font-size: 2rem !important;
        }

        .denemeSwal{
            background-color: red;
        }

    </style>

    <br>
    <h2>{{\App\Models\Announcements::where('id',$id)->first()->name}}   </h2>

    <hr style="border: 0.5px solid;color:#057a55">
    <br><br>

    <a class="btn btn-primary" href="{{route('appeals-confirmed-list-page', $id)}}">Onaylanan Başvurular</a>
    <a class="btn btn-danger" href="{{route('appeals-declined-list-page', $id)}}">Reddedilen Başvurular</a>

    <form action="" method="POST">
        @csrf
        <div class="col-12" id="appeal_department" style="margin: 10px 0;">
            <span class="material-icons">
                arrow_drop_down
            </span>
        @if(\Illuminate\Support\Facades\Auth::user()->institute == 'Science Sciences')
        <select style=" font-size: 16px" onchange="this.form.submit()" name="department" id="request_department_of" class="btn-group bootstrap-select form-control open">
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

            @else(\Illuminate\Support\Facades\Auth::user()->institute == 'Social Sciences')
                <select style="padding: 0 0 0 3%; font-size: 16px" onchange="this.form.submit()" name="department" id="request_department_of" class="btn-group bootstrap-select form-control show-tick open">
                    <option value='Hepsi' @if($department == 'Hepsi') selected @endif >All</option>
                    <option value="Tarih" @if($department=="Tarih") selected @endif >Tarih (History)</option>
                    <option value="Türk Dili ve Edebiyatı" @if($department=="Türk Dili ve Edebiyatı") selected @endif >Türk Dili ve Edebiyatı (Turkish Language and Literature)</option>
                    <option value="Sosyoloji" @if($department=="Sosyoloji") selected @endif >Sosyoloji (Sociology)</option>
                    <option value="Coğrafya" @if($department=="Coğrafya") selected @endif >Coğrafya (Geography)</option>
                    <option value="Felsefe ve Din Bilimleri" @if($department=="Felsefe ve Din Bilimleri") selected @endif >Felsefe ve Din Bilimleri (Philosophy and Religious Studies)</option>
                    <option value="Temel İslam Bilimleri" @if($department=="Temel İslam Bilimleri") selected @endif >Temel İslam Bilimleri (Basic Islamic Sciences)</option>
                    <option value="Sağlık Yönetim" @if($department=="Sağlık Yönetim") selected @endif >Sağlık Yönetim (Health Management)</option>
                    <option value="Teknoloji ve Bilgi Yönetimi" @if($department=="Teknoloji ve Bilgi Yönetimi") selected @endif >Teknoloji ve Bilgi Yönetimi (Technology and Information Management)</option>
                    <option value="İletişim Bilimleri" @if($department=="İletişim Bilimleri") selected @endif >İletişim Bilimleri (Communication Sciences)</option>
                    <option value="İslam Tarihi ve Sanatları" @if($department=="İslam Tarihi ve Sanatları") selected @endif >İslam Tarihi ve Sanatları (Islamic History and Arts (Master Only) )</option>
                    <option value="Batı Dilleri ve Edebiyatları" @if($department=="Batı Dilleri ve Edebiyatları") selected @endif >Batı Dilleri ve Edebiyatları (Western Languages and Literatures (Master Only) )</option>
                    <option value="Music" @if($department=="Music") selected @endif >Müzik (Music (Master Only) )</option>
                    <option value="Çağdaş Türk Lehçeleri ve Edebiyatları" @if($department=="Çağdaş Türk Lehçeleri ve Edebiyatları") selected @endif >Çağdaş Türk Lehçeleri ve Edebiyatları Contemporary Turkish Dialects and
                        Literatures (Master Only) )</option>
                    <option value="Girişimcilik ve Yenilik Yönetimi 2. Öğretim" @if($department=="Girişimcilik ve Yenilik Yönetimi 2. Öğretim") selected @endif >Girişimcilik ve Yenilik Yönetimi 2. Öğretim (Entrepreneurship and Innovation
                        Management 2nd Education (Master Only) )</option>
                    <option value="İlköğretim Din Kültürü ve Ahlak Bilgisi Eğitimi" @if($department=="İlköğretim Din Kültürü ve Ahlak Bilgisi Eğitimi") selected @endif >İlköğretim Din Kültürü ve Ahlak Bilgisi Eğitimi (Primary Education Religious
                        Culture and Moral Knowledge Education (Master Only) )</option>
                    <option value="İşletme" @if($department=="İşletme") selected @endif >İşletme (Business (Master Only) )</option>
                    <option value="İktisat" @if($department=="İktisat") selected @endif >İktisat (Economy)</option>
                    <option value="Kamu Yönetimi" @if($department=="İktisat") selected @endif >Kamu Yönetimi (Public Administration (Master Only) )</option>
                    <option value="Maliye" @if($department=="Maliye") selected @endif >Maliye (Finance (Master Only) )</option>
                </select>
        @endif
        </div>
    </form>

    <div style="margin-top: 30px;">

        <table id="appeals" class="display nowrap dataTable cell-border" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>İsim</th>
                <th>Durum</th>
                <th>Reddedilme Açıklaması</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>İsim</th>
                <th>Durum</th>
                <th>Reddedilme Açıklaması</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
        </table>

    </div>

    <!-- Modal -->
    <div class="modal fade in" id="decline-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header" style="background-color: #FB483A; border-bottom: 1px solid #e5e5e5 !important;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="color: whitesmoke">Başvuruyu Reddet (Decline Appeal)</h3>
                </div>
                <form>

                    <div class="modal-body" style="padding: 2%;">
                        <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>

                        <div class="form-group">
                            <label for="description">Açıklama:</label><br>
                            <textarea  style="width: 100%; height: 200px;" type="text" name="name" id="description" required></textarea>
                            <small>Buraya yazacağınız açıklama öğrenciye reddedilme açıklaması halinde mail olarak gönderilecektir.</small><br>

                        </div>
                        <input type="hidden" name="appeal-id" id="appeal-id" value="">

                    </div>

                    <div class="modal-footer" style="background-color: #de3f32; border-top: 1px solid #e5e5e5 !important;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button class="btn btn-primary appeal-decline-submit">Gönder</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!--Make and send decline form-->

    <script>
        appealsTable = null;

        function showModal(id){
            document.getElementById('appeal-id').value = id;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".appeal-decline-submit").click(function(e){

            e.preventDefault();

            var description = $("textarea#description").val();
            var id = $('input#appeal-id').val();


            Swal.fire({
                title: 'Are you sure?',
                html: 'Are you sure you want to decline?',
                showDenyButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Decline',
                denyButtonText: 'Cancel'
            })
            .then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('decline-appeal') }}",
                        data: {description: description, id: id},
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
                                    title: 'HATA!',
                                    html: data.errors,
                                    position: 'center',
                                    showConfirmButton: true,
                                    confirmButtonText: "Tamam"
                                });
                                $('#decline-modal').modal('hide');
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Başarılı',
                                    html: data.success,
                                    position: 'center',
                                    showConfirmButton: true,
                                    confirmButtonText: "Tamam"
                                });
                                $('#decline-modal').modal('hide');
                                appealsTable.ajax.reload();
                            }
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata!',
                                html: 'Bilinmeyen bir hata oluştu!',
                                position: 'center',
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                            $('#decline-modal').modal('hide');
                            appealsTable.ajax.reload();
                        }
                    });
                }
            });

        });
    </script>

    <!--Accept Ajax-->
    <script>

        function acceptAppeal(id){

            Swal.fire({
                icon: 'question',
                title: 'Emin misiniz?',
                text: 'Bu öğrenciyi onaylanmış başvurulara taşımak istediğinizden emin misiniz?',
                width: '40%',
                showDenyButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Onayla',
                denyButtonText: 'İptal'

            })
                .then((result) => {
                    if (result.isConfirmed) {


                        $.ajax({
                            type: 'POST',
                            url: "{{ route('accept-appeal') }}",
                            data: {id: id},
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
                                    $('#decline-modal').modal('hide');
                                } else {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        html: data.success,
                                        position: 'center',
                                        showConfirmButton: true,
                                        confirmButtonText: "Okay"
                                    });
                                    $('#decline-modal').modal('hide');
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
                                $('#decline-modal').modal('hide');
                            }

                        });
                    }
                });

        }
    </script>


    <!--Datatable-->
    <script type="text/javascript">

        $(document).ready(function() {
            appealsTable = $('#appeals').DataTable( {
                order: [
                    [0,'DESC']
                ],
                processing: true,
                serverSide: true,
                ajax: '{!! route('appeals-table-fetch',[$id,$department]) !!}',
                columns: [

                    {data: 'id'},
                    {data: 'name'},
                    {data: 'status'},
                    {data: 'decline_description'},
                    {data: 'accept'},
                    {data: 'see'},
                    {data: 'decline'}

                ]
            } );
        } );

    </script>

   <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


@endsection
