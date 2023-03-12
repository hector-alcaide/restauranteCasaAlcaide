<footer>
    <nav class="container-fluid bg-color3">
        <section class="contenedor">
            <div class="container text-center text-md-start">
                <div class="row d-flex justify-content-around pt-2">
                    <div class="col-4 footerCol">
                        <a href="<?= base_url ?>aboutus/index#sobrenosotros">SOBRE NOSOTROS</a>
                        <a href="<?= base_url ?>aboutus/index#ubicacion">UBICACIÓN</a>
                    </div>
                    <div class="col-4 footerCol">
                        <a href="<?= base_url ?>privacypolicies/index">POLÍTICAS DE PRIVACIDAD</a>
                        <a href="<?= base_url ?>privacypolicies/index#cookies">POLÍTICAS DE COOKIES</a>
                    </div>
                    <div class="col-4 footerCol">
                        <div class="d-flex flex-column mb-3 pt-3">
                            <a id="instagramFooter" href="https://www.instagram.com/" class="redesSocialesFooter"></a>
                            <a id="twitterFooter" href="https://www.twitter.com" class="redesSocialesFooter"></a>
                            <a id="facebookFooter" href="https://www.facebook.com" class="redesSocialesFooter"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center p-4" id="copyright">
                <p>Casa Alcaide Copyright 2022</p>
            </div>
        </section>
    </nav>
    </div>
</footer>

<?php
if (isset($scripts_array) && $scripts_array) {
    foreach ($scripts_array as $script) {
        echo ($script);
    }
}
?>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/scripts.js"></script>

</body>

</html>