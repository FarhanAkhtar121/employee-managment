<?php
session_start();
include 'connection1.php';
$getmobile=$_SESSION['setmobile'];
if(isset($_POST['change']))
{
$newpass=$_POST['newpass'];
$sql="select * from employee where Mobile='$getmobile'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$getuser=$row['User'];

$updt="update login set Password='$newpass' where User='$getuser'";
$resultpass=mysqli_query($con,$updt);
if($resultpass==true)
{
?>
<script>
alert('Password Successfully Changed ! Please Login');
location.replace("login.php");
</script>
<?php
}
}


?>

<html>
<title>Change Password</title>
</head>


<body>
<div style="margin-top:100px">
<form action="#" method="post">
<table border="1" style="background:#000000;"align="center" width="300px" height="100px" bgcolor="#3399FF">
<th align="center" colspan="2" style="font-size:24px;color:#FFCC00">Change_password </th>

<tr>
<td style="font-size:18px;color:#FFCC00;">New_password</td>
<td><input type="text" name="newpass" id="newpass" />
</td></tr>

<tr>
<td style="font-size:18px;color:#FFCC00;">Confirm_password</td>
<td><input type="text" name="confpass" id="confpass" />
</td></tr>

<tr>
<td align="center" colspan="2" style="font-size:18px"> <input type="submit" value="change" name="change" />
</td></tr></table>


</table>
</form>

</body>
</html>








</body>
</html>
