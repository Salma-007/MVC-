<?php
namespace App\Models;
use App\config\Database;
use PDO;

class BaseModel{
    protected $conn;
    public function __construct(){
        $this->conn = Database::getInstance();
    }

    //methode d'affichage de tous les records
    public function readRecords($table) {
        $query = "SELECT * FROM $table;";
        $stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

