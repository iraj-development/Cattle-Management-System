<?php include 'setup.php'; ?>
<?php include 'user_top.php'; ?>
<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Portal</title>
</head>
 <style>
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
<div class="container">
  <img src="cattle.jpeg" alt="Snow" style="width:100%;">
  <center><div class="centered">
    <center><h1><i>ONLINE CATTLE MANAGEMENT SYSTEM</i></h1></center><br>
    <a href="view_breed.php" class="btn">Breed Details</a>&nbsp;&nbsp;
    <a href="view_cattle.php" class="btn2">Cattel Details</a>
  </div></center>
</div>
</body>
</html>