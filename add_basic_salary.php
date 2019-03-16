<?php

session_start();
$getuser=$_SESSION['setuser'];
if($getuser=="")
{
header("location:login.php");
}


include'cn.php';



if(isset($_POST['Addsalary']))
{
$getempid=$_POST['emp_id'];
$getbasic=$_POST['basic'];
$gethra=$_POST['hra'];
$getta=$_POST['ta'];
$getpf=$_POST['pf'];
$getTotalsalary=$_POST['Totalsalary'];




$sql="select * from add_basic_salary where emp_id='$getempid'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count!=1)
{
$sql="insert into add_basic_salary(id,emp_id,basic_salary,hra,ta,pf,total_salary)values('','$getempid','$getbasic','$gethra','$getta','$getpf','$getTotalsalary')";
$result=mysqli_query($con,$sql);
if($result==true)
{
echo 'Basic Salary Added';
}

else
{
echo 'Not Added';

}
}
else
{
echo 'Already Exit';
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

<script>
function CalculateBasicSalary()
{
var getbasic=parseInt(document.getElementById("basic").value,10);
var gethra=parseInt(document.getElementById("hra").value,10);
var getta=parseInt(document.getElementById("ta").value,10);
var getpfa=parseInt(document.getElementById("pf").value,10);;



var total=getpfa/100*(getbasic+gethra+getta);
var finalsalray=(getbasic+gethra+getta)-total;

document.getElementById("Totalsalary").value= finalsalray;


}
</script>


<title> Employee Managment </title>
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
<table align ="center" border="2" >
<tr>
<th colspan="2">Add Basic Salary </th>
</tr>

<tr>
<td>Employee Id </td>
<td><select name="emp_id">
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
<td>Basic  </td>
<td style="background-image:inherit"><input type="text" name="basic" id="basic" /></td>
</tr>
<tr>
<td>HRA </td>
<td><input type="text" name="hra" id="hra"/></td>
</tr>
<tr>
<tr>
<td>TA</td>
<td><input type="text" name="ta" id="ta" onKeyPress="numbersonly(event);" maxlength="10"/></td>
</tr>
<td>PF</td>
<td><input type="text" name="pf" id="pf" onKeyUp="createdtcode1(this,'finalsalary');" /></td>
</tr>



<tr>
<td>Total Salary</td>
<td><input type="text" name="Totalsalary" id="Totalsalary"  maxlength="10" readonly/></td>
</tr>


<tr>
<td colspan="2" align= "center">
<input type="button" name="calculate" value="Calculate" onClick="CalculateBasicSalary();"/>&nbsp;&nbsp;<input type="submit" name="Addsalary" value="AddSalary" />
</td>
</tr>


</table>
</form>
</div>















<div style="margin-top:350px; background-color:#0000FF; color:#FFFFFF">
<span style="left:200px"> @2017 my site </span>
<span style="text-align:right"> &copy;Developed By Farhan </span>
</div>

</body>
</html>
