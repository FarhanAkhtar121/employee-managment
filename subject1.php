<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
function othersubject()
{
var getother=document.getElementById("subject").value;
if(getother=="other")
{
document.getElementById("other").style.display="block";
}
else
{
document.getElementById("other").style.display="none";
}
}


	function readonlytext()
	{
	var getothersub=document.getElementById("others").value;
	if(getothersub=="other")
	{
	document.getElementById("other").readOnly=false;
	}
	else
	{
	document.getElementById("other").readOnly=true;
	document.getElementById("other").value="";
	}
	}
	</script>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body bgcolor="#66FF99">
<table align="center">
<tr>
<td>Subject</td>
<td> <select name="subject" id="others" onchange="readonlytext();">
<option>Select Subject</option>
<option>English</option>
<option>Hindi</option>
<option>Maths</option>
<option>Science</option>
<option>SocialSc</option>
<option>other</option>
</select> &nbsp; &nbsp;
<input type="text" name="other" id="other" readonly />


</td></tr>
</table>




</body>
</html>
