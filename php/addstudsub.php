<?php
	include 'backend/connection.php';

	$id = $_GET['id'];
	$subid = $_GET['subid'];
	$courseid = $_GET['courseid'];
  $year = $_GET['yrlvl'];
  $sem = $_GET['sem'];

	$sql = "INSERT INTO student_subjs SET stud_id = '".$id."', subject_id = '".$subid."'";
	$conn->query($sql);

	  $sql = "SELECT * FROM student_subjs,subject,subj_course,course WHERE subject.subject_id=subj_course.subj_id AND course.course_id=subj_course.course_id AND student_subjs.subject_id=subject.subject_id AND student_subjs.stud_id = '".$id."' AND subj_course.subj_yrlvl = '".$year."' AND subj_course.subj_semester = '".$sem."'";
                                    $totunits = 0;
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()){
                                        echo '
                                              <tr>
                                                  <td>'.$row['subject_code'].'</td>
                                                  <td>'.$row['subject_description'].'</td>
                                                  <td>'.$row['subject_units'].'</td>
                                                  <td>'.$row['course_name'].'</td>
                                                  <td><button type="button" class="btn btn-danger" onclick="remstudsub('.$id.','.$row['subject_id'].','.$courseid.')">Remove</button</td>
                                              </tr>
                                            ';
                                          $totunits = $totunits + $row['subject_units'];
                                    }?>