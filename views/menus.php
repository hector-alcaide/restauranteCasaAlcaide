<div class="contenedor bg-image1">
  <h1>CARTA</h1>
  <section class="contentPage">
    <section class="categorias_mostrar pb-4">
      <div class="row bg-color2">
        <div class="col-lg-12">
          <p class="py-1 my-1">Categorías a mostrar</p>
        </div>
      </div>
      <div class="row text-left">
        <div class="col-lg-12 bg-color3">
            <div class="row py-2">
              <div class="col-lg-4">
                <label for="ensaladas_input">
                  Ensaladas
                </label>
                <input type="checkbox" id="ensaladas_input" checked>
              </div>
              <div class="col-lg-4">
                <label for="carnes_input">
                  Carnes
                </label>
                <input type="checkbox" id="carnes_input" checked>
              </div>
              <div class="col-lg-4">
                <label for="pescados_input">
                  Pescados
                </label>
                <input type="checkbox" id="pescados_input" checked>
              </div>
            </div>
            <div class="row py-2">
              <div class="col-lg-4">
                <label for="cervezas_input">
                  Cervezas
                </label>
                <input type="checkbox" id="cervezas_input" checked>
              </div>
              <div class="col-lg-4">
                <label for="vinos_input">
                  Vinos
                </label>
                <input type="checkbox" id="vinos_input" checked>
              </div>
              <div class="col-lg-4">
                <label for="postres_input">
                  Postres
                </label>
                <input type="checkbox" id="postres_input" checked>
              </div>
            </div>
            <div class="row py-2">
              <div class="col-lg-6">
                <label for="todos_input">
                  Seleccionar todas
                </label>
                <input type="checkbox" id="todos_input" checked>
              </div>
              <div class="col-lg-6">
              </div>
            </div>
        </div>
      </div>

    </section>
    <section class="border-2 border-bottom px-4" id="ensaladas">
      <h2>ENSALADAS</h2>
      <div class="d-flex justify-content-around py-4">
        <div id="imagenEnsaladas" class="imagenProductos mx-lg-3 my-lg-3" title="Imagen de ensalada categoría ensaladas">
        </div>
        <div class="row text-center me-lg-3 anchoProductos">
          <?php common_helper::printArrayProducts(ProductDAO::getAllByCategory(3)); ?>
        </div>
      </div>
    </section>
    <section class="border-2 border-bottom px-4" id="carnes">
      <h2 class="pt-4">CARNES</h2>
      <div class="d-flex justify-content-around py-4">
        <div class="row text-center me-lg-3 anchoProductos">
          <?php common_helper::printArrayProducts(ProductDAO::getAllByCategory(1)); ?>
        </div>
        <div id="imagenCarnes" class="imagenProductos mx-lg-3 my-lg-3" title="Imagen de carne categoría carnes">
        </div>
      </div>
    </section>
    <section class="border-2 border-bottom px-4" id="pescados">
      <h2 class="pt-4">PESCADOS</h2>
      <div class="d-flex justify-content-around py-4">
        <div id="imagenPescados" class="imagenProductos mx-lg-3 my-lg-3" title="Imagen de pescado categoría pescados">
        </div>
        <div class="row text-center me-lg-3 anchoProductos">
          <?php common_helper::printArrayProducts(ProductDAO::getAllByCategory(2)); ?>
        </div>
      </div>
    </section>
    <section class="border-2 border-bottom px-4" id="cervezas">
      <h2 class="pt-4">CERVEZAS</h2>
      <div class="d-flex justify-content-around py-4">
        <div class="row text-center me-lg-3 anchoProductos">
          <?php common_helper::printArrayProducts(ProductDAO::getAllByCategory(4)); ?>
        </div>
        <div id="imagenCervezas" class="imagenProductos mx-lg-3 my-lg-3" title="Imagen de cervezas categoría cervezas">
        </div>
      </div>
    </section>
    <section class="border-2 border-bottom px-4" id="vinos" title="Imagen de vinos categoría vinos">
      <h2 class="pt-4">VINOS</h2>
      <div class="d-flex justify-content-around py-4">
        <div id="imagenVinos" class="imagenProductos mx-lg-3 my-lg-3">
        </div>
        <div class="row text-center me-lg-3 anchoProductos">
          <?php common_helper::printArrayProducts(ProductDAO::getAllByCategory(5)); ?>
        </div>
      </div>
    </section>
    <section class="border-2 border-bottom px-4" id="postres" title="Imagen de postre categoría postres">
      <h2 class="pt-4">POSTRES</h2>
      <div class="d-flex justify-content-around py-4">
        <div class="row text-center me-lg-3 anchoProductos">
          <?php common_helper::printArrayProducts(ProductDAO::getAllByCategory(6)); ?>
        </div>
        <div id="imagenPostres" class="imagenProductos mx-lg-3 my-lg-3">
        </div>
      </div>
    </section>
  </section>
  <section class="py-5">
    <h2 class="pt-5">ACCEDE A LA PÁGINA DE PEDIDOS</h2>
    <div class="text-center py-5">
      <a href="<?= base_url ?>orders/index"><button class="button-1">REALIZAR PEDIDO</button></a>
    </div>
  </section>
</div>