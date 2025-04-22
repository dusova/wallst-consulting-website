<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

require_once "../system/connection.php";

$username = $_SESSION['username'];
$email = $phone = $isim = "";
$email_err = $phone_err = $isim_err = $success_msg = "";

$sql = "SELECT email, phone, isim FROM admins WHERE username = ?";
if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $email, $phone, $isim);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }
}


$sql = "SELECT COUNT(*) as total_services FROM services";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$total_services = $row['total_services'];
mysqli_free_result($result);

$sql = "SELECT title FROM services ORDER BY id DESC LIMIT 1";
$result = mysqli_query($link, $sql);
$last_service = mysqli_fetch_assoc($result);
mysqli_free_result($result);

$sql = "SELECT first_name, last_name, message FROM messages ORDER BY id DESC LIMIT 1";
$result = mysqli_query($link, $sql);
$last_message = mysqli_fetch_assoc($result);
mysqli_free_result($result);

$sql = "SELECT username, last_login FROM admins ORDER BY last_login DESC LIMIT 1";
$result = mysqli_query($link, $sql);
$last_admin_login = mysqli_fetch_assoc($result);
mysqli_free_result($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["email"]))) {
        $email_err = "Lütfen bir e-posta adresi girin.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Lütfen bir telefon numarası girin.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    if (empty(trim($_POST["isim"]))) {
        $isim_err = "Lütfen bir isim girin.";
    } else {
        $isim = trim($_POST["isim"]);
    }

    if (empty($email_err) && empty($phone_err) && empty($isim_err)) {
        $sql = "UPDATE admins SET email = ?, phone = ?, isim = ? WHERE username = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_phone, $param_isim, $param_username);
            $param_email = $email;
            $param_phone = $phone;
            $param_isim = $isim;
            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {
                $success_msg = "Profil başarıyla güncellendi.";
            } else {
                echo "Bir şeyler yanlış gitti. Lütfen daha sonra tekrar deneyin.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}

$services = [];
$sql = "SELECT id, icon, title, description, link FROM services";
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }
    mysqli_free_result($result);
}

$messages = [];
$sql = "SELECT first_name, last_name, email, phone, service, message FROM messages";
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }
    mysqli_free_result($result);
}


$services = [];
$sql = "SELECT id, icon, title, description, link FROM services";
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }
    mysqli_free_result($result);
}

$sql = "SELECT phone, phonelink, mail, maillink, location FROM contactdetails WHERE id = 1";
$result = mysqli_query($link, $sql);
$contact_details = mysqli_fetch_assoc($result);
mysqli_free_result($result);


$sql = "SELECT * FROM page_settings";
$result = mysqli_query($link, $sql);
$page_settings = [];
while ($row = mysqli_fetch_assoc($result)) {
    $page_settings[] = $row;
}
mysqli_free_result($result);

$blog_posts = [];
$sql = "SELECT id, title, category, created_at FROM blog_posts ORDER BY created_at DESC";
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $blog_posts[] = $row;
    }
    mysqli_free_result($result);
}

$sql = "SELECT COUNT(*) as total_messages FROM messages";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$total_messages = $row['total_messages'];
mysqli_free_result($result);


$sql = "SELECT a.*, 
        (SELECT GROUP_CONCAT(file_path) FROM application_documents WHERE application_id = a.id) as documents 
        FROM applications a 
        ORDER BY created_at DESC";
$result = mysqli_query($link, $sql);
$applications = mysqli_fetch_all($result, MYSQLI_ASSOC);

$serviceTypes = [
    'abd_vize' => 'ABD Vizesi',
    'yurtdisi_egitim' => 'Yurtdışı Eğitim',
    'schengen_vize' => 'Schengen Vizesi',
    'abd_dogum' => 'ABD\'de Doğum',
    'abd_oturum' => 'ABD\'de Oturum',
    'ab_oturum' => 'AB\'de Oturum',
    'abd_yatirim' => 'ABD\'de Yatırım'
];

$statusColors = [
    'new' => 'primary',
    'processing' => 'warning',
    'completed' => 'success',
    'rejected' => 'danger'
];


mysqli_close($link);
?>



<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Wall Street Consulting</title>
    <meta name="description" content="Admin panel for managing Wall Street Consulting website">
    <meta name="keywords" content="admin, panel, management, dashboard">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="./src/style.css" rel="stylesheet">
</head>
<body>

<?php include "./includes/header.php"; ?>

