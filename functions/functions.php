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

    $sqlArray = array();
    while($row =mysqli_fetch_assoc($result)) {
        $sqlArray[] = $row;
    }
    return $sqlArray;
}

function sqlRequest ($sql, $auth){
    require ('connection.php');
    //TODO comprobar authcode
    $outputArray = getArraySQL($sql);
    return json_encode($outputArray);
}