<?php
// session_start();
// include 'config\Connection.php';
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    // $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    // $newPassword = password_hash(filter_var($_POST['new_password']), PASSWORD_DEFAULT);

    // try {
    //     // Check if the email exists in the database
    //     $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    //     $stmt->bindParam(':email', $email);
    //     $stmt->execute();
    //     $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //     if ($user) {
    //         // Generate a random token for email verification
    //         $token = bin2hex(random_bytes(32));

    //         // Update the user's password reset token in the database
    //         $updateTokenStmt = $pdo->prepare("UPDATE users SET reset_token = :reset_token WHERE user_id = :user_id");
    //         $updateTokenStmt->bindParam(':reset_token', $token);
    //         $updateTokenStmt->bindParam(':user_id', $user['user_id']);
    //         $updateTokenStmt->execute();

    //         // Send email with reset link using PHPMailer
    //         $mail = new PHPMailer(true);

    //         $mail->isSMTP();
    //         $mail->Host = 'smtp.gmail.com';
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'mehdi74.id@gmail.com';
    //         $mail->Password = 'somt ihut xmcb xfev'; 
    //         $mail->SMTPSecure = 'tls';
    //         $mail->Port = 587;

    //         $mail->setFrom('mehdi74.id@gmail.com', 'Password Token');

    //         $mail->addAddress($email);

    //         $mail->isHTML(true);
    //         $mail->Subject = 'Password Reset';
    //         $mail->Body = "Click the following link to reset your password: http://localhost/cle/rp.php?token=$token";
    //         $updatePassStmt = $pdo->prepare("UPDATE users SET password = :new_password WHERE user_id = :user_id");
    //         $updatePassStmt->bindParam(':new_password', $newPassword);
    //         $updatePassStmt->bindParam(':user_id', $user['user_id']);
    //         $updatePassStmt->execute();

    //         $mail->send();

    //         echo "Password reset link sent to your email!";
    //     } else {
    //         // Email not found
    //         echo "Invalid email address";
    //     }
    // } catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    // } catch (Exception $e) {
    //     echo "Mailer Error: " . $mail->ErrorInfo;
    // }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-red-200 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4">Password Reset</h2>
        <form action="?action=reset" method="post" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                <input type="text" name="email" required class="mt-1 p-2 w-full border rounded">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">New Password:</label>
                <input type="password" name="new_password" required class="mt-1 p-2 w-full border rounded">
            </div>
            <button type="submit" class="bg-red-400 text-white py-2 px-4 rounded hover:bg-red-700">Confirm</button>
        </form>
        <a href="?action=log_in">Back to Login</a>
    </div>
</body>

</html>
