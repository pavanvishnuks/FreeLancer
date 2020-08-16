<?php
		include "../connection.php";		
			$name =$_GET['name'];
			$project_name=$_GET['project_name'];

			if ($mysqli->query("DELETE from project WHERE hire_name='".$name."' and project_name='".$project_name."'") === TRUE)
			{
				if ($mysqli->query("DELETE from bidding WHERE project_name='".$project_name."'") === TRUE)	
					header("location:bids.php");
			}
			else
			{
				echo "$wname";
				echo " something wrong to delete";
			}

?>