<?php
class User {
  	protected $firstName;
	protected $lastName;
	protected $uid;
	protected $email;
	protected $password;
	protected $type;
	protected $username;
	protected $gender;
	protected $phone;
	
	public function getFirstname()
	{
		return $this->firstName;
	}

	public function getLastname()
	{
		return $this->lastName;
	}
	
	public function setName($firstName,$lastName)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}
	
	public function getUid()
	{
		return $this->uid;
	}

	public function setUid($uid)
	{
		$this->uid = $uid;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getType()
	{
		return $this->type;
	}

	public function setType($type)
	{
		$this->type = $type;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getGender()
	{
		return $this->gender;
	}

	public function setGender($gender)
	{
		$this->gender = $gender;
	}
}
?>
