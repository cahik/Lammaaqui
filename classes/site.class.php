<?php 

date_default_timezone_set('America/Sao_Paulo');

class Site {

	// CONST HOST = "llamaaqui.ml:3306";
	// CONST USER = "llamaaqui";
	// CONST PASS = "entra21@Blusoft";
	// CONST DB   = "llamaaqu_master";

	// indapl48
	// entra21@Blusoft

	CONST HOST = "50.116.112.104:3306";
	CONST USER = "indapl48_gustavo";
	CONST PASS = "1234qwer";
	CONST DB   = "indapl48_llamaaqui";

	public $con;
	private $url;


	public function __construct() {

		$this->conexao();
		$this->session();

	}


	protected function conexao() {


		$this->con = mysqli_connect(self::HOST, self::USER, self::PASS, self::DB);


		if (!$this->con) {header("location: sem_conexao.php");}

	}

	protected function session() {

		if (session_status() !== PHP_SESSION_ACTIVE) {
			
			session_start();

		}

		$this->url = $_SERVER["REQUEST_URI"];

		if (isset($_GET['tk'])){
			$token = $_GET['tk'];
		}


		if (!isset($_SESSION['logado']) || $_SESSION['logado'] <> true) {

			if ($this->url == "/Lammaaqui/login.php" || $this->url == "/Lammaaqui/cadastro.php" || $this->url == "/Lammaaqui/index.php" || $this->url == "/Lammaaqui/sobre.php" || $this->url == "/Lammaaqui/contato.php" || $this->url == "/Lammaaqui/send_email.php" || $this->url == "/Lammaaqui/reset_senha.php?tk=".$token) {

			} else {

				$_SESSION['logado'] = false;
				header("Location: /Lammaaqui/index.php");

			}

		} elseif (isset($_SESSION['logado']) and $_SESSION['logado'] == true) {

			if ($this->url == "/Lammaaqui/login.php" || $this->url == "/Lammaaqui/cadastro.php") {

				header("Location: /Lammaaqui/perfil.php");

			}

		}

	}


}


?>
