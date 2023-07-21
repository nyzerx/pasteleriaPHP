<?php
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: admin-panel.php');
        exit;
    } else {
        header('Location: login.php?error=1');
        exit;
    }

    $result->free_result();
}
$conn->close();
?>
