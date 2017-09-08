<?php
/*
	require_once("user.php");

  $usr = new User();

  $usr->setUsername("dsfefe");
  $usr->setPassword("defesfs");
  $usr->setName("fefes", "grgtgd");
  $usr->setGender(1);
  $usr->setEmail("fesfes2fef");
  $usr->setType(0);

  

  $usrController = new UserController();
  $usrController->saveUser($usr);
	*/
	class UserModel {
		
		
		private $DBhandle;
		private $dbObj;

		public function __construct()
		{
			$this->initDB();
		}

		
		public function isUserExist($userName)
		{
			$SQL = "SELECT `username` FROM `users` WHERE `username` = '$userName'";
			$result = $this->dbObj->db_query($this->DBhandle,$SQL);
			//$this->dbObj->db_close($this->DBhandle);
			return $this->dbObj->db_dbCount($result) ? true : false;
		}

		public function isEmailExist($email)
		{
			$SQL = "SELECT `email` FROM `users` WHERE `email` = '$email'";
			$result = $this->dbObj->db_query($this->DBhandle,$SQL);
			//$this->dbObj->db_close($this->DBhandle);
			return $this->dbObj->db_dbCount($result) ? true : false;
		}

		private function initDB()
		{
			require_once("db.php");
			$this->dbObj = new DB(); 
			$this->DBhandle = $this->dbObj->db_connect();
		}

		public function saveUser($user)
		{
			$SQL = "INSERT INTO `users` (username,password,email,firstname,lastname,gender,type) VALUES ('".$user->getUserName()."', '".$user->getPassword()."', '".$user->getEmail()."', '".$user->getFirstname()."', '".$user->getLastname()."', '".$user->getGender()."', '".$user->getType()."')";
			//echo $SQL;
			//插入数据库
			$this->dbObj->db_query($this->DBhandle,$SQL);
			//$this->dbObj->db_close($this->DBhandle);
		}

		public function isLoginCorrect($userName,$password)
		{
			$SQL = "SELECT * FROM `users` WHERE `password` = '$password' and `username` = '$userName'; ";
			$result = $this->dbObj->db_query($this->DBhandle,$SQL);
			return $this->dbObj->db_dbCount($result) ? true : false;
		}
		
	}
?>