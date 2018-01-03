@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">{{ strtoupper($katbagian ? $katbagian->judul : 'BAGIAN') }}</h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-8 mag-innert-left">
                <div class="banner-bottom-left-grids">
                    <br/>
                    

                    <!--/Show dari Kelembagaan-->
                    <div class="technology">
                        @if (count($kelembagaans))
                        @foreach($kelembagaans as $kelembagaan)
                        <div class="editor-pics">
                            <div class="item-details">

                                <h2 class="inner two">{{ $kelembagaan->judul }}</h2>
                                <div class="td-post-date two">
                                    <i class="glyphicon glyphicon-time"></i>Upload tanggal :{{ date('d M Y', strtotime($kelembagaan->tanggal)) }}
                                   <hr/></div>
                                    <center><img src="{{ asset('image/kelembagaan/thumbnail/'.$kelembagaan->gambar) }}" class="img-responsive " alt="{{ $kelembagaan->judul }}"/></center>
                                    <br>
                                    <p> {!! $kelembagaan->isi !!}</p>
                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endforeach
                        
                          @else
                   <h3>Belum ada Data</h3>
                @endif
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--Komentar-->
               
            </div>
            @include('frame_depan.kanan', @$kanan ? $kanan : [])
        </div>
    </div>   
@endsection
