<?php
require_once '../system/connection.php';

header('Content-Type: application/json');

try {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        throw new Exception('Geçersiz başvuru ID');
    }

    $id = intval($_GET['id']);

    $sql = "SELECT 
                a.*,
                (SELECT GROUP_CONCAT(DISTINCT file_path) 
                 FROM application_documents 
                 WHERE application_id = a.id) as documents,
                a.application_status_history as notes
            FROM applications a 
            WHERE a.id = ?";

    $stmt = mysqli_prepare($link, $sql);
    
    if (!$stmt) {
        throw new Exception('Sorgu hazırlanamadı: ' . mysqli_error($link));
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception('Sorgu çalıştırılamadı: ' . mysqli_stmt_error($stmt));
    }
    
    $result = mysqli_stmt_get_result($stmt);
    $application = mysqli_fetch_assoc($result);

    if (!$application) {
        throw new Exception('Başvuru bulunamadı');
    }

    if ($application['notes']) {
        $application['notes'] = json_decode($application['notes'], true);
    }

    echo json_encode([
        'success' => true,
        'data' => $application
    ], JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}