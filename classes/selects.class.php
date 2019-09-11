<?php
require_once "site.class.php";
error_reporting();
class Selects extends Site
{
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
    public function __construct()
    {
        parent::__construct();
        if (isset($_POST['Enviar'])) {
            $this->receber_filtro();
        }
    }
    // Pegando os POSTS dos filtros do site de busca.
    private function receber_filtro()
    {
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
    public function select_pessoas()
    {
        if (count($_POST) > 0) {
            // Se o Sexo for "Não me importo 'NI' ".
            if ($this->Aceita_genero == "NI" or $this->Aceita_genero == "") {
                $this->Aceita_genero = "";
            } else {
                $this->Aceita_genero = "Sexo = '$this->Aceita_genero' and";
            }
            // Verificando se os POSTS estão setados, se não, eles ficam como "Não me importo '' ".
            if (!$this->Fuma == "") {
                $this->Fuma = "Fuma = '$this->Fuma' and";
            }
            if (!$this->Bebe == "") {
                $this->Bebe = "Bebe = '$this->Bebe' and";
            }
            if (!$this->Tem_animal == "") {
                $this->Tem_animal = "Tem_animal = '$this->Tem_animal' and";
            }
            if (!$this->Trabalha == "") {
                $this->Trabalha = "Trabalha = '$this->Trabalha' and";
            }
            if (!$this->Estuda == "") {
                $this->Estuda = "Estuda = '$this->Estuda' and";
            }
            // Montando o SQL, não deve ser adicionado "AND", a não ser que seja um caso especial, e pelo amor de Odin, não aperte "Enter" pra quebrar a linha.
            $this->sql = "SELECT * FROM dados_usuario WHERE $this->Aceita_genero $this->Fuma $this->Bebe $this->Tem_animal $this->Trabalha  $this->Estuda Aceita_pagar <= $this->Aceita_pagar;";
            if ($query = mysqli_query($this->con, $this->sql)) {
                $this->resultado = array();
                // Pegando os resultados da query em forma de array.
                while ($this->consulta = mysqli_fetch_array($query)) {
                    $sqlverifica =" SELECT * FROM like_deslike WHERE deu = ". $_SESSION['dados']['Id']."  and recebeu = ".$this->consulta['Id'].";";
                    $query_verifica = mysqli_query($this->con, $sqlverifica);
                    $nascimento = $this->consulta['Data_nascimento'];
                    $atual = date('Y-m-d');
                    $idade = intval($atual) - intval($nascimento);
                    if ($this->consulta['Aceita_genero'] == $this->Usuario['Sexo'] || $this->consulta['Aceita_genero'] == "Não me importo") {
                        if ($this->consulta['Aceita_fumar'] == 1 or $this->consulta['Aceita_fumar'] == 0 and $this->Usuario['Fuma'] == 0) {
                            if ($this->consulta['Aceita_beber'] == 1 or $this->consulta['Aceita_beber'] == 0 and $this->Usuario['Bebe'] == 0) {
                                if ($this->consulta['Aceita_animais'] == 1 or $this->consulta['Aceita_animais'] == 0 and $this->Usuario['Tem_animal'] == 0) {
                                    if ($idade >= $this->menor_idade and $idade <= $this->maior_idade) {
                                        if (mysqli_num_rows($query_verifica) == 0 ) {
                                            $this->resultado[] = $this->consulta;
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
            $this->sql = "SELECT * FROM dados_usuario;";
            if ($query1 = mysqli_query($this->con, $this->sql)) {
                $this->resultado = array();
                // Pegando os resultados da query em forma de array.
                while ($this->consulta = mysqli_fetch_array($query1)) {
                    $sqlverifica = " SELECT * FROM like_deslike WHERE deu = " . $_SESSION['dados']['Id'] . "  and recebeu = " . $this->consulta['Id'];
                    $query2 = mysqli_query($this->con, $sqlverifica);
                    if (mysqli_num_rows($query2) == 0) {
                        $this->resultado[] = $this->consulta;
                    }
                }
//                var_dump($this->resultado);
            } else {
                var_dump(mysqli_error($this->con));
            }
        }
    }
}
?>