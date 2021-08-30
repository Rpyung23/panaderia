<?php

function Conn()
{
    $conn_ = mysqli_connect('localhost','root','','panaderia',3306);

    if (!$conn_)
    {
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        return null;
    }else{
        return $conn_;
    }
}

?>