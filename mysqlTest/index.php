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


if (isset($_GET["sql"]) && $_GET["auth"]) {
    //TODO comprobar authcode
    apiRequest($_GET["sql"]);
}

function apiRequest ($sql){
        $arraydesalida = getArraySQL($sql);

        echo json_encode($arraydesalida);

} // else {echo ("{\"error\":\"Empty query.\"}");}


/*function apiRequest ($sql, $auth) {
if (isset($_GET["sql"])) {
    $arraydesalida = getArraySQL($_GET["sql"]);
*/