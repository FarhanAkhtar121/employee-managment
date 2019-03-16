<?php 
$user ="aryanakhtar1989@gmail.com";
$pass ="farhan";

if(isset($_POST['login']))
{
$getuser = $_POST['user'];
$getpass = $_POST['pass'];
if($getuser==$user && $getpass==$pass)
{
header("location:Welcome.php");
}
else
{
echo "user or password Invalid";
}
}
?>


<DOCTYPE html>

<html>
<head>
<title> login page </title>
</head>
<body>
<form action="#" method="post">
<table align = "center" border ="5">
<tr>
<th colspan ="2"> USER LOGIN </th>
</tr>

<tr>
<td> user </td>
<td> <input type ="text" name="user" id ="user"> </td>
</tr>

<tr>
<td> pass </td>
<td> <input type ="password" name="pass" id ="pass"> </td>
</tr>

<tr>
<td colspan ="3" align ="center"> <input type ="submit" value ="login" name ="login">
</td>
</tr>
</table>

</form>
</body></html>

