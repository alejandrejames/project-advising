<?php
		include 'backend/connection.php';

		$id = $_GET['id'];
		$subid = $_GET['subid'];
		$subgrade = $_GET['subgrade'];

		$sql = "UPDATE student_subjs SET subj_grade='".$subgrade."' WHERE stud_id='".$id."' AND subject_id='".$subid."'";
		$conn->query($sql);

		echo '<div class="alert alert-success" role="alert">Subject Grade Updated</div>';
?>