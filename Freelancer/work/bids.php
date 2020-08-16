<?php
echo'<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" type="image/png" href="../images/favicon.png">';
	include"../connection.php";
	include"header.php";
	include"sublist.php";
echo '<table class="tone">
			<tr class="trone">
			    <th class="thone"> PROJECT NAME </th>
			    <th class="thone"> OWNER </th>
			    <th class="thone"> AMOUNT </th>
			    <th class="thone"> MY BID </th>
			    <th class="thone"> ACTION </th>
			</tr>';
			$query="select b.project_name,b.hire_name,p.amount,b.bid_amount from bidding b,project p where b.project_name=p.project_name and b.work_name='$wname'";
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
			    <td class="tdone"><a href="Delete bid.php?name=$wname&project_name=$a">Delete</a></td>
			    </tr>
		 	 
abc;
			}
			echo "</table>";
?>