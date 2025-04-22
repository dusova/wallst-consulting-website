<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'yetkin_krnwallst');
define('DB_PASSWORD', 'Mstarda1337$');
define('DB_NAME', 'yetkin_wallstcons');


try {
    $link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if ($link->connect_error) {
        throw new Exception("Bağlantı hatası: " . $link->connect_error);
    }
    
    $link->set_charset("utf8");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $icons = $_POST['icons'];
        $titles = $_POST['titles'];
        $descriptions = $_POST['descriptions'];
        $serviceLinks = $_POST['links']; 
        
        $sql = "INSERT INTO services (icon, title, description, link) VALUES (?, ?, ?, ?)";
        $stmt = $link->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ssss", $icon, $title, $description, $serviceLink);
            
            $link->begin_transaction();
            
            try {
                for ($i = 0; $i < count($icons); $i++) {
                    $icon = $icons[$i];
                    $title = $titles[$i];
                    $description = $descriptions[$i];
                    $serviceLink = $serviceLinks[$i];
                    
                    if (!$stmt->execute()) {
                        throw new Exception("Veri eklenirken hata: " . $stmt->error);
                    }
                }
                
                $link->commit();
                $_SESSION['success_msg'] = "Servisler başarıyla güncellendi.";
                
            } catch (Exception $e) {
                $link->rollback();
                $_SESSION['error_msg'] = "Hata: " . $e->getMessage();
            }
            
            $stmt->close();
        } else {
            throw new Exception("Sorgu hazırlanamadı: " . $link->error);
        }
    }
    
} catch (Exception $e) {
    $_SESSION['error_msg'] = "Kritik Hata: " . $e->getMessage();
} finally {

    if (isset($link) && $link instanceof mysqli) {
        $link->close();
    }
    
    header("location: index.php?sucsess=1");
    exit;
}
?>