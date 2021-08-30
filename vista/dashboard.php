<?php

if (file_exists('cors/cors.php')){
    require('cors/cors.php');
}else{
    require('../cors/cors.php');
}
if (file_exists('controler/ControlerDashboard.php'))
{
    require('controler/ControlerDashboard.php');
}else{
    require('../controler/ControlerDashboard.php');
}
$json = json_decode(file_get_contents('php://input'),true);

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        $result = DashboardControler();
        echo json_encode($result);
        break;
}


?>