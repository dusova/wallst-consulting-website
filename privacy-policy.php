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
                    <li class="breadcrumb-item active text-white" aria-current="page">Gizlilik Politikası</li>
                </ol>
            </nav>
            <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up">Gizlilik Politikası</h1>
            <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                Kişisel verilerinizin korunması ve gizliliğiniz bizim için önemlidir.
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
                            <a class="nav-link" href="#toplanan-veriler">Toplanan Veriler</a>
                            <a class="nav-link" href="#veri-kullanimi">Veri Kullanımı</a>
                            <a class="nav-link" href="#veri-paylasimi">Veri Paylaşımı</a>
                            <a class="nav-link" href="#veri-guvenligi">Veri Güvenliği</a>
                            <a class="nav-link" href="#cerezler">Çerezler</a>
                            <a class="nav-link" href="#haklariniz">Haklarınız</a>
                            <a class="nav-link" href="#degisiklikler">Değişiklikler</a>
                            <a class="nav-link" href="#iletisim">İletişim</a>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-9">
                    <section id="genel-bilgi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Gizlilik Politikası Hakkında</h2>
                        <p class="lead text-muted">Wall Street Consulting olarak, sizlere sunduğumuz hizmetler kapsamında kişisel verilerinizin gizliliğini ve güvenliğini önemsiyoruz.</p>
                        
                        <div class="mt-4">
                            <p>Bu gizlilik politikası, websitemizi ve hizmetlerimizi kullanırken toplanan bilgilerin nasıl kullanıldığını, korunduğunu ve paylaşıldığını açıklamaktadır. Sitemizi kullanarak bu politikayı kabul etmiş sayılırsınız.</p>
                            <p>Bu politika, 6698 sayılı Kişisel Verilerin Korunması Kanunu (KVKK) ve ilgili diğer mevzuat hükümlerine uygun olarak hazırlanmıştır.</p>
                        </div>
                    </section>

                    <section id="toplanan-veriler" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Toplanan Veriler</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Kimlik Bilgileri</h4>
                                <p>Ad, soyad, doğum tarihi, TC kimlik numarası, pasaport bilgileri gibi kimlik bilgileriniz.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>İletişim Bilgileri</h4>
                                <p>E-posta adresi, telefon numarası, adres bilgileri.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Sağlık Bilgileri</h4>
                                <p>Doğum hizmetlerimiz kapsamında gerekli olan sağlık bilgileri ve raporları.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Finansal Bilgiler</h4>
                                <p>Ödeme bilgileri, banka hesap bilgileri.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Web Sitesi Kullanım Verileri</h4>
                                <p>IP adresi, tarayıcı bilgileri, ziyaret edilen sayfalar, ziyaret süreleri.</p>
                            </div>
                        </div>
                    </section>

                    <section id="veri-kullanimi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Veri Kullanımı</h2>
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">Hizmet Sunumu</h5>
                                    <ul class="custom-list">
                                        <li>Doğum hizmetlerinin planlanması ve yürütülmesi</li>
                                        <li>Hastane ve doktor randevularının organizasyonu</li>
                                        <li>Konaklama ve ulaşım düzenlemelerinin yapılması</li>
                                        <li>Vize başvuru süreçlerinin yönetimi</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">İletişim</h5>
                                    <ul class="custom-list">
                                        <li>Bilgilendirme ve duyuruların iletilmesi</li>
                                        <li>Talep ve şikayetlerin değerlendirilmesi</li>
                                        <li>Hizmet kalitesinin ölçülmesi ve iyileştirilmesi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="veri-paylasimi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Veri Paylaşımı</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Yasal Zorunluluklar</h4>
                                <p>Kişisel verileriniz, yasal yükümlülüklerimiz kapsamında yetkili kamu kurum ve kuruluşlarıyla paylaşılabilir.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Hizmet Sağlayıcılar</h4>
                                <p>Hizmetlerimizin sunulması için gerekli olan hastaneler, doktorlar, konaklama tesisleri ve diğer hizmet sağlayıcılarla paylaşım yapılabilir.</p>
                            </div>
                            <div class="timeline-item">
                                <h4>Üçüncü Taraflar</h4>
                                <p>Verileriniz, açık rızanız olmadan üçüncü taraflarla ticari amaçlarla paylaşılmaz.</p>
                            </div>
                        </div>
                    </section>

                    <section id="veri-guvenligi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Veri Güvenliği</h2>
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">Teknik Önlemler</h5>
                                    <ul class="custom-list">
                                        <li>SSL şifreleme teknolojisi kullanımı</li>
                                        <li>Güvenlik duvarı ve antivirüs sistemleri</li>
                                        <li>Düzenli güvenlik güncellemeleri</li>
                                        <li>Veri erişim logs ve denetimi</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">İdari Önlemler</h5>
                                    <ul class="custom-list">
                                        <li>Çalışan gizlilik sözleşmeleri</li>
                                        <li>Düzenli personel eğitimleri</li>
                                        <li>Veri işleme politikaları</li>
                                        <li>Fiziksel güvenlik önlemleri</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="cerezler" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Çerezler (Cookies)</h2>
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">Çerez Türleri</h5>
                                    <ul class="custom-list">
                                        <li>Zorunlu çerezler: Sitenin temel işlevleri için gereklidir</li>
                                        <li>Performans çerezleri: Site kullanımını analiz etmek için kullanılır</li>
                                        <li>İşlevsellik çerezleri: Kullanıcı tercihlerini hatırlamak için kullanılır</li>
                                        <li>Hedefleme çerezleri: Kişiselleştirilmiş içerik sunmak için kullanılır</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="haklariniz" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Haklarınız</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <p>KVKK'nın 11. maddesi uyarınca sahip olduğunuz haklar:</p>
                                <ul class="custom-list">
                                    <li>Kişisel verilerinizin işlenip işlenmediğini öğrenme</li>
                                    <li>Kişisel verileriniz işlenmişse buna ilişkin bilgi talep etme</li>
                                    <li>Kişisel verilerinizin işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme</li>
                                    <li>Yurt içinde veya yurt dışında kişisel verilerinizin aktarıldığı üçüncü kişileri bilme</li>
                                    <li>Kişisel verilerinizin eksik veya yanlış işlenmiş olması hâlinde bunların düzeltilmesini isteme</li>
                                    <li>KVKK ve ilgili diğer kanun hükümlerine uygun olarak işlenmiş olmasına rağmen, işlenmesini gerektiren sebeplerin ortadan kalkması hâlinde kişisel verilerinizin silinmesini veya yok edilmesini isteme</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h4>Başvuru Süreci</h4>
                                <p>Haklarınızı kullanmak için aşağıdaki yöntemlerle başvurabilirsiniz:</p>
                                <ul class="custom-list">
                                    <li>Web sitemizdeki iletişim formunu kullanarak</li>
                                    <li>Kayıtlı e-posta adresinizden info@wallstreetconsulting.com adresine e-posta göndererek</li>
                                    <li>Şirket adresimize ıslak imzalı dilekçe göndererek</li>
                                    <li>Noter aracılığıyla başvurarak</li>
                                </ul>
                            </div>
                            <div class="timeline-item">
                                <h4>Yanıt Süresi</h4>
                                <p>Başvurularınız, talebinizin niteliğine göre en kısa sürede ve en geç 30 gün içinde ücretsiz olarak sonuçlandırılacaktır.</p>
                            </div>
                        </div>
                    </section>

                    <section id="degisiklikler" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Gizlilik Politikasında Değişiklikler</h2>
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">Güncelleme Politikası</h5>
                                    <p>Wall Street Consulting, bu gizlilik politikasını gerektiğinde güncelleme hakkını saklı tutar. Politikada yapılan değişiklikler, web sitemizde yayınlandığı tarihte yürürlüğe girer.</p>
                                    <ul class="custom-list">
                                        <li>Önemli değişiklikler olması durumunda e-posta yoluyla bilgilendirme yapılır</li>
                                        <li>Güncel politika her zaman web sitemizde yayınlanır</li>
                                        <li>Değişiklik tarihçesi politika sonunda belirtilir</li>
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
                                    <h5 class="text-primary">Veri Sorumlusu</h5>
                                    <p>Wall Street Consulting olarak kişisel verilerinizin işlenmesi konusunda veri sorumlusu sıfatıyla hareket etmekteyiz.</p>
                                    
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

                    <section id="taahhut" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Gizlilik Taahhüdümüz</h2>
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="process-card">
                                    <p class="lead">Wall Street Consulting olarak, kişisel verilerinizin güvenliği konusunda en yüksek standartları uygulamayı taahhüt ediyoruz.</p>
                                    <ul class="custom-list">
                                        <li>Verileriniz yalnızca belirtilen amaçlar doğrultusunda işlenir</li>
                                        <li>Güncel teknolojik imkanlarla güvenlik önlemleri sürekli güncellenir</li>
                                        <li>Çalışanlarımız düzenli olarak veri güvenliği eğitimlerinden geçer</li>
                                        <li>Veri güvenliği politikalarımız düzenli olarak denetlenir</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="cta-box text-center" data-aos="fade-up">
                        <h3 class="mb-4">Sorularınız mı var?</h3>
                        <p class="mb-4">Gizlilik politikamız hakkında daha fazla bilgi almak için bizimle iletişime geçin.</p>
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