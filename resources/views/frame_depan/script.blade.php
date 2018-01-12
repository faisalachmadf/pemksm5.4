<div class="copyright">
					<p>&copy; 2015 BIRO PEMERINTAHAN DAN KERJA SAMA | SUBBAG PERENCANAAN DAN KETATAUSAHAAN</p>
				</div>
				<!--start-smoth-scrolling-->
						<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


<!--JS-->
<script type="text/javascript" src="/temafrontend/js/bootstrap-3.1.1.min.js"></script>
<!-- jQuery -->
<script src="{{ asset('/adminkelola/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!--Date Picke -->
<script src="{{ asset('/adminkelola/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
    	format: "yyyy-mm-dd",
      autoclose: true
    })

  })
</script>