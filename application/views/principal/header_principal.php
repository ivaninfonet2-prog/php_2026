<!-- CSS del header -->
<link rel="stylesheet" href="<?= base_url('activos/css/principal/header_principal.css'); ?>">

<header class="main-header">

    <div class="header-container">

        <!-- Logo / Marca -->
        <a href="<?= base_url(); ?>" class="brand">
            <img
                src="<?= base_url('activos/imagenes/logo.jpg'); ?>"
                alt="Logo UNLa Tienda"
                class="logo-img"
            >
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Navegación -->
        <nav class="nav-menu">
            <a href="<?= base_url('login'); ?>" class="btn btn-login">
                Login
            </a>
            <a href="<?= base_url('registrar'); ?>" class="btn btn-register">
                Registrar
            </a>
        </nav>

    </div>

</header>
