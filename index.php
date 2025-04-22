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

    $page_name = basename(__FILE__);
    $sql = "SELECT title, meta_description, author, keywords, url_image, meta_title FROM page_settings WHERE page_name = '$page_name'";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_assoc($result);
        $seotitle = $row['title'];
        $seometadesc = $row['meta_description'];
        $seoauthor = $row['author'];
        $seokeywords = $row['keywords'];
        $seourlimage = $row['url_image'];
        $seometatitle = $row['meta_title'];
    
        mysqli_free_result($result);
    }
    

    
    $services = [];
    $sql = "SELECT icon, title, description, link FROM services";
    if ($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $services[] = $row;
        }
        mysqli_free_result($result);
    }

    $sql = "SELECT phone, phonelink, mail, maillink, location FROM contactdetails WHERE id = 1";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_assoc($result);
        $phone = $row['phone'];
        $phonelink = $row['phonelink'];
        $email = $row['mail'];
        $emaillink = $row['maillink'];
        $location = $row['location'];
        mysqli_free_result($result);
    }
    $blogs = [];
    $sql = "SELECT id, title, content, image, category, category_name, created_at FROM blog_posts ORDER BY created_at DESC LIMIT 3";
        if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
    $blogs[] = $row;
    }
        mysqli_free_result($result);
}


mysqli_close($link);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="./src/style.css" rel="stylesheet">    
</head>
<body>

<?php include "./includes/header.php"; ?>

    <section id="home" class="hero-section">
        <!--<div class="hero-particles" id="particles-js"></div>-->
        <div class="hero-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="hero-title text-white">
                            Amerika'daki Başarınızın 
                            <span style="color:rgb(227, 205, 4);">Stratejik Ortağı</span>                            
                        </h1>
                        <p class="hero-subtitle mb-4" style="color:rgb(199, 194, 194)">
                        Wall Street Consulting ailesi olarak; ABD vizesi, ABD'de doğum, gayrimenkul ve ticari yatırımlar, ABD'de dil okulu ve üniversite eğitimi, Ekspres Schengen vizesi ve AB'de oturum konularında profesyonel ekibimizle ihtiyacınız olan tüm hizmetleri sunuyoruz.
                        </p>
                        <div class="d-flex gap-3" data-aos="fade-up" data-aos-delay="400">
                            <a href="https://usadanismani.com/apply-now.php" class="btn btn-primary btn-lg">
                                Size Ulaşalım
                                <i class="bi bi-phone ms-2"></i>
                            </a>
                            <a href="#process" class="btn btn-primary btn-lg">
                                Nasıl Çalışıyoruz
                                <i class="bi bi-question ms-2"></i>
                            </a>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services-section">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-primary text-uppercase fw-bold mb-3">Hizmetlerimiz</h6>
                <h2 class="display-5 fw-bold mb-4">Size Nasıl Yardımcı Olabiliriz?</h2>
                <p class="lead text-muted">Amerika ve Avrupa'da yaşam, eğitim ve iş fırsatları için ihtiyacınız olan tüm hizmetleri sunuyoruz.</p>
            </div>
            
            <div class="row g-4">
                <?php foreach ($services as $service): ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <a style="text-decoration:none;" href="<?php echo htmlspecialchars($service['link']); ?>"><div class="service-card p-4">
                        <div class="service-icon">
                            <i class="<?php echo htmlspecialchars($service['icon']); ?>"></i>
                        </div>
                        <h4 class="mb-3"><?php echo htmlspecialchars($service['title']); ?></h4>
                        <p class="text-muted mb-4"><?php echo htmlspecialchars($service['description']); ?></p>
                        <a href="<?php echo htmlspecialchars($service['link']); ?>" class="btn btn-outline-primary rounded-pill">
                            Detaylı Bilgi
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div></a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<section class="stats-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                <div class="stat-card">
                    <div id="clock-istanbul" class="stat-number">00:00:00</div>
                    <h5 class="text-white-50">İstanbul</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <div id="clock-newyork" class="stat-number">00:00:00</div>
                    <h5 class="text-white-50">New York</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <div id="clock-chicago" class="stat-number">00:00:00</div>
                    <h5 class="text-white-50">Chicago</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <div id="clock-losangeles" class="stat-number">00:00:00</div>
                    <h5 class="text-white-50">Los Angeles</h5>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="cta-section py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="mb-3">Hayallerinizi Gerçekleştirmeye Hazır mısınız?</h2>
                    <p class="lead mb-0">Ücretsiz ön görüşme hizmetimizden yararlanın, size en uygun çözümü birlikte bulalım.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <a href="https://usadanismani.com/apply-now.php" class="btn btn-outline-light btn-lg">
                        Hemen Başvurun
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="process" class="process-section">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-primary text-uppercase fw-bold mb-3">Çalışma Sürecimiz</h6>
                <h2 class="display-5 fw-bold mb-4">Nasıl Çalışıyoruz?</h2>
                <p class="lead text-muted">Danışmanlık sürecinizi 4 kolay adımda tamamlıyoruz</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h4 class="mb-3">İlk Görüşme</h4>
                        <p class="text-muted">Hedeflerinizi ve ihtiyaçlarınızı anlamak için detaylı bir görüşme gerçekleştiriyoruz.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h4 class="mb-3">Strateji Belirleme</h4>
                        <p class="text-muted">Size özel bir yol haritası oluşturuyor ve gerekli belgeleri hazırlıyoruz.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h4 class="mb-3">Başvuru Süreci</h4>
                        <p class="text-muted">Başvurunuzu profesyonel ekibimizle birlikte hazırlıyor ve takip ediyoruz.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h4 class="mb-3">Sonuç ve Destek</h4>
                        <p class="text-muted">Vizenizi aldıktan sonra da gerekli tüm konularda size destek oluyoruz.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials-section">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-primary text-uppercase fw-bold mb-3">Referanslarımız</h6>
                <h2 class="display-5 fw-bold mb-4">Müşterilerimiz Ne Diyor?</h2>
            </div>

            <div class="swiper testimonials-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <img src="https://usadanismani.com/uploads/testimonial-placeholder.png" alt="Müşteri" class="testimonial-avatar">
                            <h5>Ahmet Yılmaz</h5>
                            <p class="text-primary mb-3">ABD Öğrenci Vizesi</p>
                            <p class="text-muted">"Profesyonel yaklaşımları ve detaylı bilgilendirmeleri sayesinde vize sürecim çok rahat ilerledi. Teşekkürler!"</p>
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <img src="https://usadanismani.com/uploads/testimonial-placeholder.png" alt="Müşteri" class="testimonial-avatar">
                            <h5>Ayşe Demir</h5>
                            <p class="text-primary mb-3">Green Card Başvurusu</p>
                            <p class="text-muted">"Uzman ekipleri sayesinde Green Card başvuru sürecim sorunsuz tamamlandı. Çok teşekkür ederim."</p>
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            <img src="https://usadanismani.com/uploads/testimonial-placeholder.png" alt="Müşteri" class="testimonial-avatar">
                            <h5>Mehmet Kaya</h5>
                            <p class="text-primary mb-3">E2 Yatırımcı Vizesi</p>
                            <p class="text-muted">"Amerika'da iş kurma sürecimde yanımda oldular. Profesyonel ve güvenilir bir ekip. Kesinlikle tavsiye ediyorum."</p>
                            <div class="text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    

