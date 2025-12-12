<?php
session_start();
include 'db.php'; // or connection.php
include 'connection.php';
$user_id = $_POST['user_id'];
$password = $_POST['password'];
$role = $_POST['role'];

if ($role == "librarian") {
    $query = "SELECT * FROM librarian WHERE librarian_code='$user_id' AND password='$password'";
} else {
    $query = "SELECT * FROM members WHERE user_id='$user_id' AND password='$password'";
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {

    $_SESSION['user_id'] = $user_id;
    $_SESSION['role'] = $role;

    header("Location: index.php"); // your existing homepage
    exit();

} else {
    echo "Invalid login!";
}
?>
