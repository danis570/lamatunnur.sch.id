<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat data</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon/favicon.ico">

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">

    <link rel="manifest" href="/favicon/site.webmanifest">

    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css">

    <link rel="stylesheet" crossorigin href="/assets/compiled/css/table-datatable.css">
    <link rel="stylesheet" crossorigin href="/assets/compiled/css/app.css">
    <link rel="stylesheet" crossorigin href="/assets/compiled/css/app-dark.css">
</head>

<body>
    <script src="/assets/static/js/initTheme.js"></script>
    <div id="app">
        <?php require __DIR__ . '/../Components/navbar.php' ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Detail Data Santri</h3>
                            <p class="text-subtitle text-muted">Informasi lengkap data santri</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/">
                                            <i class="bi bi-house-door"></i> Dashboard
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="/students/data">Data Santri</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Detail Santri
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="bi bi-person-badge"></i> Profil Santri
                            </h5>
                        </div>
                        <div class="card-body">
                            <!-- Foto Profil -->
                            <?php if (!empty($model['student']->img)) { ?>
                                <div class="row mb-4">
                                    <div class="col-12 text-center">
                                        <div class="avatar avatar-xl mb-3"
                                            style="width: 150px; height: 150px; margin: 0 auto;">
                                            <img src="/uploads/photos/students-registration/<?= $model['student']->img ?>"
                                                alt="Foto Santri"
                                                class="avatar-img rounded-circle border border-3 border-primary"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        <h5 class="mt-2"><?= htmlspecialchars($model['student']->full_name) ?></h5>
                                        <p class="text-muted">NIS:
                                            <?= htmlspecialchars($model['student']->student_nik ?? '-') ?>
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Biodata Pribadi -->
                            <div class="card mb-4">
                                <div class="card-header bg-light py-2">
                                    <h6 class="card-title mb-0">
                                        <i class="bi bi-person-circle text-primary"></i> Biodata Pribadi
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-3 fw-bold">Nama Lengkap</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->full_name) ?>
                                        </div>
                                        <div class="col-md-3 fw-bold">NIK</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->student_nik) ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3 fw-bold">Tempat Lahir</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->birth_place) ?>
                                        </div>
                                        <div class="col-md-3 fw-bold">Tanggal Lahir</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->birth_date) ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3 fw-bold">Alamat</div>
                                        <div class="col-md-9">: <?= htmlspecialchars($model['student']->address) ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3 fw-bold">Jenis Kelamin</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->gender) ?></div>
                                        <div class="col-md-3 fw-bold">Agama</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->religion) ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3 fw-bold">Anak Ke-</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->child_order) ?>
                                        </div>
                                        <div class="col-md-3 fw-bold">Jumlah Saudara</div>
                                        <div class="col-md-3">:
                                            <?= htmlspecialchars($model['student']->total_siblings) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 fw-bold">No HP Orang Tua</div>
                                        <div class="col-md-9">: <?= htmlspecialchars($model['student']->parent_phone) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Sekolah -->
                            <div class="card mb-4">
                                <div class="card-header bg-light py-2">
                                    <h6 class="card-title mb-0">
                                        <i class="bi bi-building text-success"></i> Data Sekolah
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-3 fw-bold">Nama Sekolah</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->school_name) ?>
                                        </div>
                                        <div class="col-md-3 fw-bold">Kelas</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->school_class) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 fw-bold">Alamat Sekolah</div>
                                        <div class="col-md-9">:
                                            <?= htmlspecialchars($model['student']->school_address) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Orang Tua -->
                            <div class="card mb-4">
                                <div class="card-header bg-light py-2">
                                    <h6 class="card-title mb-0">
                                        <i class="bi bi-people-fill text-info"></i> Data Orang Tua
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-3 fw-bold">Nama Ayah</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->father_name) ?>
                                        </div>
                                        <div class="col-md-3 fw-bold">Pekerjaan Ayah</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->father_job) ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3 fw-bold">Nama Ibu</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->mother_name) ?>
                                        </div>
                                        <div class="col-md-3 fw-bold">Pekerjaan Ibu</div>
                                        <div class="col-md-3">: <?= htmlspecialchars($model['student']->mother_job) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 fw-bold">Alamat Orang Tua</div>
                                        <div class="col-md-9">:
                                            <?= htmlspecialchars($model['student']->parent_address) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Wali -->
                            <?php if (!empty($model['student']->guardian_name)) { ?>
                                <div class="card mb-4">
                                    <div class="card-header bg-light py-2">
                                        <h6 class="card-title mb-0">
                                            <i class="bi bi-person-plus-fill text-warning"></i> Data Wali
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-3 fw-bold">Nama Wali</div>
                                            <div class="col-md-3">:
                                                <?= htmlspecialchars($model['student']->guardian_name) ?>
                                            </div>
                                            <div class="col-md-3 fw-bold">Pekerjaan Wali</div>
                                            <div class="col-md-3">: <?= htmlspecialchars($model['student']->guardian_job) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 fw-bold">Alamat Wali</div>
                                            <div class="col-md-9">:
                                                <?= htmlspecialchars($model['student']->guardian_address) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Status -->
                            <div class="card mb-4">
                                <div class="card-header bg-light py-2">
                                    <h6 class="card-title mb-0">
                                        <i class="bi bi-check-circle-fill text-danger"></i> Status
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 fw-bold">Status Daftar Ulang</div>
                                        <div class="col-md-9">
                                            <?php if ($model['student']->is_re_registered) { ?>
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle"></i> Sudah Daftar Ulang
                                                </span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger">
                                                    <i class="bi bi-x-circle"></i> Belum Daftar Ulang
                                                </span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        // Ambil role dari model atau session
                        $userRole = $model['userRole'] ?? $_SESSION['user']['role'] ?? 'USER';
                        // Pastikan role uppercase untuk perbandingan
                        $userRole = strtoupper($userRole);
                        ?>

                        <div class="card-footer">
                            <div class="d-flex gap-2 flex-wrap">
                                <!-- Tombol Kembali - SEMUA ROLE BISA -->
                                <a href="/students/data" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>

                                <!-- Tombol Edit Data - HANYA ADMIN -->
                                <?php if ($userRole === 'ADMIN'): ?>
                                    <a href="/students/edit/<?= $model['student']->id ?>" class="btn btn-primary">
                                        <i class="bi bi-pencil-square"></i> Edit Data
                                    </a>
                                <?php endif; ?>

                                <!-- Tombol Export PDF - HANYA ADMIN (atau semua role jika diinginkan) -->
                                <?php if ($userRole === 'ADMIN'): ?>
                                    <a href="/students/export/pdf/<?= $model['student']->id ?>" class="btn btn-danger">
                                        <i class="bi bi-file-pdf"></i> Export PDF
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="/assets/compiled/js/app.js"></script>

    <!-- Menggunakan Simple Datatables bawaan default Mazer -->
    <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/static/js/pages/simple-datatables.js"></script>


</body>

</html>