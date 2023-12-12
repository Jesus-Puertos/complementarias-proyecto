<h2 class="dashboard__heading">
    <?php echo $titulo; ?>
</h2>

<?php include_once __DIR__ . '/../../templates/alertas.php'; ?>

<div class="dashboard__contenedor-boton">
    <a href="/admin/instructores/crear" class="dashboard__boton">
        <i class="fa-solid fa-circle-plus"></i>
        Agregar Instructor
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if (!empty($instructores)) { ?>
        <div class="tabla-wrapper">
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Nombre</th>
                        <th scope="col" class="table__th">Ubicacion</th>
                        <th scope="col" class="table__th">Telefono</th>

                        <th scope="col" class="table__th"></th>
                    </tr>
                </thead>

                <tbody class="table__tbody">
                    <?php foreach ($instructores as $instructor) { ?>
                        <tr class="table__tr">
                            <td class="table__td">
                                <?php echo $instructor->nombre . ' ' . $instructor->apellido; ?>
                            </td>

                            <td class="table__td">
                                <?php echo $instructor->ciudad . ' ' ?>
                            </td>
                            <td class="table__td">
                                <?php echo $instructor->telefono . ' ' ?>
                            </td>

                            <td class="table__td--acciones">
                                <a class="table__accion table__accion--editar"
                                    href="/admin/instructores/editar?id=<?php echo $instructor->id; ?>">
                                    <i class="fa-solid fa-user-pen"></i>
                                    Editar
                                </a>

                                <form method="POST" action="/admin/instructores/eliminar" class="table__formulario">
                                    <input type="hidden" name="id" value="<?php echo $instructor->id ?>">
                                    <button class="table__accion table__accion--eliminar" type="submit">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>

                    <?php } ?>
                </tbody>

            </table>
        </div>

    <?php } else { ?>
        <p class="text-center">No hay instructor aún</p>
    <?php } ?>
</div>

<?php
echo $paginacion;
?>