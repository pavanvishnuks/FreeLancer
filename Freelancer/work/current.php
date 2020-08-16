<?php
echo'<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" type="image/png" href="../images/favicon.png">';
	include"../connection.php";
	include"header.php";
	include"sublist.php";
echo'<table class="tone">
			<tr class="trone">
			    <th class="thone"> PROJECT NAME </th>
			    <th class="thone"> OWNER </th>
			    <th class="thone"> AMOUNT </th>
			    <th class="thone"> GAIN AMOUNT </th>
			    <th class="thone"> PROGRESS </th>
			    <th class="thone"> OPTION </th>
			</tr>';
			$query="select * from job where progress='working' and work_name='$wname' ";
			$result = mysqli_query($mysqli, $query);
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$a = $row['project_name'];
				$b = $row['hire_name'];
				$c = $row['amount'];
				$d = $row['bid_amount'];
		echo<<<abc
		<tr class="trone">
			    <td class="tdone">$a</td>
			    <td class="tdone">$b</td>
			    <td class="tdone">$c</td>
			    <td class="tdone">$d</td>
			    <td class="tdone">Working</td>
			    <td class="tdone"><a href="feedback.php?wname=$wname&project_name=$a"><button style="background-color: #4CAF50; border:none; color:white; padding: 10px 32px; text-align:center; text-decoration: none; display: inline-block; font-size: 16px; magin: 4px 2px; cursor: pointer; transition-duration:0.4s; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border-radius: 10px;"> Finish </button></a></td>
		 	 </tr>
abc;
		 	}
		 	echo "</table>";
		 	?>