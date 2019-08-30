<?php

require_once "site.class.php";

class Cadastro_login extends Site {


	public $nome;
	public $email;
	public $senha;
	public $senha2;
	public $sexo;
	public $data_nascimento;
	public $telefone;
	public $celular;


	public function __construct() {

		parent::__construct();
		
		if (isset($_POST['cadastrar'])) {

			$this->receber_posts_cadastro();

		}

		if (isset($_POST['logar'])) {

			$this->receber_posts_login();

		}

	}


	protected function receber_posts_cadastro() {

		$this->nome = $_POST['nome'];
		$this->email = $_POST['email'];
		$this->senha = $_POST['senha'];
		$this->senha2 = $_POST['senha2'];
		$this->sexo = $_POST['sexo'];
		$this->data_nascimento = $_POST['ano'] . "-" . $_POST['mes'] . "-" . $_POST['dia'];
		$this->telefone = $_POST['telefone'];
		$this->celular = $_POST['celular'];

	}


	protected function receber_posts_login() {

		$this->email = $_POST['email'];
		$this->senha = $_POST['senha'];

	}


	public function cadastrar() {

		if (isset($_POST['cadastrar'])) {

			if ($this->telefone == "") {$this->telefone = "DEFAULT";};
			if ($this->celular == "") {$this->celular = "DEFAULT";};


			// Verificando se as senhas são iguais e executando o cadastro no banco de dados

			if ($this->senha == $this->senha2) {

				$sql_cadastro = "INSERT INTO dados_usuario (Nome, Email, Senha, Sexo, Data_nascimento, Telefone, Celular) values ('$this->nome', '$this->email', '$this->senha', '$this->sexo', '$this->data_nascimento', $this->telefone, $this->celular);";


				if (mysqli_query($this->con, $sql_cadastro)) {

					// Se conseguir cadastrar

					$_SESSION['nome'] = $this->nome;
					$_SESSION['email'] = $this->email;

				}

			} else {

				echo "As senhas estão diferentes";

			}

		}
	}


	public function logar() {

		if (!$this->email == "" and !$this->senha == "") {

			$sql_login = "SELECT * FROM dados_usuario where Email = '$this->email' and Senha = '$this->senha'";

			if (mysqli_query($this->con, $sql_login)) {

				$resultado = mysqli_fetch_array(mysqli_query($this->con, $sql_login));


				if ($resultado['Email'] == $this->email) {

				// Se o login funcionar
					$_SESSION['nome'] = $this->nome;
					$_SESSION['email'] = $this->email;


				} else {

				// Se o login falhar
					die("Não funfo");

				}


			}

		}

	}

}









?>
