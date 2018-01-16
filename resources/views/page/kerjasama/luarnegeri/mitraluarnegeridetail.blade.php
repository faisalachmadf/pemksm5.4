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
                    <div class="editor-pics">
                                <div class="edit-pics">
                    @if($mitra)
                        <div class="box-body-mitra text-justify">
                        
                            <h4 class="inner two">
                                    <legend> <a href="{{ route('MitraLuarNegeri.detail', $mitra->slug) }}">{{ strtoupper($mitra->judul) }}</a>   <div class="td-post-date two">
                                        <h6><i class="glyphicon glyphicon-time"></i> Upload tanggal : &nbsp{{ date('d M Y', strtotime($mitra->created_at)) }} &nbsp <i class="glyphicon glyphicon-user"></i> diupload oleh : &nbsp{{ generateUser($mitra->user) }}
                                    </div> </legend>
                                     
                            </h4>
                        
                             <div class="col-md-3 item-pic">
                                  <img src="{{ asset('image/mitraln/'.$mitra->gambar) }}" class="img-responsive img-thumbnail" alt="{{ $mitra->judul }}" width="400px" />
                             
                             </div>
                               <div class="col-md-9 item-detail">
                                  <p>{!! $mitra->isi !!}</p>
                                  <hr/>  <a href="{{ route('MitraLuarNegeri') }}" class="btn btn-danger">  <i class="fa fa-arrow-left"></i> kembali</a>
                                  <hr/>
                                   <h6>Bagikan Informasi ini:</h6><br/>
                                    
                                    <!-- Share Media Sosial dan Print -->

                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('MitraLuarNegeri.detail', [$mitra->slug] ) }}'>
                                    <img src='http://syam.eu.org/icon/fb.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('MitraLuarNegeri.detail', $mitra->slug) }}'>     
                                    <img src='http://syam.eu.org/icon/tw.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('MitraLuarNegeri.detail', $mitra->slug) }}'>
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
                                        this.page.url = "{{ route('MitraLuarNegeri.detail', $mitra->slug) }}";  // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier = "MitraLuarNegeri.detail/ {{ $mitra->slug }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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

                           
                            <script id="dsq-count-scr" src="//pemksmjabar.disqus.com/count.js" async></script>
                               </div>

                                    
                           
                            <br/>
                             <br/>

                       
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

        </div>
    </div>   
@endsection
