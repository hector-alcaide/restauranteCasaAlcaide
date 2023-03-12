<div class="contenedor bg-image1 pb-5">
  <h1>BACKEND</h1>
  <div class="row contenedor">
    <button class="tab col-lg-2 text-color1"><span class="active-tab">Productos</span></button>
    <button class="tab col-lg-2 tab-right text-color2" id="usersBttn">Usuarios</button>
    <div class="col-lg-8 tab-header-border"></div>
  </div>
  <section class="contentPage py-5 mb-5">
    <h2 class="py-3">PRODUCTOS</h2>
    <div class="row pt-5 pb-3 contenedor">
      <div class="col-lg-4 col-12">
        <a href="<?= base_url ?>backends/addproduct"><button class="button-1">AÑADIR</button></a>
      </div>
      <div class="col-lg-4 col-12">
        <form action="<?= base_url ?>backends/editproduct" method="post">
          <input type="hidden" value="" name="idProducto_edit" id="id_edit">
          <a id="edit"><button class="button-1">EDITAR</button></a>
        </form>
      </div>
      <div class="col-lg-4 col-12">
        <form action="<?= base_url ?>backends/removeproduct" method="post">
          <input type="hidden" value="" name="idProducto_remove" id="id_remove">
          <a id="remove"><button class="button-1">ELIMINAR</button></a>
        </form>
      </div>
    </div>
    <div class="table-responsive tabla-admin mt-5 mb-0 mx-auto">
      <table class="table table-secondary table-striped text-font2 text-left">
        <thead>
          <tr>
            <th scope="col">idProducto</th>
            <th scope="col">nombre</th>
            <th scope="col">definicion</th>
            <th scope="col">precio</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($productos as $producto) { ?>
            <tr>
              <td scope="row"><?= $producto->getIdProducto(); ?></td>
              <td><?= $producto->getNombre(); ?></td>
              <td><?= $producto->getDefinicion(); ?></td>
              <td><?= $producto->getPrecio(); ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </section>
</div>
<script>
  const edit = document.getElementById('edit');
  const remove = document.getElementById('remove');

  const id_edit = document.getElementById('id_edit');
  const id_remove = document.getElementById('id_remove');

  edit.addEventListener('click', editProduct);
  remove.addEventListener('click', removeProduct);

  function editProduct() {
    let id = prompt('Introduce el id del producto que deseas editar:');
    id_edit.value = id;
  }

  function removeProduct() {
    let id = prompt('Introduce el id del producto que deseas eliminar:');
    id_remove.value = id;
  }

  //redireccionar 
  const users = document.getElementById('usersBttn');

  users.addEventListener('mousedown', function(event) {
    const url = '<?= base_url ?>backends/users';
    if (event.button === 1) {
      event.preventDefault();
      window.open(url);
    } else {
      window.location.href = url;
    }
  });
</script>