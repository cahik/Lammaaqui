<?php 

require_once"site.class.php";

/**
* 
*/
class Perfilmatch extends Site {

		public $resultados;
		public $a;


		public function __construct() {

		parent::__construct();
		
		}

	public function perfilmatch($Id)
	
	{

	
		$sql = "SELECT * FROM dados_usuario join cidade on cidade.Id_cidade = dados_usuario.Fk_cidade join estado on estado.Id_estado = dados_usuario.Fk_estado WHERE Id = $Id";
		
		return mysqli_fetch_array(mysqli_query($this->con, $sql));
			
	}
}


