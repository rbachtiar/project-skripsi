@extends('master')
@section('content')
<section class="elements-area section_padding_100" style="margin-top: 115px;">
      <center style="margin-left: 10%;">
      <div class="container">
          <div class="row">
              <div class="col-10 ">
                  <div class="accordions mb-100 justify-content-center" id="accordion" role="tablist" aria-multiselectable="true">
                     <center>
                        <head>
                           <link rel="stylesheet" href="{{asset('user/css/qw.css')}}">
                        </head>	
                     <form class="col-12 " method="POST" action="proses.php" style="width: 100vh;">
                       
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                           <div class="input-group-text">
                           </div>
                          </div>
                          <center style="margin-bottom: 5%;">
                              <span>
                                 Bau mulut tak sedap ?
                              </span>
                           </center>
                        </div>
                           <a href="#" class="btn btn-1">
                               <svg>
                                 <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                               </svg>
                              YA
                           </a>
                           <a href="#" class="btn btn-1">
                               <svg>
                                 <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                               </svg>
                              TIDAK
                             </a>
                       
                     <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="DIAGNOSA">
                     </form>
                     </center>
                  </div>
              </div>              
          </div>
      </div>
      </center>
  </section>
@endsection
@section('ajax')
<script>
   $(document).ready( function () {
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      //store
      $('body').on('submit', '#form-tambah-inventory', function(e) {
            e.preventDefault();
            var formData = new FormData();
            var nama = $('input[name=nama]').val();
            var label = $('input[name=label]').val();
            var tahun = $('input[name=tahun]').val();
            var jumlah = $('input[name=jumlah]').val();
            var sumberDana = $('input[name=sumber_dana]').val();
            var keterangan = $('input[name=keterangan]').val();
            var gambar = $('#gambar')[0].files[0];
            var kondisi = $('select[name=kondisi] option').filter(':selected').val()
            var idRoom = $('select[name=kelas] option').filter(':selected').val()
            formData.append('nama', nama);
            formData.append('label', label);
            formData.append('tahun', tahun);
            formData.append('jumlah', jumlah);
            formData.append('kondisi', kondisi);
            formData.append('sumber_dana', sumberDana);
            formData.append('keterangan', keterangan);
            formData.append('id_room', idRoom);
            formData.append('gambar', gambar);
            console.log(idRoom);
            $.ajax({
                type: 'POST',
                url: 'inventory',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                  if(data.success == true) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Berhasil tambah data!',
                      showConfirmButton: false,
                      timer: 1200
                    })
                    $("#tambahInventory").modal("hide");
                    $("#form-tambah-inventory").trigger("reset");
                    location.reload();
                  }
                }
            });
        });

   });
</script>
@endsection