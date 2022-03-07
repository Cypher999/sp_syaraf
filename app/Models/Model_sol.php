<?php
class Model_sol{
	private $table="sol";
	private $db;
	public function __construct(){
		$this->db=new Db;
	}
	public function read_data(){
		$sol=$this->db->query("SELECT * FROM ".$this->table)->result();
		return $sol;
	}
	public function read_one($a){
		$sol=$this->db->query("SELECT * FROM ".$this->table." WHERE kd_sol='".$a."'")->result();
		return $sol;
	}
	public function read_nm($a){
		$sol=$this->db->query("SELECT * FROM ".$this->table." WHERE sol='".$a."'")->num_rows();
		return $sol;
	}
	public function insert($a){
		$sol=$this->db->query("INSERT INTO ".$this->table." VALUES ('".$a["kd_sol"]."','".$a["sol"]."')");
		return $sol;
	}
	public function update($a){
		$sol=$this->db->query("UPDATE ".$this->table." SET sol='".$a["sol"]."' WHERE kd_sol='".$a["kd_sol"]."'");
		return $sol;
	}
	public function delete($a){
		$sol=$this->db->query("DELETE FROM ".$this->table." WHERE kd_sol='".$a."'");
		return $sol;
	}
}
?>