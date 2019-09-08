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
	private $sql;


	public function __construct() {

		parent::__construct();
		
		if (isset($_POST['cadastrar'])) {

			$this->receber_posts_cadastro();

		}

		if (isset($_POST['logar'])) {

			$this->receber_posts_login();

		}

	}


	// Recebe os posts do cadastro
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

	// Recebe os posts do login
	protected function receber_posts_login() {

		$this->email = $_POST['email'];
		$this->senha = $_POST['senha'];

	}

	// Função para fazer as verificações de cadastro e cadastrar
	public function cadastrar() {

		if (isset($_POST['cadastrar'])) {

			// Permitindo que o telefone e o celular possam ser nulos
			if ($this->telefone == "") {$this->telefone = "DEFAULT";};
			if ($this->celular == "") {$this->celular = "DEFAULT";};


			// Verificando se as senhas são iguais e executando o cadastro no banco de dados

			if ($this->senha == $this->senha2) {

				$this->sql = "INSERT INTO dados_usuario (Nome, Email, Senha, Sexo, Data_nascimento, Telefone, Celular) values ('$this->nome', '$this->email', '$this->senha', '$this->sexo', '$this->data_nascimento', $this->telefone, $this->celular);";


				if (mysqli_query($this->con, $this->sql_cadastro)) {

					// Se conseguir cadastrar

					$this->sql = "SELECT * FROM dados_usuario join cidade ON cidade.Id_cidade = dados_usuario.Fk_cidade join estado on estado.Id_estado = dados_usuario.Fk_estado where Email = '$this->email' and Senha = '$this->senha';";

					$resultado = mysqli_fetch_array(mysqli_query($this->con, $this->sql));

					$_SESSION['logado'] = true;
					$_SESSION['dados'] = $resultado;

				} else {

					// Se não for o cadastro

				}

			} else {

				// Se as senahs forem diferentes

			}

		}
	}


	public function logar() {

		// Verificando se os inputs não são nulos e executando o login
		if (!$this->email == "" and !$this->senha == "") {

			$this->sql = "SELECT * FROM dados_usuario join cidade ON cidade.Id_cidade = dados_usuario.Fk_cidade join estado on estado.Id_estado = dados_usuario.Fk_estado where Email = '$this->email' and Senha = '$this->senha';";

			// Se a CONSULTA funcionar
			if (mysqli_query($this->con, $this->sql)) {

				$resultado = mysqli_fetch_array(mysqli_query($this->con, $this->sql));


				if ($resultado['Email'] == $this->email and $resultado['Senha'] == $this->senha) {

				// Se o login funcionar
					$_SESSION['logado'] = true;
					$_SESSION['dados'] = $resultado;
					//header("location: ");
				}
				
			} else {

				// Se o login falhar
				die("Não funfo");

			}

		}

	}

}



?>
