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
				<div class="overlay" style="background-color: rgba(0, 0, 0, 0.4);">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
							<br><br><br><br><br>
								<h3 class="subtitle">Shopping Cart</h3>
							</div>
						</div>
					</div>
				</div>
			</section><!-- End of Page header -->
			<br><br><br><br>

			<!-- cart -->
			<div class="container cart">
				<div class="row">

					<div class="col-md-12 col-xs-12">       
						<table class="table table-condensed table-cart">
							<tr>
							  <th>Product</th>
							  <th>Price</th>
							  <th>Quantity</th>
							  <th><span class="read-only">Remove</span></th>
							</tr>
							
							<!-- Product  -->
							<?php
								$sub_total = 0;
								$query = "SELECT * FROM `cart` WHERE `USER_ID`=$user_id ORDER BY `ID` DESC";
								$result = $link->query($query);
								while($array = $result->fetch_array()){
									$product_id = $array["PRODUCT_ID"];
									$quantity = $array["QUANTITY"];
									$query1 = "SELECT `products`.*, `products_images`.*
									FROM `products` , `products_images` 
									WHERE `products`.`ID`=$product_id AND `products`.`ID`=`products_images`.`PRODUCT_ID`";
									$result1 = $link->query($query1);
									$array1 = $result1->fetch_array();
									$name = $array1["NAME"];
									$price = $array1["PRICE"];
									$image = $array1["IMAGE"];
									$price = (float)$price * $quantity;
									$sub_total += $price;
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
								<td class="cart-item-price" style="color:#9b1c31;">JOD '.$price.'</td>
								<td class="cart-item-quantity">
									<input type="number" name="'.$product_id.'" value="'.$quantity.'" class="qty" min="1" max="24"/>
								</td>
								<td><a id="'.$product_id.'" href="php/remove_from_cart.php?PRODUCT_ID='.$product_id.'&USER_ID='.$user_id.'"><i class="fa fa-trash-o"></i></a></td>
							</tr>
								';}
							?>
							<!-- End of Product  -->
							
						</table>
					</div>
				</div>
			</div>		
					
			<div class="container cart">
				<div class="row">		
					<!-- Cart Review -->
						
					<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 review-cart-block">
						<h5 class="review-cart-heading">
							<span class="blocked">Cart Summary</span>                
						</h5>
						<div class="cart-review">
							<div class="row inner">
								<div class="col-xs-6 text-left no-padding">
									<div class="rows">Sub Total</div>
									<div class="rows">Shipping</div>
									<div class="rows">Discounts</div>
									<div class="rows"><b><span class="md-hidden">Grand </span>Total</b></div>
								</div>
								<div class="col-md-6 col-xs-6 text-right  no-padding-right">
									<div class="rows sub-total">JOD <?php echo $sub_total; ?></div>
									<div class="rows shipping-cost">Free</div>
									<div id="discount" class="rows discount">0.00</div>
									<b><div id="grand_total" class="rows total">JOD <?php echo $sub_total; ?></div></b>
								</div>
								<div class="col-md-12">
								<?php
								if($sub_total == 0){
									echo'<a href="#" class="btn btn-theme btn-cart">Place Order</a>';
								}else{
									echo'<a href="#" id="order" class="btn btn-theme btn-cart">Place Order</a>';
								}
								?>
								
							<?php
							$query = "SELECT * FROM `promocode` WHERE `STATUS`='active'";
							$result = $link->query($query);
							if ($result->num_rows > 0) {
								$array = $result->fetch_array();
									$promocode = $array["PROMOCODE"];
									$percentage = $array["PERCENTAGE"];
							}else{
								$promocode = 'no';
								$percentage = 0;
							}
							?>
								<form action="php/orders.php" method="GET" id="hide">
									<input type="hidden" name="action" value="add">
									<input type="hidden" name="USER_ID" value="<?=$user_id?>">
									<input type="hidden" name="PERCENTAGE" id="percentage">
								</form>
								</div>
							</div>
							<a href="#" class="coupon-trigger"><p class="text-center heading coupon">Apply Promo Code</p></a>
							<a href="#" class="coupon-close"><p class="text-center heading coupon text-theme">Apply Promo Code</p></a>
							<div class="inner coupon-code">
							<span id="unvalid" style="color:red;"></span>
							<span id="valid" style="color:green;"></span>
								<div class="input-group form-dark form-small">
									<input id="code" type="text" class="form-control coupon-input" placeholder="Promo Code Code"/>
									<span class="input-group-btn">
										<a id="calc" href="#" class="btn btn-theme"><i class="fa fa-check"></i></a>
									</span>
								</div>
							</div>
						</div>
					</div> 
					<!-- End of Cart Review -->
					
					
				</div>
			</div>
  
			<!-- Footer -->
			<?php $ref='user-cart.php'; include ("include/footer.php");?>
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
$(document).ready(function(){

    $('table').on('change','.qty', function(){
        var user_id = "<?php echo $user_id; ?>";
		var product_id = $(this).attr('name');
        var quantity = $(this).val();
        $.ajax({
            url: 'php/add_to_cart.php',
            type: 'POST',
            data: { USER_ID:user_id, PRODUCT_ID:product_id, QUANTITY:quantity },
			dataType: 'json',
            success: function(data)
            {
                //alert(data.response);
				window.location.href = "user-cart.php";
            }
        })
    });
	
	
	var percentage = 0;
	$('#unvalid').hide();
	$('#valid').hide();
	$('#calc').on('click',function(){
		var promocode = "<?php echo $promocode; ?>";
		if(promocode == 'no'){
			$('#unvalid').show();
			$('#unvalid').text("Sorry! No Promo Code is Available Right Now.");
		}else{
			if($('#code').val() == promocode){
				var sub_total = "<?php echo $sub_total; ?>";
				percentage = "<?php echo $percentage; ?>";
				var discount = (sub_total * percentage / 100).toFixed(2);
				var grand_total = (sub_total - discount).toFixed(2);
				$('#discount').text('JOD '+discount);
				$('#grand_total').text('JOD '+grand_total);
				$('#valid').show();
				$('#valid').html("Applied Successfully <i class='fa fa-check-circle'></i> ");
			}else{
				$('#unvalid').show();
				$('#unvalid').text("Sorry! Promo Code is Not Valid");
			}
		}
    });
	
	$(document).on("click", "#order", function () {
		$('#percentage').val(percentage);
		$('#hide').submit();
	});
	
	$('#code').focus(function(){
		$('#unvalid').hide();
		$('#valid').hide();
	});
	
});
</script>			
    </body>

</html>