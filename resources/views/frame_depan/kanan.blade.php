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
                            <h4 class="side" >FILE DAN PENGUMUMAN</h4>
                            <ul class="stay">
                                <!-- di isi dengan tabel Publikasis -->
                                @foreach($publikasis ? $publikasis :[] as $publikasi)
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


				
	                <br/>

				    <h4 class="side">Popular Posts</h4>
                        <div class="edit-pics"> 
                            <!-- DI isi dengan Tabel Beritas yang terbanyak jumlah Kliknya (Dibacanya) -->
                            @foreach(@$populars ? $populars : [] as $popular)
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
							<!--//edit-pics-->
							<br/>
							<div class="connect">
	                            <h4 class="side">Layanan Publik</h4>
	                            <ul class="stay">
	                                <!-- DI isi dengan Tabel layanans -->
	                            @foreach(@$layanans ? $layanans : [] as $layanan)
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
						<div class="clearfix"></div>
						</div>