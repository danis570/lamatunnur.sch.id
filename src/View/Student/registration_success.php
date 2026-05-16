<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil - Mazer Admin Dashboard</title>

    <link rel="shortcut icon"
        href="data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%2033%2034'%20fill-rule='evenodd'%20stroke-linejoin='round'%20stroke-miterlimit='2'%20xmlns:v='https://vecta.io/nano'%3e%3cpath%20d='M3%2027.472c0%204.409%206.18%205.552%2013.5%205.552%207.281%200%2013.5-1.103%2013.5-5.513s-6.179-5.552-13.5-5.552c-7.281%200-13.5%201.103-13.5%205.513z'%20fill='%23435ebe'%20fill-rule='nonzero'/%3e%3ccircle%20cx='16.5'%20cy='8.8'%20r='8.8'%20fill='%2341bbdd'/%3e%3c/svg%3e"
        type="image/x-icon">

    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .success-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            border: none;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .bg-light {
            background-color: #f8f9fa !important;
            border-radius: 15px;
        }

        .badge.bg-success {
            background: #28a745 !important;
        }

        .badge.bg-warning {
            background: #ffc107 !important;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="success-container">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-check-circle-fill"></i> Registrasi Berhasil
                    </h5>
                </div>
                <div class="card-body text-center py-4">
                    <!-- Icon Sukses -->
                    <div class="mb-4">
                        <div class="mx-auto"
                            style="width: 80px; height: 80px; background: #28a745; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-check-lg text-white" style="font-size: 48px;"></i>
                        </div>
                    </div>

                    <h3 class="mb-2 text-success">Pendaftaran Berhasil!</h3>
                    <p class="mb-4 text-muted">Data santri telah berhasil disimpan ke sistem.</p>

                    <!-- Info Santri -->
                    <div class="bg-light mb-4 p-3">
                        <h6 class="mb-3">Informasi Pendaftaran:</h6>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td class="fw-bold">Nama Lengkap:</td>
                                <td class="text-start"><?= htmlspecialchars($model['student']->full_name) ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">NIK:</td>
                                <td class="text-start"><?= htmlspecialchars($model['student']->student_nik) ?></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Status:</td>
                                <td class="text-start">
                                    <?php if ($model['student']->is_re_registered): ?>
                                        <span class="badge bg-success">Sudah Daftar Ulang</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning">Belum Daftar Ulang</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="/students/export/pdf/<?= $model['studentId'] ?>"
                            class="btn btn-danger px-4" target="_blank">
                            <i class="bi bi-file-pdf-fill"></i> Download PDF
                        </a>
                        <a href="/" class="btn btn-primary px-4">
                            <i class="bi bi-house-door-fill"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/compiled/js/app.js"></script>
</body>

</html>