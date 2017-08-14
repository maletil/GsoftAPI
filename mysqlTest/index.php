<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 14/08/17
 * Time: 13:28
 */

require ('connection.php');
require ('functions.php');

// $conn = mysqlDBConnect('EEF97937877D','B2D6B919CAE265589296');

$arraydesalida = getArraySQL($_GET["sql"]);


function getUser() {

}



echo json_encode($arraydesalida);
