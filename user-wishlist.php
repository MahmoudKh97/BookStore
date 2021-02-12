<?php
include("php/connect.php");
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
			
			<section class="section-parallax text-light with-overlay page-custom-header no-margin-top no-margin-bottom " style="background-image:url('images/catx7.jpg');background-position:100%;">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
							<br><br><br>
								<h3 class="subtitle">Wishlist</h3>
							</div>
						</div>
					</div>
				</div>
			</section><!-- End of Page header -->
			<br><br><br><br>

			<!-- Wishlist -->
			<div class="container cart">
				<div class="row">

					<div class="col-md-12 col-xs-12">       
						<table class="table table-condensed table-cart">
							<tr>
							  <th>Product</th>
							  <th>Price</th>
							  <th>Add To Cart</th>
							  <th><span class="read-only">Remove</span></th>
							</tr>
							
							<!-- Product 1 -->
							<?php
								$query = "SELECT * FROM `wishlist` WHERE `USER_ID`=$user_id ORDER BY `ID` DESC";
								$result = $link->query($query);
								while($array = $result->fetch_array()){
									$product_id = $array["PRODUCT_ID"];
									$query1 = "SELECT `products`.*, `products_images`.*
									FROM `products` , `products_images` 
									WHERE `products`.`ID`=$product_id AND `products`.`ID`=`products_images`.`PRODUCT_ID`";
									$result1 = $link->query($query1);
									$array1 = $result1->fetch_array();
									$name = $array1["NAME"];
									$price= $array1["PRICE"];
									$image = $array1["IMAGE"];
								echo '
							<tr style="background: #f9f9f9;">
								<td class="cart-item-details">
									<div class="cart-item">
										<a class="item thumbnail pull-left" href="single-product.php?product_id='.$product_id.'">
											<img alt="image" src="BookStore/'.$image.'">
										</a>
										<p class="cart-item-name" style="text-align:center;"><a>'.$name.'</a></p>
									</div>
								</td>
								<td class="cart-item-price" style="color:#9b1c31;">'.$price.'</td>
								<td class="cart-item-quantity">
									<button type="button" id="cart" title="'.$product_id.'" class="quantity qtyminus btn btn-theme">Add To Cart</button>
								</td>
								<td><a id="'.$product_id.'" href="php/remove_from_wishlist.php?PRODUCT_ID='.$product_id.'&USER_ID='.$user_id.'"><i class="fa fa-trash-o"></i></a></td>
							</tr><!-- End of Product 1 -->
								';}
							?>
							
							
						</table>
					</div>
					
					
				</div>
			</div>
  
			<!-- Footer -->
			<?php $ref='user-wishlist.php'; include ("include/footer.php");?>
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
		var product_id = $(this).attr('title');
        var quantity = 1;

        $.ajax({
            url: 'php/add_to_cart.php',
            type: 'POST',
            data: { USER_ID:user_id, PRODUCT_ID:product_id, QUANTITY:quantity },
			dataType: 'json',
            success: function(data)
            {
				
                alert(data.response);
				var href = $('#' + product_id).attr('href');
				window.location.href = href;
            }
        })
    });
	
	
});
</script>			
    </body>

</html>