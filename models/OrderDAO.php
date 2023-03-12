<?php
require_once('config/dataBase.php');
require_once('models/order.php');

class OrderDAO
{
    //inserta el pedido en pedidos
    public static function insertOrder($total, $usuario)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("INSERT INTO pedidos (importeTotal, idUsuario) VALUES (?,?) ");

        //Adjunta las variables a la consulta
        $stmt->bind_param("di", $total, $usuario);

        //Ejecuta la sentencia
        $stmt->execute();
        $idPedido = mysqli_insert_id($conn);

        $conn->close();

        return $idPedido;
    }

    //inserta en pedidos productos
    public static function insertOrderProduct($cantidad, $idproducto, $idpedido)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("INSERT INTO pedidosproductos (cantidad, idProducto, idPedido) VALUES (?,?,?) ");

        //Adjunta las variables a la consulta
        $stmt->bind_param("iii", $cantidad, $idproducto, $idpedido);

        //Ejecuta la sentencia
        $stmt->execute();

        $conn->close();
    }

    //devuelve los pedidos del usuario
    // public static function getPedidosByUser($iduser)
    // {
    //     $conn = dataBase::connect();
    //     $stmt = $conn->prepare("SELECT * from pedidos WHERE idUsuario = ? ORDER BY idPedido ASC");

    //     $stmt->bind_param("i", $iduser);

    //     $stmt->execute();

    //     $result = $stmt->get_result();

    //     $orders = [];
    //     while ($orderDB = $result->fetch_object("Order")) {
    //         $orders[] = $orderDB;
    //     }

    //     $conn->close();

    //     return $orders;
    // }


    //devuelve los pedidos del usuario
    public static function getPedidosByUser($iduser)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("
            SELECT p.idPedido, p.importeTotal, p.fechaAltaPedido, vl.idValoracion
            FROM pedidos p 
            LEFT JOIN valoraciones vl ON p.idPedido = vl.idPedido
            WHERE p.idUsuario = ?
            ORDER BY fechaAltaPedido DESC 
        ");

        $stmt->bind_param("i", $iduser);

        $stmt->execute();

        $result = $stmt->get_result();

        $orders = [];
        while ($orderDB = $result->fetch_array(MYSQLI_ASSOC)) {
            $orderDB['orderproducts'] = OrderDAO::getPedidosProductosByPedido($orderDB['idPedido']);
            $orders[] = $orderDB;
        }

        $conn->close();

        return $orders;
    }

    //devuelve los pedidosproductos, por idpedido
    public static function getPedidosProductosByPedido($idPedido)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("
        SELECT p.idPedido, pr.nombre, pr.definicion, pr.precio
        FROM pedidos p
        INNER JOIN pedidosproductos pp ON p.idPedido = pp.idPedido
        INNER JOIN productos pr ON pp.idProducto = pr.idProducto
        WHERE p.idPedido = ? ORDER BY precio
        ");

        $stmt->bind_param("i", $idPedido);

        $stmt->execute();

        $result = $stmt->get_result();

        $orders = [];
        while ($orderDB = $result->fetch_array(MYSQLI_ASSOC)) {
            $orders[] = $orderDB;
        }

        $conn->close();

        return $orders;
    }

    //elimina de pedidos con el id de usuario
    public static function removeOrdersByUser($iduser)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("DELETE from pedidos WHERE idUsuario = ?");

        $stmt->bind_param("i", $iduser);

        $stmt->execute();

        $conn->close();
    }

    //elimina de pedidos productos con el id de usuario
    public static function removeOrdersProductsByUser($iduser)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("DELETE FROM pedidosproductos WHERE idPedido IN (SELECT idPedido FROM pedidos WHERE idUsuario = ?)");

        $stmt->bind_param("i", $iduser);

        $stmt->execute();

        $conn->close();
    }
}
