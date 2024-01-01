<div class="evento">
    <p class="evento__hora">
        <?php echo $evento->hora->hora; ?>
    </p>

    <p class="evento__unidad">
        <?php echo $evento->unidad->nombre; ?>
    </p>


    <div class="evento__informacion ">
        <div class="evento__grupo">
            <h4 class="evento__nombre">
                <?php echo $evento->nombre; ?>
            </h4>
            <p
                class="evento__modalidad-registro <?php echo $evento->modalidad->nombre == 'Presencial' ? 'presencial' : 'virtual'; ?>">
                <?php echo $evento->modalidad->nombre; ?>
            </p>
        </div>


        <p class="evento__introduccion">
            <?php echo $evento->descripcion; ?>
        </p>

        <div class="evento__autor-info">
            <picture>
                <source srcset="<?php echo $_ENV['HOST']; ?>/img/instructores/<?php echo $evento->instructor->imagen;
                   ; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST']; ?>/img/instructores/<?php echo $evento->instructor->imagen;
                   ; ?>.png" type="image/png">
                <img class="evento__imagen-autor" loading="lazy" width="200" height="300" src="<?php echo $_ENV['HOST']; ?>/img/instructores/<?php echo $evento->instructor->imagen;
                   ; ?>.png" alt="Imagen Ponente">
            </picture>

            <p class="evento__autor-nombre">
                <?php echo $evento->instructor->nombre . ' ' . $evento->instructor->apellido ?>
            </p>
        </div>

        <button type="button" data-id="<?php echo $evento->id; ?>" class="evento__agregar" <?php echo ($evento->disponibles === "0") ? 'disabled' : '' ?>>
            <?php echo ($evento->disponibles === "0") ? 'Agotado' : 'Agregar - ' . $evento->disponibles . ' Disponibles' ?>

        </button>

    </div>
</div>