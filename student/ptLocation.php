
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
                      <table class='table table-bordered mb-0'>
                        <thead>
                            <tr>
                            <th class='text-center ' style="color:#000">Available Industrial Practical Location</th>
                            </tr>
                        </thead>
                     </table>
                      <table class='table table-bordered ' id="dataTable-1">
                        <thead>
                            <tr>
                            <th style="color:#000" width='90%'>Description</th>
                            <th style="color:#000">Post date</th>
                            </tr> 
                        </thead>
                        <tbody>
                        <?php 
                                $no = 1;
                                $post = $con->prepare("select * from post where status = ? order by postID desc ");
                                $post->execute(['Opening']);
                                while ($row = $post->fetch(PDO::FETCH_OBJ)) 
                                {
                        ?>
                            <tr>
                                <td>
                                    <p>
                                        <span style="color:#000">POSITION: </span>
                                        <small style="color:#000"><?php echo  $row->position."( $row->amount )"; ?>  </small>
                                    </p>
                                    <p>
                                        <span style="color:#000">Description: </span>
                                        <small style="color:#000"><?php echo $row->description; ?></small>
                                    </p>
                                    <p>
                                        <span style="color:#000">PT location: </span>
                                        <small style="color:#000"><?php echo $row->officeName; ?></small>
                                    </p>
                                </td>
                                <td>
                                    <p style="color:#000"><?php echo $row->postDate; ?></p>
                                    <p>
                                        <a href="postRequest.php?id=<?php echo $row->postID; ?>" class="btn btn-primary">Apply</a>
                                    </p>
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