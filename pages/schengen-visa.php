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
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../uploads/schengen-visa.png');
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
                    <li class="breadcrumb-item active text-white" aria-current="page">Avrupa Vizesi ve Oturum</li>
                </ol>
            </nav>
            <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up">Avrupa Vizesi ve Oturum</h1>
            <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                Schengen vizesi, Golden Visa ve AB oturum izni süreçleri hakkında kapsamlı rehber
            </p>
        </div>
    </header>

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <nav class="sidebar-nav" id="sidebarNav">
                        <div class="nav flex-column">
                            <a class="nav-link active" href="#schengen">Schengen Vizesi</a>
                            <a class="nav-link" href="#golden-visa">Golden Visa</a>
                            <a class="nav-link" href="#ab-oturum">AB'de Oturum</a>
                            <a class="nav-link" href="#vatandaslik">AB Vatandaşlığı</a>
                            <a class="nav-link" href="#basvuru-sureci">Başvuru Süreci</a>
                            <a class="nav-link" href="#sss">Sıkça Sorulan Sorular</a>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-9">
                    <section id="schengen" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Schengen Vizesi</h2>
                        <p class="lead text-muted">Schengen vizesi, 27 Avrupa ülkesinde serbest dolaşım imkanı sağlayan ortak vize sistemidir.</p>
                        
                        <div class="row g-4 mt-4">
                            <div class="col-md-6">
                                <div class="process-card">
                                    <h5 class="text-primary">Vize Türleri</h5>
                                    <ul class="custom-list">
                                        <li>Kısa süreli (C tipi) - 90 güne kadar</li>
                                        <li>Uzun süreli (D tipi) - 90 günden fazla</li>
                                        <li>Transit vize (A tipi)</li>
                                        <li>Sınırlı bölgesel geçerlilik</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-card">
                                    <h5 class="text-primary">Başvuru Şartları</h5>
                                    <ul class="custom-list">
                                        <li>Geçerli pasaport</li>
                                        <li>Seyahat sigortası</li>
                                        <li>Mali yeterlilik belgesi</li>
                                        <li>Konaklama rezervasyonu</li>
                                        <li>Uçak bileti rezervasyonu</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="info-box mt-4">
                            <h5>Schengen Ülkeleri</h5>
                            <p>Almanya, Fransa, İtalya, İspanya, Hollanda, Belçika, Lüksemburg, Avusturya, İsveç, Danimarka, Finlandiya, Yunanistan, Portekiz, Çek Cumhuriyeti, Macaristan, Polonya, Slovakya, Slovenya, Estonya, Letonya, Litvanya, Malta ve diğer üye ülkeler.</p>
                        </div>
                    </section>

                    <section id="golden-visa" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Golden Visa Programları</h2>
                        <p class="lead text-muted mb-4">Yatırım yoluyla oturum ve vatandaşlık imkanı sağlayan programlar.</p>

                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Portekiz Golden Visa</h4>
                                <ul class="custom-list">
                                    <li>Minimum 280.000€ gayrimenkul yatırımı</li>
                                    <li>500.000€ yatırım fonu seçeneği</li>
                                    <li>5 yıl sonra vatandaşlık hakkı</li>
                                    <li>Yılda 7 gün ikamet şartı</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h4>İspanya Golden Visa</h4>
                                <ul class="custom-list">
                                    <li>500.000€ gayrimenkul yatırımı</li>
                                    <li>2 Milyon€ devlet tahvili seçeneği</li>
                                    <li>10 yıl sonra vatandaşlık hakkı</li>
                                    <li>Aile birleşimi imkanı</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h4>Yunanistan Golden Visa</h4>
                                <ul class="custom-list">
                                    <li>250.000€ gayrimenkul yatırımı</li>
                                    <li>Süresiz oturum hakkı</li>
                                    <li>7 yıl sonra vatandaşlık imkanı</li>
                                    <li>Minimum ikamet şartı yok</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section id="ab-oturum" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">AB'de Oturum İzni</h2>
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="requirement-card">
                                    <h5>Oturum İzni Türleri</h5>
                                    <ul class="custom-list">
                                        <li>Çalışma izni bazlı oturum</li>
                                        <li>Eğitim bazlı oturum</li>
                                        <li>Aile birleşimi</li>
                                        <li>Serbest meslek oturumu</li>
                                        <li>Yatırımcı oturumu</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="requirement-card">
                                    <h5>Genel Şartlar</h5>
                                    <ul class="custom-list">
                                        <li>Düzenli gelir</li>
                                        <li>Sağlık sigortası</li>
                                        <li>Temiz sabıka kaydı</li>
                                        <li>Dil yeterliliği (ülkeye göre)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="requirement-card">
                            <h5>Süre ve Yenileme</h5>
                            <ul class="custom-list">
                                <li>İlk oturum: 1-2 yıl</li>
                                <li>Uzatma: 2-3 yıl</li>
                                <li>Sürekli oturum: 5 yıl sonra</li>
                                <li>AB Uzun Süreli İkamet: 5 yıl yasal ikamet sonrası</li>
                            </ul>
                        </div>
