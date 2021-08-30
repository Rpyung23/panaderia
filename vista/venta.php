<?php


if (file_exists('cors/cors.php')){
    require('cors/cors.php');
}else{
    require('../cors/cors.php');
}
if (file_exists('controler/ControlerVenta.php'))
{
    require('controler/ControlerVenta.php');
}else{
    require('../controler/ControlerVenta.php');
}
$json = json_decode(file_get_contents('php://input'),true);

switch ($_SERVER['REQUEST_METHOD'])
{

    case 'POST':
        $result = insertVentaControler($json);
        $arrays = array('datos'=>$result);
        echo json_encode($arrays);
        break;
}

?>