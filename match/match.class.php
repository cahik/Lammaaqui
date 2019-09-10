<?php
require_once "../classes/site.class.php";

class match extends Site
{








   public function like($id_recebe, $Id_da){
        $sqlverifica = "SELECT * FROM like_deslike where deu = $Id_da and recebeu = $id_recebe and acao = 'like';";
        $resultado = mysqli_fetch_all( mysqli_query($this->con, $sqlverifica));
        if (mysqli_num_row(mysqli_query($this->con, $sqlverifica))>0 ) {
            return"ja tem";
        } else{




        $acao = "like";

        $sql = "INSERT INTO like_deslike (deu, recebeu, acao ) VALUES ('$Id_da', '$id_recebe', '$acao')";
        return mysqli_query($this->con, $sql);

       }

    }


    public function dislike($id_recebe, $Id_da) {

        $sqlverifica = "SELECT * FROM like_deslike where deu = $Id_da and recebeu = $id_recebe and acao = 'dislike';";
        $resultado = mysqli_fetch_all( mysqli_query($this->con, $sqlverifica));
        if (mysqli_num_row(mysqli_query($this->con, $sqlverifica))>0 ) {
            return"ja tem";
        } else{




            $acao = "dislike";

            $sql = "INSERT INTO like_deslike (deu, recebeu, acao ) VALUES ('$Id_da', '$id_recebe', '$acao')";
            return mysqli_query($this->con, $sql);

        }




    }




}







?>