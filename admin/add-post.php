<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

require_once "../system/connection.php";

$title = $content = $category = $category_name = $image = "";
$title_err = $content_err = $category_err = $image_err = "";
$success_msg = "";
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


$category_mapping = [
    "ab-oturum" => "AB'de Oturum",
    "abd-oturum" => "ABD'de Oturum",
    "abd-dogum" => "ABD'de Doğum",
    "abd-yatirim" => "ABD'de Yatırım",
    "abd-vizesi" => "ABD Vizesi",
    "schengen-vizesi" => "Schengen Vizesi",
    "yurtdisi-egitim" => "Yurtdışı Eğitim"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["title"]))) {
        $title_err = "Lütfen bir başlık giriniz.";
    } else {
        $title = trim($_POST["title"]);
    }

    if (empty(trim($_POST["content"]))) {
        $content_err = "Lütfen içeriği giriniz.";
    } else {
        $content = trim($_POST["content"]);
    }

    if (empty(trim($_POST["category"]))) {
        $category_err = "Lütfen bir kategori seçiniz.";
    } else {
        $category = trim($_POST["category"]);
        $category_name = $category_mapping[$category];
    }

    if (empty(trim($_POST["image"]))) {
        $image_err = "Lütfen bir resim URL'si giriniz.";
    } else {
        $image = trim($_POST["image"]);
    }

    if (empty($title_err) && empty($content_err) && empty($category_err) && empty($image_err)) {
        $sql = "INSERT INTO blog_posts (title, content, category, category_name, image) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssss", $param_title, $param_content, $param_category, $param_category_name, $param_image);
            $param_title = $title;
            $param_content = $content;
            $param_category = $category;
            $param_category_name = $category_name;
            $param_image = $image;

            if (mysqli_stmt_execute($stmt)) {
                $success_msg = "Yeni blog gönderisi başarıyla eklendi.";
            } else {
                echo "Bir şeyler yanlış gitti. Lütfen daha sonra tekrar deneyin.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Ekle | Wall Street Consulting</title>
    <meta name="description" content="Admin panel for managing Wall Street Consulting website">
    <meta name="keywords" content="admin, panel, management, dashboard">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="./src/style.css" rel="stylesheet">
</head>
<body>

<?php include "./includes/header.php" ?>

<div class="content-section">
    <div class="container">
        <div class="container mt-5">
            <h2>Yeni Blog Yazısı Ekle</h2>
            <?php if (!empty($success_msg)): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success_msg; ?>
                </div>
            <?php endif; ?>
            <form action="add-post.php" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Başlık</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($title); ?>" required>
                    <span class="text-danger"><?php echo $title_err; ?></span>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">İçerik</label>
                    <textarea name="content" id="content" class="form-control" rows="5" required><?php echo htmlspecialchars($content); ?></textarea>
                    <span class="text-danger"><?php echo $content_err; ?></span>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="">Kategori Seçin</option>
                        <option value="ab-oturum">AB'de Oturum</option>
                        <option value="abd-oturum">ABD'de Oturum</option>
                        <option value="abd-dogum">ABD'de Doğum</option>
                        <option value="abd-yatirim">ABD'de Yatırım</option>
                        <option value="abd-vizesi">ABD Vizesi</option>
                        <option value="schengen-vizesi">Schengen Vizesi</option>
                        <option value="yurtdisi-egitim">Yurtdışı Eğitim</option>
                    </select>
                    <span class="text-danger"><?php echo $category_err; ?></span>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Resim URL</label>
                    <input type="text" name="image" id="image" class="form-control" value="<?php echo htmlspecialchars($image); ?>" required>
                    <span class="text-danger"><?php echo $image_err; ?></span>
                </div>
                <button type="submit" class="btn btn-primary">Ekle</button>
            </form>
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
</body>
</html>