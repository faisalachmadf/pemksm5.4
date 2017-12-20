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
                            @foreach($beritas->where('katberita.slug', 'Berita-Umum')->all() as $umum)
                            <div class="world-news-grid">
                                <div class="thumbnail">
                                  <img src="{{ asset('image/berita/thumbnail/'.$umum->gambar)}}" alt="{{ $umum->judul }}" class="img-responsive"/>
                                </div><h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($umum->created_at)) }}</h6>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
					                <h6>{{ $umum->katberita->name }} </h6> 
					              </button> 
                                <p><a href="{{ route('Berita-Umum.show', $umum->slug) }}" class="wd">{{ $umum->judul }}</a></p>
                                <br/>
                                

                               
                            </div>
                            @endforeach
                            
                            <div class="clearfix"></div>
                        </div>
                        <br/>
                    </div>
                    

                    <div class="col-md-8 mag-innert-left">
                        <!--/start-Technology-->
                        <div class="technology">
                          <h2 class="tittle"><i class="glyphicon glyphicon-certificate"> </i>Urusan Pemerintahan Daerah (maksimal 3 dan berita terbaru adalah berita terakhir update)</h2>
                            <!-- Di isi dengan tabel beritas kategori urusan pemerintahan daerah -->
                            @foreach($beritas->where('katberita.slug', 'Berita-Urusan-Pemerintahan-Daerah')->all() as $daerah)
                            <div class="editor-pics">
                                <div class="col-md-5 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$daerah->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $daerah->judul }}"/>
                                </div>
                                <div class="col-md-7 item-details">
                                    <h5 class="inner two"><a href="{{ route('Berita-Urusan-Pemerintahan-Daerah.show', $daerah->slug) }}">{{ $daerah->judul }}</a></h5><br/>
                                   <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($daerah->created_at)) }} <a href="#"><i class="glyphicon glyphicon-user"></i> {{ generateUser($daerah->user) }}</a> <i class="glyphicon glyphicon-eye-open"></i> {{ $daerah->dibaca }}</h6>  
                                   <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
					                <h6>{{ $daerah->katberita->name }} </h6>
					              </button>
                                 </div>
                                <div class="clearfix"></div>
                            </div>
                            <hr/> 
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                       
                        <!--//end-Technology-->
                        <div class="technology">
                          <h2 class="tittle"><i class="glyphicon glyphicon-certificate"> </i>Tata Pemerintahan (maksimal 3 dan berita terbaru adalah berita terakhir update)</h2>
                            <!-- Di isi dengan tabel beritas kategori tata pemerintahan -->
                            @foreach($beritas->where('katberita.slug', 'Berita-Tata-Pemerintahan')->all() as $tata)
                            <div class="editor-pics">
                                <div class="col-md-5 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$tata->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $tata->judul }}"/>
                                </div>
                                <div class="col-md-7 item-details">
                                    <h5 class="inner two"><a href="{{ route('Berita-Tata-Pemerintahan.show', $tata->slug) }}">{{ $tata->judul }}</a></h5><br/>
                                     <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($tata->created_at)) }} <a href="#"><i class="glyphicon glyphicon-user"></i> {{ generateUser($tata->user) }}</a> <i class="glyphicon glyphicon-eye-open"></i> {{ $tata->dibaca }}</h6>
                                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-warning">
					                <h6>{{ $tata->katberita->name }} </h6>
					              </button> 
                                 </div>
                                <div class="clearfix"></div>
                            </div>
                            <hr/>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                     
                        <div class="technology">
                          <h2 class="tittle"><i class="glyphicon glyphicon-certificate"> </i>Kerja Sama (maksimal 3 dan berita terbaru adalah berita terakhir update)</h2>
                            <!-- Di isi dengan tabel beritas kategori kerjasama -->
                            @foreach($beritas->where('katberita.slug', 'Berita-Kerja-Sama')->all() as $kerjasama)
                            <div class="editor-pics">
                                <div class="col-md-5 item-pic">
                                    <img src="{{ asset('image/berita/thumbnail/'.$kerjasama->gambar) }}" class="img-responsive img-thumbnail wp-post-image" alt="{{ $kerjasama->judul }}"/>
                                </div>
                                <div class="col-md-7 item-details">
                                    <h5 class="inner two"><a href="{{ route('Berita-Kerja-Sama.show', $kerjasama->slug) }}">{{ $kerjasama->judul }}</a></h5><br/>
                                     <h6><i class="glyphicon glyphicon-time"></i> {{ date('d M Y', strtotime($kerjasama->created_at)) }} <a href="#"><i class="glyphicon glyphicon-user"></i> {{ generateUser($kerjasama->user) }}</a> <i class="glyphicon glyphicon-eye-open"></i> {{ $kerjasama->dibaca }}</h6> 
                                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-warning">
					                <h6>{{ $kerjasama->katberita->name }} </h6>
					              </button> 
                                 </div>
                                <div class="clearfix"></div>
                            </div>
                            <hr/>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                       

                    <!--//latest-articles-->
                      <div class="latest-articles">
                        <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>Artikel (maksimal 4 dan berita terbaru adalah berita terakhir update)</h3>
                        Di isi dengan tabel beritas kategori artikel
                        <div class="world-news-grids">
                                <div class="world-news-grid">
                                    <img src="/temafrontend/images/a1.jpg" alt="" class="img-responsive img-thumbnail wp-post-image"/>
                                    <a href="single.html" class="wd">Lorem ipsum dolor sit amet, ullamcorper consectetur </a>
                                    
                                </div>
                                <div class="world-news-grid">
                                    <img src="temafrontend/images/a3.jpg" alt="" class="img-responsive img-thumbnail wp-post-image"/>
                                    <a href="single.html" class="wd">PM Modi to inaugurate Rs 9,700 crore road projects in Bihar</a>
                                   
                                </div>
                                <div class="world-news-grid">
                                    <img src="temafrontend/images/a1.jpg" alt="" class="img-responsive img-thumbnail wp-post-image"/>
                                    <a href="single.html" class="wd">Sports in Lorem ipsum dolor sit amet ullamcorper consectetur </a>
                                
                                </div>
                                <div class="world-news-grid ">
                                    <img src="/temafrontend/images/a1.jpg" alt="" class="img-responsive img-thumbnail wp-post-image"/>
                                    <a href="single.html" class="wd">Lorem ipsum dolor sit amet, ullamcorper consectetur </a>
                                    
                                </div>
                                <br/>
                                
                                
                                <div class="clearfix"></div>
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
                           <center><img src="/temafrontend/images/f4.jpg" class="img-responsive" width="200px" /></center>

                            <br/>
                              <P> di isi dengan Tabel Sambutans</P>
                              </ul>
                         </div>
                         <BR/>

                         <div class="connect">
                                <h4 class="side" >FILE DAN PENGUMUMAN</h4>
                                  <ul class="stay">
                                di isi dengan tabel Publikasis
                                
                              </ul>
                        </div>
                        
                        <div class="top-news">
                                 <h4 class="side">Agenda </h4>
                                  <div class="top-inner">
                                    di Isi dengan Tabel Publikasis Kategori Agenda Biro
                                      <div class="editor-pics">

                                         <div class="col-md-3 item-pic">
                                           <img src="images/f4.jpg" class="img-responsive img-thumbnail wp-post-image" alt=""/>

                                           </div>
                                            <div class="col-md-9 item-details">
                                                <h5 class="inner two"><a href="single.html">New iPad App to stimulate your Guitar</a></h5>
                                                 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                                             </div>
                                            <div class="clearfix"></div>
                                        </div>
                                  </div>
                           </div>
                                <br/>

                        <h4 class="side">Popular Posts</h4>
                        <div class="edit-pics"> 

                             DI isi dengan Tabel Beritas yang terbanyak jumlah Kliknya (Dibacanya)
                             
                                <div class="editor-pics">

                                    <div class="col-md-3 item-pic">
                                        <img src="images/f4.jpg" class="img-responsive img-thumbnail wp-post-image" alt=""/>

                                    </div>
                                    <div class="col-md-9 item-details">
                                        <h5 class="inner two"><a href="single.html">New iPad App to stimulate your Guitar</a></h5>
                                         <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a>
                                         </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                        <div class="editor-pics">
                                         <div class="col-md-3 item-pic">
                                           <img src="images/f1.jpg" class="img-responsive img-thumbnail wp-post-image" alt=""/>

                                           </div>
                                            <div class="col-md-9 item-details">
                                                <h5 class="inner two"><a href="single.html">New iPad App to stimulate your Guitar</a></h5>
                                                 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                                             </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        <div class="editor-pics">
                                         <div class="col-md-3 item-pic">
                                           <img src="images/f1.jpg" class="img-responsive img-thumbnail wp-post-image" alt=""/>

                                           </div>
                                            <div class="col-md-9 item-details">
                                                <h5 class="inner two"><a href="single.html">New iPad App to stimulate your Guitar</a></h5>
                                                 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                                             </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        <div class="editor-pics">
                                         <div class="col-md-3 item-pic">
                                           <img src="images/f4.jpg" class="img-responsive img-thumbnail wp-post-image" alt=""/>

                                           </div>
                                            <div class="col-md-9 item-details">
                                                <h5 class="inner two"><a href="single.html">New iPad App to stimulate your Guitar</a></h5>
                                                 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                                             </div>
                                            <div class="clearfix"></div>
                                        </div>
                                </div>
                            
                            <br/>

                             <div class="connect">
                                <h4 class="side" >Ruang PPID</h4>
                                  <ul class="stay">
                                    di isi dengan tabel Publikasis kategori PPID
                                    
                                  </ul>
                              </div>
                              <br/>

                            <h4 class="side">Layanan Publik</h4>
                        <div class="edit-pics"> 

                             DI isi dengan Tabel layanans 
                             
                                <div class="editor-pics">

                                    <div class="col-md-3 item-pic">
                                        <img src="images/f4.jpg" class="img-responsive img-thumbnail wp-post-image" alt=""/>

                                    </div>
                                    <div class="col-md-9 item-details">
                                        <h5 class="inner two"><a href="single.html">New iPad App to stimulate your Guitar</a></h5>
                                         <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a>
                                         </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                        <div class="editor-pics">
                                         <div class="col-md-3 item-pic">
                                           <img src="images/f1.jpg" class="img-responsive img-thumbnail wp-post-image" alt=""/>

                                           </div>
                                            <div class="col-md-9 item-details">
                                                <h5 class="inner two"><a href="single.html">New iPad App to stimulate your Guitar</a></h5>
                                                 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                                             </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        <div class="editor-pics">
                                         <div class="col-md-3 item-pic">
                                           <img src="images/f1.jpg" class="img-responsive img-thumbnail wp-post-image" alt=""/>

                                           </div>
                                            <div class="col-md-9 item-details">
                                                <h5 class="inner two"><a href="single.html">New iPad App to stimulate your Guitar</a></h5>
                                                 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                                             </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        <div class="editor-pics">
                                         <div class="col-md-3 item-pic">
                                           <img src="images/f4.jpg" class="img-responsive img-thumbnail wp-post-image" alt=""/>

                                           </div>
                                            <div class="col-md-9 item-details">
                                                <h5 class="inner two"><a href="single.html">New iPad App to stimulate your Guitar</a></h5>
                                                 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                                             </div>
                                            <div class="clearfix"></div>
                                        </div>
                                </div>
                            
                            <br/>

                            

                  
                  
                          
                             
                                
                            <!--//top-news-->
                </div>

                <div class="clearfix"></div>
