<?php
require_once('config/dataBase.php');

class ReviewDAO
{
    //inserta reseña
    public static function insertReview($valoracion, $titulo, $descripcion, $idPedido, $idUsuario)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("INSERT INTO valoraciones (valoracion, titulo, descripcion, idPedido, idUsuario) VALUES (?,?,?,?,?) ");

        //Adjunta las variables a la consulta
        $stmt->bind_param("sssii", $valoracion, $titulo, $descripcion, $idPedido, $idUsuario);

        //Ejecuta la sentencia
        $stmt->execute();

        $idValoracion = mysqli_insert_id($conn);

        $conn->close();

        return $idValoracion;
    }

    //actualiza reseña
    public static function updateReview($valoracion, $titulo, $descripcion, $idvaloracion)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("UPDATE valoraciones set valoracion = ?, titulo = ?, descripcion = ? WHERE idValoracion = ?");

        //Adjunta las variables a la consulta
        $stmt->bind_param("sssi", $valoracion, $titulo, $descripcion, $idvaloracion);

        //Ejecuta la sentencia
        $stmt->execute();

        $conn->close();
    }

    //consigue reseña
    public static function getReviewById($idValoracion)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("SELECT valoracion, titulo, descripcion FROM valoraciones WHERE idValoracion = ?");

        //Adjunta las variables a la consulta
        $stmt->bind_param("i", $idValoracion);

        //Ejecuta la sentencia
        $stmt->execute();

        $result = $stmt->get_result()->fetch_array(MYSQLI_ASSOC);

        $conn->close();

        return $result;
    }

    public static function getReviews($idUsuario)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("SELECT valoracion, titulo, descripcion FROM valoraciones WHERE idUsuario = ? ORDER BY valoracion DESC");

        $stmt->bind_param("i", $idUsuario);
        $stmt->execute();

        $result = $stmt->get_result();

        $reviews = [];
        while ($reviewDB = $result->fetch_array(MYSQLI_ASSOC)) {
            $reviews[] = $reviewDB;
        }

        $conn->close();

        return $reviews;
    }

    public static function removeReviewById($idvaloracion)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("DELETE from valoraciones WHERE idValoracion = ?");

        //Adjunta las variables a la consulta
        $stmt->bind_param("i", $idvaloracion);

        //Ejecuta la sentencia
        $stmt->execute();

        $conn->close();
    }

}
