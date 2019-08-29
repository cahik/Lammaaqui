<?php 

class Site {

	CONST HOST = "127.0.0.1";
	CONST USER = "root";
	CONST PASS = "";
	CONST DB   = "llamaaqu_master";

	protected $con;
	protected $sess;
	private $url;


	public function __construct() {

		$this->conexao();
		$this->session();

	}


	protected function conexao() {


		$this->con = mysqli_connect(self::HOST, self::USER, self::PASS, self::DB);


		if (!$this->con) {die("Não foi -> ".mysqli_connect_error());}

	}

	protected function session() {

		$this->sess = session_start();

		$this->url = $_SERVER["REQUEST_URI"];


		// if (!isset($_SESSION['logado']) || $_SESSION['logado'] <> true) {

		// 	if ($this->url == "/matutino/GitHub/llamaaqui/Login.php" || $this->url == "/matutino/GitHub/llamaaqui/Cadastro.php" || $this->url == "/matutino/GitHub/llamaaqui/pagina_404.php") {

		// 	} else {

		// 		$_SESSION['logado'] = false;
		// 		header("Location: pagina_404.php");

		// 	}

		// }

		//if (!isset($_SESSION['logado']) || $_SESSION['logado'] <> true) {

			//if ($this->url == "/matutino/GitHub/llamaaqui/Login.php" || $this->url == "/matutino/GitHub/llamaaqui/Cadastro.php" || $this->url == "/matutino/GitHub/llamaaqui/pagina_404.php") {

			//} else {

			//	$_SESSION['logado'] = false;
			//	header("Location: pagina_404.php");

			//}

		//}

	}


}



?>
