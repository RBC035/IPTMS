<?php 
    include "iptms.php";

    class Signin extends Login
	{
		
		function __construct($username, $password)
		{
			parent::__construct($username, $password);
		}

		public function login()
		{
            $id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());

			if ($this->Username() == false) 
			{
				echo "<script>window.location='../pages/login.php?uid=$id'</script>";
				exit();
			}
			if ($this->Password() == false) 
			{
				echo "<script>window.location='../pages/login.php?psid=$id'</script>";
				exit();
			}

			$this->usernameChecked();
		}

		private function Username()
		{
			$result = "" ;
			if (empty($this->username)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function Password()
		{
			$result = "" ;
			if (empty($this->password)) 
			{
				$result = false ;
			}
			else
			{
				$result = true ;
			}

			return $result ;
		}

		private function usernameChecked()
		{
			//  $this->registerMain();
			 $this->passwordVerify();
		}
	}
