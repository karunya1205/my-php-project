error_reporting(E_ALL);
ini_set('display_errors', 1);

<?php
include 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username already exists
    $check = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "❌ Username already exists. Try another.";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed')";

        if ($conn->query($sql) === TRUE) {
            echo "✅ Registration successful!";
        } else {
            echo "❌ Error: " . $conn->error;
        }
    }
}
?>

<!-- Registration Form -->
<h2>Register</h2>
<form method="post" action="register.php">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Register</button>
</form>
