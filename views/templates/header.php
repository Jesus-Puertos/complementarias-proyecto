<header class="header">
    <div class="header__contenedor">
        <nav class="header__navegacion">

            <?php if (is_auth()) { ?>
                <a href="<?php echo is_admin() ? '/admin/dashboard' : '/finalizar-registro'; ?>"
                    class="header__enlace">Administrar</a>

                <form method="POST" action="/logout" class="header__form">
                    <input type="submit" value="Cerrar Sesión" class="header__submit">
                </form>
            <?php } else { ?>
                <a href="/registro" class="header__enlace">Registro</a>
                <a href="/login" class="header__enlace">Iniciar Sesión</a>
            <?php } ?>
        </nav>

        <div class="header__contenido">
            <a href="/">
                <h1 class="header__logo">Instituto Tecnologico Superior de Zongolica</h1>
            </a>
            <?php
            $mesActual = date('n');
            $yearActual = date('Y');

            if ($mesActual >= 1 && $mesActual <= 6) {
                echo '<p class="header__texto">Enero - Junio - ' . $yearActual . '</p>';
            } else {
                echo '<p class="header__texto">Agosto - Diciembre - ' . $yearActual . '</p>';
            }
            ?>
            <p class="header__texto header__texto--modalidad">Presencial - Virtual</p>
            <a href="/registro" class="header__boton">Registrate Aquí</a>
        </div>
    </div>
</header>

<div class="barra">
    <div class="barra__contenido">
        <a href="/">
            <h2 class="barra__logo">TECNM</h2>
        </a>
        <nav class="navegacion">
            <a href="/complementarias"
                class="navegacion__enlace <?php echo pagina_actual('/complementarias') ? 'navegacion__enlace--actual' : ''; ?>">Sobre
                las complementarias</a>
            <a href="/modalidades"
                class="navegacion__enlace <?php echo pagina_actual('/modalidades') ? 'navegacion__enlace--actual' : ''; ?>">Modalidades</a>
            <a href="/complementarias-lista"
                class="navegacion__enlace <?php echo pagina_actual('/complementarias-lista') ? 'navegacion__enlace--actual' : ''; ?>">Lista
                de complementarias</a>
            <a href="/registro"
                class="navegacion__enlace <?php echo pagina_actual('/registro') ? 'navegacion__enlace--actual' : ''; ?>">Registro</a>
        </nav>
    </div>
</div>