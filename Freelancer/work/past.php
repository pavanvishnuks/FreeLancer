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
			    <th class="thone"> GAIN AMOUNT </th>
			    <th class="thone"> YOUR FEEDBACK </th>
			    <th class="thone"> PROGRESS </th>
			    <th class="thone"> RECEIVED FEEDBACK <th>
			</tr>';
			$query="select * from job where progress='finished' and work_name='$wname' ";
			$result = mysqli_query($mysqli, $query);
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$a = $row['project_name'];
				$b = $row['hire_name'];
				$c = $row['amount'];
				$d = $row['bid_amount'];
				$e = $row['work_feedback'];
				$f = $row['hire_feedback'];
		echo<<<abc
		<tr class="trone">
			    <td class="tdone">$a</td>
			    <td class="tdone">$b</td>
			    <td class="tdone">$c</td>
			    <td class="tdone">$d</td>
			    <td class="tdone">$e</td>
			    <td class="tdone">Finished</td>
			    <td class="tdone">$f</td>
			    </tr>
abc;
		 	}
		 	echo "</table>";
		 	?>