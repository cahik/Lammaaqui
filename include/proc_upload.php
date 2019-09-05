<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

<?php 
// Conexão banco de dados
include_once ("../classes/site.class.php");
$arquivo = $_FILES['arquivo']['name'];

// Pasta onde o arquivo será salvo
$_UP['pasta'] = '../media/fotos_usuarios/';

//Tamanho máximo do arquivo em Bytes
$_UP['tamanho'] = 1024*1024*100; //5mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('png','jpg','jpeg','gif');

// Renomeiar
$_UP['renomeia'] = false;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem de erro
if($_FILES['arquivo']['error'] != 0){
	die("Não foi possível fazer o upload, erro: <br />".$_UP['erros'][$_FILES['arquivo']['error']]);
	exit; // Para a executção do script
}

// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
			if(array_search($extensao, $_UP['extensoes'])=== false){		
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Lammaaqui/include/upload_imagem.php'>
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada, extensão inválida.\");
					</script>
				";
			}

			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Lammaaqui/include/upload_imagem.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
			}
			
			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
			else{
				//Primeiro verifica se deve trocar o nome do arquivo
				if($UP['renomeia'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$nome_final = time().'.jpg';
				}else{
					//mantem o nome original do arquivo
					$nome_final = $_FILES['arquivo']['name'];
				}
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){

					//Upload efetuado com sucesso, exibe a mensagem
					$query = mysqli_query($conn, "INSERT INTO dados_usuarios (
						Foto) VALUES ('$nome_final')");
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Lammaaqui/include/upload_imagem.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem cadastrada com sucesso.\");
						</script>
					";	
				}else{
					//Upload não efetuado, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Lammaaqui/include/upload_imagem.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada.\");
						</script>
					";
				}
			}
			
			
		?>
		
?>
</body>
</html>