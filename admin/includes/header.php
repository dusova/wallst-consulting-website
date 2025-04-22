<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
    <a class="navbar-brand" href="https://usadanismani.com/index.php">
            <img src="https://usadanismani.com/uploads/navlogo.png" alt="Wall Street Consulting" width="60">
            <span class="navlogotext d-none d-lg-inline">Wall Street Consulting</span>
            <span class="navlogotext d-lg-none" style="color:#8a2424;">Wall Street C.</span>
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://usadanismani.com/admin/index.php#home">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://usadanismani.com/">Siteye Dön</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://usadanismani.com/admin-add.php">Admin Ekle</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-danger" href="./logout.php">
                        Çıkış Yap
                        <i class="bi bi-box-arrow-right ms-2"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="page-header">
    <div class="container">
        <h1 class="display-4 text-white fw-bold mb-4" data-aos="fade-up">Admin Panel</h1>
        <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="200">
            Hoş geldiniz, <?php echo htmlspecialchars($_SESSION['isim']); ?><br> Son girişiniz: <?php echo htmlspecialchars($_SESSION['last_login']); ?>
        </p>
    </div>
</header>