<?php include 'setup.php'; ?>
<?php include 'topbar.php'; ?>
<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
	body{
  background-image: url("login_back.jpg");
   height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
#cattle {
  font-family: Times New Roman,  sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#cattle td, #cattle th {
  border: 1px solid #F77954;
  padding: 15px;
}

#cattle tr:hover {background-color: #ddd;}

#cattle th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #F75460;
  color: white;
}
.grid-container {
  display: grid;
  grid: 150px / auto auto auto;
  grid-gap: 10px;
  background-color: #E0F665;
  padding: 10px;
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
.grid-container > div {
  background-color: #72EE96;
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}
</style>
<body>
<div>   <center><h1>Welcome to the Admin Portal</h1><br><br><br></center>
</div>
<br>

<div class="grid-container">
  <div class="item1">
	  Catlle Details
  <a href="cattle.php">Click Here</a>
  </div>
  <div class="item2">Breed Details 
  <a href="breed.php">Click Here</a>
  </div>
  <div class="item3">Add Cattle Details 
  <a href="insert_cattle.php">Click Here</a>
  </div>  
 
</div>
  <div>
	  <br><br>
 	<center><h2>Recent Cattle Details</h2><br><br><br></center>
 <div>
 	<table id="cattle">
 		<thead>
 			<tr>
 				<th>No</th>
 				<th>Cattle ID</th>
 				<th>Cattle Breed</th>
 				<th>Cattle Weight</th>
 				<th>Gender</th>
 				<th>Entry Date</th>
 				<th>Cattle Info</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php
               $qpi = $db->query("SELECT * FROM cattle ORDER BY id");
               $result = $qpi->fetchAll(PDO::FETCH_OBJ);
               $c = $qpi->rowCount();

               foreach ($result as $j) {
               	 $cattlename = $j->cattleno;
               	 $b_id = $j->breed_id; 
               	 $weight = $j->weight;
               	 $gender = $j->gender;
               	 $remark = $j->remark;
               	 $arr = $j->arrived;

               	 $k = $db->query("SELECT * FROM breed WHERE id = '$b_id' ");
               	 $ks = $k->fetchAll(PDO::FETCH_OBJ);
               	 foreach ($ks as $r) {
               	 	$bname = $r->name;
               	 ?>
                  <tr>
                  	<td>
                  		<?php for ($i=1; $i <= $c ; $i++) { 
                  			echo $i;
                  		} ?>
                  	</td>
                  	<td><?php echo $cattlename; ?></td>
                  	<td><?php echo $bname; ?></td>
                  	<td><?php echo $weight; ?></td>
                  	<td><?php echo $gender; ?></td>
                  	<td><?php echo $arr; ?></td>
                  	<td><?php echo $remark; ?></td>
                  </tr>
               	 <?php
                 }
              }
 			?>
 		</tbody>
 	</table>
 </div>
 <br><br>
 </div>
</div>


</div>


</body>
</html>