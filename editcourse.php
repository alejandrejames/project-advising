<?php
    include 'php/backend/connection.php';
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student Advising System+</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="css/sidenav.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .sidebar{
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        
      }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <form class="navbar-form navbar-left">

      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div>
          <div class="container-fluid">
            <div class="col-md-12">
                <div class="alert alert-info">....</div>
            </div>
            <div class="col-md-2 sidebar">
                <?php include 'php/sidebar.php';?>
            </div>
            <?php
                include 'php/modals.php';
            ?>
            <div class="col-md-10">
                  <div class="col-md-12" id="alerts">
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Edit</h3>
                    </div>
                    <div class="panel-body">
                      <div class="container-fluid">
                        <form>
                            <div class="row">
                                <button type="button" class="btn btn-default" id="editbutton" onclick="enableedit2()">Edit data</button>
                            </div>
                            <br>
                            <div class="well">
                                <div class="col-md-12" id="alertscourse"></div>
                                <div class="container-fluid">
                                    <?php
                                        $id = $_GET['id'];

                                        $sql = "SELECT * FROM course WHERE course_id = '".$id."'";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                    ?>
                                    <input type="number" value="<?php echo $id?>" id="coursedbid" name="coursedbid" hidden>
                                    <div class="col-md-6">
                                      <label for="coursename">Course Title</label>
                                      <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Title" value="<?php echo $row['course_name']?>" required disabled>
                                    </div>
                                    <div class="col-md-6">
                                      <label for="coursecollege">College/Department</label>
                                      <select class="form-control" id="coursecollege" name="coursecollege" disabled>
                                          <?php
                                              $sql = "SELECT * FROM college";
                                              $result = $conn->query($sql);
                                              while($row2 = $result->fetch_assoc()){
                                                      echo '
                                                          <option value="'.$row2['college_id'].'"' ;
                                                      if($row2['college_id']==$row['college_id'])
                                                          echo 'selected';
                                                      echo '>'.$row2['college_name'].'</option>
                                                          ';
                                                  }
                                          ?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                          <button type="button" class="btn btn-success" id="savechg" style="display: none;" onclick="updatecourse()">Save Changes</button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>

                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>1st Year</th>
                        <th>2nd Year</th>
                        <th>3rd Year</th>
                        <th>4th Year</th>
                      </thead>
                      <tbody>
                            <?php
                                $sql = "SELECT * FROM subject";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                      echo '
                                          <tr>
                                              <td>'.$row['subject_code'].'</td>
                                              <td>'.$row['subject_description'].'</td>
                                              <td>
                                                  <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Sem..<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',1,1)">1st Sem</a></li>
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',1,2)">2nd Sem</a></li>
                                                    </ul>
                                                  </div>
                                              </td>

                                              <td>
                                                  <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Sem..<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',2,1)">1st Sem</a></li>
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',2,2)">2nd Sem</a></li>
                                                    </ul>
                                                  </div>
                                              </td>

                                              <td>
                                                  <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Sem..<span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',3,1)">1st Sem</a></li>
                                                      <li><a href="#" onclick="corsub('.$row['subject_id'].',3,2)">2nd Sem</a></li>
                                                    </ul>
                                                  </div>
                                              </td>

                                              <td>
                                                  <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Sem..<span class="caret"></span>
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
                            ?>
                      </tbody>
                    </table>
                  </div>
            </div>

            <div class="row">
            <!--1st Year 1st Sem-->
             <div class="col-md-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">1st Year 1st Sem</h3>
                </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Remove</th>
                      </thead>
                      <tbody id="1st1stcourse">
                            <?php
                                $sql = "SELECT * FROM subj_course,subject WHERE course_id='".$id."' AND subj_course.subj_id = subject.subject_id AND subj_semester='1' AND subj_yrlvl='1'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                  echo '
                                      <tr>
                                         <td>'.$row['subject_code'].'</td>
                                                       <td>'.$row['subject_description'].'</td>
                                                       <td><button type="button" class="btn btn-danger" onclick="removesub('.$row['id'].',1,1)">Remove</button></td>
                                      </tr>
                                    ';
                                }
                            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>

            <!--1st Year 2nd Sem-->
             <div class="col-md-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">1st Year 2nd Sem</h3>
                </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Remove</th>
                      </thead>
                      <tbody id="1st2ndcourse">
                            <?php
                                $sql = "SELECT * FROM subj_course,subject WHERE course_id='".$id."' AND subj_course.subj_id = subject.subject_id AND subj_semester='2' AND subj_yrlvl='1'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                  echo '
                                      <tr>
                                         <td>'.$row['subject_code'].'</td>
                                                       <td>'.$row['subject_description'].'</td>
                                                       <td><button type="button" class="btn btn-danger" onclick="removesub('.$row['id'].',1,2)">Remove</button></td>
                                      </tr>
                                    ';
                                }
                            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>

            <div class="row">
            <!--2nd Year 1st Sem-->
             <div class="col-md-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">2nd Year 1st Sem</h3>
                </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Remove</th>
                      </thead>
                      <tbody id="2nd1stcourse">
                            <?php
                                $sql = "SELECT * FROM subj_course,subject WHERE course_id='".$id."' AND subj_course.subj_id = subject.subject_id AND subj_semester='1' AND subj_yrlvl='2'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                  echo '
                                      <tr>
                                         <td>'.$row['subject_code'].'</td>
                                                       <td>'.$row['subject_description'].'</td>
                                                       <td><button type="button" class="btn btn-danger" onclick="removesub('.$row['id'].',2,1)">Remove</button></td>
                                      </tr>
                                    ';
                                }
                            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>

            <!--2nd Year 2nd Sem-->
             <div class="col-md-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">2nd Year 2nd Sem</h3>
                </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Remove</th>
                      </thead>
                      <tbody id="2nd2ndcourse">
                            <?php
                                $sql = "SELECT * FROM subj_course,subject WHERE course_id='".$id."' AND subj_course.subj_id = subject.subject_id AND subj_semester='2' AND subj_yrlvl='2'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                  echo '
                                      <tr>
                                         <td>'.$row['subject_code'].'</td>
                                                       <td>'.$row['subject_description'].'</td>
                                                       <td><button type="button" class="btn btn-danger" onclick="removesub('.$row['id'].',2,2)">Remove</button></td>
                                      </tr>
                                    ';
                                }
                            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>

           <div class="row">
            <!--3rd Year 1st Sem-->
             <div class="col-md-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">3rd Year 1st Sem</h3>
                </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Remove</th>
                      </thead>
                      <tbody id="3rd1stcourse">
                            <?php
                                $sql = "SELECT * FROM subj_course,subject WHERE course_id='".$id."' AND subj_course.subj_id = subject.subject_id AND subj_semester='1' AND subj_yrlvl='3'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                  echo '
                                      <tr>
                                         <td>'.$row['subject_code'].'</td>
                                                       <td>'.$row['subject_description'].'</td>
                                                       <td><button type="button" class="btn btn-danger" onclick="removesub('.$row['id'].',3,1)">Remove</button></td>
                                      </tr>
                                    ';
                                }
                            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>

            <!--3rd Year 2nd Sem-->
             <div class="col-md-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">3rd Year 2nd Sem</h3>
                </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Remove</th>
                      </thead>
                      <tbody id="3rd2ndcourse">
                            <?php
                                $sql = "SELECT * FROM subj_course,subject WHERE course_id='".$id."' AND subj_course.subj_id = subject.subject_id AND subj_semester='2' AND subj_yrlvl='3'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                  echo '
                                      <tr>
                                         <td>'.$row['subject_code'].'</td>
                                                       <td>'.$row['subject_description'].'</td>
                                                       <td><button type="button" class="btn btn-danger" onclick="removesub('.$row['id'].',3,2)">Remove</button></td>
                                      </tr>
                                    ';
                                }
                            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>

           <div class="row">
            <!--4th Year 1st Sem-->
             <div class="col-md-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">4th Year 1st Sem</h3>
                </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Remove</th>
                      </thead>
                      <tbody id="4th1stcourse">
                            <?php
                                $sql = "SELECT * FROM subj_course,subject WHERE course_id='".$id."' AND subj_course.subj_id = subject.subject_id AND subj_semester='1' AND subj_yrlvl='4'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                  echo '
                                      <tr>
                                         <td>'.$row['subject_code'].'</td>
                                                       <td>'.$row['subject_description'].'</td>
                                                       <td><button type="button" class="btn btn-danger" onclick="removesub('.$row['id'].',4,1)">Remove</button></td>
                                      </tr>
                                    ';
                                }
                            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>

            <!--4th Year 2nd Sem-->
             <div class="col-md-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">4th Year 2nd Sem</h3>
                </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Remove</th>
                      </thead>
                      <tbody id="4th2ndcourse">
                            <?php
                                $sql = "SELECT * FROM subj_course,subject WHERE course_id='".$id."' AND subj_course.subj_id = subject.subject_id AND subj_semester='2' AND subj_yrlvl='4'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                  echo '
                                      <tr>
                                         <td>'.$row['subject_code'].'</td>
                                                       <td>'.$row['subject_description'].'</td>
                                                       <td><button type="button" class="btn btn-danger" onclick="removesub('.$row['id'].',4,2)">Remove</button></td>
                                      </tr>
                                    ';
                                }
                            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>

            </div>
          </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>