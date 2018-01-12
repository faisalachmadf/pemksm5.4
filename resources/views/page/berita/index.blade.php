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
                 
                    <div id="kategori-berita">
                    	<div class="editor-pics">
                    		<div class="edit-pics">
                    			   <label for="kategori-berita">Kategori Berita:</label>
                        <div class="clearfix"></div>
                        <a href="{{ route('Berita') }}" class="btn btn-default btn-katberita">
                            <h6><u>Semua Berita</u></h6>
                        </a>
                        <a href="{{ route('Berita', ['popular']) }}" class="btn btn-danger btn-katberita">
                            <h6><u>Berita Populer</u></h6>
                        </a>
                        @foreach($katberitas as $key => $katberita)
                        <a href="{{ route('Berita', [$katberita->slug]) }}" class="btn btn-katberita {{ generateBtnClass($key) }}">
                            <h6><u>{{ $katberita->name }}</u></h6>
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
                </div>
            </div>
                    <hr/>

                    <!--/Show dari Berita-->
                    <div class="technology">
                        @if($pencarian)
                            <h3>Hasil Pencarian {{ $beritas->count() > 0 ? '' : 'Tidak Ditemukan' }}</h3>
                            <br/>
                        @endif
                        @foreach($beritas as $berita)
                        <div class="editor-pics">
                            @if($dibaca)
                                <div class="col-md-12 item-pic2 text-justify">

                                	  <h4 class="inner two">
                                        <a href="{{ route('Berita', [$berita->katberita->slug, $berita->slug]) }}">{{ strtoupper($berita->judul) }}</a>
                                    </h4>
                                    <div class="td-post-date two">
                                        <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($berita->tanggal)) }} <i class="glyphicon glyphicon-user"></i> {{ generateUser($berita->user) }} <i class=""></i><i class="glyphicon glyphicon-eye-open"></i> {{ $berita->dibaca }}<i class=""></i><i class="glyphicon glyphicon-list-alt"></i>{{ $berita->katberita->name }}</h6>
                                    </div>
                                    <hr/>
                                    <img src="{{ asset('image/berita/'.$berita->gambar) }}" class="img-responsive img-banner" alt="{{ $berita->judul }}"/>
                                    <br/>
                                  
                                    {!! $berita->isi !!}
                                    <hr/><h6>Bagikan :</h6><br/>
                                    
                                    <!-- Share Media Sosial dan Print -->

                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Berita', [$berita->katberita->slug, $berita->slug]) }}'>
									<img src='http://syam.eu.org/icon/fb.jpg' alt='' width='30' height='30'></a>
									<a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Berita', [$berita->katberita->slug, $berita->slug]) }}'>
									<img src='http://syam.eu.org/icon/tw.jpg' alt='' width='30' height='30'></a>
									<a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Berita', [$berita->katberita->slug, $berita->slug]) }}'>
									 <img src='http://syam.eu.org/icon/g.jpg' alt='' width='30' height='30'></a>
									| &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>

									<P>&nbsp</P>
									<P>&nbsp</P>
									<div id="disqus_thread"></div>
										<script>

										/**
										*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
										*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
										/*
										var disqus_config = function () {
										this.page.url = "{{ route('Berita', [$berita->katberita->slug, $berita->slug]) }}";  // Replace PAGE_URL with your page's canonical URL variable
										this.page.identifier = "Berita/ {{ $berita->katberita->slug, $berita->slug }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
										};
										*/
										(function() { // DON'T EDIT BELOW THIS LINE
										var d = document, s = d.createElement('script');
										s.src = 'https://pemksmjabar.disqus.com/embed.js';
										s.setAttribute('data-timestamp', +new Date());
										(d.head || d.body).appendChild(s);
										})();
										</script>
										<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                </div>
                                <br>
                               	<script id="dsq-count-scr" src="//pemksmjabar.disqus.com/count.js" async></script>
                            @else

                                <div class="col-md-3 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$berita->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $berita->judul }}"/>
                                </div>
                                <div class="col-md-9 item-details">

                                    <p><a href="{{ route('Berita', [$berita->katberita->slug, $berita->slug]) }}">{{ strtoupper($berita->judul) }}</a></p>
                                    <div class="td-post-date two">
                                        <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($berita->tanggal)) }} <i class="glyphicon glyphicon-user"></i> {{ generateUser($berita->user) }} <i class="glyphicon glyphicon-eye-open"></i> {{ $berita->dibaca }}  <i class=""></i><font color="red"><i class="glyphicon glyphicon-list-alt"></i> {{ $berita->katberita->name }}</font></h6>
                                    </div>
                                    
                                </div>
                            @endif
                            <div class="clearfix"></div>
                            
                        </div>
                        
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
               
            </div>
            @include('frame_depan.kanan', @$kanan ? $kanan : [])
        </div>
    </div>   
@endsection
