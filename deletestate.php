
<?php
include 'cn.php';

$getid=$_GET['id'];
$del="delete from state where state_id='$getid'";
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