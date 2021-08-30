<?php


if (file_exists('cors/cors.php')){
    require('cors/cors.php');
}else{
    require('../cors/cors.php');
}
if (file_exists('controler/ControlerProducto.php'))
{
    require('controler/ControlerProducto.php');
}else{
    require('../controler/ControlerProducto.php');
}
$json = json_decode(file_get_contents('php://input'),true);

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        $result = readProductosController();
        $arraysVol = null;
        for($i = 0;$i < sizeof($result);$i++)
        {
            $arraysVol[$i] = array("nombre"=>$result[$i]->getNombre()
            ,"descrip"=>$result[$i]->getDescripcion()
            ,"precio"=>$result[$i]->getPrecio()
            ,"foto"=>$result[$i]->getFoto()
            ,"codigo"=>$result[$i]->getCodProducto());
        }
        $arrays = array('datos'=>$arraysVol);
        echo json_encode($arrays);
        break;
    case 'POST':
        $result = insertProducto($json);
        $arrays = array('datos'=>$result);
        echo json_encode($arrays);
        break;
    case 'UPDATE':
        $result = updateProductoControler($json);
        $arrays = array('datos'=>$result);
        echo json_encode($arrays);
        break;
    case 'DELETE':
        $result = deleteProductoControler($json);
        $arrays = array('datos'=>$result);
        echo json_encode($arrays);
        break;
}

?>