<h2 class="dashboard__heading">
    <?php echo $titulo; ?>
</h2>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Ultimos Registros</h3>

            <?php foreach ($registros as $registro) { ?>

                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <span class="bloque__texto--nombre">
                            <?php echo $registro->usuario->nombre; ?>
                        </span>
                        <span class="bloque__texto--nombre">
                            <?php echo $registro->usuario->apellido; ?>
                        </span>
                        <?php echo ' Semestre: ' . $registro->usuario->semestre . ' Carrera: ' . $registro->usuario->carrera; ?>
                    </p>
                </div>
            <?php } ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos con menos lugares disponibles</h3>
            <?php foreach ($menos_disponibles as $evento) { ?>

                <p class="bloque__texto">

                    <?php echo $evento->nombre . ' - ' . $evento->disponibles . ' Disponibles'; ?>
                </p>

            <?php } ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos con mas lugares disponibles</h3>
            <?php foreach ($mas_disponibles as $evento) { ?>

                <p class="bloque__texto">

                    <?php echo $evento->nombre . ' - ' . $evento->disponibles . ' Disponibles'; ?>
                </p>

            <?php } ?>

        </div>
</main>