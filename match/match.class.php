<?php

class match {


// Dados de acesso
    CONST HOST = "localhost:3306";
    CONST USER = "root";
    CONST PASS = "";
    CONST DB = "llamaaqu_master";

    protected $nome;
    protected $conexao;
    protected $id;
    protected $a;

    public function __construct()
    {

        $this->conexao();


    }

    protected function conexao()
    {


        //Conexão
        $this->conexao = mysqli_connect(self::HOST, self::USER, self::PASS, self::DB);

        //Verificando se foi efetuada com sucesso
        if (!$this->conexao) {
            die("ERRO: Não foi possível conectar => " . mysqli_connect_error());
        } else {


        }



    }

    public function receber_posts_login()
    {

        $sql = "SELECT * FROM dados_usuario";
        $query = mysqli_query($this->conexao, $sql);
        return mysqli_fetch_all($query, MYSQLI_ASSOC);




    }

    function like() {
        $like = $_POST['btnlike'];

//
//

//
//
//    function deslike() {
//
//
//
//
//
//    }
//
//
//
//
//}
//
//



}
}

?>