<?php $user = $_SESSION['user']; ?>
<div class="contenedor bg-image1 pb-5">
  <h1>EDITAR CUENTA</h1>
  <div class="row contenedor">
    <button class="tab col-lg-2 text-color1" id="returnBttn">Volver</button>
    <div class="col-lg-10 tab-header-border"></div>
  </div>
  <section class="contentPage py-5 mb-5">
    <section class="loginForm mx-auto" id="registerSection">
      <form class="w-100 mx-auto contact-form row" action="<?= base_url ?>accounts/update" method="POST">
        <input type="hidden" name="id_user" value="<?= $user->getIdUsuario() ?>">
        <div class="form-field col-lg-6 ">
          <input name="name" id="name" class="input-text" type="text" value="<?= $user->getNombre() ?>" required>
          <label class="label" for="name">Nombre</label>
        </div>
        <div class="form-field col-lg-6">
          <input name="lastname" id="lastname" class="input-text" type="text" value="<?= $user->getApellidos() ?>">
          <label class="label" for="lastname">Apellidos</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input name="email" id="email" class="input-text" type="email" value="<?= $user->getEmail() ?>" required>
          <label class="label" for="email">E-mail</label>
        </div>
        <div class="form-field col-lg-6">
          <input name="password" id="password" class="input-text" type="password">
          <label class="label" for="password">Contraseña</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input name="phone" id="phone" class="input-text" type="text" value="<?= $user->getTelefono() ?>">
          <label class="label" for="phone">Número de teléfono</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input name="address" id="address" class="input-text" type="text" value="<?= $user->getDireccion() ?>">
          <label class="label" for="address">Dirección</label>
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
      window.location.href = '<?= base_url ?>accounts/index';
  });
</script>