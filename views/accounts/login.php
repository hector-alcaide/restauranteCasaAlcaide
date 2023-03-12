<div class="contenedor bg-image1 pb-5">
  <h1>INICIAR SESIÓN</h1>
  <div class="row contenedor">
    <button class="tab col-lg-2 text-color1" id="loginBttn"><span class="active-tab">Inicio de sesión</span></button>
    <button class="tab tab-right col-lg-2 text-color2" id="registerBttn"><span>Registro</span></button>
    <div class="col-lg-8 tab-header-border"></div>
  </div>
  <section class="contentPage py-5 mb-5">
    <section class="loginForm mx-auto" id="loginSection">
      <form class="w-100 mx-auto contact-form row" action="<?= base_url ?>accounts/login" method="POST">
        <input type="hidden" name="login" value="1">
        <div class="form-field col-lg-6 ">
          <input name="email" id="email" class="input-text" type="email" required>
          <label class="label" for="email">E-mail</label>
        </div>
        <div class="form-field col-lg-6">
          <input name="password" id="password" class="input-text" type="password" required>
          <label class="label" for="password">Contraseña</label>
        </div>
        <div class="form-field col-lg-12 text-left">
          <input class="button-1" type="submit" value="INICIAR SESIÓN">
        </div>
      </form>
    </section>
    <section class="loginForm mx-auto" id="registerSection" style="display: none;">
      <form class="w-100 mx-auto contact-form row" action="<?= base_url ?>accounts/register" method="POST">
        <input type="hidden" name="register" value="1">
        <div class="form-field col-lg-6 ">
          <input name="name" id="name" class="input-text" type="text" required>
          <label class="label" for="name">Nombre</label>
        </div>
        <div class="form-field col-lg-6">
          <input name="lastname" id="lastname" class="input-text" type="text">
          <label class="label" for="lastname">Apellidos</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input name="email" id="email" class="input-text" type="email" required>
          <label class="label" for="email">E-mail</label>
        </div>
        <div class="form-field col-lg-6">
          <input name="password" id="password" class="input-text" type="password" required>
          <label class="label" for="password">Contraseña</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input name="phone" id="phone" class="input-text" type="text">
          <label class="label" for="phone">Número de teléfono</label>
        </div>
        <div class="form-field col-lg-6 ">
          <input name="address" id="address" class="input-text" type="text">
          <label class="label" for="address">Dirección</label>
        </div>
        <div class="form-field col-lg-12 text-left">
          <input class="button-1" type="submit" value="REGISTRAR SE">
        </div>
      </form>
    </section>
  </section>
</div>
<script>
  const login = document.getElementById('loginSection');
  const register = document.getElementById('registerSection');

  const registerBttn = document.getElementById('registerBttn');
  const loginBttn = document.getElementById('loginBttn');

  loginBttn.addEventListener('click', displayLogin);
  registerBttn.addEventListener('click', displayRegister);

  function displayLogin() {
    login.style.display = 'block';
    loginBttn.childNodes[0].classList.add('active-tab');

    register.style.display = 'none';
    registerBttn.childNodes[0].classList.remove('active-tab');
  }

  function displayRegister() {
    login.style.display = 'none';
    loginBttn.childNodes[0].classList.remove('active-tab');

    register.style.display = 'block';
    registerBttn.childNodes[0].classList.add("active-tab");
  }
</script>