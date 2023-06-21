<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


require_once("../config/Conectar.php");
require_once("../models/empleados.php");

$empleados = new Empleado();

header ('Contet-Type: application/json');
$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]){
    case 'GetAll':
        $datos = $empleados->selectAll();
        echo json_encode($datos);
        break;

    case 'GetId':
        $datos = $empleados->selectOne($body["Empleado_ID"]);
        echo json_encode($datos);
        break;
       
    case 'Insert':
        $datos = $empleados->InsertEmpleado($body["Nombre_Empelado"], $body["Telefono_Empleado"]);
        header('Location: http://localhost/SkylAb-138/alqulartemis/fullStack/alquilerArtemis/empleado');
        echo json_encode("Empleado insertado correctamente..");
        break;
         
    case 'Delete':
        $datos = $empleados->DeleteEmpleado($body["Empleado_ID"]);
        header('Location: http://localhost/SkylAb-138/alqulartemis/fullStack/alquilerArtemis/empleado');
        break;


}

?>