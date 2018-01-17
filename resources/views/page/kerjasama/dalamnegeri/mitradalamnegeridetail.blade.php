@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">
                MITRA KERJA SAMA DALAM NEGERI<br/>
                {{ strtoupper(@$mitra->katmitra->name) }}
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
                                    <legend> <a href="{{ route('MitraDalamNegeri.detail', $mitra->slug) }}">{{ strtoupper($mitra->judul) }}</a>   <div class="td-post-date two">
                                        <h6><i class="glyphicon glyphicon-time"></i> Upload tanggal : &nbsp{{ date('d M Y', strtotime($mitra->created_at)) }} &nbsp <i class="glyphicon glyphicon-user"></i> diupload oleh : &nbsp{{ generateUser($mitra->user) }}
                                    </div> </legend>
                                     
                            </h4>
                        
                             <div class="col-md-3 item-pic">
                                  <img src="{{ asset('image/mitradn/'.$mitra->gambar) }}" class="img-responsive img-thumbnail" alt="{{ $mitra->judul }}" width="400px" />
                             
                             </div>
                               <div class="col-md-9 item-detail">
                                  <p>{!! $mitra->isi !!}</p>
                                  <hr/>  <a href="{{ route('MitraDalamNegeri') }}" class="btn btn-danger">  <i class="fa fa-arrow-left"></i> kembali</a>
                                  <hr/>
                                   <h6>Bagikan Informasi ini:</h6><br/>
                                    
                                    <!-- Share Media Sosial dan Print -->
                                     <a href="whatsapp://send?text={{ route('MitraDalamNegeri.detail', $mitra->slug) }}" 
                                        data-action="share/whatsapp/share">
                                        <img src='/temafrontend/images/wa.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('MitraDalamNegeri.detail', [$mitra->slug] ) }}'>
                                    <img src='/temafrontend/images/logofb.png' alt='' width='50' height='50'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('MitraDalamNegeri.detail', $mitra->slug) }}'>     
                                    <img src='/temafrontend/images/logotwitter.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('MitraDalamNegeri.detail', $mitra->slug) }}'>
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
                                        this.page.url = "{{ route('MitraDalamNegeri.detail', $mitra->slug) }}";  // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier = "MitraDalamNegeri.detail/ {{ $mitra->slug }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
