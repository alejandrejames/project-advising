<?php
	include 'backend/connection.php';

	$book = $_GET['book'];
	$start = $_GET['start'];
	$end = $_GET['end'];

	switch ($book) {
		case '1':
			$sql = "SELECT * FROM subject LIMIT ".$start.",".$end."";
            $result = $conn->query($sql);
 			while($row = $result->fetch_assoc()){
 			echo '
				<tr>
					<td>'.$row['subject_code'].'</td>
					<td>'.$row['subject_description'].'</td>
					<td>'.$row['subject_units'].'</td>
					<td><a href="editsubject.php?id='.$row['subject_id'].'"<button type="button" class="btn btn-success">Edit</button></a></td>
				</tr>
            	';
            }
			break;
			
			case '2':
			$sql = "SELECT * FROM course LIMIT ".$start.",".$end."";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()){
                                      echo '
                                            <tr>
                                                <td>'.$row['course_name'].'</td>
                                                ';
                                            $sql2 = "SELECT college_name FROM college WHERE college_id = '".$row['college_id']."'";
                                            $result2 = $conn->query($sql2);
                                            $row2 = $result2->fetch_assoc();

                                            echo '
                                                  <td>'.$row2['college_name'].'</td>
                                                  <td>1</td>
                                                  <td><a href="editcourse.php?id='.$row['course_id'].'"><button type="button" class="btn btn-success">Edit</button></a></td>
                                            </tr>
                                            ';
                                    }
			break;

			case '3':
				$sql = "SELECT * FROM student LIMIT ".$start.",".$end."";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()){
                                      echo '
                                          <tr>
                                            <td>'.$row['stud_univid'].'</td>
                                            <td>'.$row['stud_fname'].', '.$row['stud_lname'].'</td>
                                            ';

                                            $sql2 = "SELECT college_name FROM college WHERE college_id = '".$row['college_id']."'";
                                            $result2 = $conn->query($sql2);
                                            $row2 = $result2->fetch_assoc();
                                      echo '
                                          <td>'.$row2['college_name'].'</td>
                                          ';
                                          $sql2 = "SELECT course_name FROM course WHERE course_id = '".$row['course_id']."'";
                                          $result2 = $conn->query($sql2);
                                          $row2 = $result2->fetch_assoc();

                                      echo '
                                          <td>'.$row2['course_name'].'</td>
                                           <td><a href="editstudent.php?id='.$row['stud_id'].'&courseid='.$row['course_id'].'"><button type="button" class="btn btn-success">Edit</button></a></td>
                                           <td><a href="advising.php?id='.$row['stud_id'].'"><button type="button" class="btn btn-primary">Advise</button></a></td>
                                          </tr>
                                          ';
                                    }
			break;

			case '4':
				 $sql = "SELECT * FROM subject LIMIT ".$start.",".$end."";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                      echo '
                                          <tr>
                                              <td>'.$row['subject_code'].'</td>
                                              <td>'.$row['subject_description'].'</td>
                                              <td>
                                                  <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      1st Year<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',1,1)">1st Sem</a></li>
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',1,2)">2nd Sem</a></li>
                                                    </ul>
                                                  </div>
                                              </td>

                                              <td>
                                                  <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      2nd Year<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',2,1)">1st Sem</a></li>
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',2,2)">2nd Sem</a></li>
                                                    </ul>
                                                  </div>
                                              </td>

                                              <td>
                                                  <div class="btn-group">
                                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      3rd Year<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',3,1)">1st Sem</a></li>
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',3,2)">2nd Sem</a></li>
                                                    </ul>
                                                  </div>
                                              </td>

                                              <td>
                                                  <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      4th Year<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',4,1)">1st Sem</a></li>
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',4,2)">2nd Sem</a></li>
                                                    </ul>
                                                  </div>
                                              </td>
                                          </tr>
                                          ';
                                }
			break;
			case '5':
				 $sql = "SELECT * FROM subject WHERE subject_id != '".$id."' LIMIT ".$start.",".$end."";
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
			break;
		default:
			# code...
			break;
	}
?>