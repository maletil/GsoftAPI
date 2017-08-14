<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 12/08/17
 * Time: 20:12
 */

$petition = [];

function request ($petition) {
    switch ((isset($_GET["format"]) ? $_GET["format"] : '')) {
        case 'json':
            echo "json_output";
            break;
        case 'raw':
            output_raw($petition);
            break;
        case 'rawDefined':
            output_rawDefined($petition);
            break;
        default:
            echo "json";
            break;
    }
}

function output_raw($petition) {
    if (isset($_GET["$petition"])) {
        $result = $_GET["$petition"];
        echo $result;
        echo "<br>";
    }
}

function output_rawDefined($petition) {
    if (isset($_GET["$petition"])) {
        $result = $_GET["$petition"];
        echo $petition . ": " . $result;
        echo "<br>";
    }
}
