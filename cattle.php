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
#cattle {
  font-family: Times New Roman, sans-serif;
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
  text-align: left;
  background-color: #F75460;
  color: white;
}
.button {
    display: block;
    width: 60px;
    background: #4E9CAF;
    padding: 3px;
    text-align: center;
    color: black;
    
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
</style>
<body>
<div>
 	<center><h1><i>INSERT CATTLE DETAILS</i></h1></center><br>
 <div>
 	<center><table id="cattle">
 		<thead>
 			<center><tr>
 				<th>No</th>
        <th>Cattle Info</th>
 				<th>Cattle Entry No</th>
 				<th>Breed Type</th>
 				<th>Cattle Weight</th>
 				<th>Cattle Gender</th>
 				<th>Entry Date</th>
 				<th>Cattle Images</th>
                <th>Actions</th>
                <th>Locations</th>
 			</tr></center>
 		</thead>
 		<center><tbody>
 			<?php
       $all_cattle = $db->query("SELECT * FROM cattle ORDER BY id DESC");
       $fetch = $all_cattle->fetchAll(PDO::FETCH_OBJ);
       foreach($fetch as $data){ 
          $get_breed = $db->query("SELECT * FROM breed WHERE id = '$data->breed_id'");
          $breed_result = $get_breed->fetchAll(PDO::FETCH_OBJ);
          foreach($breed_result as $breed){
        ?> 
          <tr>
            <td><?php echo $data->id ?></td>
            <td><?php echo wordwrap($data->remark,300,'<br>'); ?></td>
            <td><?php echo $data->cattleno ?></td>
            <td><?php echo $breed->name ?></td>
            <td><?php echo $data->weight ?></td>
            <td><?php echo $data->gender ?></td>
            <td><?php echo $data->arrived ?></td>
            
            <td>
              <img width="70" height="70" src="<?php echo $data->img; ?>" class="img img-responsive thumbnail">
            </td>
            <td>
               <div>
                  
                  
                    <a href="edit_cattle.php?id=<?php echo $data->id ?>" class="button">Edit</a><br>
                    <a onclick="return confirm('Want to Delete the Cattle????')" href="delete.php?id=<?php echo $data->id ?>" class="button">Delete</a>
                
                  
                </div> 
            </td>
            <td><a href="https://www.google.com/maps/place/2+Dennistoun+Ave,+Guildford+NSW+2161,+Australia/@-33.856328,150.969001,16.74z/data=!4m5!3m4!1s0x6b12bd6e86d6eac1:0x35960f98bb27673d!8m2!3d-33.8563103!4d150.9710721">View Maps</a></td>
          </tr>    
      <?php 
       }
      }
      ?>
 		</tbody></center>
 	</table></center>
 </div>
 <br>
 <center><a href="insert_cattle.php" class="button">INSERT</a></center>
 </div>
</div>

</div>


</body>
</html>