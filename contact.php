<!DOCTYPE html>
<html lang="en">
<?php include ("include/head.php");?>

	<body>

		<!-- Page Content -->
		
		<div class="page-content">
			<?php $active = "contact"; include ("include/header.php");?>
			
			<section class="section-parallax text-light with-overlay page-custom-header no-margin-top no-margin-bottom" style="background-image:url('images/contx.jpeg');background-position:100%;">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
							<br><br><br><br><br><br><br><br><br><br>
								<h3 class="subtitle">Contact Us</h3>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section class="ss-style clearfix top no-margin pad-bot-50" style="background: #f6f6f6;">			
				<div class="container">    	
					<div class="row">
						<div class="col-sm-12">
							<h4 class="text-uppercase text-center" style="margin-top:50px;"><strong>We would love to hear from you</strong></h4>
							<div class="symbol text-center">
								<i class="fa fa-heart" style="background-color:#f6f6f6;color: rgb(160, 4, 35);"></i>
								<hr/>
							</div>
							
							<!-- Contact Form -->
			
							<form  method="post" action="php/contact.php" class="form-theme form-transparent-dark">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" name="NAME" placeholder="Enter Name"/>
										</div>
									<div class="form-group">
										<input type="email" class="form-control" name="EMAIL" placeholder="Enter Email"/>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="SUBJECT" placeholder="Enter Message Subject"/>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="PHONE_NUMBER" placeholder="Enter Phone Number"/>
									</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<textarea class="form-control form-text-area" name="MESSAGE" placeholder="Enter Message" style="height: 132px;"></textarea>
										</div>
										<button type="submit" class="btn btn-hollow-dark btn-full-width text-uppercase"><strong>Submit</strong></button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					<!-- Contact Details -->
			
					<div class="row pad-top-50">
						<div class="col-md-4 text-center">
							<div class="tile">
								<i class="fa fa-envelope fa-3x fb-clear"></i>
								<h3 class="tile-title"><a href="#">mahmoudalkawajah@gmail.com</a></h3>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<div class="tile">
								<i class="fa fa-phone fa-3x fb-clear"></i>
								<h3 class="tile-title"><a href="#">(+962)788 100 621</a></h3>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<div class="tile">
								<i class="fa fa-eye fa-3x fb-clear"></i>
								<ul class="social-icons list-inline list-unstyled si-1 color no-margin">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</section>
		
			<!-- Footer -->
			<?php $ref='contact.php'; include ("include/footer.php");?>
			<!-- End of Footer -->
		</div><!-- End of Page Content -->
	
		
		<!-- Loading Third Party Scripts -->

		<script src="third-party/jquery/jquery.min.js"></script>
		<script src="third-party/bootstrap/js/bootstrap.min.js"></script>	
		<script src="third-party/knobs/js/jquery.knob.js"></script>
		<script src="third-party/nivo-lightbox/js/nivo-lightbox.min.js"></script>
		<script src="third-party/owl/js/owl.carousel.js"></script>
		<script src="third-party/isotope/js/isotope.pkgd.min.js"></script> 
		<script src="third-party/counter-up/js/jquery.counterup.min.js"></script>
		<script src="third-party/form-validation/js/formValidation.js"></script>
		<script src="third-party/form-validation/js/framework/bootstrap.min.js"></script>
		<script src="third-party/waypoint/js/waypoints.min.js"></script>
		<script src="third-party/wow/js/wow.min.js"></script>
		<script src="third-party/vticker/js/vticker.min.js"></script>
		<script src="third-party/smooth-scroll/js/smoothScroll.js"></script>
		
		
		<!-- Loading Demo Panel's Script -->

		<script src="js/demo.min.js"></script>

		<!-- Loading Theme's Scripts -->

		<script src="js/scripts.js"></script>
		<script src="js/formsValidator.min.js"></script>
		<script src="js/custom.js"></script>
		
		<!-- Google Analytics Tracking -->
		
		<script type="text/javascript">

			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-58677854-5']);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		
		</script>
		
    </body>

</html>