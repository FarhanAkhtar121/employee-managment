<?php
session_start();
include 'cn.php';

$getuser=$_SESSION['setuser'];


$sql="select * from add_employee where user='$getuser'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$getempid=$row['id'];

if($getuser=="")
{
header("location:login.php");
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}


</style>
<title>User Profile</title>
</head>

<body bgcolor="#CCCCCC">
<table>
<tr style="margin-top: 10px"><td> <img src="img/maxresdefault.jpg" width="200" height="150" style="margin-left:10px"> </td>
<td align="center" width="1080" style="color: #FFFFFF; font-size:50px; font-style:italic; background-color:#99FFFF; margin-top:-150px"> SkyBase </td>
<td align="right" style="background-color:#99FFFF">Welcome:Admin<br>03/08/2017</td>
</tr></table>


<?php
include 'usermenu.php';
?>

<div align="center" style="margin-top:40px; margin-right:1000px;">
<form action="" method="post">

<table id="customers">
<h3>user salary</h3>
<tr>



<th>FULL NAME</th>
<td> <?php echo $row['full_name'];?>
 </td> </tr>
 <?php
 $sqlempbasic="select * from add_basic_salary where emp_id='$getempid'";
$resultbasic=mysqli_query($con,$sqlempbasic);
$rowbasic=mysqli_fetch_array($resultbasic);
?>
<tr>
<th>Basic Salary</th>
<td> <?php echo $rowbasic['basic_salary'];?>
 </td> </tr>
<tr>
<th>Total Salary</th>
<td> <?php echo $rowbasic['total_salary'];?>
 </td> </tr>
 
 <tr>
<th>HRA</th>
<td> <?php echo $rowbasic['hra'];?>
 </td></tr>
 
 <tr>
<th>TA</th>
<td> <?php echo $rowbasic['ta'];?>
 </td> </tr>
 
 <tr>
<th>PF %</th>
<td> <?php echo $rowbasic['pf'];?>
 </td> </tr>
 
 
 
 
 
 </table>
 
 
 
 
 </form>
 </body>
 </html>