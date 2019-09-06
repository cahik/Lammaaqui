<?php

require_once "site.class.php";

class Perfil extends Site {

	private $sql;
	private $id;
	public $cidade;
	public $est;
	public $ests;
	public $estado;



	function consulta() {

		$this->id = $_SESSION['dados']['Id'];
		$this->est = $_SESSION['dados']['Id_estado'];

		$this->sql = "SELECT cidade.Nome FROM dados_usuario join cidade ON cidade.Id = dados_usuario.Id_cidade where dados_usuario.Id = $this->id";


		if (mysqli_query($this->con, $this->sql)) {

			$this->cidade = mysqli_fetch_array(mysqli_query($this->con, $this->sql));

		}


		$this->sql = "SELECT estado.Nome FROM dados_usuario join estado on estado.Id = dados_usuario.Id_estado where dados_usuario.Id = $this->id";


		if (mysqli_query($this->con, $this->sql)) {

			$this->estado = mysqli_fetch_array(mysqli_query($this->con, $this->sql));

		}


		$this->sql = "SELECT * From estado";

		if (mysqli_query($this->con, $this->sql)) {

			$this->ests = mysqli_fetch_all(mysqli_query($this->con, $this->sql));

		}

		var_dump($this->ests);

	}


}










?>