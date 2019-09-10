<?php
require_once "../classes/site.class.php";

class match extends Site
{


    protected $nome;
    protected $id;
    protected $a;
    protected $like;


    function like($id_recebe, $Id_da)
    {
        $acao = "like";

        $sql = "INSERT INTO like_deslike (deu, recebeu, acao ) VALUES ('$id_da', '$id_recebe', '$acao')";
        if (mysqli_query($this->con, $sql)) ;
        {
            return mysqli_fetch_all(mysqli_query($this->con, $sql), MYSQLI_ASSOC);
            echo "sucesso";


//        } else {

        }
        var_dump(like(5, 7));
        die(error_reporting());


    }
//
//
//    function dislike() {
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

$a = new match();
$a->like();
?>