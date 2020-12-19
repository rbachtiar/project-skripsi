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
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Kode Gejala" name="kode_penyakit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Gejala" name="penyakit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Info Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Gejala" name="info" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Solusi Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Gejala" name="solusi" required>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-penyakit">
            <div class="form-group">
                    <label for="exampleInputEmail1">Kode Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Kode Gejala" name="kode_penyakit_edit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Gejala" name="penyakit_edit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Info Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Gejala" name="info_edit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Solusi Penyakit</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Gejala" name="solusi_edit" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" id="edit-penyakit">
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

        //tambah gejala
        $('body').on('submit', '#form-penyakit', function(e) {
            e.preventDefault();
            var data = $("#form-penyakit").serialize();
                $.ajax({
                    type: 'POST',
                    url: '{{url('a/penyakit')}}',
                    data: data, 
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
                }
            });
        });

        //update 
        $('body').on('submit', '#submit', function(e) {
            e.preventDefault();
            var id = $("#id").val();
            var nama = $("#nama-edit").val();
            $.ajax({
                type: 'GET',
                url: '/penyakit/update/' + id,
                data: {nama:nama},
                success: function(data) {
                    if(data.update == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Berhasil update Penyakit!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                        location.reload();
                    }
                }
            });
        });

    });
     
</script>
@endsection
