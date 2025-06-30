<?php

	include_once 'User.php';

	class CreateUser extends User
	{
		private $id;
		
		
		function __construct($firstName, $lastName, $phoneNumber,  $userID, $instituteName)
		{
			parent:: __construct($firstName, $lastName, $phoneNumber,  $userID, $instituteName);
		}

		

		public function addStudent(){
			$this->id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());
				
				if ($this->firstName() == false) 
				{
					if($_SESSION['role'] === "Admin"){
						echo "<script>window.location='../admin/registerStudent.php?fn=$this->id'</script>";
					} else {
						echo "<script>window.location='../supervisor/registerStudent.php?fn=$this->id'</script>";
					}

					exit();
				}

				if ($this->lastName() == false) 
				{
					if($_SESSION['role'] === "Admin"){
						echo "<script>window.location='../admin/registerStudent.php?ln=$this->id'</script>";
					} else {
						echo "<script>window.location='../supervisor/registerStudent.php?ln=$this->id'</script>";
					}
					
					exit();
				}
				if ($this->phoneNumber() == false) 
				{
					if($_SESSION['role'] === "Admin"){
						echo "<script>window.location='../admin/registerStudent.php?phone=$this->id'</script>";
					} else {
						echo "<script>window.location='../supervisor/registerStudent.php?phone=$this->id'</script>";
					}

					exit();
				}

				if ($this->instituteName() == false) 
				{
					if($_SESSION['role'] === "Admin"){
						echo "<script>window.location='../admin/registerStudent.php?office=$this->id'</script>";
					} else {
						echo "<script>window.location='../supervisor/registerStudent.php?office=$this->id'</script>";
					}
	
					exit();
				}


				if ($this->userID == "") {
					$this->studentCheck();
				} else {
					$this->updateStudent();
				}

		} 

		 public function addSupervisor(){

			$this->id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());
				
			
			if ($this->firstName() == false) 
			{
				echo "<script>window.location='../admin/registerSupervisor.php?fn=$this->id'</script>";
				exit();
			}

			if ($this->lastName() == false) 
			{
				echo "<script>window.location='../admin/registerSupervisor.php?ln=$this->id'</script>";
				exit();
			}
			if ($this->phoneNumber() == false) 
			{
				echo "<script>window.location='../admin/registerSupervisor.php?phone=$this->id'</script>";
				exit();
			}

			if ($this->instituteName() == false) 
			{
				echo "<script>window.location='../admin/registerSupervisor.php?office=$this->id'</script>";
				exit();
			}

			if ($this->userID == "") {
				$this->supervisorCheck();
			} else {
				$this->updateSupervisor();
			}

		}

		public function modifyPrivilage(){

			$this->updatePrivilage();
		}

		private function firstName()
		{
			$result = "" ;
			if (empty($this->firstName)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function instituteName()
		{
			$result = "" ;
			if ($this->instituteName == "") 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function lastName()
		{
			$result = "" ;
			if (empty($this->lastName)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function phoneNumber()
		{
			$result = "" ;
			if (empty($this->phoneNumber)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

	}


	//  change password

	class MyPassword extends Credintial{
		function __construct($currentPassword, $newPassword, $confirmPassword)
		{
			parent::__construct($currentPassword, $newPassword, $confirmPassword);
		}

		public function changePassword(){
            $id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());

			if ($this->currentPassword() == false) 
			{
				if($_SESSION['role'] === "Admin"){
					echo "<script>window.location='../admin/changePassword.php?cuPs=$id'</script>";

				} 

				if($_SESSION['role'] === "Student"){
					echo "<script>window.location='../student/changePassword.php?cuPs=$id'</script>";

				} else {
					echo "<script>window.location='../supervisor/changePassword.php?cuPs=$id'</script>";
				}

				exit();
			}
			if ($this->newPassword() == false) 
			{
				if($_SESSION['role'] === "Admin"){
					echo "<script>window.location='../admin/changePassword.php?nwPs=$id'</script>";
				} 
				 if($_SESSION['role'] === "Student"){
					echo "<script>window.location='../student/changePassword.php?nwPs=$id'</script>";
				}  else {
					echo "<script>window.location='../supervisor/changePassword.php?nwPs=$id'</script>";

				}
				exit();
			}
			if ($this->confirmPassword() == false) 
			{
				if($_SESSION['role'] === "Admin"){
					echo "<script>window.location='../admin/changePassword.php?coPs=$id'</script>";
				}
				 if($_SESSION['role'] === "Student"){
					echo "<script>window.location='../student/changePassword.php?coPs=$id'</script>";
				} else {
					echo "<script>window.location='../supervisor/changePassword.php?coPs=$id'</script>";
				}

				exit();
			}

			$this->modifyPassword();
		}

		private function currentPassword()
		{
			$result = "" ;
			if (empty($this->currentPassword)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function newPassword()
		{
			$result = "" ;
			if (empty($this->newPassword)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function confirmPassword()
		{
			$result = "" ;
			if (empty($this->confirmPassword)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}
	}
