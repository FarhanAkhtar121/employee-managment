<?php
include 'cn.php';
$getid=$_GET['id'];
$sql="select * from add_employee where id=$getid";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
if(isset($_POST['Edit']))
{
    $getuser=$_POST['full_name'];
	$getgender=$_POST['gender'];
	$getday=$_POST['day'];
	$getmonth=$_POST['month'];
	$getyear=$_POST['year'];
	$finaldob=$getday."/".$getmonth."/".$getyear;
	$getpancard=$_POST['pan_no'];
	$getemail=$_POST['email'];
	$getmobile=$_POST['phone_no'];
	$getaddress=$_POST['address'];
	$getphoto=$_FILES['photo_upload']['name'];
	$getsign=$_FILES['sign_upload']['name'];
	move_uploaded_file($_FILES['photo']['tmp_name'],'Photo/'.$getphoto);
    move_uploaded_file($_FILES['sign']['tmp_name'],'Signature/'.$getsign);
	$updt="update add_employee set facultyname ='$getuser',gender='$getgender',day='$getday',month='$getmonth',year='$getyear',pancard='$getpancard','Email='$getemail', mobile='$getmobile',address='$getaddress',photo='$getphoto',signature='$getsignature' where id='$getid'";
$result=mysqli_query($con,$updt);
if($result==true)
{
echo"Records succesfully changed";
}
else
{
echo"Records not changed";
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


<title> Add Employee </title>
</head>

<body bgcolor="#CCCCCC">
<table>
<tr style="margin-top: 10px"><td> <img src="employee_project/img/maxresdefault.jpg" width="200" height="150" style="margin-left:10px"> </td>
<td align="center" width="1080" style="color: #FFFFFF; font-size:50px; font-style:italic; background-color:#99FFFF; margin-top:-150px"> SkyBase </td>
<td align="right" style="background-color:#99FFFF">Welcome:Admin<br>03/08/2017</td>
</tr></table>


<table style="margin-top:70px; margin-right:900px; width:100%">
<tr style="background-color:#FFFFFF">

  <td style="color:#0000FF; font-size:30px" align="center"> &nbsp; Home </td>
  
  <td style="color:#0000FF; font-size:30px" align="center">&nbsp; Profile </td>

<td style="color:#0000FF; font-size:30px" align="center"> <div class="dropdown"> <button class="dropbtn">Employee</button> 
<div class="dropdown-content"> 
   <a href="employee_project/add_employee.php">Add Employee</a>
    <a href="employee_project/add_basic_salary.php">Add Basic Salary</a>
    <a href="#">Attendence</a>
  </div>
</div></td>

<td style="color:#0000FF; font-size:30px" align="center"> &nbsp; Report </td>

<td style="color:#0000FF; font-size:30px" align="center"><div class="dropdown"> <button class="dropbtn">Setting</button>
<div class="dropdown-content"> 
   <a href="employee_project/add_country.php">Add Country</a>
    <a href="employee_project/add_state.php">Add State</a>
    <a href="employee_project/add_district.php">Add District</a>
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



<div style="margin-top:200px; margin-bottom:80px;" align="center">
<form action="#" method="post">
<table align ="center" border="2" style="background-color:#000000;font:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold; color:#CCFF00; ">
<tr>
<th colspan="12">Updation form</th>
</tr>
<tr>
<td>Employeename</td>
<td><input type="text" name="facultyname" id="u1" required /></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password" id="p" required/></td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" name="password1" id="p1" required/></td>
</tr>
<tr>
<td>Department</td>
<td><input type="text" name="department" id="department" required/></td>
</tr>

<tr>
<td>gender</td>
<td>
<select name="gender">
<option>select gender</option>
<option>Male</option>
<option>female</option>
</select>
</td>
</tr>
<tr>
<td>D.O.B.</td>
<td><select name="day">
<option>select day</option>
<?php
for($i=1;$i<=31;$i++)
{?>
<option><?php echo $i;?></option>
<?php
}?>
</select>
<select name="month"><option>select month</option>
<?php
for($i=1;$i<=12;$i++)
{?>
<option><?php echo $i;?></option>
<?php
}?>
</select>
<select name="year"><option>select year</option>
<?php
for($i=1960;$i<=2017;$i++)
{?>
<option><?php echo $i;?></option>
<?php
}?>
</select>
</td>
</tr>
<tr>
<td>pan card</td>
<td><input type="text" name="pancard" id="pancard" required/></td>
</tr>
<tr>
<td>Email id</td>
<td><input type="text" name="email" id="e1" required/></td>
</tr>
<tr>
<td>Mobile No.</td>
<td><input type="text" name="mobile" id="m1" required onKeyPress="numbersonly(event);" maxlength="10"/></td>
</tr>
<tr>
<td>Address</td>
<td><input type="text" name="address" id="address" required/></td>
</tr>

<tr>
<td>Upload Photo</td>
<td><input type="file" name="photo" id="photo" required/></td>
</tr>
<tr>
<td>Upload Signature</td>
<td><input type="file" name="sign" id="sign" required /></td>
</tr>

<tr>
<td colspan="12" align="center"><input type="submit"name="Edit" value="Edit"/></td>
</tr>
</table>
</form>
</div>
</body>
</html>

