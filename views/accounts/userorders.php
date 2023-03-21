<div class="contenedor bg-image1 pb-5">
    <h1>TUS PEDIDOS</h1>
    <div class="row contenedor">
        <button class="tab col-lg-2 text-color1" id="dataBttn">Datos</button>
        <button class="tab tab-right col-lg-2 text-color2"><span class="active-tab">Ver Pedidos</span></button>
        <div class="col-lg-8 tab-header-border"></div>
    </div>
    <section class="contentPage py-5 mb-5">
        <h2 class="py-3">PEDIDOS REALIZADOS</h2>
        <?php $test = $orders; ?>
        <div class="table-responsive tabla-admin mt-5 mb-0 mx-auto">
        <table class="table table-secondary table-striped text-font2 text-left" id="userorders_table">
                <thead>
                    <tr>
                        <th scope="col">Num Pedido</th>
                        <th scope="col">Fecha del pedido</th>
                        <th scope="col">Total</th>
                        <th scope="col">Productos</th>
                        <th scope="col">Valoración</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>
</div>
<script>
    //redireccionar 
    const data = document.getElementById('dataBttn');

    data.addEventListener('mousedown', function(event) {
        const url = '<?= base_url ?>accounts/index';
        if (event.button === 1) {
            event.preventDefault();
            window.open(url);
        } else {
            window.location.href = url;
        }
    });
</script>