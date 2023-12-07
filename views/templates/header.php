<header class="header">
    <div class="header__contenedor">
        <nav class="header__navegacion">
            <a href="/registro" class="header__enlace">Registro</a>
            <a href="/login" class="header__enlace">Iniciar Sesión</a>
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
            <a href="/complementarias" class="navegacion__enlace">Sobre las complementarias</a>
            <a href="/modalidades" class="navegacion__enlace">Modalidades</a>
            <a href="/complementarias-lista" class="navegacion__enlace">Lista de complementarias</a>
            <a href="/registro" class="navegacion__enlace">Registro</a>
        </nav>
    </div>
</div>