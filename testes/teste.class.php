<?php

require_once "../classes/site.class.php";

class Mostrar_matches extends Site {

	private $sql;
	private $query;
	private $consulta;
	private $Usuario;
	public $resultado;
	public $match;


	public function mostrar() {

		$this->sql = "SELECT * FROM matches where Usuario_1 = ".$_SESSION['dados']['Id']." or Usuario_2 = ".$_SESSION['dados']['Id'];

		$this->resultado = array();
		$this->match = array();

		if ($this->query = mysqli_query($this->con, $this->sql)) {

			$this->consulta = mysqli_fetch_all($this->query, MYSQLI_ASSOC);
			
			foreach ($this->consulta as $chave => $valor) {

				$this->match[] = $this->consulta[$chave]['Id'];

				if ($this->consulta[$chave]['Usuario_1'] == $_SESSION['dados']['Id']) {

					$this->Usuario = $this->consulta[$chave]['Usuario_2'];

				} else {

					$this->Usuario = $this->consulta[$chave]['Usuario_1'];

				}

				$this->sql = "SELECT * FROM dados_usuario where Id = $this->Usuario";
				$this->query = mysqli_query($this->con, $this->sql);

				$this->resultado[] = mysqli_fetch_array($this->query);

			}


		}


	}

	public function deletar_match($id_match) {

		$this->sql = "DELETE FROM matches where Id = $id_match";
		return mysqli_query($this->con, $this->sql);

	}



}

?>