<?php
	include 'backend/connection.php';

	$name = $_POST['inputcoursename'];
	$college = $_POST['inputcoursecollege'];

	$sql = "INSERT INTO course SET course_name = '".$name."', college_id = '".$college."'";
	$conn->query($sql);

	$sql = "SELECT course_id FROM course WHERE course_name = '".$name."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	header("Location:../editcourse.php?id="+$row['course_id']);
?>