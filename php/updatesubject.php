<?php
	include 'backend/connection.php';

	$id = $_GET['id'];
	$name = $_GET['name'];
	$code = $_GET['code'];
	$units = $_GET['units'];

	$sql = "UPDATE subject SET subject_code = '".$code."', subject_description = '".$name."', subject_units = '".$units."' WHERE subject_id = '".$id."'";
	$conn->query($sql);

	echo '<div class="alert alert-success">Saved</div>';
?>