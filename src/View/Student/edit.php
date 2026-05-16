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
                            <h3>Edit Data Santri</h3>
                            <p class="text-subtitle text-muted">Perbaharui informasi data santri</p>
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
                                        Edit Santri
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
                                <i class="bi bi-pencil-square"></i> Form Edit Santri
                            </h5>
                        </div>
                        <div class="card-body">
                            <form action="/students/update" method="post" enctype="multipart/form-data"
                                class="form form-horizontal">
                                <input type="hidden" name="id" value="<?= $model['student']->id ?>">

                                <!-- Foto Profile -->
                                <div class="form-group mb-4">
                                    <label class="mb-2 fw-bold">Foto Santri</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php if (!empty($model['student']->img)): ?>
                                                <div class="text-center">
                                                    <img src="/uploads/photos/students-registration/<?= $model['student']->img ?>"
                                                        alt="Foto <?= htmlspecialchars($model['student']->full_name) ?>"
                                                        class="img-fluid rounded-circle border border-3 border-primary"
                                                        style="width: 150px; height: 150px; object-fit: cover;">
                                                    <p class="text-muted small mt-2">Foto saat ini</p>
                                                </div>
                                            <?php else: ?>
                                                <div class="text-center">
                                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto"
                                                        style="width: 150px; height: 150px;">
                                                        <i class="bi bi-person fs-1 text-muted"></i>
                                                    </div>
                                                    <p class="text-muted small mt-2">Belum ada foto</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="mb-3">
                                                <label class="form-label">Upload Foto Baru</label>
                                                <input type="file" name="img" class="form-control">
                                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.
                                                    Format: JPG, PNG, JPEG (Max: 2MB)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mb-4">
                                            <div class="card-header bg-light py-2">
                                                <h6 class="card-title mb-0">
                                                    <i class="bi bi-person-circle text-primary"></i> Biodata Pribadi
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Nama Lengkap <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="full_name" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->full_name) ?>"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">NIK Siswa <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="student_nik" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->student_nik) ?>"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Tempat Lahir</label>
                                                        <input type="text" name="birth_place" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->birth_place) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Tanggal Lahir</label>
                                                        <input type="date" name="birth_date" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->birth_date) ?>">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label fw-bold">Alamat Siswa</label>
                                                        <textarea name="address" class="form-control"
                                                            rows="2"><?= htmlspecialchars($model['student']->address) ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-4">
                                                        <label class="form-label fw-bold">Jenis Kelamin</label>
                                                        <select name="gender" class="form-select">
                                                            <option value="L" <?= $model['student']->gender == 'L' ? 'selected' : '' ?>>
                                                                Laki-laki
                                                            </option>

                                                            <option value="P" <?= $model['student']->gender == 'P' ? 'selected' : '' ?>>
                                                                Perempuan
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label fw-bold">Agama</label>
                                                        <select name="religion" class="form-select">
                                                            <option value="Islam"
                                                                <?= $model['student']->religion == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                                            <option value="Kristen"
                                                                <?= $model['student']->religion == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                                                            <option value="Katolik"
                                                                <?= $model['student']->religion == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                                                            <option value="Hindu"
                                                                <?= $model['student']->religion == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                                            <option value="Buddha"
                                                                <?= $model['student']->religion == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                                                            <option value="Konghucu"
                                                                <?= $model['student']->religion == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label fw-bold">Anak Ke-</label>
                                                        <input type="number" name="child_order" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->child_order) ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label fw-bold">Jumlah Saudara</label>
                                                        <input type="number" name="total_siblings" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->total_siblings) ?>">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label fw-bold">No. HP Orang Tua</label>
                                                        <input type="text" name="parent_phone" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->parent_phone) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Data Sekolah Asal -->
                                        <div class="card mb-4">
                                            <div class="card-header bg-light py-2">
                                                <h6 class="card-title mb-0">
                                                    <i class="bi bi-building text-success"></i> Data Sekolah Asal
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label fw-bold">Nama Sekolah</label>
                                                        <input type="text" name="school_name" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->school_name) ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Kelas Asal</label>
                                                        <input type="text" name="school_class" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->school_class) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Alamat Sekolah</label>
                                                        <input type="text" name="school_address" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->school_address) ?>">
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
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Nama Ayah</label>
                                                        <input type="text" name="father_name" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->father_name) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Pekerjaan Ayah</label>
                                                        <input type="text" name="father_job" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->father_job) ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Nama Ibu</label>
                                                        <input type="text" name="mother_name" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->mother_name) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Pekerjaan Ibu</label>
                                                        <input type="text" name="mother_job" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->mother_job) ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label fw-bold">Alamat Orang Tua</label>
                                                        <textarea name="parent_address" class="form-control"
                                                            rows="2"><?= htmlspecialchars($model['student']->parent_address) ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Data Wali (Opsional) -->
                                        <div class="card mb-4">
                                            <div class="card-header bg-light py-2">
                                                <h6 class="card-title mb-0">
                                                    <i class="bi bi-person-plus-fill text-warning"></i> Data Wali
                                                    (Opsional)
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Nama Wali</label>
                                                        <input type="text" name="guardian_name" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->guardian_name) ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label fw-bold">Pekerjaan Wali</label>
                                                        <input type="text" name="guardian_job" class="form-control"
                                                            value="<?= htmlspecialchars($model['student']->guardian_job) ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label fw-bold">Alamat Wali</label>
                                                        <textarea name="guardian_address" class="form-control"
                                                            rows="2"><?= htmlspecialchars($model['student']->guardian_address) ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Status Administrasi -->
                                        <div class="card mb-4">
                                            <div class="card-header bg-light py-2">
                                                <h6 class="card-title mb-0">
                                                    <i class="bi bi-check-circle-fill text-danger"></i> Status
                                                    Administrasi
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-check">
                                                    <input type="hidden" name="is_re_registered" value="0">
                                                    <input type="checkbox" name="is_re_registered" value="1"
                                                        class="form-check-input" id="isReRegistered"
                                                        <?= $model['student']->is_re_registered == 1 ? 'checked' : '' ?>>
                                                    <label class="form-check-label" for="isReRegistered">
                                                        Sudah Daftar Ulang
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="d-flex gap-2 flex-wrap">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-save"></i> Update Data
                                        </button>
                                        <a href="/students/show/<?= $model['student']->id ?>" class="btn btn-secondary">
                                            <i class="bi bi-eye"></i> Lihat Detail
                                        </a>
                                        <a href="/students/data" class="btn btn-light">
                                            <i class="bi bi-arrow-left"></i> Kembali
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <style>
        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #435ebe;
            box-shadow: 0 0 0 0.2rem rgba(67, 94, 190, 0.25);
        }

        .card-header.bg-light {
            background-color: #f8f9fa;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }

        .btn {
            padding: 0.45rem 1.2rem;
            font-weight: 500;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }
    </style>

    <script>
        // Preview foto sebelum upload
        document.querySelector('input[name="img"]')?.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.querySelector('.rounded-circle');
                    if (preview && preview.tagName === 'IMG') {
                        preview.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="/assets/compiled/js/app.js"></script>

    <!-- Menggunakan Simple Datatables bawaan default Mazer -->
    <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/static/js/pages/simple-datatables.js"></script>


</body>

</html>