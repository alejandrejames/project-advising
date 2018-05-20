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
                        <form action="php/updatestudent.php" method="POST">
                            <div class="row">
                                <button type="button" class="btn btn-default" id="editbutton" onclick="enableedit()">Edit data</button>
                            </div>
                            <br>
                            <div class="well">
                                <div class="container-fluid">
                                    <?php
                                        $id = $_GET['id'];

                                        $sql = "SELECT * FROM student WHERE stud_id = '".$id."'";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                    ?>
                                    <input type="number" value="<?php echo $id?>" name="studdbid" hidden>
                                    <div class="col-md-4">
                                      <label for="inputid">Student No.</label>
                                      <input type="text" class="form-control" id="editstudno" name="editstudno" placeholder="Student number" value="<?php echo $row['stud_univid']?>" required disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputlname">Last Name</label>
                                        <input type="text" class="form-control" id="editlname" name="editlname"  placeholder="First Name"  value="<?php echo $row['stud_lname']?>" required disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputfname">First Name</label>
                                        <input type="text" class="form-control" id="editfname" name="editfname" placeholder="Last Name"  value="<?php echo $row['stud_fname']?>" required disabled>
                                    </div>
                                      <div class="col-md-6">
                                          <label for="inputdepartm">College/Department</label>
                                          <select class="form-control" id="editdepartm" name="editdepartm" onchange="chgcourseedit()" disabled>
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
                                      <div class="col-md-6">
                                          <label for="inputcourse">Course</label>
                                          <select class="form-control" id="editcourse" name="editcourse" disabled>
                                              <?php
                                                  $sql = "SELECT * FROM course WHERE college_id='".$row['college_id']."'";
                                                  $result = $conn->query($sql);
                                                  while($row2 = $result->fetch_assoc()){
                                                      echo '<option value="'.$row2['course_id'].'" ';
                                                      if($row2['course_id']==$row['course_id']){
                                                          echo 'selected';
                                                      }
                                                      echo '>'.$row2['course_name'].'</option>';
                                                  }
                                              ?>
                                          </select>
                                      </div>
                                      <div class="col-md-2">
                                          <label for="inputyrlvl">Year Level</label>
                                          <select class="form-control" id="edityrlvl" name="edityrlvl" disabled>
                                              <?php
                                                  if($row['stud_yearrlvl']=="1st")
                                                      echo '<option selected>1st</option>';
                                                  else
                                                    echo '<option>1st</option>';
                                                  if($row['stud_yearrlvl']=="2nd")
                                                      echo '<option selected>2nd</option>';
                                                  else
                                                    echo '<option>2nd</option>';
                                                  if($row['stud_yearrlvl']=="3rd")
                                                      echo '<option selected>3rd</option>';
                                                  else
                                                    echo '<option>3rd</option>';
                                                  if($row['stud_yearrlvl']=="4th")
                                                      echo '<option selected>4th</option>';
                                                  else
                                                    echo '<option>4th</option>';
                                              ?>
                                          </select>
                                      </div>
                                      <div class="col-md-5">
                                          <label for="editstatus">Academic Status</label>
                                          <select class="form-control" id="editstatus" name="editstatus" disabled>
                                              <?php
                                                  if($row['stud_status']=="Old")
                                                    echo '<option selected>Old</option>';
                                                  else
                                                    echo '<option>Old</option>';

                                                  if($row['stud_status']=="New")
                                                    echo '<option selected>New</option>';
                                                  else
                                                    echo '<option>New</option>';

                                                  if($row['stud_status']=="Transferee")
                                                    echo '<option selected>Transferee</option>';
                                                  else
                                                    echo '<option>Transferee</option>';

                                                  if($row['stud_status']=="Returning")
                                                    echo '<option selected>Returning</option>';
                                                  else
                                                    echo '<option>Returning</option>';
                                              ?>
                                          </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                          <button type="submit" class="btn btn-success" id="savechg" style="display: none;">Save Changes</button>
                            </div>
                          </form>
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