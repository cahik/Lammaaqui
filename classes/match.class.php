<?php

require_once "site.class.php";

class match extends Site {

    public function like($id_recebe, $Id_da) {

        $sqlverifica = "SELECT * FROM like_deslike where (deu = $Id_da and recebeu = $id_recebe) or (deu = $id_recebe and recebeu = $Id_da) and acao = 'like';";
        $query = (mysqli_query($this->con, $sqlverifica));
        $resultado = mysqli_fetch_all($query);

        if (mysqli_num_rows($query) == 0) {

            $sql = "INSERT INTO like_deslike (deu, recebeu, acao ) VALUES ('$Id_da', '$id_recebe', 'like')";

            return mysqli_query($this->con, $sql);

        } elseif ($resultado[0][1] == $id_recebe and $resultado[0][2] == $Id_da) {

            $sql = "INSERT INTO matches VALUES (DEFAULT, '$Id_da', '$id_recebe', '".date('Y-m-d H:i:s')."')";

            if (mysqli_query($this->con, $sql)) {

                $sql = "DELETE FROM like_deslike where deu = $id_recebe and recebeu = $Id_da;";
                
                mysqli_query($this->con, $sql);

                $sql2 = "INSERT INTO notificacoes values (DEFAULT, $id_recebe, $Id_da, '".date('Y-m-d H:i:s')."')";

                mysqli_query($this->con, $sql2);

            }

        }

    }


    public function dislike($id_recebe, $Id_da) {

        $sqlverifica = "SELECT * FROM like_deslike where deu = $Id_da and recebeu = $id_recebe and acao = 'dislike';";
        $query = mysqli_query($this->con, $sqlverifica);
        $resultado = mysqli_fetch_all($query);

        if (mysqli_num_rows($query)>0 ) {

           die('ja tem');

       } else {

         $sql = "INSERT INTO like_deslike (deu, recebeu, acao ) VALUES ('$Id_da', '$id_recebe', 'dislike')";

         return mysqli_query($this->con, $sql);

     }
 }

}


class Mostrar_matches extends Site {

    private $sql;
    private $query;
    private $consulta;
    private $Usuario;
    public $resultado;


    public function mostrar() {

        $this->sql = "SELECT * FROM matches where Usuario_1 = ".$_SESSION['dados']['Id']." or Usuario_2 = ".$_SESSION['dados']['Id'];

        $this->resultado = array();

        if ($this->query = mysqli_query($this->con, $this->sql)) {

            $this->consulta = mysqli_fetch_all($this->query, MYSQLI_ASSOC);
            
            foreach ($this->consulta as $chave => $valor) {


                if ($this->consulta[$chave]['Usuario_1'] == $_SESSION['dados']['Id']) {

                    $this->Usuario = $this->consulta[$chave]['Usuario_2'];

                } else {

                    $this->Usuario = $this->consulta[$chave]['Usuario_1'];

                }

                $this->sql = "SELECT * FROM dados_usuario where Id = $this->Usuario";
                $this->query = mysqli_query($this->con, $this->sql);

                $this->resultado[] = mysqli_fetch_array($this->query);
                $this->resultado[$chave]['Id_match'] = $this->consulta[$chave]['Id'];


            }


        }


    }

    public function confirmar_match($id) {
        $sql = "SELECT count(*) AS total FROM matches WHERE (Usuario_1 = {$_SESSION['dados']['Id']} AND Usuario_2 = $id) OR (Usuario_1 = $id AND Usuario_2 = {$_SESSION['dados']['Id']})";
        $query = mysqli_query($this->con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    public function deletar_match($id_match) {

        $this->sql = "DELETE FROM matches where Id = $id_match";
        return mysqli_query($this->con, $this->sql);

    }

}



?>
