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
				<div class="overlay" style="background-color: rgba(0, 0, 0, 0.6);">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
							<br><br><br><br><br>
								<h3 class="subtitle">Your Account</h3>
							</div>
						</div>
					</div>
				</div>
			</section><!-- End of Page header -->
			
				<div class="container pad-top-50 text-center no-padding-bottom">
					<div class="col-md-12">
						<h2 class="fancy-heading text-left">
							<strong><span style="color: rgb(160, 4, 35);">Your Orders:</span></strong>
						</h2>
					</div>
				</div>
					
			<div class="container cart">
				<div class="row">		
					<!-- Order Review -->
					
					<?php
					$sub_total = 0;
					$order_id = 0;
					$query = "SELECT * FROM `orders` WHERE `USER_ID`=$user_id ORDER BY `ID` DESC";
					$result = $link->query($query);
					while($array = $result->fetch_array()){
						if($order_id != $array["ORDER_ID"]){
							if($order_id != 0){
								echo'
								</table>
							</div>
							';
							}
							$order_id = $array["ORDER_ID"];
							/* Calculate total price */
							$query_sum = "SELECT SUM(`AMOUNT`) as 'SUM' FROM `orders` WHERE `USER_ID`=$user_id AND `ORDER_ID`=$order_id ";
							$result_sum = $link->query($query_sum);
							$sum = 0;
							$array_sum = $result_sum->fetch_array();
								$sum = $array_sum["SUM"];
								$sum = number_format((float)$sum, 2, '.', '');
							/* Calculate total price End */
							$product_id = $array["PRODUCT_ID"];
							$quantity = $array["QUANTITY"];
							$amount = $array["AMOUNT"];
							$time = $array["TIME"];
							$status = $array["STATUS"];
						$query1 = "SELECT * FROM `products`	WHERE `ID`=$product_id";
						$result1 = $link->query($query1);
						$array1 = $result1->fetch_array();
						$name = $array1["NAME"];
						$sub_total = (float)$amount;
					echo '
					<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 review-cart-block">
						<h5 class="review-cart-heading">
							<span class="blocked">
								<div>Order Num: #'.$order_id.'</div>
								<div>Order Total Price: JOD '.$sum.'</div>
								<div>Time of Order: '.$time.'</div>								
							</span>
						</h5>
						<table class="table table-condensed table-cart">
							<tr>
								<th>Product</th>
								<th>Qty</th>
								<th>Total</th>
								<th>Status</th>
							</tr>
							<tr style="background: #f9f9f9;">
								<td class="cart-item-details">
									<div class="cart-item">
										<p class="cart-item-name" style="text-align:left;"><a>'.$name.'</a></p>
									</div>
								</td>
								<td class="cart-item-price" style="color:#9b1c31;">'.$quantity.'</td>
								<td class="cart-item-quantity" style="color:#9b1c31;">JOD '.$sub_total.'</td>
								<td>';
								if($status == 'pending'){
									echo'
									Pending<br>
									<a href="php/orders.php?action=canceled&order_id='.$order_id.'&product_id='.$product_id.'" class="btn btn-theme btn-cart" title="This will delete the order permanently! No refund.">Cancel Order</a>
								';}else if($status == 'shipped'){
									echo'
									Shipped<br>
									<a href="php/orders.php?action=delivered&order_id='.$order_id.'&product_id='.$product_id.'" class="btn btn-theme btn-cart">Confirm Received</a>
								';}else if($status == 'rejected'){
									echo'
									Rejected<br>
								';}else if($status == 'delivered'){
									echo'
									Delivered<br>
									<a href="#" class="review" data-order="'.$order_id.'" data-product="'.$product_id.'">Review the item</a>
								';}
								echo'
								</td>
							</tr>
							';
							}else{
							$product_id = $array["PRODUCT_ID"];
							$quantity = $array["QUANTITY"];
							$amount = $array["AMOUNT"];
							$time = $array["TIME"];
							$status = $array["STATUS"];
							$query1 = "SELECT * FROM `products`	WHERE `ID`=$product_id";
							$result1 = $link->query($query1);
							$array1 = $result1->fetch_array();
							$name = $array1["NAME"];
							$sub_total = (float)$amount;
							echo'
							<tr style="background: #f9f9f9;">
								<td class="cart-item-details">
									<div class="cart-item">
										<p class="cart-item-name" style="text-align:left;"><a>'.$name.'</a></p>
									</div>
								</td>
								<td class="cart-item-price" style="color:#9b1c31;">'.$quantity.'</td>
								<td class="cart-item-quantity" style="color:#9b1c31;">JOD '.$sub_total.'</td>
								<td>';
								if($status == 'pending'){
									echo'
									Pending<br>
									<a href="php/orders.php?action=canceled&order_id='.$order_id.'&product_id='.$product_id.'" class="btn btn-theme btn-cart" title="This will delete the order permanently! No refund.">Cancel Order</a>
								';}else if($status == 'shipped'){
									echo'
									Shipped<br>
									<a href="php/orders.php?action=delivered&order_id='.$order_id.'&product_id='.$product_id.'" class="btn btn-theme btn-cart">Confirm Received</a>
								';}else if($status == 'rejected'){
									echo'
									Rejected<br>
								';}else if($status == 'delivered'){
									echo'
									Delivered<br>
									<a href="#" class="review" data-order="'.$order_id.'" data-product="'.$product_id.'">Review the item</a>
								';}
								
								echo'
								</td>
							</tr>';
							}
						
						
					}
					echo'
						</table>
							
					</div> 
					';
					?>
					<!-- End of Cart Review -->
					
					<!-- Form for review -->
					<form action="reviews.php" method="POST" id="hide">
						<input type="hidden" name="order_id" id="order_id">
						<input type="hidden" name="product_id" id="product_id">
					</form>

				</div>
			</div>
  
			<!-- Footer -->
			<?php $ref='user-account.php'; include ("include/footer.php");?>
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
		
<script>
$(document).ready(function(){

	$(document).on("click", ".review", function () {
		var order_id = $(this).data('order');
		var product_id = $(this).data('product');
		$('#order_id').val(order_id);
		$('#product_id').val(product_id);
		$('#hide').submit();
	});
	
	
} );
</script>
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