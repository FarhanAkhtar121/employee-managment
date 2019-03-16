<?php
include'cn.php';
$getid=$_GET['id'];
$sql="update login set status=0 where id='$getid'";
$result=mysqli_query($con,$sql);
if($result==true)
{?>
<script>
alert("Acount has deactiveted");
location.replace("user_activation.php");
</script>
<?php
}


?>