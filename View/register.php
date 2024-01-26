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
        <form method="post" action="?action=register" class="space-y-4">
            <div>
                <label for="login" class="block text-sm font-medium text-gray-600">Username:</label>
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
