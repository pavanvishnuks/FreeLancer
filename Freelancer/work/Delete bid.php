<?php
		include "../connection.php";		
			$wname =$_GET['name'];
			$project_name=$_GET['project_name'];

			if ($mysqli->query("DELETE from bidding WHERE work_name='".$wname."' and project_name='".$project_name."'") === TRUE)
			{
				header("location:bids.php");
			}
			else
			{
				echo "$wname";
				echo " something wrong to delete";
			}

?>