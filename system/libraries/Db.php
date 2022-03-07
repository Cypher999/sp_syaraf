<?php

class Db{
	
	public $connect;

	public $query;
	public $error;

	public function __construct(){

		$this->connect=mysqli_connect(HOST,USER,PASSWORD,DB);
	
}
	public function query($q){

		$this->query=mysqli_query($this->connect,$q);

		return $this;
	}

	public function show_error(){
		return mysqli_error($this->connect); 
	}
	public function result(){

		$isi=array();

		if($this->query){

		while($has=mysqli_fetch_assoc($this->query)){

			array_push($isi, $has);

		}
		return $isi;

		}
		else{

			$this->error=mysqli_error($this->connect);

			return $this->error;

		}

	}


	public function num_rows(){

		if($this->query){

			return mysqli_num_rows($this->query);

		}
		else{

			$this->error=mysqli_error($this->connect);

			return $this->error;

		}

	}


	public function __destruct(){

		mysqli_close($this->connect);

	}
	public function escape_str($a){
		return mysqli_real_escape_string($this->connect,$a);
	}

}


?>