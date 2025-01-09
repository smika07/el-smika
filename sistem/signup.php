<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role']; // Capture the role from the form

    // Update the SQL statement to include the role
    $stmt = $conn->prepare("INSERT INTO users (id, username, email, password, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $id, $name, $email, $password, $role);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location:../form.php");
    } else {
        header("Location:../form.php");
    }

    $stmt->close();
}

$conn->close();
?>
