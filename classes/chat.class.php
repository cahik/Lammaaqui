<?php

    require_once "site.class.php";
    require_once "match.class.php";

    class chat extends Site {

        public function todos_mensagem_por_usuario($usera, $userb) {
            $sql = "SELECT * FROM chat WHERE (id_enviou = $usera AND id_recebeu = $userb) OR (id_enviou = $userb AND id_recebeu = $usera) ORDER BY data_hora ASC";
            $query = mysqli_query($this->con, $sql);
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $this->update_all_sync($result);
            return $result;
        }

        public function get_sincronizacao($enviou, $recebeu) {
            $sql = "SELECT * FROM chat WHERE (id_enviou = $recebeu AND id_recebeu = $enviou) AND sync_recebeu = 0 ORDER BY data_hora ASC LIMIT 0,1";
            $query = mysqli_query($this->con, $sql);
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $result;
        }

        public function update_sync($id_sync) {
            $sql = "UPDATE chat SET sync_recebeu = 1 WHERE id = $id_sync";
            $query = mysqli_query($this->con, $sql);
        }

        public function update_all_sync($mensagens) {
            foreach ($mensagens as $k => $v) {
                if ($mensagens[$k]['sync_recebeu'] == 0 && $mensagens[$k]['id_recebeu'] == $_SESSION['dados']['Id']) {
                    $sql = "UPDATE chat SET sync_recebeu = 1 WHERE id = {$mensagens[$k]['id']}";
                    $query = mysqli_query($this->con, $sql);
                }
            }
        }

        public function enviar_mensagem($mensagem, $id_enviou, $id_recebeu) {
            $sql = "INSERT INTO chat (id, mensagem, id_enviou, id_recebeu, sync_enviou, sync_recebeu, data_hora ) VALUES (DEFAULT, '$mensagem', '$id_enviou', '$id_recebeu', 1, 0, '" . date('Y-m-d H:i:s') . "')";
            if ( mysqli_query($this->con, $sql)) {
                return true;
            } else {
                return false;
            }
        }

    }

?>