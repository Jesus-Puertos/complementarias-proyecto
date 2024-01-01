<main class="pagina">

    <h2 class="pagina__heading">
        <?php echo $titulo; ?>
    </h2>

    <p class="pagina__descripcion"> Te recomendamos guardarlo, puedes compartirlo</p>


    <div class="boleto-presencial">
        <div class="boleto boleto--<?php echo strtolower($registro->paquete->nombre); ?> boleto--acceso">

            <div class="boleto__contenido">
                <div class="boleto__logo-contenedor">
                    <picture>
                        <source srcset="build/img/logo_tec.avif" type="image/avif">
                        <source srcset="build/img/logo_tec.webp" type="image/webp">
                        <img loading="lazy" width="50px" height="50px" src="build/img/logo_tec.png" type="image/png"
                            alt="Logo del TECNM en boleto" class="boleto__imagen">
                    </picture>
                    <h4 class="boleto__logo">TECNM</h4>
                </div>
                <p class="boleto__plan">
                    <?php echo $registro->paquete->nombre ?>
                </p>
                <p class="boleto__nombre">
                    <?php echo $registro->usuario->nombre . ' ' . $registro->usuario->apellido; ?>
                </p>
                <p class="boleto__carrera">
                    <?php echo $registro->usuario->carrera; ?>
                </p>

                <p class="boleto__matricula">
                    <?php echo $registro->usuario->matricula; ?>
                </p>



            </div>

            <p class="boleto__codigo">
                <?php echo '#' . $registro->token; ?>
            </p>
        </div>
    </div>

    <form action="/finalizar-registro/complementarias" class="boleto__boton">
        <input type="submit" class="boleto__submit" value="Elije tu complementaria">
    </form>


</main>