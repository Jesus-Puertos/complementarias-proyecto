<main class="registro">
    <h2 class="registro__heading">
        <?php echo $titulo ?>
    </h2>
    <p class="registro__descripcion">Elige tu modalidad. Recuerda que puedes seleccionar una complementaria de la
        modalidad opuesta. Esta elección es solo para generar tu registro y boleto.</p>

    <div class="modalidades__grid">
        <div class="modalidad">
            <h3 class="modalidad__nombre">Presencial</h3>
            <ul class="modalidad__lista">
                <li class="modalidad__elemento">Asistencia en persona a las clases.</li>
                <li class="modalidad__elemento">Interacción directa con profesores y compañeros.</li>
                <li class="modalidad__elemento">Acceso a instalaciones y recursos en el campus.</li>
                <li class="modalidad__elemento">Participación en actividades y eventos presenciales.</li>
            </ul>
            <p class="modalidad__logo">TECNM</p>

            <form method="POST" action="/finalizar-registro/presencial">
                <input class="modalidad__submit" type="submit" value="Entra al modo presencial">
            </form>
        </div>

        <div class="modalidad">
            <h3 class="modalidad__nombre">Virtual</h3>
            <ul class="modalidad__lista">
                <li class="modalidad__elemento">Participación en clases a través de plataformas digitales.</li>
                <li class="modalidad__elemento">Flexibilidad para aprender a tu propio ritmo.</li>
                <li class="modalidad__elemento">Acceso a materiales de aprendizaje en línea.</li>
                <li class="modalidad__elemento">Interacción con profesores y compañeros a través de foros y chats.</li>
            </ul>
            <p class="modalidad__logo">TECNM</p>
            <form method="POST" action="/finalizar-registro/virtual">
                <input class="modalidad__submit" type="submit" value="Entra al modo virtual">
            </form>
        </div>
    </div>
</main>