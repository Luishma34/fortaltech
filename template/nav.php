<nav class="navbar navbar-expand-lg navbar-dark" aria-label="Offcanvas navbar large">
    <div class="container-fluid">
    <a class="navbar-brand d-flex" id="logo1" href="/ft/index.php">Fortal<div id="logo2">Tech</div></a>
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
                    <?php if (isset($_SESSION['admin'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/ft/admin/admin.php">Admin</a>
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link <?php
                                            if ("$_SERVER[REQUEST_URI]" == '/ft/index.php') {
                                                echo 'active';
                                            }
                                            ?>" aria-current="page" href="/ft/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php
                                            if ("$_SERVER[REQUEST_URI]" == '/ft/produtos.php') {
                                                echo 'active';
                                            }
                                            ?>" href="/ft/produtos.php">Produtos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php
                                                            if (strpos($_SERVER['REQUEST_URI'], 'conta/') !== false) {
                                                                echo 'active';
                                                            }
                                                            ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            if (isset($_SESSION['id'])) {
                                echo '<li><a class="dropdown-item" href="/ft/conta/conta.php">Minha Conta</a></li>
                                <li><a class="dropdown-item" href="/ft/conta/pedidos.php">Meus Pedidos</a></li>
                                        <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#sair">Sair</button></li>';
                            } else {
                                echo '<li><a class="dropdown-item" href="/ft/conta/cadastrar.php">Cadastrar</a></li>
                                        <li><a class="dropdown-item" href="/ft/conta/entrar.php">Entrar</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
                <form method="GET" class="d-flex mt-3 mt-lg-0" action="/ft/pesquisa.php" role="search">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" name="produto" aria-label="Search">
                    <button class="btn" id="pesquisar-btn" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
</nav>