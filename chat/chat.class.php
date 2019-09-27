<?php
require_once "../classes/site.class.php";
require_once "../classes/match.class.php";
class chat extends Site {

    public function todos_mensagem_por_usuario($usera, $userb) {
        $sql = "SELECT * FROM chat WHERE (id_enviou = $usera AND id_recebeu = $userb) OR (id_enviou = $userb AND id_recebeu = $usera)";
        $query = mysqli_query($this->con, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }


    public function click($mensagem, $id_enviou, $id_recebeu) {
        $sql = "INSERT INTO chat (id, mensagem, id_enviou, id_recebeu, data_hora ) VALUES (DEFAULT, '$mensagem', '$id_enviou', '$id_recebeu','" . date('Y-m-d H:i:s') . "')";
        if ( mysqli_query($this->con, $sql)) {
            return true;
        }else{
            return false;
        }

    }
}













?>