<div class="contenedor bg-image1 pb-5">
  <h1>EDITAR USUARIO</h1>
  <div class="row contenedor">
    <button class="tab col-lg-2 text-color1" id="returnBttn">Volver</button>
    <div class="col-lg-10 tab-header-border"></div>
  </div>
  <section class="contentPage">
    <section class="loginForm mx-auto" id="registerSection">
      <form class="w-100 mx-auto contact-form row" action="<?= base_url ?>backends/edituser" method="POST">
        <input type="hidden" name="idUsuario_edit" value="<?= $user->getIdUsuario() ?>">
        <input type="hidden" name="edituser_input" value="1">
        <div class="form-field col-lg-6 ">
          <input name="name_user" id="name_user" class="input-text" type="text" value="<?= $user->getNombre() ?>" required>
          <label class="label" for="name_user">Nombre</label>
        </div>
        <div class="form-field col-lg-6">
          <input name="lastname_user" id="lastname_user" class="input-text" value="<?= $user->getApellidos() ?>" type="text-area" required>
          <label class="label" for="lastname_user">Apellidos</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input name="email_user" id="email_user" class="input-text" type="email" value="<?= $user->getEmail() ?>" required>
          <label class="label" for="email_user">E-mail</label>
        </div>
        <div class="form-field col-lg-6">
          <input name="password_user" id="password_user" class="input-text" type="password" value="">
          <label class="label" for="password_user">Contraseña</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input name="phone_user" id="phone_user" class="input-text" type="text" value="<?= $user->getTelefono() ?>">
          <label class="label" for="phone_user">Número de teléfono</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input name="address_user" id="address_user" class="input-text" type="text" value="<?= $user->getDireccion() ?>">
          <label class="label" for="address_user">Dirección</label>
        </div>
        <div class="form-field col-lg-6">
          <select name="rol_user" id="rol_user" class="input-text" required>
            <option selected disabled value=""></option>
            <option value="CLI">Cliente</option>
            <option value="ADM">Administrador</option>
          </select>
          <label class="label" for="rol_user">Rol</label>
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
    window.location.href = '<?= base_url ?>backends/users';
  });

  const rol = '<?= $user->getRol() ?>';
  console.log(rol);
  let pos;
  pos = rol == 'CLI' ? 1 : 2;
  document.getElementById('rol_user').getElementsByTagName('option')[pos].selected = 'selected';
</script>