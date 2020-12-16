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