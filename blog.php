<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'yetkin_krnwallst');
define('DB_PASSWORD', 'Mstarda1337$');
define('DB_NAME', 'yetkin_wallstcons');


$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

mysqli_set_charset($link, "utf8");

$records_per_page = 9;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

$where_clause = "1=1"; 

if(isset($_GET['category']) && !empty($_GET['category'])) {
    $category = mysqli_real_escape_string($link, $_GET['category']);
    $where_clause .= " AND category = '$category'";
}

if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search = mysqli_real_escape_string($link, $_GET['search']);
    $where_clause .= " AND (title LIKE '%$search%' OR content LIKE '%$search%')";
}

$total_sql = "SELECT COUNT(*) as total FROM blog_posts WHERE $where_clause";
$total_result = mysqli_query($link, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $records_per_page);

$sql = "SELECT id, title, content, image, category, category_name, created_at 
        FROM blog_posts 
        WHERE $where_clause
        ORDER BY created_at DESC 
        LIMIT $offset, $records_per_page";

$posts = [];
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
    mysqli_free_result($result);
}

$page_name = basename(__FILE__);
    $sql = "SELECT title, meta_description, author, keywords, url_image, meta_title FROM page_settings WHERE page_name = '$page_name'";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_assoc($result);
        $seotitle = $row['title'] . " | Wall Street Consulting";
        $seometadesc = $row['meta_description'];
        $seoauthor = $row['author'];
        $seokeywords = $row['keywords'];
        $seourlimage = $row['url_image'];
        $seometatitle = $row['meta_title'];
    
        mysqli_free_result($result);
    }
    

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($seotitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($seometadesc); ?>">
    <meta name="title" content="<?php echo htmlspecialchars($seometatitle); ?>">
    <link rel="icon" href="<?php echo htmlspecialchars($seourlimage); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo htmlspecialchars($seourlimage); ?>" type="image/x-icon">
    <meta property="og:title" content="<?php echo htmlspecialchars($seometatitle); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($seometadesc); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($seourlimage); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($seourlimage); ?>">
    <meta property="og:type" content="website">
    <meta name="keywords" content="<?php echo htmlspecialchars($seokeywords); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($seoauthor); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="./src/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <header class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-white-50">
                    <li class="breadcrumb-item"><a href="/" class="text-white text-decoration-none">Ana Sayfa</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Blog</li>
                </ol>
            </nav>
            <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up">Blog</h1>
            <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                Vize ve göçmenlik dünyasındaki son gelişmeleri takip edin
            </p>
        </div>
    </header>

    <div class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6" data-aos="fade-up">
                    <form class="search-box" method="GET">
                        <i class="bi bi-search"></i>
                        <input type="text" name="search" placeholder="Blog yazılarında ara..." 
                               value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <?php if(isset($_GET['category'])): ?>
                            <input type="hidden" name="category" value="<?php echo htmlspecialchars($_GET['category']); ?>">
                        <?php endif; ?>
                    </form>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-lg-end mt-3 mt-lg-0">
                        <a href="?" class="category-tag <?php echo !isset($_GET['category']) ? 'active' : ''; ?>">Tümü</a>
                        <a href="?category=abd-vizesi<?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>" 
                           class="category-tag <?php echo (isset($_GET['category']) && $_GET['category'] == 'abd-vizesi') ? 'active' : ''; ?>">ABD Vizesi</a>
                        <a href="?category=abd-oturum<?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>" 
                           class="category-tag <?php echo (isset($_GET['category']) && $_GET['category'] == 'abd-oturum') ? 'active' : ''; ?>">ABD'de Oturum</a>
                        <a href="?category=abd-yatirim<?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>" 
                           class="category-tag <?php echo (isset($_GET['category']) && $_GET['category'] == 'abd-yatirim') ? 'active' : ''; ?>">ABD'de Yatırım</a><br>
                           <a href="?category=abd-yatirim<?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>" 
                           class="category-tag <?php echo (isset($_GET['category']) && $_GET['category'] == 'abd-dogum') ? 'active' : ''; ?>">ABD'de Doğum</a>
                           <a href="?category=abd-yatirim<?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>" 
                           class="category-tag <?php echo (isset($_GET['category']) && $_GET['category'] == 'ab-oturum') ? 'active' : ''; ?>">AB'de Oturum</a>
                           <a href="?category=abd-yatirim<?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>" 
                           class="category-tag <?php echo (isset($_GET['category']) && $_GET['category'] == 'schengen-vizesi') ? 'active' : ''; ?>">Schengen Vizesi</a>
                           <a href="?category=abd-yatirim<?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>" 
                           class="category-tag <?php echo (isset($_GET['category']) && $_GET['category'] == 'yurtdisi-egitim') ? 'active' : ''; ?>">Yurtdışı Eğitim</a>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <?php if (empty($posts)): ?>
                    <div class="col-12 text-center">
                        <div class="p-5">
                            <i class="bi bi-journal-x display-1 text-muted"></i>
                            <h3 class="mt-4">Henüz blog yazısı yok</h3>
                            <p class="text-muted">Yakında yeni içerikler eklenecektir.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <a href="https://usadanismani.com/read-blog.php?id=<?php echo htmlspecialchars($post['id']); ?>" style="text-decoration:none;"> <article class="blog-card">
                            <img src="<?php echo !empty($post['image']) ? htmlspecialchars($post['image']) : 'images/placeholder.jpg'; ?>" 
                                 alt="<?php echo htmlspecialchars($post['title']); ?>" 
                                 class="blog-image">
                            <div class="p-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="blog-category"><?php echo htmlspecialchars($post['category_name']); ?></span>
                                    <span class="blog-date">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        <?php echo date('d M Y', strtotime($post['created_at'])); ?>
                                    </span>
                                </div>
                                <h3 class="blog-title">
                                    <a href="https://usadanismani.com/read-blog.php?id=<?php echo $post['id']; ?>" class="text-decoration-none text-dark">
                                        <?php echo htmlspecialchars($post['title']); ?>
                                    </a>
                                </h3>
                                <p class="blog-excerpt">
                                    <?php 
                                    $excerpt = strip_tags($post['content']);
                                    echo strlen($excerpt) > 150 ? substr($excerpt, 0, 150) . '...' : $excerpt;
                                    ?>
                                </p>
                                <a href="https://usadanismani.com/read-blog.php?id=<?php echo $post['id']; ?>" class="btn btn-link text-primary p-0">
                                    Devamını Oku <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </article></a>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php if ($total_pages > 1): ?>
            <nav class="mt-5" aria-label="Blog sayfaları">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $page - 1; ?><?php echo isset($_GET['category']) ? '&category=' . htmlspecialchars($_GET['category']) : ''; ?><?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>" aria-label="Previous">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?><?php echo isset($_GET['category']) ? '&category=' . htmlspecialchars($_GET['category']) : ''; ?><?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $page + 1; ?><?php echo isset($_GET['category']) ? '&category=' . htmlspecialchars($_GET['category']) : ''; ?><?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>" aria-label="Next">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        document.querySelector('.search-box').addEventListener('submit', function(e) {
            e.preventDefault();
            const searchTerm = this.querySelector('input[name="search"]').value.trim();
            const currentCategory = this.querySelector('input[name="category"]')?.value;
            
            let searchUrl = '?';
            if (searchTerm) {
                searchUrl += 'search=' + encodeURIComponent(searchTerm);
                if (currentCategory) {
                    searchUrl += '&category=' + encodeURIComponent(currentCategory);
                }
            } else if (currentCategory) {
                searchUrl = '?category=' + encodeURIComponent(currentCategory);
            }
            
            window.location.href = searchUrl;
        });
    </script>
</body>
</html>