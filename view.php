<?php

	$connection=@mysqli_connect('localhost','public','root','public') OR die('connection failed'.mysqli_connect_error());
	$qry="select * from customer order by service_date desc";
	$result=mysqli_query($connection,$qry) OR die('query failed'.mysqli_connect_error());
              echo " <h1><center>Daily Works </h1></center><HR>";
	if($result)
	{
		echo "<table width=75% border=1 align=center>";
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			echo"<tr>";
			echo "<td>".$row['vechicle_no'];
			echo "<td>".$row['vechicle_type'];
			echo "<td>".$row['model_no'];
			echo "<td>".$row['owner'];
			echo "<td>".$row['contact'];
			echo "<td>".$row['service_date'];
			echo "<td>".$row['service'];
		}
		
		echo"</table><br><br>";
echo"<a href=demo.php>back  to customer details</a>";
	}
	mysqli_close($connection);
?>



