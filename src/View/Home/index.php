<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 
    - primary meta tags
  -->
    <title>Y Collage Bhdohi</title>
    <meta name="title" content="Youdemi">
    <meta name="description" content="This is a education html template made by codewithsadee">

    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="/favicon.svg" type="image/svg+xml">

    <!-- 
    - custom font link
  -->
    <link rel="stylesheet" href="/assets/font/font.css">

    <!-- 
    - custom css link
  -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- 
    - preload images
  -->
    <link rel="preload" as="image" href="/assets/images/hero-banner.png">
    <link rel="preload" as="image" href="/assets/images/hero-bg.png">
    <!-- Start of Async Drift Code -->
    <script>
        "use strict";

        !function () {
            var t = window.driftt = window.drift = window.driftt || [];
            if (!t.init) {
                if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
                t.invoked = !0, t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on"],
                    t.factory = function (e) {
                        return function () {
                            var n = Array.prototype.slice.call(arguments);
                            return n.unshift(e), t.push(n), t;
                        };
                    }, t.methods.forEach(function (e) {
                        t[e] = t.factory(e);
                    }), t.load = function (t) {
                        var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
                        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
                        var i = document.getElementsByTagName("script")[0];
                        i.parentNode.insertBefore(o, i);
                    };
            }
        }();
        drift.SNIPPET_VERSION = '0.3.1';
        drift.load('c3aurgtk94ca');
    </script>
    <!-- End of Async Drift Code -->

</head>

