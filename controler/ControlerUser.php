<?php

if (is_file('model/ModelUser.php'))
{
    require('model/ModelUser.php');
}else{
    require('../model/ModelUser.php');
}

function LoginControler($user,$pass)
{
    return loginUserModel($user,$pass);
}


?>