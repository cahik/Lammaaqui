<?php

require_once "site.class.php";

class Selects extends Site {
    private $sql;
    private $Fuma;
    private $Aceita_fumar;
    private $Bebe;
    private $Aceita_beber;
    private $Tem_animal;
    private $Aceita_animais;
    private $Trabalha;
    private $Estuda;
    private $Aceita_genero;
    private $Aceita_pagar;
    private $Usuario;
    private $consulta;
    private $maior_idade;
    private $menor_idade;
    public $resultado;


    public function __construct() {

        parent::__construct();

        $this->Usuario = $_SESSION['dados'];

        if (isset($_POST['Enviar'])) {
            $this->receber_filtro();
        }

    }

    // Pegando os POSTS dos filtros do site de busca.
    private function receber_filtro() {

        $this->Fuma = (isset($_POST['Fuma']) ? $_POST['Fuma'] : "");
        $this->Bebe = (isset($_POST['Bebe']) ? $_POST['Bebe'] : "");
        $this->Tem_animal = (isset($_POST['Tem_animal']) ? $_POST['Tem_animal'] : "");
        $this->Trabalha = (isset($_POST['Trabalha']) ? $_POST['Trabalha'] : "");
        $this->Estuda = (isset($_POST['Estuda']) ? $_POST['Estuda'] : "");
        $this->Aceita_genero = $_POST['Sexo'];
        $this->Aceita_pagar = $_POST['Aceita_pagar'];
        $this->maior_idade = $_POST['maior_idade'];
        $this->menor_idade = $_POST['menor_idade'];
    }
    // Aplicando os filtros na busca pelo banco de dados, caso um dos filtros não seja preenchido deverá ser feita a pesquisa mesmo assim, somente deverá ser retirado do SQL.
    //IMPORTANTE!!! Se for adicionar mais filtros adicione antes dos "Aceita_pagar" no $this->sql.
    public function select_pessoas() {

        if (count($_POST) > 0) {

            // Se o Sexo for "Não me importo 'NI' ".
            if ($this->Aceita_genero == "NI" or $this->Aceita_genero == "") {
                $this->Aceita_genero = "";
            } else {
                $this->Aceita_genero = "Sexo = '$this->Aceita_genero' and";
            }

            if ($this->Fuma <> "") {
                if ($this->Fuma == '1') {
                    $this->Fuma = "";
                } else {
                    $this->Fuma = "Fuma = '$this->Fuma' and";
                }
            }

            if ($this->Bebe <> "") {
                if ($this->Bebe == '1') {
                    $this->Bebe = "";
                } else {
                    $this->Bebe = "Bebe = '$this->Bebe' and";
                }
            }

            if ($this->Tem_animal <> "") {
                if ($this->Tem_animal == '1') {
                    $this->Tem_animal = "";
                } else {
                    $this->Tem_animal = "Tem_animal = '$this->Tem_animal' and";
                }
            }

            if ($this->Trabalha <> "") {
                if ($this->Trabalha  == '0') {
                    $this->Trabalha = "";
                } else {
                    $this->Trabalha = "Trabalha = '$this->Trabalha' and";
                }
            }

            if ($this->Estuda <> "") {
                if ($this->Estuda  == '0') {
                    $this->Estuda = "";
                } else {
                    $this->Estuda = "Estuda = '$this->Estuda' and";
                }
            }

            // Montando o SQL, não deve ser adicionado "AND", a não ser que seja um caso especial, e pelo amor de Odin, não aperte "Enter" pra quebrar a linha.
            $this->sql = "SELECT * FROM dados_usuario WHERE $this->Aceita_genero $this->Fuma $this->Bebe $this->Tem_animal $this->Trabalha  $this->Estuda Aceita_pagar <= $this->Aceita_pagar and Fk_cidade = ".$_SESSION['dados']['Fk_cidade'];


            if ($query = mysqli_query($this->con, $this->sql)) {

                $this->resultado = array();

                // Pegando os resultados da query em forma de array.
                while ($this->consulta = mysqli_fetch_array($query)) {

                    $sqlverifica1 = " SELECT * FROM like_deslike WHERE deu = ".$_SESSION['dados']['Id']."  and recebeu = ".$this->consulta['Id'];
                    $query_verifica1 = mysqli_query($this->con, $sqlverifica1);

                    $sqlverifica2 = "SELECT * FROM like_deslike WHERE deu = ".$this->consulta['Id']."  and recebeu = ".$_SESSION['dados']['Id']." and acao = 'dislike'";
                    $query_verifica2 = mysqli_query($this->con, $sqlverifica2);

                    $sqlverifica3 = "SELECT * FROM matches WHERE Usuario_1 = ".$_SESSION['dados']['Id']." or Usuario_2 = ".$_SESSION['dados']['Id'];
                    $query_verifica3 = mysqli_query($this->con, $sqlverifica3);


                    $nascimento = $this->consulta['Data_nascimento'];                    
                    $atual = date('Y-m-d');
                    $idade = intval($atual) - intval($nascimento);

                    if ($idade >= $this->menor_idade and $idade <= $this->maior_idade) {

                        if (utf8_encode($this->consulta['Aceita_genero']) == $this->Usuario['Sexo'] || utf8_encode($this->consulta['Aceita_genero']) == "Não me importo") {

                            if ($this->consulta['Aceita_fumar'] == 1 or $this->consulta['Aceita_fumar'] == 0 and $this->Usuario['Fuma'] == 0) {

                                if ($this->consulta['Aceita_beber'] == 1 or $this->consulta['Aceita_beber'] == 0 and $this->Usuario['Bebe'] == 0) {

                                    if ($this->consulta['Aceita_animais'] == 1 or $this->consulta['Aceita_animais'] == 0 and $this->Usuario['Tem_animal'] == 0) {                                    

                                        if (mysqli_num_rows($query_verifica1) == 0 ) {

                                            if (mysqli_num_rows($query_verifica2) == 0 ) {

                                                if ($this->consulta['Id'] <> $this->Usuario['Id']) {

                                                    if (mysqli_num_rows($query_verifica3) == 0 ) {

                                                        $this->resultado[] = $this->consulta;

                                                    }

                                                }

                                            }

                                        }

                                    }

                                }

                            }

                        }

                    }//Fim dos ifs.

                }// Fim do while.

            }

        // Quando o usuário iniciar a tela de matches sem os filtros.
        } else {

            $this->sql = "SELECT * FROM dados_usuario where Id <> ".$_SESSION['dados']['Id']." and Fk_cidade = ". $_SESSION['dados']['Fk_cidade'];

            if ($query = mysqli_query($this->con, $this->sql)) {

                $this->resultado = array();

                // Pegando os resultados da query em forma de array.
                while ($this->consulta = mysqli_fetch_array($query)) {

                    $sqlverifica1 = " SELECT * FROM like_deslike WHERE deu = ".$_SESSION['dados']['Id']."  and recebeu = ".$this->consulta['Id'];
                    $query_verifica1 = mysqli_query($this->con, $sqlverifica1);

                    $sqlverifica2 = "SELECT * FROM like_deslike WHERE deu = ".$this->consulta['Id']."  and recebeu = ".$_SESSION['dados']['Id']." and acao = 'dislike'";
                    $query_verifica2 = mysqli_query($this->con, $sqlverifica2);

                    $sqlverifica3 = "SELECT * FROM matches WHERE (Usuario_1 = ".$_SESSION['dados']['Id']." and Usuario_2 = ".$this->consulta['Id'].") or (Usuario_2 = ".$_SESSION['dados']['Id']." and Usuario_1 = ".$this->consulta['Id'].");";
                    $query_verifica3 = mysqli_query($this->con, $sqlverifica3);


                    if (utf8_encode($this->consulta['Aceita_genero']) == $this->Usuario['Sexo'] || utf8_encode($this->consulta['Aceita_genero']) == "Não me importo") {

                        if ($this->consulta['Aceita_fumar'] == 1 or $this->consulta['Aceita_fumar'] == 0 and $this->Usuario['Fuma'] == 0) {

                            if ($this->consulta['Aceita_beber'] == 1 or $this->consulta['Aceita_beber'] == 0 and $this->Usuario['Bebe'] == 0) {

                                if ($this->consulta['Aceita_animais'] == 1 or $this->consulta['Aceita_animais'] == 0 and $this->Usuario['Tem_animal'] == 0) {                                    

                                    if (mysqli_num_rows($query_verifica1) == 0 ) {

                                        if (mysqli_num_rows($query_verifica2) == 0 ) {

                                            if ($this->consulta['Id'] <> $this->Usuario['Id']) {

                                                if (mysqli_num_rows($query_verifica3) == 0 ) {

                                                    $this->resultado[] = $this->consulta;

                                                }

                                            }

                                        }

                                    }

                                }

                            }

                        }

                    }// Fim dos ifs

                }// Fim do while

            } else {

                var_dump(mysqli_error($this->con));

            }

        }

    }

}


?>