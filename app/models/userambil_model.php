<?php

class userambil_model{
    private $table = 'user_ambil';
	private $db;
    public function __construct()
	{
		$this->db = new Database;
	}
	public function tambahuserambil($data)
	{
		//$nim, $nama, $jurusan
		$query = "INSERT INTO user_ambil (username, id_metode, tanggal, status, sebelum_diet) VALUES(:email, :id_metode, CURRENT_DATE, 'BERJALAN', :bb_sebelum)";
		$this->db->query($query);
		$this->db->bind('email',$_SESSION['username']);
		$this->db->bind('id_metode',$data['id_metode']);
        $this->db->bind('bb_sebelum',$data['user_bb']['berat_badan']);
        $this->db->execute();
		return $this->db->rowCount();
        
	}
    public function getuserambil(){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = "'.$_SESSION['username']. '" AND Status = "BERJALAN" ');
		return $this->db->resultSet();
    }
    public function getdatediff(){
        //$query ="SELECT DATEDIFF((SELECT tanggal FROM user_ambil WHERE email = '".$_SESSION['email']."' AND STATUS = 'BERJALAN'), CURRENT_DATE) AS 'beda'"
        $this->db->query("SELECT DATEDIFF(CURRENT_DATE, (SELECT tanggal FROM user_ambil WHERE username = '".$_SESSION['username']."' AND STATUS = 'BERJALAN')) AS 'beda'");
		return $this->db->resultSet();
    }
    //
    public function bataldiet($id_ambil){
        $query = "UPDATE user_ambil SET status='BATAL' WHERE id_ambil=:id_ambil";
		$this->db->query($query);
		$this->db->bind('id_ambil',$id_ambil);

		$this->db->execute();

		return $this->db->rowCount();
    }
    //
    public function gethasilstatus(){
        $this->db->query("select * from user_ambil where username = '".$_SESSION['username']."' ");
		return $this->db->resultSet();
    }
    public function submithasildiet($id_ambil){
        $query = "UPDATE user_ambil SET status='SELESAI' WHERE id_ambil=:id_ambil";
		$this->db->query($query);
		$this->db->bind('id_ambil',$id_ambil);

		$this->db->execute();

		return $this->db->rowCount();
    }
}

?>