<?php
session_start();
include 'connection.php';
$getuser=$_SESSION['setuser'];
$sql="select * from register";
$result=mysqli_query($con,$sql);
if($getuser=="")
{
header("location:register1.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
function Delete(url)
{
var getconfirm=confirm('Are You Sure Want To Delete This Record?');

if(getconfirm)
{
location.replace(url);
}
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>view</title>
</head> <body background="img/FB_IMG_1448164773982.jpg">
<div style=" margin-left:30px; margin-top:100px">
<table border="1" align="center" style="background-color:#3366FF">
<tr> <th colspan="6" style="font-size:30px"> USER RECORDS </th></tr>
<tr style="font-size:30px">
<td>Sl No</td>
<td>User</td>
<td>Password</td>
<td>Email</td>
<td>Mobile No</td>
<td>Action</td>
</tr>

<?php
$i=1;
      while($row=mysqli_fetch_array($result))
 {
 ?>
 
 <tr style="font-size:20px"> 
 <td><?php echo $i; ?> 	  </td>
 <td><?php echo $row['user']; ?> 	  </td>
  <td><?php echo $row['password']; ?> 	  </td>
   <td><?php echo $row['email']; ?> 	  </td>
    <td><?php echo $row['phone_no']; ?> 	  </td>
 
 <td> 
 <a href="edit1.php?id=<?php echo $row['id'];?>">Edit</a>|<a href="javascript:void();" onclick="Delete('delete.php?id=<?php echo $row['id'];?>')">Delete</a>|<a href="javascript:void();" onclick="window.open('viewmore.php?id=<?php echo $row['id'];?>','popup','width=800,height=300,left=200,top=100');">ViewMore</a>  
 </td>
 </tr>
 
 
 <?php $i++;
 }
 ?>
 <tr><td>
 <a href="logout.php">logout</a></td></tr>
 </table>
 
 
 </body>
 </html>
