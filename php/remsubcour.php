<?php
	include 'backend/connection.php';

	$id = $_GET['id'];
	$id2 = $_GET['id2'];
	$year = $_GET['yrlvl'];
	$sem = $_GET['sem'];

	$sql = "DELETE FROM subj_course WHERE id='".$id."'";
	$conn->query($sql);

	$sql = "SELECT * FROM subj_course,subject WHERE course_id='".$id2."' AND subj_course.subj_id = subject.subject_id AND subj_semester='".$sem."' AND subj_yrlvl='".$year."'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo '
            <tr>
                <td>'.$row['subject_code'].'</td>
                <td>'.$row['subject_description'].'</td>
                <td><button type="button" class="btn btn-danger" onclick="removesub('.$row['id'].','.$year.','.$sem.')">Remove</button></td>
				</tr>
			';
		}
?>