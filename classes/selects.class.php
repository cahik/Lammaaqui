<?php 

require_once "site.class.php";

class Selects extends Site {

	private $sql;
	private $email;
	public $resultado;


	public function select_dados() {

		$this->email = "vergiliopoleza@hotmail.com";
		$this->sql = "SELECT * FROM dados_usuario where Email = '$this->email'";

		if (mysqli_query($this->con, $this->sql)) {

			$this->resultado = mysqli_fetch_array(mysqli_query($this->con, $this->sql));

		}


	}



}




?>