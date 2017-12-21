@extends('index')

@section('banner')
    @include('frame_depan.partindex.bannerindex', ['banners' => $banners])
@endsection


@section('content')
<div class="mag-inner">
    <div class="latest-articles">
        <!-- Di isi dengan tabel beritas kategori berita umum -->
                        <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>Berita Umum (maksimal 4 dan berita terbaru adalah berita terakhir update)</h3>
                        <div class="world-news-grids">
                            @foreach($umums as $umum)
                            <div class="world-news-grid">
                                <div class="thumbnail">
                                  <img src="{{ asset('image/berita/thumbnail/'.$umum->gambar) }}" alt="{{ $umum->judul }}" class="img-responsive"/>
                                </div>
                              
                                <h4><a href="{{ route('Berita', [$umum->katberita->slug, $umum->slug]) }}" class="wd">{{ $umum->judul }}</a></h4>
                                
                                  <p><h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($umum->tanggal)) }}</h6></p>
                                  <br/>
                            </div>
                            @endforeach
                            <div class="clearfix"></div>
                            <a href="{{ route('Berita', [@$umum->katberita->slug]) }}" class="btn btn-danger">
                                <h6>{{ @$umum->katberita->name }} Lainnya &gt;&gt;</h6>
                            </a>
                        </div>
                        <br/>
                    </div>
                    

                    <div class="col-md-8 mag-innert-left">
                        <!--/start-Technology-->
                        <div class="technology">
                          <h2 class="tittle"><i class="glyphicon glyphicon-certificate"> </i>Urusan Pemerintahan Daerah (maksimal 3 dan berita terbaru adalah berita terakhir update)</h2>
                            <!-- Di isi dengan tabel beritas kategori urusan pemerintahan daerah -->
                            @foreach($daerahs as $daerah)
                            <div class="editor-pics">
                                <div class="col-md-5 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$daerah->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $daerah->judul }}"/>
                                </div>
                                <div class="col-md-7 item-details">
                                    <h5 class="inner two"><a href="{{ route('Berita', [$daerah->katberita->slug, $daerah->slug]) }}">{{ $daerah->judul }}</a></h5>
                                    <p><h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($daerah->tanggal)) }} <a href="#"><i class="glyphicon glyphicon-user"></i> {{ generateUser($daerah->user) }}</a> <i class="glyphicon glyphicon-eye-open"></i> {{ $daerah->dibaca }}</h6></p>
                                    <hr/>
                                    <h5 class="inner two">{!!substr($daerah->isi,0,300)!!} ...</h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <hr/>
                            @endforeach
                            <div class="clearfix"></div>
                            <a href="{{ route('Berita', [@$daerah->katberita->slug]) }}" class="btn btn-warning">
                                <h6>{{ @$daerah->katberita->name }} Lainnya &gt;&gt;</h6>
                            </a>
                            <br/><br/>
                        </div>
                       
                        <!--//end-Technology-->
                        <div class="technology">
                          <h2 class="tittle"><i class="glyphicon glyphicon-certificate"> </i>Tata Pemerintahan (maksimal 3 dan berita terbaru adalah berita terakhir update)</h2>
                            <!-- Di isi dengan tabel beritas kategori tata pemerintahan -->
                            @foreach($tatas as $tata)
                            <div class="editor-pics">
                                <div class="col-md-5 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$tata->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $tata->judul }}"/>
                                </div>
                                <div class="col-md-7 item-details">
                                    <h5 class="inner two"><a href="{{ route('Berita', [$tata->katberita->slug, $tata->slug]) }}">{{ $tata->judul }}</a></h5>
                                    <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($tata->tanggal)) }} <a href="#"><i class="glyphicon glyphicon-user"></i> {{ generateUser($tata->user) }}</a> <i class="glyphicon glyphicon-eye-open"></i> {{ $tata->dibaca }}</h6><hr/>
                                    <h5 class="inner two">{!!substr($tata->isi,0,300)!!} ...</h5>
                                 </div>
                                <div class="clearfix"></div>
                            </div>
                            <hr/>
                            @endforeach
                            <div class="clearfix"></div>
                            <a href="{{ route('Berita', [@$tata->katberita->slug]) }}" class="btn btn-success">
                                <h6>{{ @$tata->katberita->name }} Lainnya &gt;&gt;</h6>
                            </a>
                            <br/><br/>
                        </div>
                     
                        <div class="technology">
                          <h2 class="tittle"><i class="glyphicon glyphicon-certificate"> </i>Kerja Sama (maksimal 3 dan berita terbaru adalah berita terakhir update)</h2>
                            <!-- Di isi dengan tabel beritas kategori kerjasama -->
                            @foreach($kerjasamas as $kerjasama)
                            <div class="editor-pics">
                                <div class="col-md-5 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$kerjasama->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $kerjasama->judul }}"/>
                                </div>
                                <div class="col-md-7 item-details">
                                    <h5 class="inner two"><a href="{{ route('Berita', [$kerjasama->katberita->slug, $kerjasama->slug]) }}">{{ $kerjasama->judul }}</a></h5>
                                    <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($kerjasama->tanggal)) }} <a href="#"><i class="glyphicon glyphicon-user"></i> {{ generateUser($kerjasama->user) }}</a> <i class="glyphicon glyphicon-eye-open"></i> {{ $kerjasama->dibaca }}</h6><hr/>
                                    <h5 class="inner two">{!!substr($kerjasama->isi,0,300)!!} ...</h5>
                                 </div>
                                <div class="clearfix"></div>
                            </div>
                            <hr/>
                            @endforeach
                            <div class="clearfix"></div>
                            <a href="{{ route('Berita', [@$kerjasama->katberita->slug]) }}" class="btn btn-info">
                                <h6>{{ @$kerjasama->katberita->name }} Lainnya &gt;&gt;</h6>
                            </a>
                        </div>
                       

                    <!--//latest-articles-->
                      <div class="latest-articles">
                        <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>Artikel (maksimal 4 dan berita terbaru adalah berita terakhir update)</h3>
                        <!-- Di isi dengan tabel beritas kategori artikel -->
                        <div class="world-news-grids">
                            @foreach($artikels as $artikel)
                            <div class="world-news-grid">
                                <img src="{{ asset('image/berita/thumbnail/'.$artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-responsive img-thumbnail wp-post-image"/>
                               
                                <a href="{{ route('Berita', [$artikel->katberita->slug, $artikel->slug]) }}" class="wd">{{ $artikel->judul }}</a>
                                <p> <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($artikel->tanggal)) }}</h6></p>
                                <br/>
                            </div>
                            @endforeach
                            <div class="clearfix"></div>
                            <a href="{{ route('Berita', [@$artikel->katberita->slug]) }}" class="btn btn-primary">
                                <h6>{{ @$artikel->katberita->name }} Lainnya &gt;&gt;</h6>
                            </a>
                        </div>
                    </div>
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
                          <ul class="stay">
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
                          </ul>
                        </div>
                        <BR/>

                        <div class="connect">
                            <h4 class="side" >FILE DAN PENGUMUMAN</h4>
                            <ul class="stay">
                                <!-- di isi dengan tabel Publikasis -->
                                @foreach($publikasis as $publikasi)
                                <div class="editor-pics">
                                    <div class="item-details">
                                        <h5 class="inner two"><a href="{{ route('Publikasi', [$publikasi->katfile->slug, $publikasi->slug]) }}"><i class="glyphicon glyphicon-download"></i> &nbsp&nbsp {{ $publikasi->judul }}</a></h5>
                                        <div class="td-post-date two">
                                            <i class="glyphicon glyphicon-time"></i>{{ date('d M Y', strtotime($publikasi->tanggal)) }} <i class="glyphicon glyphicon-download"></i>{{ $publikasi->diunduh }}
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endforeach
                                <a href="{{ route('Publikasi') }}">
                                    <h6>File dan Pengumuman Lainnya &gt;&gt;</h6>
                                </a>
                            </ul>
                        </div>
                        
                        <div class="top-news">
                            <h4 class="side">Agenda </h4>
                            <ul class="stay">
                                <!-- di Isi dengan Tabel Agenda Biro -->
                                @foreach($agendas as $agenda)
                                <div class="editor-pics">
                                    <div class="item-details">
                                        <h5 class="inner two"><i class="glyphicon glyphicon-calendar"></i> 
                                        &nbsp&nbsp<a href="{{ route('Agenda', [$agenda->slug, $agenda->slug]) }}">{{ $agenda->judul }}</a></h5>
                                        <div class="td-post-date two">
                                            <i class="glyphicon glyphicon-time"></i>{{ date('d M Y', strtotime($agenda->tanggal)) }} 
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @endforeach
                                <a href="{{ route('Agenda')}}">
                                    <h6>Agenda Lainnya &gt;&gt;</h6>
                                </a>
                            </ul>
                        </div>
                        <br/>

                        <h4 class="side">Popular Posts</h4>
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
                                            <i class="glyphicon glyphicon-time"></i>{{ date('d M Y', strtotime($popular->tanggal)) }} <a href="#"><i class="glyphicon glyphicon-eye-open"></i>0 </a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            @endforeach
                            <a href="{{ route('Berita') }}">
                                <h6>Berita Popular Lainnya &gt;&gt;</h6>
                            </a>
                        </div>
                            
                        <br/>

                        <div class="connect">
                            <h4 class="side" >Ruang PPID</h4>
                            <ul class="stay">
                                <a href="/"><center><img src="/adminkelola/dist/img/logobiro.png"></center></a>
                            </ul> 
                        </div>
                        <br/>
                        
                        <div class="connect">
                            <h4 class="side">Layanan Publik</h4>
                            <ul class="stay">
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
                                <a href="{{ route('Publikasi') }}">
                                    <h6>Layanan Publik Lainnya &gt;&gt;</h6>
                                </a>
                            </ul>
                        </div>

                        <br/>
                    <!--//top-news-->
                </div>

                <div class="clearfix"></div>
            </div>



                     <!--/mag-bottom
                <div class="mag-bottom">
                    <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>Layanan Biro Pemerintahan dan Kerja Sama</h3>
                
                  untuk di halaman layanan   
				<table>
                <thead>
                <tr>
                  <th> </th>
                  <th><font color="white">__</font>  </th>
                  <th> </th>
                 </tr>
                 </thead>
                 <tbody>
                 	@foreach($layanans as $layanan)
                 <tr>
                 <td>  
                                	<img src="{{ asset('image/layanan/thumbnail/'.$layanan->file) }}" width="50px" alt="{{ $layanan->judul }}" class="img-responsive "  /></td>
                  <td></td>            
                  <td> <a href="{{ route('Layanan', [$layanan->katbagian->slug, $layanan->slug]) }}">{{ $layanan->judul }}</a>

                                        <div class="td-post-date two">
                                            <i class="glyphicon glyphicon-time"></i>Tanggal Update:{{ date('d M Y', strtotime($layanan->tanggal)) }} 
                                        </div></td>
                 </tr>
                 @endforeach
                 </tbody>
                 </table> 
                     
                               
                                       
                                        
                                  
                                 
                                    
                                    <div class="clearfix"></div>
                         
                                
                	
                </div>-->

                <div class="mag-bottom">
                    <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>Link terkait</h3>
                    <!-- di isi dengan Tabel Aplikasis -->
                    <div id="example1">
                        <div id="owl-demo" class="owl-carousel text-center">
                            @foreach($aplikasis as $aplikasi)
                            <div class="item">
                                <a href="{{ $aplikasi->link }}" target="_blank"><img class="img-responsive lot" src="{{ asset('image/beranda/'.$aplikasi->gambar) }}" alt="{{ $aplikasi->judul }}"/></a>
                            </div>
                            @endforeach
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

@endsection