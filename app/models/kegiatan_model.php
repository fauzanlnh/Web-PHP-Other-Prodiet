<?php

class kegiatan_model{
	private $table = 'kegiatan';
	private $db;
    public function __construct()
	{
		$this->db = new Database;
	}
    public function getAllKegiatan(){
        $this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
    }
    
}
?>