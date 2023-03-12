<div class="contenedor bg-image1 pedidos">
  <h1>PEDIDO FINALIZADO</h1>
  <section class="contentPage">
    <h2>PRODUCTOS PEDIDOS</h2>
    <section class="border-2 border-bottom px-4 mt-4">
      <?php
      if (isset($orders)) {
      ?>
        <?php foreach ($orders as $key => $variable) {
          $producto = $variable->getProducto(); ?>
          <div class="row productospedidos">
            <div class="col-6">
              <p> <?= $producto->getNombre() . ' - ' . $producto->getPrecio() . '€' ?></p>
            </div>
            <div class="col-6">
              <p>Cantidad: <?= $variable->getCantidad() ?></p>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </section>
    <section class="text-center pt-4">
      <p>Total: <?= isset($orders) ? common_helper::calcTotalPriceOrder() . '€' : '' ?></p>
      <div class="text-center py-4">
        <p>PEDIDO FINALIZADO.</p>
      </div>
    </section>
  </section>
</div>