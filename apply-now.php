<?php
require_once "./system/connection.php";
session_start();

// Form gönderildiğinde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CSRF kontrolü
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token doğrulaması başarısız.');
    }

    // Form verilerini temizle ve doğrula
    $service_type = filter_input(INPUT_POST, 'service_type', FILTER_SANITIZE_STRING);
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
    $passport = filter_input(INPUT_POST, 'passport', FILTER_SANITIZE_STRING);
    $additional_info = filter_input(INPUT_POST, 'additional_info', FILTER_SANITIZE_STRING);

    // Validation
    $errors = [];
    if (!$service_type) $errors[] = "Lütfen bir hizmet seçin.";
    if (!$first_name) $errors[] = "Ad alanı gereklidir.";
    if (!$last_name) $errors[] = "Soyad alanı gereklidir.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Geçerli bir email adresi girin.";
    if (!preg_match("/^[0-9]{10}$/", $phone)) $errors[] = "Geçerli bir telefon numarası girin.";

    if (empty($errors)) {
        // Prepared statement ile güvenli veri girişi
        $stmt = $link->prepare("INSERT INTO applications (service_type, first_name, last_name, email, phone, address, dob, passport, additional_info, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'new', NOW())");
        
        $stmt->bind_param("sssssssss", $service_type, $first_name, $last_name, $email, $phone, $address, $dob, $passport, $additional_info);
        
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Başvurunuz başarıyla alınmıştır.";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $errors[] = "Bir hata oluştu: " . $stmt->error;
        }
        
        $stmt->close();
    }
}

// CSRF token oluştur
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// SEO ayarları
$page_name = basename(__FILE__);
$sql = "SELECT title, meta_description, author, keywords, url_image, meta_title FROM page_settings WHERE page_name = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("s", $page_name);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$seotitle = $row['title'] . " | Wall Street Consulting";
$seometadesc = $row['meta_description'];
$seoauthor = $row['author'];
$seokeywords = $row['keywords'];
$seourlimage = $row['url_image'];
$seometatitle = $row['meta_title'];

$stmt->close();


// Form gönderildiğinde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... Önceki form işlemleri ...

    // Dosya yükleme işlemleri
    $uploadedFiles = [];
    $uploadErrors = [];
    $allowedTypes = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png'];
    $maxFileSize = 5 * 1024 * 1024; // 5MB
    $uploadDir = 'uploads/applications/';

    // Uploads klasörü yoksa oluştur
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Dosyaları işle
    if (!empty($_FILES['documents']['name'][0])) {
        foreach ($_FILES['documents']['name'] as $key => $filename) {
            if ($_FILES['documents']['error'][$key] === UPLOAD_ERR_OK) {
                $tmpName = $_FILES['documents']['tmp_name'][$key];
                $fileSize = $_FILES['documents']['size'][$key];
                $fileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                
                // Dosya türü kontrolü
                if (!in_array($fileType, $allowedTypes)) {
                    $uploadErrors[] = "$filename: İzin verilmeyen dosya türü.";
                    continue;
                }

                // Dosya boyutu kontrolü
                if ($fileSize > $maxFileSize) {
                    $uploadErrors[] = "$filename: Dosya boyutu çok büyük (Max: 5MB).";
                    continue;
                }

                // Güvenli dosya adı oluştur
                $newFileName = uniqid() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "", $filename);
                $uploadPath = $uploadDir . $newFileName;

                // Dosyayı yükle
                if (move_uploaded_file($tmpName, $uploadPath)) {
                    $uploadedFiles[] = $uploadPath;
                } else {
                    $uploadErrors[] = "$filename: Dosya yükleme hatası.";
                }
            } else {
                $uploadErrors[] = "$filename: " . getUploadErrorMessage($_FILES['documents']['error'][$key]);
            }
        }
    }

    if (empty($errors)) {
        // Başvuru verilerini kaydet
        $stmt = $link->prepare("INSERT INTO applications (service_type, first_name, last_name, email, phone, address, dob, passport, additional_info, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'new', NOW())");
        
        $stmt->bind_param("sssssssss", $service_type, $first_name, $last_name, $email, $phone, $address, $dob, $passport, $additional_info);
        
        if ($stmt->execute()) {
            $application_id = $stmt->insert_id;
            
            // Yüklenen dosyaları veritabanına kaydet
            if (!empty($uploadedFiles)) {
                $stmt = $link->prepare("INSERT INTO application_documents (application_id, file_path, uploaded_at) VALUES (?, ?, NOW())");
                foreach ($uploadedFiles as $filePath) {
                    $stmt->bind_param("is", $application_id, $filePath);
                    $stmt->execute();
                }
            }

            $_SESSION['success_message'] = "Başvurunuz başarıyla alınmıştır.";
            if (!empty($uploadErrors)) {
                $_SESSION['success_message'] .= " Ancak bazı dosyalar yüklenemedi: " . implode(", ", $uploadErrors);
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $errors[] = "Bir hata oluştu: " . $stmt->error;
        }
        
        $stmt->close();
    }
}

