<?php
require_once "../system/connection.php";
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
    <meta charset="UTF-8">
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
    <link rel="stylesheet" href="./pagestyle.css">
    <link rel="stylesheet" href="../src/style.css">
    <style>
    .page-header {
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../uploads/sign-in-usa.png');
        background-size: cover;
        background-position: center 30%;
    }
    </style>
</head>
<body>

<?php include '../includes/header.php'; ?>

    <header class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-white-50">
                    <li class="breadcrumb-item"><a href="https://usadanismani.com/index.php" class="text-white text-decoration-none">Ana Sayfa</a></li>
                    <li class="breadcrumb-item"><a href="https://usadanismani.com/index.php#services" class="text-white text-decoration-none">Hizmetler</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">ABD'de Oturum Süreci</li>
                </ol>
            </nav>
            <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up">ABD'de Oturum Süreci</h1>
            <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                Amerika Birleşik Devletleri'nde kalıcı oturum ve vatandaşlık süreçleri hakkında detaylı bilgi edinin.
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
                            <a class="nav-link" href="#oturum-turleri">Kalıcı Oturum Vizeleri</a>
                            <a class="nav-link" href="#oturum-turleri2">Geçici Oturum Vizeleri</a>
                            <a class="nav-link" href="#green-card">Green Card</a>
                            <a class="nav-link" href="#basvuru-sureci">Başvuru Süreci</a>
                            <a class="nav-link" href="#gerekli-belgeler">Gerekli Belgeler</a>
                            <a class="nav-link" href="#sss">Sıkça Sorulan Sorular</a>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-9">
                    <section id="genel-bilgi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">ABD'de Oturum Hakkında</h2>
                        <p class="lead text-muted">Amerika Birleşik Devletleri'nde kalıcı oturum hakkı (Green Card), yabancı ülke vatandaşlarına ABD'de süresiz yaşama ve çalışma imkanı sağlar.</p>
                        <div class="row g-4 mt-4">
                            <div class="col-md-6">
                                <div class="process-card">
                                    <h5 class="text-primary">Kalıcı Oturum Avantajları</h5>
                                    <ul class="custom-list">
                                        <li>ABD'de süresiz yaşama ve çalışma hakkı</li>
                                        <li>Sosyal güvenlik haklarından yararlanma</li>
                                        <li>Eğitim bursu ve kredi imkanları</li>
                                        <li>5 yıl sonra vatandaşlığa başvuru hakkı</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-card">
                                    <h5 class="text-primary">Dikkat Edilmesi Gerekenler</h5>
                                    <ul class="custom-list">
                                        <li>6 aydan fazla yurtdışında kalmama</li>
                                        <li>Vergi yükümlülüklerini yerine getirme</li>
                                        <li>Yasal düzenlemelere uyma</li>
                                        <li>Adres değişikliği bildirimi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="oturum-turleri" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Göçmen Oturum Vizeleri (Kalıcı Oturum)</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Aile Bazlı Göçmen Vizeleri (IR/CR)</h4>
                                <p>IR-1: ABD vatandaşının eşi olan kişilere verilen oturum vizesidir.</p>
                                <p>CR-1: 2 yıldan az süredir evli çiftler için şartlı Green Card verilen oturum vizesidir.</p>
                                <p>IR-2: ABD vatandaşının 21 yaş altı bekar çocukları için verilen oturum vizesidir.</p>
                                <p>IR-5: ABD vatandaşının ebeveynleri için verilen oturum vizesidir.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>İstihdam Bazlı Göçmen Vizeleri (EB)</h4>
                                <p>EB-1: Olağanüstü yetenekli profesyonellerin alabileceği oturum vizesidir.</p>
                                <p>EB-2: İleri derece eğitimli veya istisnai yetenekli kişilerin alabileceği oturum vizesidir.</p>
                                <p>EB-3: Kalifiye işçiler ve profesyonellerin alabileceği oturum vizesidir.</p>
                                <p>EB-5: En az $800.000 yatırım yapacak yatırımcıların alabileceği oturum vizesidir.</p>
                            </div>
                        </div>
                    </section>
                    <section id="oturum-turleri2" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Geçici Oturum Vizeleri</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>F-1 Öğrenci Vizesi</h4>
                                <p>Tam zamanlı eğitim programları için verilen oturum vizesidir. Eğitim süresince part-time çalışma hakkı(kampüs içerisinde), OPT ile mezuniyet sonrası 12 ay çalışma imkanı, STEM bölümleri için 24 ay ek OPT hakkı sunar.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>H-1B Çalışma Vizesi</h4>
                                <p>3 yıllık verilen oturum vizesidir. 3 yıl uzatma imkanı vardır. Lisans derecesi gerektiren pozisyonlar içindir. Yıllık kota ve lottery sistemi vardır. Eş için H-4 vizesi(bazı durumlarda çalışma izni) imkanı sunar.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>L-1 Şirket İçi Transfer Vizesi</h4>
                                <p>L-1A: Yöneticiler için verilen oturum vizesidir. (7 yıla kadar verilebilmektedir.)</p>
                                <p>L-1B: Uzman personeller için verilen oturum vizesidir. (5 yıla kadar verilebilmektedir.)</p>
                                <p>Eş ve çocuklar için L-2 oturum vizesi verilmektedir.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>E-2 Yatırımcı Vizesi</h4>
                                <p>Önemli miktarda yatırım şartı gerektirir. Bu tutar genelde $100.000 ve üzeridir. 2 yıllık olarak verilir. Sınırsız uzatma hakkı vardır. Eş için çalışma izni bulunmaktadır. Yatırımınızın aktif yönetimi gereklidir.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>O-1 Olağanüstü Yetenek Vizesi</h4>
                                <p>Uluslarası tanınırlık gerektiren oturum vizesi türüdür. 3 yıllık olarak verilebilir ve yenilenebilir. Bilim, sanat, eğitim, iş veya spor alanında üstün başarı ve kapsamlı dokümantasyon gerektirir.</p>
                            </div>
                        </div>
                    </section>


                    <section id="green-card" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Green Card (Yeşil Kart)</h2>
                        <p class="lead text-muted mb-4">Green Card, ABD'de süresiz oturum ve çalışma izni sağlayan resmi belgedir.</p>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="requirement-card">
                                    <h5>Başvuru Şartları</h5>
                                    <ul class="custom-list">
                                        <li>18 yaşından büyük olmak</li>
                                        <li>Temiz sabıka kaydı</li>
                                        <li>Sağlık raporu</li>
                                        <li>Mali yeterlilik</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="requirement-card">
                                    <h5>Yenileme Şartları</h5>
                                    <ul class="custom-list">
                                        <li>10 yılda bir yenileme</li>
                                        <li>Güncel fotoğraf</li>
                                        <li>Form I-90 doldurma</li>
                                        <li>Yenileme ücreti ödeme</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="sss" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Sıkça Sorulan Sorular</h2>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        Green Card başvuru süreci ne kadar sürer?
                                    </button>
                                </h3>
                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Başvuru süreci genellikle 6 ay ile 2 yıl arasında değişebilmektedir. Bu süre başvuru tipine ve USCIS'in iş yoğunluğuna göre değişiklik gösterebilir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        Green Card sahibi olarak ne kadar süre yurtdışında kalabilirim?
                                    </button>
                                </h3>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Green Card sahipleri kesintisiz olarak 6 aydan fazla yurtdışında kalmamalıdır. Daha uzun süreli seyahatler için özel izin alınması gerekir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        Green Card başvurusu için hangi belgeler gereklidir?
                                    </button>
                                </h3>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Pasaport, kimlik belgeleri, sağlık raporu, mali belgeler ve başvuru formu gibi belgeler gereklidir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                        Green Card başvurusu reddedilirse ne yapmalıyım?
                                    </button>
                                </h3>
                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Başvurunuz reddedilirse, ret nedenini öğrenip itiraz edebilir veya yeniden başvuru yapabilirsiniz.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                        Green Card ile ABD'de çalışabilir miyim?
                                    </button>
                                </h3>
                                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Evet, Green Card sahipleri ABD'de süresiz olarak çalışabilirler.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                        Green Card başvurusu için yaş sınırı var mı?
                                    </button>
                                </h3>
                                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Green Card başvurusu için 18 yaşından büyük olmanız gerekmektedir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                        Green Card başvurusu için mali yeterlilik şartı nedir?
                                    </button>
                                </h3>
                                <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Başvuru sahiplerinin mali yeterliliklerini kanıtlamaları gerekmektedir. Bu, banka hesap dökümleri ve gelir belgeleri ile yapılabilir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                        F-1 Öğrenci Vizesi ile çalışabilir miyim?
                                    </button>
                                </h3>
                                <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        F-1 vizesi sahipleri kampüs içinde part-time çalışabilirler. OPT ile mezuniyet sonrası 12 ay, STEM bölümleri için 24 ay ek çalışma hakkı vardır.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                                        H-1B vizesi ile eşim çalışabilir mi?
                                    </button>
                                </h3>
                                <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        H-1B vizesi sahiplerinin eşleri H-4 vizesi alabilirler. Bazı durumlarda H-4 vizesi sahipleri çalışma izni alabilirler.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq10">
                                        L-1 vizesi ile ABD'de ne kadar süre kalabilirim?
                                    </button>
                                </h3>
                                <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        L-1A vizesi sahipleri 7 yıla kadar, L-1B vizesi sahipleri ise 5 yıla kadar ABD'de kalabilirler.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="cta-box text-center" data-aos="fade-up">
                        <h3 class="mb-4">Geleceğinize Yön Vermeye Bir Adım Uzaktasınız.</h3>
                        <p class="mb-4">ABD oturum başvuru sürecinizde size yardımcı olalım</p>
                        <a href="https://usadanismani.com/apply-now.php" class="btn btn-light btn-lg">Ücretsiz Ön Görüşme Hizmeti Alın</a>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./pages.js"></script>
 
</body>
</html>