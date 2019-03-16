
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


<title> Employee Managment </title>
</head>

<body bgcolor="#CCCCCC">
<table>
<tr style="margin-top: 10px"><td> <img src="img/maxresdefault.jpg" width="200" height="150" style="margin-left:10px"> </td>
<td align="center" width="1080" style="color: #FFFFFF; font-size:50px; font-style:italic; background-color:#99FFFF; margin-top:-150px"> SkyBase </td>
<td align="right" style="background-color:#99FFFF">Welcome:Admin<br>03/08/2017</td>
</tr></table>

<?php
include 'usermenu.php';
?>


<form action="#" method="post">
<table align ="center" border="2">
<tr>
<th colspan="10">Search Details<th>
</tr>
<td>Month</td>
<td><select name="month">
<option>select month</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>Jun</option><option>Jul</option><option>Aug</option><option>Sep</option><option>Oct</option><option>Nov</option><option>Dec</option>

</select>
</td>&nbsp;

<td>Year</td>
<td><select name="year">
<option>select year</option>
<?php
for($i=2017;$i<=2030;$i++)
{?>
<option><?php echo $i;?></option>
<?php
}?>
</select>
</td>

&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<td><input type="submit" name="search" value="search"></td>
</tr>
</table>
</form>


<?php
session_start();
include 'cn.php';
$getuser=$_SESSION['setuser'];
$sqlemp="select * from add_employee where user='$getuser'";
$resultemp=mysqli_query($con,$sqlemp);
$rowemp=mysqli_fetch_array($resultemp);
$getempid=$rowemp['id'];
$getfullname=$rowemp['full_name'];
if($getuser=="")
{
header("location:login.php");
}

if(isset($_POST['search']))
{
$getmonth=$_POST['month'];
$getyear=$_POST['year'];


$sql="select * from attendence where emp_id='$getempid' and month='$getmonth' and year='$getyear' and present_status='P'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$count=mysqli_num_rows($result);

?>

<br>
<div align="center" style="margin-top:20px;">
<form action="#" method="post">
<table align ="center" border="2">
<tr>
<th colspan="6">Employee Attendance</th>
</tr>
<tr>
<td>S.NO.</td>
<td>Emp Id</td>
<td>Employee Name</td>
<td>No. Of Working Days</td>
<td>Month</td>
<td>Year</td>

</tr>
<tr>

<td>1</td>
<td><?php echo $getempid;?></td>

<td>
<?php echo $getfullname;?></td>
<td align="center"><?php
echo $count?> <input type="hidden" name="workdays" value="<?php echo $count;?>">
</td>
<td><?php echo $getmonth;?> <input type="hidden" name="month" value="<?php echo $getmonth;?>">   </td>
<td><?php echo $getyear;?> <input type="hidden" name="year" value="<?php echo $getyear;?>">      </td>
</tr>
</table>
</form>
<?php
}
?>


























<div style="margin-top:400px; background-color:#0000FF; color:#FFFFFF">
<span style="left:200px"> @2017 my site </span>
<span style="text-align:right"> &copy;Developed By Farhan </span>
</div>

</body>
</html>
