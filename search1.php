<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form action="#" method="post">

<table style="background-color:#CCCCCC" align="center">
<tr>
<th colspan="2" style="font-size:40px" > search here</th></tr>
<tr>
<td style="font-size:24px">user id</td>
<td><input type="text" name="id" id="id" /></td>
</tr>
<tr><td>or</td></tr>
<tr><td style="font-size:24px">user name</td>
<td><input type="text" name="user" id="user" /></td></tr>
<tr>
<td colspan ="3" align ="center"> <input type="submit" value ="Go" name ="Go" /></td>
</tr>
</table>
</form>
</body>
</html>

<?php
include 'connection.php';
if(isset($_POST['Go']))
{


$getid=$_POST['id'];
$getuser=$_POST['user'];
$sql="select * from register where id='$getid' or user='$getuser'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
if($count==1)
{
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body bgcolor="#FF9900">
<table border="1" align="center">
<tr>
<th colspan="9" style="font-size:30px" align="center">Search Details</th></tr>

<tr>
<td style="font-size:24px" align="center">User</td>
<td style="font-size:24px" align="center">Password</td>
<td style="font-size:24px" align="center">Email</td>
<td style="font-size:24px" align="center">Full Name</td>
<td style="font-size:24px" align="center">Mobile</td>
<td style="font-size:24px" align="center">Adhar Card</td>
<td style="font-size:24px" align="center">Pan No</td>
<td style="font-size:24px" align="center">Address</td>
<td style="font-size:24px" align="center">City</td>
</tr>
<tr>
<td><?php echo $row['user']; ?> </td>
<td><?php echo $row['password']; ?> </td>
<td><?php echo $row['email']; ?> </td>
<td><?php echo $row['full_name']; ?> </td>
<td><?php echo $row['phone_no']; ?> </td>
<td><?php echo $row['adhar_card']; ?> </td>
<td><?php echo $row['pan_no']; ?> </td>
<td><?php echo $row['addres']; ?> </td>
<td><?php echo $row['city']; ?> </td>

</tr>
</table>
<?php
}
else
{
?>
<div align="center">Record Not Found</div>
<?php
}
}
?>


</body>
</html>
