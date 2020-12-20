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
                              <span id="gejala">
                                 <!-- Bau mulut tak sedap ? -->
                              </span>
                           </center>
                        </div>
                           <a href="#" class="btn btn-1" id="btn-ya">
                           <input type="hidden" id="kode-ya">
                               <svg>
                                 <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                               </svg>
                              YA
                           </a>
                           <a href="#" class="btn btn-1" id="btn-tidak">
                           <input type="hidden" id="kode-tidak">
                               <svg>
                                 <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                               </svg>
                              TIDAK
                             </a>
                       
                     <!-- <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="DIAGNOSA"> -->
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
      loadKonsultasi("G13");
      //tampil konsultasi
      function loadKonsultasi(params)
      {
         // var params = "G1";
         $("#gejala").empty();
         $.ajax({
            type: 'GET',
            url: '{{url('konsultasi/data')}}' + '/' + params,
            success: function(data) {
               console.log(data.data);
               $("#gejala").append(data.data[0].gejala);
               $("#kode-ya").val(data.data[0].ya);
               $("#kode-tidak").val(data.data[0].tidak);
            }
         });
      }

      $('body').on('click', '#btn-ya', function(e) {
         e.preventDefault();
         // console.log('ok');
         var params = $("#kode-ya").val();
         $.ajax({
               type: 'GET',
               url: '{{url('konsultasi/data')}}' + '/' + params,
               success: function(data) {
                  if(data.next == "P") {
                     console.log(data.data);
                  } else if(data.next == "G"){
                     loadKonsultasi(params);
                  }
               }
            });
      });
      //button tidak
      $('body').on('click', '#btn-tidak', function(e) {
         e.preventDefault();
         var params = $("#kode-tidak").val();
            $.ajax({
               type: 'GET',
               url: '{{url('konsultasi/data')}}' + '/' + params,
               success: function(data) {
                  if(data.next == "P") {
                     console.log(data.data);
                  } else if(data.next == "G"){
                     loadKonsultasi(params);
                  }
               }
            });
      });

   });
</script>
@endsection