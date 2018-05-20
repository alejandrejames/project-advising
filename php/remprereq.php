<?php
		include 'backend/connection.php';

		$id = $_GET['id'];
		$subid = $_GET['subid'];

		$sql = "DELETE FROM subject_preq WHERE id = '".$id."'";
		$conn->query($sql);

	 $sql = "SELECT * FROM subject_preq,subject WHERE subject_preq.subject_id_preq=subject.subject_id AND subject_preq.subject_id = '".$subid."'";
     $result  = $conn->query($sql);
     while($row = $result->fetch_assoc()){
            echo '
                  <tr>
                      <td>'.$row['subject_code'].'</td>
                      <td>'.$row['subject_description'].'</td>
                      <td>'.$row['subject_units'].'</td>
                      <td><button class="btn btn-danger" onclick="remprereq('.$row['id'].')">Remove</button></td>
                  </tr>
                 ';
        	}
?>