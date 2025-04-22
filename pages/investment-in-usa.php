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
    <link href="../src/style.css" rel="stylesheet">
    <link href="./pagestyle.css" rel="stylesheet">

    <style>
    .page-header {
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../uploads/mount-rushmore.png');
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
                    <li class="breadcrumb-item active text-white" aria-current="page">ABD'de Yatırım</li>
                </ol>
            </nav>
            <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up">ABD'de Yatırım</h1>
            <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                Amerika Birleşik Devletleri'nde yatırım yapma süreçleri hakkında detaylı bilgi edinin.
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
                            <a class="nav-link" href="#yatirim-avantajlari">Yatırım Avantajları</a>
                            <a class="nav-link" href="#gayrimenkul-yatirimlari">Gayrimenkul Yatırımları</a>
                            <a class="nav-link" href="#isyeri-yatirimlari">İşyeri Yatırımları</a>
                            <a class="nav-link" href="#ticari-yatirimlar">Ticari Yatırımlar</a>
                            <a class="nav-link" href="#basvuru-sureci">Başvuru Süreci</a>
                            <a class="nav-link" href="#gerekli-belgeler">Gerekli Belgeler</a>
                            <a class="nav-link" href="#sss">Sıkça Sorulan Sorular</a>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-9">
                    <section id="genel-bilgi" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">ABD'de Yatırım Hakkında</h2>
                        <p class="lead text-muted">Amerika Birleşik Devletleri, güçlü ekonomisi, istikrarlı finansal sistemi ve yatırımcı dostu politikalarıyla dünya genelindeki girişimciler ve yatırımcılar için cazip bir destinasyondur. İleri teknolojiye sahip altyapısı, geniş tüketici pazarı ve yenilikçi iş ortamı, ABD’yi hem bireysel hem de kurumsal yatırımlar için ideal hale getirmektedir. Ayrıca, yabancı yatırımcıları teşvik eden ekonomik politikalar, şirket kurma kolaylığı ve vergi avantajları, ABD’yi güvenli ve kârlı bir yatırım merkezi olarak öne çıkarmaktadır. Bu nedenle, ABD’de yatırım yapmak isteyenler için sunulan avantajları detaylı bir şekilde incelemek büyük önem taşımaktadır.</p>
                        <p class="lead text-green" style="color: green;"><b><i class="bi bi-check-circle-fill"></i> Amerika'da yaptığınız ve yapacağınız yatırımlar sayesinde E2 Vizesi alabilirsiniz. E2 Vizesi, ABD'de iş kurmak veya mevcut bir işletmeye yatırım yapmak isteyen yatırımcılara verilen bir vizedir. Bu vize, yatırımcıların ve ailelerinin ABD'de yaşama ve çalışma hakkı elde etmelerini sağlar. Yatırımınızın başarılı olması için gerekli tüm adımlarda size rehberlik ediyoruz.</b></p>                    
                    </section>

                    <section id="yatirim-avantajlari" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">ABD'de Yatırım Avantajları</h2>
                        <p class="lead text-muted">Amerika Birleşik Devletleri, dünyanın en büyük ve en istikrarlı ekonomilerinden biri olarak yatırımcılar için cazip fırsatlar sunmaktadır. Gelişmiş altyapısı, yenilikçi iş ortamı ve geniş tüketici pazarıyla ABD, hem bireysel hem de kurumsal yatırımcılar için ideal bir destinasyondur. Ayrıca, yabancı yatırımcılar için sunulan çeşitli teşvikler ve güçlü hukuki altyapı, yatırımların güvenli ve sürdürülebilir olmasını sağlamaktadır. İş dünyasının merkezlerinden biri olan ABD'de yatırım yapmanın sağladığı avantajlara daha yakından bakalım.</p>
                        
                        <div class="row g-4 mt-4">
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">Ekonomik Faydalar</h5>
                                    <ul class="custom-list">
                                        <li>Amerika'nın güçlü ekonomisi, yatırımların değerini korumaktadır. Dolar bazlı gelirler, kur riskine karşı koruma sağlamaktadır. Çeşitlendirilmiş yatırım fırsatları, risk yönetimini kolaylaştırmaktadır. Gelişmiş finansal sistem, yatırım finansmanında esneklik sunmaktadır.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">Yasal Güvenceler</h5>
                                    <ul class="custom-list">
                                        <li>Amerikan hukuk sistemi, yatırımcı haklarını güçlü bir şekilde korumaktadır. Şeffaf yasal düzenlemeler, yatırım süreçlerini netleştirmektedir. Mülkiyet hakları, etkin bir şekilde korunmaktadır. Sözleşme hukuku, ticari ilişkilerde güven ortamı sağlamaktadır.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">Vize İmkanları</h5>
                                    <ul class="custom-list">
                                        <li>E-2 yatırımcı vizesi, işletme sahiplerine Amerika'da yaşama hakkı vermektedir. EB-5 programı, kalıcı oturum hakkı için bir yol sunmaktadır. Yatırımcı vizeleri, aile bireylerini de kapsamaktadır. Vize sahipleri, Amerika'nın eğitim imkanlarından faydalanabilmektedir.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="process-card">
                                    <h5 class="text-primary">Danışmanlık Hizmetlerimiz</h5>
                                    <ul class="custom-list">
                                        <li>Yatırım kararlarınızda size profesyonel destek sunuyoruz. Pazar araştırmalarımız, doğru yatırım fırsatlarını belirlemenize yardımcı olmaktadır. Finansal planlamalarımız, yatırımınızın karlılığını optimize etmektedir. Hukuki süreçlerde tam destek sağlıyoruz. Operasyonel yönetimde uzman ekibimiz yanınızdadır. Ücretsiz ön görüşme hizmetimizle yatırım planınızı birlikte oluşturabiliriz.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="gayrimenkul-yatirimlari" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Gayrimenkul Yatırımları</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Konut Yatırımları</h4>
                                <p>ABD'de konut gayrimenkul yatırımları, yatırımcılara düzenli kira geliri sağlamaktadır. Apartman daireleri ve müstakil evler, yıllık ortalama %12-16 arasında kira getirisi sunmaktadır. Gayrimenkul değerlerindeki düzenli artış, yatırımcılara ek kazanç potansiyeli sağlamaktadır. Amerika'da gayrimenkul yatırımları önemli vergi avantajları ile desteklenmektedir.</p>
                                <a href="#portfoy"><i class="bi bi-arrow-right"></i> Konut Portföyümüz için Tıklayın</a>
                            </div>
                            <div class="timeline-item">
                                <h4>Öğrenci Evleri</h4>
                                <p>Üniversite şehirlerinde öğrenci evlerine yapılan yatırımlar, sürekli bir talep görmektedir. Bu tür yatırımlar genellikle yıllık %16-20 arasında getiri potansiyeli sunmaktadır. Öğrenci evlerinde boşluk oranları oldukça düşük seyretmektedir. Akademik takvime bağlı kiralama sistemi, düzenli gelir akışı sağlamaktadır.</p>
                                <a href="#portfoy"><i class="bi bi-arrow-right"></i> Öğrenci Ev Portföyümüz için Tıklayın</a>
                            </div>
                            <div class="timeline-item">
                                <h4>Ticari Gayrimenkuller</h4>
                                <p>Ofis binaları, uzun vadeli kurumsal kiracılarla istikrarlı bir gelir akışı sağlamaktadır. Perakende mağazaları, yüksek cirolu lokasyonlarda değer artış potansiyeli sunmaktadır. Endüstriyel tesisler, e-ticaretin yükselişiyle birlikte artan bir talep görmektedir. Triple Net Lease anlaşmaları, mülk sahiplerini işletme giderlerinden korumaktadır.</p>
                                <a href="#portfoy"><i class="bi bi-arrow-right"></i> Ticari Gayrimenkul Portföyümüz için Tıklayın</a>
                            </div>
                        </div>
                    </section>

                    <section id="isyeri-yatirimlari" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">İşyeri Yatırımları</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>Franchise İşletmeler</h4>
                                <p>Franchise sistemleri, kanıtlanmış iş modelleriyle güvenli bir yatırım imkanı sunmaktadır. Merkezi pazarlama desteği, işletme maliyetlerini optimize etmektedir. Hazır müşteri portföyü, işletmenin hızlı bir şekilde gelir üretmeye başlamasını sağlamaktadır. Standart operasyon prosedürleri, yönetim süreçlerini kolaylaştırmaktadır.</p4>
                            </div>
                            <div class="timeline-item">
                                <h4>Bağımsız İşletmeler</h4>
                                <p>Restoran ve kafeler, doğru lokasyonda yüksek kar marjı potansiyeli taşımaktadır. Butik mağazalar, özgün konseptlerle rekabet avantajı sağlamaktadır. Yerel pazar dinamiklerine uygun işletmeler, sadık müşteri kitlesi oluşturabilmektedir. Online satış kanalları, geleneksel işletmelerin gelir kaynaklarını çeşitlendirmektedir.</p>

                            </div>
                        </div>
                    </section>

                    <section id="ticari-yatirimlar" class="content-card" data-aos="fade-up">
                        <h2 class="mb-4">Ticari Yatırımlar</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <h4>İthalat-İhracat</h4>
                                <p>Türkiye-ABD arasındaki ticaret, geniş bir ürün yelpazesinde fırsatlar sunmaktadır. Gümrük anlaşmaları, belirli sektörlerde rekabetçi avantajlar sağlamaktadır. Lojistik altyapı, etkin tedarik zinciri yönetimini mümkün kılmaktadır. Distribütörlük anlaşmaları, bölgesel pazarlara erişim imkanı vermektedir.</p4>
                            </div>
                            <div class="timeline-item">
                                <h4>E-ticaret</h4>
                                <p>Amazon FBA sistemi, geniş bir müşteri kitlesine ulaşım imkanı sağlamaktadır. Shopify platformu, özelleştirilebilir online mağaza çözümleri sunmaktadır. Dijital pazarlama stratejileri, online satışları artırmada kritik rol oynamaktadır. E-ticaret, düşük operasyonel maliyetlerle yüksek karlılık potansiyeli sunmaktadır.</p>

                            </div>
                        </div>
                    </section>
                
                <section id="sss" class="content-card" data-aos="fade-up">
                    <h2 class="mb-4">Sıkça Sorulan Sorular</h2>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    ABD'de yatırım yapmak için hangi vize türlerine başvurabilirim?
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    ABD'de yatırım yapmak için E-2 Yatırımcı Vizesi ve EB-5 Yatırımcı Programı gibi vize türlerine başvurabilirsiniz.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    E-2 Yatırımcı Vizesi için minimum yatırım miktarı nedir?
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    E-2 Yatırımcı Vizesi için belirli bir minimum yatırım miktarı yoktur, ancak yatırımın önemli ve işletmeyi destekleyecek düzeyde olması gerekmektedir.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    EB-5 Yatırımcı Programı için gereken yatırım miktarı nedir?
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    EB-5 Yatırımcı Programı için minimum yatırım miktarı genellikle 1 milyon dolardır. Ancak, hedeflenen istihdam alanlarında bu miktar 500 bin dolara düşebilir.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    ABD'de yatırım yaparak Green Card alabilir miyim?
                                </button>
                            </h3>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Evet, EB-5 Yatırımcı Programı aracılığıyla ABD'de yatırım yaparak Green Card alabilirsiniz.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    ABD'de yatırım yaparken vergi avantajları nelerdir?
                                </button>
                            </h3>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    ABD'de yatırım yaparken çeşitli vergi avantajlarından yararlanabilirsiniz. Örneğin, gayrimenkul yatırımlarında amortisman ve vergi indirimleri gibi avantajlar bulunmaktadır.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                    ABD'de yatırım yaparken hangi sektörler daha karlıdır?
                                </button>
                            </h3>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    ABD'de teknoloji, sağlık, gayrimenkul ve finans gibi sektörler genellikle daha karlı yatırım fırsatları sunmaktadır.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                    ABD'de yatırım yaparken danışmanlık hizmeti almalı mıyım?
                                </button>
                            </h3>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Evet, ABD'de yatırım yaparken yerel pazar dinamiklerini ve yasal süreçleri anlamak için profesyonel danışmanlık hizmeti almak faydalı olacaktır.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                    ABD'de gayrimenkul yatırımı yaparken nelere dikkat etmeliyim?
                                </button>
                            </h3>
                            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    ABD'de gayrimenkul yatırımı yaparken lokasyon, pazar trendleri, mülkün durumu ve yasal gereklilikler gibi faktörlere dikkat etmelisiniz.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                                    ABD'de yatırım yaparak iş kurmak için hangi adımları izlemeliyim?
                                </button>
                            </h3>
                            <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    ABD'de yatırım yaparak iş kurmak için iş planı hazırlama, uygun vizeye başvurma, şirket kaydı ve lisans alma gibi adımları izlemelisiniz.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                    <div class="cta-box text-center" data-aos="fade-up">
                        <h3 class="mb-4">Geleceğinizin Yatırımına Bir Adım Uzaktasınız.</h3>
                        <p class="mb-4">ABD'de yatırım sürecinizde size yardımcı olalım.</p>
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