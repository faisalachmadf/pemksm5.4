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
                                    <hr/>
                                    <p> {!! $kelembagaan->isi !!}</p>
                                    
                                    <hr/><h6>Bagikan :</h6><br/>
                                    
                                    <!-- Share Media Sosial dan Print -->

                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Kelembagaan', [$kelembagaan->id_katbagian]) }}'>
                                    <img src='http://syam.eu.org/icon/fb.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Kelembagaan', [$kelembagaan->id_katbagian]) }}'>
                                    <img src='http://syam.eu.org/icon/tw.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Kelembagaan', [$kelembagaan->id_katbagian]) }}'>
                                     <img src='http://syam.eu.org/icon/g.jpg' alt='' width='30' height='30'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>

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
