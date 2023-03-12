<?php
class menus
{
    public function index()
    {
        //Carga archivos necesarios para utilizar en las vistas
        require_once("controllers/helpers/common_helper.php");
        require_once("models/ProductDAO.php");

        //carga vistas
        require_once('views/templates/header.php');
        require_once('views/includes/addProductModal.php');
        require_once('views/menus.php');
        require_once('views/templates/footer.php');
    }

    public function orderproduct()
    {
        require_once("models/ProductDAO.php");
        require_once("controllers/helpers/common_helper.php");
        require_once("models/Order.php");

        session_start();
        //si no existe sesion de pedido lo crea
        if (!isset($_SESSION['order']))
            $_SESSION['order'] = array();

        if (isset($_POST['idProducto_input'])) {
            $productoExiste = false;
            //comprueba si el producto existe antes de crear el pedido, para subirle la cantidad
            foreach ($_SESSION['order'] as $order) {
                if ($order->getProducto()->getIdProducto() == $_POST['idProducto_input']) {
                    $productoExiste = true;
                    $order->setCantidad($order->getCantidad() + $_POST['cantidad']); 
                }
            }

            if (!$productoExiste) {
                //Crea el pedido pasandole objeto producto y un array con los extras
                $order = new Order(ProductDAO::getById($_POST['idProducto_input']), common_helper::getExtrasAdded(), $_POST['cantidad'], null);
                array_push($_SESSION['order'], $order);
                unset($_POST);
            }
        }

        header("Location:" . base_url . "menus/index");
    }
}
