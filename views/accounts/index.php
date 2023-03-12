<?php $user = $_SESSION['user']; ?>
<div class="contenedor bg-image1 pb-5">
  <h1>CUENTA</h1>
  <div class="row contenedor">
    <button class="tab col-lg-2 text-color1"><span class="active-tab">Datos</span></button>
    <button class="tab tab-right col-lg-2 text-color2" id="ordersBttn"><span>Ver Pedidos</span></button>
    <div class="col-lg-8 tab-header-border"></div>
  </div>
  <section class="contentPage py-5 mb-5">
    <h2 class="py-3">TUS DATOS</h2>
    <div class="row pt-5 pb-3 anchoRow">
      <div class="col-lg-3 col-12 ps-lg-5">
        <p class="text-color2 text-font2 ps-lg-5 text-left ps-lg-5 text-left">Nombre:</p>
      </div>
      <div class="col-lg-3 col-12 pe-lg-5">
        <p class="text-color1 text-font1 pe-lg-5 text-left pe-lg-5 text-left"><?= $user->getNombre() ?></p>
      </div>
      <div class="col-lg-3 col-12 ps-lg-5">
        <p class="text-color2 text-font2 ps-lg-5 text-left">Apellidos:</p>
      </div>
      <div class="col-lg-3 col-12 pe-lg-5">
        <p class="text-color1 text-font1 pe-lg-5 text-left"><?= $user->getApellidos() ?></p>
      </div>
      <div class="col-lg-3 col-12 ps-lg-5">
        <p class="text-color2 text-font2 ps-lg-5 text-left">Email:</p>
      </div>
      <div class="col-lg-3 col-12 pe-lg-5">
        <p class="text-color1 text-font1 pe-lg-5 text-left"><?= $user->getEmail() ?></p>
      </div>
      <div class="col-lg-3 col-12 ps-lg-5">
        <p class="text-color2 text-font2 ps-lg-5 text-left">Teléfono:</p>
      </div>
      <div class="col-lg-3 col-12 pe-lg-5">
        <p class="text-color1 text-font1 pe-lg-5 text-left"><?= $user->getTelefono() ?></p>
      </div>
      <div class="col-lg-3 col-12 ps-lg-5">
        <p class="text-color2 text-font2 ps-lg-5 text-left">Dirección:</p>
      </div>
      <div class="col-lg-3 col-12 pe-lg-5">
        <p class="text-color1 text-font1 pe-lg-5 text-left"><?= $user->getDireccion() ?></p>
      </div>
    </div>
    <div class="row anchoRow py-5">
      <div class="col-lg-4 col-12">
        <a href="<?= base_url ?>accounts/edit"><button class="button-1">EDITAR CUENTA</button></a>
      </div>
      <div class="col-lg-4 col-12">
        <a href="<?= base_url ?>accounts/logout"><button class="button-1">CERRAR SESIÓN</button></a>
      </div>
      <div class="col-lg-4 col-12">
        <button class="button-1" id="removeAccount">ELIMINAR CUENTA</button>
      </div>
    </div>
  </section>
</div>
<script>
  //redireccionar 
  const orders = document.getElementById('ordersBttn');

  orders.addEventListener('mousedown', function(event) {
    const url = '<?= base_url ?>accounts/userorders';
    if (event.button === 1) {
      event.preventDefault();
      window.open(url);
    } else {
      window.location.href = url;
    }
  });

  const removeAccount = document.getElementById('removeAccount');
  removeAccount.addEventListener('click', function(event) {
    if(window.prompt("¿Realmente deseas eliminar tu cuenta? Se borrarán todos tus datos, incluidos los pedidos realizados. En ese caso escribe: 'ELIMINAR'.") === 'ELIMINAR'){
      window.location.href = '<?= base_url ?>accounts/removeaccount';
    }
  });

</script>