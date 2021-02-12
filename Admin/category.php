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
<?php $active = "category"; include ("include/sidebar.php");?>
       
        
        <div class="page-wrapper">
            <div class="content container-fluid">
				<div class="row">
                    <div class="col-md-8">
						<h4 class="page-title">View , Add and Delete Categories</h4>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
						
                            <h4 class="card-title"></h4>
							
                            <form action="php/add_category.php" method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<label class="col-form-label col-md-2">Category Name</label>
										<div class="col-md-10">
											<input type="text" name="CATEGORY" class="form-control" >
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
												<th>Category Image</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include("php/connect.php");

						$query = "SELECT * FROM `category`";
							$result = $link->query($query);
							while($array = $result->fetch_array()){
								$category = $array["CATEGORY"];
								$category_id = $array["ID"];
								$image = $array["IMAGE"];

								echo "<tr>
								<td width='40%'>$category</td>
								<td width='50%'><img src='$image' width='25%'></td>
								<td width='10%'><a href='php/delete_category.php?id=$category_id'>
								<i class='fa fa-trash fa-2x'></i></a></td>
								</tr>";
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
    <div class="sidebar-overlay" data-reff=""></div>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
</body>


</html>