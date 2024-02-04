<main class="auth">

    <h2 class="auth__heading">
        <?php echo $titulo; ?>
    </h2>
    <p class="auth__texto">Actualiza tu informacion en Complementarias TECNM Campus Zongolica</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form method="POST" class="formulario">


        <div class="formulario__campo">
            <label for="semestre" class="formulario__label">Semestre</label>
            <select class="formulario__select" id="semestre" name="semestre" value="<?php echo $usuario->semestre; ?>">
                <option>Seleccionar Semestre</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
        </div>



        <div class="formulario__campo--actualizar">
            <input type="submit" class="formulario__submit" value="Actualizar Cuenta">
            <input type="submit" class="formulario__submit--cancelar" value="Cancelar">
        </div>

    </form>


</main>