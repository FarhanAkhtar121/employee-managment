<html>
<head>

<style>
.dropbtn {
    background-color: #FFFFFF;
    color: Blue;
    padding: 16px;
    font-size: 30px;
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


<table style="margin-top:70px; margin-right:900px; width:100%">
<tr style="background-color:#FFFFFF">

  <td style="color:#0000FF; font-size:30px" align="center"> &nbsp; Home </td>
  
  <td style="color:#0000FF; font-size:30px" align="center">&nbsp; Profile </td>

<td style="color:#0000FF; font-size:30px" align="center"> <div class="dropdown"> <button class="dropbtn">Employee</button> 
<div class="dropdown-content"> 
   <a href="add_employee.php">Add Employee</a>
    <a href="add_basic_salary.php">Add Basic Salary</a>
    <a href="#">Attendence</a>
  </div>
</div></td>

<td style="color:#0000FF; font-size:30px" align="center"> &nbsp; Report </td>

<td style="color:#0000FF; font-size:30px" align="center"><div class="dropdown"> <button class="dropbtn">Setting</button>
<div class="dropdown-content"> 
   <a href="add_country.php">Add Country</a>
    <a href="add_state.php">Add State</a>
    <a href="add_district.php">Add District</a>
  </div>
</div></td>

<td style="color:#0000FF; font-size:30px" align="center"><div class="dropdown"> <button class="dropbtn">Account</button>
<div class="dropdown-content"> 
   <a href="#">Activate User</a>
    <a href="#">Deactivate User</a>
  </div>
</div></td>

<td style="color:#0000FF; font-size:30px" align="center"> &nbsp; Change Password </td>
</tr>
</table>


<form action="#" method="post">
<table align ="center" border="2">
<tr>
<th colspan="10">Search Details<th>
</tr>
<tr>
<td>Employeee Id </td>
<?php
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

$sql="select * from attendence where id='$getempid' and month='$getmonth' and year='$getyear' and present_status='P'";
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
<td>Gross salary</td>
<td>Action</td>
</tr>
<tr>
<tr>
<td><?php echo $row['id'];?> </td>
<td><?php
$sqlcntry="select * from add_employee where id='$getempid'";
$result=mysqli_query($con,$sqlcntry);
$row=mysqli_fetch_array($result);

echo $row['full_name'];

?> </td>
<td><?php
echo $count?>
</td>
<td>
<?php echo $finalsalary;?>
</td>
<td><input type="submit" name="save" value="Save"></td>
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















<div style="margin-top:350px; background-color:#0000FF; color:#FFFFFF">
<span style="left:200px"> @2017 my site </span>
<span style="text-align:right"> &copy;Developed By Farhan </span>
</div>

</body>
</html>
