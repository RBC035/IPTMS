<?php

	include_once 'field.php';

	class CreateRequest extends Request
	{		
		function __construct($postID, $startDate, $endDate, $requestId)
		{
			parent:: __construct($postID, $startDate, $endDate, $requestId);
		}

		public function addRequest(){
			if ($this->requestId == "") {
              $this->checkRequest();
            }else {
                echo "update request here";
            }
		} 

        public function deleteRequest(){
            $this->removeRequest();
        }

		public function acceptedRequest(){
			if ($this->supervisorID() == false) 
			{
				echo "<script>window.location='../supervisor/acceptedRequest.php?rid=$this->requestId&stid=$this->endDate&fill'</script>";
				exit();
			}

			$this->assignedSupervisor(); 
		}

		private function supervisorID()
		{
			$result = "" ;
			if ($this->startDate == "Null") 
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