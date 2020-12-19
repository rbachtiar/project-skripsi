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
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-gejala" method="">
                <div class="form-group">
                    <select class="custom-select" id="select-penyakit">
                    </select>
                </div>
                <div class="form-group">
                    <div class="row" id="add-gejala">
                        <div class="col-md-10 mb-3">
                            <select class="custom-select" id="select-gejala">
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <button type="button" class="btn-primary form-control" id="add"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
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
            $('#datatable-rule').load('{{url('a/gejala/datatable')}}', function() {
                $('#gejala-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{url('a/gejala/table')}}',
                        type: 'GET'
                    },
                    columns: [
                        {data: 'kode_gejala',name: 'kode_gejala'},
                        {data: 'gejala',name: 'gejala'},
                        {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
                    ]
                });
            });
        }

        //show modal gejala
        $('body').on('click', '#btn-tambah-gejala', function(e) {
            e.preventDefault();
            $("#select-gejala").empty();
            $.ajax({
                type: 'GET',
                url: '{{url('a/rule/gejala')}}',
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#select-gejala").append('<option selected>Pilih Gejala</option>');
                    $('#tambahRule').modal('show');
                    var gejala = data.data;
                    for (let index = 0; index < gejala.length; index++) {
                        $("#select-gejala").append('<option value="'+gejala[index].kode_gejala+'">'+gejala[index].kode_gejala+'</option>');
                    }
                    //append penyakit
                    $.ajax({
                        type: 'GET',
                        url: '{{url('a/rule/penyakit')}}',
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $("#select-penyakit").empty();
                            $("#select-penyakit").append('<option selected>Pilih Penyakit</option>');
                            var penyakit = data.data;
                            for (let index = 0; index < gejala.length; index++) {
                                $("#select-penyakit").append('<option value="'+penyakit[index].kode_penyakit+'">'+penyakit[index].kode_penyakit+'</option>');
                            }
                        }
                    });
                    //end append
                }
            });
        });
        
        //tambah gejala
        var i=0;  
        $('#add').click(function(){  
              
            var gejala = $("select#select-gejala").children("option:selected").val();
            // console.log(gejala);
            $('#add-gejala').append('<div class="col-md-10 mb-3">'+
                                            '<input type="text" class="form-control" aria-describedby="emailHelp" name="gejala[]" id="'+i+'" value="'+gejala+'">'+
                                        '</div>'+
                                        '<div class="col-md-2 mb-3">'+
                                            '<button type="button" class="btn-primary form-control btn_remove" id="'+i+'"><i class="fas fa-times"></i></i></button>'+
                                        '</div>'); 
            i++;
        });  
        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id"); 
            console.log(button_id);
            $("#"+button_id+"").remove();
            $(this).remove();
        });  
        $('body').on('click', '#submit-rule', function(e) {
            e.preventDefault();
            //ambil data penyakit
            var penyakit = $("select#select-penyakit").children("option:selected").val();
            var gejala = [];
            for (let index = 0; index < i; index++) {
                gejala[index] = $("#"+index+"").val();
            }
            console.log(gejala);
            $.ajax({
                    type: 'POST',
                    url: '{{url('a/rule')}}',
                    data: {gejala:gejala, penyakit:penyakit}, 
                    success: function(data) {
                        if(data.store == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: "Sukses",
                                text: 'Berhasil Menambahkan Rule',
                                timer: 1200,
                                showConfirmButton: false
                            });
                            $('#tambahRule').modal('hide');
                            $("#form-gejala").trigger("reset");
                        }
                    }
                });
        });

    });
     
</script>
@endsection