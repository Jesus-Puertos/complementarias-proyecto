<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Datos de la Complementaria</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre de la Complementaria</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre de la Complementaria"
            value="<?php echo $evento->nombre; ?>">

    </div>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Descripción de la Complementaria</label>
        <textarea class="formulario__input" id="descripcion" name="descripcion"
            placeholder="Descripción de la Complementaria" rows="8"> <?php echo $evento->descripcion; ?> </textarea>
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoria o Tipo de Complementaria</label>
        <select class="formulario__select" id="categoria" name="categoria_id">

            <option value="">-- Seleccionar --</option>
            <?php foreach ($categorias as $categoria) { ?>
                <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : '' ?>
                    value="<?php echo $categoria->id; ?>">
                    <?php echo $categoria->nombre; ?>
                </option>
            <?php } ?>
        </select>
    </div>



    <div class="formulario__campo">
        <label for="modalidad" class="formulario__label">Modalidad de Complementaria</label>
        <select class="formulario__select" id="modalidad" name="modalidad_id">

            <option value="">-- Seleccionar --</option>
            <?php foreach ($modalidades as $modalidad) { ?>
                <option <?php echo ($evento->modalidad_id === $modalidad->id) ? 'selected' : '' ?>
                    value="<?php echo $modalidad->id; ?>">
                    <?php echo $modalidad->nombre; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label for="unidad" class="formulario__label">Seleccionar Unidad Académica</label>
        <select class="formulario__select" id="unidad" name="unidad_id">

            <option value="">-- Seleccionar --</option>

            <<?php foreach ($unidades as $unidad) { ?>
                    <option <?php echo ($evento->unidad_id === $unidad->id) ? 'selected' : '' ?>
                        value="<?php echo $unidad->id; ?>">
                        <?php echo $unidad->nombre; ?>
                    </option>
                <?php } ?>
        </select>
    </div>


    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Seleccionar Días</label>

        <div class="formulario__radio">
            <?php foreach ($dias as $dia) { ?>
                <div>
                    <label for="<?php echo strtoupper($dia->nombre); ?>">
                        <?php echo $dia->nombre; ?>
                    </label>
                    <input type="radio" id="<?php echo strtoupper($dia->nombre); ?>" name="dia"
                        value="<?php echo $dia->id; ?>" <?php echo ($evento->dia_id === $dia->id) ? 'checked' : ''; ?>>
                </div>


            <?php } ?>
        </div>
        <input type="hidden" name="dia_id" value="<?php echo $evento->dia_id; ?>">
    </div>

    <div id="horas" class="formulario__campo">
        <label for="" class="formulario__label">Seleccionar Hora</label>

        <ul id="horas" class="horas">
            <?php foreach ($horas as $hora) { ?>
                <li data-hora-id="<?php echo $hora->id; ?>" class="horas__hora horas__hora--desabilitada">
                    <?php echo $hora->hora ?>
                </li>
            <?php } ?>
        </ul>

        <input type="hidden" name="hora_id" value="<?php echo $evento->hora_id; ?>">
    </div>
</fieldset>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información extra de la Complementaria</legend>

    <div class="formulario__campo">
        <label for="instructores" class="formulario__label">Instructor</label>
        <input type="text" class="formulario__input" id="instructores" placeholder="Buscar Instructor">
        <ul id="listado-instructores" class="listado-instructores"></ul>
        <input type="hidden" name="instructor_id" value="<?php echo $evento->instructor_id; ?>">
    </div>

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles</label>
        <input type="number" min="1" max="30" class="formulario__input" id="disponibles" name="disponibles"
            placeholder="Max. 30" value="<?php echo $evento->disponibles; ?>">
    </div>
</fieldset>