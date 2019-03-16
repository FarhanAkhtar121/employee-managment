<?php 
$user ="aryanakhtar1989@gmail.com";
$pass ="farhan";

if(isset($_POST['login']))
{
$getuser = $_POST['user'];
$getpass = $_POST['pass'];
if($getuser==$user && $getpass==$pass)
{
header("location:Welcome.php");
}
else
{
echo "user or password Invalid";
}
}
?>



<html>
<head>
<link rel="stylesheet" href="wind.css" type="text/css">
<script>
function validation()
{

	var getuser = document.getElementById("email").value;
	var getpass = document.getElementById("pass").value;
	if(getuser=="")
	{
		alert("Please enter email id");
		email.focus();
		return false;
	}
	if(getpass=="")
	{
		alert("Please enter password");
		pass.focus();
		return false;
	}
}
</script>

<script>
function validation_signup()
{

	var name = document.getElementById("username").value;
	var email2 = document.getElementById("email1").value;
	var pass2 = document.getElementById("password").value;
	var num = document.getElementById("contact").value;
	if(name=="")
	{
		alert("Please enter user name");
		username.focus();
		return false;
	}
	if(email2=="")
	{
		alert("Please enter email");
		email.focus();
		return false;
	}
	if(pass2=="")
	{
		alert("Please enter password");
		password.focus();
		return false;
	}
	
		if(num=="")
	{
		alert("Please enter contact");
		contact.focus();
		return false;
	}
	
var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
if(email2.match(reg))
{
} 
else
{
alert('Enter valid e-mail id....');
email1.focus();
return false;
}

var regmbl=/^[2-9]{1}[0-9]{9}$/;
if(num.match(regmbl))
{
}
else
{
alert('Mobile no should be 10 digits....');
contact.focus();
return false;
}

}
function lettersOnly(evt) 
{
            var charCode = evt.keyCode;

            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))

                return true;
            else
			alert("Enter letters only.");
			
                return false;
}


function numbersonly(e){
    var num=e.keyCode;
        if (num<48|| num>57) //if not a number
		{
		alert('Enter only number');
		
            return false //disable key press
 }
}

function lettersOnly(evt) 
{
            var charCode = evt.keyCode;

            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))

                return true;
            else
			alert("Enter letters only.");
		
                return false;
}

</script>
<title> GOOGLE+ </title>
</head>
<body bgcolor="#CCCCCC">

<div align="center" style="background-color:#FF3333">
<h1 style="color:#FFFFFF;"> WELCOME TO GOOGLE+ </h1>
</div>

<div style=" margin-left:30px; margin-top:100px">
<form action="#" method="post" onSubmit="return validation();">
<table id="table" bordercolordark="#000066;"> 
<tr class="tr">
<th colspan="2" style="font-size:30px">LOGIN  PANEL </th>
</tr>

<tr style="font-size:30px" class="tr">
<td> user </td>&nbsp;
<td> <input type="text" name="user" id="user" width="200px"> </td>
</tr>

<tr style="font-size:30px" class="tr">
<td> pass </td>&nbsp;
<td> <input type="password" name="pass" id="pass" width="200px"> </td>
</tr>

<tr class="tr">
<td colspan="4" align="center">  <input type="submit" value="login" name="login" style="background-color:#CCCC33; font-size:16px" > </td>
</tr>

</table>
</form>


<div style=" margin-left:400px; margin-top:-200px">
<form action="#" method="post" onSubmit="return validation_signup();">
<table style="margin-top: -130px" id="table">
<tr class="tr">
<th colspan="2" style="font-size:30px"> SIGNUP NEW USER </th>
</tr>
<tr class="tr">
<td width="149"> FULL NAME </td>
<td width="144"> <input type ="text" name ="username" id ="username" onKeyPress="lettersOnly(event);"> </td>
</tr>


<tr class="tr">
<td> EMAIL ID </td>
<td> <input type ="text" name ="email" id ="email1"> </td>
</tr>

<tr class="tr">
<td> PASSWORD </td>
<td> <input type ="password" name ="password" id ="password"> </td>
</tr>


<tr class="tr">
<td> CONTACT NUMBER </td>
<td> <input type ="text" name ="contact" id ="contact" maxlength="10" onKeyPress="numbersonly(event);"> </td>
</tr>

<tr class="tr">
<td> GENDER </td>
<td> <input type ="radio" value ="male" name ="gender">Male </td>
<td> <input type ="radio" value ="female" name ="gender">Female </td>
</tr>

<tr class="tr">
<td colspan ="3" align ="center"> <input type ="submit" value ="register" name ="login" style="background-color:#CCCC33;font-size:16px;">
</td>
</tr>
</table>
</form>

<div style="margin-left:550px"> <img src="img/2000px-Google_plus.svg.png" width="330" height="250" style="margin-top:-250"></div>
<div style="color:#FFFFFF; background: #0000FF; margin-left:-430px; margin-top:250px">
<span style="left:auto"> @2017 my site </span>
<span style="text-align:right"> &copy;Developed By FARHAN AKHTAR </span>
</div>

</body>
</html>


