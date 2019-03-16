<?php
session_start();
include 'cn.php';
echo $getotp=$_SESSION['setotp'];
if(isset($_POST['VERIFIED']))
{
$getuserotp=$_POST['otp'];
if($getuserotp==$getotp)
{
?>
<script>
alert('OTP is verified Please create new Password');
location.replace("change_password.php");
</script>
<?php
}
else
{
?>
<script>
alert('OTP is invalid');
</script>
<?php
}
}
?>
<html>
<head>
<title>Veriy OTP</title>
</head>



<div style="margin-top:100px">
<form action="#" method="post">
<table border="1" style="background:#000000;"align="center" width="300px" height="100px" bgcolor="#3399FF">
<th align="center" colspan="2" style="font-size:24px;color:#FFCC00">OTP </th>

<tr>
<td style="font-size:18px;color:#FFCC00;">OTP</td>
<td><input type="text" name="otp" id="otp" />
</td></tr>
<tr>
<td align="center" colspan="2" style="font-size:18px"> <input type="submit" value="VERIFIED" name="VERIFIED" />
</td></tr></table>


</table>
</form>



</body>
</html>
