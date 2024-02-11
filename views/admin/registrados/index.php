<h2 class="dashboard__heading">
    <?php echo $titulo; ?>
</h2>

<div class="dashboard__contenedor">

    <form action="/admin/registrados" method="get" class="formulario">
        <label for="unidad_id" class="formulario__label">Filtrar por unidad</label>

        <select name="unidad_id" class="formulario__select">
            <option value="">-- Todas las unidades --</option>
            <?php foreach ($unidades as $unidad) { ?>
                <option value="<?php echo $unidad->id; ?>" <?php echo $unidad->id == $unidad_id ? 'selected' : ''; ?>>
                    <?php echo $unidad->nombre; ?>
                </option>
            <?php } ?>
        </select>
        <input type="submit" value="Filtrar" class="formulario__submit--filtro">
    </form>
    <?php if (!empty($registros)) { ?>
        <div class="tabla-wrapper">
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Nombre</th>
                        <th scope="col" class="table__th">Email</th>
                        <th scope="col" class="table__th">Modalidad</th>
                        <th scope="col" class="table__th">Complementaria</th>
                        <th scope="col" class="table__th">Unidad</th>
                        <th scope="col" class="table__th">Género</th>
                        <th scope="col" class="table__th">Escolaridad</th>

                        <th scope="col" class="table__th"></th>
                    </tr>
                </thead>

                <tbody class="table__tbody">
                    <?php foreach ($registros as $registro) { ?>
                        <tr class="table__tr">
                            <td class="table__td">
                                <?php echo $registro->usuario->nombre . ' ' . $registro->usuario->apellido; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $registro->usuario->email; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $registro->paquete->nombre; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $registro->evento->nombre; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $registro->unidad->nombre; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $registro->usuario->genero; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $registro->usuario->modalidad; ?>
                            </td>

                        </tr>

                    <?php } ?>
                </tbody>

            </table>

        </div>

    <?php } else { ?>
        <p class="text-center">No hay registros aún</p>
    <?php } ?>
    <a href="/admin/registrados/descargar" class=" dashboard__boton dashboard__boton--descarga">Descargar Excel</a>

</div>


<?php
echo $paginacion;
?>