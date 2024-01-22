<?php
require_once "config\Connection.php";
require_once 'Model\User\classUser.php';

class UserDAO {
    private $db;


    public function __construct(){
        $this->db = DatabaseConnection::getInstance()->getConnection(); 
    }

    public function login($email, $password){

        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Successful login
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['user_name'];
                echo "Login success!";
                header("Location: index.php");
                exit();
            } else {
                // Invalid login credentials
                echo "Invalid email or password";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function singup($username, $email, $password){
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        try {
            $stmt = $this->db->prepare("INSERT INTO users (user_name, email, password, role, is_active, date_register, fk_company_id) 
                                VALUES (:login, :email, :password, 'client', :is_active, :date_register, NULL)");

            $is_active = TRUE; 
            $date_register = date("Y-m-d H:i:s"); 

            $stmt->bindParam(':login', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':is_active', $is_active);
            $stmt->bindParam(':date_register', $date_register);


            $stmt->execute();
            echo "Success";
            // header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function insertUser(User $user) {

        $stmt = $this->db->prepare("INSERT INTO users (user_name, email, password, role, is_active, date_register, fk_company_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssisi", $user->getUserName(), $user->getEmail(), $user->getPassword(), $user->getRole(), $user->getIsActive(), $user->getDateRegister(), $user->getFkCompanyId());
        $stmt->execute();
        $stmt->close();
    }

    // Retrieve user information from the database based on user_id
    public function getUserById($user_id) {
        // Implement your database retrieval logic here
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object("User");
        $stmt->close();
        return $user;
    }
}
?>
