
<!DOCTYPE HTML>
<html>
<head>
@include('frame_depan.header')

</head>
<body>

@include('frame_depan.navheader')

   <!--/start-banner-->
@include('frame_depan.partindex.bannerindex')
    <!--//end-banner-->
 <!--/start-main-->
   <div class="main-content">
	   <div class="container">
	     @include('frame_depan.partindex.content')  
	    </div>
    </div>
 <!--//end-main-->
 <!--/start-footer-section-->
	
			   @include('frame_depan.footer')  
	
	<!--//end-footer-section-->
			<!--/start-copyright-section-->
				@include('frame_depan.script')
<!--//JS-->
</body>
</html>