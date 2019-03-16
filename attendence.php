<?php

session_start();
$getuser=$_SESSION['setuser'];
if($getuser=="")
{
header("location:login.php");
}

include 'cn.php';
$getdate=date('d/M/Y');
if(isset($_POST['AddAttendance']))
{
	$getempid=$_POST['employee_id'];
	$getPresent_status=$_POST['present'];
    $getmonth=$_POST['month'];
	$getyear=$_POST['year'];
echo	$sql="select * from attendence where emp_id='$getempid' and Attendence_date='$getdate'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count!=1)
{
$sql="insert into attendence(id,emp_id,present_status,month,year,Attendence_date)values('','$getempid','$getPresent_status','$getmonth','$getyear','$getdate')";
$result=mysqli_query($con,$sql);
if($result==true)
{
$msg="Attendence Added";
}

}
else
{
$msg=$getempid." Already Attendence Added";
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


<title> Employee Attendence </title>
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

<div align="center" style="margin-top:200px;">
<form action="#" method="post" onSubmit="return validation();" enctype="multipart/form-data">
<table align ="center" border="2">
<tr>
<th colspan="2"> Attendance </th>
</tr>

<tr>
<td>Faculty Id </td>
<td><select name="employee_id">
<?php
$sqlcntry="select * from add_employee";
$result=mysqli_query($con,$sqlcntry);
?>
<option>Select Employee ID</option>
<?php
while($row=mysqli_fetch_array($result))
{?>
<option value="<?php echo $row['id'];?>"><?php echo $row['id'];?></option>
<?php
}?>
</select>
</td>
</tr>
<tr>
<td>Present_status</td>
<td>
<select name="present">
<option>select present_status</option>
<option>p</option>
<option>A</option>
</select>
</td>
</tr>
<tr>
<td>Month</td>
<td><select name="month">
<option>select month</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>Jun</option><option>Jul</option><option>Aug</option><option>Sep</option><option>Oct</option><option>Nov</option><option>Dec</option>

</select>
</td>
</tr>
<tr>
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
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="AddAttendance"  value="AddAttendance"/></td>
</tr>
</table>
</form>
</div>
<div align="center" style="color:#003300; font-weight:bold;"><?php echo @$msg;?></div>














<div style="margin-top:350px; background-color:#0000FF; color:#FFFFFF">
<span style="left:200px"> @2017 my site </span>
<span style="text-align:right"> &copy;Developed By Farhan </span>
</div>

</body>
</html>
