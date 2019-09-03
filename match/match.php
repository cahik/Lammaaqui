<?php


require_once "match.class.php";
$a = new match();
$b = $a->receber_posts_login();


?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="match.css">
    <title>Tinder</title>
</head>

<body>

<?php require_once "../include/navbar.php"; ?>


<content>
    <br><br><br><br><br><br>
    <div class="container-fluid ">

        <div class="row">
            <div class="col-2">
                <div class="card">
                    <div class="card-body">
                        <form method="get">
                            <h5 class="card-title text-center">Filtros</h5>
                            <h6 class="card-subtitle mb-2 text-muted">tipos de pessoas que você procura</h6>
                            <!--                         filtros--><p>
                                <input type="checkbox" name="Aceita_fumar"> Fumante</p>

                            <p><input type="checkbox" name="Aceita_beber"> pessoas que bebe as vezes</p>

                            <p><input type="checkbox" name="Aceita_animais"> pessoas que tenha animais</p>

                            <p><input type="checkbox" name="Trabalha"> pessoa que trabalham</p>

                            <p><input type="checkbox" name="Estuda"> Estudante</p>

                            <label for="customRange3"> pessoa que possam pagar até ...</label>
                            <input type="range" class="custom-range" min="0" max="50000" step="1" id="customRange3"
                                   name="Aceita_pagar">

                            <p><input type="checkbox" name="Femenino"> Mulheres  <br> <input type="checkbox" name="Masculino">
                                Homens</p>


                            <form action=pesquisar method=get >
                                <input type=submit value='pesquisar' />
                            </form>
                        </form>
                    </div>
                </div>


            </div>
            <div class="col-6 offset-2 text-center">

                <?php
                foreach ($b

                as $chave => $valor) {


                ?>

                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title mb-3"> <?= $b[$chave]['Nome'] ?> </h5>
                        <h6 class="card-subtitle mb-2 text-muted"><img id="foto" src="img/elenice.jpg"></h6>
                        <p class="card-text"><?= $b[$chave]['Descricao'] ?></p>
                        <div id="botao"
                        <button type="buttton" name="usuario_deu" class="btn" onclick="like()"><img id="like"
                                                                                                    src="img/like.png">
                        </button>
                        <button type="button" name="bntdeslike" class="btn" onclick="deslike()"><img id="deslike"
                                                                                                     src="img/dislike.png">
                        </button>
                    </div>

                </div>
            </div>


            <?php
            }
            ?>
        </div>
    </div>

    </div>

</content>


<footer>

    <?php require_once "../include/footer.php"; ?>
</footer>

<script src="index.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>




