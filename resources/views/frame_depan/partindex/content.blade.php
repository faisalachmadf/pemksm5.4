@extends('index')

@section('banner')
    @include('frame_depan.partindex.bannerindex', ['banners' => $banners])
@endsection


@section('content')
<div class="mag-inner">
     <div class="col-md-12">
     	<br>
        <!-- Di isi dengan tabel beritas kategori berita umum -->
                        <h3 class="tittle"><i class="glyphicon glyphicon-file"></i><b>Berita Umum </b></h3>
                        <div class="world-news-grids">
                            @foreach($umums as $umum)
                            <div class="world-news-grid">
                                <div class="thumbnail">
                                  <img src="{{ asset('image/berita/thumbnail/'.$umum->gambar) }}" alt="{{ $umum->judul }}" class="img-responsive"/>
                                </div>
                              
                                <h4><a href="{{ route('Berita', [$umum->katberita->slug, $umum->slug]) }}" class="wd">{{ $umum->judul }}</a></h4>

                                <div class="td-post-date two">
                                  <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($umum->tanggal)) }}</h6>
                                </div>
                                  <br/>
                            </div>
                            @endforeach
                            <div class="clearfix"></div>
                            <a href="{{ route('Berita', [@$umum->katberita->slug]) }}" class="btn btn-danger">
                                <h6>{{ @$umum->katberita->name }} Lainnya  <li class="glyphicon glyphicon-new-window"></li></h6>
                            </a>
                        </div>
                        <br/>
                        <br/>
                        
     </div>
                    

                    <div class="col-md-8 mag-innert-left">
                        <!--/start-Technology-->
                        <div class="technology">
                          <h2 class="tittle"><i class="glyphicon glyphicon-certificate"> </i><b>Urusan Pemerintahan Daerah </b></h2><p>&nbsp</p>
                            <!-- Di isi dengan tabel beritas kategori urusan pemerintahan daerah -->
                            @foreach($daerahs as $daerah)
                            <div class="editor-pics">
                                <div class="col-md-3 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$daerah->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $daerah->judul }}"/>
                                </div>
                                <div class="col-md-9 item-details">
                                    <p><a href="{{ route('Berita', [$daerah->katberita->slug, $daerah->slug]) }}">{{ strtoupper($daerah->judul) }}</a></p>
                                     
                                     <div class="td-post-date two">
                                     	<h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($daerah->tanggal)) }} <i class="glyphicon glyphicon-user"></i>diupload :  {{ generateUser($daerah->user) }} <i class="glyphicon glyphicon-eye-open"></i> dilihat : <b>{{ $daerah->dibaca }}</b> kali</h6>
                                     </div>

                                  
                                    <h5 class="inner two"></h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                          
                            @endforeach

                            <a href="{{ route('Berita', [@$daerah->katberita->slug]) }}" class="text-right">
                                <h6>{{ @$daerah->katberita->name }} Lainnya  <li class="glyphicon glyphicon-new-window"></li></h6>
                            </a>
                            <div class="clearfix"></div>
                            <br/><br/>
                        </div>
                       
                          
                      
                 
                        <!--//end-Technology-->
                        <div class="technology">
                          <h2 class="tittle"><i class="glyphicon glyphicon-certificate"> </i><b>Tata Pemerintahan </b></h2><p>&nbsp</p>
                            <!-- Di isi dengan tabel beritas kategori tata pemerintahan -->
                            @foreach($tatas as $tata)
                            <div class="editor-pics">
                                <div class="col-md-3 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$tata->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $tata->judul }}"/>
                                </div>
                                <div class="col-md-9 item-details">
                                    <p><a href="{{ route('Berita', [$tata->katberita->slug, $tata->slug]) }}">{{ strtoupper($tata->judul) }}</a></p>
                                    <div class="td-post-date two">
                                        <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($tata->tanggal)) }} <i class="glyphicon glyphicon-user"></i>diupload :  {{ generateUser($tata->user) }} <i class="glyphicon glyphicon-eye-open"></i> dilihat : <b>{{ $tata->dibaca }}</b> kali</h6>
                                    </div>
                                  
                                    <h5 class="inner two"></h5>
                                 </div>
                                <div class="clearfix"></div>
                            </div>
                          
                            @endforeach

                          
                
                            <div class="clearfix"></div>
                            <a href="{{ route('Berita', [@$tata->katberita->slug]) }}" class="text-right">
                                <h6>{{ @$tata->katberita->name }} Lainnya  <li class="glyphicon glyphicon-new-window"></li></h6>
                            </a>
                            <div class="clearfix"></div>
                            <br/><br/>
                        </div>
                     
                        <div class="technology">
                          <h2 class="tittle"><i class="glyphicon glyphicon-certificate"> </i><b>Kerja Sama </b></h2><p>&nbsp</p>
                            <!-- Di isi dengan tabel beritas kategori kerjasama -->
                            @foreach($kerjasamas as $kerjasama)
                            <div class="editor-pics">
                                <div class="col-md-3 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$kerjasama->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $kerjasama->judul }}"/>
                                </div>
                                <div class="col-md-9 item-details">
                                    <p><a href="{{ route('Berita', [$kerjasama->katberita->slug, $kerjasama->slug]) }}">{{ strtoupper($kerjasama->judul) }}</a></p>
                                    <div class="td-post-date two">
                                        <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($kerjasama->tanggal)) }} <i class="glyphicon glyphicon-user"></i>diupload :  {{ generateUser($kerjasama->user) }} <i class="glyphicon glyphicon-eye-open"></i> dilihat : <b>{{ $kerjasama->dibaca }}</b> kali</h6>
                                    </div>
                                 
                                    <h5 class="inner two"></h5>
                                 </div>
                                <div class="clearfix"></div>
                            </div>
                          
                            @endforeach
                            <div class="clearfix"></div>
                            <a href="{{ route('Berita', [@$kerjasama->katberita->slug]) }}" class="text-right">
                                <h6>{{ @$kerjasama->katberita->name }} Lainnya  <li class="glyphicon glyphicon-new-window"></li></h6>
                            </a>

                            <div class="clearfix"></div>
                            
                        </div>
                       <br/>
                      
                  

                    <!--//latest-articles-->
                      <div class="latest-articles">
                        <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>Artikel </h3>
                        <!-- Di isi dengan tabel beritas kategori artikel -->
                        <div class="world-news-grids">
                            @foreach($artikels as $artikel)
                            <div class="world-news-grid">
                                <img src="{{ asset('image/berita/thumbnail/'.$artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-responsive img-thumbnail wp-post-image"/>
                               
                                <p><a href="{{ route('Berita', [$artikel->katberita->slug, $artikel->slug]) }}" class="wd">{{ strtoupper($artikel->judul) }}</a></p>
                                 <div class="td-post-date two">
                                  <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($artikel->tanggal)) }}</h6>
                                 </div>
                                <br/>
                            </div>
                            @endforeach
                            <div class="clearfix"></div>
                            <a href="{{ route('Berita', [@$artikel->katberita->slug]) }}" class="text-right">
                                <h6>{{ @$artikel->katberita->name }} Lainnya  <li class="glyphicon glyphicon-new-window"></li></h6>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <br/>
                        <br/>
                        <br/>
                             <!--//articles-->
                </div>