<div class="content-section">
    <div class="container">
    <?php if (!empty($delsuccess_msg)): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $delsuccess_msg; ?>
                </div>
            <?php endif; ?>
        <ul class="nav nav-tabs" id="adminTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="true">İstatistikler</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Gelen Mesajlar</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="blog-tab" data-bs-toggle="tab" data-bs-target="#blog" type="button" role="tab" aria-controls="blog" aria-selected="false">Blog Yönetimi</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="homepage-tab" data-bs-toggle="tab" data-bs-target="#homepage" type="button" role="tab" aria-controls="homepage" aria-selected="false">Anasayfa Düzenle</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profil Ayarları</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="site-settings-tab" data-bs-toggle="tab" data-bs-target="#site-settings" type="button" role="tab" aria-controls="site-settings" aria-selected="false">Site Ayarları</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="applications-tab" data-bs-toggle="tab" data-bs-target="#applications" type="button" role="tab" aria-controls="applications" aria-selected="false">Başvurular</button>
            </li>
        </ul>
        <div class="tab-content" id="adminTabContent">
        <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="content-card" data-aos="fade-up">
        <h2 class="mb-4">Dashboard</h2>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">New York</h5>
                        <p id="new-york-time" class="card-text display-6"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">London</h5>
                        <p id="london-time" class="card-text display-6"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Tokyo</h5>
                        <p id="tokyo-time" class="card-text display-6"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Toplam Mesaj Sayısı</h5>
                        <p class="card-text display-4"><?php echo $total_messages; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Toplam Hizmet Sayısı</h5>
                        <p class="card-text display-4"><?php echo $total_services; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Son Eklenen Hizmet</h5>
                        <p class="card-text display-6"><?php echo htmlspecialchars($last_service['title']); ?></p>
                    </div>
                </div>
            </div>
        </div>
            <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Son Admin Girişi</h5>
                                    <p class="card-text display-6">Admin: <?php echo htmlspecialchars($last_admin_login['username']); ?> / Giriş Tarihi: <?php echo htmlspecialchars($last_admin_login['last_login']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Son Gelen Mesaj</h5>
                                    <p class="card-text display-6"><?php echo htmlspecialchars($last_message['first_name']); ?> <?php echo htmlspecialchars($last_message['last_name']); ?>: <?php echo htmlspecialchars($last_message['message']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Sistem Durumu</h5>
                                    <p class="card-text display-6">Sunucu Durumu: <span class="text-success">Aktif</span></p>
                                    <p class="card-text display-6">Disk Kullanımı: <?php echo round(disk_free_space("/") / disk_total_space("/") * 100, 2); ?>%</p>
                                    <p class="card-text display-6">Bellek Kullanımı: <?php echo round(memory_get_usage() / memory_get_peak_usage() * 100, 2); ?>%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
             </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="content-card" data-aos="fade-up">
                    <h2 class="mb-4">Profil Yönetimi</h2>
                    <?php 
                    if (!empty($success_msg)) {
                        echo '<div class="alert alert-success">' . $success_msg . '</div>';
                    }
                    if (!empty($email_err)) {
                        echo '<div class="alert alert-danger">' . $email_err . '</div>';
                    }
                    if (!empty($phone_err)) {
                        echo '<div class="alert alert-danger">' . $phone_err . '</div>';
                    }
                    if (!empty($isim_err)) {
                        echo '<div class="alert alert-danger">' . $isim_err . '</div>';
                    }
                    ?>
                    <form action="index.php#profile" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Kullanıcı Adı</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($username); ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="isim" class="form-label">İsim</label>
                            <input type="text" name="isim" id="isim" class="form-control" value="<?php echo htmlspecialchars($isim); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="blog" role="tabpanel" aria-labelledby="blog-tab">
    <div class="content-card" data-aos="fade-up">
        <h2 class="mb-4">Blog Yönetimi</h2>
        <a href="add-post.php" class="btn btn-primary mb-3">Yeni Blog Yazısı Ekle</a>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($blog_posts as $post): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($post['title']); ?></td>
                            <td><?php echo htmlspecialchars($post['category']); ?></td>
                            <td><?php echo date('d M Y', strtotime($post['created_at'])); ?></td>
                            <td>
                                <a href="edit-post.php?id=<?php echo $post['id']; ?>" class="btn btn-warning btn-sm me-2">Düzenle</a>
                                <a href="delete-post.php?id=<?php echo $post['id']; ?>" class="btn btn-blogdelete btn-sm">Sil</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
            <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                <div class="content-card" data-aos="fade-up">
                    <h2 class="mb-4">Mesajlar</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Ad</th>
                                    <th>Soyad</th>
                                    <th>E-posta</th>
                                    <th>Telefon</th>
                                    <th>Hizmet</th>
                                    <th>Mesaj</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($messages as $message): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($message['first_name']); ?></td>
                                        <td><?php echo htmlspecialchars($message['last_name']); ?></td>
                                        <td><?php echo htmlspecialchars($message['email']); ?></td>
                                        <td><?php echo htmlspecialchars($message['phone']); ?></td>
                                        <td><?php echo htmlspecialchars($message['service']); ?></td>
                                        <td><?php echo htmlspecialchars($message['message']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="applications" role="tabpanel" aria-labelledby="applications-tab">
    <div class="content-card" data-aos="fade-up">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Başvurular</h2>
            <div class="d-flex gap-2">
                <select class="form-select" id="statusFilter">
                    <option value="">Tüm Durumlar</option>
                    <option value="new">Yeni</option>
                    <option value="processing">İşleniyor</option>
                    <option value="completed">Tamamlandı</option>
                    <option value="rejected">Reddedildi</option>
                </select>
                <select class="form-select" id="serviceFilter">
                    <option value="">Tüm Hizmetler</option>
                    <?php foreach ($serviceTypes as $value => $label): ?>
                        <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover" id="applicationsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tarih</th>
                        <th>Ad Soyad</th>
                        <th>E-posta</th>
                        <th>Telefon</th>
                        <th>Hizmet</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($applications as $app): ?>
                    <tr>
                        <td>#<?php echo $app['id']; ?></td>
                        <td><?php echo date('d.m.Y H:i', strtotime($app['created_at'])); ?></td>
                        <td><?php echo htmlspecialchars($app['first_name'] . ' ' . $app['last_name']); ?></td>
                        <td>
                            <a href="mailto:<?php echo htmlspecialchars($app['email']); ?>">
                                <?php echo htmlspecialchars($app['email']); ?>
                            </a>
                        </td>
                        <td>
                            <a href="tel:<?php echo htmlspecialchars($app['phone']); ?>">
                                <?php echo htmlspecialchars($app['phone']); ?>
                            </a>
                        </td>
                        <td><?php echo $serviceTypes[$app['service_type']] ?? $app['service_type']; ?></td>
                        <td>
                            <span class="badge bg-<?php echo $statusColors[$app['status']]; ?>">
                                <?php echo ucfirst($app['status']); ?>
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-secondary " onclick="viewApplication(<?php echo $app['id']; ?>)">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-success" onclick="updateStatus(<?php echo $app['id']; ?>)">
                                <i class="bi bi-check2"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="applicationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Başvuru Detayı</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="applicationDetails"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Durum Güncelle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="statusForm">
                    <input type="hidden" name="application_id" id="statusApplicationId">
                    <div class="mb-3">
                        <label class="form-label">Yeni Durum</label>
                        <select class="form-select" name="status" required>
                            <option value="new">Yeni</option>
                            <option value="processing">İşleniyor</option>
                            <option value="completed">Tamamlandı</option>
                            <option value="rejected">Reddedildi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Not</label>
                        <textarea class="form-control" name="note" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
</div>

            <div class="tab-pane fade" id="site-settings" role="tabpanel" aria-labelledby="site-settings-tab">
        <div class="content-card" data-aos="fade-up">
            <h2 class="mb-4">Site Ayarları</h2>

            <form action="update-contact-details.php" method="post">
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefon</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo htmlspecialchars($contact_details['phone']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phonelink" class="form-label">Telefon Linki</label>
                    <input type="text" name="phonelink" id="phonelink" class="form-control" value="<?php echo htmlspecialchars($contact_details['phonelink']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">E-posta</label>
                    <input type="email" name="mail" id="mail" class="form-control" value="<?php echo htmlspecialchars($contact_details['mail']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="maillink" class="form-label">E-posta Linki</label>
                    <input type="text" name="maillink" id="maillink" class="form-control" value="<?php echo htmlspecialchars($contact_details['maillink']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Konum</label>
                    <input type="text" name="location" id="location" class="form-control" value="<?php echo htmlspecialchars($contact_details['location']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Güncelle</button>
            </form>
        </div>
        
    </div>

            <div class="tab-pane fade" id="homepage" role="tabpanel" aria-labelledby="homepage-tab">
                <div class="content-card" data-aos="fade-up">
                    <h2 class="mt-5 mb-4">Mevcut Hizmetler</h2>
                    <div id="services-list">
                        <?php foreach ($services as $service): ?>
                        <div class="service-item mb-3">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label"><b><u>Hizmet İkonu</u></b></label>
                                    <p class="form-control-plaintext"><i class="<?php echo htmlspecialchars($service['icon']); ?>"></i> <?php echo htmlspecialchars($service['icon']); ?></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label"><b><u>Hizmet Başlığı</u></b></label>
                                    <p class="form-control-plaintext"><?php echo htmlspecialchars($service['title']); ?></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label"><b><u>Hizmet Açıklaması</u></b></label>
                                    <p class="form-control-plaintext"><?php echo htmlspecialchars($service['description']); ?></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label"><b><u>Hizmet Detay Linki</u></b></label>
                                    <p class="form-control-plaintext"><?php echo htmlspecialchars($service['link']); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="content-card" data-aos="fade-up">
                    <h2 class="mt-5 mb-4">Yeni Hizmet Ekle</h2>
                    <form action="update-services.php" method="post">
                        <div id="services-container">
                            <div class="service-item mb-3">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label"><b>Hizmet İkonu</b></label>
                                        <input type="text" name="icons[]" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label"><b>Hizmet Başlığı </b></label>
                                        <input type="text" name="titles[]" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label"><b>Hizmet Açıklaması</b></label>
                                        <textarea name="descriptions[]" class="form-control" required></textarea>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label"><b>Hizmet Detay Linki</b></label>
                                        <input type="text" name="links[]" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="add-service" class="btn btn-secondary">+</button>
                        <button type="submit" class="btn btn-primary">Hizmetleri Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
        AOS.init({
            duration: 800,
            once: true
        });

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.querySelector('.navbar').classList.remove('scrolled');
            }
        });
</script>

<script>
     document.getElementById('add-service').addEventListener('click', function() {
        const container = document.getElementById('services-container');
        const newService = document.createElement('div');
        newService.classList.add('service-item', 'mb-3');
        newService.innerHTML = `
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label"><b>Hizmet İkonu</b></label>
                    <input type="text" name="icons[]" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label"><b>Hizmet Başlığı </b></label>
                    <input type="text" name="titles[]" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label"><b>Hizmet Açıklaması</b></label>
                    <textarea name="descriptions[]" class="form-control" required></textarea>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label"><b>Hizmet Detay Linki</b></label>
                    <input type="text" name="links[]" class="form-control" required>
                </div>
            </div>
        `;
        container.appendChild(newService);
    });
</script>

<script>
    function updateClocks() {
        const newYorkTime = new Date().toLocaleString("en-US", { timeZone: "America/New_York", timeStyle: "short", hourCycle: "h24" });
        const londonTime = new Date().toLocaleString("en-GB", { timeZone: "Europe/London", timeStyle: "short", hourCycle: "h24" });
        const tokyoTime = new Date().toLocaleString("ja-JP", { timeZone: "Asia/Tokyo", timeStyle: "short", hourCycle: "h24" });
        document.getElementById('new-york-time').textContent = newYorkTime;
        document.getElementById('london-time').textContent = londonTime;
        document.getElementById('tokyo-time').textContent = tokyoTime;
    }
    setInterval(updateClocks, 1000);
    updateClocks();
</script>

<script>
document.getElementById('statusFilter').addEventListener('change', filterApplications);
document.getElementById('serviceFilter').addEventListener('change', filterApplications);

function filterApplications() {
    const statusFilter = document.getElementById('statusFilter').value;
    const serviceFilter = document.getElementById('serviceFilter').value;
    const rows = document.querySelectorAll('#applicationsTable tbody tr');

    rows.forEach(row => {
        const status = row.querySelector('.badge').textContent.toLowerCase();
        const service = row.cells[5].textContent;
        
        const statusMatch = !statusFilter || status === statusFilter;
        const serviceMatch = !serviceFilter || service === serviceFilter;

        row.style.display = statusMatch && serviceMatch ? '' : 'none';
    });
}

async function viewApplication(id) {
    try {
        const response = await fetch(`get_application.php?id=${id}`);
        const data = await response.json();
        
        if (!data.success) {
            throw new Error(data.error || 'Bilinmeyen bir hata oluştu');
        }
        
        const application = data.data;
        const modal = new bootstrap.Modal(document.getElementById('applicationModal'));
        const detailsDiv = document.getElementById('applicationDetails');
        
        const statusColors = {
            'new': 'primary',
            'processing': 'warning',
            'completed': 'success',
            'rejected': 'danger'
        };

        const statusLabels = {
            'new': 'Yeni Başvuru',
            'processing': 'İşleniyor',
            'completed': 'Tamamlandı',
            'rejected': 'Reddedildi'
        };
        
        detailsDiv.innerHTML = `
            <div class="row g-4">
                <!-- Durum Kartı -->
                <div class="col-12">
                    <div class="card bg-light">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-2 text-muted">Başvuru Durumu</h6>
                                <span class="badge bg-${statusColors[application.status]} fs-6">
                                    ${statusLabels[application.status]}
                                </span>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block">Başvuru Tarihi</small>
                                <strong>${new Date(application.created_at).toLocaleDateString('tr-TR')}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kişisel Bilgiler -->
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header">
                            <h6 class="mb-0">Kişisel Bilgiler</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="text-muted small">Ad Soyad</label>
                                <p class="mb-2 fw-bold">${application.first_name} ${application.last_name}</p>
                            </div>
                            <div class="mb-3">
                                <label class="text-muted small">E-posta</label>
                                <p class="mb-2">
                                    <a href="mailto:${application.email}" class="text-decoration-none">
                                        <i class="bi bi-envelope me-1"></i>${application.email}
                                    </a>
                                </p>
                            </div>
                            <div>
                                <label class="text-muted small">Telefon</label>
                                <p class="mb-0">
                                    <a href="tel:${application.phone}" class="text-decoration-none">
                                        <i class="bi bi-telephone me-1"></i>${application.phone}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Başvuru Detayları -->
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header">
                            <h6 class="mb-0">Başvuru Detayları</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="text-muted small">Hizmet Türü</label>
                                <p class="mb-2 fw-bold">${application.service_type}</p>
                            </div>
                            <div>
                                <label class="text-muted small">Ek Bilgiler</label>
                                <p class="mb-0">${application.additional_info || '-'}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Admin Notları -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Admin Notları</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Tarih</th>
                                            <th>Durum</th>
                                            <th>Not</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${application.notes ? application.notes.map(note => `
                                            <tr>
                                                <td>${new Date(note.created_at).toLocaleDateString('tr-TR')}</td>
                                                <td>
                                                    <span class="badge bg-${statusColors[note.status]}">
                                                        ${statusLabels[note.status]}
                                                    </span>
                                                </td>
                                                <td>${note.note || '-'}</td>
                                            </tr>
                                        `).join('') : `
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">
                                                    Henüz not eklenmemiş
                                                </td>
                                            </tr>
                                        `}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Belgeler -->
                ${application.documents ? `
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Yüklenen Belgeler</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex gap-2 flex-wrap">
                                    ${application.documents.split(',').map((doc, index) => `
                                        <a href="${doc}" class="btn btn-outline-primary btn-sm" target="_blank">
                                            <i class="bi bi-file-earmark me-1"></i>
                                            Belge ${index + 1}
                                        </a>
                                    `).join('')}
                                </div>
                            </div>
                        </div>
                    </div>
                ` : ''}
            </div>
        `;
        
        modal.show();
    } catch (error) {
        console.error('Hata detayı:', error);
        alert(`Başvuru detayı alınırken bir hata oluştu: ${error.message}`);
    }
}

function escapeHtml(str) {
    const div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
}

const style = document.createElement('style');
style.textContent = `
.timeline {
    position: relative;
    padding-left: 20px;
}

.timeline-item {
    position: relative;
    padding-bottom: 20px;
    border-left: 2px solid #dee2e6;
    padding-left: 20px;
}

.timeline-item:before {
    content: '';
    position: absolute;
    left: -7px;
    top: 0;
    width: 12px;
    height: 12px;
    background: #fff;
    border: 2px solid #dee2e6;
    border-radius: 50%;
}

.timeline-item:last-child {
    padding-bottom: 0;
}
`;
document.head.appendChild(style);

function updateStatus(id) {
    document.getElementById('statusApplicationId').value = id;
    const modal = new bootstrap.Modal(document.getElementById('statusModal'));
    modal.show();
}

document.getElementById('statusForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    
    try {
        const response = await fetch('update_application_status.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            location.reload();
        } else {
            alert('Güncelleme sırasında bir hata oluştu.');
        }
    } catch (error) {
        console.error('Hata:', error);
        alert('Güncelleme sırasında bir hata oluştu.');
    }
});
</script>

</body>
</html>