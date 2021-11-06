<div class="header header-fixed u-unselectable header-animated">
    <div class="header-brand">
        <div class="nav-item no-hover">
            <a>
                <h6 class="title">Colegio</h6>
            </a>
        </div>
    </div>
    <div class="header-nav" id="header-menu">
        <div class="nav-right">
            <div class="nav-item">
                <a href="/">Inicio</a>
            </div>
            <?php if ($_SESSION) {
                echo '<div class="nav-item has-sub" id="dropdown">
                    <a class="nav-dropdown-link">
                        <span class="icon">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="menu-item">
                            <a href="/user.php">Perfil</a>
                        </li>
                        <li role="menu-item">
                            <a href="/logout.php">Salir</a>
                        </li>
                    </ul>
                </div>';
            } ?>
        </div>
    </div>
</div>