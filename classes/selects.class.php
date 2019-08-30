<?php 

require_once "site.class.php";

class Selects extends Site {

	private $sql;
	public $resultado;
	private $Fuma;
	private $Aceita_fumar;
	private $Bebe;
	private $Aceita_beber;
	private $Tem_animal;
	private $Aceita_animais;
	private $Trabalha;
	private $Estuda;
	private $Aceita_genero;
	private $Aceita_pagar;


	public function __construct() {

		parent::__construct();

		if (isset($_POST['Enviar'])) {

			$this->receber_filtro();
			
		}

	}

	private function receber_filtro() {

		$this->Fuma = $_POST['Fuma'];
		$this->Bebe = $_POST['Bebe'];
		$this->Tem_animal = $_POST['Tem_animal'];
		$this->Trabalha = $_POST['Trabalha'];
		$this->Estuda = $_POST['Estuda'];
		$this->Aceita_genero = $_POST['Aceita_genero'];
		$this->Aceita_pagar = $_POST['Aceita_pagar'];

	}


	public function select_pessoas() {

		if ($this->Aceita_genero = "NI") {$this->Aceita_genero = "";} else {$this->Aceita_genero = "and $this->Aceita_genero";}

		$this->sql = "SELECT * FROM dados_usuario where Fuma = $this->Fuma and Bebe = $this->Bebe and Tem_animal = $this->Tem_animal and Trabalha = $this->Trabalha $this->Aceita_genero and Estuda = $this->Estuda and Aceita_pagar <= $this->Aceita_pagar;";

		if (mysqli_query($this->con, $this->sql)) {

			$this->resultado = mysqli_fetch_array(mysqli_query($this->con, $this->sql));

		} else {

			echo "Não foi";

		}


	}



}


?>