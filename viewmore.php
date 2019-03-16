<?php
session_start();
include 'connection.php';

$getuser=$_SESSION['setuser'];

$getid=$_GET['id'];
$sql="select * from register where id='$getid'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

if($getuser=="")
{
header("location:register1.php");
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body background="img/windows_8-wallpaper-1920x1080.jpg"">


<form action="" method="post">
<input type="hidden" name="sendid" value="<?php echo $row['id'];?>" />
<table style="background-color:#FFCC99" align="center"> 
<tr>
<th colspan="2" style="font-size:30px" >USER RECORDS </th>
</tr>

<tr>
<td style="font-size:20px">FULL NAME</td>
<td> <input type="text" name="full_name" id="full_name" value="<?php echo $row['full_name'];?>"
 </td> </td></tr>
 

<tr>
<td style="font-size:20px">USER</td>
<td> <input type="text" name="user" id="user" value="<?php echo $row['user'];?>"
 </td> </td></tr>
 
 <tr>
 <td style="font-size:20px">PASSWORD</td>
 <td><input type="text" name="pass" id="pass" value="<?php echo $row['password'];?>"
 </td></td></tr>
 
  <tr>
 <td style="font-size:20px">EMAIL</td>
 <td><input type="text" name="email" id="email" value="<?php echo $row['email'];?>"
 </td></td></tr>
 
  <tr>
 <td style="font-size:20px">MOBILE</td>
 <td><input type="text" name="phone_no" id="phone_no" value="<?php echo $row['phone_no'];?>"
 </td></td></tr>
 
   <tr>
 <td style="font-size:20px">ADHAR CARD</td>
 <td><input type="text" name="adhar_card" id="adhar_card" value="<?php echo $row['adhar_card'];?>"
 </td></td></tr>
   <tr>
 <td style="font-size:20px">PAN NO</td>
 <td><input type="text" name="pan_no" id="pan_no" value="<?php echo $row['pan_no'];?>"
 </td></td></tr>
 
   <tr>
 <td style="font-size:20px">ADDRESS</td>
 <td><input type="text" name="addres" id="addres" value="<?php echo $row['addres'];?>"
 </td></td></tr>
 
   <tr>
 <td style="font-size:20px">CITY</td>
 <td><input type="text" name="city" id="city" value="<?php echo $row['city'];?>"
 </td></td></tr>
 
 <tr>
<td style="font-size:20px">PHOTO</td>
<td><img src="photo/<?php echo $row["photo"]; ?>"
 </td> </td></tr>
 
 <tr>
<td style="font-size:20px">SIGN</td>
<td><img src="sign/<?php echo $row["sign"]; ?>"
 </td> </td></tr>
 
 
 </form>
  <tr><td>
 <a href="logout.php">logout</a></td></tr>
 </table>
</body>
</html>