// Yükleme hata mesajlarını al
function getUploadErrorMessage($errorCode) {
    switch ($errorCode) {
        case UPLOAD_ERR_INI_SIZE:
            return "Dosya boyutu PHP yapılandırma limitini aşıyor.";
        case UPLOAD_ERR_FORM_SIZE:
            return "Dosya boyutu form limitini aşıyor.";
        case UPLOAD_ERR_PARTIAL:
            return "Dosya kısmen yüklendi.";
        case UPLOAD_ERR_NO_FILE:
            return "Dosya yüklenmedi.";
        case UPLOAD_ERR_NO_TMP_DIR:
            return "Geçici klasör bulunamadı.";
        case UPLOAD_ERR_CANT_WRITE:
            return "Dosya diske yazılamadı.";
        case UPLOAD_ERR_EXTENSION:
            return "Bir PHP uzantısı dosya yüklemesini durdurdu.";
        default:
            return "Bilinmeyen yükleme hatası.";
    }
}

// Veritabanı tablosu oluştur
$sql = "CREATE TABLE IF NOT EXISTS application_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    application_id INT NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (application_id) REFERENCES applications(id)
)";

$link->query($sql);

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($seotitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($seometadesc); ?>">
    <meta name="title" content="<?php echo htmlspecialchars($seometatitle); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($seokeywords); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($seoauthor); ?>">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./src/style.css">
    <style>
        :root {
            --primary: #0042da;
            --secondary: #1e3a8a;
            --accent: #3b82f6;
            --dark: #0f172a;
            --light: #f8fafc;
        }

        .form-section {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-top: 1rem;
        }

        .step-progress {
            display: flex;
            justify-content: space-between;
            margin-bottom: 3rem;
            position: relative;
        }

        .step-progress::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: #e2e8f0;
            transform: translateY(-50%);
            z-index: 1;
        }

        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 2px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .step.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .step.completed {
            background: var(--accent);
            border-color: var(--accent);
            color: white;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .service-card {
            border: 2px solid #e2e8f0;
            border-radius: 15px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .service-card:hover {
            border-color: var(--primary);
            transform: translateY(-3px);
        }

        .service-card.selected {
            border-color: var(--primary);
            background: rgba(0, 66, 218, 0.05);
        }

        .form-control {
            border: 2px solid #e2e8f0;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 66, 218, 0.1);
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="bg-light">
    <?php include "./includes/header.php"; ?>

    <header class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-white-50">
                    <li class="breadcrumb-item"><a href="https://usadanismani.com/index.php" class="text-white text-decoration-none">Ana Sayfa</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Hemen Başvur</li>
                </ol>
            </nav>
            <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up">Hemen Başvurun</h1>
            <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                Yurtdışıyla ilgili bütün hizmetlerimiz için hemen başvurun ve
                uzmanlarımızdan destek alın.
            </p>
        </div>
    </header>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php 
                        echo $_SESSION['success_message'];
                        unset($_SESSION['success_message']);
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger" role="alert">
                        <ul class="mb-0">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="form-section p-4 p-md-5">
                    <h2 class="text-center mb-4">Başvuru Formu</h2>
                    
                    <div class="step-progress mb-5">
                        <div class="step active" data-step="1">1</div>
                        <div class="step" data-step="2">2</div>
                        <div class="step" data-step="3">3</div>
                    </div>

                    <form id="applicationForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        
                        <div class="form-step active" id="step1">
                            <h4 class="mb-4">Hizmet Seçimi</h4>
                            <div class="row g-4">
                                <?php
                                $services = [
                                    "abd_vize" => ["ABD Vizesi", "Turist, öğrenci ve iş vizeleri için başvuru"],
                                    "yurtdisi_egitim" => ["Yurtdışı Eğitim", "Yurtdışında eğitim fırsatları için başvuru"],
                                    "schengen_vize" => ["Schengen Vizesi", "Schengen bölgesi için vize başvurusu"],
                                    "abd_oturum" => ["ABD'de Oturum", "ABD'de oturum izni başvurusu"],
                                    "abd_dogum" => ["ABD'de Doğum", "ABD'de doğum yapacaklar"],
                                    "abd_yatirim" => ["ABD'de Yatırım", "ABD'de yatırım fırsatları"]

                                ];

                                foreach ($services as $value => $service): ?>
                                    <div class="col-md-4">
                                        <div class="service-card" onclick="selectService(this, '<?php echo $value; ?>')">
                                            <input type="radio" name="service_type" value="<?php echo $value; ?>" class="d-none" required>
                                            <h5><?php echo $service[0]; ?></h5>
                                            <p class="text-muted mb-0"><?php echo $service[1]; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="mt-4 text-end">
                                <button type="button" class="btn btn-primary" onclick="nextStep(1)">
                                    İleri <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-step" id="step2">
                            <h4 class="mb-4">Kişisel Bilgiler</h4>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Ad</label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Soyad</label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">E-posta</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Telefon</label>
                                    <input type="tel" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="prevStep(2)">
                                    <i class="bi bi-arrow-left me-2"></i> Geri
                                </button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(2)">
                                    İleri <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-step" id="step3">
                            <h4 class="mb-4">Ek Bilgiler</h4>
                            <div class="row g-4">
                                <div class="col-12">
                                    <label class="form-label">Mesajınız</label>
                                    <textarea class="form-control" name="additional_info" rows="4"></textarea>
                                </div>
                                <div class="col-12">
    <label class="form-label">Belgeler (PDF, DOC, DOCX, JPG, PNG - Max: 5MB)</label>
    <input type="file" class="form-control" name="documents[]" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
    <div class="form-text">Birden fazla dosya seçebilirsiniz.</div>
</div>
                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="prevStep(3)">
                                    <i class="bi bi-arrow-left me-2"></i> Geri
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Gönder <i class="bi bi-check2 ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "./includes/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function nextStep(currentStep) {
            if (!validateStep(currentStep)) {
                return;
            }

            document.querySelector(`#step${currentStep}`).classList.remove('active');
            document.querySelector(`#step${currentStep + 1}`).classList.add('active');
            
            document.querySelector(`.step[data-step="${currentStep + 1}"]`).classList.add('active');
            document.querySelector(`.step[data-step="${currentStep}"]`).classList.add('completed');

            window.scrollTo({
                top: document.querySelector('.form-section').offsetTop - 100,
                behavior: 'smooth'
            });
        }

        function prevStep(currentStep) {
            document.querySelector(`#step${currentStep}`).classList.remove('active');
            document.querySelector(`#step${currentStep - 1}`).classList.add('active');
            
            document.querySelector(`.step[data-step="${currentStep}"]`).classList.remove('active');
            document.querySelector(`.step[data-step="${currentStep - 1}"]`).classList.remove('completed');
            document.querySelector(`.step[data-step="${currentStep - 1}"]`).classList.add('active');

            window.scrollTo({
                top: document.querySelector('.form-section').offsetTop - 100,
                behavior: 'smooth'
            });
        }

        function selectService(element, value) {
            document.querySelectorAll('.service-card').forEach(card => {
                card.classList.remove('selected');
            });
            
            element.classList.add('selected');
            
            element.querySelector('input[type="radio"]').checked = true;
        }

        function validateStep(step) {
            let isValid = true;
            const form = document.getElementById('applicationForm');

            switch(step) {
                case 1:
                    const serviceSelected = form.querySelector('input[name="service_type"]:checked');
                    if (!serviceSelected) {
                        alert('Lütfen bir hizmet seçiniz.');
                        isValid = false;
                    }
                    break;

                case 2:
                    const firstName = form.querySelector('input[name="first_name"]').value;
                    const lastName = form.querySelector('input[name="last_name"]').value;
                    const email = form.querySelector('input[name="email"]').value;
                    const phone = form.querySelector('input[name="phone"]').value;

                    if (!firstName || !lastName || !email || !phone) {
                        alert('Lütfen tüm zorunlu alanları doldurunuz.');
                        isValid = false;
                    } else if (!validateEmail(email)) {
                        alert('Lütfen geçerli bir e-posta adresi giriniz.');
                        isValid = false;
                    } else if (!validatePhone(phone)) {
                        alert('Lütfen geçerli bir telefon numarası giriniz.');
                        isValid = false;
                    }
                    break;
            }

            return isValid;
        }

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function validatePhone(phone) {
            const re = /^[0-9]{10}$/;
            return re.test(phone.replace(/\D/g, ''));
        }

        document.getElementById('applicationForm').addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('input[required], select[required], textarea[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Lütfen tüm zorunlu alanları doldurunuz.');
            }
        });

        const successAlert = document.querySelector('.alert-success');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.transition = 'opacity 0.5s ease';
                successAlert.style.opacity = '0';
                setTimeout(() => {
                    successAlert.remove();
                }, 500);
            }, 5000);
        }
    </script>

<script>
document.getElementById('applicationForm').addEventListener('submit', function(e) {
    const fileInput = this.querySelector('input[type="file"]');
    const files = fileInput.files;
    const maxSize = 5 * 1024 * 1024; 
    const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png'];

    for (let i = 0; i < files.length; i++) {
        if (files[i].size > maxSize) {
            e.preventDefault();
            alert(`${files[i].name}: Dosya boyutu 5MB'dan büyük olamaz.`);
            return;
        }

        const fileType = files[i].type;
        if (!allowedTypes.includes(fileType)) {
            e.preventDefault();
            alert(`${files[i].name}: Desteklenmeyen dosya türü.`);
            return;
        }
    }
});
</script>
</body>
</html>