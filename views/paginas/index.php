<?php
include_once __DIR__ . '/complementarias-lista.php';

?>

<section class="resumen">
    <div class="resumen__grid">
        <div class="resumen__bloque ocultar ">
            <p class="resumen__texto resumen__texto--numero contador_cantidad"
                data-cantidad-total="  <?php echo count($instructor); ?>">
                0
            </p>
            <p class="resumen__texto">Instructores</p>
        </div>
        <div class="resumen__bloque ocultar">
            <p class="resumen__texto resumen__texto--numero contador_cantidad"
                data-cantidad-total="<?php echo $complementarias; ?>">
                0
            </p>
            <p class="resumen__texto">Complementarias</p>
        </div>
        <div class="resumen__bloque ocultar">
            <p class="resumen__texto resumen__texto--numero contador_cantidad"
                data-cantidad-total="<?php echo count($categorias); ?>">
                0
            </p>
            <p class="resumen__texto">Categorias</p>
        </div>
        <div class="resumen__bloque ocultar">
            <p class="resumen__texto resumen__texto--numero contador_cantidad" data-cantidad-total="500">0</p>
            <p class="resumen__texto">Alumnos</p>
        </div>
    </div>
</section>

<section class="instructores">
    <h2 class="instructores__heading">
        Instructores
    </h2>
    <p class="instructores__descripcion">Conoce a los expertos</p>
    <div class="instructores__grid">
        <?php foreach ($instructores as $instructor) { ?>
            <div <?php aos_animacion() ?> class="instructor">
                <picture>
                    <source srcset="img/instructores/<?php echo $instructor->imagen;
                    ; ?>.webp" type="image/webp">
                    <source srcset="img/instructores/<?php echo $instructor->imagen;
                    ; ?>.png" type="image/png">
                    <img class="instructor__imagen" loading="lazy" width="200" height="300" src="img/instructores/<?php echo $instructor->imagen;
                    ; ?>.png" alt="Imagen Ponente">
                </picture>

                <div class="instructor__informacion">
                    <h4 class="instructor__nombre">
                        <?php echo $instructor->nombre . ' ' . $instructor->apellido; ?>
                    </h4>
                    <p class="instructor__ubicacion">
                        <?php echo $instructor->ciudad . ', ' . $instructor->telefono; ?>
                    </p>

                    <nav class="instructor-sociales">
                        <?php
                        $redes = json_decode($instructor->redes);
                        ?>
                        <?php if (!empty($redes->facebook)) { ?>
                            <a class="instructor-sociales__enlace" rel="noopener noreferrer" target="_blank"
                                href="<?php echo $redes->facebook ?>">
                                <span class="instructor-sociales__ocultar">Facebook</span>
                            </a>
                        <?php } ?>
                        <?php if (!empty($redes->twitter)) { ?>
                            <a class="instructor-sociales__enlace" rel="noopener noreferrer" target="_blank"
                                href="<?php echo $redes->twitter ?>">
                                <span class="instructor-sociales__ocultar">Twitter</span>
                            </a>
                        <?php } ?>
                        <?php if (!empty($redes->youtube)) { ?>
                            <a class="instructor-sociales__enlace" rel="noopener noreferrer" target="_blank"
                                href="<?php echo $redes->youtube ?>">
                                <span class="instructor-sociales__ocultar">YouTube</span>
                            </a>
                        <?php } ?>
                        <?php if (!empty($redes->instagram)) { ?>
                            <a class="instructor-sociales__enlace" rel="noopener noreferrer" target="_blank"
                                href="<?php echo $redes->instagram ?>">
                                <span class="instructor-sociales__ocultar">Instagram</span>
                            </a>
                        <?php } ?>
                        <?php if (!empty($redes->tiktok)) { ?>
                            <a class="instructor-sociales__enlace" rel="noopener noreferrer" target="_blank"
                                href="<?php echo $redes->tiktok ?>">
                                <span class="instructor-sociales__ocultar">Tiktok</span>
                            </a>
                        <?php } ?>

                        <?php if (!empty($redes->github)) { ?>
                            <a class="instructor-sociales__enlace" rel="noopener noreferrer" target="_blank"
                                href="<?php echo $redes->github ?>">
                                <span class="instructor-sociales__ocultar">Github</span>
                            </a>
                        <?php } ?>
                    </nav>

                    <ul class="instructor__listado-skills">
                        <?php
                        $tags = explode(',', $instructor->tags);
                        foreach ($tags as $tag) {
                            ?>
                            <li class="instructor__skill">
                                <?php echo $tag; ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        <?php } ?>
    </div>
</section>


<div id="mapa" class="mapa"></div>

<section class="boletos">
    <h2 class="boletos__heading">Pases</h2>
    <p class="boletos__descripcion">Mira los pases para tu complementaria</p>

    <div class="boletos__grid">
        <div class="boleto boleto--presencial ">
            <div class="boleto__logo-contenedor">
                <picture>
                    <source srcset="build/img/logo_tec.avif" type="image/avif">
                    <source srcset="build/img/logo_tec.webp" type="image/webp">
                    <img loading="lazy" width="50px" height="50px" src="build/img/logo_tec.png" type="image/png"
                        alt="Logo del TECNM en boleto" class="boleto__imagen">
                </picture>
                <h4 class="boleto__logo">TECNM</h4>

            </div>
            <p class="boleto__plan">Presencial</p>
            <p class="boleto__precio">Miembro de modalidad - Presencial</p>
        </div>

        <div class="boleto boleto--virtual">
            <div class="boleto__logo-contenedor">
                <picture>
                    <source srcset="build/img/logo_tec.avif" type="image/avif">
                    <source srcset="build/img/logo_tec.webp" type="image/webp">
                    <img loading="lazy" width="50px" height="50px" src="build/img/logo_tec.png" type="image/png"
                        alt="Logo del TECNM en boleto" class="boleto__imagen">
                </picture>
                <h4 class="boleto__logo">TECNM</h4>

            </div>
            <p class="boleto__plan">Virtual</p>
            <p class="boleto__precio">Miembro de modalidad - Virtual</p>
        </div>

        <div class="boleto boleto--gratis">
            <div class="boleto__logo-contenedor">
                <picture>
                    <source srcset="build/img/logo_tec.avif" type="image/avif">
                    <source srcset="build/img/logo_tec.webp" type="image/webp">
                    <img loading="lazy" width="50px" height="50px" src="build/img/logo_tec.png" type="image/png"
                        alt="Logo del TECNM en boleto" class="boleto__imagen">
                </picture>
                <h4 class="boleto__logo">TECNM</h4>

            </div>
            <p class="boleto__plan">Presencial</p>
            <p class="boleto__precio">Miembro de TECNM Complementarias</p>
        </div>
    </div>
    <div class="boleto__enlace-contenedor">
        <a href="/" class="boleto__enlace">Obten tu boleto</a>

        <a href="/modalidades" class="boleto__enlace">Ver modalidades</a>
    </div>

</section>