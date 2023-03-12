<?php
class orders
{
    public function index()
    {

        //Carga archivos necesarios para utilizar en las vistas
        require_once("controllers/helpers/common_helper.php");
        require_once("models/Order.php");
        require_once("models/product.php");

        session_start();
        //comprueba si hay pedidos en sesion y suma o baja la cantidad
        $this->setcantidad();
        $this->setcookie();

        //carga vistas
        require_once('views/templates/header.php');
        require_once('views/orders.php');
        require_once('views/templates/footer.php');

        unset($_SESSION['messages']);
    }

    public function setcantidad()
    {
        $orders = null;
        if (isset($_SESSION['order'])) {
            $orders = $_SESSION['order'];
        }
        //Comprueba si hay post de sumar o restar cantidad para setear la cantidad en el pedido
        if (isset($_POST['sumaCantidad'])) {
            $cantidad = $orders[$_POST['sumaCantidad']]->getCantidad();
            $orders[$_POST['sumaCantidad']]->setCantidad($cantidad + 1);
        } else if (isset($_POST['restaCantidad'])) {
            $cantidad = $orders[$_POST['restaCantidad']]->getCantidad();
            $orders[$_POST['restaCantidad']]->setCantidad($cantidad - 1);
            $cantidad = $orders[$_POST['restaCantidad']]->getCantidad();
            //Comprueba si la cantidad del pedido es 0 y la borra
            if ($cantidad <= 0) {
                // $_SESSION['order'][$_POST['restaCantidad']] = [];
                unset($_SESSION['order'][$_POST['restaCantidad']]);
            }
        }
    }

    public function setcookie()
    {
        require_once("controllers/helpers/common_helper.php");

        //Crear cookie
        if (isset($_SESSION['order'])) {
            $precioTotal = common_helper::calcTotalPriceOrder();
            if (!isset($_COOKIE['ultimoPedido'])) {
                unset($_COOKIE['ultimoPedido']);
                setcookie('ultimoPedido', $precioTotal, time() + (86400 * 7));
            }
        }
    }

    public function finishorder()
    {
        //Carga archivos necesarios para utilizar en las vistas
        require_once("controllers/helpers/common_helper.php");
        require_once("models/Order.php");
        require_once("models/OrderDAO.php");
        require_once("models/product.php");
        session_start();
        if (empty($_SESSION['order']) || empty($_SESSION['user'])) {
            $_SESSION['messages'] = 'Inicia sesión o registra te para poder efectuar el pago.';
            header("Location:" . base_url . "orders/index");
        }

        //inserta en bbdd el pedido y devuelve el id
        $order_id = OrderDAO::insertOrder(common_helper::calcTotalPriceOrder(), $_SESSION['user']->getIdUsuario());

        //inserta en bbdd el pedidoproducto
        foreach ($_SESSION['order'] as $order) {
            $producto = $order->getProducto();
            OrderDAO::insertOrderProduct($order->getCantidad(), $producto->getIdProducto(), $order_id);
        }

        $orders = $_SESSION['order'];

        //carga vistas
        require_once('views/templates/header.php');
        require_once('views/finishedorder.php');
        require_once('views/templates/footer.php');
        
        unset($_SESSION['order']);
    }
}
