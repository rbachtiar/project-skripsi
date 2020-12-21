@extends('master')
@section('content')
    <section class="welcome_area clearfix" id="home">
        <section class="olv-aboutUs-area section_padding_100_0">
            <div class="container">
                <div class="row align-items-center"> 
                   <head>
                      <link rel="stylesheet" href="{{asset('user/main.css')}}">
                      <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">
                   </head>               
                  <div class="limiter">
                     <div class="container-table100">
                        <div class="wrap-table100">
                           <div class="table100 ver6 m-b-110">
                              <table data-vertable="ver6">
                               <thead>
                                <tr class="row100 head">
                                 <th class="column100 column1" data-column="column1">NO</th>
                                 <th class="column100 column2" data-column="column2" style="width: 175px;">NAMA PERNYAKIT</th>
                                 <th class="column100 column3" data-column="column3">DESKRIPSI PERNYAKIT</th>
                                </tr>
                               </thead>
                               <tbody>
                                  <?php 
                                  $no = 1;
                                  ?>
                                  @foreach($data as $d)
                                <tr class="row100">
                                 <td class="column100 column1" data-column="column1">{{$no}}</td>
                                 <td class="column100 column2" data-column="column2">{{$d->penyakit}}</td>
                                 <td class="column100 column3" data-column="column3">{{$d->info}}</td>					   
                                </tr>
                                {{$no++}}
                                 @endforeach
                               </tbody>
                              </table>
                              </div>
                           
                        
                        </div>
                     </div>
                  </div>
                </div>
            </div>
    </section>       
        
@endsection