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
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../uploads/usa-visa.png');
        background-size: cover;
        background-position: center 30%;
    }
    </style>
</head>
<body>

<?php include "../includes/header.php"; ?>

    <header class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-white-50">
                    <li class="breadcrumb-item"><a href="https://usadanismani.com/index.php" class="text-white text-decoration-none">Ana Sayfa</a></li>
                    <li class="breadcrumb-item"><a href="https://usadanismani.com/index.php#services" class="text-white text-decoration-none">Hizmetler</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">ABD Vize Danışmanlığı</li>
                </ol>
            </nav>
            <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up">ABD Vize Danışmanlığı</h1>
            <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                Amerika Birleşik Devletleri'nde vize alma süreçleri hakkında detaylı bilgi edinin.
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
                            <a class="nav-link" href="#oturum-turleri">ABD Vize Türleri</a>
                            <a class="nav-link" href="#basvuru-sureci">Başvuru Süreci</a>
                            <a class="nav-link" href="#gerekli-belgeler">Gerekli Belgeler</a>
                            <a class="nav-link" href="#sss">Sıkça Sorulan Sorular</a>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-9">
                    <section id="genel-bilgi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">ABD Vize Türleri ve Detayları</h2>
                        <p class="lead text-muted">Amerika Birleşik Devletleri'ne seyahat etmek, çalışmak, eğitim almak veya yatırım yapmak isteyen bireyler için doğru vize türünü seçmek kritik bir süreçtir. Wall Street Consulting olarak, size en uygun vizeyi belirlemenizde rehberlik ediyor ve başvuru sürecinizi profesyonel bir şekilde yönetiyoruz. ABD vize başvurularınızı eksiksiz ve hatasız tamamlamanız için uzman kadromuzla yanınızdayız.</p>
                        
                        <div class="row g-4 mt-4">
                            <div class="col-md-6">
                                <div class="process-card">
                                    <h5 class="text-primary">ABD Vizesinin Avantajları</h5>
                                    <ul class="custom-list">
                                        <li>ABD’de yasal olarak seyahat, konaklama imkanı sağlar.</li>
                                        <li>Eğitim, iş veya yatırım fırsatlarına erişim sunar.</li>
                                        <li>Değişim programlarına katılma olanağı sağlar.</li>
                                        <li>Uluslararası iş bağlantıları kurmaya yardımcı olur.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="process-card">
                                    <h5 class="text-primary">Dikkat Edilmesi Gerekenler</h5>
                                    <ul class="custom-list">
                                        <li>Başvuru evraklarının eksiksiz ve doğru olması gerekir.</li>
                                        <li>Vize türüne uygun şartları karşıladığınızdan emin olun.</li>
                                        <li>Mülakat sırasında net ve dürüst yanıtlar verin.</li>
                                        <li>Vize süresine ve ihlallerine dikkat edin, aksi takdirde giriş yasağı alabilirsiniz.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="oturum-turleri" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">ABD Vize Türleri</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Turistik ve İş Vizeleri (B1/B2)</h4>
                                <p>B1 Vizesi: İş amaçlı seyahatler için verilir. Konferans, toplantı veya iş anlaşmaları gibi amaçlarla kullanılır.</p>
                                <p>B2 Vizesi: Turistik gezi, tıbbi tedavi veya aile ziyareti gibi nedenlerle alınır.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Çalışma Vizeleri</h4>
                                <p>H-1B Vizesi: ABD’de özel bir alanda uzmanlık gerektiren işler için verilen çalışma vizesidir.</p>
<p>H-2A ve H-2B Vizeleri: Tarım ve tarım dışı sezonluk işçiler için düzenlenen vizelerdir.</p>
<p>L-1 Vizesi: Çok uluslu şirketlerin çalışanlarını ABD ofislerine transfer etmeleri için kullanılır.</p>
<p>O-1 Vizesi: Bilim, sanat, eğitim, iş dünyası veya spor alanlarında olağanüstü yeteneklere sahip kişiler için verilir.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Öğrenci ve Değişim Programı Vizeleri</h4>
                                <p>F-1 Vizesi: ABD'deki akademik programlara veya dil okullarına katılacak öğrenciler için geçerlidir.</p>
