<html>
<body>
<?php
$flag=true; 
if($_SERVER['REQUEST_METHOD']=='POST')
{
if(!empty($_POST['owner']))
{
	echo"<b><font color=red size=5>Hello!!".$_POST['owner']." :)</font></b>";
}
else
{
	echo" welcome customer!!:) <br>";
}
echo"<table width=50% align=center border=1 cellspacing=1 cellpading=10>";
if(!empty($_POST['vechicle_no']))
{
	$vechicle_no=$_POST['vechicle_no'];
	echo"<tr><td>Vechicle No <td>".$vechicle_no."<tr>";
}
else 
{
	echo "<tr><td>Vechicle No <td>Please Enter The Vechicle number ";
	$flag=false;
}
if(!empty($_POST['vechicle_type']))
{
	$vechicle_type=$_POST['vechicle_type'];
	echo"<tr><td>Vechicle Type <td>".$vechicle_type."<tr>";
}
else 
{
	echo "<tr><td>Vechicle Type <td>Please Enter The Vechicle Type ";
	$flag=false;
}
if(!empty($_POST['model_no']))
{
	$model_no=$_POST['model_no'];
	echo"<tr><td>Model No <td>".$model_no."<tr>";
}
else 
{
	echo "<tr><td>Model no <td>Please Enter The Moddel no ";
	$flag=false;
}
if(!empty($_POST['owner']))
{
	$owner=$_POST['owner'];
	echo"<tr><td>Owner Name <td>".$owner."<tr>";
}
else 
{
	echo "<tr><td>Owner Name <td>Please Enter The  Customer Name ";
	$flag=false;
}
if(!empty($_POST['contact']))
{
	$contact=$_POST['contact'];
	echo"<tr><td>Contact <td>".$contact."<tr>";
}
else 
{
	echo "<tr><td>Contact <td>Please Enter The Contact ";
	$flag=false;
}
if(!empty($_POST['sdate']))
{
	$sdate=$_POST['sdate'];
	echo"<tr><td>Service Date <td>".$sdate."<tr>";
}
else 
{
	echo "<tr><td>Service Date <td>pls enter the service date ";
	$flag=false;
}
echo"<tr><td>service  <td>";
if(empty($_POST['waterwash']))
{
   $_POST['waterwash']=0;
}
if(empty($_POST['dentremind']))
{
  $_POST['dentremind']=0;
}
if(empty($_POST['tyrechange']))
{
$_POST['tyrechange']=0;
}
if(empty($_POST['others']))
{
 $_POST['others']=0;
}
$service="waterwash=". $_POST['waterwash']."+dentremind=".$_POST['dentremind']."+tyrechange=".$_POST['tyrechange']."+others=".$_POST['others'];
echo $service;

echo "</table>";
echo "<h1>Totel amount = ".$total= $_POST['waterwash']+$_POST['dentremind']+$_POST['tyrechange']+$_POST['others']."</h1>";
if($flag==true)
{
	$connection=@mysqli_connect('localhost','public','root','public') OR die('connection failed'.mysqli_connect_error());
             $qry="insert into customer values('$vechicle_no','$vechicle_type','$model_no','$owner','$contact','$sdate','$service','$total')";
	$result=mysqli_query($connection,$qry) OR die('query failed'.mysqli_connect_error());
	$qry1="select * from customer where vechicle_no='$vechicle_no'";
	$result1=mysqli_query($connection,$qry1) OR die('query failed'.mysqli_connect_error());
	if(mysqli_num_rows($result1)>=2)
	{
		echo'<script>alert(" already our customer")</script>';
	}
	mysqli_close($connection);
}
echo "<br><br>";
echo "<a href=bill.php?vno=".$vechicle_no."&vtype=".$vechicle_type."&mno=".$model_no."&o=".$owner."&c=".$contact."&sd=".$sdate."&s=".$service."&t=".$total."Create Bill</a>";
echo "<br><a href=view.php>view daily works </a>";
}
?>
<form method='POST' action='demo3.php'>
<h1><center><b><font color=red face=inkfree> zzz vechicle Repair Works </font></center></h1><HR>
<h2><center><b>*  Customer Details  *</b></center></h2><br><br>
<table align=center cellspacing=10 cellpading=10  width=50% bgcolor=white>
<font face=times new roman>
<tr><td>vechicle number <td><input type=text name=vechicle_no placeholder=vechicle_no value=<?php if(!empty($vechicle_no))
											echo "$vechicle_no";
											else
											echo "";?>>
<tr><td>vechicle type  <td><select name=vechicle_type>
<option value=choose <?php if(!empty($vechicle_type)&&$vechicle_type=="choose")
							echo"selected";?>>choose vechicle type</option>
<option value=2wheeler <?php if(!empty($vechicle_type)&&$vechicle_type=="2w")
							echo"selected";?>> 2 wheeler </option>
<option value=3wheeler <?php if(!empty($vechicle_type)&&$vechicle_type=="3w")
							echo"selected";?>> 3 wheeler </option>
<option value=4wheeler <?php if(!empty($vechicle_type)&&$vechicle_type=="4w")
							echo"selected";?>> 4 wheeler </option></select>
<tr><td>model number <td><input type=text name=model_no placeholder=model_no value=<?php if(!empty($model_no))
											echo "$model_no";
											else
											echo "";?>>
<tr><td>owner name <td><input type=text name=owner placeholder=name value=<?php if(!empty($owner))
											echo "$owner";
											else
											echo "";?>>
<tr><td>contact<td><input type=text name=contact placeholder=contact value=<?php if(!empty($contact)&&is_numeric($contact))
											echo "$contact";
											else
											echo "";?>>
<tr><td>service date<td><input type=date name=sdate  value=<?php if(!empty($sdate))
											echo "$sdate";
											else
											echo "";?>>
<tr><td>service <td><input type=checkbox name=waterwash value=100 <?php if(!empty($_POST['waterwash'])&&$_POST['waterwash']=='100')
							echo "checked"; 
						else
							echo"0";?>>water wash(100)
<input type=checkbox name=dentremind value=500 <?php if(!empty($_POST['dentremind'])&&$_POST['dentremind']=='500')
							echo "checked"; 
						else
							echo"0"; ?>>dent remind(500)
<input type=checkbox name=tyrechange value=1200 <?php if(!empty($_POST['tyrechange'])&&$_POST['tyrechange']=='1200')
							echo "checked"; 
						else
							echo"0"; ?>>tyre change(1200)
<br><input type=text name=others placeholder=others value=<?php if(!empty($_POST['others']))
							echo $_POST['others'];
						 else
							echo "";?>>
						

<tr><td><td align=right><input type=submit value=save>
</font>
</table>
</body>
</html>



