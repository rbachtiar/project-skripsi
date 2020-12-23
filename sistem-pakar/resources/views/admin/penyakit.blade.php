@extends('admin.master')
@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Penyakit</h4>
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#tambahPenyakit">Tambah</button>
              </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <div id="datatable-penyakit"></div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

    <!-- tambah Modal -->
    <div class="modal fade" id="tambahPenyakit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Penyakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-penyakit" method="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Kode Penyakit" name="kode_penyakit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Penyakit" name="penyakit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Info Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Info Penyakit" name="info" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Solusi Penyakit</label>
                    <textarea type="text" class="form-control" id="solusi"> </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" id="submit-gejala">
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade" id="editPenyakit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Penyakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-penyakit-edit" method="">
            <div class="form-group">
                    <label for="exampleInputEmail1">Kode Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Kode Penyakit" name="kode_penyakit_edit" disabled>
                    <input type="hidden" id="id">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Penyakit" name="penyakit_edit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Info Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Penyakit" name="info_edit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Solusi Penyakit</label>
                    <textarea type="text" class="form-control" id="solusi-edit"> </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" id="edit-penyakit">
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
        loadPenyakit();
        function loadPenyakit() {
            $('#datatable-penyakit').load('{{url('a/penyakit/datatable')}}', function() {
                $('#penyakit-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{url('a/penyakit/table')}}',
                        type: 'GET'
                    },
                    columns: [
                        {data: 'kode_penyakit',name: 'kode_penyakit'},
                        {data: 'penyakit',name: 'penyakit'},
                        {data: 'info',name: 'info'},
                        {data: 'solusi',name: 'solusi'},
                        {data: 'aksi',name: 'aksi',searchable: false,orderable: false}
                    ]
                });
            });
        }

        //tambah penyakit
        $('body').on('submit', '#form-penyakit', function(e) {
            e.preventDefault();
            // var data = $("#form-penyakit").serialize();
            var formData = new FormData();
            // var kode = $("#id").val();
            formData.append('kode_penyakit', $("input[name=kode_penyakit]").val());
            formData.append('penyakit', $("input[name=penyakit]").val());
            formData.append('info', $("input[name=info]").val());
            formData.append('solusi', tinymce.get('solusi').getContent());
                $.ajax({
                    type: 'POST',
                    url: '{{url('a/penyakit')}}',
                    data: formData, 
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if(data.store == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: "Sukses",
                                text: 'Berhasil Menambahkan Penyakit',
                                timer: 1200,
                                showConfirmButton: false
                            });
                            $("#tambahPenyakit").modal("hide");
                            $("#form-penyakit").trigger("reset");
                            loadPenyakit();
                        }
                    }
                });
        });
        //delete
        $('body').on('click', '.btn-delete-penyakit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // console.log(id)
            Swal.fire({
                title: 'Anda yakin ingin menghapus Penyakit?'+
                'Anda tidak dapat membatalkan aksi ini!',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `No`,
                denyButtonText: `Delete`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (!result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: "{{url('a/penyakit/delete')}}" + '/' + id,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if(data.delete == 'success') {
                                Swal.fire('Deleted!', '', 'success')
                                loadPenyakit();
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Penyakit tidak dihapus', '', 'info')
                }
            })
        });

        //edit penyakit
        $('body').on('click', '.btn-edit-penyakit', function(e) {
            e.preventDefault();
            $('#editPenyakit').modal('show');
            var id = $(this).data('id');
            $("#id").val(id);
            // console.log(id);
            $.ajax({
                type: 'GET',
                url: '{{url('a/penyakit/edit')}}' + '/' +id,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#editPenyakit').modal('show');
                    $("input[name=kode_penyakit_edit]").val(data.data[0].kode_penyakit);
                    $("input[name=penyakit_edit]").val(data.data[0].penyakit);
                    $("input[name=info_edit]").val(data.data[0].info);
                    tinymce.get('solusi-edit').setContent(data.data[0].solusi);
                }
            });
        });

        //update 
        $('body').on('submit', '#form-penyakit-edit', function(e) {
            e.preventDefault();
            var formData = new FormData();
            var kode = $("#id").val();
            formData.append('penyakit', $("input[name=penyakit_edit]").val());
            formData.append('info', $("input[name=info_edit]").val());
            formData.append('solusi', tinymce.get('solusi-edit').getContent());
            $.ajax({
                type: 'POST',
                url: '{{url('a/penyakit/update')}}' + '/' + kode,
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data.update);
                    if(data.update == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Berhasil update Penyakit!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                        $("#form-penyakit-edit").trigger("reset");
                        $('#editPenyakit').modal('hide');
                        loadPenyakit();
                    }
                }
            });
        });

    });
     
</script>
@endsection
