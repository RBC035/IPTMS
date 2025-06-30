
<?php  
    include "inc/header.php";
?>
  <body class="vertical  light  ">
    <div class="wrapper">
     <?php 
        include "inc/topHeader.php";

        include "inc/sideBar.php";
        $idn = @$_GET['edit'];
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
                        <h5 class="card-title text-center"><?php echo  $idn ? "Change post detials" : "Register post" ?>  </h5>
                        <form method="post" action="../app/iptmsHandler.php">
                          <div>
                            <label  class="col-form-label">Position:</label>
                            <input type="text" class="form-control" name="p" 
                              <?php echo $idn ? ' value = "'.$_GET['po'].'" ' : ' placeholder="Enter position" '; ?>
                            >
                            <input type="hidden" class="form-control" name="pi"  
                               <?php echo $idn ? ' value = "'.$_GET['pi'].'" ' : ' value="" '; ?>
                            >

                            <?php
                                    if(isset($_GET['p']) && $_GET['p'] == $_GET['p']){
                              ?>
                                    <small class="text-danger" >Please enter position </small>
                              <?php
                                    }
                              ?>

                          </div>
                          <div>
                            <label  class="col-form-label">Amount:</label>
                            <input type="number" class="form-control" name="a"  
                              <?php echo $idn ? ' value = "'.$_GET['am'].'" ' : ' placeholder="Enter amount" '; ?>
                            >

                            <?php
                                    if(isset($_GET['a']) && $_GET['a'] == $_GET['a']){
                              ?>
                                    <small class="text-danger" >Please enter amount </small>
                              <?php
                                    }
                              ?>

                          </div>
                          <div>
                            <label  class="col-form-label">End date:</label>
                            <?php if($idn){ ?>
                              <input type="datetime" class="form-control" name="d" value="<?php echo $_GET['d']; ?>" >
                            <?php } else { ?>
                             <input type="date" class="form-control" name="d"  >
                            <?php }?>

                          </div>
                          <div>
                        
                            <input type="hidden" class="form-control" name="o"  value="<?php echo $capture->officeName; ?>">

                          </div>
                          <div>
                            <label  class="col-form-label">Descriptions:</label>
                            <textarea name="desc" rows="5" class="form-control" style="text-align: left;"><?php echo $idn ? $_GET['desc'] : 'Enter post description '; ?> </textarea>
                          </div>
                          <div class="mt-3 mb-4">
                            <input type="submit" class="form-control btn btn-primary" name="addPost"  value="Save">
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