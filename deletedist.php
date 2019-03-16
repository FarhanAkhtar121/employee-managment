
<?php
include 'cn.php';

$getid=$_GET['id'];
$del="delete from district where district_id='$getid'";
$result=mysqli_query($con,$del);

if($result==true)
{
?>
<script>
alert('Record Successfuly Deleted');
location.replace('employee.php');
</script>
<?php
}
?>