<div class="col-md-4 mag-inner-right">
                 
                 <div class="connect">
					<h4 class="side" >Bahasa  &nbsp<i class="fa fa-language"></i></h4>
					 <div class="edit-pics"> 
							    
					<div id="google_translate_element" style="float:center; width: 100%; "></div>
					<script type="text/javascript">
					function googleTranslateElementInit() {
					  new google.translate.TranslateElement({pageLanguage: 'id', includedLanguages: 'ar,en,fr,hu,ja,ko,ru,su,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
					}
					</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
					</script>
								
					</div>
				</div>
				<br/>


                <div class="connect">
                            <h4 class="side" >FILE DAN PENGUMUMAN  &nbsp<i class="fa fa-bullhorn"></i></h4>
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
                                @foreach(@$publikasis ? $publikasis : [] as $publikasi)
                                <div class="editor-pics">
                                    <div class="item-details">
                                        <h5 class="inner two"><a href="{{ route('Publikasi.unduh', [$publikasi->katfile->slug, $publikasi->slug]) }}"><i class="glyphicon glyphicon-download"></i>  {{ $publikasi->judul }}</a></h5>
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

               @foreach(@$populars2 ? $populars2 : [] as $popular2)
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
                              
              </div>
             
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
                               
                            </ul>
                        </div>


				
	                <br/>

				    <h4 class="side">BERITA TERPOPULER &nbsp<i class="fa fa-bookmark"></i></h4>
                        <div class="edit-pics"> 
                            <!-- DI isi dengan Tabel Beritas yang terbanyak jumlah Kliknya (Dibacanya) -->
                            @foreach(@$populars ? $populars : [] as $popular)
                                <div class="editor-pics">
                                    <div class="col-md-3 item-pic">
                                        <img src="{{ asset('image/berita/thumbnail/'.$popular->gambar) }}" class="img-responsive" alt="{{ $popular->judul }}"/>

                                    </div>
                                    <div class="col-md-9 item-details">
                                        <h5 class="inner two"><a href="{{ route('Berita', [$popular->katberita->slug, $popular->slug]) }}">{{ $popular->judul }}</a></h5>
                                        <div class="td-post-date two">
                                            <i class="glyphicon glyphicon-time"></i>{{ date('d M Y', strtotime($popular->tanggal)) }} <a href="#"><i class="glyphicon glyphicon-eye-open"></i>{{ $popular->dibaca }}</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            @endforeach
                            <a href="{{ route('Berita', ['popular']) }}">
                                <h6>Berita Popular Lainnya &raquo;</h6>
                            </a>
                        </div>
							<!--//edit-pics-->
							<br/>
							<div class="connect">
	                            <h4 class="side">Layanan Publik &nbsp<i class="fa fa-users"></i></h4>
	                            <div class="edit-pics"> 
	                                <!-- DI isi dengan Tabel layanans -->
	                            @foreach(@$layanans ? $layanans : [] as $layanan)
	                                <div class="editor-pics">
	                                    <div class="col-md-3 item-pic">
	                                        <img src="{{ asset('image/layanan/thumbnail/'.$layanan->file) }}" class="img-responsive" alt="{{ $layanan->judul }}" class="img-responsive "  />

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
                             <div class="connect">
                                <script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>
                            <div id="gpr-kominfo-widget-container"></div>
                        </div>
						<div class="clearfix"></div>
						</div>
						<br>