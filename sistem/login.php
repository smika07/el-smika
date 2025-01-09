<?php
session_start();
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['id_user'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] == 'teacher') {
                header("Location: ../index.php"); // Redirect to guru.php
            } else {
                header("Location: ../index.php"); // Redirect to siswa.php
            }
            exit();
        } else {
            // Password is incorrect
            header("Location: ../index.php?error=Invalid password");
            exit();
        }
    } else {
        // Email not found
        header("Location: ../index.php?error=Email not found");
        exit();
    }
    
}

$stmt->close();
$conn->close();
?>
