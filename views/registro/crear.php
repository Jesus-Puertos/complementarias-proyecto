<main class="registro">
    <h2 class="registro__heading">
        <?php echo $titulo ?>
    </h2>
    <p class="registro__descripcion">Elije tu modalidad</p>

    <div class="modalidades__grid">
        <div class="modalidad">
            <h3 class="modalidad__nombre">Presencial</h3>
            <ul class="modalidad__lista">
                <li class="modalidad__elemento">Lorem ipsum dolor sit amet.</li>
                <li class="modalidad__elemento">Lorem ipsum dolor sit amet.</li>
                <li class="modalidad__elemento">Lorem ipsum dolor sit amet.</li>
                <li class="modalidad__elemento">Lorem ipsum dolor sit amet.</li>
            </ul>
            <p class="modalidad__logo">TECNM</p>

            <form method="POST" action="/finalizar-registro/presencial">
                <input class="modalidad__submit" type="submit" value="Entra al modo presencial">
            </form>
        </div>

        <div class="modalidad">
            <h3 class="modalidad__nombre">Virtual</h3>
            <ul class="modalidad__lista">
                <li class="modalidad__elemento">Lorem ipsum dolor sit amet.</li>
                <li class="modalidad__elemento">Lorem ipsum dolor sit amet.</li>
                <li class="modalidad__elemento">Lorem ipsum dolor sit amet.</li>
                <li class="modalidad__elemento">Lorem ipsum dolor sit amet.</li>
            </ul>
            <p class="modalidad__logo">TECNM</p>
            <form method="POST" action="/finalizar-registro/virtual">
                <input class="modalidad__submit" type="submit" value="Entra al modo virtual">
            </form>
        </div>
    </div>
</main>