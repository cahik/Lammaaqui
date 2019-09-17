<?php

// Conexão com banco de dados
require_once "site.class.php";

class Perfil extends Site {

	private $sql;
	private $id;
	private $nome;
	private $foto;
	private $email;
	private $senha;
	private $telefone;
	private $celular;
	private $sexo;
	private $estado;
	private $cidade;
	private $data_nascimento;
	private $descricao;
	private $fuma;
	private $aceita_fumar;
	private $bebe;
	private $aceita_beber;
	private $tem_animal;
	private $aceita_animais;
	private $trabalha;
	private $estuda;
	private $aceita_genero;
	private $aceita_pagar;	
	public $dados_usuario;

	public function __construct() {

		parent::__construct();
		$this->transformar_variaveis();
	}

	private function transformar_variaveis() {

		$this->id = $_SESSION['dados']['Id'];

		if (isset($_POST['ano']) and isset($_POST['mes']) and isset($_POST['dia'])) {

			$this->data_nascimento = $_POST['ano']."-".$_POST['mes']."-".$_POST['dia'];

		}

		// Dados pessoais

		if (!isset($_POST['Nome']) || $_POST['Nome'] == $_SESSION['dados']['Nome']) {
			$this->nome = $_SESSION['dados']['Nome'];
		} else {
			$this->nome = $_POST['Nome'];
		}

		if (!isset($_POST['Foto']) || $_POST['Foto'] == $_SESSION['dados']['Foto']) {
			$this->foto = $_SESSION['dados']['Foto'];
		} else {
			$this->foto = $_POST['Foto'];
		}

		if (!isset($_POST['Email']) || $_POST['Email'] == $_SESSION['dados']['Email']) {
			$this->email = $_SESSION['dados']['Email'];
		} else {
			$this->email = $_POST['Email'];
		}

		if (!isset($_POST['Senha']) || $_POST['Senha'] == $_SESSION['dados']['Senha']) {
			if ($_SESSION['dados']['Senha'] == NULL) {
				$this->senha = "DEFAULT";
			}
			$this->senha = $_SESSION['dados']['Senha'];
		} else {
			$this->senha = $_POST['Senha'];
		}

		if (!isset($_POST['Telefone']) || $_POST['Telefone'] == $_SESSION['dados']['Telefone']) {
			$this->telefone = $_SESSION['dados']['Telefone'];
		} else {
			$this->telefone = $_POST['Telefone'];
		}

		if (!isset($_POST['Celular']) || $_POST['Celular'] == $_SESSION['dados']['Celular']) {
			$this->celular = $_SESSION['dados']['Celular'];
		} else {
			$this->celular = $_POST['Celular'];
		}

		if (!isset($_POST['Sexo']) || $_POST['Sexo'] == $_SESSION['dados']['Sexo']) {
			$this->sexo = $_SESSION['dados']['Sexo'];
		} else {
			$this->sexo = $_POST['Sexo'];
		}

		if (!isset($_POST['estado']) || $_POST['estado'] == $_SESSION['dados']['Id_estado']) {
			$this->estado = $_SESSION['dados']['Id_estado'];
		} else {
			$this->estado = $_POST['estado'];
		}

		if (!isset($_POST['cidade']) || $_POST['cidade'] == $_SESSION['dados']['Id_cidade']) {
			$this->cidade = $_SESSION['dados']['Id_cidade'];
		} else {
			$this->cidade = $_POST['cidade'];
		}

		if (!isset($_POST['Descricao']) || $_POST['Descricao'] == $_SESSION['dados']['Descricao']) {
			$this->descricao = $_SESSION['dados']['Descricao'];
		} else {
			$this->descricao = $_POST['Descricao'];
		}

		// Filtros

		if (!isset($_POST['Fuma']) || $_POST['Fuma'] == $_SESSION['dados']['Fuma']) {
			if ($_SESSION['dados']['Fuma'] == NULL) {
				$this->Fuma = "DEFAULT";
			}			
			$this->Fuma = $_SESSION['dados']['Fuma'];
		} else {
			$this->Fuma = $_POST['Fuma'];			
		}

		if (!isset($_POST['Aceita_fumar']) || $_POST['Aceita_fumar'] == $_SESSION['dados']['Aceita_fumar']) {
			if ($_SESSION['dados']['Aceita_fumar'] == NULL) {
				$this->Aceita_fumar = "DEFAULT";
			}
			$this->Aceita_fumar = $_SESSION['dados']['Aceita_fumar'];
		} else {
			$this->Aceita_fumar = $_POST['Aceita_fumar'];
		}

		if (!isset($_POST['Bebe']) || $_POST['Bebe'] == $_SESSION['dados']['Bebe']) {
			if ($_SESSION['dados']['Bebe'] == NULL) {
				$this->Bebe = "DEFAULT";
			}
			$this->Bebe = $_SESSION['dados']['Bebe'];
		} else {
			$this->Bebe = $_POST['Bebe'];
		}

		if (!isset($_POST['Aceita_beber']) || $_POST['Aceita_beber'] == $_SESSION['dados']['Aceita_beber']) {
			if ($_SESSION['dados']['Aceita_beber'] == NULL) {
				$this->Aceita_beber = "DEFAULT";
			}
			$this->Aceita_beber = $_SESSION['dados']['Aceita_beber'];
		} else {
			$this->Aceita_beber = $_POST['Aceita_beber'];
		}

		if (!isset($_POST['Tem_animal']) || $_POST['Tem_animal'] == $_SESSION['dados']['Tem_animal']) {
			if ($_SESSION['dados']['Tem_animal'] == NULL) {
				$this->Tem_animal = "DEFAULT";
			}
			$this->Tem_animal = $_SESSION['dados']['Tem_animal'];
		} else {
			$this->Tem_animal = $_POST['Tem_animal'];
		}

		if (!isset($_POST['Aceita_animais']) || $_POST['Aceita_animais'] == $_SESSION['dados']['Aceita_animais']) {
			if ($_SESSION['dados']['Aceita_animais'] == NULL) {
				$this->Aceita_animais = "DEFAULT";
			}
			$this->Aceita_animais = $_SESSION['dados']['Aceita_animais'];
		} else {
			$this->Aceita_animais = $_POST['Aceita_animais'];
		}

		if (!isset($_POST['Trabalha']) || $_POST['Trabalha'] == $_SESSION['dados']['Trabalha']) {
			if ($_SESSION['dados']['Trabalha'] == NULL) {
				$this->Trabalha = "DEFAULT";
			}
			$this->Trabalha = $_SESSION['dados']['Trabalha'];
		} else {
			$this->Trabalha = $_POST['Trabalha'];
		}

		if (!isset($_POST['Estuda']) || $_POST['Estuda'] == $_SESSION['dados']['Estuda']) {
			if ($_SESSION['dados']['Estuda'] == NULL) {
				$this->Estuda = "DEFAULT";
			}
			$this->Estuda = $_SESSION['dados']['Estuda'];
		} else {
			$this->Estuda = $_POST['Estuda'];
		}

		if (!isset($_POST['Aceita_genero']) || $_POST['Aceita_genero'] == $_SESSION['dados']['Aceita_genero']) {
			$this->Aceita_genero = $_SESSION['dados']['Aceita_genero'];
		} else {
			$this->Aceita_genero = $_POST['Aceita_genero'];
		}

		if (!isset($_POST['Aceita_pagar']) || $_POST['Aceita_pagar'] == $_SESSION['dados']['Aceita_pagar']) {
			$this->Aceita_pagar = $_SESSION['dados']['Aceita_pagar'];
		} else {
			$this->Aceita_pagar = $_POST['Aceita_pagar'];
		}

	}

