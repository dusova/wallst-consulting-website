<?php
require_once "./system/connection.php";
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
    <link rel="stylesheet" href="./pages/pagestyle.css">
    <link rel="stylesheet" href="./src/style.css">
</head>
<body>

<?php include './includes/header.php'; ?>

    <header class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-white-50">
                    <li class="breadcrumb-item"><a href="https://usadanismani.com/index.php" class="text-white text-decoration-none">Ana Sayfa</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Kullanım Şartları</li>
                </ol>
            </nav>
            <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up">Kullanım Şartları</h1>
            <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                Web sitemizi kullanırken uymanız gereken kurallar ve şartlar.
            </p>
        </div>
    </header>

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <nav class="sidebar-nav" id="sidebarNav">
                        <div class="nav flex-column">
                            <a class="nav-link active" href="#genel-bilgi">Genel Bilgi</a>
                            <a class="nav-link" href="#kullanim-sartlari">Kullanım Şartları</a>
                            <a class="nav-link" href="#sorumluluklar">Sorumluluklar</a>
                            <a class="nav-link" href="#uyusmazliklar">Uyuşmazlıklar</a>
                            <a class="nav-link" href="#degisiklikler">Değişiklikler</a>
                            <a class="nav-link" href="#iletisim">İletişim</a>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-9">
                    <section id="genel-bilgi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Kullanım Şartları Hakkında</h2>
                        <p class="lead text-muted">Wall Street Consulting olarak, web sitemizi kullanırken uymanız gereken kuralları ve şartları belirledik.</p>
                        
                        <div class="mt-4">
                            <p>Bu kullanım şartları, websitemizi kullanırken dikkat etmeniz gereken kuralları ve yükümlülüklerinizi açıklamaktadır. Sitemizi kullanarak bu şartları kabul etmiş sayılırsınız.</p>
                            <p>Bu şartlar, ilgili mevzuat hükümlerine uygun olarak hazırlanmıştır.</p>
                        </div>
                    </section>

                    <section id="kullanim-sartlari" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Kullanım Şartları</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Genel Kurallar</h4>
                                <p>Web sitemizi kullanırken aşağıdaki kurallara uymanız gerekmektedir:</p>
                                <ul class="custom-list">
                                    <li>Yasalara ve düzenlemelere uygun davranmak</li>
                                    <li>Diğer kullanıcıların haklarına saygı göstermek</li>
                                    <li>Web sitesinin işleyişini bozacak veya zarar verecek davranışlardan kaçınmak</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h4>İçerik Kullanımı</h4>
                                <p>Web sitemizde yer alan içeriklerin kullanımı ile ilgili kurallar:</p>
                                <ul class="custom-list">
                                    <li>İçerikler yalnızca kişisel kullanım için kullanılabilir</li>
                                    <li>İçeriklerin izinsiz kopyalanması, dağıtılması veya ticari amaçlarla kullanılması yasaktır</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section id="sorumluluklar" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Sorumluluklar</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Kullanıcı Sorumlulukları</h4>
                                <p>Kullanıcıların web sitemizi kullanırken dikkat etmesi gereken sorumluluklar:</p>
                                <ul class="custom-list">
                                    <li>Doğru ve güncel bilgi sağlamak</li>
                                    <li>Hesap bilgilerini gizli tutmak</li>
                                    <li>Web sitesini kötüye kullanmamak</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h4>Wall Street Consulting Sorumlulukları</h4>
                                <p>Wall Street Consulting olarak, web sitemizin güvenliği ve işleyişi ile ilgili sorumluluklarımız:</p>
                                <ul class="custom-list">
                                    <li>Web sitesinin güvenliğini sağlamak</li>
                                    <li>Kullanıcı verilerini korumak</li>
                                    <li>Web sitesinin kesintisiz ve doğru çalışmasını sağlamak</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section id="uyusmazliklar" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Uyuşmazlıklar</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Çözüm Yolları</h4>
                                <p>Web sitemizi kullanırken ortaya çıkabilecek uyuşmazlıkların çözüm yolları:</p>
                                <ul class="custom-list">
                                    <li>Öncelikle taraflar arasında uzlaşma sağlanmaya çalışılır</li>
                                    <li>Uzlaşma sağlanamazsa yasal yollara başvurulur</li>
                                    <li>Uyuşmazlıkların çözümünde Türkiye Cumhuriyeti yasaları geçerlidir</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section id="degisiklikler" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Kullanım Şartlarında Değişiklikler</h2>
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">Güncelleme Politikası</h5>
                                    <p>Wall Street Consulting, bu kullanım şartlarını gerektiğinde güncelleme hakkını saklı tutar. Şartlarda yapılan değişiklikler, web sitemizde yayınlandığı tarihte yürürlüğe girer.</p>
                                    <ul class="custom-list">
                                        <li>Önemli değişiklikler olması durumunda e-posta yoluyla bilgilendirme yapılır</li>
                                        <li>Güncel şartlar her zaman web sitemizde yayınlanır</li>
                                        <li>Değişiklik tarihçesi şartlar sonunda belirtilir</li>
                                        <li>Önceki versiyonlara erişim talep üzerine sağlanır</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="iletisim" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">İletişim</h2>
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">İletişim Bilgileri</h5>
                                    <p>Wall Street Consulting olarak, kullanım şartları ile ilgili sorularınız için bizimle iletişime geçebilirsiniz.</p>
                                    
                                    <div class="contact-info mt-4">
                                        <h6>İletişim Bilgilerimiz:</h6>
                                        <ul class="custom-list">
                                            <li><strong>Adres:</strong> Wall ST, Washington, U.S.A.</li>
                                            <li><strong>E-posta:</strong> info@usadanismani.com</li>
                                            <li><strong>Telefon:</strong> +90 (506) 024 98 24</li>
                                            <li><strong>Web:</strong> www.usadanismani.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="cta-box text-center" data-aos="fade-up">
                        <h3 class="mb-4">Sorularınız mı var?</h3>
                        <p class="mb-4">Kullanım şartlarımız hakkında daha fazla bilgi almak için bizimle iletişime geçin.</p>
                        <a href="https://usadanismani.com/index.php#contact" class="btn btn-light btn-lg">İletişime Geçin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './includes/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://usadanismani.com/pages.js"></script>
 
</body>
</html>
