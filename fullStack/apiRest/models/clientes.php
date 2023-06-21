<?php


require_once("../config/Conectar.php");

class Cliente extends Conectar{

    private $Cliente_ID;
    private $Nombre_Cliente;
    private $Telefono_Cliente;


    public function __construct($Cliente_ID = 0, $Nombre_Cliente = "", $Telefono_Cliente = "")
    {
        $this->Cliente_ID = $Cliente_ID;
        $this->Nombre_Cliente = $Nombre_Cliente;
        $this->Telefono_Cliente = $Telefono_Cliente;
    }

    public function setCliente_ID($Cliente_ID)
    {
        $this->Cliente_ID =$Cliente_ID;
    }

    public function getCliente_ID()
    {
        $this->Cliente_ID;
    }

    public function setNombre_Cliente($Nombre_Cliente)
    {
        $this->Nombre_Cliente =$Nombre_Cliente;
    }

    public function getNombreCliente()
    {
        $this->Nombre_Cliente;
    }

    public function setTelefono_Cliente($Telefono_Cliente)
    {
        $this->Telefono_Cliente =$Telefono_Cliente;
    }

    public function getTelefono_Cliente()
    {
        $this->Telefono_Cliente;
    }


    // Funciones

    public function selectAll()
    {
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = $conectar->prepare("SELECT * FROM Cliente");
        $stm -> execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne($Cliente_ID)
    {
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = $conectar->prepare("SELECT * FROM Cliente WHERE Cliente_ID = ?");
        $stm ->bindValue(1,$Cliente_ID);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function InsertCliente($Nombre_Cliente, $Telefono_Cliente)
    {
        $conectar = parent::Conexion();
        parent::set_name();
        $stm = "INSERT INTO Cliente (Nombre_Cliente, Telefono_Cliente) VALUES(?,?)";
        $stm = $conectar->prepare($stm);
        $stm->bindValue(1,$Nombre_Cliente);
        $stm->bindValue(2,$Telefono_Cliente);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    

}

?>