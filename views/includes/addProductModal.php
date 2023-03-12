<div class="modal fade text-color2" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-color1">

      <div class="modal-header d-block">
        <div class="d-flex">
          <h2 class="modal-title fs-5" id="nombreProducto"></h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" title="Cerrar"></button>
        </div>

        <h3 class="modal-title fs-6" id="definicionProducto"></h3>
      </div>
      <form action="<?= base_url?>menus/orderproduct" method="post" id="addProductForm">
        <input type="hidden" id="idProducto_input" name="idProducto_input">
        <input type="hidden" id="idCategoria_input" name="idCategoria_input">
        <div class="modal-footer">
          <label for="cantidad">Cantidad</label>
          <input type="number" class="text-color3 me-lg-4" id="cantidad" name="cantidad" value=1 min="1" max="10">
          <div class="text-center">
            <button type="button"  data-bs-dismiss="modal" title="Cerrar" class="button-1 modalAddProduct">Cerrar</button>
          </div>
          <div class="text-center">
            <button  type="submit" class="button-1 modalAddProduct">Añadir</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>