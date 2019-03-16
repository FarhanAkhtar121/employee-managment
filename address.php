<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body bgcolor="#99FFFF">
<table align="center">
<tr><th colspan="2" style="font-size:36px">Present Address</th></tr>

<tr><td>Add1</td>
<td> <input type="text" name="add1" id="add1" />
</td></tr>

<tr><td>City</td>
<td> <input type="text" name="city" id="city" />
</td></tr>


<tr><td>District</td>
<td> <input type="text" name="dis" id="dis" />
</td></tr>

<tr><td>state</td>
<td> <input type="text" name="state" id="state" />
</td></tr>

<tr><td>Country</td>
<td> <input type="text" name="country" id="country" />
</td></tr>

<tr><td>PIN</td>
<td> <input type="text" name="pin" id="pin" />
</td></tr>

<tr><th colspan="2" style="font-size:36px">Parmanent Address</th></tr>

<tr><td> <input type="checkbox" onclick="SameAddress();" name="SameAddrs" id="SameAddrs" />Same Address</td></tr>

<tr><td>Add1</td>
<td> <input type="text" name="prmadd1" id="prmadd1" />
</td></tr>

<tr><td>City</td>
<td> <input type="text" name="prmcity" id="prmcity" />
</td></tr>

<tr><td>District</td>
<td> <input type="text" name="prmdis" id="prmdis" />
</td></tr>

<tr><td>state</td>
<td> <input type="text" name="prmstate" id="prmstate" />
</td></tr>

<tr><td>Country</td>
<td> <input type="text" name="prmcountry" id="prmcountry" />
</td></tr>

<tr><td>PIN</td>
<td> <input type="text" name="prmpin" id="prmpin" />
</td></tr>

</table>

<script>
function SameAddress()
{

if(SameAddrs.checked==true)
{
var getadd1=document.getElementById("add1").value;
var getcity=document.getElementById("city").value;
var getdis=document.getElementById("dis").value;
var getstate=document.getElementById("state").value;
var getcountry=document.getElementById("country").value;
var getpin=document.getElementById("pin").value;

document.getElementById("prmadd1").value=getadd1;
document.getElementById("prmcity").value=getcity;
document.getElementById("prmdis").value=getdis;
document.getElementById("prmstate").value=getstate;
document.getElementById("prmcountry").value=getcountry;
document.getElementById("prmpin").value=getpin;

document.getElementById("prmadd1").readOnly=true;
document.getElementById("prmcity").readOnly=true;
document.getElementById("prmdis").readOnly=true;
document.getElementById("prmstate").readOnly=true;
document.getElementById("prmcountry").readOnly=true;
document.getElementById("prmpin").readOnly=true;
}
else
{

document.getElementById("prmadd1").value="";
document.getElementById("prmcity").value="";
document.getElementById("prmdis").value="";
document.getElementById("prmstate").value="";
document.getElementById("prmcountry").value="";
document.getElementById("prmpin").value="";


document.getElementById("prmadd1").readOnly=false;
document.getElementById("prmcity").readOnly=false;
document.getElementById("prmdis").readOnly=false;
document.getElementById("prmstate").readOnly=false;
document.getElementById("prmcountry").readOnly=false;
document.getElementById("prmpin").readOnly=false;

}
}
</script>

</body>
</html>
