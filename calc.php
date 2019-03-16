<?php
if(isset($_POST['ADD']))
{
 $num1 = $_POST['first'];
 $num2 = $_POST['second'];
 $result = $num1+$num2;
}
if(isset($_POST['SUB']))
{
 $num1 = $_POST['first'];
 $num2 = $_POST['second'];
 if ($num1 > $num2)
 { 
  $result = $num1-$num2;
 }
 else
 { 
 $result = $num2-$num1;
 }
}
if(isset($_POST['MUL']))
{
 $num1 = $_POST['first'];
 $num2 = $_POST['second'];
 $result = $num1*$num2;
}
if(isset($_POST['DIV']))
{
 $num1 = $_POST['first'];
 $num2 = $_POST['second'];
 if ($num1== "0" || $num2=="0")
 {
  $result = "Invalid Input";
 }
 else
 {
 $result = $num1/$num2;
 }
}
?>

<html>
<head>
<title>Calculation</title>
</head>

<body bgcolor="#9999FF">

<div style=" margin-left:30px; margin-top:100px;">
<form action="#" method="post">
<table id="table" bordercolordark="#000066" align="center" border="1">
<tr class="tr">
<th colspan="2" style="font-size:30px">CALCULATION</th>
</tr>

<tr style="font-size:30px" class="tr">
<td> First Number </td>
<td> <input type="text" name="first" id="first" width="500px"> </td>
</tr>

<tr style="font-size:30px" class="tr">
<td> Second Number </td>
<td> <input type="text" name="second" id="second" width="500px"> </td>
</tr>

<tr style="font-size:30px" class="tr">
<td> Result </td>
<td> <input type="text" name="result" value="<?php echo @$result; ?>" width="500px"> </td>
</tr>
</table>

<table align="center">
<tr>
<td> <input type="submit" value="ADD" name="ADD" style="background-color:#CCCC33; font-size:18px" >
 <input type="submit" value="SUB" name="SUB" style="background-color:#CCCC33; font-size:18px" >
<input type="submit" value="MUL" name="MUL" style="background-color:#CCCC33; font-size:18px" >
<input type="submit" value="DIV" name="DIV" style="background-color:#CCCC33; font-size:18px" >
 </td>
</tr>
</table>
</form>

</div>
</body>
</html>
