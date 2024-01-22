<?php
// session_start();
// include 'config\Connection.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") { 
//     $username = $_POST['login'];
//     $email = $_POST['email'];
//     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//     try {
//         $stmt = $pdo->prepare("INSERT INTO users (user_name, email, password, role, is_active, date_register, fk_company_id) 
//                                VALUES (:login, :email, :password, 'client', :is_active, :date_register, NULL)");

//         $stmt->bindParam(':login', $username);
//         $stmt->bindParam(':password', $password);
//         $stmt->bindParam(':email', $email);
//         $stmt->bindParam(':is_active', $is_active); // Set the appropriate value for is_active
//         $stmt->bindParam(':date_register', $date_register); // Set the appropriate value for date_register

//         // Set the appropriate values for is_active and date_register
//         $is_active = TRUE; 
//         $date_register = date("Y-m-d H:i:s"); 

//         $stmt->execute();
//         echo "Success";
//         // header("Location: index.php");
//         exit();
//     } catch (PDOException $e) {
//         echo "Error: " . $e->getMessage();
//     }
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-yellow-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4">Register</h2>
        <form method="post"  class="space-y-4">
            <div>
                <label for="login" class="block text-sm font-medium text-gray-600">Login:</label>
                <input type="text" name="login" required class="mt-1 p-2 w-full border rounded">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                <input type="text" name="email" required class="mt-1 p-2 w-full border rounded">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                <input type="password" name="password" required class="mt-1 p-2 w-full border rounded">
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-700">Signup</button>
            </div>
        </form>
    </div>
</body>

</html>
