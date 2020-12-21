@extends('master')
@section('content')
<section class="welcome_area clearfix" id="home">
        <section class="olv-aboutUs-area">
            <div class="container">
                <div class="row align-items-center"> 
                   <head>
                      <link rel="stylesheet" href="{{asset('user/main.css')}}">
                      <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">
                   </head>               
                  <div class="limiter">
                     <div class="container-table100">
                        <div class="wrap-table100">
                            <form action="{{url('pre')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label text-dark" style="font-size: 20px;">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama" required> 
                                    </div>
                                </div> 
                                
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label text-dark" style="font-size: 20px;">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="alamat" required>
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label text-dark" style="font-size: 20px;">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                </div> 
                                <center>
                                <input type="submit" class="btn btn-primary" value="Mulai">
                                </center>
                            </form>
                        </div>
                     </div>
                  </div>
                </div>
            </div>
    </section>      
@endsection