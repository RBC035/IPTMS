<?php 

	class Report
	{
		protected $reportId;
		protected $assignedId;
		protected $task;

		private $con;
        private $id;

		
		function __construct($assignedId, $task, $reportId)
		{
            $this->con = DBConnection::getInstance()->getConnection();

			$this->reportId = trim($reportId);
			$this->assignedId = trim($assignedId);
			$this->task = trim($task);

            $this->id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());
		}

        protected function checkReport(){
            echo "check report first";

            // $select = $this->con->prepare("select * from  request where studentID = ? && assignedId = ? ");
			// $select->execute(array($_SESSION['user'],$this->assignedId));
			// if ($select->rowCount() > 0) {
			// 		echo "<script>window.location='../student/manageRequest.php'</script>";
			// } else {
			// 	$this->registerRequest();
			// }
        }

		

		protected function removeRequest(){
            

			// $delete = $this->con->prepare("delete from request  where reportId  = ? ");
			// if ($delete->execute([$this->reportId])) {
	
			// 		header("location:../student/manageRequest.php?success=1");

            // } else {
			// 		header("location:../student/manageRequest.php?fail=1");

            // }
		}

		protected function assignedSupervisor(){
			
			// if ($_SESSION['role'] == "Industrial Cordinator") {

			// 	$update = $this->con->prepare("update request set statuss = ?   where reportId  = ? ");
			// 	$update->execute(["Accepted" , $this->reportId]);

			// 	$query = $this->con->prepare("insert into assignedSupervisor (reportId ,industrialSupervisor,academicSupervisor ) values (?,?,?) ");

			// 	if ($query->execute([$this->reportId, $this->assignedId, "academicSupervisor"])){
			// 	echo "<script>window.location='../supervisor/assignedSupervisor.php'</script>";
			// 	} else {
			// 		header("location:../supervisor/acceptedRequest.php?rid=$this->reportId&stid=$this->");
			// 	}
				
			// }else {

			// 	$select = $this->con->prepare("select 	id from assignedSupervisor  where reportId  = ? ");
			// 	$select->execute([$this->reportId]);
			// 	$fetch = $select->fetch(PDO::FETCH_OBJ);

			// 	$update = $this->con->prepare("update assignedSupervisor set academicSupervisor = ?  where id  = ? ");
			// 	if ($update->execute([ $this->assignedId, $fetch->id])) {
			// 		echo "<script>window.location='../supervisor/assignedSupervisor.php'</script>";
			// 	}else {
			// 		header("location:../supervisor/acceptedRequest.php?rid=$this->reportId");
			// 	}
			// }

		}

        private function registerRequest(){

            // $query = $this->con->prepare("insert into request (studentID, assignedId, task , ) values (?,?,?,?) ");
			// if ($query->execute([$_SESSION['user'], $this->assignedId,  $this->task, $this-> ])){
			// 		echo "<script>window.location='../student/manageRequest.php'</script>";
			// } else {

			// 		header("location:../student/postRequest.php?id=$this->assignedId");
			// }
		}

	}