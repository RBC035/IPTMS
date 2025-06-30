
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
                        <div class="col-md-10"><h5 class="card-title ">Manage posts </h5></div>
                        <div class="col-md-2">
                            <a href="registerPost.php" class="btn mb-2 btn-outline-primary" title="Register student">Add post</a>
                        </div>
                      </div>


                      <!-- table -->
                      <table class="table datatables table-bordered table-hover" id="dataTable-1">
                        <thead>
                        
                          <tr>
                            <th></th>
                            <th class="text-primary">#</th>
                            <th class="text-primary">Position</th>
                            <th class="text-primary">Amount</th>
                            <th class="text-primary">Descriptions</th>
                            <th class="text-primary">Start date</th>
                            <th class="text-primary">End date</th>
                            
                            <th class="text-primary">Office name</th>
                            <th class="text-primary">Edit</th>
                            <th class="text-primary">Request</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                                $no = 1;
                                $post = $con->prepare("select * from post where officeName = ? order by postID desc ");
                                $post->execute(array($capture->officeName));
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
                            <td><?php echo $row->amount; ?></td>
                            <td><?php echo $row->description; ?></td>
                            <td><?php echo $row->postDate; ?></td>
                            <td><?php echo $row->endDate; ?></td>
                            <td><?php echo $row->officeName; ?></td>
                            <td class="text-center">
                                <a href="registerPost.php?edit=<?php echo $id; ?>&pi=<?php echo $row->postID; ?> &po=<?php echo $row->position; ?> &am=<?php echo $row->amount; ?>&desc=<?php echo $row->description; ?>&d=<?php echo $row->endDate; ?>" title="change post details" class=" btn btn-primary"><span class="fe fe-edit fe-16"></span></a>

                            </td>
                            <td class="text-center">

                                <a href="manageRequest.php?i=<?php echo $row->postID; ?>" title="view request" class=" btn btn-success text-white"><span class="fe fe-mail fe-16"></span></a>

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