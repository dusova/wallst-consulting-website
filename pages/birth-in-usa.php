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
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../uploads/birth-in-usa.png');
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
                    <li class="breadcrumb-item active text-white" aria-current="page">ABD'de Doğum Süreci</li>
                </ol>
            </nav>
            <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up">ABD'de Doğum Süreci</h1>
            <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                Amerika Birleşik Devletleri'nde doğum süreçleri hakkında detaylı bilgi edinin.
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
                            <a class="nav-link" href="#dogum-oncesi">Doğum Öncesi Süreç</a>
                            <a class="nav-link" href="#vize-sureci">Vize ve Seyahat Süreci</a>
                            <a class="nav-link" href="#dogum-sureci">Doğum Süreci</a>
                            <a class="nav-link" href="#dogum-sonrasi">Doğum Sonrası Hizmetler</a>
                            <a class="nav-link" href="#basvuru-sureci">Başvuru Süreci</a>
                            <a class="nav-link" href="#gerekli-belgeler">Gerekli Belgeler</a>
                            <a class="nav-link" href="#sss">Sıkça Sorulan Sorular</a>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-9">
                    <section id="genel-bilgi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Amerika'da Doğumun Avantajları</h2>
                        <p class="lead text-muted">Amerika Birleşik Devletleri'nde kalıcı oturum hakkı (Green Card), yabancı ülke vatandaşlarına ABD'de süresiz yaşama ve çalışma imkanı sağlar.</p>
                        
                        <div class="row g-4 mt-4">
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">Vatandaşlık Hakları</h5>
                                    <ul class="custom-list">
                                        <li>ABD'de dünyaya gelen her bebek otomatik olarak Amerikan vatandaşlığı almaktadır. Amerikan vatandaşı olan çocuk, 21 yaşına geldiğinde ebeveynlerine Green Card başvuru hakkı kazanmaktadır. Çocuğunuz ileride ABD'deki tüm eğitim ve iş fırsatlarından vatandaş olarak yararlanabilmektedir. Amerika'da doğan bebeğiniz, dünyanın en güçlü pasaportlarından birine sahip olmaktadır.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">Eğitim İmkanları</h5>
                                    <ul class="custom-list">
                                        <li>Amerikan vatandaşı olan çocuklar, devlet okullarında ücretsiz eğitim hakkına sahip olmaktadır. Üniversite eğitiminde vatandaşlara özel burs ve finansman imkanları sunulmaktadır. Amerikan eğitim sistemi, dünya standartlarında bir eğitim fırsatı sağlamaktadır. Çocuğunuz ileride Amerikan üniversitelerinde yerel öğrenci statüsünde okuyabilmektedir.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="dogum-oncesi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Doğum Öncesi Süreç</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Hastane Seçimi</h4>
                                <p>Washington DC, Alexandria, New York, Las Vegas ve Houston şehirlerinde anlaşmalı olduğumuz hastanelerle her bütçeye uygun şekilde hastane seçimi yapılabilmekteyiz. Bu süreçte danışanımızın mali isteklerine göre seçimler yapılmaktadır. Siz ABD'ye gelmeden önce hastaneniz doğum ayınıza göre ayarlanıp, yeriniz ayırtılır.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Doktor Seçimi</h4>
                                <p>Uzman doktorlar, gebelik sürecini başından sonuna kadar takip etmektedir. Seçeceğiniz şehirin uygunluğuna göre Türkçe bilen doktorlar ile çalışma imkanımız vardır. Doktor kontollerinde Wall Street Consulting ailesi olarak bu süreçte sizi yalnız bırakmıyor, her zaman yanınızda oluyoruz.
                                </p>
                            </div>
                            <div class="timeline-item">
                                <h4>Konaklama Düzenlemeleri</h4>
                                <p>Hastaneye yakın lokasyonlarda konforlu konaklama seçenekleri sunulmaktadır. Aile bireyleri için ek yatak imkanları sağlanmaktadır. Daire ve apart otel seçenekleri mevcuttur. Ulaşım ve transfer hizmetleri organize edilmektedir. Her bütçeye göre konaklama seçeneklerimiz mevcuttur.</p>
                                <a href="#portfoy"><i class="bi bi-arrow-right"></i> Konaklama Portföyümüz için Tıklayın</a>
                            </div>
                            <div class="timeline-item">
                                <h4>Araç Kiralama/Kısa Süreli Geri Alım Garantili Satın Alma</h4>
                                <p>ABD'de kaldığınız süre boyunca ulaşım ihtiyaçlarınızı karşılamak için araç kiralama veya kısa süreli araç satın alma seçenekleri sunulmaktadır. İhtiyaçlarınıza ve bütçenize uygun araç seçenekleri mevcuttur. Araç kiralama işlemleri, sigorta ve diğer gerekli düzenlemeler tarafımızdan organize edilmektedir. Ayrıca, araç satın alma işlemlerinde de danışmanlık hizmeti verilmektedir.</p>
                                <a href="#portfoy"><i class="bi bi-arrow-right"></i> Araç Kiralama/Satın Alma Portföyümüz için Tıklayın</a>
                            </div>
                        </div>
                    </section>
                    <section id="vize-sureci" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Vize ve Seyahat Süreci</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Vize Başvurusu</h4>
                                <p>Eğer ABD vizeniz yok ise doğuma yönelik vize işlemlerinizi profesyonel şekilde yapıyoruz. Gerekli tüm belgeler eksiksiz olarak sunulmaktadır. Vize görüşmesi için kapsamlı danışmanlık verilmektedir.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Seyahat Planlaması</h4>
                                <p>Hamilelik dönemine uygun uçuş planlaması yapılmaktadır. Havayollarının hamile yolcu politikaları değerlendirilmektedir. Seyahat sigortası düzenlemeleri yapılmaktadır. Transfer ve ulaşım hizmetleri organize edilmektedir.</p>
                            </div>
                        </div>
                    </section>

                    <section id="dogum-sureci" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Doğum Süreci</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Hastane Prosedürleri</h4>
                                <p>Hastaneye yatış işlemleri önceden planlanmaktadır. Doğum yöntemi ve anestezi seçenekleri değerlendirilmektedir. Özel oda imkanları sunulmaktadır. Türkçe tercüman desteği sağlanmaktadır.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Evrak İşlemleri</h4>
                                <p>Doğum belgesi ve apostil işlemleri takip edilmektedir. Amerikan pasaportu başvurusu yapılmaktadır. Türk nüfusuna kayıt işlemleri yürütülmektedir. Gerekli tüm resmi belgeler temin edilmektedir.</p>
                            </div>
                        </div>
                    </section>

                    <section id="dogum-sonrasi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Doğum Sonrası Hizmetler</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Bebek Bakımı</h4>
                                <p>Yenidoğan kontrollerinin takibi yapılmaktadır. Emzirme danışmanlığı hizmeti sunulmaktadır. Bebek bakımı eğitimi verilmektedir. Gerekli aşılar ve kontroller planlanmaktadır.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Eve Dönüş Süreci</h4>
                                <p>Bebekle seyahat için gerekli düzenlemeler yapılmaktadır. Uçuş için uygun zaman belirlenmektedir. Özel transfer hizmetleri sağlanmaktadır. Türkiye'deki takip süreci planlanmaktadır.</p>
                            </div>
                        </div>
                    </section>

                    <section id="genel-bilgi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Doğum Paketleri</h2>
                        <p class="lead text-muted">Amerika Birleşik Devletleri'nde doğum yapmak, çocuğunuza ve ailenize birçok avantaj sunar. Doğum paketlerimiz hakkında daha fazla bilgi edinin.</p>
                        
                        <div class="row g-4 mt-4">
                            <div class="col-md-4">
                                <div class="process-card">
                                    <h5 class="text-primary">Bronz Paket</h5>
                                    <ul class="custom-list">
                                        <li>Hastane ve doktor seçimi</li>
                                        <li>Vize başvuru desteği</li>
                                        <li>Konaklama düzenlemeleri</li>
                                        <li>Doğum sonrası bebek bakımı danışmanlığı</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="process-card">
                                    <h5 class="text-primary">Gümüş Paket</h5>
                                    <ul class="custom-list">
                                        <li>Bronz Paket'in tüm hizmetleri</li>
                                        <li>Türkçe tercüman desteği</li>
                                        <li>Özel oda imkanları</li>
                                        <li>Doğum belgesi ve pasaport işlemleri</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="process-card">
                                    <h5 class="text-primary">Altın Paket</h5>
                                    <ul class="custom-list">
                                        <li>Gümüş Paket'in tüm hizmetleri</li>
                                        <li>Özel transfer hizmetleri</li>
                                        <li>VIP hastane ve doktor seçimi</li>
                                        <li>ABD'de uzun süreli konaklama düzenlemeleri</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="basvuru-sureci" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Başvuru Süreci</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h5>1. Ön Görüşme</h5>
                                <p>Vize durumunun değerlendirilmesi</p>
                            </div>
                            <div class="timeline-item">
                                <h5>2. Vize Durumu Uygunsa</h5>
                                <p>Hastane ve doktor seçimi</p>
                            </div>
                            <div class="timeline-item">
                                <h5>3. Konaklamanın Ayarlanması</h5>
                                <p>Konaklama düzenlemelerinin yapılması</p>
                            </div>
                            <div class="timeline-item">
                                <h5>4. Araç Kiralanması (Opsiyonel)</h5>
                                <p>Ulaşım ihtiyaçları için araç kiralama seçenekleri</p>
                            </div>
                            <div class="timeline-item">
                                <h5>5. Doktor Kontrolleri ve Doğum Süreçlerinde Lojistik Destek</h5>
                                <p>Doktor kontrolleri ve doğum süreçlerinde destek</p>
                            </div>
                            <div class="timeline-item">
                                <h5>6. Doğum Sonrası Evrakların Hazırlanması</h5>
                                <p>Doğum sonrası evrakların hazırlanması ve vatandaşlık başvurusu yapılması</p>
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
                        </div>
                    </section>

                    <section id="sss" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Sıkça Sorulan Sorular</h2>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        Amerika'da doğum süreci ne kadar sürer?
                                    </button>
                                </h3>
                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Doğum süreci genellikle birkaç hafta ile birkaç ay arasında değişebilmektedir. Bu süre, doğum öncesi hazırlıklar ve doğum sonrası işlemlerle birlikte değişiklik gösterebilir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        Amerika'da doğum yapmak için hangi belgeler gereklidir?
                                    </button>
                                </h3>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Amerika'da doğum yapmak için geçerli pasaport, kimlik belgeleri, sağlık raporu gereklidir. Ayrıca, doğum için gerekli izinlerin alınması da önemlidir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        Amerika'da doğum yapmanın maliyeti nedir?
                                    </button>
                                </h3>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Amerika'da doğum yapmanın maliyeti, hastane ve doktor seçimine, konaklama ve diğer hizmetlere bağlı olarak değişiklik göstermektedir. Farklı paket seçenekleri ile bütçenize uygun çözümler sunulmaktadır.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                        Amerika'da doğum yapan bebekler otomatik olarak vatandaşlık alır mı?
                                    </button>
                                </h3>
                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Evet, Amerika'da doğan bebekler otomatik olarak Amerikan vatandaşlığı almaktadır. Bu, ABD Anayasası'nın 14. Maddesi gereğince sağlanmaktadır.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                        Amerika'da doğum yapmak için vize almak zorunda mıyım?
                                    </button>
                                </h3>
                                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Evet, Amerika'da doğum yapmak için geçerli bir vizeye sahip olmanız gerekmektedir. Doğum amaçlı vize başvurularında profesyonel danışmanlık hizmeti sunulmaktadır.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                        Amerika'da doğum sonrası bebek için hangi işlemler yapılmalıdır?
                                    </button>
                                </h3>
                                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Doğum sonrası bebek için doğum belgesi, Amerikan pasaportu ve Türk nüfusuna kayıt işlemleri yapılmalıdır. Gerekli tüm resmi belgeler temin edilmekte ve işlemler takip edilmektedir.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                        Amerika'da doğum yaparken sağlık sigortası gerekli midir?
                                    </button>
                                </h3>
                                <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Amerika'da doğum yaparken sağlık sigortası yaptırmak önemlidir. Sağlık sigortası, doğum ve doğum sonrası süreçlerde oluşabilecek masrafları karşılamada yardımcı olacaktır.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                        Amerika'da doğum yaparken Türkçe destek alabilir miyim?
                                    </button>
                                </h3>
                                <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Evet, Amerika'da doğum yaparken Türkçe destek alabilirsiniz. Türkçe bilen doktorlar ve tercümanlar ile çalışma imkanımız bulunmaktadır.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="cta-box text-center" data-aos="fade-up">
                        <h3 class="mb-4">Geleceğinize Bir Adım Uzaktasınız.</h3>
                        <p class="mb-4">ABD'de doğum sürecinizde size yardımcı olalım.</p>
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