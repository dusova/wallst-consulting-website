<?php
session_start();
require_once "../system/connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM blog_posts WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = $id;

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['delsuccess_msg'] = "Blog gönderisi başarıyla silindi.";
            header("location: index.php#blog");
            exit();
        } else {
            echo "Bir şeyler yanlış gitti. Lütfen daha sonra tekrar deneyin.";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
} else {
    header("location: index.php#blog");
    exit();
}
?>