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
    <div class="modal fade" id="editKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{url('kelas')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama-edit" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" id="submit">
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
                var host = window.location.origin;
                $('#gejala-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/berita/data',
                        type: 'GET'
                    },
                    columns: [
                        {data: 'DT_RowIndex',name: 'DT_RowIndex',searchable: false},
                        {data: 'judul',name: 'judul'},
                        {
                            data: 'gambar',
                            name: 'gambar',
                            "render": function(data, type, row) {
                                return '<img src=" ' + host + '/'+ data + ' " style="height:100px;width:100px;"/>';
                            },
                            searchable: false
                        },
                        {data: 'name',name: 'name'},
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
                        }
                    }
                });
            }
        });

        $('body').on('click', '.btn-delete-kelas', function(e) {
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
                        url: 'kelas/delete/' + id,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if(data.delete == 'success') {
                                Swal.fire('Deleted!', '', 'success')
                                deleteSensor(id)
                                setTimeout(reload, 3000);
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('kelas tidak dihapus', '', 'info')
                }
            })
        });

        //edit kelas
        $('body').on('click', '.btn-edit-kelas', function(e) {
            e.preventDefault();
            $('#editKelas').modal('show');
            var id = $(this).data('id');
            $("#id").val(id);
            console.log(id);
            $.ajax({
                type: 'GET',
                url: '/kelas/edit/' + id,
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data.success == true) {
                        $('#editKelas').modal('show');
                        console.log(data.data[0].room_name)
                        $("#nama-edit").val(data.data[0].room_name);
                    }
                }
            });
        });

        //update 
        $('body').on('click', '#submit', function(e) {
            e.preventDefault();
            var id = $("#id").val();
            var nama = $("#nama-edit").val();
            $.ajax({
                type: 'GET',
                url: '/kelas/update/' + id,
                data: {nama:nama},
                success: function(data) {
                    if(data.update == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Berhasil update kelas!',
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
