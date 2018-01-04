<div class="banner">
     
	       <div class="banner-inner">

	<div class="box-header with-border">
              <h3 class="box-title"></h3>
    </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  @foreach($banners as $key => $banner)
                    <li data-target="#carousel-example-generic" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                  @endforeach
                </ol>
                <div class="carousel-inner">
                  @foreach($banners as $key => $banner)
                  <div class="item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('image/beranda/'.$banner->gambar) }}" class="img-responsive img-banner" alt="{{ $banner->judul }}">
                    <div class="carousel-caption">
                     <h2>{{ $banner->judul }}</h2>
                    </div>
                  </div>
                  @endforeach
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
           
				</div>
      
  </div>