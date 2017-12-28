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
                    <label for="kategori-berita">Kategori Berita:</label>
                    <div id="kategori-berita">
                        <div class="clearfix"></div>
                        <a href="{{ route('Berita') }}" class="btn btn-default btn-katberita">
                            <h6>Semua Berita</h6>
                        </a>
                        <a href="{{ route('Berita', ['popular']) }}" class="btn btn-danger btn-katberita">
                            <h6>Berita Popular</h6>
                        </a>
                        @foreach($katberitas as $key => $katberita)
                        <a href="{{ route('Berita', [$katberita->slug]) }}" class="btn btn-katberita {{ generateBtnClass($key) }}">
                            <h6>{{ $katberita->name }}</h6>
                        </a>
                        @endforeach
                    </div>
                    <br>
                    <form class="form" action="{{ route('Berita', ['pencarian']) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="pencarian">Pencarian Berita:</label>
                            <div class="input-group btn-katberita">
                                <input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="Masukan kata kunci..." value="{{ @$data['pencarian'] }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr/>

                    <!--/start-Technology-->
                    <div class="technology">
                        @if($pencarian)
                            <h3>Hasil Pencarian {{ $beritas->count() > 0 ? '' : 'Tidak Ditemukan' }}</h3>
                            <br/>
                        @endif
                        @foreach($beritas as $berita)
                        <div class="editor-pics">
                            @if($dibaca)
                                <div class="col-md-12 item-pic text-justify">
                                    <img src="{{ asset('image/berita/'.$berita->gambar) }}" class="img-responsive img-banner" alt="{{ $berita->judul }}"/>
                                    <br/><br/>
                                    <h3 class="inner two">
                                        <a href="{{ route('Berita', [$berita->katberita->slug, $berita->slug]) }}">{{ $berita->judul }}</a>
                                    </h3>
                                    <p><h6>
                                        <i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($berita->tanggal)) }} <i class="glyphicon glyphicon-user"></i> {{ generateUser($berita->user) }} <i class="glyphicon glyphicon-eye-open"></i> {{ $berita->dibaca }}
                                    </h6></p>
                                    <hr/>
                                    {!! $berita->isi !!}
                                </div>
                            @else
                                <div class="col-md-5 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$berita->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $berita->judul }}"/>
                                </div>
                                <div class="col-md-7 item-details">
                                    <h3 class="inner two">
                                        <a href="{{ route('Berita', [$berita->katberita->slug, $berita->slug]) }}">{{ $berita->judul }}</a>
                                    </h3>
                                    <p><h6>
                                        <i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($berita->tanggal)) }} <i class="glyphicon glyphicon-user"></i> {{ generateUser($berita->user) }} <i class="glyphicon glyphicon-eye-open"></i> {{ $berita->dibaca }}
                                    </h6></p>
                                    <hr/>
                                    {!! str_limit($berita->isi, 300) !!} <a href="{{ route('Berita', [$berita->katberita->slug, $berita->slug]) }}">Baca Selengkapnya &raquo;</a>
                                </div>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                        <hr/>
                        @endforeach
                        @if($pencarian)
                            {{ $beritas->appends(['pencarian' => $data['pencarian']])->links() }}
                        @else
                            {{ $beritas->links() }}
                        @endif
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--Komentar-->
                <div class="post">
                    <div class="leave">
                        <h4>Leave a comment</h4>
                        <form id="commentform">
                             <p class="comment-form-author-name"><label for="author">Name</label>
                                <input id="author" type="text" value="" size="30" aria-required="true">
                             </p>
                             <p class="comment-form-email">
                                <label class="email">Email</label>
                                <input id="email" type="text" value="" size="30" aria-required="true">
                             </p>
                             <p class="comment-form-comment">
                                <label class="comment">Comment</label>
                                <textarea></textarea>
                             </p>
                             <div class="clearfix"></div>
                            <p class="form-submit">
                               <input type="submit" id="submit" value="Send">
                            </p>
                            <div class="clearfix"></div>
                       </form>
                    </div>
                </div>
            </div>
            @include('frame_depan.kanan', @$kanan ? $kanan : [])
        </div>
    </div>   
@endsection
