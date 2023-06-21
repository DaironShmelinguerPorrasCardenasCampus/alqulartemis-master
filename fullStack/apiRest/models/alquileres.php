<?php


require_once("../config/Conectar.php");

class Alquiler extends Conectar{

    private $Alquiler_ID;
    private $Cliente_ID;
    private $Empleado_ID;
    private $Fecha_Salida;
    private $Hora_Salida;
    private $SubtotalPeso;
    private $PlacaTransporte;
    private $Observaciones;


    public function __construct($Alquiler_ID = 0,$Cliente_ID = "",$Empleado_ID= "", $Fecha_Salida = "", $Hora_Salida = "", $SubtotalPeso = "", $PlacaTransporte = "", $Observaciones = "")
    {
        $this->Alquiler_ID = $Alquiler_ID;
        $this->Cliente_ID = $Cliente_ID;
        $this->Empleado_ID = $Empleado_ID;
        $this->$Fecha_Salida = $Fecha_Salida;
        $this->Hora_Salida = $Hora_Salida;
        $this->SubtotalPeso = $SubtotalPeso;
        $this->PlacaTransporte = $PlacaTransporte;
        $this-> Observaciones = $Observaciones;
    }
    public function setAlquiler_ID($Alquiler_ID)
    {
        $this->Alquiler_ID =$Alquiler_ID;
    }

    public function getAlquiler_ID()
    {
        $this->Alquiler_ID;
    }

    public function setCliente_ID($Cliente_ID)
    {
        $this->Cliente_ID =$Cliente_ID;
    }

    public function getCliente_ID()
    {
        $this->Cliente_ID;
    }
    public function setEmpleado_ID($Empleado_ID)
    {
        $this->Empleado_ID =$Empleado_ID;
    }

    public function getEmpleado_ID()
    {
        $this->Empleado_ID;
    }

    public function seTFecha_Salida($Fecha_Salida)
    {
        $this->Fecha_Salida = $Fecha_Salida;
    }

    public function getNombreEmpleado()
    {
        $this->Fecha_Salida;
    }

    public function setHora_Salida($Hora_Salida)
    {
        $this->Hora_Salida =$Hora_Salida;
    }
    public function getHora_Salida()
    {
        $this->Hora_Salida;
    }

    public function setSubtotalPeso($SubtotalPeso)
    {
        $this->SubtotalPeso =$SubtotalPeso;
    }
    public function getSubtotalPeso()
    {
        $this->SubtotalPeso;
    }

    public function setPlacaTransporte($PlacaTransporte)
    {
        $this->Hora_Salida =$Hora_Salida;
    }
    public function getHora_Salida()
    {
        $this->Hora_Salida;
    }


    // Funciones

    public function selectAll()
    {
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = $conectar->prepare("SELECT * FROM Empleado");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne($Alquiler_ID)
    {
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = $conectar->prepare("SELECT * FROM Empleado WHERE Alquiler_ID = ?");
        $stm ->bindValue(1,$Alquiler_ID);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function InsertEmpleado($Fecha_Salida, $Hora_Salida)
    {
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = "INSERT INTO Empleado $Fecha_Salida, Hora_Salida) VALUES(?,?)";
        $stm = $conectar->prepare($stm);
        $stm->bindValue(1,$Fecha_Salida);
        $stm->bindValue(2,$Hora_Salida);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    

}

?>