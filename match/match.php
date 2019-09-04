<?php

require_once "../classes/selects.class.php";

$teste = new Selects();

if (isset($_POST['Enviar'])) {

    $teste->select_pessoas();

}


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
    <link rel="stylesheet" type="text/css" href="media/css/padrao.css">
    <link rel="stylesheet" type="text/css" href="media/css/busca.css">
    <link rel="stylesheet" type="text/css" href="media/css/media.css">
    <title>Tinder</title>
</head>

<body>

<?php require_once "../include/navbar.php"; ?>


<content>
    <br><br><br><br><br><br>
    <div class="container-fluid ">

        <div class="row">
            <div class=" col-2 ">
                <div class="card mb-5 text-center" style="max-height: 30rem;  ">
                    <div class="card-body" style="overflow: auto;  ">

                        <form method="POST">

                            <h5 class="text-center">Filtros</h5>
                            Caso não marque nenhuma da opções será considerado que não se importa.<br><br><br>

                            Deve fumar?<br>
                            <input type="radio" name="Fuma" id="fsim"
                                   value="1" <?php if (isset($_POST['Fuma']) and ($_POST['Fuma'] == "1")) {
                                echo "checked=''";
                            } ?>>
                            <label for="fsim">Sim</label>
                            <input type="radio" name="Fuma" id="fnao"
                                   value="0" <?php if (isset($_POST['Fuma']) and ($_POST['Fuma'] == "0")) {
                                echo "checked=''";
                            } ?>>
                            <label for="fnao">Não</label><br><br><br>

                            Deve beber?<br>
                            <input type="radio" name="Bebe" id="bsim"
                                   value="1" <?php if (isset($_POST['Bebe']) and ($_POST['Bebe'] == "1")) {
                                echo "checked=''";
                            } ?>>
                            <label for="bsim">Sim</label>
                            <input type="radio" name="Bebe" id="bnao"
                                   value="0" <?php if (isset($_POST['Bebe']) and ($_POST['Bebe'] == "0")) {
                                echo "checked=''";
                            } ?>>
                            <label for="bnao">Não</label><br><br><br>

                            Deve ter animais?<br>
                            <input type="radio" name="Tem_animal" id="tasim"
                                   value="1" <?php if (isset($_POST['Tem_animal']) and ($_POST['Tem_animal'] == "1")) {
                                echo "checked=''";
                            } ?>>
                            <label for="tasim">Sim</label>
                            <input type="radio" name="Tem_animal" id="tanao"
                                   value="0" <?php if (isset($_POST['Tem_animal']) and ($_POST['Tem_animal'] == "0")) {
                                echo "checked=''";
                            } ?>>
                            <label for="tanao">Não</label><br><br><br>

                            Deve trabalhar?<br>
                            <input type="radio" name="Trabalha" id="trsim"
                                   value="1" <?php if (isset($_POST['Trabalha']) and ($_POST['Trabalha'] == "1")) {
                                echo "checked=''";
                            } ?>>
                            <label for="trsim">Sim</label>
                            <input type="radio" name="Trabalha" id="trnao"
                                   value="0" <?php if (isset($_POST['Trabalha']) and ($_POST['Trabalha'] == "0")) {
                                echo "checked=''";
                            } ?>>
                            <label for="trnao">Não</label><br><br><br>

                            Deve estudar?<br>
                            <input type="radio" name="Estuda" id="esim"
                                   value="1" <?php if (isset($_POST['Estuda']) and ($_POST['Estuda'] == "1")) {
                                echo "checked=''";
                            } ?>>
                            <label for="esim">Sim</label>
                            <input type="radio" name="Estuda" id="enao"
                                   value="0" <?php if (isset($_POST['Estuda']) and ($_POST['Estuda'] == "0")) {
                                echo "checked=''";
                            } ?>>
                            <label for="enao">Não</label><br><br><br>

                            <select class="select" name="Sexo">
                                <option value="Masculino" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "Masculino")) {
                                    echo "selected=''";
                                } ?>>Masculino
                                </option>
                                <option value="Feminino" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "Feminino")) {
                                    echo "selected=''";
                                } ?>>Feminino
                                </option>
                                <option value="NI" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "NI")) {
                                    echo "selected=''";
                                } ?>>Não me importo
                                </option>
                            </select><br><br><br>

                            Qual o máximo que deseja pagar?<br><br>
                            <span id="Porcentagem"><?php if (isset($_POST['Aceita_pagar'])) {
                                    echo $_POST['Aceita_pagar'];
                                } else {
                                    echo 0;
                                } ?></span>
                            <input id="Aceita_pagar" type="range" name="Aceita_pagar"
                                   oninput="getElementById('Porcentagem').innerHTML = this.value;"
                                   min="0" max="5000" value="<?php if (isset($_POST['Aceita_pagar'])) {
                                echo $_POST['Aceita_pagar'];
                            } else {
                                echo 0;
                            } ?>" step="50"/>

                           <br><br>

                            <button type="submit" name="Enviar" class="btn-block" id="jp">Enviar</button>

                        </form>


                        <div class="cartao">
                            <div class="div_foto"></div>
                            <div class="dados_user">
                                <h2><?= $teste->resultado['Nome'] ?></h2>
                                <div class="descricao"><?= $teste->resultado['Descricao'] ?></div>
                            </div>
                        </div>


                        <script type="text/javascript">

                            var $range = document.querySelector('#Aceita_pagar'),
                                $value = document.querySelector('span');

                            $range.addEventListener('#Aceita_pagar', function () {
                                $value.textContent = this.value;
                            });

                        </script>

                    </div>


                </div>
            </div>


            <div class="col-6 offset-2 text-center">

                <?php
                foreach ($b

                as $chave => $valor) {


                ?>

                <div class="card cardlike " style="display: none;">

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

    </div>


</content>




    <?php require_once "../include/footer.php"; ?>


<script src="match.js"></script>
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


