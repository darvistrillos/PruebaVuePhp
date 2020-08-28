<?php
header('Access-Control-Allow-Origin: *');

header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

//header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');


function ConexionMysql()
{
    include('conexion.php');
    return $xConexion;
}
Guardar();
/////////////////////////////////////////////
// Método para guardar datos de los contactos //
/////////////////////////////////////////////
function Guardar()
{
    $xConn = ConexionMysql();
    $xNombre            = utf8_decode(strtoupper($_POST["jNombre"]));
    $xCelular           = utf8_decode($_POST["jCelular"]);
    $xEmail             = utf8_decode(strtolower($_POST["jEmail"]));
    $xError1 = '';
    $xError2 = '';
    $query   = "INSERT INTO contacts (Nombre,Celular,Email) values ('$xNombre','$xCelular', '$xEmail')";
    $result  = mysqli_query($xConn, $query) or trigger_error("Query: $query\n<br />MySQL Error: " . mysqli_error($xConn));
    $xError2 = mysqli_error($xConn);
    $xSnAdd  = 'Registro Insertado Correctamente ';
    header('Content-type:application/json');
    $DatosGuardados = array('xGuardado' => $xSnAdd, 'Error1' => $xError1, 'Error2' => $xError2);
    echo json_encode($DatosGuardados);
    mysqli_close($xConn);
}
