<?php
		include 'backend/connection.php';

		$id = $_GET['id'];
		$sql = "SELECT * FROM subject WHERE subject_id != '".$id."'";
                            $result  = $conn->query($sql);
                            while($row = $result->fetch_assoc()){
                              $sql2 = "SELECT count(id) FROM subject_preq WHERE subject_id_preq = '".$row['subject_id']."' AND subject_id = '".$id."'";
                              $result2 = $conn->query($sql2);
                              $row2 = $result2->fetch_assoc();
                              if(($row2['count(id)'])<1)
                                echo '
                                    <tr>
                                      <td>'.$row['subject_code'].'</td>
                                      <td>'.$row['subject_description'].'</td>
                                      <td>'.$row['subject_units'].'</td>
                                      <td><button class="btn btn-primary" onclick="addprereq('.$id.','.$row['subject_id'].')">Add as Pre-requisite</button></td>
                                    </tr>
                                    ';
                            }
?>