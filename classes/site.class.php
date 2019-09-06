<?php 

class Site {

	 // CONST HOST = "127.0.0.1";
	 // CONST USER = "root";
	 // CONST PASS = "";
	 // CONST DB   = "llamaaqu_master";

	CONST HOST = "llamaaqui.ml:3306";
	CONST USER = "llamaaqui";
	CONST PASS = "entra21@Blusoft";
	CONST DB   = "llamaaqu_master";

	protected $con;
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

//
//		 if (!isset($_SESSION['logado']) || $_SESSION['logado'] <> true) {
//
//		 	if ($this->url == "/matutino/GitHub/llamaaqui/Login.php" || $this->url == "/matutino/GitHub/llamaaqui/Cadastro.php" || $this->url == "/matutino/GitHub/llamaaqui/pagina_404.php") {
//
//		 	} else {
//
//		 		$_SESSION['logado'] = false;
//		 		header("Location: pagina_404.php");
//
//		 	}
//
//		 }
//
//		 if (!isset($_SESSION['logado']) || $_SESSION['logado'] <> true) {
//
//		 	if ($this->url == "/matutino/GitHub/llamaaqui/Login.php" || $this->url == "/matutino/GitHub/llamaaqui/Cadastro.php" || $this->url == "/matutino/GitHub/llamaaqui/pagina_404.php") {
//
//		 	} else {
//
//		 		$_SESSION['logado'] = false;
//		 		header("Location: pagina_404.php");
//
//		 	}
//
//		 }

	}


}



?>
