<?php
	include 'backend/connection.php';

	$code = $_POST['inputsubcode'];
	$desc = $_POST['inputsubdesc'];
	$units = $_POST['inputunits'];

	$sql = "INSERT INTO subject SET subject_code = '".$code."', subject_description = '".$desc."', subject_units = '".$units."'";
	$conn->query($sql);

	$sql = "SELECT subject_id FROM subject WHERE subject_code = '".$code."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	header("Location:../editsubject.php?id="+$row['subject_id']);
?>