<?php
include("php/connect.php");
$product_id = $_GET["product_id"];
$query = "SELECT * FROM `products` WHERE `ID`=$product_id";
$result = $link->query($query);
while($array = $result->fetch_array()){
	$name = $array["NAME"];
	$price= $array["PRICE"];
	$old_price = $array["OLD_PRICE"];
	$description = $array["DESCRIPTION"];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("include/head.php");?>

	<body>

		<!-- Page Content -->
		
		<div class="page-content">
		
			<!-- Page Header -->
				
			<?php $active = "categories"; include ("include/header.php");?>
			
			<section class="section-parallax text-light with-overlay page-custom-header no-margin-top no-margin-bottom " style="background-image:url('images/product.jpg');background-position:100%;">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
							<br><br>
								<h3 class="subtitle"></h3>
							</div>
						</div>
					</div>
				</div>
			</section><!-- End of Page header -->
			<br><br><br><br>

			
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">

							<div class="col-sm-5">
							
								<!-- Product Image Slider -->
					
								<div class="slider-wrapper theme-default shop-carousel">
									<div id="slider-shop" class="nivoSlider">
									<?php
								$wishlist = ($user_id > 0)? "wishlist":"go-login1";
								$cart = ($user_id > 0)? "cart":"go-login2";
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
							<div class="col-sm-7 product-header">
							
								<!-- Product Options + Add to Cart -->
							
								<div class="thumbnail shop">
								<h2 class="no-margin-top"><strong><?php echo $name; ?></strong></h2>
								<span class="user-rating-big"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> (5 Reviews) 
								<br><br>
									<span class="label label-danger sale-label">Save 50%</span><h4 class="wlabel"><s class="sale-strike"><?php echo $old_price; ?> JOD</s></h4>
									<h3><strong><?php echo $price; ?> JOD</strong></h3>
											
									<br/>
									
									<form id='qtyform' method='POST' action='#'>
										<input type='button' value='-' class='qtyminus' title='quantity' />
										<input type='text' name='quantity' value='1' class='qty'/>
										<input type='button' value='+' class='qtyplus' title='quantity' />
									</form>
									<?php echo'
									<a id="'.$cart.'" class="btn btn-theme btn-lg cart-btn">Add To Cart</a>
									<a id="'.$wishlist.'" class="btn btn-hollow-dark save-btn"><i class="fa fa-heart"></i> Add To Wishlist</a>
									';?>
								</div><!-- End of Product Options + Add to Cart -->
							</div>
							
							<!-- Product Info -->
								
							<div class="col-md-12">
								<hr class="faded mar-top-30 mar-bot-50"/>
								<h3><strong>Product Info</strong></h3>
								<p><?php echo $description; ?></p>	
								<?php
								$query = "SELECT  COUNT(*) AS num_comments FROM `reviews` WHERE `PRODUCT_ID`=$product_id AND `REVIEW`!='' LIMIT 1";
								$result = $link->query($query);
								$array = $result->fetch_array();
								$num_comments = $array["num_comments"];
								?>
								<div class="panel-group no-border" id="accordion-review">
									<div class="panel panel-default">
										<div class="panel-heading collapsed" data-toggle="collapse" data-parent="#accordion-review" data-target="#collapse-review">
											<h4 class="panel-title chevron accordion-toggle">
												Comments (<?=$num_comments?>)
											</h4>
										</div>
										<div id="collapse-review" class="panel-collapse collapse">
											<div class="panel-body">
												<section class="comments">
													<ul>
													<?php
													$query = "SELECT * FROM `reviews` WHERE `PRODUCT_ID`=$product_id AND `REVIEW`!='' ORDER BY `TIME` DESC, `ID` DESC ";
													$result = $link->query($query);
													if ($result->num_rows > 0) {
														while($array = $result->fetch_array()){
															$username = $array["USERNAME"];
															$rating = $array["RATING"];
															if($rating == 1){
																$stars = '<i class="fa fa-star"></i><i class="fa fa-star" style="color:#ddd;"></i><i class="fa fa-star" style="color:#ddd;"></i><i class="fa fa-star" style="color:#ddd;"></i><i class="fa fa-star" style="color:#ddd;"></i>';}
															else if($rating == 2){
																$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star" style="color:#ddd;"></i><i class="fa fa-star" style="color:#ddd;"></i><i class="fa fa-star" style="color:#ddd;"></i>';}
															else if($rating == 3){
																$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star" style="color:#ddd;"></i><i class="fa fa-star" style="color:#ddd;"></i>';}
															else if($rating == 4){
																$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star" style="color:#ddd;"></i>';}
															else if($rating == 5){
																$stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';}
															
															$review = $array["REVIEW"];
															$time = $array["TIME"];
													?>
														<!-- Comment -->
														<li>
															<span class="comment-name" style="position:static;"><?=$username?> </span>
															<span class="comment-date" style="position:static;"> <?=$time?> </span>
															<span class="user-rating">Rating: <?=$stars?></span>
															<div class="comment-content"><?=$review?></div>
														</li> <!-- End of Comment -->
													<?php
														}
													}else{
													?>
														<li>0 comments</li>
													<?php
													}
													?>													
													</ul>
												</section>
											</div>
										</div>
									</div>
								</div> 
		
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
<script>
$(document).ready(function()
{
    $('#cart').on('click', function()
    {
        var user_id = "<?php echo $user_id; ?>";
        var product_id = "<?php echo $product_id; ?>";
        var quantity = $('.qty').val();

        $.ajax({
            url: 'php/add_to_cart.php',
            type: 'POST',
            data: { USER_ID:user_id, PRODUCT_ID:product_id, QUANTITY:quantity },
			dataType: 'json',
            success: function(data)
            {
                alert(data.response);
				window.location.href = "single-product.php?product_id="+product_id;
            }
        })
    });
	
	$('#wishlist').on('click', function()
    {
        var user_id = "<?php echo $user_id; ?>";
        var product_id = "<?php echo $product_id; ?>";
        var quantity = $('.qty').val();

        $.ajax({
            url: 'php/add_to_wishlist.php',
            type: 'POST',
            data: { USER_ID:user_id, PRODUCT_ID:product_id, QUANTITY:quantity },
			dataType: 'json',
            success: function(data)
            {
                alert(data.response);
				window.location.href = "single-product.php?product_id="+product_id;
            }
        })
    });
	
	$('#go-login1').on('click', function()
    {
		window.location.href = "user-login.php";
    });
	
	$('#go-login2').on('click', function()
    {
		window.location.href = "user-login.php";
    });
});
</script>	
    </body>

</html>