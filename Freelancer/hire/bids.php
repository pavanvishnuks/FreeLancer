<?php
echo '<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="shortcut icon" type="image/png" href="../images/favicon.png">';
		include "../connection.php";
		include "header.php";
		include "sublist.php";
		$name=$_SESSION["name"];
echo'<div class="boxx"><table class="tone">
			<tr class="trone">
			    <th class="thone"> PROJECT NAME </th>
			    <th class="thone"> EMPLOYEE NAME </th>
			    <th class="thone"> AMOUNT </th>
			    <th class="thone"> BID AMOUNT </th>
			    <th class="thone"> ACTION </th>
			</tr>';
			$query="select b.project_name,b.work_name,p.amount,b.bid_amount from bidding b,project p where b.project_name=p.project_name and b.hire_name='$name'";
			$result = mysqli_query($mysqli, $query);
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$a = $row['project_name'];
				$b = $row['work_name'];
				$c = $row['amount'];
				$d = $row['bid_amount'];
		echo<<<abc
		
		<tr class="trone">
			    <td class="tdone">$a</td>
			    <td class="tdone"><a href='work_details.php?work_name=$b'>$b</a></td>
			    <td class="tdone">$c</td>
			    <td class="tdone">$d</td>
			    <td class="tdone"><a class="buttwo" href="Assign Job.php?name=$name&project_name=$a&amount=$c">Assign Job</a></td>
			    </tr>
		 	 
abc;
			}
			echo'</table></div>';
			?>