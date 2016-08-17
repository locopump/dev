<?php
Class Usuarios{
	function listar(){
		$data_url = "http://jsonplaceholder.typicode.com/todos";
		$data = file_get_contents($data_url);
		$result = json_decode($data);
		return $result;
	}

	function filtrar($id,$title,$completed){
		$data_url = "http://jsonplaceholder.typicode.com/todos";
		$data = json_decode(file_get_contents($data_url));
		// $result = json_decode($data);
	}
}
?>