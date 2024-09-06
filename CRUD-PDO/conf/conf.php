<?php
class Conexion{
    private $host = 'localhost';
    private $db = 'dbCliente';
    private $user = 'root';
    private $pwd = '';

    public $conn;

    public function conectar(){
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=".$this->host."; dbname=".$this->db, $this->user, $this->pwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exec) {
            echo  "Error en la conexion: " . $exec->getMessage();
        }

        return $this->conn;
    }
}


?>