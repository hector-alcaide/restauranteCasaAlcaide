<div class="contenedor bg-image1 pb-5">
  <h1>AÑADIR PRODUCTO</h1>
  <div class="row contenedor">
    <button class="tab col-lg-2 text-color1" id="returnBttn">Volver</button>
    <div class="col-lg-10 tab-header-border"></div>
  </div>
  <section class="contentPage">
    <section class="loginForm mx-auto" id="registerSection">
      <form class="w-100 mx-auto contact-form row" action="<?= base_url ?>backends/addproduct" method="POST">
        <input type="hidden" name="addproduct_input" value="1">
        <div class="form-field col-lg-6 ">
          <input name="name_product" id="name_product" class="input-text" type="text" required>
          <label class="label" for="name_product">Nombre</label>
        </div>
        <div class="form-field col-lg-6">
          <input name="def_product" id="def_product" class="input-text" type="text-area" required>
          <label class="label" for="def_product">Descripción</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input name="price_product" id="price_product" class="input-text" type="number" pattern="^\d*(\.\d{0,2})?$" step=".01" required>
          <label class="label" for="price_product">Precio</label>
        </div>
        <div class="form-field col-lg-6">
          <select name="idcat_product" id="idcat_product" class="input-text" required>
            <option selected disabled value=""></option>
            <option value="1">Carnes</option>
            <option value="2">Pescados</option>
            <option value="3">Ensaladas</option>
            <option value="4">Cervezas</option>
            <option value="5">Vinos</option>
            <option value="6">Postres</option>
          </select>
          <label class="label" for="idcat_product">Categoría</label>
        </div>
        <div class="form-field col-lg-12 text-left">
          <input class="button-1" type="submit" value="GUARDAR">
        </div>
      </form>
    </section>
  </section>
</div>
<script>
  const goback = document.getElementById('returnBttn');

  goback.addEventListener('click', function(event) {
      window.location.href = '<?= base_url ?>backends/extras';
  });
</script>