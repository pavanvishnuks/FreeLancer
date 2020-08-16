<?php
		include "../connection.php";		
			$name =$_GET['name'];
			$project_name=$_GET['project_name'];
			$c=$_GET['amount'];
			$query="SELECT * from bidding WHERE hire_name='".$name."' and project_name='".$project_name."'";
			$result = mysqli_query($mysqli, $query);
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$a = $row['project_name'];
				$b = $row['work_name'];
				$d = $row['bid_amount'];
				if ($mysqli->query("INSERT into job(project_name,hire_name,work_name,progress,amount,bid_amount) values('$project_name','$name','$b','working','$c','$d')") === TRUE)
				{
					header("location:current.php");
				}
				else
				{
					echo "$name";
					echo " something wrong to Assign";
				}
			}
?>