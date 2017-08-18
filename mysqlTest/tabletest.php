<?php
/**
 * Created by PhpStorm.
 * User: maletil
 * Date: 15/08/17
 * Time: 9:55
 */

if (isset($_GET["auth"])) {

    $json_string = file_get_contents('http://localhost/GsoftAPI-A/mysqlTest/?sql=SELECT%20Contador,%20Codigo,%20Nombre,%20Descripcion,%20Familia,%20%60Ultima%20Modificacion%60%20FROM%20%60articulos%60%20WHERE%20Nombre%20LIKE%20\'%25llave%25\'%20AND%20Nombre%20LIKE%20\'%25escuadra%25\'');
    $json_output = json_decode($json_string);

//var_dump($data);
    echo "<table cellspacing=\"0\">
           <tr class='banner'>
                <td><strong>Contador</strong></td>
                <td><strong>Código</strong></td>
                <td><strong>Nombre</strong></td>
                <td><strong>Descripción</strong></td>
                <td><strong>Familia</strong></td>
                <td><strong>Últ. mod.</strong></td>
            </tr>";

    foreach ($json_output as $object):?>

        <tr class="content">
            <td><strong><?php echo $object->{'Contador'} ?></strong></td>
            <td><strong><?php echo $object->{'Codigo'} ?></strong></td>
            <td><strong><?php echo $object->{'Nombre'} ?></strong></td>
            <td><strong><?php echo $object->{'Descripcion'} ?></strong></td>
            <td><strong><?php echo $object->{'Familia'} ?></strong></td>
            <td><strong><?php echo substr($object->{'Ultima Modificacion'}, 0, 10) ?></strong></td>
        </tr>

    <?php endforeach;
    echo "</table>";
}
?>
<style>
    td{
        padding-right:10px;
        padding-left: 13px;
        padding-top: 4px;
        font-family: Liberation Sans, Arial, monospace;
        font-size: 1rem;
        border-left: solid 1px #406c52;
    }
    .banner td {
        padding-top: 14px;
        padding-bottom: 12px;
        border-left: solid 1px #35694a;
    }
    .banner{
        background-color: #0d9351;
        color: #e9e9e9;
    }
    .content {
        background-color: #c5d8c6b3;
        font-weight: 300;
        line-height: 1.5;
    }
    .content:nth-child(2n){
        background-color: #FFF;
    }
</style>
