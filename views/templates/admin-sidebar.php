<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard"
            class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fas fa-home dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>
        </a>

        <a href="/admin/instructores"
            class="dashboard__enlace <?php echo pagina_actual('/instructores') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class=" fas fa-chalkboard-teacher dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Instructores
            </span>
        </a>

        <a href="/admin/complementarias"
            class="dashboard__enlace <?php echo pagina_actual('/complementarias') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fas fa-puzzle-piece dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Complementarias
            </span>
        </a>

        <a href="/admin/registrados"
            class="dashboard__enlace <?php echo pagina_actual('/registrados') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Alumnos Registrados
            </span>
        </a>

    </nav>

</aside>