<?php

if (is_file('model/ModelDashboard.php'))
{
    require('model/ModelDashboard.php');
}else{
    require('../model/ModelDashboard.php');
}

function DashboardControler()
{
    return readDashboardModel();
}


?>