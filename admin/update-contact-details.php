<?php
session_start();
require_once "../system/connection.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = trim($_POST["phone"]);
    $phonelink = trim($_POST["phonelink"]);
    $mail = trim($_POST["mail"]);
    $maillink = trim($_POST["maillink"]);
    $location = trim($_POST["location"]);

    $sql = "UPDATE contactdetails SET phone = ?, phonelink = ?, mail = ?, maillink = ?, location = ? WHERE id = 1";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssss", $phone, $phonelink, $mail, $maillink, $location);
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_msg'] = "Contact details updated successfully.";
        } else {
            $_SESSION['error_msg'] = "Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
    header("location: index.php#site-settings");
    exit;
}
?>