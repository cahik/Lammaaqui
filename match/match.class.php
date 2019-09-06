<?php
require_once "../classes/site.class.php";

class match extends Site
{


    protected $nome;
    protected $id;
    protected $a;
    protected $like;


    function like()
    {

        $sql = "SELECT * FROM like_deslike";
        if (mysqli_query($this->con, $sql)) ; {

            return  mysqli_fetch_all(mysqli_query($this->con, $sql), MYSQLI_ASSOC);
        echo "sucesso";

//        } else {

    }




    }
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

$a = new match();
$a->like();
?>