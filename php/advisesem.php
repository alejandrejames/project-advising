<?php
		include 'backend/connection.php';

		$id = $_GET['id'];
		$year = $_GET['year'];
		$sem = $_GET['sem'] - 1;
		$courseid = $_GET['courseid'];

		$sql = "SELECT * FROM subj_course,subject,student_subjs WHERE subj_course.subj_id=subject.subject_id AND student_subjs.subject_id=subject.subject_id AND student_subjs.stud_id = '".$id."' AND subj_course.subj_yrlvl='".$year."' AND subj_course.subj_semester = '".$sem."'";

		$result = $conn->query($sql);
		switch ($year) {
			case '1':
				if($sem==1)
					echo '<h4>1st Year 1st Sem Grades</h4>';
				else
					echo '<h4>1st Year 2nd Sem Grades</h4>';
				break;

			case '2':
				if($sem==1)
					echo '<h4>2nd Year 1st Sem Grades</h4>';
				else
					echo '<h4>2nd Year 2nd Sem Grades</h4>';
				break;	
			
			case '3':
				if($sem==1)
					echo '<h4>3rd Year 1st Sem Grades</h4>';
				else
					echo '<h4>3rd Year 2nd Sem Grades</h4>';
				break;

			case '4':
				if($sem==1)
					echo '<h4>4th Year 1st Sem Grades</h4>';
				else
					echo '<h4>4th Year 2nd Sem Grades</h4>';
				break;

			default:
				# code...
				break;
		}
		echo '
			<table class="table table-striped">
                <thead>
					<th>Subject Code</th>
					<th>Subject Description</th>
					<th>Subject Units</th>
					<th>Input grade</th>
					<th>Update grade</th>
				</thead>
                <tbody>
			';
		while($row = $result->fetch_assoc()){
			echo '
				  <tr>
				  		<td>'.$row['subject_code'].'</td>
				  		<td>'.$row['subject_description'].'</td>
				  		<td>'.$row['subject_units'].'</td>
				  		<td><input type="number" class="form-control" id="subgrade-'.$row['subject_id'].'" min="65" max="98" value="'.$row['subj_grade'].'"></td>
				  		<td><button class="btn btn-success" onclick="addgrade('.$id.','.$row['subject_id'].')">Submit</button></td>
				  </tr>
				';
		}
		echo '
			</thead>
			</tbody>
			';
?>