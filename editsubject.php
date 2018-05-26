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
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Edit Subject</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <button type="button" class="btn btn-default" id="editbutton" onclick="enableedit3()">Edit data</button>
                            </div>
                            <br>
                            <div class="well">
                                <div class="col-md-12" id="alerts"></div>
                                <div class="container-fluid">
                                    <?php
                                        $id = $_GET['id'];

                                        $sql = "SELECT * FROM subject WHERE subject_id = '".$id."'";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                    ?>
                                    <input type="number" value="<?php echo $id?>" id="subjectdbid" name="coursedbid" hidden>
                                    <div class="col-md-4">
                                      <label for="subjectcode">Subject Code</label>
                                      <input type="text" class="form-control" id="subjectcode" name="subjectcode" placeholder="Subject Code" value="<?php echo $row['subject_code']?>" required disabled>
                                    </div>
                                    <div class="col-md-8">
                                      <label for="subjectname">Subject Description</label>
                                      <input type="text" class="form-control" id="subjectname" name="subjectname" placeholder="Subject Code" value="<?php echo $row['subject_description']?>" required disabled>
                                    </div>
                                    <div class="col-md-4">
                                      <label for="subjectunits">Subject Units</label>
                                      <input type="number" class="form-control" id="subjectunits" name="subjectunits" placeholder="Subject Code" value="<?php echo $row['subject_units']?>" required disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <button class="btn btn-success" id="savechg" onclick="updatesubject()" style="display: none;">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-10 col-md-offset2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Add Pre-requisite</h3>
                  </div>
                  <div class="panel-body">
                    <table class="table">
                      <thead>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Subject Units</th>
                          <th>Add</th>
                      </thead>
                      <tbody id="addtable">
                        <?php
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
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>

            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Pre-requisites</h3>
                  </div>
                  <div class="panel-body">
                    <table class="table">
                      <thead>
                          <th>Subject Code</th>
                          <th>Subject Description</th>
                          <th>Subject Units</th>
                          <th>Add</th>
                      </thead>
                      <tbody id="reqtable">
                        <?php
                            $sql = "SELECT * FROM subject_preq,subject WHERE subject_preq.subject_id_preq=subject.subject_id AND subject_preq.subject_id = '".$id."'";
                            $result  = $conn->query($sql);
                            while($row = $result->fetch_assoc()){
                                echo '
                                    <tr>
                                      <td>'.$row['subject_code'].'</td>
                                      <td>'.$row['subject_description'].'</td>
                                      <td>'.$row['subject_units'].'</td>
                                      <td><button class="btn btn-danger" onclick="remprereq('.$row['id'].','.$id.')">Remove</button></td>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>