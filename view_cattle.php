<?php include 'setup.php'; ?>
<?php include 'user_top.php'; ?>
<?php include 'session.php'; ?>


<?php
 
$user = 'root';
$password = '';
$database = 'cattle';
$servername='localhost';
$mysqli = new mysqli($servername, $user, $password, $database);
 
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
$sql = " SELECT * FROM cattle";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cattle</title>
</head>
 <style>
     body{
            background-image: url("back.jpeg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
}
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: red;
            font-size: xx-large;
            font-family: 'Times New Roman';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
        #cattle{
            width: 90%;
        }
        #cattle th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left; 
  background-color: #54C3F7;
  color: white;
  
}
    </style>
<body>
      <section>
        <center><h1>AVIALABLE CATTLE DETAILS</h1></center>
        <table id="cattle">
            <tr>
                <th>Cattle ID</th>
                <th>Cattle Weight</th>
                <th>Cattle Breed</th>
                <th>Gender</th>
                <th>Cattle Info</th>
                <th>Cattle Health Status</th>
                <th>Cattle Location</th>
            </tr>
            <?php
                
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['cattleno'];?></td>
                <td><?php echo $rows['weight'];?></td>
                <td><?php echo $rows['breed_id'];?></td>
                <td><?php echo $rows['gender'];?></td>
                <td><?php echo $rows['remark'];?></td>
                <td><?php echo $rows['health_status'];?></td>
                <td><a href="https://www.google.com/maps/place/2+Dennistoun+Ave,+Guildford+NSW+2161,+Australia/@-33.856328,150.969001,16.74z/data=!4m5!3m4!1s0x6b12bd6e86d6eac1:0x35960f98bb27673d!8m2!3d-33.8563103!4d150.9710721">View Maps</a></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
</html>