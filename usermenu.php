<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {margin:0;}

.icon-bar {
    width: 100%;
    background-color: #555;
    overflow: auto;
}

.icon-bar a {
    float: left;
    width: 16.5%;
    text-align: center;
    padding: 12px 0;
    transition: all 0.3s ease;
    color: white;
    font-size: 24px;
}

.icon-bar a:hover {
    background-color: #000;
}

.active {
    background-color: #4CAF50 !important;
}
</style>
<body>

<div class="icon-bar"; style="margin-top:30px";>
  <a class="active" href="#"><i class="fa fa-home"></i><br />Home</a> 
  <a href="profile.php"><i class="fa fa-address-card-o"></i><br />Profile</a> 
  <a href="user_attendance.php"><i class="fa fa-search"></i><br />Attendance</a>
  <a href="user_salary.php"><i class="fa fa-inr"></i><br />Salary</a>
  <a href="change_password.php"><i class="fa fa-key"></i><br />Change Password</a> 
  <a href="logout1.php"><i class="fa fa-key"></i><br />Logout</a> 

  
</div>

</body>
</html> 


