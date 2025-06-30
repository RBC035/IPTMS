
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
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card " style="box-shadow: 0 0 .5rem rgba(0, 0, 0, .2); ">
                    <div class="card-body">
                      <div class="row mt-2 mb-4">
                        <div class="col-md-10"><h5 class="card-title ">View field requests </h5></div>
                        <div class="col-md-2">  </div>
                      </div>


                      <!-- table -->
                      <table class="table datatables table-bordered table-hover" id="dataTable-1">
                        <thead>
                        
                          <tr>
                            <th></th>
                            <th class="text-primary">#</th>
                            <th class="text-primary">Position</th>
                            <th class="text-primary">StudentID</th>
                            <th class="text-primary">Student name</th>
                            <th class="text-primary">Phone number</th>
                            <th class="text-primary">Institute name</th>
                            <th class="text-primary">Office name</th>
                            <th class="text-primary">Start date</th>
                            <th class="text-primary">End date</th>
                            <th class="text-primary">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                                $no = 1;
                                $post = $con->prepare("select r.*, p.* , s.* from request r JOIN post p ON r.postID = p.postID JOIN student s ON s.regNo = r.studentID where p.postID = ?  order by requestID  desc ");
                                $post->execute(array($_GET['i'],));
                                while ($row = $post->fetch(PDO::FETCH_OBJ)) 
                                {
                        ?>
                          <tr>
                            <td>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <label class="custom-control-label"></label>
                              </div>
                            </td>
                            <td><?php echo $no ; ?></td>
                            <td><?php echo $row->position; ?></td>
                            <td><?php echo $row->studentID; ?></td>
                            <td><?php echo ucwords($row->firstName." ".$row->lastName); ?></td>
                            <td><?php echo $row->phoneNumber; ?></td>
                            <td><?php echo $row->instituteName; ?></td>
                            <td><?php echo $row->officeName; ?></td>
                            <td><?php echo $row->startDate; ?></td>
                            <td><?php echo $row->endDate; ?></td>
                            <td>
                                <?php
                                    if ($row->statuss == "Pending") {
                                ?>
                                    <b  class="text-warning"><?php echo $row->statuss; ?></b>
                                <?php
                                    }else if ($row->statuss == "Accepted"){
                                ?>
                                    <b  class="text-success"><?php echo $row->statuss; ?></b>
                                <?php
                                    } else {
                                ?>
                                    <b  class="text-danger"><?php echo $row->statuss; ?></b> 
                                <?php
                                    }
                                ?>
                            </td>
                          </tr>
                        <?php $no +=1; } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->

        </div> <!-- .container-fluid -->

        <?php 
            include "inc/notofication.php";

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

    <script src='../assets/js/jquery.dataTables.min.js'></script>
    <script src='../assets/js/dataTables.bootstrap4.min.js'></script>
    <script>
      $('#dataTable-1').DataTable(
      {
        autoWidth: true,
        "lengthMenu": [
          [5, 10, 15,20, -1],
          [5, 10, 15,20, "All"]
        ]
      });
    </script>
   
  </body>
</html>