<?php

echo"<h1><center><b><font color=red face=inkfree> zzz vechicle Repair Works </font></center></h1><HR>";
echo"<center><h2><b>*  Bill Details  *</b></h2><br><br>";
$r1=$_GET['vno'];
$r2=$_GET['vtype'];
$r3=$_GET['mno'];
$r4=$_GET['o'];
$r5=$_GET['c'];
$r6=$_GET['sd'];
$r7=$_GET['s'];
$r8=$_GET['t'];
echo"<table width=50% border=1 cellspacing=1 cellpading=10>";
echo"<tr><td>vechicle number <td>".$r1; 
echo"<tr><td>vechicle type <td>".$r2; 
echo"<tr><td>model number <td>".$r3; 
echo"<tr><td>owner <td>".$r4; 
echo"<tr><td>contact <td>".$r5;
echo"<tr><td>service date <td>".$r6;
echo"<tr><td>service <td>".$r7; 
echo"<tr><td>total amount<td>".$r8; 
echo "</center>"; 
echo "</table><br><br>";
function myFunction()
{
	 echo "window.print()";
}
echo "<input type=button value=print onclick='myFunction()'>";
?> 