</div>
                    </section>

                    <section id="vatandaslik" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">AB Vatandaşlığı</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h5>Genel Şartlar</h5>
                                <ul class="custom-list">
                                    <li>Minimum ikamet süresi (ülkeye göre 5-10 yıl)</li>
                                    <li>Dil yeterliliği</li>
                                    <li>Entegrasyon şartları</li>
                                    <li>Ekonomik yeterlilik</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h5>Hızlandırılmış Vatandaşlık</h5>
                                <ul class="custom-list">
                                    <li>Evlilik yoluyla (2-3 yıl)</li>
                                    <li>Yatırım programları (Malta, Kıbrıs)</li>
                                    <li>İstisnai katkılar</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section id="basvuru-sureci" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Başvuru Süreci</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h5>1. Ön Değerlendirme</h5>
                                <ul class="custom-list">
                                    <li>Hedef ülke seçimi</li>
                                    <li>Program belirleme</li>
                                    <li>Şartların kontrolü</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h5>2. Belge Hazırlığı</h5>
                                <ul class="custom-list">
                                    <li>Pasaport ve kimlik</li>
                                    <li>Mali belgeler</li>
                                    <li>Adli sicil kaydı</li>
                                    <li>Eğitim/iş belgeleri</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h5>3. Başvuru</h5>
                                <ul class="custom-list">
                                    <li>Form doldurma</li>
                                    <li>Randevu alma</li>
                                    <li>Biyometrik veriler</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h5>4. Değerlendirme</h5>
                                <ul class="custom-list">
                                    <li>Belge incelemesi</li>
                                    <li>Güvenlik kontrolü</li>
                                    <li>Mülakat (gerekirse)</li>
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
                                        Schengen vizesi ile ne kadar kalabilirim?
                                    </button>
                                </h3>
                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Schengen vizesi ile 180 gün içinde maksimum 90 gün kalabilirsiniz. Bu süre tek seferde kullanılabileceği gibi, birden fazla giriş-çıkış yapılarak da kullanılabilir. Çok girişli vizelerde, vize geçerlilik süresi boyunca bu 90/180 kuralına uymak şartıyla seyahat edebilirsiniz.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        Golden Visa programları arasındaki farklar nelerdir?
                                    </button>
                                </h3>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Golden Visa programları ülkeden ülkeye farklılık gösterir:
                                        <ul>
                                            <li>Minimum yatırım tutarları (250.000€ - 2.000.000€ arası)</li>
                                            <li>Vatandaşlığa geçiş süreleri (5-10 yıl)</li>
                                            <li>İkamet şartları (bazı ülkeler minimum süre şartı koyar)</li>
                                            <li>Yatırım seçenekleri (gayrimenkul, devlet tahvili, şirket yatırımı)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        AB Mavi Kart nedir?
                                    </button>
                                </h3>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        AB Mavi Kart, yüksek vasıflı çalışanlar için özel bir oturum iznidir. Başlıca özellikleri:
                                        <ul>
                                            <li>Yüksek öğrenim veya 5 yıl profesyonel deneyim şartı</li>
                                            <li>Minimum maaş eşiği (ülke ortalamasının 1.5 katı)</li>
                                            <li>AB içinde iş değiştirme kolaylığı</li>
                                            <li>Aile birleşimi hakları</li>
                                            <li>5 yıl sonra sürekli oturum hakkı</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                        Vatandaşlık başvurusu için dil şartı var mı?
                                    </button>
                                </h3>
                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Evet, çoğu AB ülkesi vatandaşlık için dil şartı arar:
                                        <ul>
                                            <li>Almanya: B1 seviyesi Almanca</li>
                                            <li>Fransa: B1 seviyesi Fransızca</li>
                                            <li>İspanya: A2 seviyesi İspanyolca</li>
                                            <li>Portekiz: A2 seviyesi Portekizce</li>
                                            <li>İtalya: B1 seviyesi İtalyanca</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                        Schengen vizesi başvurusu için gerekli belgeler nelerdir?
                                    </button>
                                </h3>
                                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Schengen vizesi başvurusu için gerekli belgeler:
                                        <ul>
                                            <li>Geçerli pasaport</li>
                                            <li>Vize başvuru formu</li>
                                            <li>Biyometrik fotoğraf</li>
                                            <li>Seyahat sigortası</li>
                                            <li>Uçak bileti rezervasyonu</li>
                                            <li>Konaklama rezervasyonu</li>
                                            <li>Mali yeterlilik belgesi</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                        Golden Visa ile aile üyelerim de oturum alabilir mi?
                                    </button>
                                </h3>
                                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Evet, Golden Visa programları genellikle aile birleşimi imkanı sunar. Eşiniz ve 18 yaş altı çocuklarınız da oturum izni alabilir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                        AB'de oturum izni aldıktan sonra çalışabilir miyim?
                                    </button>
                                </h3>
                                <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Evet, AB'de oturum izni aldıktan sonra çalışma izni de alabilirsiniz. Çalışma izni türü ve şartları ülkeye göre değişiklik gösterebilir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                        Schengen vizesi reddedilirse ne yapmalıyım?
                                    </button>
                                </h3>
                                <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Schengen vizesi reddedilirse, ret nedenini belirten bir mektup alırsınız. Bu mektuba göre eksik veya hatalı belgeleri düzelterek yeniden başvuru yapabilirsiniz. Ayrıca, ret kararına itiraz etme hakkınız da vardır.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

<div class="cta-box text-center" data-aos="fade-up">
                    <h3 class="mb-4">Avrupa'da Yeni Bir Hayata Başlayın</h3>
                    <p class="mb-4">Vize ve oturum başvuru sürecinizde uzman danışmanlarımız yanınızda</p>
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