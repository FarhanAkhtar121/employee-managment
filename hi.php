<?php
include 'connection.php';
$sql="select * from register where id='2'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>

<html>
<body bgcolor="#FFFF00">
Welcome <?php echo $row["user"]; ?><br>
Your email address is: <?php echo $row["email"]; ?><br>
Your full name is: <?php echo $row["full_name"]; ?><br>
Your phone no is: <?php echo $row["phone_no"]; ?><br>
Your adhar card no is: <?php echo $row["adhar_card"]; ?><br>
Your pan no is: <?php echo $row["pan_no"]; ?><br>
Your address is: <?php echo $row["addres"]; ?><br>
Your city is: <?php echo $row["city"]; ?><br>
Your photo is: <img src="photo/<?php echo $row["photo"]; ?>"><br>
Your sign is: <img src="sign/<?php echo $row["sign"]; ?>"<br>

</body>
</html> 