<?php

    require_once "chat.class.php";

    $chat = new chat();

    if (isset($_POST['acao']) && $_POST['acao'] == "enviar") {

        $mensagem = $_POST['mensagem'];
        $id_enviou = $_POST['id_enviou'];
        $id_recebeu = $_POST['id_recebeu'];

        if ($chat->enviar_mensagem($mensagem, $id_enviou, $id_recebeu)) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif (isset($_POST['acao']) && $_POST['acao'] == "receber") {

        $id_enviou = $_POST['id_enviou'];
        $id_recebeu = $_POST['id_recebeu'];

        $sync = $chat->get_sincronizacao($id_enviou, $id_recebeu);

        if (isset($sync[0]['mensagem'])) {
            $chat->update_sync($sync[0]['id']);
            echo $sync[0]['mensagem'];
        } else {
            echo 0;
        }

    }

?>