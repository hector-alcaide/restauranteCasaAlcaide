<?php
class backends
{
    public function index()
    {
        header("Location:" . base_url . "backends/products");
    }

    public function products()
    {
        session_start();
        require_once("controllers/helpers/common_helper.php");
        //si rol no es admin envia fuera
        if (!common_helper::is_admin() || !isset($_SESSION['user']))
            header("Location:" . base_url . "homes/index");

        require_once("models/productDAO.php");
        require_once("models/product.php");

        //devuelve todos los productos
        $productos = ProductDAO::getAll();

        //carga vistas
        require_once('views/templates/header.php');
        require_once('views/backends/products/index.php');
        require_once('views/templates/footer.php');
    }

    public function addproduct()
    {
        session_start();
        require_once("controllers/helpers/common_helper.php");

        if (!common_helper::is_admin() || !isset($_SESSION['user']))
            header("Location:" . base_url . "homes/index");

        //si hay post añade el producto sino carga la vista para mostrar form de añadir
        if (isset($_POST['addproduct_input'])) {
            require_once("models/productDAO.php");

            //añade producto
            ProductDAO::addProduct($_POST['name_product'], $_POST['def_product'], $_POST['price_product'], $_POST['idcat_product']);
            header("Location:" . base_url . "backends/products");
        } else {
            //carga vistas
            require_once('views/templates/header.php');
            require_once('views/backends/products/create.php');
            require_once('views/templates/footer.php');
        }
    }

    public function editproduct()
    {
        session_start();
        require_once("controllers/helpers/common_helper.php");
        require_once("models/productDAO.php");

        if (!common_helper::is_admin() || !isset($_SESSION['user']))
            header("Location:" . base_url . "homes/index");

        $producto = ProductDAO::getById($_POST['idProducto_edit']);

        //si no hay producto redirige a productos
        if (isset($producto) && $producto) {
            //si hay post de editar lo edita sino carga vista
            if (isset($_POST['editproduct_input'])) {

                //edita producto
                ProductDAO::editProduct($_POST['name_product'], $_POST['def_product'], $_POST['price_product'], $_POST['idcat_product'], $_POST['idProducto_edit']);
                header("Location:" . base_url . "backends/products");
            } else {
                //carga vistas
                require_once('views/templates/header.php');
                require_once('views/backends/products/edit.php');
                require_once('views/templates/footer.php');
            }
        } else {
            header("Location:" . base_url . "backends/products");
        }
    }

    public function removeproduct()
    {
        session_start();
        require_once("controllers/helpers/common_helper.php");

        if (!common_helper::is_admin() || !isset($_SESSION['user']))
            header("Location:" . base_url . "homes/index");

        //si no hay post de id redirige a productos
        if (isset($_POST['idProducto_remove'])) {
            require_once("models/productDAO.php");
            //lo elimina y redirige a la pagina de productos
            ProductDAO::removeProduct($_POST['idProducto_remove']);
            header("Location:" . base_url . "backends/products");
        } else {
            header("Location:" . base_url . "backends/products");
        }
    }

    public function users()
    {
        session_start();
        require_once("controllers/helpers/common_helper.php");
        //si rol no es admin envia fuera
        if (!common_helper::is_admin() || !isset($_SESSION['user']))
            header("Location:" . base_url . "homes/index");

        require_once("models/userDAO.php");

        //devuelve todos los usuarios
        $users = UserDAO::getAll();

        //carga vistas
        require_once('views/templates/header.php');
        require_once('views/backends/users/index.php');
        require_once('views/templates/footer.php');
    }

    public function adduser()
    {
        session_start();
        require_once("controllers/helpers/common_helper.php");

        if (!common_helper::is_admin() || !isset($_SESSION['user']))
            header("Location:" . base_url . "homes/index");

        //si hay post añade el usuario sino carga la vista para mostrar form de añadir
        if (isset($_POST['adduser_input'])) {
            require_once("models/userDAO.php");

            //encripta la contraseña
            $encrypt_psw = password_hash($_POST['password_user'], PASSWORD_DEFAULT);

            //añade usuario
            UserDAO::addUser($_POST['rol_user'], $_POST['name_user'], $_POST['lastname_user'], $_POST['address_user'], $_POST['phone_user'], $_POST['email_user'], $encrypt_psw);
            header("Location:" . base_url . "backends/users");
        } else {
            //carga vistas
            require_once('views/templates/header.php');
            require_once('views/backends/users/create.php');
            require_once('views/templates/footer.php');
        }
    }

    public function edituser()
    {
        session_start();
        require_once("controllers/helpers/common_helper.php");
        require_once("models/userDAO.php");

        if (!common_helper::is_admin() || !isset($_SESSION['user']))
            header("Location:" . base_url . "homes/index");

        $user = UserDAO::getById($_POST['idUsuario_edit']);

        //si no hay usuario redirige a usuarios
        if (isset($user) && $user) {
            //si hay post de editar lo edita sino carga vista
            if (isset($_POST['edituser_input'])) {
                //sólo si hay post de password se actualiza
                if (isset($_POST['password_user']) && $_POST['password_user']) {
                    $encrypt_psw = password_hash($_POST['password_user'], PASSWORD_DEFAULT);
                    UserDAO::updateUserPass($encrypt_psw, $_POST['idUsuario_edit']);
                }

                //edita usuario
                UserDAO::editUser($_POST['rol_user'], $_POST['name_user'], $_POST['lastname_user'], $_POST['address_user'], $_POST['phone_user'], $_POST['email_user'], $_POST['idUsuario_edit']);
                header("Location:" . base_url . "backends/users");
            } else {
                //carga vistas
                require_once('views/templates/header.php');
                require_once('views/backends/users/edit.php');
                require_once('views/templates/footer.php');
            }
        } else {
            header("Location:" . base_url . "backends/users");
        }
    }

    public function removeuser()
    {
        session_start();
        require_once("controllers/helpers/common_helper.php");

        if (!common_helper::is_admin() || !isset($_SESSION['user']))
            header("Location:" . base_url . "homes/index");

        //si no hay post de id redirige a usuarios
        if (isset($_POST['idUsuario_remove'])) {
            require_once("models/userDAO.php");
            //lo elimina y redirige a la pagina de usuarios
            UserDAO::removeUser($_POST['idUsuario_remove']);
            header("Location:" . base_url . "backends/users");
        } else {
            header("Location:" . base_url . "backends/users");
        }
    }
}
