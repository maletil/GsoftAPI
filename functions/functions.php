<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 14/08/17
 * Time: 19:38
 */

function getArraySQL($sql){
    $conn = mysqlDBConnect(); //From 'connection.php'

    if(!$result = mysqli_query($conn, $sql)) die();

    $rawdata = array();
    $i=0;

    while($row = mysqli_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;
    }
    mysqlDBDisconnect($conn);
    return $rawdata;
}

function sqlRequest ($sql, $auth){
    require ('connection.php');
    //TODO comprobar authcode
    $arraydesalida = getArraySQL($sql);
    return json_encode($arraydesalida);

}