<?php 

	class Request
	{
		protected $requestId;
		protected $postID;
		protected $startDate;
        protected $endDate;

		private $con;
        private $id;

		
		function __construct($postID, $startDate, $endDate, $requestId)
		{
            $this->con = DBConnection::getInstance()->getConnection();

			$this->requestId = trim($requestId);
			$this->postID = trim($postID);
			$this->startDate = trim($startDate);
			$this->endDate = trim($endDate);

            $this->id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());
		}

        protected function checkRequest(){

            $select = $this->con->prepare("select * from  request where studentID = ? && postID = ? ");
			$select->execute(array($_SESSION['user'],$this->postID));
			if ($select->rowCount() > 0) {
					echo "<script>window.location='../student/manageRequest.php'</script>";
			} else {
				$this->registerRequest();
			}
        }

		

		protected function removeRequest(){

			$delete = $this->con->prepare("delete from request  where requestID  = ? ");
			if ($delete->execute([$this->requestId])) {
	
					header("location:../student/manageRequest.php?success=1");

            } else {
					header("location:../student/manageRequest.php?fail=1");

            }
		}

		protected function assignedSupervisor(){
			
			if ($_SESSION['role'] == "Industrial Cordinator") {

				$update = $this->con->prepare("update request set statuss = ?   where requestID  = ? ");
				$update->execute(["Accepted" , $this->requestId]);

				$query = $this->con->prepare("insert into assignedSupervisor (requestID ,industrialSupervisor,academicSupervisor ) values (?,?,?) ");

				if ($query->execute([$this->requestId, $this->postID, "academicSupervisor"])){
				echo "<script>window.location='../supervisor/assignedSupervisor.php'</script>";
				} else {
					header("location:../supervisor/acceptedRequest.php?rid=$this->requestId&stid=$this->endDate");
				}
				
			}else {

				$select = $this->con->prepare("select 	id from assignedSupervisor  where requestID  = ? ");
				$select->execute([$this->requestId]);
				$fetch = $select->fetch(PDO::FETCH_OBJ);

				$update = $this->con->prepare("update assignedSupervisor set academicSupervisor = ?  where id  = ? ");
				if ($update->execute([ $this->postID, $fetch->id])) {
					echo "<script>window.location='../supervisor/assignedSupervisor.php'</script>";
				}else {
					header("location:../supervisor/acceptedRequest.php?rid=$this->requestId");
				}
			}

		}

        private function registerRequest(){

            $query = $this->con->prepare("insert into request (studentID, postID, startDate , endDate) values (?,?,?,?) ");
			if ($query->execute([$_SESSION['user'], $this->postID,  $this->startDate, $this->endDate ])){
					echo "<script>window.location='../student/manageRequest.php'</script>";
			} else {

					header("location:../student/postRequest.php?id=$this->postID");
			}
		}

	}