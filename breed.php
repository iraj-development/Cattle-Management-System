<?php include 'setup.php'; ?>


<?php include 'topbar.php'; ?> 
<?php include 'session.php'; ?>
<?php 
                          if(isset($_POST['submit'])){
                          	$name = $_POST['breed'];

                          	$query = $db->query("INSERT INTO breed(name)VALUES('$name')");

                          	if($query){ ?>
                             <script>alert('Breed Inserted Successfully!!!')</script>
                          	<?php 
                          	header('refresh: 1.5');
                            }
                          }
	 					?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breed</title>
</head>
<style>
body{
  background-image: url("back.jpeg");
   height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
  input[type=text] {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
#cattle {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

#cattle td, #cattle th {
  border: 1px solid #ddd;
  padding: 8px;
}

#cattle tr:nth-child(even){background-color: #f2f2f2;}

#cattle tr:hover {background-color: #ddd;}

#cattle th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #F75460;
  color: white;
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
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
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
.button {
    display: block;
    width: 60px;
    
    background: #4E9CAF;
    padding: 3px;
    text-align: center;
   
    color: black;
    
}
</style>
<body>
    
 <center><div>
	 		<div>
	 			<center><h1>New Cattle Breed Entry</h1></center>
	 			<div class="panel-body">
	 				<form method="post">
	 					<div class="form-group">
	 						<label class="control-label">Enter Breed Name Here:</label><br>
	 						<input type="text" name="breed" class="form-control" placeholder="Enter breed name..">
	 					</div>

	 					<button class="btn btn-primary" type="submit" name="submit">Insert</button>

	 					
	 				</form>
	 			</div>
	 		</div>
	 	</div></center><br>
	 <div>
	 	<center><h2>View Cattle Breeds Details</h2></center><br>
	 	<div class="col-md-6">
			
	 		<form method="post" action="delete_breed.php">
	 		<center><table id="cattle">
	 			<thead>
	 				<tr>
	 					
	 					<th>Breed Id</th>
	 					<th>Cattle Breed Name</th>
	 					
	 				</tr>
	 			</thead>
	 			<tbody>
	 				<?php

	 				$get = $db->query("SELECT * FROM breed");
	 				$res = $get->fetchAll(PDO::FETCH_OBJ);
	 				foreach($res as $n){ ?>
                         <center><tr>
                         	
                         	<td> <?php echo $n->id; ?> </td>
                         	<td>  <?php echo $n->name; ?> </td>
                         	
                         </tr></center> 
	 				<?php }

	 				?>
	 			</tbody>
	 		</table></center>

	 		
	 	</form>
	 	</div>

	 	
	 	 </div>
</div>

</div>

</body>
</html>