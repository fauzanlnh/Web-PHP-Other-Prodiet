<?php

class user_model{
	private $table = 'user';
	private $db;
    public function __construct()
	{
		$this->db = new Database;
	}
    //Register
	public function tambahuser($data){
        $query = "INSERT INTO user (username, password, level) VALUES(:username, :password, :status)";
		$this->db->query($query);
		$this->db->bind('username',$data['username']);
		$this->db->bind('password',$data['password']);
        $this->db->bind('status','Anggota');
		$this->db->execute();
        $query = "INSERT INTO anggota (email, username, nama, berat_badan) VALUES(:email, :username, :nama, :berat_badan)";
		$this->db->query($query);
		$this->db->bind('email',$data['email']);
        $this->db->bind('username',$data['username']);
		$this->db->bind('nama',$data['nama']);
        $this->db->bind('berat_badan',$data['berat_badan']);
		$this->db->execute();
		return $this->db->rowCount();
	}
    //
    public function getUsername($data){
        $this->db->query('SELECT * FROM anggota WHERE (username=:username OR email=:email)');
        $this->db->bind('email',$data['email']);
        $this->db->bind('username',$data['username']);
        return $this->db->single();
    }
    //Login
    public function getUserById($email, $password){
		$this->db->query('SELECT * FROM ' . $this->table . ',anggota WHERE user.username = anggota.username AND (user.username=:email OR email=:email) and password=:password');
		$this->db->bind('email',$email);
        $this->db->bind('password',$password);
		return $this->db->single();
	}
    
    
}