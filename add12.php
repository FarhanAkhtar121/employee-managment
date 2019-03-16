<?php


include 'connection.php';
session_start();

if(isset($_POST['login']))
{
$getuser = $_POST['user'];
$getpass = $_POST['pass'];

$sql="SELECT * from register where user='$getuser' and password='$getpass'";
$result=mysqli_query($con,$sql);
   
   $count=mysqli_num_rows($result);
   
   if($count==1)
{
$_SESSION['setuser']=$getuser;
header("location:view.php");
}
else
{
echo "user or password Invalid";
}
}

if (isset($_POST['register']))
{
$getuser=$_POST['user'];
$getpass=$_POST['pass'];
$getfullname=$_POST['fullname'];
$getemail=$_POST['email'];
$getphoneno=$_POST['mobile'];
$getadharcard=$_POST['uid'];
$getpanno=$_POST['PAN'];
$getaddres=$_POST['addres'];
$getcity=$_POST['city'];
$getphoto=$_FILES['photo']['name'];
$getsign=$_FILES['sign'] ['name'];
$getdate=date('d/m/y');

  $sql="SELECT * from register where user='$getuser'";
   
   $result=mysqli_query($con,$sql);
   
   $count=mysqli_num_rows($result);
   
   if($count!=1)
   {
    
	move_uploaded_file($_FILES['photo']['tmp_name'],"photo/".$getphoto);
	move_uploaded_file($_FILES['sign']['tmp_name'],"sign/".$getsign);
	
  $sqlinsert="INSERT INTO register(id,user,password,full_name,email,phone_no,adhar_card,pan_no,addres,city,photo,sign,reg_date) VALUES ('','$getuser','$getpass','$getfullname','$getemail','$getphoneno','$getpanno','$getadharcard','$getaddres','$getcity','$getphoto','$getsign','$getdate')";
   
   $result=mysqli_query($con,$sqlinsert);
   
   if($result==true)
   {
   echo 'Record successfully Register';
   }
   else
   {
   echo 'Not Register';
   }
   }
   else
   {
   echo $getuser.'Already Exist';
   }
   }
   ?>
    

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registration Form</title>


<script type="text/javascript" language="javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(function() {
    $("#photo").on("change", function()
    {
	var fup = document.getElementById('photo');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

    if(ext=="JPG" || ext=="jpg" || ext=="PNG" || ext=="png")
    {
      
    }
    else
    {
        alert("Upload only JPG/PNG File....");
		document.getElementById("photo").value="";
    }
			
            if (typeof ($("#photo")[0].files) != "undefined") {
                var size = parseFloat($("#photo")[0].files[0].size / 1024).toFixed(2);
                if((size>=2068/1024)&&(size<102400/1024))
				{
   var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
			
}
             else {
                alert("Image Size 30kb to 100kb....");
				
				document.getElementById("photo").value = "";
				
                $("#imagePreview").css("background-image", "url(face.jpg)");
			
            
				
            }
			
			
			
			
			}
		
       
    });
	});

</script>
</head>

<body bgcolor="#CCCCCC">

<div align="center" style="background-color:#FF3333">
<h1 style="color:#FFFFFF;"> WELCOME TO GOOGLE+ </h1>
</div>

<div style=" margin-left:30px; margin-top:100px">

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
<form action="#" method="post" onSubmit="return validation_signup();" method="post" enctype="multipart/form-data">
<table style="margin-top: -130px" id="table">
<tr class="tr">
<th colspan="2" style="font-size:30px"> SIGNUP NEW USER </th>
</tr>


<tr class="tr">
<td> user </td>
<td> <input type="text" name="user" id="user" /> </td>
</tr>

<tr class="tr">
<td width="149"> full name </td>
<td width="144"> <input type ="text" name ="fullname" id ="fullname" onKeyPress="lettersOnly(event);"> </td>
</tr>


<tr class="tr">
<td> email </td>
<td> <input type ="text" name ="email" id ="email1"> </td>
</tr>

<tr class="tr">
<td> password </td>
<td> <input type ="password" name ="pass" id ="pass"> </td>
</tr>


<tr class="tr">
<td> phone no </td>
<td> <input type ="text" name ="mobile" id ="mobile" maxlength="10" onKeyPress="numbersonly(event);"> </td>
</tr>

<tr class="tr">
<td> pan no </td>
<td> <input type ="text" name="PAN" id="PAN" /></td>
</tr>

<tr class="tr">
<td> adhar card </td>
<td> <input type="text" name="uid" id="uid" /></td></tr>

<tr class="tr">
<td> addres </td>
<td> <input type="text" name="addres" id="addres" /></td></tr>
<tr class="tr">
<td> city </td>
<td> <input type="text" name="city" id="city" /></td></tr>
<tr class="tr">
<td>photo upload</td>
<td> <input type="file" name="photo" id="photo" /></td></tr>
<tr class="tr">
<td>signature upload</td>
<td><input type="file" name="sign" id="sign" />
</td></tr>

<tr class="tr">
<td colspan ="3" align ="center"> <input type ="submit" value ="register" name ="register" style="background-color:#CCCC33;font-size:16px;">
</td>
</tr>
</table>
<table>
<tr><th colspan="2">presen address</th></tr>
<tr><td>add1</td>
<td><input type="text" name="add" id="add" /></td></tr>

<tr><td>city</td>
<td><input type="text" name="city" id="city" /></td></tr>

<tr><td>district</td>
<td><input type="text" name="dis" id="dis" /></td></tr>

<tr><td>state</td>
<td><input type="text" name="state" id="state" /></td></tr>

<tr><td>country</td>
<td><input type="text" name="country" id="country" /></td></tr>

<tr><td>pin</td>
<td><input type="text" name="pin" id="pin" />

</td></tr>
</table>



<div style="margin-left:550px"> <img src="img/2000px-Google_plus.svg.png" width="330" height="250" style="margin-top:-250"></div>
<div style="color:#FFFFFF; background: #0000FF; margin-left:-430px; margin-top:250px">
<span style="left:auto"> @2017 my site </span>
<span style="text-align:right"> &copy;Developed By FARHAN AKHTAR </span>
</div>

</body>
</html>


