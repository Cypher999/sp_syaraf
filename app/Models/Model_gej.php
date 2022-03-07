<?php
class Model_gej{
	private $table="gej";
	private $db;
	public function __construct(){
		$this->db=new Db;
	}
	public function read_data(){
		$gej=$this->db->query("SELECT * FROM ".$this->table)->result();
		return $gej;
	}
	public function length_data(){
		$gej=$this->db->query("SELECT * FROM ".$this->table)->num_rows();
		return $gej;
	}
	public function read_one($a){
		$gej=$this->db->query("SELECT * FROM ".$this->table." WHERE kd_gej='".$a."'")->result();
		return $gej;
	}
	public function read_nm($a){
		$gej=$this->db->query("SELECT * FROM ".$this->table." WHERE nm_gej='".$a."'")->num_rows();
		return $gej;
	}
	public function insert($a){
		$gej=$this->db->query("INSERT INTO ".$this->table." VALUES ('".$a["kd_gej"]."','".$a["nm_gej"]."')");
		return $gej;
	}
	public function update($a){
		$gej=$this->db->query("UPDATE ".$this->table." SET nm_gej='".$a["nm_gej"]."' WHERE kd_gej='".$a["kd_gej"]."'");
		return $gej;
	}
	public function delete($a){
		$gej=$this->db->query("DELETE FROM ".$this->table." WHERE kd_gej='".$a."'");
		return $gej;
	}
}
?>