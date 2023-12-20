<main class="agenda">
    <h2 class="agenda__heading">
        <?php echo $titulo; ?>
    </h2>

    <!-- PROYECTO Integrador -->
    <div class="categorias categorias--cursos">
        <h3 class="categorias__heading">Cursos</h3>
        <p class="categorias__fecha">Lunes</p>

        <div class="categorias__listado slider swiper">

            <div class="swiper-wrapper">
                <?php foreach ($eventos['curso_l'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/complementaria.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>


        </div>

        <p class="categorias__fecha">Martes</p>


        <div class="categorias__listado slider swiper">

            <div class="swiper-wrapper">
                <?php foreach ($eventos['curso_m'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/complementaria.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>


        </div>


        <p class="categorias__fecha">Miercoles</p>


        <div class="categorias__listado slider swiper">

            <div class="swiper-wrapper">
                <?php foreach ($eventos['curso_mier'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/complementaria.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>


        </div>

        <p class="categorias__fecha">Jueves</p>


        <div class="categorias__listado slider swiper">

            <div class="swiper-wrapper">
                <?php foreach ($eventos['curso_j'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/complementaria.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>


        </div>

        <p class="categorias__fecha">Viernes</p>


        <div class="categorias__listado slider swiper">

            <div class="swiper-wrapper">
                <?php foreach ($eventos['curso_v'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/complementaria.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>


        </div>


        <p class="categorias__fecha">Sabado</p>


        <div class="categorias__listado slider swiper">

            <div class="swiper-wrapper">
                <?php foreach ($eventos['curso_s'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/complementaria.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>


        </div>


        <p class="categorias__fecha">Domingo</p>


        <div class="categorias__listado slider swiper">

            <div class="swiper-wrapper">
                <?php foreach ($eventos['curso_d'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/complementaria.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>


        </div>


    </div>
</main>