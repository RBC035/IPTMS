
<?php 
    $account = $con->prepare("select * from supervisor where employeeID = :empID ");
    $account->execute(['empID' => $_SESSION['user']]);
    $capture = $account->fetch(PDO::FETCH_OBJ);

    $fieldAssigned =  $con->prepare("select * from assignedSupervisor ");
    $fieldAssigned->execute();
    $assigned1 = $fieldAssigned->fetch(PDO::FETCH_OBJ);
?>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./">
             
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item">
              <a href="./"  class=" nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard </span><span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
          <?php
                if ($_SESSION['role'] == "Industrial Cordinator" || $_SESSION['role'] == "Academic Cordinator") {
          ?>
              <li class="nav-item dropdown">
                  <a href="#manage-users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-box fe-16"></i>
                    <span class="ml-3 item-text">Manage users</span>
                  </a>
                  <ul class="collapse list-unstyled pl-4 w-100" id="manage-users">
                  <?php
                        if ($_SESSION['role'] == "Academic Cordinator") {
                  ?>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="manageStudent.php"><span class="ml-1 item-text">Manage student</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link pl-3" href="viewRequest.php"><span class="ml-1 item-text">View field request</span></a>
                    </li>
                  <?php } ?>

                    <li class="nav-item">
                      <a class="nav-link pl-3" href="manageSupervisor.php"><span class="ml-1 item-text">Manage supervisor</span>
                      </a>
                    </li>

                  </ul>
                </li>

                <?php
                  if ($_SESSION['role'] == "Industrial Cordinator") {
              ?>
                  <li class="nav-item w-100">
                    <a class="nav-link" href="managePost.php">
                      <i class="fe fe-layers fe-16"></i>
                      <span class="ml-3 item-text">Manage posts</span>
                    </a>
                  </li>
              <?php
                  }
              ?>

                <li class="nav-item w-100">
                  <a class="nav-link" href="assignedSupervisor.php">
                    <i class="fe fe-layers fe-16"></i>
                    <span class="ml-3 item-text">Manage assign</span>
                  </a>
              </li>
          <?php
                }
          ?>
          <?php 
              if ($assigned1->industrialSupervisor == $_SESSION['user'] || $assigned1->academicSupervisor == $_SESSION['user']) {
          ?>
            <li class="nav-item w-100">
                  <a class="nav-link" href="fieldStudent.php">
                    <i class="fe fe-layers fe-16"></i>
                    <span class="ml-3 item-text">Student list</span>
                  </a>
              </li>
          <?php
              }
          ?>

            <li class="nav-item dropdown">
              <a href="#settings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-settings fe-16"></i>
                <span class="ml-3 item-text">Settings</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="settings">
              <li class="nav-item">
                  <a class="nav-link pl-3" href="account.php"><span class="ml-1 item-text">My account</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="changePassword.php"><span class="ml-1 item-text">Change password</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="../pages/logOut.php"><span class="ml-1 item-text">Log out</span></a>
                </li>
              </ul>
            </li>
          </ul>

        </nav>
      </aside>