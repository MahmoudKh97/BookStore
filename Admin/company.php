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
<?php $active = "company"; include ("include/sidebar.php");?>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Companies Profile</h4>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="card-title"></h4>
							<form action="" method="post">
								<div class="form-group row">
									<div class="col-md-12">
										<select name="COMPANY_ID" class="form-control">
											<option disabled select selected hidden >Select Company</option>';
									<?php
									
									$query = "SELECT * FROM `company` WHERE `STATUS`='accepted' ORDER BY `ID` DESC";
									$result = $link->query($query);
									while($array = $result->fetch_array() ){
										$name_select = $array["NAME"];
										$company_id_select = $array["ID"];
										echo "<option value='$company_id_select'>$name_select</option>";
									}
									?>
										</select>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary">View Profile</button>
								</div>
							</form>
						</div>
                    </div>
                </div>
				
				
				
				<?php
				if(!isset($_POST["COMPANY_ID"]) && !isset($_GET["company_id"]) && !isset( $_POST["CATEGORY"])){
					$query = "SELECT * FROM `company` WHERE `STATUS`='pending' ORDER BY `ID` DESC";
					$result = $link->query($query);
					while($array = $result->fetch_array()){
					$company_id = $array["ID"];
					$name = $array["NAME"];
					$email = $array["EMAIL"];
					$phone_number = $array["PHONE_NUMBER"];
					$country = $array["COUNTRY"];
					$city = $array["CITY"];
					$address = $array["ADDRESS"];
					$zip_code = $array["ZIP_CODE"];
					$status = $array["STATUS"];
					
				echo '
				<div class="card-box m-b-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
								
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="profile-info-left">
												<h5 class="user-name m-t-30 m-b-0">Company Name:</h5>
                                                <h3 class=" m-t-10">'.$name.'</h3>
                                                <div class="staff-id">Company ID : #'.$company_id.'</div>
												
												<div class="dropdown dropdown-action">
													<span class="badge badge-warning-border">Pending</span>
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" 
														href="php/company.php?action=accepted&company_id='.$company_id.'">
															<i class="fa fa-pencil m-r-5"></i>Accept
														</a>
														<a class="dropdown-item" 
														href="php/company.php?action=rejected&company_id='.$company_id.'">
															<i class="fa fa-trash-o m-r-5"></i>Reject
														</a>
													</div>
												</div>
											</div>
                                        </div>
                                        <div class="col-md-9">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#">'.$phone_number.'</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#">'.$email.'</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text">'.$address.'</span>
                                                </li>
                                                <li>
                                                    <span class="title">Country</span>
                                                    <span class="text">'.$country.'</span>
                                                </li>
												<li>
                                                    <span class="title">City</span>
                                                    <span class="text">'.$city.'</span>
                                                </li>
												<li>
                                                    <span class="title">Zip Code</span>
                                                    <span class="text">'.$zip_code.'</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>';
					}
				}

				if(isset($_POST["COMPANY_ID"]) || isset($_GET["company_id"]) ){
					if(isset($_POST["COMPANY_ID"]))
					{
						$company_id = $_POST["COMPANY_ID"];
					}
					else
					{
						$company_id = $_GET["company_id"];
					}
					$query = "SELECT * FROM `company` WHERE `ID`=$company_id";
					$result = $link->query($query);
					$array = $result->fetch_array();
					$name = $array["NAME"];
					$email = $array["EMAIL"];
					$phone_number = $array["PHONE_NUMBER"];
					$country = $array["COUNTRY"];
					$city = $array["CITY"];
					$address = $array["ADDRESS"];
					$zip_code = $array["ZIP_CODE"];
					echo '
				<div class="card-box m-b-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
								
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="profile-info-left">
												<h5 class="user-name m-t-30 m-b-0">Company Name:</h5>
                                                <h3 class=" m-t-10">'.$name.'</h3>
                                                <div class="staff-id">Company ID : #'.$company_id.'</div>
												<br>
												<a href="php/company.php?action=delete&company_id='.$company_id.'" title="Delete Company">
													<i class="fa fa-trash fa-2x"></i>
												</a>
											</div>
                                        </div>
                                        <div class="col-md-9">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href="#">'.$phone_number.'</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#">'.$email.'</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text">'.$address.'</span>
                                                </li>
                                                <li>
                                                    <span class="title">Country</span>
                                                    <span class="text">'.$country.'</span>
                                                </li>
												<li>
                                                    <span class="title">City</span>
                                                    <span class="text">'.$city.'</span>
                                                </li>
												<li>
                                                    <span class="title">Zip Code</span>
                                                    <span class="text">'.$zip_code.'</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
				
				?>
				
		<div class="card-box tab-box">
            <div class="row user-tabs">
                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item col-sm-3"><a class="nav-link active" data-toggle="tab" href="#products">Products</a></li>
                        <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" href="#pending">Pending Orders</a></li>
						<li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" href="#others">Others</a></li>
                    </ul>
                </div>
            </div>
        </div>
		<div class="row">
        <div class="col-lg-12">
		<div class="tab-content  profile-tab-content">
			
			
			
			<div id="products" class="tab-pane fade show active">
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
				<input type="hidden" name="COMPANY_ID" value="<?=$company_id?>">
				<div class="m-t-0 m-b-20 text-center">
					<button type="submit" class="SUBMIT btn btn-primary btn-lg">View Products</button>
                </div>
			</form>
			
			<?php
			if(isset($_POST["SUB_CATEGORY"]) ){	
				$category_id = $_POST["CATEGORY"];
				$sub_category_id = $_POST["SUB_CATEGORY"];
				$company_id = $_POST["COMPANY_ID"];
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
			
			
			
			
			
			
            <div id="pending" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
							<div class="table-responsive">
								<table class="table table-inbox m-b-0">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Order Id</th>
                                        <th>Order Date</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
						<?php

						$query = "SELECT `orders`.*, `products`.*,`orders`.`STATUS` as 'STATUS' FROM `orders`,`products` 
								WHERE `products`.`COMPANY`=$company_id
									AND `orders`.`PRODUCT_ID` = `products`.`ID`
									AND	`orders`.`STATUS`='pending' ORDER BY `orders`.`ID` DESC";
							$result = $link->query($query);
							while($array = $result->fetch_array()){
								$order_id = $array["ORDER_ID"];
								$product_id = $array["PRODUCT_ID"];
								$user_id = $array["USER_ID"];
								$quantity = $array["QUANTITY"];
								$amount = $array["AMOUNT"];
								$time = $array["TIME"];
								$status = $array["STATUS"];
								$query1 = "SELECT * FROM `products`	WHERE `ID`=$product_id";
								$result1 = $link->query($query1);
								$array1 = $result1->fetch_array();
								$name = $array1["NAME"];
								$price = $array1["PRICE"];
								echo'
                                    <tr>
                                        <td>
                                            <div class="product-det">
                                                <h2><a href="../single-product.php?product_id='.$product_id.'">#'.$product_id.' : '.$name.'</a> <span>JOD '.$price.'</span></h2>
                                            </div>
                                        </td>
                                        <td><a href="#">#'.$order_id.'</a></td>
                                        <td>'.$time.'</td>
                                        <td>'.$quantity.'</td>
                                        <td>
                                            <p class="price-sup"><sup>JOD</sup>'.$amount.'</p>
                                        </td>
										<td>
											<span class="badge badge-warning-border">Pending</span>
										</td>
										<td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" 
														href="php/orders.php?action=shipped&product_id='.$product_id.'&order_id='.$order_id.'&user_id='.$user_id.'">
														<i class="fa fa-pencil m-r-5"></i>Shipped
													</a>
                                                    <a class="dropdown-item" 
														href="php/orders.php?action=rejected&product_id='.$product_id.'&order_id='.$order_id.'&user_id='.$user_id.'">
														<i class="fa fa-trash-o m-r-5"></i>Rejected
													</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>';
							}
						?>
                                </tbody>
								</table>			
							</div>
                        </div>
                    </div>
                </div>			
            </div>
			
			
			
			
			<div id="others" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
							<div class="table-responsive">
								<table class="table table-inbox m-b-0">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Order Id</th>
                                        <th>Order Date</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
						<?php

						$query = "SELECT `orders`.*, `products`.*,`orders`.`STATUS` as 'STATUS' FROM `orders`,`products` 
								WHERE `products`.`COMPANY`=$company_id
									AND `orders`.`PRODUCT_ID` = `products`.`ID`
									AND	`orders`.`STATUS`!='pending' ORDER BY `orders`.`ID` DESC"; 
							$result = $link->query($query);
							while($array = $result->fetch_array()){
								$order_id = $array["ORDER_ID"];
								$product_id = $array["PRODUCT_ID"];
								$quantity = $array["QUANTITY"];
								$amount = $array["AMOUNT"];
								$time = $array["TIME"];
								$status = $array["STATUS"];
								$query1 = "SELECT * FROM `products`	WHERE `ID`=$product_id";
								$result1 = $link->query($query1);
								$array1 = $result1->fetch_array();
								$name = $array1["NAME"];
								$price = $array1["PRICE"];
								echo'
                                    <tr>
                                        <td>
                                            <div class="product-det">
                                                <h2><a href="../single-product.php?product_id='.$product_id.'">#'.$product_id.' : '.$name.'</a> <span>JOD '.$price.'</span></h2>
                                            </div>
                                        </td>
                                        <td><a href="#">#'.$order_id.'</a></td>
                                        <td>'.$time.'</td>
                                        <td>'.$quantity.'</td>
                                        <td>
                                            <p class="price-sup"><sup>JOD</sup>'.$amount.'</p>
                                        </td>
										<td>';
										if($status == 'shipped'){
											echo'
											<span class="badge badge-info-border">Shipped</span>
										';}else if($status == 'rejected'){
											echo'
											<span class="badge badge-danger-border">Rejected</span>
										';}else if($status == 'delivered'){
										echo'
											<span class="badge badge-success-border">Delivered</span>
										';}
										echo'
										</td>
                                    </tr>';
							}
						?>
                                </tbody>
								</table>			
							</div>
                        </div>
                    </div>
                </div>			
            </div>
			
			
			
			
			
        </div>
        </div>
        </div>
				
				
				
				
			<?php
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


<!-- Mirrored from dreamguys.co.in/preadmin/dark/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Oct 2018 21:49:30 GMT -->
</html>