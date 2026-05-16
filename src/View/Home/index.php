<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <!-- Mazer CSS -->
    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="/assets/compiled/css/iconly.css">
</head>

<body>

    <div class="container mt-5">

        <!-- Judul -->
        <div class="text-center mb-5">
            <h1 class="fw-bold"><?= $model['content'] ?? 'Welcome' ?></h1>
            <p class="text-muted">Sistem Pendaftaran Siswa Baru</p>
            <p class="text-muted">MADRASAH DINIYAH TAKMILIYAH AWWALIAYAH
            <p>“ LAM’ATUN NUR “</p>
            Cendoro – Palang – Tuban
            Tahun Pelajaran 2026 / 2027
            </p>
        </div>

        <!-- Card Menu -->
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h4>Login</h4>
                        <p class="text-muted">Masuk ke sistem</p>
                        <a href="/users/login" class="btn btn-primary w-100">
                            LOGIN
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h4>Pendaftaran</h4>
                        <p class="text-muted">Daftar siswa baru</p>
                        <a href="/students/registration-multi" class="btn btn-success w-100">
                            PENDAFTARAN SISWA BARU
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>