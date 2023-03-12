<?php
class common_helper
{
    /*
    * Devuelve la URL en la que se encuentra
    */
    public static function getUrl()
    {
        //https o http 
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? $url = "https://" : $url = "http://";
        //Añadre el host a la url
        $url .= $_SERVER['HTTP_HOST'];
        //Añade la ubicacion de la pagina a la url
        $url .= $_SERVER['REQUEST_URI'];
        return $url;
    }

    /*
    * Devuelve el nombre de la pagina 
    */
    public static function getPageName()
    {
        $pageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
        return $pageName;
    }

    /*
    * Devuelve el nombre del fichero(de la página que carga)
    */
    public static function getFileName()
    {
        $path_parts = pathinfo(common_helper::getPageName());
        return $path_parts['filename'];
    }

    /*
    * Funcion que te consigue la ultima posicion de un array para saber cual es el siguiente id a setear
    */
    // public static function getLastId(){}
    // public static function getLastPosition($objetos = array()){
    //     foreach ($objetos as $objeto) {

    //     }
    // }

    //Funcion para mostrar arrays, donde hay objetos como los productos, usando un foreach
    // public static function printArray($array){
    //     foreach ($array as $variable) {

    //     }
    // }

    //Funcion para pintar el array de cada categoria de productos
    public static function printArrayProducts($array)
    {
        foreach ($array as $variable) { ?>
            <div class="col-lg-6 col-12 py-2">
                <p class="pt-lg-2"><?= $variable->getNombre() ?></p>
                <div class="d-flex justify-content-center">
                    <p class="me-5 my-0 pt-1 text-color2"><?= $variable->getPrecio() . ' €' ?></p>
                    <button type="button" id="buttonAddProduct" class="px-0 py-0 border-0" data-bs-toggle="modal" data-bs-target="#addProductModal" data-bs-whatever="<?= $variable->__toString() ?>">
                        <div></div>
                    </button>
                </div>
            </div>
        <?php }
    }

    //Funcion para pintar los extras del producto
    public static function printArrayExtraProducts($array)
    {
        foreach ($array as $variable) {
            $idExtra = $variable->getIdExtra();
            $idCategoriaExtra = $variable->getIdCategoriaExtra();
            $extraProducto_input = 'extraProducto_input_' . $idExtra . '_' . $idCategoriaExtra; ?>
            <label for="<?= $extraProducto_input ?>"><?= $variable->getNombreExtra() . ' ' . $variable->getPrecio() ?> </label>
            <input type="checkbox" id="<?= $extraProducto_input ?>" name="<?= $extraProducto_input ?>" value="<?= $extraProducto_input ?>">
<?php }
    }

    //Funcion para pintar los inputs de extras por categorias
    public static function printExtrasInputs($arrays)
    { ?>
        <div class="modal-body">
        <h2 class="modal-title fs-5">Guarniciones</h2>
        <?php  foreach ($arrays as $array) {
            foreach ($array as $variable) {
            $idExtra = $variable->getIdExtra();
            $idCategoriaExtra = $variable->getIdCategoriaExtra();
            $extraProducto_input = 'extraProducto_input_' . $idExtra . '_' . $idCategoriaExtra; ?>
            <label for="<?= $extraProducto_input ?>"><?= $variable->getNombreExtra() . ' ' . $variable->getPrecio() ?> </label>
            <input type="checkbox" id="<?= $extraProducto_input ?>" name="<?= $extraProducto_input ?>" value="<?= $extraProducto_input ?>">
        </div>
        <?php }
        }
    }

    //Funcion que calcula si en el post hay extras del producto y devuelve su id
    public static function getExtrasAdded()
    {
        $values = $_POST;
        $strToCompare = 'extraProducto_input_';
        $extras = array();

        foreach ($values as $value) {
            $compare_string = similar_text($strToCompare, $value);
            if ($compare_string == 20) {
                $extraProducto = ltrim($value, $strToCompare);
                array_push($extras, $extraProducto);
            }
        }

        if ($extras != null) {
            return $extras;
        }
    }

    //Funcion calcula precio total
    public static function calcTotalPriceOrder(){
        $precioTotal = 0;
        foreach ($_SESSION['order'] as $key => $variable) {
            $producto = $variable->getProducto(); 
            $precioProducto = $producto->getPrecio();
            $precioTotal += $precioProducto;
        }
        return number_format($precioTotal,2);
    }

    public static function is_admin(){
        require_once('models/User.php');
        if(!isset($_SESSION))
            session_start();
        return isset($_SESSION['user']) ? $_SESSION['user']->getRol() == 'ADM' ? true : false : false;
    }
}
