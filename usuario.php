<?php

class Usuario{
    private $id;
    private $email;
    private $username;
    private $pwd;
    private $privilegio;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function getPwd(){
		return $this->pwd;
	}

	public function setPwd($pwd){
		$this->pwd = $pwd;
	}

	public function getPrivilegio(){
		return $this->privilegio;
	}

	public function setPrivilegio($privilegio){
		$this->privilegio = $privilegio;
	}

}