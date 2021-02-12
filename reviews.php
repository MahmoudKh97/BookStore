<?php
include("php/connect.php");
if(isset($_POST["product_id"]) && isset($_POST["order_id"])){
	$product_id = $_POST["product_id"];
	$order_id = $_POST["order_id"];
}else{
	echo '<script type="text/javascript">window.location.href="user-account.php";</script>';
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include ("include/head.php");?>

	<body>

		<!-- Page Content -->
		
		<div class="page-content">
		
			<!-- Page Header -->
				
			<?php $active = ""; include ("include/header.php");
				if($user_id > 0){
					$user_id = $_SESSION["USER"] ;
				}else{
					$user_id = 0;
					echo '<script type="text/javascript">window.location.href="user-login.php";</script>';
				}
			?>
			
			<section class="section-parallax text-light with-overlay page-custom-header no-margin-top no-margin-bottom " style="background-image:url('images/catx6.jpg');background-position:100%;">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
							<br><br><br>
								<h3 class="subtitle">Leave a Review</h3>
							</div>
						</div>
					</div>
				</div>
			</section><!-- End of Page header -->
			<br><br><br><br>

			
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">

							<div class="col-sm-4">
							
								<!-- Product Image Slider -->
					
								<div class="slider-wrapper theme-default shop-carousel">
									<div id="slider-shop" class="nivoSlider">
									<?php
								$query1 = "SELECT * FROM `products_images` WHERE `PRODUCT_ID`=$product_id";
								$result1 = $link->query($query1);
								while($array1 = $result1->fetch_array()){
									$image = $array1["IMAGE"];
								echo '
								<a href="BookStore/'.$image.'" data-lightbox-gallery="gallery1" class="nivo-imageLink">
									<img alt="image" src="BookStore/'.$image.'"
										data-thumb="BookStore/'.$image.'"/>
								</a>
								';}?>
									</div>
								</div> <!-- End of Product Image Slider -->
							</div>
							<div class="col-sm-6 product-header">
							
								<!-- Product Options  -->
							<?php
							$query = "SELECT * FROM `orders` WHERE `ORDER_ID`=$order_id AND `PRODUCT_ID`=$product_id ";
							$result = $link->query($query);
							$array = $result->fetch_array();
								$quantity = $array["QUANTITY"];
								$amount = $array["AMOUNT"];
								$time = $array["TIME"];
							$query1 = "SELECT * FROM `products`	WHERE `ID`=$product_id ";
							$result1 = $link->query($query1);
							$array1 = $result1->fetch_array();
								$name = $array1["NAME"];
								$price = $array1["PRICE"];
								$description = $array1["DESCRIPTION"];
								
							?>
						<div class="thumbnail shop">
							<div class="row inner">
								<div class="col-xs-6 text-left no-padding">
									<div class="rows">Product Name: </div><br>
									<div class="rows">Price:</div><br>
									<div class="rows">Quantity:</div><br>
									<div class="rows"><b><span class="md-hidden">Amount Paid: </span></b></div><br>
									<div class="rows">Product Info:</div>
								</div>
								<div class="col-md-6 col-xs-6 text-left  no-padding-right">
									<div class="rows sub-total"><?php echo $name; ?></div><br>
									<div class="rows shipping-cost">JOD <?php echo $price; ?></div><br>
									<div id="discount" class="rows discount"><?php echo $quantity; ?> </div><br>
									<div id="grand_total" class="rows total"><b>JOD <?php echo $amount; ?></b></div><br>
									<div class="rows shipping-cost"><?php echo $description; ?></div>
								</div>
							</div>		
						</div><!-- End of Product Options  -->
							</div>
							
							<!-- Product Info -->
								
							<div class="col-md-12">
								<div class="comment-form-container">
									<div class="row form-transparent-dark form-md">
									<?php
									$query = "SELECT * FROM `reviews` WHERE `ORDER_ID`=$order_id AND `PRODUCT_ID`=$product_id ";
									$result = $link->query($query);
									if ($result->num_rows > 0) {
										$array = $result->fetch_array();
										$rating = $array["RATING"];
											if($rating == '1'){$checked1 = 'checked';$checked2 = '';$checked3 = '';$checked4 = '';$checked5 = '';}
											else if($rating == '2'){$checked1 = '';$checked2 = 'checked';$checked3 = '';$checked4 = '';$checked5 = '';}
											else if($rating == '3'){$checked1 = '';$checked2 = '';$checked3 = 'checked';$checked4 = '';$checked5 = '';}
											else if($rating == '4'){$checked1 = '';$checked2 = '';$checked3 = '';$checked4 = 'checked';$checked5 = '';}
											else if($rating == '5'){$checked1 = '';$checked2 = '';$checked3 = '';$checked4 = '';$checked5 = 'checked';}
										$review = $array["REVIEW"];
										if($review == ''){$placeholder = 'Write Your Review Here (optional)'; }
										else{$placeholder = '';}
									?>
										<form method='POST' action='php/reviews.php' >
														  
											<input type="hidden" name="action" value="edit">
															
											<input type="hidden" name="PRODUCT_ID" value="<?=$product_id?>">
											<input type="hidden" name="ORDER_ID" value="<?=$order_id?>">
											<input type="hidden" name="USER_ID" value="<?=$user_id?>">
											<div class="col-xs-12">
												<h4><strong>Update Your Review </strong></h4>
												<p>How do you rate this product? *</p>
												<div class="rating pad-bot-10">
													<input type="radio" id="star5" name="RATING" value="5" <?=$checked1?> required /><label for="star5" title="Rocks!"></label>
													<input type="radio" id="star4" name="RATING" value="4" <?=$checked2?> /><label for="star4" title="Pretty good"></label>
													<input type="radio" id="star3" name="RATING" value="3" <?=$checked3?> /><label for="star3" title="Meh"></label>
													<input type="radio" id="star2" name="RATING" value="2" <?=$checked4?> /><label for="star2" title="Kinda bad"></label>
													<input type="radio" id="star1" name="RATING" value="1" <?=$checked5?> /><label for="star1" title="Sucks big time"></label>
												</div> 
											</div>
											<div class="col-xs-12">
												<div class="form-group">
													<textarea class="form-control form-text-area" name="REVIEW"  placeholder="<?=$placeholder?>"><?=$review?></textarea>
												</div>
												<h6>- Your review will be displayed in the product page. </h6>
												<h6>- You can always update your review. </h6>
												<button type="submit" class="btn btn-hollow-dark text-uppercase"><strong>Submit</strong></button>
											</div>
										</form>
									<?php
									}else{
									?>
										<form method='POST' action='php/reviews.php' >
														  
											<input type="hidden" name="action" value="add">
															
											<input type="hidden" name="PRODUCT_ID" value="<?=$product_id?>">
											<input type="hidden" name="ORDER_ID" value="<?=$order_id?>">
											<input type="hidden" name="USER_ID" value="<?=$user_id?>">
											<div class="col-xs-12">
												<h4><strong>Leave a Review </strong></h4>
												<p>How do you rate this product? *</p>
												<div class="rating pad-bot-10">
													<input type="radio" id="star5" name="RATING" value="5" required /><label for="star5" title="Rocks!"></label>
													<input type="radio" id="star4" name="RATING" value="4" /><label for="star4" title="Pretty good"></label>
													<input type="radio" id="star3" name="RATING" value="3" /><label for="star3" title="Meh"></label>
													<input type="radio" id="star2" name="RATING" value="2" /><label for="star2" title="Kinda bad"></label>
													<input type="radio" id="star1" name="RATING" value="1" /><label for="star1" title="Sucks big time"></label>
												</div> 
											</div>
											<div class="col-xs-12">
												<div class="form-group">
													<textarea class="form-control form-text-area" name="REVIEW" placeholder="Write Your Review Here (optional)"></textarea>
												</div>
												<h6>* Required </h6>
												<h6>- Your review will be displayed in the product page. </h6>
												<h6>- You can always update your review. </h6>
												<button type="submit" class="btn btn-hollow-dark text-uppercase"><strong>Submit</strong></button>
											</div>
										</form>
									<?php
									}
									?>
									</div>	
								</div> <!-- End of Comment Form -->
							</div> <!-- End of Product Info -->	
						</div>
					</div>
					
					
				</div>
			</div>
  
			<!-- Footer -->
			<?php $ref='single-product.php'; include ("include/footer.php");?>
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
		
		<!-- Loading Page's scripts -->
		
		<script src="third-party/nivo-slider/js/jquery.nivo.slider.js"></script>
		
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