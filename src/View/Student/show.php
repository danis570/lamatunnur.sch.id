<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable - Mazer Admin Dashboard</title>

    <link rel="shortcut icon"
        href="data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%2033%2034'%20fill-rule='evenodd'%20stroke-linejoin='round'%20stroke-miterlimit='2'%20xmlns:v='https://vecta.io/nano'%3e%3cpath%20d='M3%2027.472c0%204.409%206.18%205.552%2013.5%205.552%207.281%200%2013.5-1.103%2013.5-5.513s-6.179-5.552-13.5-5.552c-7.281%200-13.5%201.103-13.5%205.513z'%20fill='%23435ebe'%20fill-rule='nonzero'/%3e%3ccircle%20cx='16.5'%20cy='8.8'%20r='8.8'%20fill='%2341bbdd'/%3e%3c/svg%3e"
        type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">

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