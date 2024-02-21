<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>Cattle_management_system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
	.navbar {
  width: 100%;
  background-color: #DE54F7;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: lightgreen;
}
     .centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.btn {
    display: block;
    width: 115px;
  
    background: lightcoral;
    padding: 3px;
    text-align: center;
    border-radius: 5px;
    color: black;
    font-weight: bold;
    line-height: 25px;
}
.btn2 {
    display: block;
    width: 115px;
  
    background: lightgreen;
    padding: 3px;
    text-align: center;
    border-radius: 5px;
    color: black;
    font-weight: bold;
    line-height: 25px;
}
</style>
<body>
<div class="navbar">
  <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i>Dashboard</a>  
  <a href="user_login.php"><i class="fa fa-fw fa-user"></i> User Login</a> 
  <a href="admin_login.php"><i class="fa fa-fw fa-user"></i> Admin Login</a>
</div>
<br>
<div class="container">
  <img src="cattle.jpeg" alt="Snow" style="width:100%;">
  <center><div class="centered">
    <center><h1><i>ONLINE CATTLE MANAGEMENT SYSTEM</i></h1></center><br>
    <a href="admin_login.php" class="btn">Admin Portal</a>&nbsp;&nbsp;
    <a href="user_login.php" class="btn2">User Portal</a>
  </div></center>
</div>
</body>
</html>