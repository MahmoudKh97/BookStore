<?php
include("php/connect.php");

$sub_category_id = $_GET["sub_category_id"];
$category_id = $_GET["category_id"];
$sub_category = $_GET["sub_category"];
$category = $_GET["category"];
?>
<!DOCTYPE html>
<html lang="en" >
<?php include ("include/head.php");?>
	<body>

		<div class="page-content" >
			<?php $active = "categories"; include ("include/header.php");?>
			
			<!-- Page Header -->
			
			<section class="section-parallax text-light with-overlay page-custom-header no-margin-top no-margin-bottom " style="background-image:url('images/products.jpg');background-position:100%;">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
							<br><br><br><br><br><br>
								<h3 class="subtitle">Products</h3>
							</div>
						</div>
					</div>
				</div>
			</section><!-- End of Page header -->

			<div>
				<div class="btHeading bt-md" >
					<div class="bottomHeading"><i class="fa fa-heart" style="color:#9b1c31;"></i></div>
					<div class="top-heading"><?php echo $category.' / '.$sub_category?></div>
				</div>
				
				<div class="container pad-top-50">
					<div class="row wow fadeInUp" data-wow-delay="500ms">
					<?php

					$query = "SELECT * FROM `products` WHERE `CATEGORY`=$category_id AND `SUB_CATEGORY`=$sub_category_id AND `STATUS`='active' ORDER BY `ID` DESC";
					$result = $link->query($query);
					while($array = $result->fetch_array()){
						$product_id = $array["ID"];
						$name = $array["NAME"];
						$price= $array["PRICE"];
						$old_price = $array["OLD_PRICE"];
					echo '
					<div class="col-md-3 col-sm-6 col-xs-6 pad-left-25 pad-right-25 pad-bot-50 ">
						<a href="single-product.php?product_id='.$product_id.'">
						<div class="product-thumbnail">
							
							<div class="product-image">
								';
								$query1 = "SELECT * FROM `products_images` WHERE `PRODUCT_ID`=$product_id LIMIT 1";
								$result1 = $link->query($query1);
								while($array1 = $result1->fetch_array()){
									$image = $array1["IMAGE"];
								echo '
								<div style="height:150px;width:70%;margin-left: auto;margin-right: auto;text-align: center;position: relative;">
									<img alt="image" class="img-responsive center-block" src="BookStore/'.$image.'" style="bottom:0px;position: absolute;"/>
								</div>
								<div class="thumbnail-btns">
									<a class="btn btn-small btn-theme" href="single-product.php?product_id='.$product_id.'"><i class="fa fa-heart"></i></a>
									<a class="btn btn-small btn-dark btn-theme" href="single-product.php?product_id='.$product_id.'"><i class="fa fa-shopping-cart"></i></a>
								</div>
								';}
								echo '
								<br><br>
							</div>
							<div class="product-info" style="height:100px;bottom:0px;">												
								<h3><a href="single-product.php?product_id='.$product_id.'">'.$name.'</a></h3>
								<p><s class="sale-strike">'.$old_price.'</s> <span class="price">'.$price.'</span> <span class="label label-danger">-50%</span></p>
							</div>
							
						</div>
						</a>
					</div>
						
						
					';}	
					?>	
					</div>
				</div>
			</div>
			
			
			
			
			<!-- Footer -->
			<?php $ref='products.php'; include ("include/footer.php");?>
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