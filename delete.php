<?php
include 'connection.php';

$getid=$_GET['id'];
$del="delete from register where id='$getid'";
$result=mysqli_query($con,$del);

if($result==true)
{
?>
<script>
alert('Record Successfuly Deleted');
location.replace('view.php');
</script>
<?php
}
?>