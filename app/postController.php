<?php

	include_once 'post.php';

	class CreatePost extends Post
	{
		private $id;
		
		function __construct($position, $amount, $description, $officeName, $endDate, $postID)
		{
			parent:: __construct($position, $amount, $description, $officeName, $endDate, $postID);
		}

		public function addPost(){
			$this->id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());
				
				if ($this->position() == false) 
				{
						echo "<script>window.location='../supervisor/registerPost.php?p=$this->id'</script>";

					exit();
				}

				if ($this->amount() == false) 
				{
						echo "<script>window.location='../supervisor/registerPost.php?a=$this->id'</script>";

					exit();
				}

				if ($this->postID == '') {

					$this->registerPost();

				} else {
					$this->updatePost();
				}

		} 

		private function position()
		{
			$result = "" ;
			if (empty($this->position)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function amount()
		{
			$result = "" ;
			if (empty($this->amount)) 
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