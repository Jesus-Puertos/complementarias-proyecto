<main class="agenda">
    <h2 class="agenda__heading">
        <?php echo $titulo; ?>
    </h2>

    <!-- PROYECTO Integrador -->
    <!-- COMPRMISO SOCIAL -->
    <div class="categorias categorias--compromiso">
        <h3 class="categorias__heading">Compromiso Social</h3>
        <p class="categorias__fecha">Lunes</p>

        <div class="categorias__listado slider swiper">

            <div class="swiper-wrapper">
                <?php foreach ($eventos['compromiso_l'] as $evento) { ?>
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
                <?php foreach ($eventos['compromiso_m'] as $evento) { ?>
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
                <?php foreach ($eventos['compromiso_mier'] as $evento) { ?>
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
                <?php foreach ($eventos['compromiso_j'] as $evento) { ?>
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
                <?php foreach ($eventos['compromiso_v'] as $evento) { ?>
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
                <?php foreach ($eventos['compromiso_s'] as $evento) { ?>
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
                <?php foreach ($eventos['compromiso_d'] as $evento) { ?>
                    <?php include __DIR__ . '/../templates/complementaria.php'; ?>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>


        </div>


    </div>
</main>