<?php
class Model_user{
	private $table="user";
	private $db;
	public function __construct(){
		$this->db=new Db;
	}
	public function read_data(){
		$gej=$this->db->query("SELECT * FROM ".$this->table)->result();
		return $gej;
	}
	public function read_one($a){
		$gej=$this->db->query("SELECT * FROM ".$this->table." WHERE id_user='".$a."'")->result();
		return $gej;
	}
	public function read_nm($a){
		$gej=$this->db->query("SELECT * FROM ".$this->table." WHERE nm_user='".$a."'")->num_rows();
		return $gej;
	}
	public function cek_login($a){
		$a["nm"]=mysqli_real_escape_string($this->db->connect,$a["nm"]);
		$a["ps"]=mysqli_real_escape_string($this->db->connect,$a["ps"]);
		$gej=$this->db->query("SELECT * FROM ".$this->table." WHERE nm_user='".$a["nm"]."' and password='".$a["ps"]."'")->num_rows();
		return $gej;
	}
	public function hasil_login($a){
		$a["nm"]=mysqli_real_escape_string($this->db->connect,$a["nm"]);
		$a["ps"]=mysqli_real_escape_string($this->db->connect,$a["ps"]);
		$gej=$this->db->query("SELECT id_user,nm_user FROM ".$this->table." WHERE nm_user='".$a["nm"]."' and password='".$a["ps"]."'")->result();
		return $gej;
	}
	public function insert($a){
		$gej=$this->db->query("INSERT INTO ".$this->table." VALUES ('".$a["id_user"]."','".$a["nm_user"]."','".$a["password"]."')");
		return $gej;
	}
	public function update_nm($a){
		$gej=$this->db->query("UPDATE ".$this->table." SET nm_user='".$a["nm_user"]."' WHERE id_user='".$a["id_user"]."'");
		return $gej;
	}
	public function update_pas($a){
		$gej=$this->db->query("UPDATE ".$this->table." SET password='".$a["password"]."' WHERE id_user='".$a["id_user"]."'");
		return $gej;
	}
	public function delete($a){
		$gej=$this->db->query("DELETE FROM ".$this->table." WHERE id_user='".$a."'");
		return $gej;
	}
}
?>