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
                                <div class="col-md-3 item-pic">
                                    <img src="{{ asset('image/layanan/thumbnail/'.$layanan->file) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $layanan->judul }}"/>
                                </div>
                                <div class="col-md-9 item-details">
                                    <h4><a href="{{ route('Layanan', [$layanan->katbagian->slug, $layanan->slug]) }}">{{ strtoupper($layanan->judul) }}</a></h4>
                                    <div class="td-post-date two">
                                        <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($layanan->tanggal)) }} <i class="glyphicon glyphicon-user"></i> {{ generateUser($layanan->user) }} <i class="glyphicon glyphicon-eye-open"></i> {{ $layanan->diunduh }}  <i class=""></i><br/><i class="glyphicon glyphicon-list-alt"></i><font color="red">layanan dari Bagian : <b>{{ $layanan->katbagian->name }} </b></font></h6>
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

                 <hr/><h6>Bagikan :</h6><br/>
                                    <!-- Share Media Sosial dan Print -->
                                    <a href="whatsapp://send?text={{ route('Layanan', [$layanan->katbagian->slug, $layanan->slug]) }}" 
                                        data-action="share/whatsapp/share">
                                        <img src='/temafrontend/images/wa.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Layanan', [$layanan->katbagian->slug, $layanan->slug]) }}'>
                                    <img src='/temafrontend/images/logofb.png' alt='' width='50' height='50'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Layanan', [$layanan->katbagian->slug, $layanan->slug]) }}'>
                                    <img src='/temafrontend/images/logotwitter.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Layanan', [$layanan->katbagian->slug, $layanan->slug]) }}'>
                                     <img src='/temafrontend/images/logogoogle.png' alt='' width='35' height='35'></a>
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
                                        this.page.url = "{{ route('Layanan', [$layanan->katbagian->slug, $layanan->slug]) }}";  // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier = "Layanan/ {{ $layanan->katbagian->slug, $layanan->slug }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
            @include('frame_depan.kanan', @$kanan ? $kanan : [])
        </div>
    </div>   
@endsection
