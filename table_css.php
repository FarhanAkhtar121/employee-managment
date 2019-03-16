<?php

session_start();
$getuser=$_SESSION['setuser'];
if($getuser=="")
{
header("location:login.php");
}


include'cn.php';
$sql="select * from add_employee";
$result=mysqli_query($con,$sql);
?>





<!DOCTYPE html>
<html>
<head>
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



<div style="margin-top:200px; margin-bottom:80px;" align="center">
<form action="#" method="post">

<table id="customers" width="50px";>
  <tr>
    <th>S.no</th>
    <th>Name</th>
    <th>Gender</th>
	<th>D.O.B</th>
	<th>Pancard</th>
	<th>email</th>
	<th>Mobile</th>
	<th>Address</th>
	<th>Photo</th>
	<th>Sign</th>
	<th>Action</th>
  </tr>
  <?php $i=1;
while($row=mysqli_fetch_array($result))
{
?>
  
  <tr>
   <td><?php echo $i;
?></td>

<td>
<?php echo $row['full_name'];
?>
</td>
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

<a href="redit.php?id=<?php echo $row['id'];?>">Edit</a>/
<a href="#">Delete</a>/
<a href="#">viewsalary</a>
</td>
  </tr>
  <?php
$i++;
}
?>
</table>
</form>

</body>
</html>
