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
}










?>