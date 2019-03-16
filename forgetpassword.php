<?php
session_start();
include 'cn.php';
if(isset($_POST['GetOTP']))
{
$getmobile=$_POST['mobile'];
$sql="select * from add_employee where phone_no='$getmobile'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count==1)
{
$_SESSION['setmobile']=$getmobile;
?>
<script>
alert('OTP sent seccssfully your register mobile number');
location.replace("sentotp.php");
</script>
<?php
}
else
{
?>
<script>
alert('Invalid Mobile Number');
</script>
<?php
}
}
?>
<html>
<head>
<title>Forgot Password</title>
</head>



<div style="margin-top:100px">
<form action="#" method="post">
<table border="1" style="background:#000000;"align="center" width="300px" height="100px" bgcolor="#3399FF">
<th align="center" colspan="2" style="font-size:24px;color:#FFCC00">Forget_password </th>

<tr>
<td style="font-size:18px;color:#FFCC00;">Mobile</td>
<td><input type="text" name="mobile" id="mobile" maxlength="10"/>
</td></tr>
<tr>
<td align="center" colspan="2" style="font-size:18px"> <input type="submit" value="Get OTP" name="GetOTP" />
</td></tr></table>


</table>

</form>


</body>
</html>
