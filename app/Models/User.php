<?php
namespace App\Models;
use App\config\Database;
use App\Models\BaseModel;

class User{
    private $id;
    private $nom;
    private $email;
    private $password;
    private $conn;
    private $table = 'users';

    public function __construct($nom = null, $email = null, $password = null, $id=0){
        $this->conn = Database::getInstance();
        $this->crud  = new BaseModel($conn);
        $this->nom = $nom;
        $this->email = $email; 
        $this->password = $password;
        $this->id = $id;
    }
    // setter id
    public function setId($id){
        $this->id = $id;
    }
    // setter nom
    public function setNom($nom){
        $this->nom = $nom;
    }
    // setter email
    public function setEmail($email){
        $this->email = $email;
    }
    // setter password
    public function setPassword($password){
        $this->password = $password;
    }
        // sign up
    public function registerUser() {
        // // Vérify si l'email existe deja
        // $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        // $stmt = $this->connection->prepare($query);
        // $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        // $stmt->execute();
        // if ($stmt->rowCount() > 0) {
        //     $_SESSION['error_signup'] = "Email already exists!";
        //     header('Location: /signUp');
        //     exit();
        // } else {
            $data = [
                'nome' => $this->nom,
                'email' => $this->email,
                'password' => password_hash($this->password, PASSWORD_DEFAULT),
            ];
            if ($this->crud->insertRecord($this->table, $data)) {
                $_SESSION['error_signup'] = "Account created successfully!";

            } else {
                $_SESSION['error_signup'] = "Failed to create account.";

            }
        // }
    }
}