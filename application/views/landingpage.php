<!DOCTYPE html>
<html lang="en">
<head>
	<title>ikanku.net</title>
	
    <link rel="apple-touch-icon" href="images/icons/maskable_icon1.png">
	<link rel="manifest" href="manifest.json">
	<meta name="theme-color" content="#3367D6">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?base_url()?>Assets/asset/images/icons/logoikanku.webp"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?base_url()?>Assets/asset/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?base_url()?>Assets/asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?base_url()?>Assets/asset/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?base_url()?>Assets/asset/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?base_url()?>Assets/asset/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?base_url()?>Assets/asset/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<!--  -->
	<div class="simpleslide100">
		<div class="simpleslide100-item bg-img1" style="background-image: url('<?base_url()?>Assets/asset/images/perahu.jpg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('/images/perahu.webp');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('/images/perahu.webp');"></div>
	</div>

	<div class="size1 overlay1">
		<!--  -->
		<div class="w-full flex-w flex-sb-m p-l-65 p-r-80 p-t-22 p-b-185 p-lr-15-sm respon8">
			<div class="wrappic1 m-r-30 m-t-10 m-b-10">
				<a id="ikanku" href="<?base_url()?>application/controllers/Auth.php"><img src="/images/icons/logoikanku.webp" alt="LOGO" height="67" weight="67"></a>
			</div>

			<div class="flex-w m-t-10 m-b-10">
			    <a id="ikankulogin" href="<?base_url()?>application/controllers/Auth.php"><button id="tombolikanku" class="size2 m1-txt1 flex-c-m how-btn1 trans-04" >Login
						</button></a>
			</div>
		</div>

		<!--  -->
		<div class="flex-sb flex-row-rev where3-parent p-l-58 p-r-46 respon2">
			<!--  -->
			
			<div class="where3 wsize2 respon1">
			    
				<h3 class="l1-txt2 p-b-30 respon6 respon7">
					ikanku.net
				</h3>
				<p class="m2-txt1 respon6">
					A developing web based e-logbook for fishery project by Nabila Kiswanto
						
				</p>

				
			</div>

		
			<div class="flex-w flex-col where2 respon5">
				<a id="nabs_email" href="mailto:nabila@ikanku.net" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
					<i class="fa fa-envelope"></i>
				</a>

				<a id="nabs_linkedin" href="https://linkedin.com/in/nabila-pratiwi-kiswanto-786815194" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
					<i class="fa fa-linkedin-square"></i>
				</a>
			</div>

		</div>

			
	</div>
<!--register sw-->
<script>
// Check that service workers are supported
if ('serviceWorker' in navigator) {
  // Use the window load event to keep the page load performant
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/pwabuilder-sw.js');
  });
}
</script>

<!--===============================================================================================-->	
	<script src="<?base_url()?>Assets/asset/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?base_url()?>Assets/asset/vendor/bootstrap/js/popper.js"></script>
	<script src="<?base_url()?>Assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?base_url()?>Assets/asset/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?base_url()?>Assets/asset/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?base_url()?>Assets/asset/js/main.js"></script>
<script type="module">
    import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

const el = document.createElement('pwa-update');
document.body.appendChild(el);
</script>
</body>
</html>
