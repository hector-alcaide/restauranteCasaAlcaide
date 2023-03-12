<?php
require_once('config/dataBase.php');
require_once('models/Product.php');
require_once('models/Meat.php');
require_once('models/Fish.php');
require_once('models/Salad.php');
require_once('models/Wine.php');
require_once('models/Beer.php');
require_once('models/Dessert.php');

class ProductDAO
{
    // private static $class_category = array('1' => 'Meat', '2' => 'Fish', '3' => 'Salad', '4' => 'Beer', '5' => 'Wine', '6' => 'Dessert');

    //devuelve todos los productos por categoria
    public static function getAllByCategory($category)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("SELECT * FROM productos WHERE idCategoria=?");

        //Adjunta las variables a la consulta
        $stmt->bind_param("i", $category);

        //Ejecuta la sentencia
        $stmt->execute();
        $result = $stmt->get_result();

        $products = [];

        //Constructor ha de estar vacío ya que los objetos no se crean, ya lo estan en la BBDD
        // while ($productDB = $result->fetch_object(self::$class_category[$category])) {
        //     $products[] = $productDB;
        // }

        while ($productDB = $result->fetch_object('Product')) {
            $products[] = $productDB;
        }

        $conn->close();

        return $products;
    }

    //devuelve todos los productos ordenado por categoria e id asc
    public static function getAll()
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("SELECT * FROM productos ORDER BY idProducto,idCategoria ASC");

        $stmt->execute();
        $result = $stmt->get_result();

        $products = [];
        while ($productDB = $result->fetch_object("Product")) {
            $products[] = $productDB;
        }

        $conn->close();

        return $products;
    }

    //devuelve producto por id
    public static function getById($id)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("SELECT * FROM productos WHERE idProducto=?");

        //Adjunta las variables a la consulta
        $stmt->bind_param("i", $id);

        //Ejecuta la sentencia
        $stmt->execute();
        $result = $stmt->get_result();

        //Constructor ha de estar vacío ya que los objetos no se crean, ya lo estan en la BBDD
        $product = $result->fetch_object("Product");

        $conn->close();

        return $product;
    }

    public static function addProduct($nombre, $definicion, $precio, $idCategoria)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("INSERT INTO productos (nombre, definicion, precio, idCategoria) VALUES(?,?,?,?)");

        $stmt->bind_param("ssdi", $nombre, $definicion, $precio, $idCategoria);
        $stmt->execute();

        $idproducto = mysqli_insert_id($conn);
        $conn->close();
    }

    public static function editProduct($nombre, $definicion, $precio, $idCategoria, $id)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("UPDATE PRODUCTOS SET nombre = ?, definicion = ?, precio = ?, idCategoria = ? WHERE idProducto = ?");

        $stmt->bind_param("ssdii", $nombre, $definicion, $precio, $idCategoria, $id);
        $stmt->execute();
        
        $idproducto = mysqli_insert_id($conn);
        $conn->close();
    }

    public static function removeProduct($id)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("DELETE from productos WHERE idProducto = ?");

        $stmt->bind_param("i", $id);
        $stmt->execute();
    
        $conn->close();
    }
}
