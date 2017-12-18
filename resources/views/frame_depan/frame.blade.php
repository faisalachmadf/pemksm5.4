<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>

@include('frame_depan.header')
</head>
<body>
@include('frame_depan.navheader')

 <!-- Isi Konten -->
  	@yield('content')
    

	@include('frame_depan.kanan')
		
			
			  
	@include('frame_depan.footer')
		
	
	<!--/start-copyright-section-->
	@include('frame_depan.script')

</body>
</html>
<!--/Footer berakhir-->			