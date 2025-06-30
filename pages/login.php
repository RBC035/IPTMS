<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>IPTMS - INDUSTRIAL PRACTICAL TRANING MANAGEMENT SYSTEM</title>
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- App CSS -->
    <link rel="stylesheet" href="../assets/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="../assets/css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="light ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="post" action="../app/iptmsHandler.php">
            <div class="card" style="box-shadow: 0 0 .5rem rgba(0, 0, 0, .2); ">
                <div class="card-body">
                    <h1 class="h6 mb-3 text-primary" style="font-family: initial; font-size:x-large">Sign in</h1>
                    <div class="form-group " style="text-align: left;">
                        <label  class="sr-only">Username</label>
                        <input type="text" name="username" class="form-control " placeholder="User name" required="" autofocus="">

                        <?php
                            if(isset($_GET['UndefinedUid']) && $_GET['UndefinedUid'] == $_GET['UndefinedUid']){
                        ?>
                            <small class="text-danger">User name was not recognize  </small>
                        <?php
                          }
                        ?>

                    </div>
                    <div class="form-group" style="text-align: left;">
                        <label class="sr-only">Password</label>
                        <input type="password" name="password" class="form-control " placeholder="Password" required="">

                        <?php
                            if(isset($_GET['UndefinedPsid']) && $_GET['UndefinedPsid'] == $_GET['UndefinedPsid']){
                        ?>
                            <small class="text-danger">Password was not recognize  </small>
                        <?php
                          }
                        ?>

                    </div>
                    <input type="submit" name="login" class="btn  btn-primary w-100" value="Let me in">
                    <p class="my-3 text-muted">© 2024</p>
                </div>
            </div>
        </form>
      </div>
    </div>

  </body>
</html>
</body>
</html>