<!-- KANAN INDEX -->
                 <div class="col-md-4 mag-inner-right">

                     <div class="connect">
                    <h4 class="side" >Bahasa</h4>
                    <ul class="stay">
                                
                    <div id="google_translate_element" style="float:center; width: 100%; "></div>
                    <script type="text/javascript">
                    function googleTranslateElementInit() {
                      new google.translate.TranslateElement({pageLanguage: 'id', includedLanguages: 'ar,en,fr,hu,ja,ko,ru,su,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                    }
                    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
                    </script>
                                
                    </ul>
                </div>
                <br/>
                        <div class="connect">
                        <h4 class="side" >KEPALA DINAS</h4>
                          <div class="edit-pics"> 
                          @foreach($sambutans as $key => $sambutan)
                            <center>
                                <img src="{{ asset('image/umum/'.$sambutan->gambar) }}" class="img-responsive" width="200px" />
                            </center>
                            <br/>
                            <center><b>{{ $sambutan->nama }}</b></center>
                           
                            <br/>
                             <h5 class="inner two"> {!! $sambutan->isi !!}</h5>
                             

                            @if($key < count($sambutans) - 1)
                              <hr/>
                            @endif
                        
                          @endforeach
                          </div>
                        </div>
                        <BR/>

                        <div class="connect">
                            <h4 class="side" >FILE DAN PENGUMUMAN</h4>
                             <div class="edit-pics"> 
                            	<!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">TERBARU</a></li>
              <li><a href="#tab_2" data-toggle="tab">TERPOPULER</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <br/>

                 <!-- di isi dengan tabel Publikasis -->
                                @foreach($publikasis as $publikasi)
                                <div class="editor-pics">
                                    <div class="item-details">
                                        <h5 class="inner two"><a href="{{ route('Publikasi.unduh', [$publikasi->katfile->slug, $publikasi->slug]) }}"><i class="glyphicon glyphicon-download"></i> &nbsp;&nbsp; {{ $publikasi->judul }}</a></h5>
                                        <div class="td-post-date two">
                                            <i class="glyphicon glyphicon-time"></i>{{ date('d M Y', strtotime($publikasi->tanggal)) }} <i class="glyphicon glyphicon-download"></i>di Unduh : <b>{{ $publikasi->diunduh }}</b> kali
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endforeach
                                <a href="{{ route('Publikasi') }}">
                                    <h6>File dan Pengumuman Lainnya &raquo;</h6>
                                </a>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
               <br/>

               @foreach($populars2 as $popular2)
                                <div class="editor-pics">
                                    <div class="item-details">
                                        <h5 class="inner two"><a href="{{ route('Publikasi.unduh', [$popular2->katfile->slug, $popular2->slug]) }}"><i class="glyphicon glyphicon-download"></i> &nbsp;&nbsp; {{ $popular2->judul }}</a></h5>
                                        <div class="td-post-date two">
                                            <i class="glyphicon glyphicon-time"></i>{{ date('d M Y', strtotime($popular2->tanggal)) }} <i class="glyphicon glyphicon-download"></i>di Unduh : <b>{{ $popular2->diunduh }}</b> kali
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endforeach
                                <a href="{{ route('Publikasi') }}">
                                    <h6>File dan Pengumuman Lainnya &raquo;</h6>
                                </a>
              </div>
             
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
                               
                            </div>
                        </div>
                        
                        <div class="top-news">
                            <h4 class="side">Agenda </h4>
                             <div class="edit-pics"> 
                                <!-- di Isi dengan Tabel Agenda Biro -->
                                @foreach($agendas as $agenda)
                                <div class="editor-pics">
                                    <div class="item-details">
                                        <h5 class="inner two"><i class="glyphicon glyphicon-calendar"></i> 
                                        &nbsp;&nbsp;<a href="{{ route('Agenda', [$agenda->katbagian->slug, $agenda->slug]) }}">{{ $agenda->judul }}</a></h5>
                                        <div class="td-post-date two">
                                            <i class="glyphicon glyphicon-time"></i>{{ date('d M Y', strtotime($agenda->tanggal)) }} 
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endforeach
                                <a href="{{ route('Agenda')}}">
                                    <h6>Agenda Lainnya &raquo;</h6>
                                </a>
                            </div>
                        </div>
                        <br/>

                        <h4 class="side">BERITA TERPOPULER</h4>
                        <div class="edit-pics"> 
                            <!-- DI isi dengan Tabel Beritas yang terbanyak jumlah Kliknya (Dibacanya) -->
                            @foreach($populars as $popular)
                                <div class="editor-pics">
                                    <div class="col-md-3 item-pic">
                                        <img src="{{ asset('image/berita/thumbnail/'.$popular->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $popular->judul }}"/>

                                    </div>
                                    <div class="col-md-9 item-details">
                                        <h5 class="inner two"><a href="{{ route('Berita', [$popular->katberita->slug, $popular->slug]) }}">{{ $popular->judul }}</a></h5>
                                        <div class="td-post-date two">
                                            <i class="glyphicon glyphicon-time"></i>{{ date('d M Y', strtotime($popular->tanggal)) }} <a href="#"><i class="glyphicon glyphicon-eye-open"></i>{{ $popular->dibaca }} </a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            @endforeach
                            <a href="{{ route('Berita', ['popular']) }}">
                                <h6>Berita Popular Lainnya &raquo;</h6>
                            </a>
                        </div>
                            
                        <br/>

                        <div class="connect">
                            <h4 class="side" >Ruang PPID</h4>
                             <div class="edit-pics"> 
                                <a href="{{ route('Publikasi', ['PPID']) }}"><center><img src="/adminkelola/dist/img/logobiro.png" class="img-responsive"></center></a>
                            </div>
                        </div>
                        <br/>
                        
                        <div class="connect">

                            <h4 class="side">Layanan Publik</h4>
                            <div class="edit-pics"> 
                                <!-- DI isi dengan Tabel layanans -->
                                @foreach($layanans as $layanan)
                                <div class="editor-pics">
                                    <div class="col-md-3 item-pic">
                                        <img src="{{ asset('image/layanan/thumbnail/'.$layanan->file) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $layanan->judul }}" class="img-responsive "  />

                                    </div>
                                    <div class="col-md-9 item-details">
                                       <a href="{{ route('Layanan', [$layanan->katbagian->slug, $layanan->slug]) }}">{{ $layanan->judul }}</a>

                                      <div class="td-post-date two">
                                            <i class="glyphicon glyphicon-time"></i>Tanggal Update:{{ date('d M Y', strtotime($layanan->tanggal)) }} 
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endforeach
                                <a href="{{ route('Layanan') }}">
                                    <h6>Layanan Publik Lainnya &raquo;</h6>
                                </a>
                            </div>
                        </div>

                        <br/>
                    <!--//top-news-->
                </div>

                <div class="clearfix"></div>
</div>
<br>
<hr/>

                     <!--/mag-bottom-->
                <div class="tkksddanlppd">

                
                       <div class="row">
			            <div class="col-lg-4 col-xs-4">
			              <!-- small box -->
			                <center><img src="/adminkelola/dist/img/logobiro.png" class="img-responsive"></center>
			                <center><div class="inner">
			                  <br>
			                  <h4>TKKSD</h4>
			                </div> </center>
         
			            </div>
			            <div class="col-lg-4 col-xs-4">
			              <!-- small box -->
			                  <center><img src="/adminkelola/dist/img/logobiro.png" class="img-responsive"></center>
			                 

			                <center><div class="inner">
			                  <br>
			                  <h4>LPPD</h4>
			                </div> </center>
			           
			            </div>

			             <div class="col-lg-4 col-xs-4">
			              <!-- small box -->
			                  <center><img src="/adminkelola/dist/img/logobiro.png" class="img-responsive"></center>
			                 

			                <center><div class="inner">
			                  <br>
			                  <h4>SEGMEN BATAS</h4>
			                </div> </center>
			           
			            </div>
			      
			          </div>
   
                                 <div class="clearfix"></div>
                         
                                
                	
                </div>
                
            </div>
                <div class="mag-bottom">
                    <!-- di isi dengan Tabel Aplikasis -->
                    <div id="example1">
                    	<div class="container">
                        <div id="owl-demo" class="owl-carousel text-center">
                            @foreach($aplikasis as $aplikasi)
                            <div class="item" style="margin-left: 2em;">
                                <a href="{{ $aplikasi->link }}" target="_blank"><img class="img-responsive lot img-thumbnail" src="{{ asset('image/beranda/'.$aplikasi->gambar) }}" alt="{{ $aplikasi->judul }}"/></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    </div>

                <!-- requried-jsfiles-for owl -->
                                        <script src="/temafrontend/js/owl.carousel.js"></script>
                                          <script>
                                          $(document).ready(function() {
                                               $("#owl-demo").owlCarousel({
                                                items :5,
                                                lazyLoad : true,
                                                autoPlay : true,
                                                navigation : true,
                                                navigationText :  true,
                                                pagination : false,
                                                responsiveBreakpoints: { 
                                        portrait: { 
                                            changePoint:480,
                                            visibleItems: 2
                                        }, 
                                        landscape: { 
                                            changePoint:640,
                                            visibleItems: 2
                                        },
                                        tablet: { 
                                            changePoint:768,
                                            visibleItems: 3
                                        }
                                    }
                                                });
                                          });
                                        </script>
                        <!-- //requried-jsfiles-for owl -->
                    




                 </div>

                 <!--//mag-bottom-->
                 <div class="footerlagi-section">
	
	<div class="container">
		<br/>
		<br>
		<center><h1> Media <span>Sosial</span></h1></center>
					<br/>
					<br/>
						<div class="col-md-4 footerlagi-grid">
						<h4><font color="#000"><img src="/temafrontend/images/fb.png" width="35px" height="35px"/> Facebook</font></h4>
						  <div class="editor-pics">
						  
							  <div id="fb-root"></div>
								<script>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.6";
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));</script>

								
								<div class="fb-page" data-href="https://www.facebook.com/Biro-Otonomi-Daerah-dan-Kerjasama-393299957534362/" data-tabs="timeline" data-width="300" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>   
								</div>
								<div class="clearfix"></div>
							</div>
							
						
						
						<div class="col-md-4 footerlagi-grid">
							<h4><font color="#000"><img src="/temafrontend/images/twit.png" width="30px" height="30px"/> &nbsp Twitter</font></h4>
								<div class="editor-pics">
										 <a class="twitter-timeline" href="https://twitter.com/birootdaksm" data-widget-id="564996746669879297">Tweets by @birootdaksm</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
										<div class="clearfix"></div>
								</div>
										
							
						</div>
						<div class="col-md-4 footerlagi-grid">
								<h4><font color="#000"><img src="/temafrontend/images/ig.png" width="30px" height="30px"/> &nbsp Instagram</font></h4>
								<!-- LightWidget WIDGET --><script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/aae4ca0758a5504abf98bd98d55306fd.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
								<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
	</div>
</div>

@endsection