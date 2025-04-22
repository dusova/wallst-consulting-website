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
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../uploads/abroad-education.png');
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
                    <li class="breadcrumb-item active text-white" aria-current="page">Yurtdışı Eğitim</li>
                </ol>
            </nav>
            <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up">Yurtdışı Eğitim</h1>
            <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                Amerika'da eğitim fırsatları ve başvuru süreçleri hakkında detaylı rehber
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
                            <a class="nav-link" href="#egitim-turleri">Eğitim Türleri</a>
                            <a class="nav-link" href="#vize-sureci">Öğrenci Vizesi</a>
                            <a class="nav-link" href="#egitim-maliyetleri">Eğitim Maliyetleri</a>
                            <a class="nav-link" href="#yasam-kosullari">Yaşam Koşulları</a>
                            <a class="nav-link" href="#basvuru-sureci">Başvuru Süreci</a>
                            <a class="nav-link" href="#sss">Sıkça Sorulan Sorular</a>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-9">
                    <section id="genel-bilgi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">ABD'de Eğitim Fırsatları</h2>
                        <p class="lead text-muted">Amerika Birleşik Devletleri, dünya çapında tanınan üniversiteleri ve çeşitli eğitim programlarıyla uluslararası öğrencilere benzersiz fırsatlar sunmaktadır.</p>
                        
                        <div class="row g-4 mt-4">
                            <div class="col-md-6">
                                <div class="process-card">
                                    <h5 class="text-primary">Eğitim Sistemi Avantajları</h5>
                                    <ul class="custom-list">
                                        <li>Dünya sıralamasında üst düzey üniversiteler</li>
                                        <li>Çeşitli burs ve finansman imkanları</li>
                                        <li>Esnek ve öğrenci odaklı eğitim sistemi</li>
                                        <li>Çok kültürlü kampüs ortamı</li>
                                        <li>Staj ve kariyer fırsatları</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-card">
                                    <h5 class="text-primary">Eğitim Sonrası İmkanlar</h5>
                                    <ul class="custom-list">
                                        <li>OPT ile 12 ay çalışma izni</li>
                                        <li>STEM bölümleri için 24 ay ek süre</li>
                                        <li>Networking fırsatları</li>
                                        <li>Global şirketlerde kariyer imkanı</li>
                                        <li>Akademik kariyer olanakları</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="egitim-turleri" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Eğitim Programları</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Lisans Eğitimi (Undergraduate)</h4>
                                <p>4 yıllık lisans programları çeşitli alanlarda eğitim imkanı sunar. İlk iki yıl genel eğitim, son iki yıl uzmanlık dersleri alınır.</p>
                                <ul class="custom-list">
                                    <li>Associate Degree (2 yıl)</li>
                                    <li>Bachelor's Degree (4 yıl)</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h4>Yüksek Lisans (Graduate)</h4>
                                <p>Lisans sonrası uzmanlaşma sağlayan programlardır.</p>
                                <ul class="custom-list">
                                    <li>Master's Degree (1-2 yıl)</li>
                                    <li>MBA Programları</li>
                                    <li>Doktora Programları (PhD)</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h4>Sertifika Programları</h4>
                                <p>Kısa süreli uzmanlık ve dil eğitimi programları.</p>
                                <ul class="custom-list">
                                    <li>Dil Okulları (ESL)</li>
                                    <li>Mesleki Sertifikalar</li>
                                    <li>Yaz Okulları</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section id="vize-sureci" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Öğrenci Vizesi (F-1)</h2>
                        <p class="lead text-muted mb-4">F-1 vizesi, ABD'de tam zamanlı eğitim görmek isteyen uluslararası öğrencilere verilen vize türüdür.</p>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="requirement-card">
                                    <h5>Vize Şartları</h5>
                                    <ul class="custom-list">
                                        <li>Kabul mektubu (I-20 formu)</li>
                                        <li>Mali yeterlilik belgesi</li>
                                        <li>SEVIS ücreti ödemesi</li>
                                        <li>Pasaport (en az 6 ay geçerli)</li>
                                        <li>İngilizce yeterlilik (TOEFL/IELTS)</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="requirement-card">
                                    <h5>Çalışma İzinleri</h5>
                                    <ul class="custom-list">
                                        <li>Kampüs içi part-time çalışma</li>
                                        <li>CPT (Curricular Practical Training)</li>
                                        <li>OPT (Optional Practical Training)</li>
                                        <li>STEM OPT Extension</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="egitim-maliyetleri" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Eğitim Maliyetleri</h2>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="cost-card">
                                    <h5>Yıllık Ortalama Maliyetler</h5>
                                    <ul class="custom-list">
                                        <li>Devlet Üniversiteleri: $20,000 - $35,000</li>
                                        <li>Özel Üniversiteler: $35,000 - $60,000</li>
                                        <li>Yaşam Giderleri: $12,000 - $20,000</li>
                                        <li>Kitap ve Materyal: $1,000 - $2,000</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cost-card">
                                    <h5>Finansman Kaynakları</h5>
                                    <ul class="custom-list">
                                        <li>Merit-based Burslar</li>
                                        <li>Araştırma Asistanlığı</li>
                                        <li>Teaching Asistanlığı</li>
                                        <li>Öğrenci Kredileri</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="yasam-kosullari" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Yaşam Koşulları</h2>
                        <div class="living-info">
                            <div class="info-item">
                                <h5>Barınma Seçenekleri</h5>
                                <ul class="custom-list">
                                    <li>Kampüs Yurtları ($10,000-15,000/yıl)</li>
                                    <li>Öğrenci Apartmanları ($8,000-12,000/yıl)</li>
                                    <li>Ev Paylaşımı ($6,000-10,000/yıl)</li>
                                </ul>
                            </div>
                            <div class="info-item">
                                <h5>Sağlık Sigortası</h5>
                                <ul class="custom-list">
                                    <li>Zorunlu öğrenci sigortası</li>
                                    <li>Yıllık ortalama maliyet: $1,500-2,500</li>
                                </ul>
                            </div>
                            <div class="info-item">
                                <h5>Ulaşım</h5>
                                <ul class="custom-list">
                                    <li>Öğrenci transit kartları</li>
                                    <li>Kampüs shuttle servisleri</li>
                                    <li>Bisiklet ve scooter paylaşımı</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section id="basvuru-sureci" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Başvuru Süreci</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h5>1. Üniversite Seçimi</h5>
                                <p>Akademik program, konum ve maliyet karşılaştırması yapılarak uygun üniversitelerin belirlenmesi.</p>
                            </div>
                            <div class="timeline-item">
                                <h5>2. Test Hazırlığı ve Sınavlar</h5>
                                <ul class="custom-list">
                                <li>TOEFL/IELTS: İngilizce yeterlilik</li>
                                <li>SAT/ACT: Lisans başvuruları için</li>
                                <li>GRE/GMAT: Yüksek lisans başvuruları için</li>
                                </ul>
                                </div>
                                <div class="timeline-item">
                                <h5>3. Başvuru Belgeleri</h5>
                                <ul class="custom-list">
                                <li>Transkript ve diplomalar</li>
                                <li>Niyet mektubu (Statement of Purpose)</li>
                                <li>Tavsiye mektupları</li>
                                <li>CV/Özgeçmiş</li>
                                <li>Portföy (gerekli bölümler için)</li>
                                </ul>
                                </div>
                                <div class="timeline-item">
                                <h5>4. Finansal Belgeler</h5>
                                <ul class="custom-list">
                                <li>Banka hesap dökümleri</li>
                                <li>Sponsorluk beyanları</li>
                                <li>Burs başvuruları</li>
                                </ul>
                                </div>
                                <div class="timeline-item">
                                <h5>5. Vize Başvurusu</h5>
                                <ul class="custom-list">
                                <li>I-20 formu temini</li>
                                <li>SEVIS kaydı ve ücret ödemesi</li>
                                <li>DS-160 formu doldurulması</li>
                                <li>Vize mülakatı</li>
                                </ul>
                                </div>
                                </div>
                                </section>
    <section id="sss" class="content-card" data-aos="fade-up">
        <h2 class="mb-4">Sıkça Sorulan Sorular</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        Hangi test puanları gerekli?
                    </button>
                </h3>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>Genel olarak şu puanlar kabul için yeterli görülmektedir:</p>
                        <ul>
                            <li>TOEFL: 80-100 arası (okula göre değişir)</li>
                            <li>IELTS: 6.5-7.0 arası</li>
                            <li>SAT: 1200+ (seçkin okullar için 1400+)</li>
                            <li>GRE: 300+ (bölüme göre değişir)</li>
                        </ul>
                    </div>
                </div>
            </div>
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                    Part-time çalışma hakları nelerdir?
                </button>
            </h3>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    F-1 vizesi ile öğrenciler:
                    <ul>
                        <li>Kampüs içinde haftada 20 saate kadar çalışabilir</li>
                        <li>Tatillerde full-time çalışabilir</li>
                        <li>CPT ile staj yapabilir</li>
                        <li>Mezuniyet sonrası OPT ile 12 ay çalışabilir</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                    Burs imkanları nelerdir?
                </button>
            </h3>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <ul>
                        <li>Merit-based burslar (akademik başarıya göre)</li>
                        <li>Need-based burslar (ihtiyaca göre)</li>
                        <li>Spor bursları</li>
                        <li>Departman bursları</li>
                        <li>Araştırma ve teaching asistanlığı</li>
                        <li>Fulbright bursları</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                    Konaklama seçenekleri nelerdir?
                </button>
            </h3>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <ul>
                        <li>Kampüs yurtları</li>
                        <li>Öğrenci apartmanları</li>
                        <li>Ev paylaşımı</li>
                        <li>Özel yurtlar</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                    Sağlık sigortası zorunlu mu?
                </button>
            </h3>
            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Evet, ABD'de eğitim gören uluslararası öğrenciler için sağlık sigortası zorunludur. Üniversiteler genellikle kendi sağlık sigortası planlarını sunar.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                    Eğitim maliyetleri nelerdir?
                </button>
            </h3>
            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <ul>
                        <li>Devlet Üniversiteleri: $20,000 - $35,000</li>
                        <li>Özel Üniversiteler: $35,000 - $60,000</li>
                        <li>Yaşam Giderleri: $12,000 - $20,000</li>
                        <li>Kitap ve Materyal: $1,000 - $2,000</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                    Vize başvuru süreci nasıl işler?
                </button>
            </h3>
            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <ul>
                        <li>I-20 formu temini</li>
                        <li>SEVIS kaydı ve ücret ödemesi</li>
                        <li>DS-160 formu doldurulması</li>
                        <li>Vize mülakatı</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                    Eğitim sonrası çalışma imkanları nelerdir?
                </button>
            </h3>
            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <ul>
                        <li>OPT ile 12 ay çalışma izni</li>
                        <li>STEM bölümleri için 24 ay ek süre</li>
                        <li>Networking fırsatları</li>
                        <li>Global şirketlerde kariyer imkanı</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

                <div class="cta-box text-center" data-aos="fade-up">
                    <h3 class="mb-4">Hayalinizdeki Eğitime Bir Adım Uzaktasınız</h3>
                    <p class="mb-4">ABD'de eğitim başvuru sürecinizde uzman danışmanlarımız yanınızda</p>
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