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
if(isset($_POST['update']))
{
$getuser=$_POST['user'];
$getpass=$_POST['pass'];
$getfullname=$_POST['fullname'];
$getemail=$_POST['email'];
$getphoneno=$_POST['phone_no'];
$getadharcard=$_POST['adhar_card'];
$getpanno=$_POST['pan_no'];
$getaddres=$_POST['addres'];
$getcity=$_POST['city'];
$getuserid=$_POST['sendid'];


$update="update register set user='$getuser',password='$getpass',full_name='$getfullname',email='$getemail',phone_no='$getphoneno',adhar_card=$getadharcard,pan_no=$getpanno,addres=$getaddres,city=$getcity where id='$getuserid'";

$resultupdate=mysqli_query($con,$update);
   if($resultupdate==true)
   {
   echo 'Records are successfuly Updated';
   }
   }
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body bgcolor="#00CCCC">
<form action="" method="post">
<input type="hidden" name="sendid" value="<?php echo $row['id'];?>" />
<table align="center" border="2" width="400" height="600"> 
<tr>
<th colspan="2" style="font-size:30px" align="center">UPDATION FORM </th>
</tr>
<tr>
<td>user</td>
<td> <input type="text" name="user" id="user" value="<?php echo $row['user'];?>"
 </td> </td></tr>
 
 <tr>
 <td>password</td>
 <td><input type="text" name="pass" id="pass" value="<?php echo $row['password'];?>"
 </td></td></tr>
 
  <tr>
 <td>fullname</td>
 <td><input type="text" name="fullname" id="fullname" value="<?php echo $row['full_name'];?>"
 </td></td></tr>
 
  <tr>
 <td>email</td>
 <td><input type="text" name="email" id="email" value="<?php echo $row['email'];?>"
 </td></td></tr>
 
  <tr>
 <td>phone_no</td>
 <td><input type="text" name="phone_no" id="phone_no" value="<?php echo $row['phone_no'];?>"
 </td></td></tr>
 
   <tr>
 <td>adhar_card</td>
 <td><input type="text" name="adhar_card" id="adhar_card" value="<?php echo $row['adhar_card'];?>"
 </td></td></tr>
 
   <tr>
 <td>pan_no</td>
 <td><input type="text" name="pan_no" id="pan_no" value="<?php echo $row['pan_no'];?>"
 </td></td></tr>
 
    <tr>
 <td>address</td>
 <td><input type="text" name="addres" id="addres" value="<?php echo $row['addres'];?>"
 </td></td></tr>
 
    <tr>
 <td>city</td>
 <td><input type="text" name="city" id="city" value="<?php echo $row['city'];?>"
 </td></td></tr>
 
 
 
 <tr>
 <td colspan="2"> <input type="submit" name="update" value="update" />
 </td>
 </tr> </table>
 </form>
  <tr><td>
 <a href="logout.php">logout</a></td></tr>
 </body>
 </html>
 
 
