
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
                        <div class="col-md-10"><h5 class="card-title ">Manage students </h5></div>
                        <div class="col-md-2">
                            <a href="registerStudent.php" class="btn mb-2 btn-outline-primary" title="Register student">Add student</a>
                        </div>
                      </div>


                      <!-- table -->
                      <table class="table datatables table-bordered table-hover" id="dataTable-1">
                        <thead>
                          <tr >
                            <th></th>
                            <th class="text-primary">#</th>
                            <th class="text-primary">Student ID</th>
                            <th class="text-primary">Full name</th>
                            <th class="text-primary">Phone number</th>
                            <th class="text-primary">Institute name</th>
                            <th class="text-primary text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                                $no = 1;
                                $student = $con->prepare("select * from student ");
                                $student->execute();
                                while ($row = $student->fetch(PDO::FETCH_OBJ)) 
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
                                  <td><?php echo $row->regNo; ?></td>
                                  <td><?php echo ucwords($row->firstName." ".$row->lastName); ?></td>
                                  <td><?php echo $row->phoneNumber; ?></td>
                                  <td><?php echo ucwords($row->instituteName); ?></td>
                                  
                                  <td class="text-center">
                                      <a href="registerStudent.php?edit=<?php echo $id; ?>&r=<?php echo $row->regNo; ?> &f=<?php echo $row->firstName; ?> &l=<?php echo $row->lastName; ?>&p=<?php echo $row->phoneNumber; ?>&i=<?php echo $row->instituteName; ?>" title="change student details" class=" btn btn-primary"><span class="fe fe-user-check fe-16"></span></a>
                                      <a href="#" class="btn btn-info ml-2"><span class="fe fe-plus fe-16"></span></a>
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