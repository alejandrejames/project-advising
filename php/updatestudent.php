<?php
	include 'backend/connection.php';

	$id = $_POST['studdbid'];
	$studno = $_POST['editstudno'];
	$lname = $_POST['editlname'];
	$fname = $_POST['editfname'];
	$departm = $_POST['editdepartm'];
	$course = $_POST['editcourse'];
	$yrlvl = $_POST['edityrlvl'];
	$status = $_POST['editstatus'];

	$sql = "UPDATE student SET stud_univid = '".$studno."', stud_lname = '".$lname."', stud_fname = '".$fname."', college_id = '".$departm."', course_id = '".$course."', stud_yearlvl = '".$yrlvl."', stud_status = '".$status."' WHERE stud_id='".$id."'";
	$conn->query($sql);
	header("Location: ../editstudent.php?id=".$id);
?>