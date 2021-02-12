<?php
session_start();
if(!isset($_SESSION["ADMIN"] ) ){
	header("Location: index.php");
}else{
	$admin_id = $_SESSION["ADMIN"] ; 
}
include("php/connect.php");
?>
<!DOCTYPE html>
<html>
<?php include ("include/head.php");?>

<body>
    <div class="main-wrapper">
<?php include ("include/header.php");?>
<?php $active = "modify_product"; include ("include/sidebar.php");?>
       
        
        <div class="page-wrapper">
			<div class="content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="page-title">Modify Product</h4>
                    </div>
                </div>
				<?php	
					if(!isset($_POST["SUBMIT1"]) ){
					echo'
<!-- category and sub -->
					<form action="" method="post">
						<div class="form-group row">
							<label class="col-form-label col-md-2 CATEGORY_LABEL">Choose Category</label>
							<div class="col-md-10">
								<select id = "CATEGORY" name="CATEGORY" class="CATEGORY form-control">
									<option disabled select selected hidden >Select Main Category</option>';
									$query = "SELECT * FROM `category`";
									$result = $link->query($query);
									while($array = $result->fetch_array() ){
										$category = $array["CATEGORY"];
										$category_id = $array["ID"];
										echo "<option value='$category_id'>$category</option>";
									}
								echo'
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-2 SUB_CATEGORY_LABEL">Product Sub Category</label>
							<div class="col-md-10">
								<Select class="SUB_CATEGORY form-control" id = "SUB_CATEGORY" name="SUB_CATEGORY"></select>
							</div>
						</div>
						<div class="m-t-0 m-b-20 text-center">
							<button type="submit" name="SUBMIT1" class="SUBMIT1 btn btn-primary btn-lg">View Products</button>
						</div>
                    </form>';
					
					}else{	
								$category_id = $_POST["CATEGORY"];
								$sub_category_id = $_POST["SUB_CATEGORY"];
							echo'
<!-- product -->							
							<form action="" method="post" id="PRODUCT">
								<div class="form-group row">
									<label class="col-form-label col-md-2">Choose Product</label>
										<div class="col-md-10">
											<select name="PRODUCT_ID" class="form-control">
												<option disabled select selected hidden >Select Product</option>';
									
									$query = "SELECT * FROM `products` WHERE `CATEGORY`=$category_id AND `SUB_CATEGORY`=$sub_category_id
											AND (`STATUS`='active' OR `STATUS`='inactive') ORDER BY `ID` DESC";
									$result = $link->query($query);
									while($array = $result->fetch_array() ){
										$product = $array["NAME"];
										$product_id = $array["ID"];
											echo "<option value='$product_id'>$product</option>";
									}
									echo'	</select>
										</div>
								</div>
								<div class="form-group row">
									<input name="CATEGORY" value="'.$category_id.'" class="form-control" type="number" hidden>
								</div>
								<div class="form-group row">
									<input name="SUB_CATEGORY" value="'.$sub_category_id.'" class="form-control" type="number" hidden>
								</div>
                                <div class="m-t-0 m-b-20 text-center">
									<button type="submit" class="SUBMIT btn btn-primary btn-lg">View</button>
								</div>
                            </form>
<!-- edit product -->				';
							}
							
							if(isset($_POST["PRODUCT_ID"]) ){	
								$category_id = $_POST["CATEGORY"];
								$sub_category_id = $_POST["SUB_CATEGORY"];
								
								$product_id = $_POST["PRODUCT_ID"];
								$query = "SELECT * FROM `products` WHERE `ID`=$product_id";
								$result = $link->query($query);
								$array = $result->fetch_array();
								$name = $array["NAME"];
								$price = $array["PRICE"];
								$old_price = $array["OLD_PRICE"];
								$description = $array["DESCRIPTION"];
								$status = $array["STATUS"];
								if($status == "active"){
									$active = "checked";
									$inactive = "";
								}else{
									$active = "";
									$inactive = "checked";
								}
								echo '
				<div class="row">
                    <div class="col-md-12">
						<div class="card-box">                
							<form action="php/modify_product.php?ID='.$product_id.'" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" type="text" name="NAME" value="'.$name.'" >
                            </div>

                            <div class="form-group">
                                <label>Product Images</label>
                                <div>
                                    <input name="FILE[]" class="form-control" type="file" multiple >
                                    <small class="form-text text-muted">Max. file size: 50 MB. Allowed images: jpg, gif, png. Maximum 10 images only.</small>
                                </div>
								<div class="row">';
									$query1 = "SELECT * FROM `products_images` WHERE `PRODUCT_ID`=$product_id";
									$result1 = $link->query($query1);
									while($array1 = $result1->fetch_array() ){
										$image = $array1["IMAGE"];
									echo '<div class="col-md-3 col-sm-3 col-4 col-lg-3 col-xl-2">
											<div class="product-thumbnail">
												<img src="'.$image.'" class="img-thumbnail img-fluid" alt="">
											</div>
										</div>
									';}
								 echo'       
								</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input name="PRICE" value="'.$price.'" class="form-control" type="number" step="0.01" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Price</label>
                                        <input name="OLD_PRICE" value="'.$old_price.'" class="form-control" type="number" step="0.01">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea cols="30" rows="6" name="DESCRIPTION" id="editor1" class="form-control">'.$description.'</textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Product Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="STATUS" id="product_active" value="active"'.$active.'>
									<label class="form-check-label" for="product_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="STATUS" id="product_inactive" value="inactive"'.$inactive.'>
									<label class="form-check-label" for="product_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Edit Product</button>
                            </div>
                        </form>
							';}
						?>
                    </div>
					</div>
                </div>
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
<script src="ckeditor/ckeditor.js"></script>	
<script>
$(document).ready(function(){
var editor = CKEDITOR.replace( 'editor1' );
});

</script>
<script>

$(".SUB_CATEGORY").hide();
$(".SUB_CATEGORY_LABEL").hide();
$(".SUBMIT1").hide();
$(".PRODUCT").hide();

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
	$(".SUBMIT1").click();
	$(".PRODUCT").show();
} );

</script>	

</body>


</html>