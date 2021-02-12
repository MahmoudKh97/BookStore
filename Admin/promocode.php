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
<?php $active = "promocode"; include ("include/sidebar.php");?>
       
        
        <div class="page-wrapper">
            <div class="content container-fluid">
                
                <div class="row">
                    <div class="col-md-8">
						<h4 class="page-title">Promo Code</h4>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
							<?php
							include("php/connect.php");
							$query = "SELECT * FROM `promocode`";
							$result = $link->query($query);
							if ($result->num_rows == 0) {
							?>
                            <form action="php/promocode.php" method="post">
								<input type="hidden" name="action" value="add" class="form-control" >
								<br/>
								<div class="form-group row">
									<div class="col-md-6">
										<label class="col-form-label col-md-12">Enter Promo Code:</label>
										<input type="text" name="PROMOCODE" value="BookStore2021" class="form-control" required>
									</div>
									<div class="col-md-6">
										<label class="col-form-label col-md-12">Discount Percentage % :</label>
										<input type="text" name="PERCENTAGE" value="10" class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label col-md-12">Promo Code Text</label>
										<textarea name="TEXT" cols="40" rows="3" class="form-control" required>Use promo code: BookStore2021  ;) And Get 10% OFF per item.</textarea>
									</div>
								</div>
							<div class="form-group">
									<label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="STATUS" id="active" value="active" checked>
									<label class="form-check-label" for="product_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="STATUS" id="inactive" value="inactive">
									<label class="form-check-label" for="product_inactive">
									Inactive
									</label>
								</div>
							</div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </div>
                            </form>
							<?php
							}else{
								$array = $result->fetch_array();
									$promocode = $array["PROMOCODE"];
									$percentage = $array["PERCENTAGE"];
									$text = $array["TEXT"];
									$status = $array["STATUS"];
									if($status == "active"){
										$active = "checked";
										$inactive = "";
									}else{
										$active = "";
										$inactive = "checked";
									}
							?>
							<form action="php/promocode.php" method="post">
								<input type="hidden" name="action" value="edit" class="form-control" >
								<br/>
								<div class="form-group row">
									<div class="col-md-6">
										<label class="col-form-label col-md-12">Enter Promo Code:</label>
										<input type="text" name="PROMOCODE" value="<?=$promocode?>" class="form-control" >
									</div>
									<div class="col-md-6">
										<label class="col-form-label col-md-12">Discount Percentage % :</label>
										<input type="text" name="PERCENTAGE" value="<?=$percentage?>" class="form-control" >
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<label class="col-form-label col-md-12">Promo Code Text</label>
										<textarea name="TEXT" cols="40" rows="3" class="form-control" ><?=$text?></textarea>
									</div>
								</div>
							<div class="form-group">
									<label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="STATUS" id="active" value="active" <?=$active?>>
									<label class="form-check-label" for="product_active">
									Active
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="STATUS" id="inactive" value="inactive" <?=$inactive?>>
									<label class="form-check-label" for="product_inactive">
									Inactive
									</label>
								</div>
							</div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </div>
                            </form>
							<?php
							}
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
</body>


</html>