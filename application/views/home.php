
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ikanku.net</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?base_url()?>Assets/asset/images/icons/logoikanku.png"/>
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
		<div class="simpleslide100-item bg-img1" style="background-image: url('<?base_url()?>Assets/asset/images/perahu.jpeg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('<?base_url()?>Assets/asset/images/perahu.jpeg');"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url('<?base_url()?>Assets/asset/images/perahu.jpeg');"></div>
	</div>

	<div class="size1 overlay1">
		<!--  -->
		
		<div class="w-full flex-w flex-sb-m p-l-65 p-r-80 p-t-22 p-b-185 p-lr-15-sm respon8">
			<center><div class="wrappic1 m-r-30 m-t-10 m-b-10">
				<a href="https://ikanku.net"><img  src="<?base_url()?>Assets/asset/images/icons/logoikanku.png" alt="LOGO" height="67" weight="67"></a>
			</div></center>

			<div class="flex-w m-t-10 m-b-10">
				<a href="<?=base_url(Auth)?>" class="size2 m1-txt1 flex-c-m how-btn1 trans-04">
					Log in
				</a>
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
					A web based e-logbook for fishery project 
				</p>
				<h5 class="m1-txt1 respon6" style="color:white">by Nabila Kiswanto</h5>
				
				

				<!--<form class="contact100-form validate-form p-t-55 w-full">
					<div class="wrap-input100 validate-input m-lr-auto-lg" data-validate = "Email is required: ex@abc.xyz">
						<input class="s2-txt1 placeholder0 input100 trans-04" type="text" name="email" placeholder="Email Address">

						<button class="flex-c-m ab-t-r size4 s1-txt1 hov1 trans-04">
							<i class="fa fa-paper-plane fs-15 cl0"></i>
						</button>
					</div>		
				</form>-->
			</div>

		

			<!--  -->
			<div class="flex-w flex-col where2 respon5">
				<!--<a href="#" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
					<i class="fa fa-facebook-official"></i>
				</a>-->

				<a href="https://twitter.com/nabsays" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
					<i class="fa fa-twitter-square"></i>
				</a>

				<a href="https://linkedin.com/in/nabila-pratiwi-kiswanto-786815194" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
					<i class="fa fa-linkedin-square"></i>
				</a>
			</div>

		</div>

			
	</div>



	

<!--===============================================================================================-->	
	<script src="<?base_url()?>Assets/asset/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?base_url()?>Assets/asset/vendor/bootstrap/js/popper.js"></script>
	<script src="<?base_url()?>Assets/asset/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?base_url()?>Assets/asset/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?base_url()?>Assets/asset/vendor/countdowntime/moment.min.js"></script>
	<script src="<?base_url()?>Assets/asset/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="<?base_url()?>Assets/asset/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="<?base_url()?>Assets/asset/vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 19,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="<?base_url()?>Assets/asset/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?base_url()?>Assets/asset/js/main.js"></script>

</body>
</html>