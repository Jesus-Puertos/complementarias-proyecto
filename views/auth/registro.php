<main class="auth">

   <h2 class="auth__heading">
      <?php echo $titulo; ?>
   </h2>
   <p class="auth__texto">Registrate en Complementarias TECNM Campus Zongolica</p>

   <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

   <form method="POST" action="/registro" class="formulario" action="">


      <div class="formulario__campo">
         <label for="nombre" class="formulario__label">Nombre</label>
         <input type="text" class="formulario__input" placeholder="Tu nombre" id="nombre" name="nombre"
            value="<?php echo $usuario->nombre; ?>">
      </div>


      <div class="formulario__campo">
         <label for="apellido" class="formulario__label">Apellido</label>
         <input type="text" class="formulario__input" placeholder="Tu apellido" id="apellido" name="apellido"
            value="<?php echo $usuario->apellido; ?>">
      </div>

      <div class="formulario__campo">
         <label for="email" class="formulario__label">Correo Institucional</label>
         <input type="email" class="formulario__input" placeholder="Tu correo" id="email" name="email"
            value="<?php echo $usuario->email; ?>">
      </div>

      <div class="formulario__campo">
         <label for="matricula" class="formulario__label">Matricula</label>
         <input type="text" class="formulario__input" placeholder="Ejem. 226W0496" id="matricula" name="matricula"
            value="<?php echo $usuario->matricula; ?>">
      </div>

      <div class="formulario__campo">
         <label for="carrera" class="formulario__label">Carrera</label>
         <select class="formulario__select" id="carrera" name="carrera" value="<?php echo $usuario->carrera; ?>">
            <option>Seleccionar carrera</option>
            <option>Ingeniería en Sistemas Computacionales</option>
            <option>Ingeniería en Gestion Empresarial</option>
            <option>Ingeniería Forestal</option>
            <option>Ingeniería en Innovación Agricola Sustentable</option>
            <option>Ingeniería Civil</option>
            <option>Ingeniería en Desarrollo Comunitario</option>
         </select>
      </div>

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

      <div class="formulario__campo">
         <label for="modalidad" class="formulario__label">Modalidad</label>
         <select class="formulario__select" id="modalidad" name="modalidad" value="<?php echo $usuario->modalidad; ?>">
            <option>Seleccionar Modalidad</option>
            <option>Escolarizado</option>
            <option>Mixto</option>
         </select>
      </div>


      <div class="formulario__campo">
         <label for="genero" class="formulario__label">Género</label>
         <select class="formulario__select" id="genero" name="genero" value="<?php echo $usuario->genero; ?>">
            <option>Seleccionar Género</option>
            <option>Hombre</option>
            <option>Mujer</option>
         </select>
      </div>


      <div class="formulario__campo">
         <label for="password" class="formulario__label">Contraseña</label>
         <input type="password" class="formulario__input" placeholder="Tu contraseña" id="password" name="password">
      </div>

      <div class="formulario__campo">
         <label for="password2" class="formulario__label">Repetir Constraseña</label>
         <input type="password" class="formulario__input" placeholder="Repetir contraseña" id="password2"
            name="password2">
      </div>

      <input type="submit" class="formulario__submit" value="Crear Cuenta">
   </form>

   <div class="acciones">
      <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? Iniciar Sesión</a>
      <a href="/olvide" class="acciones__enlace">¿Olvidaste tu constraseña?</a>

   </div>
</main>