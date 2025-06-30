<?php

    require_once 'dbConnection.php';

	class Login
	{
		protected $username;
		protected $password;
        private $con;

        function __construct($username, $password) {

            $this->con = DBConnection::getInstance()->getConnection();
    
            $this->username = trim($username);
            $this->password = trim($password);
        }

        
		protected function passwordVerify(){

            $id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());


			$user = $this->con->prepare("select * from userlog where username = ? ");
			$user->execute(array($this->username));
			if ($user->rowCount() > 0) {
				$fetch = $user->fetch(PDO::FETCH_OBJ);
				if (password_verify($this->password, $fetch->password)) {
					$_SESSION['user'] = $fetch->username;
					$_SESSION['role'] = $fetch->role;

					if ($_SESSION['role'] == 'Admin') 
					{
						header("location:../admin/");

					}
					if ($_SESSION['role'] == 'Academic Cordinator' || $_SESSION['role'] == 'Industrial Cordinator' || $_SESSION['role'] == 'Industrial Supervisor'  || $_SESSION['role'] == 'Academic Supervisor' || $_SESSION['role'] == 'Supervisor' ) 
					{
						header("location:../supervisor/");

					}
					if ($_SESSION['role'] == 'Student') 
					{
						header("location:../student/");

					}
                    else {

                        echo "<script>window.location='../pages/login.php?UndefinedUser=$id'</script>";
					}
				} else {

                    echo "<script>window.location='../pages/login.php?UndefinedPsid=$id'</script>";
				}
			} else {

                 echo "<script>window.location='../pages/login.php?UndefinedUid=$id'</script>";
			}
		}


/*

        protected function registerMain(){
            $query = $this->con->prepare("insert into userlog values (?,?,?) ");
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
			if ($query->execute([$this->username, $this->password, "Admin"])){

                echo" saved ...";
			} else {
				echo "Not saved .. ";
			}
        }
*/
	}