<?php
		include 'backend/connection.php';

		$id = $_GET['id'];
		$name = $_GET['name'];
		$college = $_GET['college'];

		$sql = "UPDATE course SET course_name = '".$name."', college_id = '".$college."' WHERE course_id = '".$id."'";
		$conn->query($sql);

		echo '
			  <div class="alert alert-success" role="alert">Successfully Updated</div>
			';
?>