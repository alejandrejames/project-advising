<?php
	include 'backend/connection.php';

	$id = $_GET['id'];
	$sql = "SELECT * FROM course WHERE college_id='".$id."'";
	$result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
    	echo '<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
    }
?>