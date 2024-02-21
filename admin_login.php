<?php include 'setup.php'; ?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
body{
  background-image: url("login_back.jpg");
   height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
  input[type=text], input[type=password] {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: red;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 10%;
  border-radius: 50%;
}
</style>
<body>
<div>
	<div>
<br>
		<center><h1>ONLINE CATTLE MANAGEMENT SYSTEM</h1></center><br><br><br>
    <div class="imgcontainer">
    <img src="adminicon.png" alt="Avatar" class="avatar">
  </div>
  <center><h2>ADMIN PORTAL</h2></center>
		<div>
			<center><form method="post" autocomplete="off">
				<div class="form-group">
				   <label class="control-label">USERNAME</label><br>
				   <input type="text" name="username" class="form-control input-sm" placeholder="Enter Username" required>
			    </div>

			    <div>
				   <center><label>PASSWORD</label></center>
				   <input type="password" name="password" class="form-control input-sm" placeholder="Enter Password" required>
			    </div>
                <br>
			    <button name="submit" type="submit" class="btn btn-md btn-dark"><b>Sign In</b></button>
			</form></center>

			<?php
              if (isset($_POST['submit'])) {
              	$username = trim($_POST['username']);
              	$password = $_POST['password'];

              	// $hash = sha1($password);
                
                $q = $db->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

                $count = $q->rowCount();
                $rows = $q->fetchAll(PDO::FETCH_OBJ);

                if($count > 0){
                   foreach($rows as $row){
                     $user_id = $row->id;
                     $user = $row->username;

                     $_SESSION['id'] = $user_id;
                     $_SESSION['user'] = $user;

                     header('location: dashboard.php');
                   }
                }else{
                	$error = 'incorrect login details';
                }

              }


            if(isset($error)){ ?>
            <br><br>
               <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><?php echo $error; ?>.</strong>
              </div>
            <?php }
			?>


		</div>
	</div>
</div>
</body>
</html>