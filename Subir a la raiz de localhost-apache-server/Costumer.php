<?php
header('Access-Control-Allow-Origin: *');

//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

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
    $xNombre            = strtoupper($_POST["jNombre"]);
    $xMunicipio         = utf8_decode($_POST["jMunicipio"]);
    $xDepartamento      = utf8_decode($_POST["jDepartamento"]);
    $xEmail             = strtolower($_POST["jEmail"]);
    $xError1 = '';
    $xError2 = '';
    //$SqlInsert = "INSERT INTO contacts (name,email,state,city) values ($xNombre, $xEmail, $xDepartamento, $xMunicipio)  ";
   // mysqli_query($xConn, $SqlInsert);
   
   $query="INSERT INTO contacts (name,email,state,city) values ('$xNombre', '$xEmail', '$xDepartamento', '$xMunicipio')";
  
 $result = mysqli_query($xConn, $query) or trigger_error("Query: $query\n<br />MySQL Error: " . mysqli_error($xConn));
    
    $xError2 = mysqli_error($xConn);
    $xSnAdd = 'Registro Insertado Correctamente ';
    header('Content-type:application/json');
    $DatosGuardados = array('xGuardado' => $xSnAdd, 'Error1' => $xError1, 'Error2' => $xError2);
   echo json_encode($DatosGuardados);
    mysqli_close($xConn);
}

?>