<?php
require_once "./system/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $service = trim($_POST["service"]);
    $message = trim($_POST["message"]);

    $sql = "INSERT INTO messages (first_name, last_name, email, phone, service, message) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $email, $phone, $service, $message);
        if (mysqli_stmt_execute($stmt)) {
            header("location: index.php?success=1");
            exit;
        } else {
            echo "Bir şeyler yanlış gitti. Lütfen daha sonra tekrar deneyin.";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>