<?php include 'setup.php'; ?>
<?php include 'topbar.php'; ?>
<?php include 'session.php'; ?>

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
	 input[type=text]{
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.custom-select {
  position: relative;
  font-family: Arial;
}
.button {
    display: block;
    width: 115px;
  
    background: #4E9CAF;
    padding: 3px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    line-height: 25px;
}
textarea {
  width: 30%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
.custom-select {
  position: relative;
  font-family: Arial;
  width:430px;
  height: 50px;
}

.custom-select select {
  display: none; 
}


</style>
<body>
    
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 <center><h1>CATTLE DETAILS ENTRY FORM</h1></center>

 	<div class="col-md-6">
      
      <?php
      if(isset($_POST['submit']))
      {
      	if(isset($_FILES['cattlephoto']['tmp_name'])){

	      	$n_cattleno = $_POST['cattleno'];
	      	$n_weight = $_POST['weight'];
	      	$n_arrived = $_POST['arrived'];
	      	$n_breed = $_POST['breed'];
	      	$n_remark = $_POST['remark'];
	      	$n_status = $_POST['status'];
	      	$n_gender = $_POST['gender'];

      	
      		$res1_name = basename($_FILES['cattlephoto']['name']);
			$tmp_name = $_FILES['cattlephoto']['tmp_name'];
			$type = $_FILES['cattlephoto']['type'];
			$max_size = 2097152;
			$size = $_FILES['cattlephoto']['size'];

			if (isset($res1_name)) {
				$location = 'image/';
				$move = move_uploaded_file($tmp_name, $location.$res1_name);
				$path1 = $location.$res1_name;

			
				if (!$move) {
					$fileerror = $_FILES['cattlephoto']['error'];
					$message = $upload_errors[$fileerror];
					
				}
			}
		}

      	$insert = $db->query("INSERT INTO cattle(cattleno,weight,arrived,breed_id,remark,health_status,img,gender) VALUES('$n_cattleno','$n_weight','$n_arrived','$n_breed','$n_remark','$n_status','$path1','$n_gender') ");

      	if($insert){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Cattle successfully created <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error creatiing Cattle data. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }
      
      }

     ?>

 		<center><form method="post" autocomplete="off" enctype="multipart/form-data">
 			<div class="form-group">
	 			<label><b>Cattle Id</b></label><br>
	 			<input type="text" name="cattleno" class="form-control" value="cattle-no-<?php echo mt_rand(0000,9999); ?>" readonly="on" required>
	 		</div>

	 		<div class="form-group">
	 			<label><b>Cattle Weight</b></label><br>
	 			<input type="text" name="weight" class="form-control" required><br>
	 		</div>

	 		<div class="form-group date" data-provide="datepicker">
	 			<label><b>Entry Date</b></label><br>
	 			<input type="text" name="arrived" class="form-control" required><br>
	 		</div>

	 		<div class="form-group">
	 			<label><b>Choose Gender</b></label><br>
	 			<select name="gender" class="form-control" required><br>
	 				<option value="male">Male</option>
	 				<option value="female">Female</option>
	 			</select>
	 		</div>
<br>
	 		<div class="form-group">
	 			<label><b>Cattle Health Status</b></label><br>
	 			<select name="status" class="custom-select" required><br>
	 				<option value="active">Active</option>
					 <option value="sick">Sick</option>
	 				<option value="inactive">Inactive</option>
	 				<option value="on treatment">Onging treatment</option>
	 				
	 			</select>
	 		</div>
<br>
	 		<div class="form-group">
	 			<label><b>Choose Cattle Breed</b></label><br>
	 			<select name="breed" class="custom-select" required>
	 				<option value=""></option>
	 				<?php
	                   $getBreed = $db->query("SELECT * FROM breed");
	                   $res = $getBreed->fetchAll(PDO::FETCH_OBJ);
	                   foreach($res as $r){ ?>
	                     <option value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>   
	                   <?php
	                   }
	 				?>
	 			</select>
	 		</div>
<br>
	 		<div>
	 			<label><b>Cattle photo</b></label><br><br>
	 			<input type="file" name="cattlephoto" class="form-control" required>
	 		</div>
<div><br>
	 			<label><b>Cattle Info</b></label><br><br>
	 			<textarea class="form-control" name="remark" required></textarea><br><br>
	 		</div>
	 		<button name="submit" type="submit" name="submit" class="button">Insert</button>
 		</form></center><br>
 	</div>
 </div>
</div>

</div>
</body>
</html>