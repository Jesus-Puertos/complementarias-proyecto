<h2 class="dashboard__heading">
    <?php echo $titulo; ?>
</h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/complementarias/crear" class="dashboard__boton">
        <i class="fa-solid fa-circle-plus"></i>
        Agregar Complementaria
    </a>
</div>


<div class="dashboard__contenedor">
    <?php if (!empty($complementarias)) { ?>
        <div class="tabla-wrapper">
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Complementaria</th>
                        <th scope="col" class="table__th">Categoria</th>
                        <th scope="col" class="table__th">Dia y hora</th>
                        <th scope="col" class="table__th">Instructor</th>

                        <th scope="col" class="table__th"></th>
                    </tr>
                </thead>

                <tbody class="table__tbody">
                    <?php foreach ($complementarias as $complementaria) { ?>
                        <tr class="table__tr">
                            <td class="table__td">
                                <?php echo $complementaria->nombre; ?>
                            </td>

                            <td class="table__td">
                                <?php echo $complementaria->categoria->nombre; ?>
                            </td>

                            <td class="table__td">
                                <?php echo $complementaria->dia->nombre . ', ' . $complementaria->hora->hora; ?>
                            </td>

                            <td class="table__td">
                                <?php echo $complementaria->instructor->nombre . ' ' . $complementaria->instructor->apellido; ?>
                            </td>

                            <td class="table__td--acciones">
                                <a class="table__accion table__accion--editar"
                                    href="/admin/complementarias/editar?id=<?php echo $complementaria->id; ?>">
                                    <i class="fa-solid fa-pencil"></i>
                                    Editar
                                </a>

                                <form method="POST" action="/admin/complementarias/eliminar" class="table__formulario">
                                    <input type="hidden" name="id" value="<?php echo $complementaria->id ?>">
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
        <p class="text-center">No hay complementarias aún</p>
    <?php } ?>
</div>

<?php
echo $paginacion;
?>