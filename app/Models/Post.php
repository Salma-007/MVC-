<?php
namespace App\Models;
use App\config\Database;
use App\Models\BaseModel;

class Post{
    private $id;
    private $nom;
    private $contenu;
    private $conn;
    private $table = 'posts';

    public function __construct($nom = null, $contenu = null, $id=0){
        $this->conn = Database::getInstance();
        $this->crud  = new BaseModel($this->conn);
        $this->nom = $nom;
        $this->contenu = $contenu;
        $this->id = $id;
    }

    // recuperation de tous les posts
    public function getAllPosts(){
        return $this->crud->readRecords($this->table);
    }

    public function getPostById($id){
        $query="SELECT * from posts where id=$id";
        $result= $this->conn->prepare($query);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}