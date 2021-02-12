<?php
session_start();
if(!isset($_SESSION["ADMIN"] ) ){
	header("Location: index.php");
}else{
	$admin_id = $_SESSION["ADMIN"] ; 
}
?>
<!DOCTYPE html>

<html>
<?php include ("include/head.php");?>

<body>
    <div class="main-wrapper">
<?php include ("include/header.php");?>
<?php $active = "add_product"; include ("include/sidebar.php");?>
       
        
        <div class="page-wrapper">
			<div class="content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="page-title">Add Product</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
						<div class="card-box">
                        <form action="php/add_product.php" method="post" enctype="multipart/form-data">
						
							<div class="row">
                                <div class="col-md-6">
									<div class="form-group">
										<label>Product Category</label>
										<select id = "CATEGORY" name="CATEGORY" class="form-control">
											<option disabled select selected hidden >Select Main Category</option>;
								<?php
								include("php/connect.php");
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
                                        <Select class="SUB_CATEGORY form-control" name="SUB_CATEGORY"></select>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" type="text" name="NAME" required>
                            </div>
                            <div class="form-group">
                                <label>Product Images</label>
                                <div>
                                    <input name="FILE[]" class="form-control" type="file" multiple required>
                                    <small class="form-text text-muted">Max. file size: 50 MB. Allowed images: jpg, gif, png. Maximum 10 images only.</small>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input name="PRICE" class="form-control" type="number" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old Price</label>
                                        <input name="OLD_PRICE" class="form-control" type="number" step="0.01">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea cols="30" rows="6" name="DESCRIPTION" id="editor1" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="display-block">Product Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="STATUS" id="product_active" value="active" checked>
									<label class="form-check-label" for="product_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="STATUS" id="product_inactive" value="inactive">
									<label class="form-check-label" for="product_inactive">
									Inactive
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Publish Product</button>
                            </div>
                        </form>
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
</script>
</body>


</html>