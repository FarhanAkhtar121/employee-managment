<?php
session_start();
$getuser=$_SESSION['setuser'];
if($getuser=="")
{
header("location:login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>
</head>

<body bgcolor="#CCCCCC">
<table>
<tr style="margin-top: 10px"><td> <img src="img/maxresdefault.jpg" width="200" height="150" style="margin-left:10px"> </td>
<td align="center" width="1080" style="color: #FFFFFF; font-size:50px; font-style:italic; background-color:#99FFFF; margin-top:-150px"> SkyBase </td>
<td align="right" style="background-color:#99FFFF">Welcome:Admin<br>03/08/2017</td>
</tr></table>




<div style="margin-top:200px; margin-bottom:80px;" align="center">
<form action="#" method="post">
<table align ="center" border="2" style="background-color:#000000;font:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold; color:#CCFF00; ">
<tr>
<th colspan="10">search Details<th>
</tr>
<tr>
<td>Faculty Id </td>
<?php
include 'cn.php';
$sqlcntry="select * from add_employee";
$result=mysqli_query($con,$sqlcntry);
?>
<td><select name="faculty_id">
<option>Select Faculty ID</option>
<?php
while($row=mysqli_fetch_array($result))
{?>
<option value="<?php echo $row['id'];?>"><?php echo $row['id'];?></option>
<?php
}?>
</select>
</td>&nbsp;
<td>day</td>
<td><select name="day">
<?php
$sqlcntry="select * from attendence";
$result=mysqli_query($con,$sqlcntry);
?>
<option>dd</option>
<?php
while($row=mysqli_fetch_array($result))
{?>
<option value="<?php echo $row['day'];?>"><?php echo $row['day'];?></option>
<?php
}?>
</select>
</td>&nbsp;

<td>month</td>
<td><select name="month">
<?php
$sqlcntry="select * from attendence";
$result=mysqli_query($con,$sqlcntry);
?>
<option>mm</option>
<?php
while($row=mysqli_fetch_array($result))
{?>
<option value="<?php echo $row['month'];?>"><?php echo $row['month'];?></option>
<?php
}?>
</select>
</td>&nbsp;
<td>year</td>
<td><select name="year">
<?php
$sqlcntry="select * from attendence";
$result=mysqli_query($con,$sqlcntry);
?>
<option>yyyy</option>
<?php
while($row=mysqli_fetch_array($result))
{?>
<option value="<?php echo $row['year'];?>"><?php echo $row['year'];?></option>
<?php
}?>
</select>
</td>&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<td><input type="submit" name="getsalary" value="getsalary"></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['getsalary']))
{
$getfacid=$_POST['faculty_id'];
$getmonth=$_POST['month'];
$getyear=$_POST['year'];

$sqlempbasic="select * from add_basic_salary where emp_id='$getfacid'";
$resultbasic=mysqli_query($con,$sqlempbasic);
$rowbasic=mysqli_fetch_array($resultbasic);
$getbasic=$rowbasic['Totalsalary'];

$sql="select * from attendence where emp_id='$getfacid' or month='$getmonth' or year='$getyear' or present_status='P'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$count=mysqli_num_rows($result);
$finalsalary=($getbasic/30)*$count;
if($count>=1)
{

?>

<br>
<div align="center" style="margin-top:20px;">
<form action="#" method="post">
<table align ="center" border="2" style="background-color:#000000;font:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold; color:#CCFF00;">
<tr>
<th colspan="6">Faculty Salary</th>
</tr>
<tr>
<td>S.NO.</td>
<td>facultyname</td>
<td>No. Of Working Days</td>
<td>Gross salary</td>
<td>Action</td>
</tr>
<tr >
<tr>
<td><?php echo $row['id'];?></td>
<td><?php
$sqlcntry="select * from add_faculty where id='$getfacid'";
$resultfclty=mysqli_query($con,$sqlcntry);
$rowfclty=mysqli_fetch_array($resultfclty);

echo $rowfclty['facultyname'];

?></td>
<td><?php
echo $count?>
</td>
<td>
<?php echo $finalsalary;?>
</td>
<td><input type="button" name="print" value="print" onclick="window.print();"id></td>
</tr>
</table>
</form>
<?php
}
else
{
echo "<br><div align='center' style='font-weight:bold;'>Records not found</div>";
}
}

?>

</body>
</html>
