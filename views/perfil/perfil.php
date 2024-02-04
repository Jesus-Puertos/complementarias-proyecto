<main class="perfil">

    <header class="perfil__header">

        <nav class="perfil__navegacion">


            <form class="perfil__form" action="/actualizar">
                <button type="submit" class="perfil__submit">
                    <i class="fas fa-user-edit"></i> Actualizar informacion
                </button>
            </form>

        </nav>

    </header>

    <section class="perfil__info">

        <h2 class="perfil__heading">
            <?php echo $titulo; ?>
        </h2>

        <div class="perfil__contenedor">
            <div class="perfil__datos">
                <div class="perfil__dato">
                    <h4 class="perfil__dato--titulo">Nombre:</h4>
                    <span class="perfil__dato-valor">
                        <?php echo $usuario->nombre; ?>
                    </span>
                </div>
                <div class="perfil__dato">
                    <h4 class="perfil__dato--titulo">Apellido:</h4>
                    <span class="perfil__dato-valor">
                        <?php echo $usuario->apellido; ?>
                    </span>
                </div>
                <div class="perfil__dato">
                    <h4 class="perfil__dato--titulo">Matricula:</h4>
                    <span class="perfil__dato-valor">
                        <?php echo $usuario->matricula; ?>
                    </span>
                </div>
                <div class="perfil__dato">
                    <h4 class="perfil__dato--titulo">Email:</h4>
                    <span class="perfil__dato-valor">
                        <?php echo $usuario->email; ?>
                    </span>
                </div>
                <div class="perfil__dato">
                    <h4 class="perfil__dato--titulo">Carrera:</h4>
                    <span class="perfil__dato-valor">
                        <?php echo $usuario->carrera; ?>
                    </span>
                </div>
                <div class="perfil__dato">
                    <h4 class="perfil__dato--titulo">Semestre:</h4>
                    <span class="perfil__dato-valor">
                        <?php echo $usuario->semestre; ?>
                    </span>
                </div>

            </div>

            <picture>
                <source srcset="build/img/Open Doodles - Coffee.avif" type="image/avif">
                <source srcset="build/img/Open Doodles - Coffee.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/Open Doodles - Coffee.png" type="image/jpg"
                    alt="Imagen sobre las complementarias" style="border-radius: 2px;">
            </picture>
        </div>

    </section>


</main>