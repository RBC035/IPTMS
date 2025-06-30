<?php 

	class Post
	{
		protected $postID;
		protected $position;
		protected $amount;
		protected $description;
		protected $officeName;
        protected $endDate;

		private $con;
        private $id;

		
		function __construct($position, $amount, $description, $officeName, $endDate, $postID)
		{
            $this->con = DBConnection::getInstance()->getConnection();

			$this->postID = trim($postID);
			$this->position = trim($position);
			$this->amount = trim($amount);
			$this->description = trim($description);
			$this->officeName = trim($officeName);
			$this->endDate = trim($endDate);

            $this->id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());
		}

		protected function registerPost(){

            $query = $this->con->prepare("insert into post (position, description, 	amount, postDate, endDate, 	officeName) values (?,?,?,?,?,?) ");
			if ($query->execute([$this->position, $this->description, $this->amount, date('Y-m-d H:i:s'), $this->endDate ,$this->officeName])){

					echo "<script>window.location='../supervisor/managePost.php'</script>";

			} else {

					header("location:../supervisor/registerPost.php");
			}
		}

		protected function updatePost(){
	
			$update = $this->con->prepare("update post set position = ? ,  amount = ? , description = ? , endDate = ?  where postID  = ? ");
			if ($update->execute([$this->position,  $this->amount, $this->description , $this->endDate, $this->postID])) {
	
					header("location:../supervisor/managePost.php?success=1");

            } else {
					header("location:../supervisor/managePost.php?fail=1");

            }
		}


	}