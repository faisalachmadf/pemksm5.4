<div class="banner">
     <div class="container">
	       <div class="banner-inner">
						<div class="callbacks_container">
						<ul class="rslides callbacks callbacks1" id="slider4">
							<li class="callbacks1_on" style="display: block; float: left; position: relative; opacity: 1; z-index: 2; transition: opacity 500ms ease-in-out;">
								<div class="banner-info">
								<h3>WHAT IS LIKE TO WORK AS A SUPERMODEL ON WOMEN’S FASHION</h3>
								<p>Lorem ipsum dolor sit amet</p>
								</div>
							</li>
							<li class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
								<div class="banner-info">
								   <h3>FANTASTIC MAN MAGAZINE AND ITS INFLUENCE ON MEN’S FASHION</h3>
								 <p>Lorem ipsum dolor sit amet</p>
								</div>
							</li>
							<li class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
								<div class="banner-info">
								 <h3>WHAT IS LIKE TO WORK AS A SUPERMODEL ON WOMEN’S FASHION</h3>
								<p>Lorem ipsum dolor sit amet</p>
								</div>	
							</li>
						</ul>
						</div>
						<!--banner-Slider-->
						<script src="/temafrontend/js/responsiveslides.min.js"></script>
						 <script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
						auto: true,
						pager: true,
						nav:false,
						speed: 500,
						namespace: "callbacks",
						before: function () {
						  $('.events').append("<li>before event fired.</li>");
						},
						after: function () {
						  $('.events').append("<li>after event fired.</li>");
						}
						  });

						});
						  </script>
				</div>
        </div>
  </div>