<!DOCTYPE html>
<html lang="en" >
<?php include ("include/head.php");?>
	<body>

		<div class="page-content" >
			<?php $active = "categories"; include ("include/header.php");?>
			
			<!-- Page Header -->
			
			<section class="section-parallax text-light with-overlay page-custom-header no-margin-top " style="background-image:url('images/catx6.jpg') ; background-position:100%; opacity: 0.9;">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
							<br><br><br><br><br><br><br><br><br><br>
								<h3 class="subtitle">Categories</h3>

						

							</div>
						</div>
					</div>
				</div>
			</section><!-- End of Page header -->
			
			<!-- Category -->
				
			<ul class="grid grid-4 portfolio filterArea list-unstyled text-center" >
			
				<!-- Portfolio Item -->
				<?php
				include("php/connect.php");

				$query = "SELECT * FROM `category`";
				$result = $link->query($query);
				while($array = $result->fetch_array()){
					$category = $array["CATEGORY"];
					$category_id = $array["ID"];
					$image = $array["IMAGE"];

					echo '
				<li class="webdesignn">
				<a href="#'.$category.'">
					<figure class="effect-1" >
						<img class="img-responsive" src="BookStore/'.$image.'" style="height:300px;width:100%;" />
						<figcaption>
							<h3>'.$category.'</h3>
							<span><i class="fa fa-chevron-down"></i></span>
						</figcaption>				
					</figure>
				</a>
				</li>';}
				?>

			</ul> <!-- End of Portfolio 4 Grid -->
		
			<!-- End of category -->
			
			
			
			
			<!-- Sub Category -->

			<?php
				$query = "SELECT * FROM `category`";
				$result = $link->query($query);
				while($array = $result->fetch_array()){
					$category = $array["CATEGORY"];
					$category_id = $array["ID"];
				echo'
				<div class="container" id="'.$category.'">
				</br></br></br>
				<div class="row">
					<div class="col-md-12">
						<h2><strong>'.$category.'</strong></h2>
						<hr class="mar-top-30 mar-bot-30">
						<ul class="grid grid-4 portfolio filterArea list-unstyled text-center" >
					';	
				$query1 = "SELECT * FROM `sub_category` WHERE `CATEGORY`=$category_id";
				$result1 = $link->query($query1);
				while($array1 = $result1->fetch_array()){
					$sub_category = $array1["SUB_CATEGORY"];
					$sub_category_id = $array1["ID"];
					$image = $array1["IMAGE"];
					echo '
							<li class="webdesignn col-sm-3">
							<a href="products.php?category_id='.$category_id.'&sub_category_id='.$sub_category_id.'&category='.$category.'&sub_category='.$sub_category.'">
								<figure class="effect-1" >
									<img class="img-responsive" src="BookStore/'.$image.'" style="height:200px;width:100%;" />
									<figcaption>
										<h5>'.$sub_category.'</h5>
										<span><i class="fa fa-th"></i></span>
									</figcaption>				
								</figure>
							</a>
							</li>';}
					echo '
						</ul> 
				</div></div></div><br><br>';}
			?>
			
			<!-- End of sub category -->
			
			
			
			<!-- Footer -->
			<?php $ref='categories.php'; include ("include/footer.php");?>
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
		<script src="js/main.js"></script>
		<script src="js/jquery-3.4.1.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/typed.min.js"></script>
		<script src="js/jquery.easypiechart.min.js"></script>
		<script src="js/venobox.min.js"></script>
		<script src="js/aos.js"></script>
	
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