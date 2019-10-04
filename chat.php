<?php

require_once "classes/match.class.php";
require_once "classes/chat.class.php";


$matches = new Mostrar_matches();
$matches->mostrar();

$chat = new Chat();

if (isset($_GET['id'])) {
    $confirmacao = $matches->confirmar_match($_GET['id']);

    if ($confirmacao[0]['total'] == 0)
        die('Página não encontrada.');

    $id_chat = $_GET['id'];
}

?>
<!DOCTYPE html>
<head>

    <title>Chat</title>
    <meta charset="utf-8">

    <?php require_once "include/links.html"; ?>

</head>
<body>

    <!-- Navbar -->
    <?php require_once "include/navbar.php"; ?>

    <!-- Titulo -->
    <div class="container">
        <section class="intro-single margemEsquerda">
            <div class="row">
                <div class="col-12 mb-1 px-0">
                    <div class="title-single-box">
                        <h5>Meus bate-papos ativos!</h5>
                    </div>
                </div>

                <div class="col-12 mt-3 mb-2 px-4 ">
                    <div class="row ">
                        <?php if (count($matches->resultado) > 0) : ?>
                            <?php foreach ($matches->resultado as $chave => $valor) : ?>
                                <a href="chat.php?id=<?=$matches->resultado[$chave]['Id']; ?>" class="col-2 text-center user_matches pt-3 m-3">
                                    <img src="<?php
                                    if ($matches->resultado[$chave]['Foto'] <> null) {
                                        echo 'media/images/fotos_usuarios/'.$matches->resultado[$chave]['Foto'];
                                        } else {
                                            echo 'media/images/fotos_usuarios/avatar.png';
                                        }?>"
                                        class="img-fluid" style="border-radius: 100%; max-height: 75px;">
                                        <p class="mt-2 <?=((isset($_GET['id']) && ($matches->resultado[$chave]['Id'] == $_GET['id'])) ? 'chat_ativo' : '');?>"><?=utf8_encode($matches->resultado[$chave]['Nome']); ?></p>
                                    </a>
                                <?php endforeach; ?>
                                <?php else : ?>
                                    <p class="pt-3 col-12 text-center">Nenhum match até o momento! Conecte-se com alguém para iniciar um chat ;)</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if (!isset($_GET['id']) && count($matches->resultado) > 0) : ?>
                        <div class="col-12 text-center border rounded py-5">
                            <h5 style="color: #ebbf31;">Selecione um usuário para abrir o chat =)</h5>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['id'])) : ?>
                        <div class="col-12 text-center border rounded mt-2">
                            <div class="row">

                                <div class="col-12 pt-4 pb-0">

                                    <div id="mensagens"  style="overflow:auto; max-height: 500px; ">
                                        <?php
                                        $mensagens = $chat->todos_mensagem_por_usuario($_SESSION['dados']['Id'], $id_chat);

                                        if (count($mensagens) > 0) :
                                            foreach ($mensagens as $key => $mensagem) :
                                                if($mensagem['id_enviou'] == $matches->resultado[$chave]['Id']) {
                                                    echo '<div class="answer left mb-2 px-5">';
                                                    echo '<div class="text">' . utf8_encode($mensagem['mensagem']) . '</div>';
                                                    echo '<div class="time">'. date_format(date_create($mensagem['data_hora']),"d.m.y H:i") .'</div>';
                                                    echo '</div>';
                                                } elseif($mensagem['id_enviou'] == $_SESSION['dados']['Id']) {
                                                    echo '<div class="answer right mb-2 px-5">';
                                                    echo '<div class="text">'. utf8_encode($mensagem['mensagem']) .'</div>';
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
                                            <div class="col-12">
                                                <div class="form-group" >
                                                    <input type="hidden" id="id_enviou" name="id_enviou" value="<?=$_SESSION['dados']['Id']?>">
                                                    <input type="hidden" id="id_recebeu" name="id_recebeu" value="<?=$id_chat?>">
                                                    <input type="text" class="form-control m-0" id="mensagem" name="mensagem" placeholder="Digite aqui sua mensagem...">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </section>
            </div>

            
            <!-- Footer -->
            <?php require_once "include/footer.php"; ?>

            <!-- Botão de rolagem bottom/top -->
            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"><img style="border-radius: 100%; padding: 10px;" src="media/images/seta.jpg" height="44"></i></a>
            <div id="preloader"></div>

            <!-- Biblioteca Javascript -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

            <!-- NiceScroll -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>

            <!-- PopperJS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

            <!-- Biblioteca Boostrap -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

            <!-- Javascript Geral -->
            <script src="media/js/main.js"></script>

            <!-- Javascript Chat -->
            <script src="media/js/chat.js"></script>
        </body>
