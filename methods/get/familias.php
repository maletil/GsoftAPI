<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 25/08/17
 * Time: 17:35
 */

require('../../functions/functions.php');

if (isset($_GET["auth"])){
    $auth = $_GET["auth"];
    $debug = false;

    $output = "SELECT Codigo, Nombre FROM familias ORDER BY Codigo ASC";
    if ($debug){echo "{" . $output . "}";}
    header('Content-Type: application/json');
    echo sqlRequest($output, $auth);
}