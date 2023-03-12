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
            <table class="table table-secondary table-striped text-font2 text-left">
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
                    <?php foreach ($orders as $key => $order) {
                        $key++; ?>
                        <tr>
                            <td scope="row"><?= $key ?></td>
                            <td><?= $order['fechaAltaPedido'] ?></td>
                            <td><?= $order['importeTotal'] ?></td>
                            <td>
                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target=".products_<?= $key ?>" aria-expanded="false" aria-controls="products_<?= $key ?>">
                                    <i class="fa-solid fa-turn-down"></i>
                                </button>
                            </td>
                            <td class="reviews" data-idvaloracion="<?= !empty($order['idValoracion']) ? $order['idValoracion'] : 'null' ?>" data-idpedido=<?= $order['idPedido']?> >                                
                            </td>
                        </tr>
                        <tr class="collapse products_<?= $key ?>">
                            <th scope="col">Nombre</th>
                            <th scope="col" colspan="3">Descripción</th>
                            <th scope="col">Precio</th>
                        </tr>
                        <?php foreach ($order['orderproducts'] as $product) { ?>
                            <tr class="collapse products_<?= $key ?>">
                                <td scope="row"><?= $product['nombre'] ?></td>
                                <td colspan="3"><?= $product['definicion'] ?></td>
                                <td><?= $product['precio'] ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
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