<?php
if(isset($_POST['Add']))
{
  echo $getfirstno=$_POST['FirstNo'];
  echo $getsecondno=$_POST['SecondNo'];
  $result=$getfirstno+$getsecondno;
  }
  
if(isset($_POST['Sub']))
{
  $getfirstno=$_POST['FirstNo'];
  $getsecondno=$_POST['SecondNo'];
  $result=$getfirstno-$getsecondno;
  }
  
  if(isset($_POST['Mul']))
{
  $getfirstno=$_POST['FirstNo'];
  $getsecondno=$_POST['SecondNo'];
  $result=$getfirstno*$getsecondno;
  }
  
  if(isset($_POST['Div']))
{
  $getfirstno=$_POST['FirstNo'];
  $getsecondno=$_POST['SecondNo'];
  $result=$getfirstno/$getsecondno;
  }

?>
    
<html>
<head>
<title>CALCULATION PHP</title>
</head>

<body bgcolor="#CCCCCC">
<form action="#" method="post">
<table border="4" align="center" bgcolor="#0066FF"  width="50%" height="60%">
<tr onKeyDown="1">
<th colspan="2" bgcolor="#FFFFFF" style="font-style:italic"> CALCULATION</th></tr>
<tr>
<td>FIRST NO </td>
<td><input type="text" name="FirstNo" id="FirstNo"/></td>
</tr>
<tr>
<td>SECOND NO </td>
<td><input type="text" name="SecondNo" id="SecondNo" /></td></tr>
<tr>
<td>Result</td>
<td> <input type="text" name="Result" value="<?php echo @$result;?>"/></td>
</tr>
<tr>
<td> 
<input type="submit" name="Add" id="Add" value="Add" style="background:#FFFFFF">
  <input type="submit" name="Sub" id="Sub" value="Sub" style="background:#FFFFFF">
<input type="submit" name="Mul" id="Mul" value="Mul" style="background:#FFFFFF">
 <input type="submit" name="Div" id="Div" value="Div" style="background:#FFFFFF">
 </td>
 </tr>
</table>

</form>
		
</body>
</html>
