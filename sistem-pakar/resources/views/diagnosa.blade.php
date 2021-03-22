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
                           <div class="table100 ver6 m-b-110">
                              <table data-vertable="ver6" style="margin-top: 80px;">
                               <tbody>
                                <tr class="row100">
                                 <td class="column100" data-column="column1" style="width: 300px; font-size: 20px">Nama</td>
                                 <td class="column100 column2" data-column="column2" style="font-size: 20px;">{{$data[0]->nama}}</td>
                                </tr>
                                <tr class="row100">
                                 <td class="column100 column1" data-column="column1" style="font-size: 20px;">Gejala</td>
                                 <td class="column100 column2" data-column="column2" style="font-size: 20px;">
                                 @foreach($gejalaUser as $g)
                                 {{$g->gejala}} <br>
                                 @endforeach
                                 </td>
                                </tr>
                                <tr class="row100">
                                 <td class="column100 column1" data-column="column1" style="font-size: 20px;">Penyakit</td>
                                 <td class="column100 column2" data-column="column2" style="font-size: 20px;">{{ isset($data[0]->penyakit) ? $data[0]->penyakit : "Penyakit tidak diketahui"}}</td>
                                </tr>
                                <tr class="row100">
                                 <td class="column100 column1" data-column="column1" style="font-size: 20px;">Info</td>
                                 <td class="column100 column2" data-column="column2" style="font-size: 20px;">{{ isset($data[0]->penyakit) ? $data[0]->info : "-"}}</td>
                                </tr>
                                <tr class="row100">
                                 <td class="column100 column1" data-column="column1" style="font-size: 20px;">Solusi</td>
                                 <td class="column100 column2" data-column="column2" style="font-size: 20px;">{!! isset($data[0]->penyakit) ? $data[0]->solusi : "-"!!}</td>
                                </tr>
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