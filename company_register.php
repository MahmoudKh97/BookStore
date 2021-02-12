<!DOCTYPE html>
<html lang="en">
<?php include ("include/head.php");?>

	<body>

		<div class="page-content">
			<?php $active = "company"; include ("include/header.php");?>
			
			<!-- Page Header -->
			
			<section class="section-parallax text-light with-overlay page-custom-header no-margin-top no-margin-bottom" style="background-image:url('images/catx6.jpg');background-position:100%;">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
							<br><br><br><br><br><br>
								<h3 class="subtitle">Register</h3>
							</div>
						</div>
					</div>
				</div>
			</section><!-- End of Page header -->
			
			<!-- Content -->
		
			<div class="container pad-top-50">
				<div class="row">
					
					<div class="col-md-8 col-md-offset-2 text-center">
						<h4 class="text-uppercase no-margin-top"><strong>Be one of the team and join us!</strong></h4>
						<h3 class="text-center">
							<i><strong>SignUp</strong></i>
						</h3>
							<!-- Sign Up Form -->

						<form method="post" action="php/company.php" id="signup" class="row form-horizontal pad-top-20">
							<div class="col-sm-9 col-sm-offset-2"> 
								<div class="col-sm-12"> 
									<div class="form-group">
										<p class="">Please, enter a valid email of your company.</p>
										<input type="text" class="form-control" name="EMAIL" placeholder="Email*" id="EMAIL_SIGNUP" required />
									</div>
								</div>
								
							<div id="SIGNUP_FORM">
								

								<div class="col-sm-12"> 
									<div class="form-group">
										<input type="password" class="form-control" name="PASSWORD" placeholder="Password*" required id="password"
										pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
									</div>
								</div>
								<div class="col-sm-12"> 
									<div class="form-group">
										<input type="password" class="form-control" name="CONFIRM_PASSWORD" placeholder="Confirm Password*" id="confirm_password" required />
										<span id='message'></span>
									</div>
								</div>
								<div class="col-sm-12"> 
									<div class="form-group">
										<input type="text" class="form-control" name="NAME" placeholder="Company Name*" required />
									</div>
								</div>
								<div class="col-sm-12"> 
									<div class="form-group">
										<input type="text" class="form-control" name="PHONE_NUMBER" placeholder="Phone Number*" required />
									</div>
								</div>

								<div class="col-sm-12"> 
									<div class="form-group">
										<select class="form-control" name="COUNTRY" required >
											<option disabled select selected hidden >Country*</option>
											<?php include("include/country.php"); ?>
										</select>
									</div>
								</div>
								<div class="col-sm-12"> 
									<div class="form-group">
										<input type="text" class="form-control" name="CITY" placeholder="City*" required />
									</div>
								</div>
								<div class="col-sm-12"> 
									<div class="form-group">
										<input type="text" class="form-control" name="ADDRESS" placeholder="Address: street, building, department,...*" required />
									</div>
								</div>
								<div class="col-sm-12"> 
									<div class="form-group">
										<input type="text" class="form-control" name="ZIP_CODE" placeholder="Zip Code*" required />
									</div>
								</div>
								 <div class="col-sm-12"> 
									<div class="form-group">
										<div class="checkbox">
											<label style="font-size:14px;">
												By creating an account you agree to our <a href="#">terms and services.</a>
											</label>
											<br><br>
											<label style="font-size:14px;">
												** Your account will be verified and accepted after 24 hours. If not, please contact us at Book@admin.com or from our <a href="contact.php">Contact Us page</a>.
											</label>
										</div>
									</div>
								</div>
								<div class="col-md-12 col-md-offset-0 col-sm-6 col-sm-offset-3">  
									<div class="form-group text-center">
										<button id="submit" type="submit" class="btn btn-dark btn-theme btn-full-width text-uppercase" name="signup"><strong>Join</strong></button>
									</div>
								</div>
								
							</div>
							
							
							</div>
						</form> <!-- End of Sign Up Form -->

						<p class="pad-top-20 pad-bot-20">Great Discount Coupons, Loyalty Points, Priority Support, and Exclusive offers are some of the things we offer to our folks. Be sure to join our club if you are not already a member.</p>

					</div>
				</div>
			</div>

			
			
			<!-- Footer -->
			<?php $ref='about-us.php'; include ("include/footer.php");?>
			<!-- End of Footer -->
		</div><!-- End of Page Content -->
	
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
		
	
<script>
$(document).ready(function(){
	
	$("#SIGNUP_FORM").hide();
	
	$("#EMAIL_SIGNUP").on("click",function(){
		$("#SIGNUP_FORM").show("slide");;
	} );
	var match = '';
	$('#password, #confirm_password').on('keyup', function () {
		if ($('#password').val() == $('#confirm_password').val()) {
			$('#message').html('Matching').css('color', 'green');
			$("#submit").prop('disabled', false);
		} else {
			$('#message').html('Not Matching').css('color', 'red');
			$("#submit").prop('disabled', true);
		}
	});
	


} );
</script>
		
    </body>

</html>