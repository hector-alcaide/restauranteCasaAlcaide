<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
class reviewsAPI
{
    public function addReview()
    {
        require_once("models/ReviewDAO.php");
        require_once("models/User.php");
        session_start();

        $return = reviewDAO::insertReview($_POST['valoracion'], $_POST['titulo'], $_POST['descripcion'], $_POST['idPedido'], $_SESSION['user']->getIdUsuario());

        $response = [
            'status' => 'success',
            'message' => 'Valoración añadida correctamente.',
            'idValoracion' => $return,
        ];

        echo json_encode($response);
    }

    public function editReview()
    {
        require_once("models/ReviewDAO.php");

        $return = reviewDAO::updateReview($_POST['valoracion'], $_POST['titulo'], $_POST['descripcion'], $_POST['idValoracion']);

        $response = [
            'status' => 'success',
            'message' => 'Valoración editada correctamente.',
            'idValoracion' => $return,
        ];

        echo json_encode($response);
    }

    public function getReviewById()
    {
        require_once("models/ReviewDAO.php");

        $return = ReviewDAO::getReviewById($_POST['idValoracion']);

        echo json_encode($return);
    }

    public function getReviews()
    {
        require_once("models/ReviewDAO.php");

        $return = ReviewDAO::getReviews();

        echo json_encode($return);
    }

    public function getUserOrders()
    {
        require_once("models/OrderDAO.php");
        session_start();

        $orders = OrderDAO::getPedidosByUser($_SESSION['user']->getIdUsuario());

        echo json_encode($orders);
    }

    public function removeReviewById()
    {
        require_once("models/ReviewDAO.php");

        reviewDAO::removeReviewById($_POST['idValoracion']);

        $response = [
            'status' => 'success',
            'message' => 'Valoración eliminada correctamente.'
        ];

        echo json_encode($response);
    }
}
