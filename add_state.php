<?php
session_start();
$getuser=$_SESSION['setuser'];
if($getuser=="")
{
header("location:login.php");
}

include 'cn.php';


if (isset($_POST['Add']))
{
$getstate=$_POST['statename'];
$getcountry=$_POST['country'];

 $sql="SELECT * from state where state_name='$getstate'";

	 $result=mysqli_query($con,$sql);
   
   $count=mysqli_num_rows($result);
   
   if($count!=1)
   {
   
    $sqlinsert="INSERT INTO state(state_id,state_name,country_id) VALUES ('','$getstate','$getcountry')";
	
	   $result=mysqli_query($con,$sqlinsert);
   
   if($result==true)
   {
   echo 'State Name successfully Added';
   }
   
   else
   {
   echo 'Not Added';
   }
   }
   }
   
   ?>





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



<title> Add State </title>
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
<form action="#" method="post">
<table border="1" style="background-color:#CCCCCC" align="center">
<tr>
<th colspan="2" style="font-size:40px"> Add State</th></tr>
<tr>
<td style="font-size:24px">State Name</td>
<td><input type="text" name="statename" id="statename" /></td>
</tr>


<tr><td>Country Name</td>
<td><select name="country">
<?php
$sqlcntry="select * from country";
$result=mysqli_query($con,$sqlcntry);
?>
<option>Select Country</option>
<?php
while($row=mysqli_fetch_array($result))
{?>
<option value="<?php echo $row['id'];?>"><?php echo $row['countryname'];?></option>
<?php
}?>
</select>
</td>
</tr>


<tr>
<td colspan ="3" align ="center"> <input type="submit" value ="Add" name ="Add" /></td></tr>
</table></div>
</form>




<div style=" margin-left:30px; margin-top:100px">
<table id="customers">
<h2>State Details</h2>
<tr style="font-size:30px">
<th>Sl No</th>
<th>State Name</th>
<th>Action</th>
</tr></div>


<?php
$sql="select * from state";
$result=mysqli_query($con,$sql);
$i=1;
      while($row=mysqli_fetch_array($result))
 {
 ?>
 
 <tr style="font-size:20px"> 
 <td><?php echo $i; ?> 	  </td>
 <td><?php echo $row['state_name']; ?> </td>
 
  <td> 
 <a href="editstate.php?id=<?php echo $row['state_id'];?>">Edit</a>|<a href="javascript:void();" onClick="Delete('deletestate.php?id=<?php echo $row['state_id'];?>')">Delete</a>  
 </td>
 </tr>
 
  <?php $i++;
 }
 ?>

</table>



<div style="margin-top:350px; background-color:#0000FF; color:#FFFFFF">
<span style="left:200px"> @2017 my site </span>
<span style="text-align:right"> &copy;Developed By Farhan </span>
</div>

</body>
</html>

