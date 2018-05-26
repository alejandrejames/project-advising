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
    <link href="css/sidenav.css" rel="stylesheet">

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

    <div class="row main-row">
          <div class="container-fluid">
            <div class="col-md-12">
                <div class="alert alert-info">....</div>
            </div>
            <div class="col-md-2 sidebar">
                <?php include 'php/sidebar.php'?>
            </div>
            <div class="col-md-10">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Advising</h3>
                    </div>
                    <div class="panel-body">
                          <h2 class="sub-header">Recently Added</h2>
                          <div class="table-responsive">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Student #</th>
                                  <th>Name</th>
                                  <th>College</th>
                                  <th>Course</th>
                                  <th>Edit Details</th>
                                  <th>Advise</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>4115958</td>
                                  <td>Alejandre James Papina</td>
                                  <td>High School Department</td>
                                  <td>Science High School</td>
                                  <td><button type="button" class="btn btn-success">Edit</button></td>
                                  <td><button type="button" class="btn btn-primary">Advise</button></td>
                                </tr>
                                <tr>
                                  <td>4115958</td>
                                  <td>Alejandre James Papina</td>
                                  <td>High School Department</td>
                                  <td>Science High School</td>
                                  <td><button type="button" class="btn btn-success">Edit</button></td>
                                  <td><button type="button" class="btn btn-primary">Advise</button></td>
                                </tr>

                              </tbody>
                            </table>
                          </div>
                    </div>
                  </div>
            </div>
          </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>