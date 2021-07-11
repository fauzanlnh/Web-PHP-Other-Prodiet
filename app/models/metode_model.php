<?php

class metode_model{

	private $table = 'metode';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllMetode()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getAllMetodeById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_metode=:id_metode');
		$this->db->bind('id_metode',$id);
		return $this->db->single();
	}

	public function tambahMetode($data)
	{
		//$nim, $nama, $jurusan
		$query = "INSERT INTO metode (nama_metode, deskripsi, rekomen1, rekomen2, rekomen3, deskripsi_rekomen1, deskripsi_rekomen2, deskripsi_rekomen3) VALUES(:nama_metode, :deskripsi, :rec_1, :rec_2, :rec_3, :desc_1, :desc_2, :desc_3)";
		$this->db->query($query);
		$this->db->bind('nama_metode',$data['nama_metode']);
		$this->db->bind('deskripsi',$data['deskripsi']);
        $this->db->bind('rec_1',$data['rec_1']);
        $this->db->bind('rec_2',$data['rec_2']);
        $this->db->bind('rec_3',$data['rec_3']);
        $this->db->bind('desc_1',$data['desc_1']);
        $this->db->bind('desc_2',$data['desc_2']);
        $this->db->bind('desc_3',$data['desc_3']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDatametode($data)
	{
        $query = "UPDATE metode SET nama_metode=:nama_metode, deskripsi=:deskripsi, rekomen1 =:rec_1, rekomen2 =:rec_2, rekomen3 =:rec_3, deskripsi_rekomen1 =:desc_1, deskripsi_rekomen2 =:desc_2, deskripsi_rekomen3 =:desc_3 WHERE id_metode=:id_metode";
		$this->db->query($query);
		$this->db->bind('id_metode',$data['id_metode']);
		$this->db->bind('nama_metode',$data['nama_metode']);
		$this->db->bind('deskripsi',$data['deskripsi']);
        $this->db->bind('rec_1',$data['rec_1']);
        $this->db->bind('rec_2',$data['rec_2']);
        $this->db->bind('rec_3',$data['rec_3']);
        $this->db->bind('desc_1',$data['desc_1']);
        $this->db->bind('desc_2',$data['desc_2']);
        $this->db->bind('desc_3',$data['desc_3']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function deleteMetode($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_metode=:id_metode');
		$this->db->bind('id_metode',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}

 ?>