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


<title>Gross Salary </title>
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


<form action="#" method="post">
<table align ="center" border="2">
<tr>
<th colspan="10">Search Details<th>
</tr>
<tr>
<td>Employeee Id </td>
<?php


session_start();
$getuser=$_SESSION['setuser'];
if($getuser=="")
{
header("location:login.php");
}

include 'cn.php';
$sqlcntry="select * from add_employee";
$result=mysqli_query($con,$sqlcntry);
?>
<td><select name="employee_id">
<option>Select Employee ID</option>
<?php
while($row=mysqli_fetch_array($result))
{?>
<option value="<?php echo $row['id'];?>"><?php echo $row['id'];?></option>
<?php
}?>
</select>
</td>&nbsp;

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
if(isset($_POST['search']))
{
$getempid=$_POST['employee_id'];
$getmonth=$_POST['month'];
$getyear=$_POST['year'];

$sqlempbasic="select * from add_basic_salary where emp_id='$getempid'";
$resultbasic=mysqli_query($con,$sqlempbasic);
$rowbasic=mysqli_fetch_array($resultbasic);
$getbasic=$rowbasic['total_salary'];

$sql="select * from attendence where emp_id='$getempid' and month='$getmonth' and year='$getyear' and present_status='P'";
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
<table align ="center" border="2">
<tr>
<th colspan="6">Employee Salary</th>
</tr>
<tr>
<td>S.NO.</td>
<td>Employee Name</td>
<td>No. Of Working Days</td>
<td>Salary</td>
<td>Gross salary</td>
<td>Month</td>
<td>Year</td>
<td>Action</td>
</tr>
<tr>
<tr>
<td>1</td>

<td><?php
$sqlcntry="select * from add_employee where id='$getempid'";
$result=mysqli_query($con,$sqlcntry);
$row=mysqli_fetch_array($result);

echo $row['full_name'];

?> <input type="hidden" name="full_name" value="<?php echo '$getempname';?>" >  </td>
<td><?php
echo $count?> <input type="hidden" name="workdays" value="<?php echo $count;?>">
</td>
<td><?php echo $getbasic;?> <input type="hidden" name="basicsalary" value="<?php echo $getbasic;?>">
<td>
<?php echo $finalsalary;?> <input type="hidden" name="grosssalary" value="<?php echo $finalsalary;?>">
</td>
<td><?php echo $getmonth;?> <input type="hidden" name="month" value="<?php echo $getmonth;?>">   </td>
<td><?php echo $getyear;?> <input type="hidden" name="year" value="<?php echo $getyear;?>">      </td>
<td><input type="submit" name="save" value="Save"></td>
<td><input type="hidden" name="empid" value="<?php echo $getempid;?>"></td>
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


<?php

if(isset($_POST['save']))
{
$getempid=$_POST['empid'];
$getworkdays=$_POST['workdays'];
$getgrosssal=$_POST['grosssalary'];
$getmonth=$_POST['month'];
$getyear=$_POST['year'];

$sqlins="insert into salary(id,emp_id,no_of_working_days,gross_salary,month,year) values ('','$getempid','$getworkdays','$getgrosssal','$getmonth','$getyear')";
$result=mysqli_query($con,$sqlins);
if($result==true)
{
echo 'salary succesfully save';
}
}
?>












<div style="margin-top:350px; background-color:#0000FF; color:#FFFFFF">
<span style="left:200px"> @2017 my site </span>
<span style="text-align:right"> &copy;Developed By Farhan </span>
</div>

</body>
</html>
