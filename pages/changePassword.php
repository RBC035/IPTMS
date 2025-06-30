

<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
             
              <div class="row my-4">
                <div class="col-md-3"></div>
                <!-- Small table -->
                <div class="col-md-5">
                  <div class="card " style="box-shadow: 0 0 .5rem rgba(0, 0, 0, .2); ">
                    <div class="card-body">
                        <h5 class="card-title text-center">Change password </h5>
                        <form method="post" action="../app/iptmsHandler.php">
                          <div>
                            <label  class="col-form-label">Current password:</label>
                            <input type="password" class="form-control" name="o"  placeholder="Enter current password">

                            <?php
                                    if(isset($_GET['cuPs']) && $_GET['cuPs'] == $_GET['cuPs']){
                              ?>
                                    <small class="text-danger" >Please enter current password </small>
                              <?php
                                    }

                                    if(isset($_GET['notCuPs']) && $_GET['notCuPs'] == $_GET['notCuPs']){
                              ?>
                                    <small class="text-danger" >Current password does not match </small>
                              <?php
                                    }
                              ?>

                          </div>
                          <div>
                            <label  class="col-form-label">New password:</label>
                            <input type="password" class="form-control" name="n"  placeholder="Enter new password">

                            <?php
                                    if(isset($_GET['nwPs']) && $_GET['nwPs'] == $_GET['nwPs']){
                              ?>
                                    <small class="text-danger" >Please enter new password </small>
                              <?php
                                    }

                                    if(isset($_GET['notNwPs']) && $_GET['notNwPs'] == $_GET['notNwPs']){
                              ?>
                                    <small class="text-danger" >New password does not match to confirm password   </small>
                              <?php
                                    }
                              ?>

                          </div>
                          <div>
                            <label  class="col-form-label">Confirm password</label>
                            <input type="password" class="form-control" name="c"  placeholder="Enter confirm password">

                            <?php
                                    if(isset($_GET['coPs']) && $_GET['coPs'] == $_GET['coPs']){
                              ?>
                                    <small class="text-danger" >Please enter confirm password </small>
                              <?php
                                    }
                              ?>

                             
                          </div>
                          <div class="mt-3 mb-4">
                            <input type="submit" class="form-control btn btn-primary" name="changePassword"  value="Save">
                          </div>
                        </form>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->

        </div> <!-- .container-fluid -->