<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Change Password</title>
<style>
.dropbtn {
    background-color: #FFFFFF;
    color: Blue;
    padding: 16px;
    font-size: 20px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>

<script>

function validate()
{

	var getnewpass=document.getElementById("newpassword").value;
	var getcnfrmpassword=document.getElementById("cnfrmpassword").value;
if(getnewpass!=getcnfrmpassword)
	{
	alert("Password doesnt match");
	cnfrmpassword.focus();
	return false;
	}
	}

	var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
</script>

</head>

<body bgcolor="#CCCCCC">
<table>
<tr style="margin-top: 10px"><td> <img src="img/maxresdefault.jpg" width="200" height="150" style="margin-left:10px"> </td>
<td align="center" width="1080" style="color: #FFFFFF; font-size:50px; font-style:italic; background-color:#99FFFF; margin-top:-150px"> SkyBase </td>
<td align="right" style="background-color:#99FFFF">Welcome:Admin<br>03/08/2017</td>
</tr></table>




<?php
session_start();
$getuser=$_SESSION['setuser'];
if($getuser=="")
{
header("location:login.php");
}
if($getuser=="admin")
{
include 'adminmenu.php';
}
else
{
include 'usermenu.php';
}


include 'cn.php';
if(isset($_POST['change']))
{
    $getoldpass=$_POST['oldpassword'];
	$getnewpass=$_POST['newpassword'];
	$sql="select * from login  where password='$getoldpass' and user='$getuser'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	if($count==1)
	{
	if($getoldpass!=$getnewpass)
	{
	 $updt="update login set password='$getnewpass' where user='$getuser'";
	 $result=mysqli_query($con,$updt);
	 if($result==true)
	 {
	   $msg="Password Successfully Changed";
	   }
	   
		}
		else
		{
		 $msg="Old Password and confirm Password should not be same";
		 }
		 }
		else
		{
			 $msg="Old Password is invalid";
		}
	}
	?>




	</div>
<div style="margin-top:200px; margin-bottom:80px;" align="center">
<form action="#" method="post" onSubmit="return validate();" enctype="multipart/form-data">
<table align ="center" border="2" style="background-color:#000000;font:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold; color:#CCFF00; ">
<tr>
<th colspan="2">Change Password</th></tr>
<tr>
<td>Old Password</td>
<td><input type="text" name="oldpassword" id="oldpassword" required /></td>
</tr>
<tr>
<td>New Password</td>
<td><input type="password" name="newpassword" id="newpasswod" required/></td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" name="cnfrmpassword" id="cnfrmpassword" required/></td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" value="change" name="change"/></td>
</tr>
</table>
</form>
</div>
<div align="center" style="color:#003300; font-weight:bold;"><?php echo @$msg;?></div>
</body>
</html>
