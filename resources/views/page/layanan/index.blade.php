@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">LAYANAN PUBLIK</h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-8 mag-innert-left">
                <div class="banner-bottom-left-grids">
                 
                
                  
                    
                    <form class="form" action="{{ route('Layanan', ['pencarian']) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="pencarian">Pencarian Pelayanan Publik:</label><hr/>
                            <div class="input-group btn-katbagian">
                                <input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="Masukan kata kunci..." value="{{ @$data['pencarian'] }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr/>

                    <!--/Show dari Layanan-->
                    <div class="technology">
                        @if($pencarian)
                            <h3>Hasil Pencarian {{ $layanans->count() > 0 ? '' : 'Tidak Ditemukan' }}</h3>
                            <br/>
                        @endif
                        @foreach($layanans as $layanan)
                        <div class="editor-pics">
                            @if($diunduh)
                                <div class="col-md-12 item-pic2 text-justify">
                                    <img src="{{ asset('image/layanan/'.$layanan->file) }}" class="img-responsive img-banner" alt="{{ $layanan->judul }}"/>
                                    <br/><br/>
                                    <h4 class="inner two">
                                        <a href="{{ route('Layanan', [$layanan->katbagian->slug, $layanan->slug]) }}">{{ strtoupper($layanan->judul) }}</a>
                                    </h4>
                                    <div class="td-post-date two">
                                        <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($layanan->tanggal)) }} <i class="glyphicon glyphicon-user"></i> {{ generateUser($layanan->user) }} <i class=""></i><i class="glyphicon glyphicon-eye-open"></i> {{ $layanan->diunduh }}<i class=""></i><br/><i class="glyphicon glyphicon-list-alt"></i>layanan dari Bagian : <b>{{ $layanan->katbagian->name }}</b></h6>
                                    </div>
                                    <hr/>
                                    {!! $layanan->isi !!}
                                </div>
                            @else
                                <div class="col-md-5 item-pic">
                                    <img src="{{ asset('image/layanan/thumbnail/'.$layanan->file) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $layanan->judul }}"/>
                                </div>
                                <div class="col-md-7 item-details">
                                    <h4><a href="{{ route('Layanan', [$layanan->katbagian->slug, $layanan->slug]) }}">{{ strtoupper($layanan->judul) }}</a></h4>
                                    <div class="td-post-date two">
                                        <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($layanan->tanggal)) }} <i class="glyphicon glyphicon-user"></i> {{ generateUser($layanan->user) }} <i class="glyphicon glyphicon-eye-open"></i> {{ $layanan->diunduh }}  <i class=""></i><br/><i class="glyphicon glyphicon-list-alt"></i>layanan dari Bagian : <b>{{ $layanan->katbagian->name }} </b></h6>
                                    </div>
                                    <hr/>
                                </div>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                        
                        @endforeach
                        @if($pencarian)
                            {{ $layanans->appends(['pencarian' => $data['pencarian']])->links() }}
                        @else
                            {{ $layanans->links() }}
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
