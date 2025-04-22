<?php
// Database configuration
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'yetkin_krnwallst');
define('DB_PASSWORD', 'Mstarda1337$');
define('DB_NAME', 'yetkin_wallstcons');

// Connect to database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

mysqli_set_charset($link, "utf8");

// Get blog post ID
$id = isset($_GET['id']) ? mysqli_real_escape_string($link, $_GET['id']) : 0;

// Fetch the blog post
$sql = "SELECT * FROM blog_posts WHERE id = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$post = mysqli_fetch_assoc($result);

if (!$post) {
    header("Location: blog.php");
    exit();
}

// Fetch related posts (same category, excluding current post)
$related_sql = "SELECT id, title, image, created_at 
                FROM blog_posts 
                WHERE category = ? AND id != ? 
                ORDER BY created_at DESC 
                LIMIT 3";
$stmt = mysqli_prepare($link, $related_sql);
mysqli_stmt_bind_param($stmt, "si", $post['category'], $id);
mysqli_stmt_execute($stmt);
$related_result = mysqli_stmt_get_result($stmt);
$related_posts = [];
while ($row = mysqli_fetch_assoc($related_result)) {
    $related_posts[] = $row;
}

// Fetch interesting articles
$interesting_sql = "SELECT id, title, image, created_at 
                   FROM blog_posts 
                   WHERE (featured = 1 OR views > 100) AND id != ?
                   ORDER BY RAND() 
                   LIMIT 4";
$stmt = mysqli_prepare($link, $interesting_sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$interesting_result = mysqli_stmt_get_result($stmt);
$interesting_posts = [];
while ($row = mysqli_fetch_assoc($interesting_result)) {
    $interesting_posts[] = $row;
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?> | Wall Street Consulting</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="<?php echo htmlspecialchars(substr(strip_tags($post['content']), 0, 160)); ?>">
    
    <!-- CSS Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="./src/style.css" rel="stylesheet">
    
</head>
<body>
    <?php include './includes/header.php'; ?>

    <header class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-white-50">
                    <li class="breadcrumb-item"><a href="/" class="text-white text-decoration-none">Ana Sayfa</a></li>
                    <li class="breadcrumb-item"><a href="/blog.php" class="text-white text-decoration-none">Blog</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page"><?php echo htmlspecialchars($post['title']); ?></li>
                </ol>
            </nav>
            <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up"><?php echo htmlspecialchars($post['title']); ?></h1>
            <div class="d-flex align-items-center text-white-50" data-aos="fade-up" data-aos-delay="100">
                <span class="me-4">
                    <i class="bi bi-calendar3 me-2"></i>
                    <?php echo date('d M Y', strtotime($post['created_at'])); ?>
                </span>
                <a href="blog.php?category=<?php echo urlencode($post['category']); ?>" class="category-tag">
                    <?php echo htmlspecialchars($post['category_name']); ?>
                </a>
            </div>
        </div>
    </header>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <article class="blog-content bg-white p-4 p-lg-5 rounded-4 shadow-sm" data-aos="fade-up">
                        <?php if(!empty($post['image'])): ?>
                            <img src="<?php echo htmlspecialchars($post['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($post['title']); ?>" 
                                 class="img-fluid rounded-4 mb-4">
                        <?php endif; ?>
                        
                        <?php echo $post['content']; ?>

                        <div class="share-buttons mt-5 pt-4 border-top">
                            <h5 class="mb-3">Bu yazıyı paylaş:</h5>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" 
                               class="btn btn-primary" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>&text=<?php echo urlencode($post['title']); ?>" 
                               class="btn btn-info text-white" target="_blank">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode($post['title'] . ' ' . $_SERVER['REQUEST_URI']); ?>" 
                               class="btn btn-success" target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" 
                               class="btn btn-primary" target="_blank">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <?php if (!empty($related_posts)): ?>
                    <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
                        <h4 class="mb-4">Benzer Yazılar</h4>
                        <?php foreach ($related_posts as $related): ?>
                            <a href="read-blog.php?id=<?php echo $related['id']; ?>" class="text-decoration-none">
                                <div class="related-post mb-4">
                                    <img src="<?php echo !empty($related['image']) ? htmlspecialchars($related['image']) : 'images/placeholder.jpg'; ?>" 
                                         alt="<?php echo htmlspecialchars($related['title']); ?>">
                                    <div class="p-3">
                                        <h6 class="mb-2"><?php echo htmlspecialchars($related['title']); ?></h6>
                                        <small class="text-muted">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            <?php echo date('d M Y', strtotime($related['created_at'])); ?>
                                        </small>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($interesting_posts)): ?>
                    <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                        <h4 class="mb-4">İlginizi Çekebilecek Yazılar</h4>
                        <?php foreach ($interesting_posts as $post): ?>
                            <a href="read-blog.php?id=<?php echo $post['id']; ?>" class="text-decoration-none">
                                <div class="related-post mb-4">
                                    <img src="<?php echo !empty($post['image']) ? htmlspecialchars($post['image']) : 'images/placeholder.jpg'; ?>" 
                                         alt="<?php echo htmlspecialchars($post['title']); ?>">
                                    <div class="p-3">
                                        <h6 class="mb-2"><?php echo htmlspecialchars($post['title']); ?></h6>
                                        <small class="text-muted">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            <?php echo date('d M Y', strtotime($post['created_at'])); ?>
                                        </small>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include './includes/footer.php'; ?>
</body>
</html>