<main class="complementarias">
    <h2 class="complementarias__heading">
        <?php echo $titulo; ?>
    </h2>
    <p class="complementarias__descripcion">¿Qué son las complementarias?</p>


    <div class="complementarias__grid">

        <div <?php aos_animacion() ?> class="complementarias__imagen">
            <picture>
                <source srcset="build/img/sobre_complementarias.avif" type="image/avif">
                <source srcset="build/img/sobre_complementarias.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_complementarias.jpg" type="image/jpg"
                    alt="Imagen sobre las complementarias" style="border-radius: 2px;">
            </picture>
        </div>

        <div class="complementarias__contenido">
            <p <?php aos_animacion() ?> class="complementarias__texto">Las actividades extraescolares se encaminan a
                potenciar la apertura de
                nuevas formas de desarrollar las habilidades de nuestros estudiantes así como su entorno y a procurar la
                formación integral del alumnado, En aspectos referidos a la ampliación de su horizonte cultural y
                deportivo, la preparación para su inserción en la sociedad o el uso del tiempo libre.</p>
            <p <?php aos_animacion() ?> class="complementarias__texto">El ITSZ está comprometido con este programa de
                formación profesional y
                mediante su departamento de Actividades Complementarias se ofertaran actividades Extraescolares, en las
                cuales se ofrecerán diversas actividades deportivas y culturales.</p>
        </div>
    </div>
</main>