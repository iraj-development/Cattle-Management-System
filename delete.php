<?php include 'setup.php'; ?>
<?php

if(!$_GET['id'] OR empty($_GET['id']))
{
	header('location: cattle.php');
}else
{
	$id = (int)$_GET['id'];
	$query = $db->query("DELETE FROM cattle WHERE id = $id ");
	if($query){
		header('location: cattle.php');
	}
}
 
