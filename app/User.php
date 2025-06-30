<?php 

	class User
	{
		protected $userID;
		protected $firstName;
		protected $lastName;
		protected $phoneNumber;
		protected $instituteName;

		private $con;
        private $id;

		
		function __construct($firstName, $lastName, $phoneNumber,  $userID, $instituteName)
		{
            $this->con = DBConnection::getInstance()->getConnection();

			$this->userID = trim($userID);
			$this->firstName = trim($firstName);
			$this->lastName = trim($lastName);
			$this->phoneNumber = trim($phoneNumber);
			$this->instituteName = trim($instituteName);

            $this->id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());
		}

		protected function studentCheck(){
			$first01 = $this->firstName[0];
			$second01 = $this->firstName[1];
			$first02 = $this->lastName[0];
			$second02 = $this->lastName[1];

			$numbers = "12341234567890123455678901234561234123456789785678901234567890";
			$sub =  substr(str_shuffle($numbers), 0,6);
			$this->userID = strtoupper($first01.$second01.$first02.$second02."st").$sub;
			
			$select = $this->con->prepare("select * from student where regNo = ? ");
			$select->execute(array($this->userID));
			if ($select->rowCount() > 0) {

				if($_SESSION['role'] === "Admin"){
					echo "<script>window.location='../admin/manageStudent.php'</script>";
				} else {
					echo "<script>window.location='../supervisor/manageStudent.php'</script>";
				}

			} else {
				$this->studnetRegister();
			}
 
		}

		protected function updateStudent(){
	
			$update = $this->con->prepare("update student set firstName = ? ,  lastName = ? ,phoneNumber = ? , instituteName = ?  where regNo  = ? ");
			if ($update->execute([$this->firstName,  $this->lastName, $this->phoneNumber ,  $this->instituteName , $this->userID])) {
				
				if($_SESSION['role'] === "Admin"){
					header("location:../admin/manageStudent.php?success=1");
				} else if($_SESSION['role'] === "Student"){
					header("location:../student/account.php?success=1");
				} else {
					header("location:../supervisor/manageStudent.php?success=1");
				}

            } else {
				
                if($_SESSION['role'] === "Admin"){
					header("location:../admin/manageStudent.php?fail=1");
				}  else if($_SESSION['role'] === "Student"){
					header("location:../student/account.php?success=1");
				} else {
					header("location:../supervisor/manageStudent.php?fail=1");
				}
            }

		}

		protected function supervisorCheck(){
			$first01 = $this->firstName[0];
			$second01 = $this->firstName[1];
			$first02 = $this->lastName[0];
			$second02 = $this->lastName[1];

			$numbers = "12341234567890123455678901234561234123456789785678901234567890";
			$sub =  substr(str_shuffle($numbers), 0,6);
			$this->userID = strtoupper($first01.$second01.$first02.$second02."sp").$sub;

			$select = $this->con->prepare("select * from supervisor where employeeID = ? ");
			$select->execute(array($this->userID));
			if ($select->rowCount() > 0) {
				if($_SESSION['role'] === "Admin"){
					echo "<script>window.location='../admin/manageSupervisor.php'</script>";
				}else {
					echo "<script>window.location='../supervisor/manageSupervisor.php'</script>";
				}

			} else {
				$this->supervisorRegister();
			}
		}

		protected function updateSupervisor(){
			$update = $this->con->prepare("update supervisor set firstName = ? ,  lastName = ? ,phoneNumber = ? , officeName = ?  where employeeID  = ? ");
			if ($update->execute([$this->firstName,  $this->lastName, $this->phoneNumber ,  $this->instituteName , $this->userID])) {
				
				if($_SESSION['role'] === "Admin"){
					header("location:../admin/manageSupervisor.php?success=1");
				}else {
					header("location:../supervisor/manageSupervisor.php?success=1");
				}

            } else {
				
                if($_SESSION['role'] === "Admin"){
					header("location:../admin/manageSupervisor.php?fail=1");
				}else {
					header("location:../supervisor/manageSupervisor.php?fail=1");
				}
            }
		}

		protected function  updatePrivilage(){

			$update = $this->con->prepare("update userlog set role = ?   where username  = ? ");
			if ($update->execute([$this->instituteName , $this->userID])) {

				if($_SESSION['role'] === "Admin"){
					header("location:../admin/manageSupervisor.php?success=2");
				} else {
					header("location:../supervisor/manageSupervisor.php?success=2");
				}

            } else {

				if($_SESSION['role'] === "Admin"){
					header("location:../admin/manageSupervisor.php?fail=2");
				} else {
					header("location:../supervisor/manageSupervisor.php?fail=2");
				}

            }

		}

		private function studnetRegister(){

			$query = $this->con->prepare("insert into student values (?,?,?,?,?) ");
			if ($query->execute([$this->userID, $this->firstName, $this->lastName, $this->phoneNumber, $this->instituteName])){

				$ps = password_hash($this->userID, PASSWORD_DEFAULT);
				$sql = $this->con->prepare("insert into userlog values (:id,:ps,:st)");
				$sql->execute(array('id' => $this->userID, 'ps'=> $ps, 'st' => 'Student'));

				if($_SESSION['role'] === "Admin"){
					echo "<script>window.location='../admin/manageStudent.php'</script>";
				} else {
					echo "<script>window.location='../supervisor/manageStudent.php'</script>";
				}

			} else {

				if($_SESSION['role'] === "Admin"){
					header("location:../admin/registerStudent.php");
				} else {
					header("location:../supervisor/registerStudent.php");
				}	
			}
		}

		private function supervisorRegister(){
			

			$query = $this->con->prepare("insert into supervisor values (?,?,?,?,?) ");
			if ($query->execute([$this->userID, $this->firstName, $this->lastName, $this->phoneNumber, $this->instituteName])){
				
				$status = '';

				if ($_SESSION['role'] == 'Academic Cordinator') {
					$status = 'Academic Supervisor';
				} 
				else if ($_SESSION['role'] == 'Industrial Cordinator') {
					$status = 'Industrial Supervisor';
				} else {
					$status = 'Supervisor';
				}

				$ps = password_hash($this->userID, PASSWORD_DEFAULT);
				$sql = $this->con->prepare("insert into userlog values (:id,:ps,:st)");
				$sql->execute(array('id' => $this->userID, 'ps'=> $ps, 'st' => $status));

				if($_SESSION['role'] === "Admin"){
					echo "<script>window.location='../admin/manageSupervisor.php'</script>";
				} else {
					echo "<script>window.location='../supervisor/manageSupervisor.php'</script>";
				}	

			} else {

				if($_SESSION['role'] === "Admin"){
					header("location:../admin/registerSupervisor.php");
				} else {
					header("location:../supervisor/registerSupervisor.php");
				}	

			}
		}

	}

	//  change password

	class Credintial{
		protected $currentPassword;
		protected $newPassword;
		protected $confirmPassword;

		private $con;
        private $id;

		function __construct($currentPassword, $newPassword, $confirmPassword){
			$this->con = DBConnection::getInstance()->getConnection();

			$this->currentPassword = trim($currentPassword);
			$this->newPassword = trim($newPassword);
			$this->confirmPassword = trim($confirmPassword);
		}

		protected function modifyPassword(){
			$this->passwordVerify();
		}


		private function passwordVerify(){

			$id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());

			$user = $this->con->prepare("select * from userlog where username = ?");
            $user->execute([$_SESSION['user']]);
            $row = $user->fetch(PDO::FETCH_OBJ); 

			if (password_verify($this->currentPassword, $row->password)){
				if ($this->newPassword === $this->confirmPassword) {
					$hash = password_hash($this->newPassword, PASSWORD_DEFAULT);
					$update = $this->con->prepare("update userlog set password = ? where username = ? ");

					if ($update->execute([$hash, $_SESSION['user']])) {

						if($_SESSION['role'] === "Admin"){
							echo "<script>window.location='../admin/changePassword.php?success=$id'</script>";
						} 
						else if($_SESSION['role'] === "Student"){
							echo "<script>window.location='../student/changePassword.php?success=$id'</script>";
						}else {
							echo "<script>window.location='../supervisor/changePassword.php?success=$id'</script>";
						}

					} else {

						if($_SESSION['role'] === "Admin"){
							echo "<script>window.location='../admin/changePassword.php'</script>";
						}

						else if($_SESSION['role'] === "Student"){
							echo "<script>window.location='../student/changePassword.php'</script>";
						} else {
							echo "<script>window.location='../supervisor/changePassword.php'</script>";
						}

					}
				} else {
					if($_SESSION['role'] === "Admin"){

						echo "<script>window.location='../admin/changePassword.php?notNwPs=$id'</script>";
					} 
					else if($_SESSION['role'] === "Student"){
						echo "<script>window.location='../student/changePassword.php?notNwPs=$id'</script>";
						
					} else {
						echo "<script>window.location='../supervisor/changePassword.php?notNwPs=$id'</script>";
					}

				}
			} else {

				if($_SESSION['role'] === "Admin"){
					echo "<script>window.location='../admin/changePassword.php?notCuPs=$id'</script>";
				} 
				
				else if($_SESSION['role'] === "Student"){
					echo "<script>window.location='../student/changePassword.php?notCuPs=$id'</script>";

				} else {
					echo "<script>window.location='../supervisor/changePassword.php?notCuPs=$id'</script>";
				}
				
			}
		}

	}