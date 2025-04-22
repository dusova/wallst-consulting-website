<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $servername = "127.0.0.1";
    $username = "yetkin_krnwallst";
    $password = "Mstarda1337$";
    $dbname = "yetkin_wallstcons";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    $checkEmail = "SELECT * FROM newsletter WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        header("location: index.php?error=1");
    } else {
        $sql = "INSERT INTO newsletter (email) VALUES ('$email')";

        if ($conn->query($sql) === TRUE) {
            header("location: index.php?success=1");
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>