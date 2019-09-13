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
	public $dados_usuario;

	public function __construct() {

		parent::__construct();
		$this->transformar_variaveis();
	}

	private function transformar_variaveis() {

		$this->id = $_SESSION['dados']['Id'];

		if (!isset($_POST['Nome']) || $_POST['Nome'] == $_SESSION['dados']['Nome']) {
			$this->nome = $_SESSION['dados']['Nome'];
		} else {
			$this->nome = $_POST['Nome'];
		}
		if (!isset($_POST['Email']) || $_POST['Email'] == $_SESSION['dados']['Email']) {
			$this->email = $_SESSION['dados']['Email'];
		} else {
			$this->email = $_POST['Email'];
		}
		if (!isset($_POST['Senha']) || $_POST['Senha'] == $_SESSION['dados']['Senha']) {
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
		if (!isset($_POST['sexo']) || $_POST['sexo'] == $_SESSION['dados']['Sexo']) {
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

		if (!isset($_POST['Data_nascimento']) || $_POST['Data_nascimento'] == $_SESSION['dados']['Data_nascimento']) {
			$this->data_nascimento = $_SESSION['dados']['Data_nascimento'];
		} else {
			$this->data_nascimento = $_POST['Data_nascimento'];
		}
		if (!isset($_POST['Descricao']) || $_POST['Descricao'] == $_SESSION['dados']['Descricao']) {
			$this->descricao = $_SESSION['dados']['Descricao'];
		} else {
			$this->descricao = $_POST['Descricao'];
		}

	}

	//  Consulta no banco de dados
	public function consulta() {

		// Buscar as informações do usuario atual logado
		$this->sql = "SELECT * FROM dados_usuario WHERE Id = '$this->id'";

		$this->dados_usuario = mysqli_fetch_array(mysqli_query($this->con, $this->sql));

		$query = mysqli_query($this->con, $this->sql);		

	}

	// Salvar alterações nos dados pessoais, foto e filtos
	public function update() {


	// Verificando ação de salvar dados pessoais alterados
		if (isset($_POST['salvarDados'])) {

			// Recendo as informações para salvar

			 // Instância uma classe para o upload
			$upload = new Uploader('arquivos');
			$uploads = $upload->upload();
			$uploads = $uploads[0]['dados']['nome_novo'];

			// Foto perfil
			$this->foto = $uploads;

			// Senha
			if ($this->senha == '') {
				$this->senha = $_SESSION['dados']['Senha'];
			}

			// Dados pessoais
			$this->sql = "UPDATE dados_usuario SET Nome = '$this->nome', Foto = '$this->foto', Email = '$this->email', Senha = '$this->senha', Telefone = $this->telefone, Celular = $this->celular, Sexo = '$this->sexo', Estado = '$this->estado', Cidade = '$this->cidade', Data_nascimento = '$this->data_nascimento', Descricao = '$this->descricao' WHERE Id = '$this->id'";

			// var_dump($this->sql);
			// die();

			mysqli_query($this->con, $this->sql);

		} 
	}
}

?>

