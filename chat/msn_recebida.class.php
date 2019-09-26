
<?php  





require_once "chat.class.php";

class msn_recebida extends chat {

	public $id;
	public $msn_recebida;
	public $msn_enviada;
	





// Função que procura mensagem po ID
	public	function select_msn () {

$this->id = $_POST['id'];
$this->msn_enviada = $_POST['msn_enviada'];
$this->msn_recebida = $_POST['msn_recebida'];
$this->fk_recebida = $_POST['fk_recebida'];
$this->fk_enviada = $_POST['fk_enviada'];


		$sql = "SELECT * FROM mensagens WHERE id =". $this->id;
		$query = mysqli_query($this->conexao, $sql) ;
			
	
// $sql = "INSERT INTO mensagens VALUES  (DEFAULT, '$msn_recebida', '$msn_enviada' );";


$query = mysqli_query($this->conexao, $sql) ;
if (mysqli_query($this->conexao, $sql)) {
		echo "sucesso";

} else{
	echo "error_reporting()";
}
}

	}




	?>