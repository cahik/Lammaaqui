<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <a class="navbar-brand text-brand" href="index.php">Llama<span class="color-b">Aqui</span></a>
    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sobre.php">Sobre</a>
            </li>

<?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) { ?>

            <li class="nav-item">
                <a class="nav-link" href="perfil.php">Perfil</a>
            </li>

        <?php } ?>



            <li class="nav-item">
                <a class="nav-link" href="contato.php">Contato</a>
            </li>
        </ul>
    </div>
    <button type="button" class="btn btn-b-n d-none d-md-block">Login</button>
     &nbsp;
    <button type="button" class="btn btn-b-n d-none d-md-block">Cadastro</button>
</div>
</nav>
