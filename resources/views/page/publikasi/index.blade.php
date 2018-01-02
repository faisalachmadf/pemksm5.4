@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">{{ strtoupper($katfile ? $katfile->name : 'PUBLIKASI') }}</h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-8 mag-innert-left">
                <div class="banner-bottom-left-grids">
                    <br/>
                    <form class="form" action="{{ route('Publikasi', $katfile ? [$katfile->slug, 'pencarian'] : ['pencarian']) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="pencarian">Pencarian {{ $katfile ? $katfile->name : 'Publikasi' }}:</label>
                            <div class="input-group btn-katberita">
                                <input type="hidden" name="katslug" value="{{ $katfile ? $katfile->slug : '' }}">
                                <input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="Masukan kata kunci..." value="{{ @$data['pencarian'] }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr/>

                    <!--/Show dari Publikasi-->
                    <div class="technology">
                        @if($pencarian)
                            <h3>Hasil Pencarian {{ $publikasis->count() > 0 ? '' : 'Tidak Ditemukan' }}</h3>
                            <br/>
                        @endif
                        @foreach($publikasis as $publikasi)
                        <div class="editor-pics">
                            <div class="item-details">
                                <h5 class="inner two"><a href="{{ route('Publikasi.unduh', [$publikasi->katfile->slug, $publikasi->slug]) }}"><i class="glyphicon glyphicon-download"></i> &nbsp;&nbsp; {{ $publikasi->judul }}</a></h5>
                                <div class="td-post-date two">
                                    <i class="glyphicon glyphicon-time"></i>{{ date('d M Y', strtotime($publikasi->tanggal)) }} <i class="glyphicon glyphicon-download"></i>{{ $publikasi->diunduh }}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endforeach
                        
                        @if($pencarian)
                            {{ $publikasis->appends(['pencarian' => $data['pencarian']])->links() }}
                        @else
                            {{ $publikasis->links() }}
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
