<div class="modal fade text-color2" id="formreview_modal" tabindex="-1" aria-labelledby="formreview_modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-color1">
      <div class="modal-header d-block">
        <div class="d-flex">
          <h2 class="modal-title fs-5" id="nombreProducto"></h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" title="Cerrar"></button>
        </div>

        <h3 class="modal-title fs-6" id="definicionProducto"></h3>
      </div>
      <div class="modal-body">
        <form class="w-100 mx-auto contact-form row" id="form_review">
          <input type="hidden" id="formtype" name="formtype">
          <div class="form-field col-lg-6 ">
            <input name="valoracion" id="valoracion" class="input-text" type="number" required>
            <label class="label" for="valoracion">Valoración</label>
          </div>
          <div class="form-field col-lg-6 ">
            <input name="titulo" id="titulo" class="input-text" type="text" required>
            <label class="label" for="titulo">Título</label>
          </div>
          <div class="form-field col-lg-6">
            <input name="descripcion" id="descripcion" class="input-text" type="text-area" required>
            <label class="label" for="descripcion">Descripción</label>
          </div>
          <div class="form-field col-lg-12 text-left">
            <input class="button-1" type="submit" value="GUARDAR">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="text-center">
          <button type="button" data-bs-dismiss="modal" title="Cerrar" class="button-1 modalAddProduct">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>