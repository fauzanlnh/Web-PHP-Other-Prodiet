<?php

class userdetambil_model{

    private $table = 'user_detambil';
	private $db;
    public function __construct(){
		$this->db = new Database;
	}
    
    //menambahkan dari tabel todolist ke user det ambil
	public function tambahuserdetambil($data){
        foreach ($data['todolist'] as $todolist) :;
            //echo $todolist['id_todolist'] ."<br>";
            $query = "INSERT INTO user_detambil (id_todolist, id_ambil, status) VALUES(:id_todolist, :id_ambil, 'BELUM DILAKUKAN')";
            $this->db->query($query);
            $this->db->bind('id_todolist',$todolist['id_todolist']);
            $this->db->bind('id_ambil',$data['getidambil'][0]['id_ambil']);
            $this->db->execute();
        endforeach;
	}
    
    //Menampilkan list kegiatan berdasarkan hari
    public function getmetodebyhari($data){
        $this->db->query("SELECT * FROM user_detambil, kegiatan, metode_todolist WHERE user_detambil.id_todolist = metode_todolist.id_todolist AND metode_todolist.id_kegiatan = kegiatan.id_kegiatan AND id_ambil = '".$data['getidambil'][0]['id_ambil']."' and hari_ke = '".$data['bedahari']."' ");
        return $this->db->resultSet();
    }
    
    //ketika user melakukan todolist
    public function updateusertodolist($id_detambil){
		$query = "UPDATE user_detambil SET status='DILAKUKAN' WHERE id_detambil='".$id_detambil. "' ";
		$this->db->query($query);
		$this->db->execute();
		return $this->db->rowCount();
	}
    
    //ketika user malakukan todolist merubah berat badan
    public function updateberatbadan($data){
        $query = "UPDATE user_detambil SET status='".$data['berat_badan']."' WHERE id_detambil=:id_detambil";
		$this->db->query($query);
		$this->db->bind('id_detambil',$data['id_detambil']);
		$this->db->execute();

        $query = "UPDATE user_ambil SET setelah_diet='".$data['berat_badan']."' WHERE id_ambil=:id_ambil";
		$this->db->query($query);
		$this->db->bind('id_ambil',$data['id_ambil']);
		$this->db->execute();

        $query = "UPDATE anggota SET berat_badan ='".$data['berat_badan']."' WHERE username=:username";
		$this->db->query($query);
		$this->db->bind('username',$_SESSION['username']);
		$this->db->execute();
		return $this->db->rowCount();
    }
    
    //ketika user membatalkan kegiatan diet
    public function bataldiet($id_ambil){
        $query = "UPDATE user_detambil SET status='BATAL' WHERE id_ambil=:id_ambil";
		$this->db->query($query);
		$this->db->bind('id_ambil',$id_ambil);

		$this->db->execute();

		return $this->db->rowCount();
    }
    //Views -> Hasil
    public function getberatbadan($data){
        $this->db->query("SELECT * FROM user_detambil, metode_todolist WHERE user_detambil.id_todolist = metode_todolist.id_todolist AND nama_kegiatan='Berat badan' AND id_ambil = '".$data['getidambil'][0]['id_ambil']."' ");
        return $this->db->resultSet();
    }
    
    public function getDilakukan($data){
        $this->db->query("SELECT * FROM user_detambil, metode_todolist WHERE user_detambil.id_todolist = metode_todolist.id_todolist AND STATUS ='DILAKUKAN' AND id_ambil = '".$data['getidambil'][0]['id_ambil']."' ");
        return $this->db->resultSet();
    }
    public function getProgress($data){
        $this->db->query("SELECT * FROM user_detambil JOIN metode_todolist USING(id_todolist) WHERE STATUS ='DILAKUKAN' AND id_ambil = '".$data['getidambil'][0]['id_ambil']."' GROUP BY hari_ke");
        return $this->db->resultSet();   
    }
}

?>


