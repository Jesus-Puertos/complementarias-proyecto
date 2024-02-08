<h2 class="pagina__heading">
    <?php echo $titulo; ?>
</h2>
<p class="pagina__descripcion"> Elije tu complmentaria: </p>

<div class="complementarias-registro">
    <main class="complementarias-registro__listado">
        <h3 class="complementarias-registro__heading--proyecto">Proyecto Integrador</h3>
        <p class="complementarias-registro__fecha--proyecto">Lunes</p>


        <div class="complementarias-registro__grid eventos-proyecto">
            <?php foreach ($eventos['proyecto_l'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>
        </div>

        <p class="complementarias-registro__fecha--proyecto">Martes</p>
        <div class="complementarias-registro__grid eventos-proyecto">
            <?php foreach ($eventos['proyecto_m'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>
        </div>

        <p class="complementarias-registro__fecha--proyecto">Miercoles</p>
        <div class="complementarias-registro__grid eventos-proyecto">
            <?php foreach ($eventos['proyecto_mier'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>
        </div>

        <p class="complementarias-registro__fecha--proyecto">Jueves</p>
        <div class="complementarias-registro__grid eventos-proyecto">
            <?php foreach ($eventos['proyecto_j'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>
        </div>

        <p class="complementarias-registro__fecha--proyecto">Viernes</p>

        <div class="complementarias-registro__grid eventos-proyecto">
            <?php foreach ($eventos['proyecto_v'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>
        </div>

        <p class="complementarias-registro__fecha--proyecto">Sabado</p>
        <div class="complementarias-registro__grid eventos-proyecto">
            <?php foreach ($eventos['proyecto_s'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>
        </div>

        <p class="complementarias-registro__fecha--proyecto">Domingo</p>
        <div class="complementarias-registro__grid eventos-proyecto">
            <?php foreach ($eventos['proyecto_d'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>
        </div><!-- fin -->

        <!-- 
            COMPROMISO SOCIAL
     -->

        <h3 class="complementarias-registro__heading--compromiso">Cursos</h3>
        <p class="complementarias-registro__fecha--compromiso">Lunes</p>


        <div class="complementarias-registro__grid eventos--compromiso">
            <?php foreach ($eventos['compromiso_l'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>
        </div>

        <p class="complementarias-registro__fecha--compromiso">Martes</p>
        <div class="complementarias-registro__grid eventos--compromiso">
            <?php foreach ($eventos['compromiso_m'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>
        </div>

        <p class="complementarias-registro__fecha--compromiso">Miercoles</p>
        <div class="complementarias-registro__grid eventos--compromiso">
            <?php foreach ($eventos['compromiso_mier'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>

        </div>

        <p class="complementarias-registro__fecha--compromiso">Jueves</p>
        <div class="complementarias-registro__grid eventos--compromiso">
            <?php foreach ($eventos['compromiso_j'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>

        </div>

        <p class="complementarias-registro__fecha--compromiso">Viernes</p>

        <div class="complementarias-registro__grid eventos--compromiso">
            <?php foreach ($eventos['compromiso_v'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>

        </div>

        <p class="complementarias-registro__fecha--compromiso">Sabado</p>

        <div class="complementarias-registro__grid eventos--compromiso">
            <?php foreach ($eventos['compromiso_s'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>

        </div>

        <p class="complementarias-registro__fecha--compromiso">Domingo</p>

        <div class="complementarias-registro__grid eventos--compromiso">
            <?php foreach ($eventos['compromiso_d'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>

        </div> <!-- fin -->




        <!-- CURSOS
     -->

        <h3 class="complementarias-registro__heading--curso">Cursos</h3>
        <p class="complementarias-registro__fecha--curso">Lunes</p>


        <div class="complementarias-registro__grid eventos--curso">
            <?php foreach ($eventos['curso_l'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>
        </div>

        <p class="complementarias-registro__fecha--curso">Martes</p>
        <div class="complementarias-registro__grid eventos--curso">
            <?php foreach ($eventos['curso_m'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>
        </div>

        <p class="complementarias-registro__fecha--curso">Miercoles</p>
        <div class="complementarias-registro__grid eventos--curso">
            <?php foreach ($eventos['curso_mier'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>

        </div>

        <p class="complementarias-registro__fecha--curso">Jueves</p>
        <div class="complementarias-registro__grid eventos--curso">
            <?php foreach ($eventos['curso_j'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>

        </div>

        <p class="complementarias-registro__fecha--curso">Viernes</p>

        <div class="complementarias-registro__grid eventos--curso">
            <?php foreach ($eventos['curso_v'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>

        </div>

        <p class="complementarias-registro__fecha--curso">Sabado</p>

        <div class="complementarias-registro__grid eventos--curso">
            <?php foreach ($eventos['curso_s'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>

        </div>

        <p class="complementarias-registro__fecha--curso">Domingo</p>


        <div class="complementarias-registro__grid eventos--curso">
            <?php foreach ($eventos['curso_d'] as $evento) { ?>
                <?php include __DIR__ . '/complementaria.php'; ?>
            <?php } ?>

        </div> <!-- fin -->





    </main>

    <aside class="registro">
        <h2 class="registro__heading">Tu complementaria:</h2>

        <div id="registro-resumen" class="registro__resumen"></div>



        <form id="registro" class="formulario">
            <div class="formulario__campo">
                <input type="submit" class="formulario__submit formulario__submit--full" value="Terminar Registro">
            </div>
        </form>
    </aside>
</div>