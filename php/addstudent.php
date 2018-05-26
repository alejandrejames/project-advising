<?php
	include 'backend/connection.php';

	$studno = $_POST['inputstudno'];
	$lname = $_POST['inputlname'];
	$fname = $_POST['inputfname'];
	$depertm = $_POST['inputdepartm'];
	$course = $_POST['inputcourse'];
	$yrlvl = $_POST['inputyrlvl'];
	$syr = $_POST['inputsyr'];
	$status = $_POST['inputstatus'];

	$sql = "INSERT INTO student SET stud_univid = '".$studno."', stud_fname = '".$fname."', stud_lname = '".$lname."', college_id = '".$depertm."', course_id = '".$course."', stud_yearlvl = '".$yrlvl."', stud_status = '".$status."'";
	$conn->query($sql);

	$sql = "SELECT stud_id FROM student WHERE stud_univid = '".$studno."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	header("Location: ../editstudent.php?id=".$row['stud_id']."&courseid=".$course);
?>