	//  Consulta no banco de dados
	public function consulta() {

		// Buscar as informações do usuario atual logado
		$this->sql = "SELECT * FROM dados_usuario WHERE Id = '$this->id'";

		$this->dados_usuario = mysqli_fetch_array(mysqli_query($this->con, $this->sql));		

	}


	// Salvar alterações nos dados pessoais, foto e filtos
	public function update() {


	// Verificando ação de salvar dados pessoais alterados
		if (isset($_POST['salvarDados'])) {

			// Recendo as informações para salvar

			 // Instância uma classe para o upload
			if (isset($_FILES['arquivos'])) {
				$upload = new Uploader('arquivos');
				$uploads = $upload->upload();
				$uploads = $uploads[0]['dados']['nome_novo'];


				if ($_FILES['arquivos']['name'][0] == null || $_FILES['arquivos']['name'][0] == $_SESSION['dados']['Foto']) {
					if ($_SESSION['dados']['Foto'] == null) {
						$this->foto = "Foto = null";
					} else {
						$this->foto = "Foto = '".$_SESSION['dados']['Foto']."'";
					}
				} else {
			        // Foto perfil
					$this->foto = "Foto = '".$uploads."'";
				}

			}


			    // Senha
			if ($this->senha == '') {
				$this->senha = $_SESSION['dados']['Senha'];
			}

			if ($this->telefone == "") {$this->telefone = "DEFAULT";} else {$this->explode_numero_telefone($this->telefone);}
			if ($this->celular == "") {$this->celular = "DEFAULT";} else {$this->explode_numero_celular($this->celular);}

			    // Dados pessoais
			$this->sql = "UPDATE dados_usuario SET Nome = '$this->nome', $this->foto, Email = '$this->email', Senha = '$this->senha', Telefone = $this->telefone, Celular = $this->celular, Sexo = '$this->sexo', Fk_estado = '$this->estado', Fk_cidade = '$this->cidade', Data_nascimento = '$this->data_nascimento', Descricao = '$this->descricao', Fuma = $this->Fuma, Aceita_fumar = $this->Aceita_fumar, Bebe = $this->Bebe, Aceita_beber = $this->Aceita_beber, Tem_animal = $this->Tem_animal, Aceita_animais = $this->Aceita_animais, Trabalha = $this->Trabalha, Estuda = $this->Estuda, Aceita_genero = '$this->Aceita_genero', Aceita_pagar = $this->Aceita_pagar WHERE Id = $this->id";

			if (mysqli_query($this->con, $this->sql)) {
				$this->atualizar_session();
			}

		} 
	}


	private function explode_numero_telefone($telefone) {

		if (strlen($telefone) == 14) {

			$ex1 = explode("-", $telefone);
			$ex2 = explode("(", $ex1[0]);
			$ex3 = explode(") ", $ex2[1]);
			$this->telefone = $ex3[0] . $ex3[1] . $ex1[1];

		} else {

			$this->telefone = $telefone;

		}

	}


	private function explode_numero_celular($celular) {

		if (strlen($celular) == 15) {

			$ex1 = explode("-", $celular);
			$ex2 = explode("(", $ex1[0]);
			$ex3 = explode(") ", $ex2[1]);
			$this->celular = $ex3[0] . $ex3[1] . $ex1[1];

		} else {

			$this->celular = $celular;

		}

	}

	private function atualizar_session() {

		$this->sql = "SELECT * FROM dados_usuario join cidade ON cidade.Id_cidade = dados_usuario.Fk_cidade join estado on estado.Id_estado = dados_usuario.Fk_estado where Id = $this->id;";
		$query = mysqli_query($this->con, $this->sql);
		$_SESSION['dados'] = mysqli_fetch_array($query);
		header("Location: /Lammaaqui/perfil.php");
	}

}

?>

