<nav class="navbar navbar-expand-lg navbar-dark" aria-label="Offcanvas navbar large">
    <div class="container-fluid">
        <a class="navbar-brand d-flex" id="logo1" href="index.php">Fortal<div id="logo2">Tech</div></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
                <h5 class="navbar-brand d-flex">Fortal<div class="text-primary">Tech</div>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <?php
                    $PAG_ATUAL = "$_SERVER[REQUEST_URI]";
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            if ("$_SERVER[REQUEST_URI]" == '/ft/index.php') {
                                                echo 'active';
                                            }
                                            ?>" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            if ("$_SERVER[REQUEST_URI]" == '/ft/produtos.php') {
                                                echo 'active';
                                            }
                                            ?>" href="produtos.php">Produtos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php
                                                            if ("$_SERVER[REQUEST_URI]" == '/ft/cadastrar.php' || "$_SERVER[REQUEST_URI]" == '/ft/entrar.php' || "$_SERVER[REQUEST_URI]" == '/ft/conta.php') {
                                                                echo 'active';
                                                            }
                                                            ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if (isset($_SESSION['id'])) {
                                echo '<li><a class="dropdown-item" href="conta.php">Conta</a></li>
                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#sair">Sair</button></li>';
                            } else {
                                echo '<li><a class="dropdown-item" href="cadastrar.php">Cadastrar</a></li>
                                        <li><a class="dropdown-item" href="entrar.php">Entrar</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3 mt-lg-0" role="search">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
                    <button class="btn" id="pesquisar-btn" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
</nav>