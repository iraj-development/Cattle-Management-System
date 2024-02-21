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
 
$sql = " SELECT * FROM breed";
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
                <th>BREED ID</th>
                <th>BREED NAME</th>
                
            </tr>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['name'];?></td>
               
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
</html>