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
      <a class="navbar-brand" href="#">Student Advising System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <form class="navbar-form navbar-left">

      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

          <div class="container-fluid">
            <div class="col-md-12">
                <div class="alert alert-info">....</div>
            </div>
            <div class="col-md-2 sidebar">
                <?php include 'php/sidebar.php'?>
            </div>
            <?php
                include 'php/modals.php';
            ?>
            <div class="col-md-10">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Advising</h3>
                    </div>
                    <div class="panel-body">
                         <div class="panel panel-default">
                            <table class="table table-striped">
                                <tbody>
                                  <?php
                                      $id = $_GET['id'];

                                      $sql = "SELECT * FROM student,course,college WHERE college.college_id=student.college_id AND course.course_id=student.course_id AND stud_id = '".$id."'";
                                      $result = $conn->query($sql);
                                      $row = $result->fetch_assoc();
                                      echo '
                                            <tr>
                                                <td>Student No.</td>
                                                <td>'.$row['stud_univid'].'</td>
                                                <td>College/Department</td>
                                                <td>'.$row['college_name'].'</td>
                                           </tr>
                                           <tr>
                                                <td>Name</td>
                                                <td>'.$row['stud_fname'].' '.$row['stud_lname'].'</td>
                                                <td>Course</td>
                                                <td>'.$row['course_name'].'</td>
                                           </tr>
                                           <tr>
                                              <td>Status</td>
                                              <td>'.$row['stud_status'].'</td>
                                           </tr>
                                            ';  
                                ?>
                              </tbody>
                            </table>
                         </div>
                    </div>
                  </div>
            </div>

              <div class="col-md-10">
                          <div class="btn-group">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-hashpopup="true" aria-expanded="false">1st Year<span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                  <li><a href="advised.php?id=<?php echo $id?>&yrlvl=1&sem=1&courseid=<?php echo $row['course_id']?>">1st Sem</a></li>
                                  <li><a href="#" onclick="advise(<?php echo $id?>,1,2,<?php echo $row['course_id']?>)">2nd Sem</a></li>
                              </ul>
                          </div>

                          <div class="btn-group">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-hashpopup="true" aria-expanded="false">2nd Year<span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                  <li><a href="#" onclick="advise(<?php echo $id?>,2,1,<?php echo $row['course_id']?>)">1st Sem</a></li>
                                  <li><a href="#" onclick="advise(<?php echo $id?>,2,2,<?php echo $row['course_id']?>)">2nd Sem</a></li>
                              </ul>
                          </div>

                          <div class="btn-group">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-hashpopup="true" aria-expanded="false">3rd Year<span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                  <li><a href="#" onclick="advise(<?php echo $id?>,3,1,<?php echo $row['course_id']?>)">1st Sem</a></li>
                                  <li><a href="#" onclick="advise(<?php echo $id?>,3,2,<?php echo $row['course_id']?>)">2nd Sem</a></li>
                              </ul>
                          </div>

                          <div class="btn-group">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-hashpopup="true" aria-expanded="false">4th Year<span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                  <li><a href="#" onclick="advise(<?php echo $id?>,4,1,<?php echo $row['course_id']?>)">1st Sem</a></li>
                                  <li><a href="#" onclick="advise(<?php echo $id?>,4,2,<?php echo $row['course_id']?>)">2nd Sem</a></li>
                              </ul>
                          </div>
                </div>
            <div class="col-md-10" id="semgrade" style="display: none;">
                <div id="alert2"></div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Advise - Input grades last semester</h3>
                  </div>
                  <div class="container-fluid">
                      <div class="col-md-12" id="advisetbl">
                        
                      </div>
                  </div>
              </div>
              <div id="advbutton"></div>
          </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>