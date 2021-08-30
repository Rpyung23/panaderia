<?php

if (file_exists('cors/cors.php')){
    require('cors/cors.php');
}else{
    require('../cors/cors.php');
}
if (file_exists('controler/ControlerUser.php'))
{
    require('controler/ControlerUser.php');
}else{
    require('../controler/ControlerUser.php');
}
$json = json_decode(file_get_contents('php://input'),true);

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'POST':
        $result = LoginControler($json['user'],$json['pass']);
        $arrays = array('datos'=>$result);
        echo json_encode($arrays);
        break;
}


?>