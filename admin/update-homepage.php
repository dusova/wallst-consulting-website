<?php
require_once "../system/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $happy_clients = trim($_POST["happy_clients"]);
    $success_rate = trim($_POST["success_rate"]);
    $years_experience = trim($_POST["years_experience"]);
    $expert_team = trim($_POST["expert_team"]);

    $sql = "UPDATE homepage_stats SET happy_clients = ?, success_rate = ?, years_experience = ?, expert_team = ? WHERE id = 1";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "isii", $happy_clients, $success_rate, $years_experience, $expert_team);
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