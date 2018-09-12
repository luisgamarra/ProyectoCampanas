<?php

//funcion para conectarnos a una bd
function conectar(){
    $con = new mysqli("localhost", "root", "","bdcampanias");
    $con->set_charset("utf8");    
    
    return $con;
}
//funcion para ejecutar una consutla
function ejecutar($sql){
    $res = mysqli_query(conectar(),$sql);

    return $res;
}

?>