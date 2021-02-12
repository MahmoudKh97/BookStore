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
<?php $active = "sub_category"; include ("include/sidebar.php");?>
       
        
        <div class="page-wrapper">
            <div class="content container-fluid">
                
                <div class="row">
                    <div class="col-md-8">
						<h4 class="page-title">View , Add and Delete Sub Categories</h4>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
						
                            <h4 class="card-title"></h4>
							
                            <?php
							include("php/connect.php");
							if(!isset($_POST["CATEGORY"]) ){
							echo '
							<form action="" method="post">
								<div class="form-group row">
									<label class="col-form-label col-md-2">Choose Category</label>
										<div class="col-md-10">
											<select name="CATEGORY" class="form-control">
												<option disabled select selected hidden >Select Main Category</option>';
									$query = "SELECT * FROM `category`";
									$result = $link->query($query);
									while($array = $result->fetch_array() ){
										$category = $array["CATEGORY"];
										$category_id = $array["ID"];
											echo "<option value='$category_id'>$category</option>";
									}
									echo '	</select>
										</div>
								</div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>';
							}else{
								$category_id = $_POST["CATEGORY"];
								echo '
							<form action="php/add_sub_category.php" method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<label class="col-form-label col-md-2">Sub Category Name</label>
										<div class="col-md-10">
											<input type="text" name="SUB_CATEGORY" class="form-control" >
										</div>
								</div>
								<div class="form-group row">
										<div class="col-md-12">
											<input type="hidden" name="CATEGORY" value="'.$category_id.'" class="form-control" >
										</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-2">Image Upload</label>
										<div class="col-md-10">
											<input type="file" name="FILE" class="form-control" >
										</div>
								</div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="card-block">
                                <h4 class="card-title"></h4>
								<div class="table-responsive">
									<table class="table table-hover m-b-0">
										<thead style="background-color:#9b1c31;">
											<tr>
												<th>Category</th>
												<th>Sub Category</th>
												<th>Sub Category Image</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>';
			include("php/connect.php");
			$query = "SELECT `category`.`CATEGORY` AS `CATEGORY` ,
			`sub_category`.`ID`,`sub_category`.`SUB_CATEGORY`,`sub_category`.`IMAGE`
			FROM `category` JOIN `sub_category` where `category`.`ID` = `sub_category`.`CATEGORY` AND `sub_category`.`CATEGORY` = $category_id";
			$result = $link->query($query);
			while($array = $result->fetch_array()){
				$category = $array["CATEGORY"];
				$sub_category = $array["SUB_CATEGORY"];
				$sub_category_id = $array["ID"];
				$image = $array["IMAGE"];

								echo "<tr>
								<td width='25%'>$category</td>
								<td width='25%'>$sub_category</td>
								<td width='50%'><img src='$image' width='25%'></td>
								<td ><a href='php/delete_sub_category.php?id=$sub_category_id'>
								<i class='fa fa-trash fa-2x'></i></a></td>
								</tr>";
							}
								echo'</tbody>
							</table>';
							}
						?>
										
								</div>
                            </div>
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