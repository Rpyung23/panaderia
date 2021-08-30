<?php

if (is_file('conn/conn.php'))
{
    require('conn/conn.php');
}else{
    require('../conn/conn.php');
}

if (is_file('poo/cUser.php'))
{
    require('poo/cUser.php');
}else{
    require('../poo/cUser.php');
}

if (is_file('session/session.php'))
{
    require('session/session.php');
}else{
    require('../session/session.php');
}

$objUsers = [];


function createUserModel($user,$pass,$names)
{
    $conn = Conn();
    $pass_cry = ($pass);

    $query = "insert into panaderia.usuarios(cod_usuario, nombres, passw,active)
              value('$user','$names','.$pass_cry.',1)";

    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    mysqli_autocommit($conn,false);

    try {
        $result = mysqli_query($conn,$query);
        mysqli_commit($conn);
        mysqli_close($conn);

        if ($result)
        {
            return true;
        }else{
            return false;
        }

    }catch (Exception $e)
    {
        //echo $e;
        mysqli_rollback($conn);
        mysqli_close($conn);
        return false;
    }
}
function readUserModel()
{
    $conn = Conn();
    $query = "select * from usuarios";
    $resultado = mysqli_query($conn,$query);

    if (mysqli_num_rows($resultado)>0)
    {
        while ($obj = mysqli_fetch_array($resultado))
        {
            $objUser = new cUser();
            $objUser->setNames($obj['nombres']);
            $objUser->setPass($obj['passw']);
            $objUser->setUser($obj['cod_usuario']);

            $objUsers[] = $objUser;
        }
        return $objUsers;
    }else{
        return $objUsers;
    }
}
function updatePassModel($codeUser,$pass)
{
    $pass_encry = md5($pass);
    $conn = Conn();
    $query = "update usuarios set passw = '$pass_encry' where cod_usuario = '$codeUser'";

    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    mysqli_autocommit($conn,false);

    try {
        mysqli_query($conn,$query);
        mysqli_commit($conn);
        return true;
    }catch (Exception $e)
    {
        mysqli_rollback($conn);
        return false;
    }


}
function deleteUserModel($codeUser)
{
    $conn = Conn();
    $query = "update usuarios set active = 0 where cod_usuario = '$codeUser'";

    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    mysqli_autocommit($conn,false);

    try {
        mysqli_query($conn,$query);
        mysqli_commit($conn);
        return true;
    }catch (Exception $e)
    {
        mysqli_rollback($conn);
        return false;
    }


}
function loginUserModel($user,$pass)
{
    $pass_encry = ($pass);
    $conn = Conn();

    $query = "select count(cod_usuario) as tot,cod_usuario from usuarios 
              where cod_usuario = '$user' and passw = '$pass_encry'";

    $resultado = mysqli_query($conn,$query);

    if (mysqli_num_rows($resultado)>0)
    {
        $obj = mysqli_fetch_array($resultado);

        if ($obj['tot'] > 0)
        {
            createSession($obj['cod_usuario']);
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


?>



