<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon/favicon.ico">

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">

    <link rel="manifest" href="/favicon/site.webmanifest">


    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css">

    <style>
        body {
            background-color: #f2f7ff;
            font-family: 'Nunito', sans-serif;
        }

        .success-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: none;
            max-width: 480px;
            width: 100%;
        }

        .success-icon-box {
            width: 72px;
            height: 72px;
            background-color: #e8f5e9;
            color: #2e7d32;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .info-box {
            background-color: #f8f9fa;
            border-radius: 12px;
            border: 1px solid #e9ecef;
        }

        .btn-mazer-primary {
            background-color: #435ebe;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .btn-mazer-primary:hover {
            background-color: #3850a2;
            color: #fff;
        }

        .btn-mazer-danger {
            background-color: #ff3b30;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .btn-mazer-danger:hover {
            background-color: #d32f2f;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="d-flex align-items-center justify-content-center min-vh-100 p-3">

        <div class="card success-card m-0">

            <div class="card-body p-4 p-sm-5 text-center">

                <!-- Icon -->
                <div class="mb-4">
                    <div class="success-icon-box">
                        <i class="bi bi-check-lg" style="font-size: 36px;"></i>
                    </div>
                </div>

                <!-- Title -->
                <h3 class="fw-bold text-dark mb-2">
                    Pendaftaran Berhasil!
                </h3>

                <p class="text-muted mb-4 fs-6">
                    Data santri telah disimpan dengan aman di dalam sistem kami.
                </p>

                <!-- Info -->
                <div class="info-box p-3 mb-4 text-start">

                    <span class="text-uppercase tracking-wider text-muted fw-bold d-block mb-3"
                        style="font-size: 0.75rem; letter-spacing: 0.5px;">
                        Ringkasan Data
                    </span>

                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light">
                        <span class="text-muted small">
                            Nama Lengkap
                        </span>

                        <span class="fw-semibold text-dark text-end" style="max-width: 60%; word-break: break-word;">
                            <?= htmlspecialchars($model['student']->full_name) ?>
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light">
                        <span class="text-muted small">
                            NIK
                        </span>

                        <span class="fw-semibold text-dark">
                            <?= htmlspecialchars($model['student']->student_nik) ?>
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center py-2">

                        <span class="text-muted small">
                            Status
                        </span>

                        <div>
                            <?php if ($model['student']->is_re_registered): ?>

                                <span class="badge bg-light-success text-success px-2 py-1 fw-bold"
                                    style="font-size: 0.75rem;">
                                    Sudah Daftar Ulang
                                </span>

                            <?php else: ?>

                                <span class="badge bg-light-warning text-warning px-2 py-1 fw-bold"
                                    style="font-size: 0.75rem;">
                                    Belum Daftar Ulang
                                </span>

                            <?php endif; ?>
                        </div>

                    </div>

                </div>

                <!-- Buttons -->
                <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center">

                    <a href="/students/export/pdf/<?= $model['studentId'] ?>" class="btn btn-mazer-danger px-4"
                        target="_blank" id="downloadPdfBtn">

                        <i class="bi bi-file-pdf-fill me-1"></i>
                        Download PDF

                    </a>

                    <a href="/" class="btn btn-mazer-primary px-4">
                        <i class="bi bi-house-door-fill me-1"></i>
                        Ke Beranda
                    </a>

                </div>

            </div>

        </div>

    </div>

    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/compiled/js/app.js"></script>

</body>

</html>