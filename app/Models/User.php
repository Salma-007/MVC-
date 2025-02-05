<?php
namespace App\Models;
use App\config\Database;
use App\Models\BaseModel;
use App\Services\Session;
use PDO;

class User{
    private $id;
    private $nom;
    private $email;
    private $password;
    private $conn;
    private $table = 'users';

    public function __construct($nom = null, $email = null, $password = null, $id=0){
        $this->conn = Database::getInstance();
        $this->crud  = new BaseModel($this->conn);
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
            $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->execute();
        
            if ($stmt->rowCount() > 0) {

                return 'Email already exists';
            } else {
                $data = [
                    'nome' => $this->nom,
                    'email' => $this->email,
                    'password' => password_hash($this->password, PASSWORD_DEFAULT),
                ];
                if ($this->crud->insertRecord($this->table, $data)) {
                    return ['success' => true];
                } else {
                    return ['error' => 'Failed to register user'];
                }
            }
        }
        

    public function loginTo($email, $password) {
        $query = "SELECT id, nome, password FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            Session::set('user_id',$user['id']);
            Session::set('user_name',$user['nome']);
            return true;
        }else{
            return false;
        }
    }
}