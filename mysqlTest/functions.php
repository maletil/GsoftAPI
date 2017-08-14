<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 14/08/17
 * Time: 19:38
 */

function getArraySQL($sql){
    //Creamos la conexión con la función anterior
    $conn = mysqlDBConnect();

    //generamos la consulta

    mysqli_set_charset($conn, "utf8"); //formato de datos utf8

    if(!$result = mysqli_query($conn, $sql)) die(); //si la conexión cancelar programa

    $rawdata = array(); //creamos un array

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;

    while($row = mysqli_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;
    }

    mysqlDBDisconnect($conn); //desconectamos la base de datos

    return $rawdata; //devolvemos el array
}