</div>



                 <!--//end-mag-inner-->
                     <!--/mag-bottom-->
                  <div class="mag-bottom">
                     <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>Link terkait</h3>
                     di isi dengan data-data layanan
                  </div>

                 <div class="mag-bottom">
                     <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>Link terkait</h3>
                     di isi dengan Tabel Aplikasis
                      
                      <div id="example1">
                                <div id="owl-demo" class="owl-carousel text-center">
                                  <div class="item">
                            
                                    <a href="#"><img class="img-responsive lot" src="/temafrontend/images/p1.jpg" alt="asdasdasdasd"/></a>
                                    </div>
                                    <div class="item">
                                
                                        <img class="img-responsive lot" src="/temafrontend/images/p2.jpg" alt=""/>
                                    </div>
                                    <div class="item">
                                
                                        <img class="img-responsive lot" src="/temafrontend/images/p33.jpg" alt=""/>
                                    </div>
                                    <div class="item">
                            
                                    <img class="img-responsive lot" src="/temafrontend/images/p1.jpg" alt=""/>
                                    </div>
                                    <div class="item">
                                    
                                            <img class="img-responsive lot" src="/temafrontend/images/p1.jpg" alt=""/>
                                    </div>
                                        <div class="item">
                                    
                                            <img class="img-responsive lot" src="/temafrontend/images/p2.jpg" alt=""/>
                                    </div>
                                        <div class="item">
                                    
                                            <img class="img-responsive lot" src="/temafrontend/images/p33.jpg" alt=""/>
                                    </div>
                                        <div class="item">
                                    
                                            <img class="img-responsive lot" src="/temafrontend/images/p1.jpg" alt=""/>
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

@endsection