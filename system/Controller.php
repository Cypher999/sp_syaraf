<?php
class Controller{
	public function view($dir,$data=array()){
		require_once "app/Views/".$dir.".php";
	}
	public function model($dir){
		require_once "app/Models/".$dir.".php";
		$dir=new $dir();
		return $dir;
	}
}
?>