<body>

    <!-- 
    - PRELOADER
  -->

    <div class="preloader" data-preloader>
        <div class="circle" data-circle></div>
    </div>


    <!-- 
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="container">

            <a href="#" class="brand-wrapper">
                <img src="/assets/images/logo.png" class="brand-logo" alt="Logo">
                <span class="brand-text">LAM'ATTUN NUR</span>
            </a>


            <nav class="navbar" data-navbar>

                <div class="navbar-top">
                    <a href="#" class="brand-wrapper">
                        <img src="/assets/images/logo.png" class="brand-logo" alt="Logo">
                        <span class="brand-text">LAM'ATTUN NUR</span>
                    </a>

                    <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                        <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                    </button>
                </div>

                <ul class="navbar-list">

                    <li class="navbar-item">
                        <a href="#" class="navbar-link title-sm" data-nav-link>Program</a>
                    </li>

                    <li class="navbar-item">
                        <a href="#" class="navbar-link title-sm" data-nav-link>Tentang Kami</a>
                    </li>

                    <li class="navbar-item">
                        <a href="#" class="navbar-link title-sm" data-nav-link>Daftar</a>
                    </li>

                </ul>

            </nav>

            <a href="#" class="btn btn-secondary">Daftar Sekarang</a>

            <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
            </button>

            <div class="overlay" data-overlay data-nav-toggler></div>

        </div>
    </header>

    <main>
        <article>

            <!-- 
        - #HERO
      -->

            <section class="section hero has-bg-image" aria-labelledby="hero-label"
                style="background-image: url('./assets/images/hero-bg.png')">
                <div class="container">

                    <div class="hero-content">

                        <h1 class="headline-lg" id="hero-label">
                            Selamat Datang <span class="span">di Website</span> Kami

                            <p class="title-md has-before">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perspiciatis itaque amet
                                voluptatem, nam quia ad temporibus possimus? Nesciunt veritatis debitis ipsa tempore
                                eius minima totam minus facilis repudiandae natus.
                            </p>

                            <div class="btn-group">
                                <a href="/users/login" class="btn btn-primary">Login Sistem</a>

                                <a href="/students/registration-multi" class="btn btn-secondary">Daftar Siswa</a>
                            </div>

                    </div>

                    <figure class="hero-banner">
                        <img src="./assets/images/hero-banner.png" width="590" height="620" alt="hero banner"
                            class="w-100">
                    </figure>

                </div>
            </section>





            <!-- 
        - #CATEGORY
      -->

            <section class="section category has-bg-image" aria-labelledby="category-label"
                style="background-image: url('./assets/images/category-bg.png')">
                <div class="container">

                    <p class="title-sm text-center section-subtitle" id="category-label">Terbaru</p>

                    <h2 class="headline-md text-center section-title">
                        Program <span class="span has-after">Unggulan</span>
                    </h2>

                    <ul class="grid-list">

                        <li>
                            <div class="card category-card">

                                <div class="card-icon">
                                    <img src="./assets/images/category-1.svg" width="72" height="72" loading="lazy"
                                        alt="Data Science icon">
                                </div>

                                <div>
                                    <h3 class="title-lg">Program 1</h3>

                                    <p class="title-sm">68 Courses</p>
                                </div>

                                <a href="#" class="layer-link" aria-label="Data Science Category"></a>

                            </div>
                        </li>

                        <li>
                            <div class="card category-card">

                                <div class="card-icon">
                                    <img src="./assets/images/category-2.svg" width="72" height="72" loading="lazy"
                                        alt="UI/UX Design icon">
                                </div>

                                <div>
                                    <h3 class="title-lg">Program 2</h3>

                                    <p class="title-sm">68 Courses</p>
                                </div>

                                <a href="#" class="layer-link" aria-label="UI/UX Design Category"></a>

                            </div>
                        </li>

                        <li>
                            <div class="card category-card">

                                <div class="card-icon">
                                    <img src="./assets/images/category-3.svg" width="72" height="72" loading="lazy"
                                        alt="Modern Physics icon">
                                </div>

                                <div>
                                    <h3 class="title-lg">Program 3</h3>

                                    <p class="title-sm">68 Courses</p>
                                </div>

                                <a href="#" class="layer-link" aria-label="Modern Physics Category"></a>

                            </div>
                        </li>

                        <li>
                            <div class="card category-card">

                                <div class="card-icon">
                                    <img src="./assets/images/category-4.svg" width="72" height="72" loading="lazy"
                                        alt="Music Production icon">
                                </div>

                                <div>
                                    <h3 class="title-lg">Program 4</h3>

                                    <p class="title-sm">68 Courses</p>
                                </div>

                                <a href="#" class="layer-link" aria-label="Music Production Category"></a>

                            </div>
                        </li>

                        <li>
                            <div class="card category-card">

                                <div class="card-icon">
                                    <img src="./assets/images/category-5.svg" width="72" height="72" loading="lazy"
                                        alt="Data Science icon">
                                </div>

                                <div>
                                    <h3 class="title-lg">Program 5</h3>

                                    <p class="title-sm">68 Courses</p>
                                </div>

                                <a href="#" class="layer-link" aria-label="Data Science Category"></a>

                            </div>
                        </li>

                        <li>
                            <div class="card category-card">

                                <div class="card-icon">
                                    <img src="./assets/images/category-6.svg" width="72" height="72" loading="lazy"
                                        alt="Finances icon">
                                </div>

                                <div>
                                    <h3 class="title-lg">Program 6</h3>

                                    <p class="title-sm">68 Courses</p>
                                </div>

                                <a href="#" class="layer-link" aria-label="Finances Category"></a>

                            </div>
                        </li>

                    </ul>

                    <a href="#" class="btn btn-primary">Lihat lainnya</a>

                </div>
            </section>


            <!-- 
        - #ABOUT
      -->

            <section class="section about" aria-labelledby="about-label">
                <div class="container">

                    <!-- Pindahkan gambar ke dalam about-content -->
                    <div class="about-content">

                        <p class="title-sm section-subtitle" id="about-label">Sekilas Sejarah</p>

                        <h2 class="headline-md section-title">
                            Sejarah singkat berdirinya Madrasah Diniyah <span class="span has-after">Lam’atun Nur</span>
                        </h2>

                        <!-- TAG FIGURE DIPINDAHKAN KE SINI -->
                        <figure class="about-banner">
                            <img src="./assets/images/about-banner.png" width="775" height="685" loading="lazy"
                                alt="about banner" class="w-100">
                        </figure>

                        <p class="title-sm section-text">
                            Berdirinya Madrasah Diniyah ini dilatarbelakangi oleh semangat dan inisiatif para tokoh
                            agama dan masyarakat, khususnya K. M. Anwar dan KH. Bashori, serta tokoh masyarakat setempat
                            sekitar tahun 1975. Pada saat itu, kegiatan pembelajaran keagamaan hanya dilakukan secara
                            sederhana dengan menghadirkan tenaga pengajar dari Pondok Pesantren Bahrul ‘Ulum Tambakberas
                            Jombang, yaitu Ustadz Arifin, Beliau mengabdikan dirinya di cendoro terutama pada kegiatan
                            keagamaan kurang lebih selama enam tahun.
                            Seiring perkembangan waktu dan setelah Ustadz Arifin kembali kerumah, K. M. Anwar dan KH.
                            Bashori mulai berfikir untuk mencarikan guru bantu dari Pondok Pesantren Langitan Tuban
                            untuk membantu mengajar di Desa Cendoro terutama pada masalah keagamaan.
                            Setelah K. M. Anwar dan KH. Bashori dari pondok Pesantren langitan ahirnya estafet
                            perjuangan pendidikan keagamaan di cendoro dilanjutkan oleh Ustadz Naj Mudzakir dari
                            Sidoarjo beliau adalah salah satu santri dari pondok pesantren langitan Tuban ( sekitar
                            tahun 1981 ). Dari proses perjalanan panjang inilah kemudian terbentuklah nama madrasah
                            diniyah yaitu “LAM’ATUN NUR” sebagai identitas madrasah yang dikenal dan di perjuangakan
                            sampai saat ini.
                            Pada saat itu kegiatan pembelajaran Madrasah Diniyah difokuskan pada penguatan dasar ilmu
                            keislaman, meliputi Al-Qur’an dan Hadits, Fiqih, Aqidah Akhlak, Sejarah Islam, Bahasa Arab,
                            serta ilmu alat seperti Nahwu dan Sharaf. Proses pembelajaran madrasah Diniyah ini
                            dilaksanakan pada malam hari, yaitu pada pukul 18.00 hingga 20.00 WIB, sebagai bentuk
                            penyesuaian dengan aktivitas santri di siang hari.
                            Madrasah Diniyah Lam’atun Nur merupakan lembaga pendidikan keagamaan yang beralamat di Dusun
                            Cendoro Selatan, Jalan Rembes–Pakah Km 03, Desa Cendoro, Kecamatan Palang, Kabupaten Tuban.
                            Seiring berjalannya waktu dan aturan yang ada Madrasah Diniyah ini ada penembahan Nama Yaitu
                            Madrasah Diniyah Takmiliyah Awwaliyah Lam’atun Nur ( MDTA ) ini mendapat IZOP dari Kemenag
                            Tuban pada tahun 2005. With Nomor Statistik Diniyah Takmiliyah (NSDT) 311235230128.
                        </p>

                    </div>

                </div>
            </section>


            <!-- 
        - #COURSE
      -->

            <section class="section course has-bg-image" aria-labelledby="course-label"
                style="background-image: url('./assets/images/course-bg.png')">
                <div class="container">

                    <p class="title-sm section-subtitle text-center">Prestasi</p>

                    <h2 class="headline-md section-title text-center" id="course-label">
                        Lihat Prestasi<span class="span has-after">Kami</span>
                    </h2>

                    <ul class="grid-list">

                        <li class="card-container">
                            <div class="card course-card">

                                <figure class="card-banner">
                                    <img src="./assets/images/prestasi.png" width="370" height="248" loading="lazy"
                                        alt="Basic Fundamentals of Interior & Graphics Design" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="wrapper">

                                        <p class="title-lg card-price">Rizki Febian</p>

                                        <div class="rating-wrapper">
                                            <img src="./assets/images/star-fill.svg" width="16" height="16"
                                                loading="lazy" alt="">
                                            <img src="./assets/images/star-fill.svg" width="16" height="16"
                                                loading="lazy" alt="">
                                        </div>

                                    </div>

                                    <h3 class="title-lg card-title">
                                        Juara 2 Kategori Lomba x
                                    </h3>

                                    <div class="card-meta wrapper">

                                        <p class="title-sm">
                                            <img src="./assets/images/file-outline.svg" width="20" height="20"
                                                loading="lazy" alt="">

                                            <span class="span">Tingkat Kecamatan</span>
                                        </p>


                                    </div>

                                </div>

                                <a href="#" class="layer-link"
                                    aria-label="Course Details, Basic Fundamentals of Interior & Graphics Design"></a>

                            </div>
                        </li>
                        <li class="card-container">
                            <div class="card course-card">

                                <figure class="card-banner">
                                    <img src="./assets/images/prestasi.png" width="370" height="248" loading="lazy"
                                        alt="Basic Fundamentals of Interior & Graphics Design" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="wrapper">

                                        <p class="title-lg card-price">Rizki Febian</p>

                                        <div class="rating-wrapper">
                                            <img src="./assets/images/star-fill.svg" width="16" height="16"
                                                loading="lazy" alt="">
                                            <img src="./assets/images/star-fill.svg" width="16" height="16"
                                                loading="lazy" alt="">
                                        </div>

                                    </div>

                                    <h3 class="title-lg card-title">
                                        Juara 2 Kategori Lomba x
                                    </h3>

                                    <div class="card-meta wrapper">

                                        <p class="title-sm">
                                            <img src="./assets/images/file-outline.svg" width="20" height="20"
                                                loading="lazy" alt="">

                                            <span class="span">Tingkat Kecamatan</span>
                                        </p>


                                    </div>

                                </div>

                                <a href="#" class="layer-link"
                                    aria-label="Course Details, Basic Fundamentals of Interior & Graphics Design"></a>

                            </div>
                        </li>
                        <li class="card-container">
                            <div class="card course-card">

                                <figure class="card-banner">
                                    <img src="./assets/images/prestasi.png" width="370" height="248" loading="lazy"
                                        alt="Basic Fundamentals of Interior & Graphics Design" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="wrapper">

                                        <p class="title-lg card-price">Rizki Febian</p>

                                        <div class="rating-wrapper">
                                            <img src="./assets/images/star-fill.svg" width="16" height="16"
                                                loading="lazy" alt="">
                                            <img src="./assets/images/star-fill.svg" width="16" height="16"
                                                loading="lazy" alt="">
                                        </div>

                                    </div>

                                    <h3 class="title-lg card-title">
                                        Juara 2 Kategori Lomba x
                                    </h3>

                                    <div class="card-meta wrapper">

                                        <p class="title-sm">
                                            <img src="./assets/images/file-outline.svg" width="20" height="20"
                                                loading="lazy" alt="">

                                            <span class="span">Tingkat Kecamatan</span>
                                        </p>


                                    </div>

                                </div>

                                <a href="#" class="layer-link"
                                    aria-label="Course Details, Basic Fundamentals of Interior & Graphics Design"></a>

                            </div>
                        </li>
                        <li class="card-container">
                            <div class="card course-card">

                                <figure class="card-banner">
                                    <img src="./assets/images/prestasi.png" width="370" height="248" loading="lazy"
                                        alt="Basic Fundamentals of Interior & Graphics Design" class="img-cover">
                                </figure>

                                <div class="card-content">

                                    <div class="wrapper">

                                        <p class="title-lg card-price">Rizki Febian</p>

                                        <div class="rating-wrapper">
                                            <img src="./assets/images/star-fill.svg" width="16" height="16"
                                                loading="lazy" alt="">
                                            <img src="./assets/images/star-fill.svg" width="16" height="16"
                                                loading="lazy" alt="">
                                        </div>

                                    </div>

                                    <h3 class="title-lg card-title">
                                        Juara 2 Kategori Lomba x
                                    </h3>

                                    <div class="card-meta wrapper">

                                        <p class="title-sm">
                                            <img src="./assets/images/file-outline.svg" width="20" height="20"
                                                loading="lazy" alt="">

                                            <span class="span">Tingkat Kecamatan</span>
                                        </p>


                                    </div>

                                </div>

                                <a href="#" class="layer-link"
                                    aria-label="Course Details, Basic Fundamentals of Interior & Graphics Design"></a>

                            </div>
                        </li>

                    </ul>

                    <a href="#" class="btn btn-primary">Lihat lainnya</a>

                </div>
            </section>
            <!-- 
        - #CTA
      -->

            <section class="visimisi" style="background-color: var(--keppei);">
                <div class="container">
                    <!-- Judul di atas -->
                    <p class="headline-md section-title text-center" style="color: #EFF8F6;">VISI-MISI</p>

                    <h2 class="headline-md section-title text-center" id="course-label">
                        Madrasah Diniyah<span class="span has-after">Lam'atun Nur</span>
                    </h2>

                    <!-- Layout Kiri: Visi, Kanan: Misi -->
                    <div class="visimisi-grid">
                        <!-- VISI (Kiri) -->
                        <div class="visi-card">
                            <h3 class="card-title">Visi</h3>
                            <p class="visi-text">
                                Terwujudnya generasi muslim yang beriman, bertaqwa, berakhlak mulia,
                                dan memiliki pemahaman keislaman yang mendalam untuk mengamalkan ilmu
                                agama dalam kehidupan bermasyarakat.
                            </p>
                        </div>

                        <!-- MISI (Kanan) -->
                        <div class="misi-card">
                            <h3 class="card-title">Misi</h3>
                            <ul class="misi-list">
                                <li>
                                    <span class="misi-number">1</span>
                                    <span class="misi-text">Menyelenggarakan pembelajaran Al-Qur'an, Hadits, Fiqih, dan
                                        Aqidah Akhlak secara sistematis.</span>
                                </li>
                                <li>
                                    <span class="misi-number">2</span>
                                    <span class="misi-text">Membekali santri dengan ilmu alat (Nahwu & Sharaf) serta
                                        Bahasa Arab.</span>
                                </li>
                                <li>
                                    <span class="misi-number">3</span>
                                    <span class="misi-text">Menanamkan nilai-nilai akhlak mulia dan sejarah Islam dalam
                                        kehidupan sehari-hari.</span>
                                </li>
                                <li>
                                    <span class="misi-number">4</span>
                                    <span class="misi-text">Meningkatkan kualitas tenaga pengajar sesuai standar
                                        pesantren.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>


        </article>
    </main>





    <!-- 
    - #FOOTER
  -->

    <footer class="footer has-bg-image" style="background-image: url('./assets/images/footer-bg.png')">

        <div class="section footer-top">
            <div class="container">

                <div class="footer-brand">

                    <a href="#" class="logo">
                        <span class="brand-text">LAM'ATTUN NUR</span> </a>

                    <p class="title-sm footer-text">
                        Lorem ipsum amet, consectetur adipiscing elit. Suspendis varius enim eros elementum tristique.
                        Duis cursus.
                    </p>

                    <ul class="social-list">

                        <li>
                            <a href="#" class="social-link">
                                <img src="./assets/images/facebook.svg" width="40" height="40" loading="lazy"
                                    alt="facebook">
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <img src="./assets/images/twitter.svg" width="40" height="40" loading="lazy"
                                    alt="twitter">
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <img src="./assets/images/pinterest.svg" width="40" height="40" loading="lazy"
                                    alt="pinterest">
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <img src="./assets/images/instagram.svg" width="40" height="40" loading="lazy"
                                    alt="instagram">
                            </a>
                        </li>

                    </ul>

                </div>

                <ul class="footer-list">

                    <li>
                        <p class="headline-sm footer-list-title">Links</p>
                    </li>

                    <li>
                        <a href="#" class="title-sm footer-link">Home</a>
                    </li>

                    <li>
                        <a href="#" class="title-sm footer-link">About Us</a>
                    </li>

                    <li>
                        <a href="#" class="title-sm footer-link">Courses</a>
                    </li>

                    <li>
                        <a href="#" class="title-sm footer-link">Contact Us</a>
                    </li>

                    <li>
                        <a href="#" class="title-sm footer-link">Blog</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="headline-sm footer-list-title">Legal</p>
                    </li>

                    <li>
                        <a href="#" class="title-sm footer-link">Legal</a>
                    </li>

                    <li>
                        <a href="#" class="title-sm footer-link">Tearms of Use</a>
                    </li>

                    <li>
                        <a href="#" class="title-sm footer-link">Tearm & Condition</a>
                    </li>

                    <li>
                        <a href="#" class="title-sm footer-link">Privacy Policy</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>

                        <p class="headline-sm footer-list-title">Instagram Post</p>

                        <ul class="grid-list">

                            <li>
                                <img src="./assets/images/prestasi.png" width="80" height="80" loading="lazy"
                                    alt="instagram post" class="img-cover">
                            </li>
                            <li>
                                <img src="./assets/images/prestasi.png" width="80" height="80" loading="lazy"
                                    alt="instagram post" class="img-cover">
                            </li>
                            <li>
                                <img src="./assets/images/prestasi.png" width="80" height="80" loading="lazy"
                                    alt="instagram post" class="img-cover">
                            </li>
                            <li>
                                <img src="./assets/images/prestasi.png" width="80" height="80" loading="lazy"
                                    alt="instagram post" class="img-cover">
                            </li>
                            <li>
                                <img src="./assets/images/prestasi.png" width="80" height="80" loading="lazy"
                                    alt="instagram post" class="img-cover">
                            </li>
                            <li>
                                <img src="./assets/images/prestasi.png" width="80" height="80" loading="lazy"
                                    alt="instagram post" class="img-cover">
                            </li>
                        </ul>

                    </li>

                </ul>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">

                <p class="copyright">
                    © Copyright 2026 MADRASAH DINIYAH TAKMALIYAH AWALIYAH
                </p>

            </div>
        </div>

    </footer>





    <!-- 
   - custom js link
  -->
    <script src="/assets/js/script.js"></script>

    <!-- 
    - ionicon
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>