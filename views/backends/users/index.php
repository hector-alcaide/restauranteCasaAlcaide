<div class="contenedor bg-image1 pb-5">
  <h1>BACKEND</h1>
  <div class="row contenedor">
    <button class="tab col-lg-2 text-color2" id="productsBttn">Productos</button>
    <button class="tab col-lg-2 tab-right text-color1"><span class="active-tab">Usuarios</span></button>
    <div class="col-lg-8 tab-header-border"></div>
  </div>
  <section class="contentPage py-5 mb-5">
    <h2 class="py-3">USUARIOS</h2>
    <div class="row pt-5 pb-3 contenedor">
      <div class="col-lg-4 col-12">
        <a href="<?= base_url ?>backends/adduser"><button class="button-1">AÑADIR</button></a>
      </div>
      <div class="col-lg-4 col-12">
        <form action="<?= base_url ?>backends/edituser" method="post">
          <input type="hidden" value="" name="idUsuario_edit" id="id_edit">
          <a id="edit"><button class="button-1">EDITAR</button></a>
        </form>
      </div>
      <div class="col-lg-4 col-12">
        <form action="<?= base_url ?>backends/removeuser" method="post">
          <input type="hidden" value="" name="idUsuario_remove" id="id_remove">
          <a id="remove"><button class="button-1">ELIMINAR</button></a>
        </form>
      </div>
    </div>
    <div class="table-responsive tabla-admin mt-5 mb-0 mx-auto">
      <table class="table table-secondary table-striped text-font2 text-left">
        <thead>
          <tr>
            <th scope="col">idUsuario</th>
            <th scope="col">rol</th>
            <th scope="col">nombre</th>
            <th scope="col">apellidos</th>
            <th scope="col">direccion</th>
            <th scope="col">telefono</th>
            <th scope="col">email</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user) { ?>
            <tr>
              <td scope="row"><?= $user->getIdUsuario(); ?></td>
              <td scope="row"><?= $user->getRol(); ?></td>
              <td><?= $user->getNombre(); ?></td>
              <td><?= $user->getApellidos(); ?></td>
              <td><?= $user->getDireccion(); ?></td>
              <td><?= $user->getTelefono(); ?></td>
              <td><?= $user->getEmail(); ?></td>
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

  edit.addEventListener('click', editUser);
  remove.addEventListener('click', removeUser);

  function editUser() {
    let id = prompt('Introduce el id del usuario que deseas editar:');
    id_edit.value = id;
  }

  function removeUser() {
    let id = prompt('Introduce el id del usuario que deseas eliminar:');
    id_remove.value = id;
  }

  //redireccionar 
  const products = document.getElementById('productsBttn');
  const extras = document.getElementById('extrasBttn');

  products.addEventListener('mousedown', function(event) {
    const url = '<?= base_url ?>backends/products';
    if (event.button === 1) {
      event.preventDefault();
      window.open(url);
    } else {
      window.location.href = url;
    }
  });
</script>