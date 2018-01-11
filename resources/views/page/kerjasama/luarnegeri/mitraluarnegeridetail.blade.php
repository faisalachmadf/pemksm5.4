@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">
                MITRA KERJA SAMA LUAR NEGERI<br/>
                {{ strtoupper(@$mitra->katmitraln->name) }}
            </h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-12">
                <!--/Show dari Mitra-->
                <div class="technology">
                    @if($mitra)
                        <div class="col-md-12 item-pic2 text-justify">
                            <img src="{{ asset('image/mitraln/'.$mitra->gambar) }}" class="img-responsive img-banner" alt="{{ $mitra->judul }}"/>
                            <br/><br/>
                            <legend>
                                <h4 class="inner two">
                                    <a href="{{ route('MitraLuarNegeri.detail', $mitra->slug) }}">{{ strtoupper($mitra->judul) }}</a>
                                </h4>
                            </legend>
                            {!! $mitra->isi !!}
                            <hr/>
                        </div>
                    @else
                        <br/>
                        <h3 class="text-center">Data Tidak Ditemukan</h3>
                        <br/>
                    @endif
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>   
@endsection
