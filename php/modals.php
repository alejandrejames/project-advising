<!--New Student-->
<div class="modal fade" id="newstudentmodal" tabindex="-1" role="dialog" aria-labelledby="newstudentmodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="php/addstudent.php" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add New Student Record</h4>
        </div>
        <div class="modal-body">
           <div class="container">
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="inputid">Student No.</label>
                            <input type="text" class="form-control" id="inputstudno" name="inputstudno" placeholder="Student number" required>
                        </div>
                        <div class="col-md-3">
                            <label for="inputlname">Last Name</label>
                            <input type="text" class="form-control" id="inputlname" name="inputlname" placeholder="First Name" required>
                        </div>
                        <div class="col-md-3">
                            <label for="inputfname">First Name</label>
                            <input type="text" class="form-control" id="inputfname" name="inputfname" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="inputdepartm">College/Department</label>
                        <select class="form-control" id="inputdepartm" name="inputdepartm" onchange="chgcourse()">
                            <?php
                                $sql = "SELECT * FROM college";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                    echo '
                                        <option value="'.$row['college_id'].'">'.$row['college_name'].'</option>
                                        ';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputcourse">Course</label>
                        <select class="form-control" id="inputcourse" name="inputcourse">
                            <?php
                                $sql = "SELECT * FROM course WHERE college_id='1'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                    echo '<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="inputyrlvl">Year Level</label>
                        <select class="form-control" id="inputyrlvl" name="inputyrlvl">
                            <option>1st</option>
                            <option>2nd</option>
                            <option>3rd</option>
                            <option>4th</option>
                            <option>5th</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputsyr">School Year</label>
                        <select class="form-control" id="inputsyr" name="inputsyr">
                            <option>2015-2016</option>
                            <option>2017-2018</option>
                            <option>2018-2019</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputstatus">Academic Status</label>
                        <select class="form-control" id="inputstatus" name="inputstatus">
                            <option>Old</option>
                            <option>New</option>
                            <option>Transferee</option>
                            <option>Returning</option>
                        </select>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!--New Subject-->
<div class="modal fade" id="newsubjectmodal" tabindex="-1" role="dialog" aria-labelledby="newstudentmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="php/addsubject.php" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add New Subject</h4>
        </div>
        <div class="modal-body">
           <div class="container-fluid">
                    <div class="col-md-4">
                        <label for="inputsubcode">Subject Code</label>
                        <input type="text" class="form-control" id="inputsubcode" name="inputsubcode" placeholder="Subject Code" required>
                    </div>
                    <div class="col-md-8">
                        <label for="inputlname">Subject Description</label>
                        <input type="text" class="form-control" id="inputsubdesc" name="inputsubdesc" placeholder="Description" required>
                    </div>
                <div class="col-md-5">
                        <label for="inputunits">Units</label>
                        <input type="number" class="form-control" id="inputunits" name="inputunits" placeholder="Units" required>
                </div>
           </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Subject</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!--New Course-->
<div class="modal fade" id="newcoursemodal" tabindex="-1" role="dialog" aria-labelledby="newstudentmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="php/addcourse.php" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add New Curriculum</h4>
        </div>
        <div class="modal-body">
           <div class="container-fluid">
                <div class="col-md-12">
                    <label for="inputcoursename">Curriculum Title</label>
                    <input type="text" class="form-control" id="inputcoursename" name="inputcoursename" placeholder="Title">
                </div>
                <div class="col-md-10">
                    <label for="inputcoursecollege">College</label>
                    <select class="form-control" id="inputcoursecollege" name="inputcoursecollege">
                        <?php
                            $sql = "SELECT * FROM college";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()){
                                echo '<option value="'.$row['college_id'].'">'.$row['college_name'].'</option>';
                            }

                        ?>
                    </select>
                </div>
           </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Add Curriculum</button>
        </div>
    </form>
    </div>
  </div>
</div>