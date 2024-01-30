<?php
require_once "config\Connection.php";
require_once 'Model\User\classUser.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

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
                $_SESSION['role'] = $user['role'];
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
            header("Location: index.php?action=home");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function resetPassword($email, $newPassword) {

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $newPassword = password_hash(filter_var($_POST['new_password']), PASSWORD_DEFAULT);

        try {
            // Check if the email exists in the database
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Generate a random token for email verification
                $token = bin2hex(random_bytes(32));

                // Update the user's password reset token in the database
                $updateTokenStmt = $this->db->prepare("UPDATE users SET reset_token = :reset_token WHERE user_id = :user_id");
                $updateTokenStmt->bindParam(':reset_token', $token);
                $updateTokenStmt->bindParam(':user_id', $user['user_id']);
                $updateTokenStmt->execute();

                // Send email with reset link using PHPMailer
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'mehdi74.id@gmail.com';
                $mail->Password = 'somt ihut xmcb xfev'; 
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('mehdi74.id@gmail.com', 'Password Token');

                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Password Reset';
                $mail->Body = "Click the following link to reset your password: http://localhost/cle/rp.php?token=$token";
                $updatePassStmt = $this->db->prepare("UPDATE users SET password = :new_password WHERE user_id = :user_id");
                $updatePassStmt->bindParam(':new_password', $newPassword);
                $updatePassStmt->bindParam(':user_id', $user['user_id']);
                $updatePassStmt->execute();

                $mail->send();

                echo "Password reset link sent to your email!";
            } else {
                // Email not found
                echo "Invalid email address";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }
        

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
