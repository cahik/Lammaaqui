<?php

require_once "../classes/match.class.php";
require_once "chat.class.php";


$a = new Mostrar_matches();
$a->mostrar();

$chat = new Chat();

if (isset($_GET['id'])) {
    $id_chat = $_GET['id'];
}

?>
<!DOCTYPE html>
<head>

    <title>Tinder</title>
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Estilos CSS Match-->
    <link href="../media/css/match.css" rel="stylesheet" type="text/css">
    <link href="../media/css/busca.css" rel="stylesheet" type="text/css">
    <link href="../media/css/style.css" rel="stylesheet" type="text/css">
    <link href="../media/css/barra.css" rel="stylesheet" type="text/css">
    <link href="chat.css" rel="stylesheet" type="text/css">

    <!-- Estilos Gerais -->
    <link href="../media/css/barra.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

</head>
<body>

    <!-- Navbar -->
    <?php require_once "../include/navbar.php"; ?>

    <!-- Titulo -->
    <div class="container">
        <section class="intro-single margemEsquerda">
            <div class="row">
                <div class="col-12 mb-1 px-0">
                    <div class="title-single-box">
                        <h5>Meus bate-papos ativos!</h5>
                    </div>
                </div>

                <div class="col-12 mt-3 mb-2 px-4">
                    <div class="row">
                        <?php if (count($a->resultado) > 0) : ?>
                            <?php foreach ($a->resultado as $chave => $valor) : ?>
                            <a href="chat_teste.php?id=<?=$a->resultado[$chave]['Id']; ?>" class="col-2 text-center user_matches pt-3">
                                <img src="<?php
                                            if ($a->resultado[$chave]['Foto'] <> null) {
                                                echo '../media/images/fotos_usuarios/'.$a->resultado[$chave]['Foto'];
                                            } else {
                                                echo '../media/images/fotos_usuarios/avatar.png';
                                            }?>"
                                     class="img-fluid" style="border-radius: 100%; max-height: 75px;">
                                <p class="mt-2 <?=((isset($_GET['id']) && ($a->resultado[$chave]['Id'] == $_GET['id'])) ? 'chat_ativo' : '');?>"><?=$a->resultado [$chave]['Nome']; ?></p>
                            </a>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="pt-3 col-12 text-center">Nenhum match até o momento! Conecte-se com alguém para iniciar um chat ;)</p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (!isset($_GET['id']) && count($a->resultado) > 0) : ?>
                <div class="col-12 text-center border rounded py-5">
                    <h5 style="color: #ebbf31;">Selecione um usuário para abrir o chat =)</h5>
                </div>
                <?php endif; ?>

                <?php if (isset($_GET['id'])) : ?>
                <div class="col-12 text-center border rounded mt-2">
                    <div class="row">

                        <div class="col-12 pt-4">

                            <div id="mensagens">
                                <?php
                                    $mensagens = $chat->todos_mensagem_por_usuario($_SESSION['dados']['Id'], $id_chat);

                                    if (count($mensagens) > 0) :
                                        foreach ($mensagens as $key => $mensagem) :
                                            if($mensagem['id_enviou'] == $a->resultado[$chave]['Id']) {
                                                echo '<div class="answer left mb-2 px-5">';
                                                echo '<div class="text">' . $mensagem['mensagem'] . '</div>';
                                                echo '<div class="time">'. date_format(date_create($mensagem['data_hora']),"d.m.y H:i") .'</div>';
                                                echo '</div>';
                                            } elseif($mensagem['id_enviou'] == $_SESSION['dados']['Id']) {
                                                echo '<div class="answer right mb-2 px-5">';
                                                echo '<div class="text">'. $mensagem['mensagem'] .'</div>';
                                                echo '<div class="time">'. date_format(date_create($mensagem['data_hora']),"d/m/y H:i") .'</div>';
                                                echo '</div>';
                                            }
                                        endforeach;
                                    else : ?>
                                        <p class="mt-4 mb-5 text-center">
                                            Vocês se conectaram recentemente! Inicie uma conversa =)
                                        </p>
                                <?php
                                    endif;
                                ?>
                            </div>

                            <div class="row bg-highlight-sidebar pt-3">
                                <div class="col-10">
                                    <div class="form-group">
                                        <input type="hidden" id="id_enviou" name="id_enviou" value="<?=$_SESSION['dados']['Id']?>">
                                        <input type="hidden" id="id_recebeu" name="id_recebeu" value="<?=$id_chat?>">
                                        <input type="text" class="form-control" id="mensagem" name="mensagem">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-warning cor_botao" id="botao_enviar">
                                        Enviar
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </section>
    </div>

    <!-- Spinner dourada -->
    <div id="preloader"></div>

    <!-- Footer -->
    <?php require_once "../include/footer.php"; ?>

    <!-- Biblioteca Javascript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- NiceScroll -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>

    <!-- PopperJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!-- Biblioteca Boostrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Javascript Geral -->
    <script src="../media/js/main.js"></script>

    <!-- Javascript Chat -->
    <script src="chat.js"></script>
</body>
