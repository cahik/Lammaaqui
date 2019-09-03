<?php 

require_once "site.class.php";

error_reporting();

class Selects extends Site {

	private $sql;
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
	private $Aceita_pagar_mais;
	private $Aceita_pagar_menos;
	private $Usuario;
	public $resultado;


	public function __construct() {

		parent::__construct();

		if (isset($_POST['Enviar'])) {

			$this->receber_filtro();
			
		}

	}

	// Pegando os POSTS dos filtros do site de busca.
	private function receber_filtro() {

		$this->Fuma = $_POST['Fuma'];
		$this->Bebe = $_POST['Bebe'];
		$this->Tem_animal = $_POST['Tem_animal'];
		$this->Trabalha = $_POST['Trabalha'];
		$this->Estuda = $_POST['Estuda'];
		$this->Aceita_genero = $_POST['Sexo'];
		$this->Aceita_pagar = $_POST['Aceita_pagar'];

	}

	// Aplicando os filtros na busca pelo banco de dados, caso um dos filtros não seja preenchido deverá ser feita a pesquisa mesmo assim, somente deverá ser retirado do SQL. 

	//IMPORTANTE!!! Se for adicionar mais filtros adicione antes dos "Aceita_pagar" no $this->sql.

	public function select_pessoas() {

		// Se o Sexo for "Não me importo 'NI' ".
		if ($this->Aceita_genero == "NI" or $this->Aceita_genero == "") {$this->Aceita_genero = "";} else {$this->Aceita_genero = "Sexo = '$this->Aceita_genero' and";}

	// Verificando se os POSTS estão setados, se não, eles ficam como "Não me importo '' ".
		if (!isset($this->Fuma)) {$this->Fuma = "";} else {$this->Fuma = "Fuma = '$this->Fuma' and";}

		if (!isset($this->Bebe)) {$this->Bebe = "";} else {$this->Bebe = "Bebe = '$this->Bebe' and";}

		if (!isset($this->Tem_animal)) {$this->Tem_animal = "";} else {$this->Tem_animal = "Tem_animal = '$this->Tem_animal' and";}

		if (!isset($this->Trabalha)) {$this->Trabalha = "";} else {$this->Trabalha = "Trabalha = '$this->Trabalha' and";}

		if (!isset($this->Estuda)) {$this->Estuda = "";} else {$this->Estuda = "Estuda = '$this->Estuda' and";}

		$this->Aceita_pagar_mais = $this->Aceita_pagar + 100;
		$this->Aceita_pagar_menos = $this->Aceita_pagar - 100;


		// Montando o SQL, não deve ser adicionado "AND", a não ser que seja um caso especial, e pelo amor de Odin, não aperte "Enter" pra quebrar a linha.
		$this->sql = "SELECT * FROM dados_usuario where $this->Aceita_genero $this->Fuma $this->Bebe $this->Tem_animal $this->Trabalha  $this->Estuda Aceita_pagar <= $this->Aceita_pagar_mais and Aceita_pagar >= $this->Aceita_pagar_menos;";

		$this->Usuario = $_SESSION['dados'];


		if (mysqli_query($this->con, $this->sql)) {

			// Pegando os resultados da query em forma de array.
			$this->resultado = mysqli_fetch_array(mysqli_query($this->con, $this->sql));


			if ($this->resultado['Aceita_genero'] == $this->Usuario['Sexo'] || $this->resultado['Aceita_genero'] == "Não me importo") {

				echo "Foii";

			}

		}


	}



}


?>