
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
                        <div class="col-md-10"><h5 class="card-title "><?php echo $_GET['id'] == 'acs' ? 'Academic supervisor list' : 'Industrial supervisor list' ?> </h5></div>
                        <div class="col-md-2">  </div>
                      </div>


                      <!-- table -->
                      <table class="table datatables table-bordered table-hover" id="dataTable-1">
                        <thead>
                        
                          <tr>
                            <th></th>
                            <th class="text-primary">#</th>
                            <th class="text-primary">Position</th>
                            <th class="text-primary">Supervisor name</th>
                            <th class="text-primary">Phone number</th>
                            <th class="text-primary">
                                <?php echo $_GET['id'] == 'acs' ? 'Institute name' : 'Office name' ?>  
                            </th>
                            <th class="text-primary">Start date</th>
                            <th class="text-primary">End date</th>
                            <th class="text-primary">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                              $post = "";
                              
                              if ($_GET['id'] != 'acs') {

                                $post = $con->prepare("select asn.*, stu.firstName as first, stu.lastName as last, sup.*, req.*, po.position from assignedSupervisor asn JOIN request req ON  asn.requestID = req.requestID JOIN post po ON po.postID = req.postID JOIN student stu ON stu.regNo = req.studentID JOIN supervisor sup ON sup.employeeID = asn.industrialSupervisor where stu.regNo = ? order by id desc   ");

                              } else {

                                $post = $con->prepare("select asn.*, stu.firstName as first, stu.lastName as last, sup.*, req.*, po.position from assignedSupervisor asn JOIN request req ON  asn.requestID = req.requestID JOIN post po ON po.postID = req.postID JOIN student stu ON stu.regNo = req.studentID JOIN supervisor sup ON sup.employeeID = asn.academicSupervisor where stu.regNo = ? order by id desc   ");

                              }
                                $no = 1;
                                $post->execute(array($_SESSION['user']));
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
                            <td><?php echo ucwords($row->firstName." ".$row->lastName); ?></td>
                            <td><?php echo $row->phoneNumber; ?></td>
                            <td><?php echo $row->officeName; ?></td>
                            <td><?php echo $row->startDate; ?></td>
                            <td><?php echo $row->endDate; ?></td>
                            <td class="text-center">
                               <a href="../app/iptmsHandler.php?addReport=<?php echo $row->id; ?>" title="Add report" class=" btn btn-primary"><span class="fe fe-plus fe-16"></span></a>
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