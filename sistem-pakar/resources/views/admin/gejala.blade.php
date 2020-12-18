@extends('admin.master')
@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Kelas</h4>
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#tambahGejala">Tambah</button>
              </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable-gejala"></div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

    <!-- tambah Modal -->
    <div class="modal fade" id="tambahGejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-gejala">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Gejala</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Kode Gejala" name="kode_gejala" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gejala</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Gejala" name="gejala" required>
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
    <div class="modal fade" id="editGejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-edit-gejala">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Gejala</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Kode Gejala" name="kode_gejala_edit" id="kode_gejala" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gejala</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Gejala" name="gejala_edit" id="gejala" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" id="edit-gejala">
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
        loadGejala();
        function loadGejala() {
            $('#datatable-gejala').load('{{url('a/gejala/datatable')}}', function() {
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

        //tambah gejala
        $('body').on('click', '#submit-gejala', function(e) {
            e.preventDefault();
            var data = $("#form-gejala").serialize();
            var kode = $('input[name=kode_gejala]').val();
            var gejala = $('input[name=gejala]').val();
            if(kode == "" || gejala == ""){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Kode dan Gejala tidak boleh kosong!',
                        })
            } else {
                $.ajax({
                    type: 'POST',
                    url: '{{url('a/gejala')}}',
                    data: data, 
                    success: function(data) {
                        if(data.store == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: "Sukses",
                                text: 'Berhasil Menambahkan Gejala',
                                timer: 1200,
                                showConfirmButton: false
                            });
                            $("#tambahGejala").modal("hide");
                            $("#form-gejala").trigger("reset");
                            loadGejala();
                        }
                    }
                });
            }
        });
        //delete
        $('body').on('click', '.btn-delete-gejala', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // console.log(id)
            Swal.fire({
                title: 'Anda yakin ingin menghapus kelas?'+
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
                        url: "{{url('a/gejala/delete')}}" + '/' + id,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if(data.delete == 'success') {
                                Swal.fire('Deleted!', '', 'success')
                                loadGejala();
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('kelas tidak dihapus', '', 'info')
                }
            })
        });

        //edit gejala
        $('body').on('click', '.btn-edit-gejala', function(e) {
            e.preventDefault();
            $('#editGejala').modal('show');
            var kode = $(this).data('id');
            $("#id").val(id);
            // console.log(id);
            $.ajax({
                type: 'GET',
                url: '{{url('a/gejala/edit')}}' + '/' + kode,
                contentType: false,
                processData: false,
                success: function(data) {
                        $('#editGejala').modal('show');
                        $("#kode_gejala").val(data.data[0].kode_gejala);
                        $("#gejala").val(data.data[0].gejala);
                }
            });
        });

        //update 
        $('body').on('click', '#edit-gejala', function(e) {
            e.preventDefault();
            var data = $("#form-edit-gejala").serialize();
            console.log(data);
            var kode = $('input[name=kode_gejala_edit]').val();
            var gejala = $('input[name=gejala_edit]').val();
            if(kode == "" || gejala == ""){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Kode dan Gejala tidak boleh kosong!',
                        })
            } else {
                $.ajax({
                    type: 'POST',
                    url: '{{url('a/gejala/update')}}' +  '/' + kode,
                    data: data, 
                    success: function(data) {
                        if(data.update == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: "Sukses",
                                text: 'Berhasil Edit Gejala',
                                timer: 1200,
                                showConfirmButton: false
                            });
                            $("#editGejala").modal("hide");
                            $("#form-edit-gejala").trigger("reset");
                            loadGejala();
                        }
                    }
                });
            }
        });

    });
     
</script>
@endsection
