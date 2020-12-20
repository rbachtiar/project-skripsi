@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Rule</h4>
                <button class="btn btn-success float-right" id="btn-tambah-gejala">Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="datatable-rule"></div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- modal tambah -->
<div class="modal fade" id="tambahRule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Rule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-rule" method="">
                <div class="form-group">
                    <select class="custom-select" id="select-gejala">
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gejala</label>
                    <textarea id="text-gejala" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Ya</label>
                    <select class="custom-select" id="select-ya-gejala">
                    </select>
                    <select class="custom-select" id="select-ya-penyakit">
                    </select>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Tidak</label>
                    <select class="custom-select" id="select-tidak-gejala">
                    </select>
                    <select class="custom-select" id="select-tidak-penyakit">
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" id="submit-rule">
                    <input type="hidden" id="id">
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade" id="editRule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Rule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-rule" method="">
                <div class="form-group">
                    <select class="custom-select" id="select-gejala-edit">
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gejala</label>
                    <textarea id="text-gejala-edit" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Ya</label>
                    <select class="custom-select" id="select-ya-gejala-edit">
                    </select>
                    <select class="custom-select" id="select-ya-penyakit-edit">
                    </select>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Tidak</label>
                    <select class="custom-select" id="select-tidak-gejala-edit">
                    </select>
                    <select class="custom-select" id="select-tidak-penyakit-edit">
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" id="submit-rule-edit">
                    <input type="hidden" id="id-edit">
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('ajax')
<script>
    $(document).ready( function () {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        loadRule();
        function loadRule() {
            $('#datatable-rule').load('{{url('a/rule/datatable')}}', function() {
                $('#rule-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{url('a/rule/table')}}',
                        type: 'GET'
                    },
                    columns: [
                        {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                        {data: 'kode_gejala',name: 'kode_gejala'},
                        {data: 'gejala',name: 'gejala'},
                        {data: 'ya',name: 'ya'},
                        {data: 'tidak',name: 'tidak'},
                        {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
                    ]
                });
            });
        }

        //show modal gejala
        $('body').on('click', '#btn-tambah-gejala', function(e) {
            e.preventDefault();
            $("#select-gejala").empty();
            $("#select-ya-gejala").empty();
            $("#select-ya-penyakit").empty();
            $("#select-tidak-gejala").empty();
            $("#select-tidak-penyakit").empty();
            $.ajax({
                type: 'GET',
                url: '{{url('a/rule/data')}}',
                contentType: false,
                processData: false,
                success: function(data) {
                    //get value gejala
                    $("#select-gejala").change(function(){
                        var kodeGejala = $(this).children("option:selected").val();
                        $.ajax({
                            type: 'GET',
                            url: '{{url('a/rule/dg')}}' + '/' + kodeGejala,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                $("#text-gejala").val(data.gejala[0].gejala + '?');
                            }
                        });
                    });
                    // console.log(data.gejala);
                    // console.log(data.penyakit);
                    $("#select-gejala").append('<option value="" selected>Pilih Gejala</option>');
                    $("#select-ya-penyakit").append('<option value="" selected>Pilih Penyakit</option>');
                    $("#select-ya-gejala").append('<option value="" selected>Pilih Gejala</option>');
                    $("#select-tidak-penyakit").append('<option value="" selected>Pilih Penyakit</option>');
                    $("#select-tidak-gejala").append('<option value="" selected>Pilih Gejala</option>');
                    $('#tambahRule').modal('show');
                    var gejala = data.gejala;
                    for (let index = 0; index < gejala.length; index++) {
                        $("#select-gejala").append('<option value="'+gejala[index].kode_gejala+'">'+gejala[index].kode_gejala+'</option>');
                    }
                    for (let index = 0; index < gejala.length; index++) {
                        $("#select-ya-gejala").append('<option value="'+gejala[index].kode_gejala+'">'+gejala[index].kode_gejala+'</option>');
                    }
                    for (let index = 0; index < gejala.length; index++) {
                        $("#select-tidak-gejala").append('<option value="'+gejala[index].kode_gejala+'">'+gejala[index].kode_gejala+'</option>');
                    }
                    var penyakit = data.penyakit;
                    for (let index = 0; index < penyakit.length; index++) {
                        $("#select-tidak-penyakit").append('<option value="'+penyakit[index].kode_penyakit+'">'+penyakit[index].kode_penyakit+'</option>');
                    }
                    for (let index = 0; index < penyakit.length; index++) {
                        $("#select-ya-penyakit").append('<option value="'+penyakit[index].kode_penyakit+'">'+penyakit[index].kode_penyakit+'</option>');
                    }
                }
            });
        });
        //tambah rule
        $('body').on('click', '#submit-rule', function(e) {
            e.preventDefault();
            var formData = new FormData();
            //ambil data penyakit
            var kodeGejala = $("#select-gejala").children("option:selected").val();
            var yaGejala = $("#select-ya-gejala").children("option:selected").val();
            var yaPenyakit = $("#select-ya-penyakit").children("option:selected").val();
            var tidakGejala = $("#select-tidak-gejala").children("option:selected").val();
            var tidakPenyakit = $("#select-tidak-penyakit").children("option:selected").val();
            var gejala = $("#text-gejala").val();
            formData.append('kode_gejala', kodeGejala);
            formData.append('gejala', gejala);
            if(yaGejala != "") {
                formData.append('ya', yaGejala);
            } else if(yaPenyakit != "") {
                formData.append('ya', yaPenyakit);
            }
            if(tidakGejala != "") {
                formData.append('tidak', tidakGejala);
            } else if(tidakPenyakit != "") {
                formData.append('tidak', tidakPenyakit);
            }
            // console.log(gejala);
            $.ajax({
                type: 'POST',
                url: '{{url('a/rule')}}',
                data: formData, 
                contentType: false,
                processData: false,
                success: function(data) {
                    // console.log(data.store);
                    if(data.store == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: "Sukses",
                            text: 'Berhasil Menambahkan Rule',
                            timer: 1200,
                            showConfirmButton: false
                        });
                        $('#tambahRule').modal('hide');
                        $("#form-rule").trigger("reset");
                        loadRule();
                    }
                }
            });
        });

        //edit rule
        $('body').on('click', '.btn-edit-rule', function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $("#select-gejala-edit").empty();
            $("#select-ya-gejala-edit").empty();
            $("#select-ya-penyakit-edit").empty();
            $("#select-tidak-gejala-edit").empty();
            $("#select-tidak-penyakit-edit").empty();
            $.ajax({
                type: 'GET',
                url: '{{url('a/rule/data')}}',
                contentType: false,
                processData: false,
                success: function(data) {
                    //get value gejala
                    $("#select-gejala-edit").change(function(){
                        var kodeGejala = $(this).children("option:selected").val();
                        $.ajax({
                            type: 'GET',
                            url: '{{url('a/rule/dg')}}' + '/' + kodeGejala,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                $("#text-gejala-edit").val(data.gejala[0].gejala + '?');
                            }
                        });
                    });
                    // console.log(data.gejala);
                    // console.log(data.penyakit);
                    $("#select-gejala-edit").append('<option value="" selected>Pilih Gejala</option>');
                    $("#select-ya-penyakit-edit").append('<option value="" selected>Pilih Penyakit</option>');
                    $("#select-ya-gejala-edit").append('<option value="" selected>Pilih Gejala</option>');
                    $("#select-tidak-penyakit-edit").append('<option value="" selected>Pilih Penyakit</option>');
                    $("#select-tidak-gejala-edit").append('<option value="" selected>Pilih Gejala</option>');
                    $('#editRule').modal('show');
                    var gejala = data.gejala;
                    for (let index = 0; index < gejala.length; index++) {
                        $("#select-gejala-edit").append('<option value="'+gejala[index].kode_gejala+'">'+gejala[index].kode_gejala+'</option>');
                    }
                    for (let index = 0; index < gejala.length; index++) {
                        $("#select-ya-gejala-edit").append('<option value="'+gejala[index].kode_gejala+'">'+gejala[index].kode_gejala+'</option>');
                    }
                    for (let index = 0; index < gejala.length; index++) {
                        $("#select-tidak-gejala-edit").append('<option value="'+gejala[index].kode_gejala+'">'+gejala[index].kode_gejala+'</option>');
                    }
                    var penyakit = data.penyakit;
                    for (let index = 0; index < penyakit.length; index++) {
                        $("#select-tidak-penyakit-edit").append('<option value="'+penyakit[index].kode_penyakit+'">'+penyakit[index].kode_penyakit+'</option>');
                    }
                    for (let index = 0; index < penyakit.length; index++) {
                        $("#select-ya-penyakit-edit").append('<option value="'+penyakit[index].kode_penyakit+'">'+penyakit[index].kode_penyakit+'</option>');
                    }
                    $.ajax({
                        type: 'GET',
                        url: '{{url('a/rule/edit')}}' + '/' + id,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            // $("textarea#text-gejala-edit").html(data.gejala[0].gejala + '?');
                            $("#select-gejala-edit").val(data.data[0].kode_gejala)
                            $("#select-ya-gejala-edit").val(data.data[0].ya)
                            $("#select-ya-penyakit-edit").val(data.data[0].ya)
                            $("#select-tidak-gejala-edit").val(data.data[0].tidak)
                            $("#select-tidak-penyakit-edit").val(data.data[0].tidak)
                        }
                    });
                }
            });
        });

    });
     
</script>
@endsection