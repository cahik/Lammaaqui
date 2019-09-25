<link rel="stylesheet" type="text/css" href="media/llama.css">
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top pb-3">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <!-- aqui é o logo animado -->
        <div style="background-size: 70px;">
            <a class="llama" href="#"></a>
            <a class="navbar-brand text-brand " href="index.php">Llama<span class="color-b">Aqui</span></a>
        </div>

        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">

            <?php if (isset($_SESSION['logado']) and $_SESSION['logado'] == true) { ?>

                <ul class="navbar-nav ml-auto mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/Lammaaqui/match.php">Match</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/Lammaaqui/perfil.php">Perfil</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/Lammaaqui/contato.php">Contato</a>
                    </li>

                </ul>

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item d-md-block d-none">
                        <a class="nav-link"><?php if ($_SESSION['dados']['Sexo'] == 'Masculino') {echo "Bem Vindo!";} else {echo "Bem Vinda!";} ?></a>
                    </li>

                    <li class="nav-item d-md-block d-none">
                        <img src="<?php 
                        
                        if ($_SESSION['dados']['Foto'] <> null) {

                           echo 'media/images/fotos_usuarios/'.$_SESSION['dados']['Foto'];

                           } else {

                            echo 'media/images/fotos_usuarios/avatar.png';

                        }

                        ?>" id="foto_nav">

                    </li>

                    <li class="nav-item">
                        <a href="/Lammaaqui/logout.php" class="d-none d-md-block btn btn-b-n">Sair</a>
                    </li>

                    <li class="nav-item">
                        <a href="/Lammaaqui/logout.php" class="d-block d-md-none btn btn-b-n">Sair</a>
                    </li>

                </ul>

            <?php } 

            if (!isset($_SESSION['logado']) || $_SESSION['logado'] <> true) { ?>

                <ul class="navbar-nav ml-auto mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/Lammaaqui/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Lammaaqui/sobre.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Lammaaqui/contato.php">Contato</a>
                    </li>

                </ul>

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a href="login.php" class="d-block d-md-none btn btn-b-n">Login</a>     
                    </li>

                    <li class="nav-item">
                        <a href="cadastro.php" class="d-block d-md-none btn btn-b-n">Cadastro</a>     
                    </li>

                    <li>          
                        <a href="/Lammaaqui/login.php" class="d-none d-md-block btn btn-b-n">Login</a>
                    </li>

                    <li> 
                        <a href="/Lammaaqui/cadastro.php" class="d-none d-md-block btn btn-b-n">Cadastro</a>
                    </li>

                </ul>

            <?php } ?>

        </div>
    </div>
</nav>
