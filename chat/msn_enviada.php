
<?php


require_once "chat.php";

class msn_enviada extends chat {

	public $id;
	public $msn_recebida;
	public $msn_enviada;
	



// função que recebe a mensagem
	public	function  recebe_msn () {

	// Recendo as informações para salvar


// verificar o botão Salvar
if (isset($_POST['btnSalvar'])) {
// recebendo nome do aluno para salvar	
	$msn_enviada = $_POST['msn_enviada'];


		// $this->id = $_POST['id'];
		$this->msn_recebida = $_POST['msn_recebida'];
		$this->msn_enviada = $_POST['msn_enviada'];


$sql = "INSERT INTO mensagens VALUES  (DEFAULT , '$this->msn_recebida', '$this->msn_enviada' );";
$query = mysqli_query($this->conexao, $sql) ;
if (mysqli_query($this->conexao, $sql)) {
		echo "sucesso";

} else{
	echo "error_reporting()";
}
}
}
		
	


}


?>