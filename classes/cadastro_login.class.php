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
	public $cidade;
	public $estado;
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

		$this->nome = utf8_decode($_POST['nome']);
		$this->email = utf8_decode($_POST['email']);
		$this->senha = utf8_decode($_POST['senha']);
		$this->senha2 = utf8_decode($_POST['senha2']);
		$this->sexo = $_POST['sexo'];
		$this->data_nascimento = $_POST['ano'] . "-" . $_POST['mes'] . "-" . $_POST['dia'];
		$this->telefone = $_POST['telefone'];
		$this->celular = $_POST['celular'];
		$this->cidade = $_POST['cidade'];
		$this->estado = utf8_decode($_POST['estado']);

	}

	// Recebe os posts do login
	protected function receber_posts_login() {

		$this->email = $_POST['email'];
		$this->senha = $_POST['senha'];

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


	// Função para fazer as verificações de cadastro e cadastrar
	public function cadastrar() {

		if (isset($_POST['cadastrar'])) {

			// Permitindo que o telefone e o celular possam ser nulos
			if ($this->telefone == "") {$this->telefone = "DEFAULT";} else {$this->explode_numero_telefone($this->telefone);}
			if ($this->celular == "") {$this->celular = "DEFAULT";} else {$this->explode_numero_celular($this->celular);}

			// Verificando se as senhas são iguais e executando o cadastro no banco de dados

			if ($this->senha == $this->senha2) {

				$this->sql = "INSERT INTO dados_usuario (Nome, Email, Senha, Sexo, Data_nascimento, Telefone, Celular, Fk_cidade, Fk_estado) values ('$this->nome', '$this->email', '$this->senha', '$this->sexo', '$this->data_nascimento', $this->telefone, $this->celular, $this->cidade, $this->estado);";


				if (mysqli_query($this->con, $this->sql)) {

					// Se conseguir cadastrar

					$this->sql = "SELECT * FROM dados_usuario join cidade ON cidade.Id_cidade = dados_usuario.Fk_cidade join estado on estado.Id_estado = dados_usuario.Fk_estado where Email = '$this->email' and Senha = '$this->senha';";

					$resultado = mysqli_fetch_array(mysqli_query($this->con, $this->sql));

					$_SESSION['logado'] = true;
					$_SESSION['dados'] = $resultado;
					header("location: /Lammaaqui/perfil.php");

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
			if ($query = mysqli_query($this->con, $this->sql)) {

				$resultado = mysqli_fetch_array($query);

				if ($resultado['Email'] == $this->email and $resultado['Senha'] == $this->senha) {

				// Se o login funcionar
					$_SESSION['logado'] = true;
					$_SESSION['dados'] = $resultado;
					header("location: /Lammaaqui/match/match.php");
				}
				
			} else {

				// Se o login falhar
				

			}

		}

	}

}



?>
