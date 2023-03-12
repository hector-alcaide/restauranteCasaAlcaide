<div class="contenedor bg-image1 pedidos">
  <h1>PEDIDOS</h1>
  <section class="contentPage">
    <h2>PRODUCTOS PEDIDOS</h2>
    <section class="border-2 border-bottom px-4 mt-4">
      <?php
      if (isset($_SESSION['order'])) {
      ?>
        <?php foreach ($_SESSION['order'] as $key => $order) {
          $producto = $order->getProducto(); ?>
          <div class="row productospedidos">
            <div class="col-6  w-sm-25">
              <p> <?= $producto->getNombre() . ' - ' . $producto->getPrecio() . '€' ?></p>
            </div>
            <div class="col-6 d-flex justify-content-center ">
              <p>Cantidad: <?= $order->getCantidad() ?></p>
              <form action="" method="post" class="ps-2">
                <input type="hidden" name="sumaCantidad" value="<?= $key ?>">
                <button type="submit" id="sumaCantidad" class="px-0 py-0 border-0" title="suma cantidad">
                  <div><img src="../assets/img/icons/sumar.svg" alt=""></div>
                </button>
              </form>
              <form action="" method="post" class="ps-2">
                <input type="hidden" name="restaCantidad" value="<?= $key ?>">
                <button type="submit" id="restaCantidad" class="px-0 py-0 border-0" title="resta cantidad">
                  <div><img src="../assets/img/icons/restar.svg" alt=""></div>
                </button>
              </form>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </section>
    <section class="text-center pt-4">
      <p>Total: <?= isset($_SESSION['order']) ? common_helper::calcTotalPriceOrder() . '€' : '' ?></p>
      <div class="text-center py-4">
        <a href="<?= base_url ?>orders/finishorder"><button class="button-1">PAGAR</button></a>
      </div>
    </section>
    <section class="text-center mt-3">
      <p>Precio último pedido: <?= isset($_COOKIE['ultimoPedido']) ? $_COOKIE['ultimoPedido'] . '€' : '' ?></p>
    </section>
  </section>
  <?php if (isset($_SESSION['messages'])) { ?> <div id="mensajes" onclick="this.classList.add('oculto')"><?= $_SESSION['messages'] ?></div> <?php } ?>
</div>