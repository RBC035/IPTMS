
<?php  
    include "inc/header.php";
?>
  <body class="vertical  light  ">
    <div class="wrapper">
     <?php 
        include "inc/topHeader.php";

        include "inc/sideBar.php";
     ?>

<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
             
              <div class="row my-4">
                <div class="col-md-3"></div>
                <!-- Small table -->
                <div class="col-md-5">
                  <div class="card " style="box-shadow: 0 0 .5rem rgba(0, 0, 0, .2); ">
                    <div class="card-body">
                        <h5 class="card-title text-center">Assigned supervisor </h5>
                        <form method="post" action="../app/iptmsHandler.php">
                          <div>
                            <label  class="col-form-label">Select supervisor:</label>
                            <select name="suid" class="form-control" >
                                <option value="Null">Select supervisor</option>
                                <?php 
                                       $supervisor = $con->prepare("select * from supervisor where employeeID != ? && 	officeName = ? ");
                                       $supervisor->execute(array($capture->employeeID, $capture->officeName));
                                       while ($row = $supervisor->fetch(PDO::FETCH_OBJ)) 
                                       {
                                ?>
                                        <option value="<?php echo $row->employeeID; ?>"><?php echo ucwords($row->firstName." ".$row->lastName); ?></option>
                                <?php } ?>
                            </select>
                            <?php
                                    if(isset($_GET['fill']) && $_GET['fill'] == $_GET['fill']){
                              ?>
                                    <small class="text-danger" >Please select supervisor </small>
                              <?php
                                    }
                              ?>
                            <input type="hidden" class="form-control" name="rid" value="<?php echo $_GET['rid']; ?>" >
                            <input type="hidden" class="form-control" name="stid" 
                              value="<?php echo @$_GET['stid'] ? $_GET['stid'] : ''; ?>"  
                            >

                          </div>

                          <div class="mt-3 mb-4">
                            <input type="submit" class="form-control btn btn-primary" name="assignedSupervisor"  value="Save">
                          </div>
                        </form>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->

        </div> <!-- .container-fluid -->

        <?php 
            include "inc/notification.php";

            include "inc/shortcut.php";
        ?>

      </main> <!-- main -->

    </div> <!-- .wrapper -->

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>

    <script src="../assets/js/apps.js"></script>
   
  </body>
</html>