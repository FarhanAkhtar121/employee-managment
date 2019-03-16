<?php

session_start();
$getuser=$_SESSION['setuser'];
if($getuser=="")
{
header("location:login.php");
}
include'cn.php';
$sql="select * from add_employee where user='$getuser'";
$result=mysqli_query($con,$sql);
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

<div style=" margin-left:30px; margin-top:100px">
<form action="#" method="post">
<table id="customers">
<h2>user profile</h2>

<tr>
<th>S.NO.</th>
<th>Employee name</th>
<th>Gender</th>
<th>D.O.B</th>
<th>Pancard</th>
<th>Email</th>
<th>Mobile no.</th>
<th>Address</th>
<th>Photo</th>
<th>signature</th>
<th>Action</th>
</tr>
<?php $i=1;
$row=mysqli_fetch_array($result);

?>
<tr>
<td><?php echo $i;
?></td>
<td>
<?php echo $row['full_name'];
?></td>

<td>
<?php echo $row['gender'];
?></td>
<td>
<?php echo $row['dob'];
?></td>
<td>
<?php echo $row['pan_no'];
?></td>
<td>
<?php echo $row['email'];
?></td>
<td>
<?php echo $row['phone_no'];
?></td>
<td>
<?php echo $row['address'];
?></td>

<td>
<img src="photo/<?php echo $row['photo_upload'];?>" width="100px;">
</td>
<td>
<img src="sign/<?php echo $row['sign_upload'];?>" width="100px;"></td>
<td>
<input type="button" name="print" value="print" onclick="window.print();"id>
</td>
</tr>
</table>
</form>


<div style="margin-top:350px; background-color:#0000FF; color:#FFFFFF">
<span style="left:200px"> @2017 my site </span>
<span style="text-align:right"> &copy;Developed By Farhan </span>
</div>

</body>
</html>
