<?php
class Model_penyakit{
	private $table="penyakit";
	private $db;
	public function __construct(){
		$this->db=new Db;
	}
	public function read_data(){
		$ker=$this->db->query("SELECT * FROM ".$this->table)->result();
		return $ker;
	}
	public function length_data(){
		$ker=$this->db->query("SELECT * FROM ".$this->table)->num_rows();
		return $ker;
	}
	public function read_one($a){
		$a=$this->db->escape_str($a);
		$ker=$this->db->query("SELECT * FROM ".$this->table." WHERE kd_pen='".$a."'")->result();
		return $ker;
	}

	public function read_nm($a){
		$a=$this->db->escape_str($a);
		$ker=$this->db->query("SELECT * FROM ".$this->table." WHERE nm_pen='".$a."'")->num_rows();
		return $ker;
	}

	public function delete($a){
		$a=$this->db->escape_str($a);
		$ker=$this->db->query("DELETE FROM ".$this->table." WHERE kd_pen='".$a."'");
		return $ker;
	}

	public function insert($a){
		$a["kd_pen"]=$this->db->escape_str($a["kd_pen"]);
		$a["nm_pen"]=$this->db->escape_str($a["nm_pen"]);
		$a["des_pen"]=$this->db->escape_str($a["des_pen"]);
		$a["kd_sol"]=$this->db->escape_str($a["kd_sol"]);
		$ker=$this->db->query("INSERT INTO ".$this->table." VALUES ('".$a["kd_pen"]."','".$a["nm_pen"]."','".$a["des_pen"]."','".$a["kd_sol"]."')");
		return $ker;
	}

	public function update($a){
		$a["kd_pen"]=$this->db->escape_str($a["kd_pen"]);
		$a["nm_pen"]=$this->db->escape_str($a["nm_pen"]);
		$a["des_pen"]=$this->db->escape_str($a["des_pen"]);
		$a["kd_sol"]=$this->db->escape_str($a["kd_sol"]);
		$ker=$this->db->query("UPDATE ".$this->table." SET nm_pen='".$a["nm_pen"]."', des_pen='".$a["des_pen"]."', kd_sol='".$a["kd_sol"]."' where kd_pen='".$a["kd_pen"]."'");
		return $ker;
	}
}
?>