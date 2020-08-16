<?php
		include "../connection.php";		
			$name =$_GET['name'];
			$project_name=$_GET['project_name'];

			if ($mysqli->query("UPDATE job set progress='finished' where project_name='$project_name' and hire_name='$name'") === TRUE)
			{
				header("location:past.php");
			}
			else
			{
				echo "$name";
				echo " something wrong to delete";
			}

?>