<section id="blog" class="blog-section">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-primary text-uppercase fw-bold mb-3">Blog & Haberler</h6>
            <h2 class="display-5 fw-bold mb-4">Son Gelişmeler</h2>
            <p class="lead text-muted">Vize ve göçmenlik dünyasındaki son gelişmeleri takip edin</p>
        </div>

        <div class="row g-4">
            <?php foreach ($blogs as $blog): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <a href="read-blog.php?id=<?php echo htmlspecialchars($blog['id']); ?>" style="text-decoration:none;"><div class="blog-card">
                    <img src="<?php echo htmlspecialchars($blog['image']); ?>" alt="Blog" class="blog-image w-100">
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-primary"><?php echo htmlspecialchars($blog['category_name']); ?></span>
                            <span class="text-muted"><?php echo htmlspecialchars(date('d F Y', strtotime($blog['created_at']))); ?></span>
                        </div>
                        <h4 class="mb-3"><?php echo htmlspecialchars($blog['title']); ?></h4>
                        <p class="text-muted"><?php echo htmlspecialchars(substr($blog['content'], 0, 150)); ?>...</p>
                        <a href="read-blog.php?id=<?php echo htmlspecialchars($blog['id']); ?>" class="btn btn-link text-primary p-0">
                            Devamını Oku
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div></a>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <a href="https://usadanismani.com/blog.php" class="btn btn-outline-primary btn-lg rounded-pill">
                Tüm Yazıları Gör
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<section id="faq" class="faq-section">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-primary text-uppercase fw-bold mb-3">Sıkça Sorulan Sorular</h6>
            <h2 class="display-5 fw-bold mb-4">Merak Edilenler</h2>
            <p class="lead text-muted">Sık sorulan sorulara verdiğimiz cevapları inceleyebilirsiniz</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                ABD'de yatırım yapmak için hangi vize türüne başvurmalıyım?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Wall Street Consulting ailesi olarak, ABD'de yatırım yapmak isteyen müşterilerimize E-2 Yatırımcı Vizesi'ni öneriyoruz. Bu vize, ABD'de iş kurmak veya mevcut bir işletmeye yatırım yapmak isteyen girişimciler için idealdir.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                ABD'de doğum yapmak için hangi belgeler gereklidir?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Wall Street Consulting olarak, ABD'de doğum yapmak isteyen müşterilerimize gerekli belgeler konusunda detaylı bilgi sağlıyoruz. Genel olarak, geçerli bir pasaport, doğum öncesi tıbbi kayıtlar ve doğum planı gibi belgeler gereklidir.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Schengen vizesi başvurusu için hangi belgeler gereklidir?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Schengen vizesi başvurusu için gerekli belgeler arasında geçerli bir pasaport, başvuru formu, biyometrik fotoğraf, seyahat sağlık sigortası, uçuş rezervasyonları ve konaklama bilgileri yer almaktadır. Wall Street Consulting olarak, başvuru sürecinde size rehberlik ediyoruz.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Golden Visa nedir ve nasıl başvurabilirim?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Golden Visa, belirli bir ülkede yatırım yaparak oturma izni veya vatandaşlık elde etmenizi sağlayan bir programdır. Wall Street Consulting olarak, Golden Visa başvurularında size en uygun yatırım seçeneklerini sunuyor ve başvuru sürecinde destek sağlıyoruz.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                ABD'de oturum izni almak için hangi yolları izleyebilirim?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                ABD'de oturum izni almak için çeşitli yollar bulunmaktadır. Wall Street Consulting olarak, yatırımcı vizeleri, aile birleşimi, iş vizeleri ve yeşil kart çekilişi gibi seçenekler hakkında size detaylı bilgi ve rehberlik sağlıyoruz.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                Yurtdışında eğitim almak için hangi adımları izlemeliyim?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Wall Street Consulting olarak, yurtdışında eğitim almak isteyen öğrencilerimize başvuru sürecinde rehberlik ediyoruz. İlk adım olarak, hedef ülke ve üniversite seçimi yapmalı, ardından gerekli belgeleri hazırlamalı ve başvuru sürecini başlatmalısınız.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                Schengen vizesi başvurum reddedilirse ne yapmalıyım?
                            </button>
                        </h2>
                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Wall Street Consulting olarak, Schengen vizesi başvurunuz reddedilirse itiraz sürecinde size destek sağlıyoruz. Ret nedenlerini analiz ederek, eksiklikleri gideriyor ve yeniden başvuru yapmanıza yardımcı oluyoruz.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                ABD'de doğum yapmanın avantajları nelerdir?
                            </button>
                        </h2>
                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                ABD'de doğum yapmanın en büyük avantajı, çocuğunuzun ABD vatandaşı olmasıdır. Wall Street Consulting olarak, doğum sürecinde size rehberlik ediyor ve tüm yasal işlemleri sizin adınıza takip ediyoruz.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                                AB'de oturum izni almak için hangi ülkeler en uygun?
                            </button>
                        </h2>
                        <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                AB'de oturum izni almak için en uygun ülkeler arasında Portekiz, İspanya ve Yunanistan bulunmaktadır. Wall Street Consulting olarak, bu ülkelerde oturum izni başvurularında size rehberlik ediyoruz.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq10">
                                ABD'de yatırım yaparak oturum izni alabilir miyim?
                            </button>
                        </h2>
                        <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Evet, ABD'de yatırım yaparak oturum izni alabilirsiniz. Wall Street Consulting olarak, E-2 Yatırımcı Vizesi ve EB-5 Yatırımcı Programı gibi seçenekler hakkında size detaylı bilgi ve rehberlik sağlıyoruz.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq11">
                                Yurtdışında eğitim almak için hangi vize türüne başvurmalıyım?
                            </button>
                        </h2>
                        <div id="faq11" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yurtdışında eğitim almak için öğrenci vizesine başvurmanız gerekmektedir. Wall Street Consulting olarak, hedef ülkenize göre uygun vize türünü belirlemenize ve başvuru sürecinde size rehberlik ediyoruz.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq12">
                                Schengen vizesi başvurusu için ne kadar süre önceden başvurmalıyım?
                            </button>
                        </h2>
                        <div id="faq12" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Schengen vizesi başvurusu için seyahatinizden en az 15 gün, en fazla 6 ay öncesinde başvurmanız gerekmektedir. Wall Street Consulting olarak, başvuru sürecinde size rehberlik ediyoruz.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq13">
                                ABD'de doğum yapmanın maliyeti nedir?
                            </button>
                        </h2>
                        <div id="faq13" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                ABD'de doğum yapmanın maliyeti, hastane ve doktor ücretlerine göre değişiklik göstermektedir. Wall Street Consulting olarak, doğum sürecinde size en uygun maliyet seçeneklerini sunuyoruz.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq14">
                                Golden Visa programına başvurmak için hangi ülkeler uygundur?
                            </button>
                        </h2>
                        <div id="faq14" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Golden Visa programına başvurmak için en uygun ülkeler arasında Portekiz, İspanya ve Yunanistan bulunmaktadır. Wall Street Consulting olarak, bu ülkelerde Golden Visa başvurularında size rehberlik ediyoruz.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq15">
                                Yurtdışında eğitim almak için hangi belgeler gereklidir?
                            </button>
                        </h2>
                        <div id="faq15" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yurtdışında eğitim almak için gerekli belgeler arasında pasaport, başvuru formu, kabul mektubu, finansal belgeler ve sağlık sigortası yer almaktadır. Wall Street Consulting olarak, başvuru sürecinde size rehberlik ediyoruz.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="contact-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h6 class="text-primary text-uppercase fw-bold mb-3">İletişim</h6>
                <h2 class="display-5 fw-bold mb-4 text-white">Ön Değerlendirme İçin</h2>
                <p class="lead text-white-50 mb-4">Size en uygun vize seçeneğini belirlemek için hemen iletişime geçin.</p>
                
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary p-3 rounded-circle">
                            <i class="bi bi-telephone text-white"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p class="text-white-50 mb-0">Telefon</p>
                        <a href="<?php echo htmlspecialchars($phonelink); ?>" style="text-decoration: none;"><h5 class="text-white mb-0"><?php echo htmlspecialchars($phone); ?></h5></a>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary p-3 rounded-circle">
                            <i class="bi bi-envelope text-white"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p class="text-white-50 mb-0">E-posta</p>
                        <a href="<?php echo htmlspecialchars($emaillink); ?>" style="text-decoration: none;"> <h5 class="text-white mb-0"><?php echo htmlspecialchars($email); ?></h5></a>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="bg-primary p-3 rounded-circle">
                            <i class="bi bi-geo-alt text-white"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p class="text-white-50 mb-0">Adres</p>
                        <h5 class="text-white mb-0"><?php echo htmlspecialchars($location); ?></h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="contact-form">
                    <form id="contactForm" action="contact.php" method="post">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <input type="text" name="first_name" class="form-control" placeholder="Adınız" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="last_name" class="form-control" placeholder="Soyadınız" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="E-posta" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" name="phone" class="form-control" placeholder="Telefon" required>
                            </div>
                            <div class="col-md-12">
                                <select name="service" class="form-control" required>
                                    <option selected disabled>Hizmet Seçiniz</option>
                                    <option>AB'de Oturum</option>
                                    <option>ABD Vizesi</option>
                                    <option>ABD'de Doğum</option>
                                    <option>ABD'de Oturum</option>
                                    <option>ABD'de Yatırım</option>
                                    <option>Schengen Vizesi</option>
                                    <option>Yurtdışı Eğitim</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control" rows="5" placeholder="Mesajınız" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    Gönder
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <?php include "./includes/footer.php"; ?>
    <script>
function updateClock() {
    var now = new Date();

    var istanbulTime = new Date(now.toLocaleString("en-US", { timeZone: "Europe/Istanbul" }));
    var newYorkTime = new Date(now.toLocaleString("en-US", { timeZone: "America/New_York" }));
    var chicagoTime = new Date(now.toLocaleString("en-US", { timeZone: "America/Chicago" }));
    var losAngelesTime = new Date(now.toLocaleString("en-US", { timeZone: "America/Los_Angeles" }));

    document.getElementById('clock-istanbul').innerHTML = istanbulTime.toLocaleTimeString();
    document.getElementById('clock-newyork').innerHTML = newYorkTime.toLocaleTimeString();
    document.getElementById('clock-chicago').innerHTML = chicagoTime.toLocaleTimeString();
    document.getElementById('clock-losangeles').innerHTML = losAngelesTime.toLocaleTimeString();
}

setInterval(updateClock, 1000);
updateClock();
</script>

</body>
</html>