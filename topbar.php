<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Times New Roman, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #54AFF7;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #E0F665;
  color: black;
}

.topnav a.split {
  float: left;
  background-color: lightcoral;
  color: black; 
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="dashboard.php">Home</a>
  <a href="cattle.php">Cattle</a>
  <a href="breed.php">Breeds</a>
   <a href="logout.php">Logout</a>
  <a href="dashboard.php" class="split">Cattle Management System</a>

</div>
<br>
</body>
</html>
