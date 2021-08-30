<?php


if (file_exists('cors/cors.php')){
    require('cors/cors.php');
}else{
    require('../cors/cors.php');
}
if (file_exists('controler/ControlerProvedor.php'))
{
    require('controler/ControlerProvedor.php');
}else{
    require('../controler/ControlerProvedor.php');
}
$json = json_decode(file_get_contents('php://input'),true);

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        $result = readProvedoresController();
        $arraysVol = null;
        for($i = 0;$i < sizeof($result);$i++)
        {
            $arraysVol[$i] = array("code"=>$result[$i]->getCodigo()
            ,"nombre"=>$result[$i]->getNombre()
            ,"dir"=>$result[$i]->getDirecc()
            ,"tel"=>$result[$i]->getTelefono()
            ,"email"=>$result[$i]->getEmail()
            ,"encarg"=>$result[$i]->getEncargado());
        }
        $arrays = array('datos'=>$arraysVol);
        echo json_encode($arrays);
        break;
    case 'POST':
        $result = insertProvedores($json);
        $arrays = array('datos'=>$result);
        echo json_encode($arrays);
        break;
    case 'PUT':
        $result = updateProvedoresControler($json);
        $arrays = array('datos'=>$result);
        echo json_encode($arrays);
        break;
    case 'DELETE':
        $result = deleteProvedoresControler($json);
        $arrays = array('datos'=>$result);
        echo json_encode($arrays);
        break;
}

?>