
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
                        <h5 class="card-title text-center">My account </h5>
                        <form action="../app/iptmsHandler.php" method="post">
                          <div>
                            <label  class="col-form-label">First name:</label>
                            <input type="text" class="form-control" name="f" value="<?php echo $capture->firstName; ?>" >
                            <input type="hidden" class="form-control" name="s"  value="<?php echo $capture->employeeID; ?>" >

                          </div>
                          <div>
                            <label  class="col-form-label">Last name:</label>
                            <input type="text" class="form-control" name="l"   value="<?php echo $capture->lastName; ?>" >

                          </div>
                          <div>
                            <label  class="col-form-label">Phone number:</label>
                            <input type="text" class="form-control" name="p" value="<?php echo $capture->phoneNumber; ?>" >

                          </div>
                          <div>
                            <!-- <label  class="col-form-label">Office name:</label> -->
                            <input type="hidden" class="form-control" name="i"  value="<?php echo $capture->officeName; ?>" >

                          </div>
                          <div class="mt-3 mb-4">
                            <input type="submit" class="form-control btn btn-primary" name="addSupervisor"  value="Save">
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