<?php
session_start();
if(!isset($_SESSION["COMPANY"] ) ){
	header("Location: index.php");
}else{
	$company_id = $_SESSION["COMPANY"] ; 
}
include("php/connect.php");
?>
<!DOCTYPE html>
<html>
<?php include ("include/head.php");?>

<body>
    <div class="main-wrapper">
<?php include ("include/header.php");?>
<?php $active = "delete_product"; include ("include/sidebar.php");?>
       
        
        <div class="page-wrapper">
            <div class="content container-fluid">
				<div class="row">
                    <div class="col-md-8">
						<h4 class="page-title">View & Delete Products</h4>
                    </div>
                </div>

			<form action="" method="post">
				<div class="row">
                    <div class="col-md-6">
						<div class="form-group">
							<label>Choose Product Category</label>
							<select id = "CATEGORY" name="CATEGORY" class="form-control">
								<option disabled select selected hidden >Select Main Category</option>
								<?php
									$query = "SELECT * FROM `category`";
									$result = $link->query($query);
									while($array = $result->fetch_array() ){
										$category = $array["CATEGORY"];
										$category_id = $array["ID"];
											echo "<option value='$category_id'>$category</option>";
									}
								?>
							</select>
						</div>
					</div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="SUB_CATEGORY_LABEL">Product Sub Category</label>
                            <Select class="SUB_CATEGORY form-control" id = "SUB_CATEGORY" name="SUB_CATEGORY"></select>
                        </div>
                    </div>
                </div>
				<div class="m-t-0 m-b-20 text-center">
					<button type="submit" class="SUBMIT btn btn-primary btn-lg">View Products</button>
                </div>
			</form>
			
			<?php
			if(isset($_POST["SUB_CATEGORY"]) ){	
				$category_id = $_POST["CATEGORY"];
				$sub_category_id = $_POST["SUB_CATEGORY"];
				echo '
				<div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="card-block">
                                <h4 class="card-title"></h4>
								<div class="table-responsive">
									<table class="table table-hover m-b-0">
										<thead style="background-color:#9b1c31;">
											<tr>
												<th>Product Name</th>
												<th>Product Images</th>
												<th>Price</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>';

							$query = "SELECT * FROM `products` WHERE `CATEGORY`=$category_id AND `SUB_CATEGORY`=$sub_category_id
									AND `COMPANY`=$company_id AND (`STATUS`='active' OR `STATUS`='inactive') ORDER BY `ID` DESC";
							$result = $link->query($query);
							while($array = $result->fetch_array()){
								$product_id = $array["ID"];
								$name = $array["NAME"];
								$price = $array["PRICE"];								

								echo "<tr>
								<td width='20%'>$name</td>
								<td width='60%'>
									<div class='row'>";
									$query1 = "SELECT * FROM `products_images` WHERE `PRODUCT_ID`=$product_id";
									$result1 = $link->query($query1);
									while($array1 = $result1->fetch_array() ){
										$image = $array1["IMAGE"];
									echo '<div class="col-md-3 col-sm-3 col-4 col-lg-3 col-xl-2">
											<div class="product-thumbnail">
												<img src="'.$image.'" class="img-thumbnail img-fluid">
											</div>
										</div>
									';}
									echo"       
									</div>
								</td>
								<td width='10%'>$price</td>
								<td width='10%'><a href='php/delete_product.php?ID=$product_id'>
								<i class='fa fa-trash fa-2x'></i></a></td>
								</tr>";
							}
							echo'
						
										</tbody>
									</table>
								</div>
                            </div>
                        </div>
                    </div>
                </div>';
			}
			?>	
				
				
				
				
				
            </div>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
<script>
$(".SUB_CATEGORY").hide();
$(".SUB_CATEGORY_LABEL").hide();
$(".SUBMIT").hide();
var sub_category = 0;
$("#CATEGORY").change(function(){
	category_id = $("#CATEGORY").val();
	$.post("php/select_sub_category.php",{CATEGORY_ID:category_id},function(response){
		if(response !=""){
			$(".SUB_CATEGORY").show();
			$(".SUB_CATEGORY_LABEL").show();
			$(".SUB_CATEGORY").html(response);
		}else{
			$(".SUB_CATEGORY").hide();
			$(".SUB_CATEGORY_LABEL").hide();
			sub_category = 0;
		}
	});
} );
$("#SUB_CATEGORY").change(function(){
	$(".SUBMIT").show();
} );
</script>
</body>


</html>