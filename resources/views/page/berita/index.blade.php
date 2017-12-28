@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">BERITA</h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-8 mag-innert-left">
                <div class="banner-bottom-left-grids">

                    Kategori Berita:
                    <div class="clearfix"></div>
                    <a href="{{ route('Berita') }}" class="btn btn-default btn-katberita">
                        <h6>Semua Berita</h6>
                    </a>
                    <a href="{{ route('Berita', ['popular']) }}" class="btn btn-danger btn-katberita">
                        <h6>Berita Populer</h6>
                    </a>
                    @foreach($katberitas as $key => $katberita)
                    <a href="{{ route('Berita', [$katberita->slug]) }}" class="btn btn-katberita {{ generateBtnClass($key) }}">
                        <h6>{{ $katberita->name }}</h6>
                    </a>
                    @endforeach
                    <hr/>

                    <!--/start-Technology-->
                    <div class="technology">
                        @foreach($beritas as $berita)
                        <div class="editor-pics">
                            @if($dibaca)
                                <div class="col-md-12 item-pic text-justify">
                                    <img src="{{ asset('image/berita/'.$berita->gambar) }}" class="img-responsive img-banner" alt="{{ $berita->judul }}"/>
                                    <br/><br/>
                                    <h3 class="inner two">
                                        <a href="{{ route('Berita', [$berita->katberita->slug, $berita->slug]) }}">{{ $berita->judul }}</a>
                                    </h3>

                                 <div class="td-post-date two">
                                        <i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($berita->tanggal)) }} <i class="glyphicon glyphicon-user"></i> {{ generateUser($berita->user) }} <i class=""></i><i class="glyphicon glyphicon-eye-open"></i> {{ $berita->dibaca }}<i class=""></i><i class="glyphicon glyphicon-list-alt"></i>{{ $berita->katberita->name }}
                                    
                                </div>
                                    <hr/>
                                    {!! $berita->isi !!}
                                </div>
                            @else



                                <div class="col-md-5 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$berita->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $berita->judul }}"/>
                                </div>
                                <div class="col-md-7 item-details">
                                    <h4 style="text-transform: uppercase;">
                                        <a href="{{ route('Berita', [$berita->katberita->slug, $berita->slug]) }}">{{ $berita->judul }}</a>
                                    </h4>
                                      <div class="td-post-date two"><h6>
                                        <i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($berita->tanggal)) }} <i class="glyphicon glyphicon-user"></i> {{ generateUser($berita->user) }} <i class="glyphicon glyphicon-eye-open"></i> {{ $berita->dibaca }}  <i class=""></i><i class="glyphicon glyphicon-list-alt"></i>{{ $berita->katberita->name }}
                                    </h6> </div>

                                    <hr/>
                                    
                                </div>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                        
                        @endforeach
                        {{ $beritas->links() }}
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--Komentar-->
               
            </div>
            @include('frame_depan.kanan', @$kanan ? $kanan : [])
        </div>
    </div>   
@endsection
