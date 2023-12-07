<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Personal</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre del instructor"
            value="<?php echo $instructor->nombre ?? ''; ?>">
    </div>


    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido</label>
        <input type="text" class="formulario__input" id="apellido" name="apellido" placeholder="Apellido del instructor"
            value="<?php echo $instructor->apellido ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad</label>
        <input type="text" class="formulario__input" id="ciudad" name="ciudad" placeholder="Ciudad del instructor"
            value="<?php echo $instructor->ciudad ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="telefono" class="formulario__label">Telefono</label>
        <input type="tel" class="formulario__input" id="telefono" name="telefono" placeholder="Telefono del instructor"
            value="<?php echo $instructor->telefono ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input type="file" class="formulario__input formulario__input--file" id="imagen" name="imagen">
    </div>

    <?php if(isset($instructor->imagen_actual)) { ?>
        <p class="formulario__texto">
            Imagen actual:
        </p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'].'/img/instructores/'.$instructor->imagen; ?>.webp"
                    type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'].'/img/instructores/'.$instructor->imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'].'/img/instructores/'.$instructor->imagen; ?>.png" alt="Imagen Ponente">

            </picture>
        </div>
    <?php } ?>
</fieldset>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion extra</legend>
    <div class="formulario__campo">
        <label for="tags__input" class="formulario__label">Areas de experiencia (separadas por coma)</label>
        <input type="text" class="formulario__input" id="tags_input"
            placeholder="Ej. Futbol, Programacion Web, Danza, Escolta, Banda de Guerra">
        <div id="tags" class="formulario__listado"></div>
        <input type="hidden" name="tags" value="<?php echo $instructor->tags ?? ''; ?>">

    </div>
</fieldset>



<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fab fa-facebook-square"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[facebook]" placeholder="Facebook"
                value="<?php echo $redes->facebook ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fab fa-twitter-square"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[twitter]" placeholder="Twitter"
                value="<?php echo $redes->twitter ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fab fa-youtube-square"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[youtube]" placeholder="YouTube"
                value="<?php echo $redes->youtube ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fab fa-instagram-square"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[instagram]" placeholder="Instagram"
                value="<?php echo $redes->instagram ?? ''; ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fab fa-tiktok"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[tiktok]" placeholder="TikTok"
                value="<?php echo $redes->tiktok ?? ''; ?>">
        </div>
    </div>


    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fab fa-github-square"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[github]" placeholder="GitHub"
                value="<?php echo $redes->github ?? ''; ?>">
        </div>
    </div>




</fieldset>