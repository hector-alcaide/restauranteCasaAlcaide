<div class="modal fade text-color2" id="formreview_modal" tabindex="-1" aria-labelledby="formreview_modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-color1">
      <div class="modal-header d-block">
        <div class="d-flex">
          <h2 class="modal-title fs-5" id="titulo"></h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" title="Cerrar"></button>
        </div>
      </div>
      <div class="modal-body">
        <form class="w-100 mx-auto contact-form row" id="form_review">
          <input type="hidden" id="formtype" name="formtype">
          <div class="form-field col-lg-6 ">
            <select name="valoracion" id="valoracion" class="input-text" required>
              <option selected disabled value=""></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <label class="label input-filled" for="valoracion">Valoración</label>
          </div>
          <div class="form-field col-lg-6 ">
            <input name="titulo" id="titulo" class="input-text" type="text" required>
            <label class="label input-filled" for="titulo">Título</label>
          </div>
          <div class="form-field col-lg-12 textarea">
            <label class="input-filled" for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="input-text" cols="20" rows="10"></textarea>
          </div>
          <div class="form-field col-lg-12 text-left">
            <input class="button-1" type="submit" value="GUARDAR" data-bs-dismiss="modal">
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