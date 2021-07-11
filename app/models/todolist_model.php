<?php

class todolist_model{
    private $table = 'metode_todolist';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllTodolist()
	{
		$this->db->query('SELECT * FROM ' . $this->table . ', metode where metode.id_metode = '.$this->table.'.id_metode ');
		return $this->db->resultSet();
	}

	public function getAllTodolistByIdMetode($id_metode)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_metode=:id_metode ');
		$this->db->bind('id_metode',$id_metode);
		return $this->db->resultSet();
	}

	public function tambahTodolist($data)
	{
		//$id_todolist, $id_metode, $kegiatan
		$query = "INSERT INTO metode_todolist (id_metode, id_kegiatan, nama_kegiatan, API, hari_ke) VALUES(:id_metode, :id_kegiatan, :nama_kegiatan, :API, :hari_ke)";
		$this->db->query($query);
		$this->db->bind('id_metode',$data['id_metode']);
		$this->db->bind('id_kegiatan',$data['id_kegiatan']);
        $this->db->bind('nama_kegiatan',$data['nama_kegiatan']);
		$this->db->bind('API', $data['api']);
		$this->db->bind('hari_ke',$data['hari_ke']);
        
		$this->db->execute();
		return $this->db->rowCount();
	}
    
	public function deleteTodolist($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_todolist=:id_todolist');
		$this->db->bind('id_todolist',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
    
	public function updateDataTodolist($data)	
    {
		$query = "UPDATE metode_todolist SET id_metode=:id_metode, id_kegiatan=:id_kegiatan, nama_kegiatan=:nama_kegiatan, API=:API, hari_ke=:hari_ke WHERE id_todolist=:id_todolist";
		$this->db->query($query);
		$this->db->bind('id_todolist',$data['id_todolist']);
		$this->db->bind('id_metode',$data['id_metode']);
		$this->db->bind('id_kegiatan',$data['id_kegiatan']);
        $this->db->bind('nama_kegiatan',$data['nama_kegiatan']);
		$this->db->bind('API', $data['api']);
		$this->db->bind('hari_ke',$data['hari_ke']);
        $this->db->execute();
        return $this->db->rowCount();
    }

}

?>