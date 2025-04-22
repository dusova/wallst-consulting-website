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
$id = $_GET['id'];
$title = $content = $category = $category_name = $image = "";
$title_err = $content_err = $category_err = $image_err = "";

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
    $id = $_POST['id'];

    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter a title.";
    } else {
        $title = trim($_POST["title"]);
    }

    if (empty(trim($_POST["content"]))) {
        $content_err = "Please enter content.";
    } else {
        $content = trim($_POST["content"]);
    }

    if (empty(trim($_POST["category"]))) {
        $category_err = "Please select a category.";
    } else {
        $category = trim($_POST["category"]);
        $category_name = $category_mapping[$category];
    }

    if (empty(trim($_POST["image"]))) {
        $image_err = "Please enter an image URL.";
    } else {
        $image = trim($_POST["image"]);
    }

    if (empty($title_err) && empty($content_err) && empty($category_err) && empty($image_err)) {
        $sql = "UPDATE blog_posts SET title = ?, content = ?, category = ?, category_name = ?, image = ? WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssi", $param_title, $param_content, $param_category, $param_category_name, $param_image, $param_id);
            $param_title = $title;
            $param_content = $content;
            $param_category = $category;
            $param_category_name = $category_name;
            $param_image = $image;
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php#blog");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

} else {
    $sql = "SELECT * FROM blog_posts WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = $id;

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $title = $row['title'];
                $content = $row['content'];
                $category = $row['category'];
                $category_name = $category_mapping[$category];
                $image = $row['image'];
            } else {
                header("location: error.php");
                exit();
            }
        } else {
            echo "Something went wrong. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Düzenle | Wall Street Consulting</title>
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
        <h2>Blog Yazısını Düzenle</h2>
        <form action="edit-post.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                    <option value="ab-oturum" <?php echo ($category == "ab-oturum") ? 'selected' : ''; ?>>AB'de Oturum</option>
                    <option value="abd-oturum" <?php echo ($category == "abd-oturum") ? 'selected' : ''; ?>>ABD'de Oturum</option>
                    <option value="abd-dogum" <?php echo ($category == "abd-dogum") ? 'selected' : ''; ?>>ABD'de Doğum</option>
                    <option value="abd-yatirim" <?php echo ($category == "abd-yatirim") ? 'selected' : ''; ?>>ABD'de Yatırım</option>
                    <option value="abd-vizesi" <?php echo ($category == "abd-vizesi") ? 'selected' : ''; ?>>ABD Vizesi</option>
                    <option value="schengen-vizesi" <?php echo ($category == "schengen-vizesi") ? 'selected' : ''; ?>>Schengen Vizesi</option>
                    <option value="yurtdisi-egitim" <?php echo ($category == "yurtdisi-egitim") ? 'selected' : ''; ?>>Yurtdışı Eğitim</option>
                </select>
                <span class="text-danger"><?php echo $category_err; ?></span>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Resim URL</label>
                <input type="text" name="image" id="image" class="form-control" value="<?php echo htmlspecialchars($image); ?>">
                <span class="text-danger"><?php echo $image_err; ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
</div>
</div>
</body>
</html>