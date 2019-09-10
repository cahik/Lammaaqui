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
                <a class="nav-link" href="/Lammaaqui/index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Lammaaqui/sobre.php">Sobre</a>
            </li>

<?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) { ?>

            <li class="nav-item">
                <a class="nav-link" href="/Lammaaqui/perfil.php">Perfil</a>
            </li>

        <?php } ?>



            <li class="nav-item">
                <a class="nav-link" href="/Lammaaqui/contato.php">Contato</a>
            </li>

            <li class="nav-item">
                <a href="login.php" class="d-block d-md-none btn nav-link btn-b-n">Login</a>     
            </li>

            <li class="nav-item">
                <a href="cadastro.php" class="d-block d-md-none btn nav-link btn-b-n">Cadastro</a>     
            </li>

        </ul>
    </div>

    <a href="/Lammaaqui/login.php" class="btn btn-b-n d-none d-md-block">Login</a>
    <a href="/Lammaaqui/cadastro.php" class="btn btn-b-n d-none d-md-block">Cadastro</a>

</div>
</nav>
