	<?php
	
	session_start();
$getuser=$_SESSION['setuser'];
if($getuser=="")
{
header("location:login.php");
}
	
include 'cn.php';
if(isset($_POST['register']))
{
	$getuser=$_POST['user'];
	$getname=$_POST['fullname'];
	$getemail=$_POST['email'];
	$getpassword=$_POST['pass'];
	$getgender=$_POST['gender'];
	$getday=$_POST['day'];
	$getmonth=$_POST['month'];
	$getyear=$_POST['year'];
	$finaldob=$getday."/".$getmonth."/".$getyear;
	$getpancard=$_POST['PAN'];
	$getmobile=$_POST['mobile'];
	$getaddress=$_POST['address'];
	$getphoto=$_FILES['photo']['name'];
	$getsign=$_FILES['sign']['name'];
	$sql="select * from add_employee  where user='$getuser'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	if($count!=1)
	{
	     move_uploaded_file($_FILES['photo']['tmp_name'],'photo/'.$getphoto);
		 move_uploaded_file($_FILES['sign']['tmp_name'],'sign/'.$getsign);
		 
		 $insertlogin="insert into login(id,user,password,status) values('','$getuser','$getpassword','0')";
		 $resultlogin=mysqli_query($con,$insertlogin);
		 
		 $sql="insert into add_employee(id,user,full_name,email,pasword,gender,dob,phone_no,pan_no,address,photo_upload,sign_upload) values('','$getuser','$getname','$getemail','$getpassword','$getgender','$finaldob','$getmobile','$getpancard','$getaddress','$getphoto','$getsign')";
		$result=mysqli_query($con,$sql);
		if($result==true)
		{
			echo "Successfully Register";
		}
		else
		{
			echo"you have not registered";
		}
	}
	else
	{
		$msg=$getuser." already exists";
	}
}
?>




<html>
<head>

<style>

input[type=text]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	
}
select {
    width: 100%;
    padding: 16px 20px;
    border: 1px solid #ccc;;
    border-radius: 4px;
    background-color:#FFFFFF
}

input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	
}

input[type=button], input[type=submit], input[type=reset] {
    background-color:#009900
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}



input[type=text]:focus {
    background-color: lightblue;
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


<title> Add Employee </title>
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
<form action="#" method="post" onSubmit="return validation_signup();" method="post" enctype="multipart/form-data">

<h3>Using CSS to style an HTML Form</h3>

 





<label for="usr"> user </label>
<input type="text" id="fname" name="user" placeholder="Your user name..">

<label for="fname">Full Name</label>
    <input type="text" id="fname" name="fullname" placeholder="Your name..">

<label for="Ename">Email</label>
    <input type="text" id="Ename" name="email" placeholder="Your email id..">


<label for="psw">Password</label>
    <input type="password" id="psw" name="firstname" placeholder="Your password..">

<label for="cpsw">Confirm password</label>
    <input type="password" id="cpsw" name="firstname" placeholder="Confirm your password..">

<label for="gender">gender</label>

<select id="gender" name="gender">
<option value="select_gender">select gender</option>
<option value="male">Male</option>
<option value="female">female</option>
</select><br/>



<label for="dob">D.O.B.</label>
<select id="day" name="day">
<option value="select_day">select day</option>
<?php
for($i=1;$i<=31;$i++)
{?>
<option><?php echo $i;?></option>
<?php
}?>
</select>
<select id="mnth" name="month"><option>select month</option>
<?php
for($i=1;$i<=12;$i++)
{?>
<option><?php echo $i;?></option>
<?php
}?>
</select>
<select id="yr" name="year"><option>select year</option>
<?php
for($i=1960;$i<=2017;$i++)
{?>
<option><?php echo $i;?></option>
<?php
}?>
</select></br>




<label for="phn"> phone no </lable>
 <input type ="text" name ="mobile" id ="mobile" maxlength="10" onKeyPress="numbersonly(event);" required> </td>



<label for="pan"> pan no </lable>
<input type ="text" name="PAN" id="PAN" required />




<label for="adrs"> address </label>
 <input type="text" name="address" id="address" required />


<label for="pht">photo upload</label>
 <input type="file" name="photo" id="photo" required />


<label for="sign">signature upload</label>
<input type="file" name="sign" id="sign" required />



 <input type ="submit" value ="register" name ="register" style="background-color:#CCCC33;font-size:16px;">
<input type="submit" value="reset" name="reset" onClick="return reset1()"  style="background-color:#CCCC33;font-size:16px;" />
</form>
</div>






<div style="margin-top:350px; background-color:#0000FF; color:#FFFFFF">
<span style="left:200px"> @2017 my site </span>
<span style="text-align:right"> &copy;Developed By Farhan </span>
</div>

</body>
</html>
