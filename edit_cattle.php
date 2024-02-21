<?php include 'setup.php'; ?>
<?php include 'topbar.php'; ?>
<?php include 'session.php'; ?>

<?php 
 if(!$_GET['id'] OR empty($_GET['id']) OR $_GET['id'] == '')
 {
 	header('location: cattle.php');

 }else{
 	
 	$pigno = $weight = $gender = $remark = $arr = $bname = $b_id = $health = $img = "";
 	$id = (int)$_GET['id'];
 	$query = $db->query("SELECT * FROM cattle WHERE id = '$id' ");
 	$fetchObj = $query->fetchAll(PDO::FETCH_OBJ);

 	foreach($fetchObj as $obj){
       $cattleno = $obj->cattleno;
       $weight = $obj->weight;
	   $gender = $obj->gender;
	   $remark = $obj->remark;
	   $arr = $obj->arrived;
	   $b_id = $obj->breed_id;
	   $health = $obj->health_status;
	   $img = $obj->img;

	     $k = $db->query("SELECT * FROM breed WHERE id = '$b_id' ");
       	 $ks = $k->fetchAll(PDO::FETCH_OBJ);
       	 foreach ($ks as $r) {
       	 	$bname = $r->name;
       	 }
 	}
 }

?>

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
  width: 430px;
  height: 50px;

}
.button {
    display: block;
    width: 115px;
    height: 25px;
    background: #4E9CAF;
    padding: 10px;
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
</style>
<body>
     
<div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
  
 	<div class="col-md-6">

     <?php
      if(isset($_POST['submit']))
      {
      	$n_cattleno = $_POST['cattleno'];
      	$n_weight = $_POST['weight'];
      	$n_arrived = $_POST['arrived'];
      	$n_breed = $_POST['breed'];
      	$n_remark = $_POST['remark'];
      	$n_status = $_POST['status'];

      	$n_id = $_GET['id'];
      	$update_query = $db->query("UPDATE cattle SET cattleno = '$n_cattleno',weight = '$n_weight',arrived = '$n_arrived', breed_id = '$n_breed', remark = '$n_remark',health_status = '$n_status' WHERE id = '$n_id' ");

      	if($update_query){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Cattle details successfully update <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error updating Cattle data. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }

      }

     ?>

 		<center><h1>UPDATE CATTLE Details</h1></center>
	 	<center><form method="post">
	 		<div class="form-group">
				 <label><B>CATTLE ID</B></label><BR>
	 			<input type="text" name="cattleno" class="form-control" value="<?php echo $cattleno; ?>">
	 		</div>

	 		<div class="form-group">
			 <label><B>CATTLE WEIGHT</B></label><BR>
	 			<input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
	 		</div>

	 		<div class="form-group date" data-provide="datepicker">
			 <label><B>ENTRY DATE</B></label><BR>
	 			<input type="text" name="arrived" class="form-control" value="<?php echo $arr; ?>">
	 		</div>

	 		<div class="form-group">
			 <label><B>CATTLE CONDITION</B></label><BR>
	 			<input type="text" name="status" class="form-control" value="<?php echo $health; ?>">
	 		</div>

	 		<div class="form-group">
			 <label><B>CATTLE BREED</B></label><BR>
	 			<select name="breed" class="custom-select">
	 				<option value="<?php echo $b_id; ?>" selected><?php echo $bname; ?></option>
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

	 		<div class="form-group">
			 <label><B>CATTLE INFO</B></label><BR>
	 			<textarea class="form-control" name="remark"><?php echo $remark; ?></textarea>
	 		</div>

	 		<button name="submit" type="submit" name="submit" class="btn">Update</button>
	 	</form></center>
 </div><br>

</div>
</div>
 <center><div>
 	<a class="button" onclick="return confirm('Want to delete the cattle????')" href="delete.php?id=<?php echo $id ?>"> Delete</a>
 </div></center><br>
</div>


</body>
</html>