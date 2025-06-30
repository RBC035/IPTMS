<?php

	include_once 'report.php';

	class CreateReport extends Report
	{		
		function __construct($assignedId, $task, $reportId)
		{
			parent:: __construct($assignedId, $task, $reportId);
		}

		public function addReport(){
            echo "add report first function";
			// if ($this->requestId == "") {
            //   $this->checkRequest();
            // }else {
            //     echo "update request here";
            // }
		} 

        public function deleteRequest(){
            // $this->removeRequest();
        }

		public function acceptedRequest(){
			// if ($this->supervisorID() == false) 
			// {
			// 	echo "<script>window.location='../supervisor/acceptedRequest.php?rid=$this->requestId&stid=$this->endDate&fill'</script>";
			// 	exit();
			// }

			// $this->assignedSupervisor(); 
		}

		private function supervisorID()
		{
			// $result = "" ;
			// if ($this->startDate == "Null") 
			// {
			// 	$result = false ;
			// }
			// else
			// {
			// 	$result = true ;
			// }

			// return $result ;
		}
	}