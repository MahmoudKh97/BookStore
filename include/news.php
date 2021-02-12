<html lang="">
<!--  News -->
			<marquee  style="position:fixed;bottom:0px;background-color:rgba(66, 199, 201,0.5);color:#fff;line-height:2em;z-index: 20;">
            
			<?php
			include("php/connect.php");
							$query = "SELECT * FROM `promocode` WHERE `STATUS`='active'";
							$result = $link->query($query);
							if ($result->num_rows > 0) {
								$array = $result->fetch_array();
								$text = $array["TEXT"];
								echo "$text  &emsp;    * * * *   &emsp; ";
							}
							$query = "SELECT * FROM `news` ORDER BY `ID` ASC";
							$result = mysqli_query($link,$query);
							if ($result->num_rows > 0) {
							while($array = mysqli_fetch_array($result) ){
								$news = $array["NEWS"];
								echo "$news  &emsp;    * * * *   &emsp; ";
							}
							}
			?>
			
			</marquee>