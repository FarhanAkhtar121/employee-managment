<?php
include'cn.php';
$getid=$_GET['id'];
$sql="update login set status=1 where id='$getid'";
$result=mysqli_query($con,$sql);
if($result==true)
{?>
<script>
alert("Acount has activeted");
location.replace("user_deactivation.php");
</script>
<?php
}


?>