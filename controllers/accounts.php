<?php
class accounts
{
    public function index()
    {
        //Carga archivos necesarios para utilizar en las vistas
        require_once("controllers/helpers/common_helper.php");
        require_once("config/parameters.php");
        session_start();

        //si el usuario esta logeado carga pagina cuenta sino la de login
        $page = isset($_SESSION['user']) ? 'index' : 'login';

        //carga vistas
        require_once('views/templates/header.php');
        require_once('views/accounts/' . $page . '.php');
        require_once('views/templates/footer.php');
    }

    public function login()
    {
        session_start();
        if (!isset($_SESSION['user']))
            header("Location:" . base_url . "accounts/index");

        if (!isset($_POST['login']))
            header("Location:" . base_url . "accounts/index");

        require_once("models/UserDAO.php");

        //Devuelve el usuario con el email introducido
        $return = UserDAO::getUserIfExist($_POST['email']);

        //Comprueba si la contraseña del usuario es igual a la introducida al logear se
        $psw_verify = password_verify($_POST['password'], $return->getContrasena());

        //si la contraseña es correcta el usuario se logea y se introduce en sesion
        if ($psw_verify === true) {
            $_SESSION['user'] = $return;
        }

        header("Location:" . base_url . "accounts/index");
    }

    public function register()
    {
        session_start();
        if (!isset($_SESSION['user']))
            header("Location:" . base_url . "accounts/index");

        if (!isset($_POST['register']))
            header("Location:" . base_url . "accounts/index");

        require_once("models/UserDAO.php");

        //encripta la contraseña
        $encrypt_psw = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //registra el usuario y lo devuelve
        $return = UserDAO::registerUser($_POST['name'], $_POST['lastname'], $_POST['address'], $_POST['phone'], $_POST['email'], $encrypt_psw);

        //inserta el nuevo usuario creado a la sesion 
        if (isset($return) && $return) {
            $_SESSION['user'] = $return;
        }

        header("Location:" . base_url . "accounts/index");
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location:" . base_url . "accounts/index");
    }

    public function edit()
    {
        session_start();

        if (!isset($_SESSION['user']))
            header("Location:" . base_url . "accounts/index");

        require_once("controllers/helpers/common_helper.php");

        //carga vistas
        require_once('views/templates/header.php');
        require_once('views/accounts/edit.php');
        require_once('views/templates/footer.php');
    }

    public function update()
    {
        session_start();

        if (!isset($_SESSION['user']))
            header("Location:" . base_url . "accounts/index");

        if (!isset($_POST['id_user']))
            header("Location:" . base_url . "accounts/index");

        require_once("models/UserDAO.php");

        //sólo si hay post de password se actualiza
        if (isset($_POST['password']) && $_POST['password']) {
            $encrypt_psw = password_hash($_POST['password'], PASSWORD_DEFAULT);
            UserDAO::updateUserPass($encrypt_psw, $_POST['id_user']);
        }

        //registra el usuario y lo devuelve
        $return = UserDAO::updateUser($_POST['name'], $_POST['lastname'], $_POST['address'], $_POST['phone'], $_POST['email'], $_POST['id_user']);

        //cambia los datos del usuario de la sesion 
        if (isset($return) && $return) {
            $_SESSION['user'] = $return;
        }

        header("Location:" . base_url . "accounts/index");
    }

    public function userorders()
    {
        session_start();

        if (!isset($_SESSION['user']))
            header("Location:" . base_url . "accounts/index");

        require_once("controllers/helpers/common_helper.php");
        require_once("models/OrderDAO.php");
        require_once("models/ReviewDAO.php");
        require_once("models/User.php");

        $orders = OrderDAO::getPedidosByUser($_SESSION['user']->getIdUsuario());
        
        $scripts_array = [
            '<script src="../../assets/js/review_orders.js"></script>'
        ];

        //carga vistas
        require_once('views/templates/header.php');
        require_once('views/includes/formReviewModal.php');
        require_once('views/accounts/userorders.php');
        require_once('views/templates/footer.php');
    }

    public function removeaccount()
    {
        session_start();

        if (!isset($_SESSION['user']))
            header("Location:" . base_url . "accounts/index");

        require_once("models/UserDAO.php");
        require_once("models/OrderDAO.php");
        require_once("models/user.php");

        //elimina los pedidos productos del usuario
        OrderDAO::removeOrdersProductsByUser($_SESSION['user']->getIdUsuario());

        //elimina el usuario junto con sus pedidos, en delete cascade
        UserDAO::removeUser($_SESSION['user']->getIdUsuario());

        unset($_SESSION['user']);
        
        header("Location:" . base_url . "accounts/index");
    }
}
