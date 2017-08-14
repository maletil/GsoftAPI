<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 14/08/17
 * Time: 19:37
 */

function mysqlDBConnect () {
 //   $hashfinal = "$hash1 + $hash2";
    // if ($hashfinal = md5('sahe')) {
    $username = "root";
    $password = "";
    $servername = "127.0.0.1";
    $dbname = "gsoft";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
       // echo "Connected." . "<br>";
    }
    return $conn;
    // }
}

function mysqlDBDisconnect ($conn) {
    $close = mysqli_close($conn);

    if($close){
        // echo 'Disconnected.';
    }else {
        echo 'Error while disconnecting.';
    }
}

