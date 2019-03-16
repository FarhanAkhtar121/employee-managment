<?php
session_start();
$getuser=$_SESSION['setuser'];
if($getuser=="")
{
header("location:login.php");
}

include 'cn.php';

$getid=$_GET['id'];
$sql="select * from country where id='$getid'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

if(isset($_POST['update']))
{
$getcountry=$_POST['countryname'];
$getcountryid=$_POST['sendid'];

$update="update country set countryname='$getcountry' where id='$getcountryid'";

$resultupdate=mysqli_query($con,$update);
   if($resultupdate==true)
   {
   echo 'Records are successfuly Updated';
   }
   }
?>


<html>
<head>

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


<title> Update Country </title>
</head>

<body bgcolor="#CCCCCC">
<table>
<tr style="margin-top: 10px"><td> <img src="img/maxresdefault.jpg" width="200" height="150" style="margin-left:10px"> </td>
<td align="center" width="1080" style="color: #FFFFFF; font-size:50px; font-style:italic; background-color:#99FFFF; margin-top:-150px"> SkyBase </td>
<td align="right" style="background-color:#99FFFF">Welcome:Admin<br>03/08/2017</td>
</tr></table>

<?php
include 'adminmenu.php';
?>


<div style="margin-left:30px; margin-top:100px">
<form action="" method="post">
<input type="hidden" name="sendid" value="<?php echo $row['id'];?>" />
<table align="center" border="2"> 
<tr>
<th colspan="2" style="font-size:30px" align="center">UPDATE COUNTRY </th>
</tr>
<tr>
<td>Country Name</td>
<td> <input type="text" name="countryname" id="countryname" value="<?php echo $row['countryname'];?>"
 </td> </td></tr>

 <tr>
 <td colspan="2"> <input type="submit" name="update" value="update" />
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