<p>M-1 Vizesi: Mesleki ve teknik eğitim almak isteyenler için düzenlenen vizedir.</p>
<p>J-1 Vizesi: Kültürel değişim programları, stajlar veya araştırma programları için verilir.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Yatırımcı ve İş İnsanı Vizeleri</h4>
                                <p>E-1 Vizesi: ABD ile ticaret yapan ülkelerin vatandaşları için tasarlanmış ticaret vizesidir.</p>
                                <p>E-2 Vizesi: ABD’ye yatırım yaparak iş kurmak isteyen girişimcilere yöneliktir.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Aile ve Göçmenlik Vizeleri</h4>
                                <p>K-1 Vizesi: ABD vatandaşıyla nişanlı olan kişiler için düzenlenen vizedir.</p>
<p>CR-1/IR-1 Vizeleri: ABD vatandaşı eşleri için verilen göçmen vizeleridir.</p>
<p>F2A/F2B Vizeleri: ABD’de kalıcı oturum iznine sahip kişilerin aile üyeleri için düzenlenir.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Yeşil Kart ve Çeşitlilik Vizesi (DV Lottery)</h4>
                                <p>ABD’de sürekli oturum hakkı sağlayan Yeşil Kart başvurularınızı profesyonel danışmanlık hizmetimizle yönetiyoruz. Ayrıca, Diversity Visa Lottery (Çeşitlilik Vize Programı) hakkında detaylı bilgi alabilirsiniz.</p>
                            </div>
                        </div>
                    </section>

                    <section id="green-card" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Green Card (Yeşil Kart)</h2>
                        <p class="lead text-muted mb-4">Green Card başvuru dönemlerinde, başvuru sürecinde profesyonel danışmanlık, evrak hazırlığı ve takip hizmeti sunuyoruz. Green Card sahibi olarak ABD’de sürekli oturum hakkı elde edebilir, çalışabilir ve yatırım yapabilirsiniz.</p>
                        
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

                                        <section id="basvuru-sureci" class="content-card" data-aos="fade-up">
                                            <h2 class="mb-4">Başvuru Süreci</h2>
                                            <div class="timeline">
                                                <div class="timeline-item">
                                                    <h5>1. Ön Değerlendirme</h5>
                                                    <p>Başvuru şartlarının ve uygun vize kategorisinin belirlenmesi</p>
                                                </div>
                                                <div class="timeline-item">
                                                    <h5>2. Evrak Hazırlığı</h5>
                                                    <p>Gerekli tüm belgelerin toplanması ve tercümesi</p>
                                                </div>
                                                <div class="timeline-item">
                                                    <h5>3. Başvuru Yapılması</h5>
                                                    <p>DS-160 formunun doldurulması ve başvuru ücretinin ödenmesi</p>
                                                </div>
                                                <div class="timeline-item">
                                                    <h5>4. Randevu ve Mülakat</h5>
                                                    <p>Konsolosluk randevusunun alınması ve mülakatın gerçekleştirilmesi</p>
                                                </div>
                                                <div class="timeline-item">
                                                    <h5>5. Sonuç</h5>
                                                    <p>Vize başvurusunun onaylanması durumunda pasaportun teslim alınması</p>
                                                </div>
                                            </div>
                                        </section>

                                        <section id="gerekli-belgeler" class="content-card" data-aos="fade-up">
                                            <h2 class="mb-4">Gerekli Belgeler</h2>
                                            <div class="document-list">
                                                <div class="document-item">
                                                    <div class="document-icon">
                                                        <i class="bi bi-passport text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1">Pasaport</h5>
                                                        <p class="mb-0 text-muted">Geçerli pasaport ve eski pasaportlar</p>
                                                    </div>
                                                </div>
                                                <div class="document-item">
                                                    <div class="document-icon">
                                                        <i class="bi bi-file-earmark-text text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1">Kimlik Belgeleri</h5>
                                                        <p class="mb-0 text-muted">Nüfus cüzdanı, doğum belgesi ve tercümeleri</p>
                                                    </div>
                                                </div>
                                                <div class="document-item">
                                                    <div class="document-icon">
                                                        <i class="bi bi-file-medical text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1">Sağlık Raporu</h5>
                                                        <p class="mb-0 text-muted">Onaylı sağlık raporu ve aşı kayıtları</p>
                                                    </div>
                                                </div>
                                                <div class="document-item">
                                                    <div class="document-icon">
                                                        <i class="bi bi-cash text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1">Mali Belgeler</h5>
                                                        <p class="mb-0 text-muted">Banka hesap dökümleri ve gelir belgeleri</p>
                                                    </div>
                                                </div>
                                                <div class="document-item">
                                                    <div class="document-icon">
                                                        <i class="bi bi-file-earmark-text text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1">Eğitim Belgeleri</h5>
                                                        <p class="mb-0 text-muted">Diplomalar, transkriptler ve sertifikalar</p>
                                                    </div>
                                                </div>
                                                <div class="document-item">
                                                    <div class="document-icon">
                                                        <i class="bi bi-briefcase text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1">İş Belgeleri</h5>
                                                        <p class="mb-0 text-muted">Çalışma belgeleri, iş sözleşmeleri ve referans mektupları</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                    <section id="sss" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Sıkça Sorulan Sorular</h2>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Hangi vize türü bana uygun?
                                    </button>
                                </h3>
                                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    Vize türünüz, ABD'ye gitme amacınıza bağlıdır. Turistik, iş, çalışma, eğitim veya yatırım amaçlı vize seçenekleri arasından size en uygun olanı seçmek için danışmanlık hizmetimizden faydalanabilirsiniz.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Vize başvurusu için hangi belgeler gereklidir?
                                    </button>
                                </h3>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    Gerekli belgeler, başvurulan vize türüne göre değişir. Genel olarak pasaport, DS-160 formu, fotoğraf, banka hesap dökümü, davet mektubu (varsa) ve destekleyici evraklar gereklidir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    ABD vize başvurusu ne kadar sürede sonuçlanır?
                                    </button>
                                </h3>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    Başvuru yoğunluğuna ve vize türüne göre değişmekle birlikte, genellikle birkaç hafta içinde sonuçlanır. Ancak bazı durumlarda ek kontroller nedeniyle süreç uzayabilir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Vize mülakatında nelere dikkat etmeliyim?
                                    </button>
                                </h3>
                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    Kendinizden emin ve net cevaplar vermeli, seyahat amacınızı açıkça ifade etmelisiniz. Belgelerinizi eksiksiz hazırlayarak mülakata gitmek sürecin olumlu sonuçlanmasına katkı sağlar.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    Vize reddi alırsam ne yapmalıyım?
                                    </button>
                                </h3>
                                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    Vize reddi almanız durumunda, reddin nedenine bağlı olarak tekrar başvuru yapabilir veya itiraz sürecini başlatabilirsiniz. Uzman ekibimiz, vize reddi sonrası atılacak adımlarda size rehberlik eder.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                    Vize başvurumun kabul edilme şansını nasıl artırabilirim?
                                    </button>
                                </h3>
                                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    Belgelerinizi eksiksiz ve doğru şekilde hazırlamak, mülakatta net ve dürüst cevaplar vermek, seyahat amacınızı açıkça ifade etmek başvurunuzun kabul edilme şansını artırır.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                    Vize başvurum reddedildikten sonra ne kadar süre içinde tekrar başvurabilirim?
                                    </button>
                                </h3>
                                <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    Vize başvurunuz reddedildikten sonra, reddin nedenine bağlı olarak hemen tekrar başvuru yapabilirsiniz. Ancak, reddedilme nedenlerini gözden geçirip gerekli düzeltmeleri yapmanız önemlidir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                    ABD vizesi aldıktan sonra nelere dikkat etmeliyim?
                                    </button>
                                </h3>
                                <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    Vize süresine ve şartlarına dikkat etmeli, vize ihlali yapmamalısınız. ABD'de kalış sürenizi aşmamak ve vize türünüze uygun faaliyetlerde bulunmak önemlidir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                                    ABD vizesi ile başka ülkelere seyahat edebilir miyim?
                                    </button>
                                </h3>
                                <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                    ABD vizesi, yalnızca ABD'ye giriş izni sağlar. Başka ülkelere seyahat etmek için o ülkelerin vize gereksinimlerini kontrol etmeli ve gerekli vizeleri almalısınız.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="cta-box text-center" data-aos="fade-up">
                        <h3 class="mb-4">ABD'de Yeni Bir Hayata Başlayın.</h3>
                        <p class="mb-4">ABD vize danışmanlık sürecinizde size yardımcı olalım</p>
                        <a href="https://usadanismani.com/apply-now.php" class="btn btn-light btn-lg">Ücretsiz Ön Görüşme Hizmeti Alın</a>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./pages.js"></script>
</body>
</html>