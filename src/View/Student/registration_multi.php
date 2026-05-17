<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi tahun Ajaran 2026/2027</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon/favicon.ico">

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">

    <link rel="manifest" href="/favicon/site.webmanifest">
    

    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="/assets/compiled/css/iconly.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

</head>

<body>
    <script src="/assets/static/js/initTheme.js"></script>

    <div>

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="page-heading">
                        <div class="page-title text-center mb-4">
                            <h3>Registrasi Santri Baru 2026</h3>
                            <p class="text-subtitle text-muted">Isi data pendaftaran santri baru dengan lengkap dan mari jadi bagian dari kami</p>
                        </div>

                        <section class="section">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title text-center">
                                        <i class="bi bi-person-plus-fill"></i> Form Pendaftaran Santri Baru
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <!-- Step Indicator -->
                                    <div class="step-indicator">
                                        <div class="step" id="step1Indicator">
                                            <div class="step-circle">1</div>
                                            <div class="step-label">Data Pribadi</div>
                                        </div>
                                        <div class="step" id="step2Indicator">
                                            <div class="step-circle">2</div>
                                            <div class="step-label">Data Sekolah</div>
                                        </div>
                                        <div class="step" id="step3Indicator">
                                            <div class="step-circle">3</div>
                                            <div class="step-label">Data Orang Tua & Wali</div>
                                        </div>
                                    </div>

                                    <!-- Progress Bar -->
                                    <div class="progress mb-4" style="height: 8px;">
                                        <div class="progress-bar bg-primary" id="progressBar" style="width: 33.33%">
                                        </div>
                                    </div>

                                    <!-- Error Message -->
                                    <?php if (isset($model['error'])): ?>
                                        <div class="alert alert-danger alert-dismissible fade show text-center"
                                            role="alert">
                                            <i class="bi bi-exclamation-triangle-fill"></i>
                                            <?= htmlspecialchars($model['error']) ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Form -->
                                    <form action="/students/registration-step" method="post"
                                        enctype="multipart/form-data" id="multiStepForm">
                                        <input type="hidden" name="step" id="currentStep"
                                            value="<?= $model['currentStep'] ?>">

                                        <!-- STEP 1: Data Pribadi -->
                                        <div id="step1Content" class="form-step">
                                            <div class="row">
                                                <div class="col-12 text-center mb-4">
                                                    <div class="position-relative d-inline-block">
                                                        <?php if (!empty($model['formData']['img'])): ?>
                                                            <img src="/uploads/photos/students-registration/<?= $model['formData']['img'] ?>"
                                                                class="rounded-circle border border-3 border-primary"
                                                                id="photoPreview"
                                                                style="width: 120px; height: 120px; object-fit: cover;">
                                                        <?php else: ?>
                                                            <img src="https://ui-avatars.com/api/?background=435ebe&color=fff&name=<?= urlencode($model['formData']['full_name'] ?? 'User') ?>"
                                                                class="rounded-circle border border-3 border-primary"
                                                                id="photoPreview"
                                                                style="width: 120px; height: 120px; object-fit: cover;">
                                                        <?php endif; ?>
                                                        <button type="button"
                                                            class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle"
                                                            id="uploadPhotoBtn" style="width: 32px; height: 32px;">
                                                            <i class="bi bi-camera-fill"></i>
                                                        </button>
                                                        <input type="file" name="img" id="photoInput" accept="image/*"
                                                            style="display: none;">
                                                    </div>
                                                    <small class="text-muted d-block mt-2">Format: JPG, PNG
                                                        (3x4)</small>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Nama Lengkap <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="full_name" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['full_name'] ?? '') ?>"
                                                        required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">NIK <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="student_nik" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['student_nik'] ?? '') ?>"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Tempat Lahir <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="birth_place" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['birth_place'] ?? '') ?>"
                                                        required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Tanggal Lahir <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" name="birth_date" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['birth_date'] ?? '') ?>"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Alamat <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="address" class="form-control" rows="2"
                                                    required><?= htmlspecialchars($model['formData']['address'] ?? '') ?></textarea>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label fw-bold">Jenis Kelamin <span
                                                            class="text-danger">*</span></label>
                                                    <select name="gender" class="form-select" required>
                                                        <option value="">Pilih</option>
                                                        <option value="L" <?= ($model['formData']['gender'] ?? '') == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                                        <option value="P" <?= ($model['formData']['gender'] ?? '') == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label fw-bold">Agama <span
                                                            class="text-danger">*</span></label>
                                                    <select name="religion" class="form-select" required>
                                                        <option value="">Pilih</option>
                                                        <option value="Islam" <?= ($model['formData']['religion'] ?? '') == 'Islam' ? 'selected' : '' ?>>Islam</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label fw-bold">No HP Orang Tua</label>
                                                    <input type="text" name="parent_phone" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['parent_phone'] ?? '') ?>">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Anak Ke-</label>
                                                    <input type="number" name="child_order" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['child_order'] ?? '') ?>">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Jumlah Saudara</label>
                                                    <input type="number" name="total_siblings" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['total_siblings'] ?? '') ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- STEP 2: Data Sekolah -->
                                        <div id="step2Content" class="form-step" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label fw-bold">Nama Sekolah</label>
                                                    <input type="text" name="school_name" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['school_name'] ?? '') ?>">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Kelas</label>
                                                    <input type="text" name="school_class" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['school_class'] ?? '') ?>">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Alamat Sekolah</label>
                                                    <input type="text" name="school_address" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['school_address'] ?? '') ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- STEP 3: Data Orang Tua & Wali -->
                                        <div id="step3Content" class="form-step" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Nama Ayah</label>
                                                    <input type="text" name="father_name" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['father_name'] ?? '') ?>">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Pekerjaan Ayah</label>
                                                    <input type="text" name="father_job" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['father_job'] ?? '') ?>">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Nama Ibu</label>
                                                    <input type="text" name="mother_name" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['mother_name'] ?? '') ?>">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Pekerjaan Ibu</label>
                                                    <input type="text" name="mother_job" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['mother_job'] ?? '') ?>">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Alamat Orang Tua</label>
                                                <textarea name="parent_address" class="form-control"
                                                    rows="2"><?= htmlspecialchars($model['formData']['parent_address'] ?? '') ?></textarea>
                                            </div>

                                            <hr class="my-4">

                                            <h6 class="mb-3">
                                                Data Wali (Wajib)</h6>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Nama Wali</label>
                                                    <input type="text" name="guardian_name" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['guardian_name'] ?? '') ?>">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Pekerjaan Wali</label>
                                                    <input type="text" name="guardian_job" class="form-control"
                                                        value="<?= htmlspecialchars($model['formData']['guardian_job'] ?? '') ?>">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Alamat Wali</label>
                                                <textarea name="guardian_address" class="form-control"
                                                    rows="2"><?= htmlspecialchars($model['formData']['guardian_address'] ?? '') ?></textarea>
                                            </div>
                                        </div>

                                        <!-- Navigation Buttons -->
                                        <div class="d-flex justify-content-between mt-4">
                                            <button type="button" id="prevBtn" class="btn btn-secondary px-4"
                                                style="display: none;">
                                                <i class="bi bi-arrow-left"></i>
                                            </button>
                                            <button type="button" id="nextBtn" class="btn btn-primary px-4 ms-auto">
                                                <i class="bi bi-arrow-right"></i>
                                            </button>
                                            <button type="submit" id="submitBtn" class="btn btn-success px-4"
                                                style="display: none;">
                                                Simpan & Selesai
                                            </button>
                                        </div>
                                    </form>

                                    <div class="text-center mt-4">
                                        <button type="button" class="btn btn-link text-danger small p-0" id="cancelBtn"
                                            style="text-decoration: none;">
                                            Batalkan Pendaftaran
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/compiled/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin: 30px 0 20px;
            position: relative;
        }

        .step-indicator::before {
            content: '';
            position: absolute;
            top: 25px;
            left: 0;
            right: 0;
            height: 3px;
            background: #e9ecef;
            z-index: 0;
        }

        .step {
            text-align: center;
            position: relative;
            z-index: 1;
            flex: 1;
        }

        .step-circle {
            width: 50px;
            height: 50px;
            background: #e9ecef;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
            transition: all 0.3s;
            color: #6c757d;
        }

        .step.active .step-circle {
            background: #435ebe;
            color: white;
            box-shadow: 0 0 0 5px rgba(67, 94, 190, 0.3);
        }

        .step.completed .step-circle {
            background: #28a745;
            color: white;
        }

        .step-label {
            margin-top: 10px;
            font-size: 12px;
            font-weight: 500;
            color: #6c757d;
        }

        .step.active .step-label {
            color: #435ebe;
            font-weight: 600;
        }

        .step.completed .step-label {
            color: #28a745;
        }

        .form-step {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #435ebe;
            box-shadow: 0 0 0 0.2rem rgba(67, 94, 190, 0.25);
        }

        .btn-primary {
            background-color: #435ebe;
            border-color: #435ebe;
        }

        .btn-primary:hover {
            background-color: #3652a1;
            border-color: #3652a1;
        }

        .container {
            max-width: 1400px;
        }
    </style>

    <script>
        // ==========================================
        // MULTI-STEP NAVIGATION - TANPA SUBMIT SAAT PREV
        // ==========================================

        let currentStep = parseInt(document.getElementById('currentStep').value) || 1;

        const step1Content = document.getElementById('step1Content');
        const step2Content = document.getElementById('step2Content');
        const step3Content = document.getElementById('step3Content');
        const step1Indicator = document.getElementById('step1Indicator');
        const step2Indicator = document.getElementById('step2Indicator');
        const step3Indicator = document.getElementById('step3Indicator');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const progressBar = document.getElementById('progressBar');
        const form = document.getElementById('multiStepForm');
        const stepInput = document.getElementById('currentStep');

        // Fungsi untuk menampilkan modal error
        function showErrorModal(message) {
            const modalTitle = document.getElementById('confirmModalTitle');
            const modalBody = document.getElementById('confirmModalBody');
            const modalBtn = document.getElementById('confirmModalBtn');

            modalTitle.innerHTML = 'Validasi Gagal';
            modalBody.innerHTML = message;
            modalBtn.className = 'btn btn-danger ms-1';

            const newBtn = modalBtn.cloneNode(true);
            modalBtn.parentNode.replaceChild(newBtn, modalBtn);

            newBtn.addEventListener('click', function () {
                const modal = bootstrap.Modal.getInstance(document.getElementById('confirmModal'));
                modal.hide();
            });

            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            modal.show();
        }

        // Fungsi untuk konfirmasi final submit
        function showConfirmModal(message, onConfirm) {
            const modalTitle = document.getElementById('confirmModalTitle');
            const modalBody = document.getElementById('confirmModalBody');
            const modalBtn = document.getElementById('confirmModalBtn');

            modalTitle.innerHTML = 'Konfirmasi';
            modalBody.innerHTML = message;
            modalBtn.className = 'btn btn-success ms-1';
            modalBtn.innerHTML = '<i class="bi bi-check-circle"></i> Ya, Simpan';

            const newBtn = modalBtn.cloneNode(true);
            modalBtn.parentNode.replaceChild(newBtn, modalBtn);

            newBtn.addEventListener('click', function () {
                const modal = bootstrap.Modal.getInstance(document.getElementById('confirmModal'));
                modal.hide();
                onConfirm();
            });

            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            modal.show();
        }

        function updateStepUI(step) {
            step1Content.style.display = 'none';
            step2Content.style.display = 'none';
            step3Content.style.display = 'none';

            if (step === 1) step1Content.style.display = 'block';
            else if (step === 2) step2Content.style.display = 'block';
            else if (step === 3) step3Content.style.display = 'block';

            step1Indicator.classList.remove('active', 'completed');
            step2Indicator.classList.remove('active', 'completed');
            step3Indicator.classList.remove('active', 'completed');

            if (step > 1) step1Indicator.classList.add('completed');
            if (step > 2) step2Indicator.classList.add('completed');

            if (step === 1) step1Indicator.classList.add('active');
            else if (step === 2) step2Indicator.classList.add('active');
            else if (step === 3) step3Indicator.classList.add('active');

            const progressPercentage = (step / 3) * 100;
            progressBar.style.width = progressPercentage + '%';

            if (step === 1) {
                prevBtn.style.display = 'none';
                nextBtn.style.display = 'inline-flex';
                submitBtn.style.display = 'none';
                nextBtn.classList.add('ms-auto');
            } else if (step === 3) {
                prevBtn.style.display = 'inline-flex';
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'inline-flex';
                prevBtn.classList.remove('ms-auto');
            } else {
                prevBtn.style.display = 'inline-flex';
                nextBtn.style.display = 'inline-flex';
                submitBtn.style.display = 'none';
                prevBtn.classList.remove('ms-auto');
            }

            stepInput.value = step;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function validateStep(step) {
            if (step === 1) {
                const fullName = document.querySelector('input[name="full_name"]')?.value.trim();
                const nik = document.querySelector('input[name="student_nik"]')?.value.trim();
                const birthPlace = document.querySelector('input[name="birth_place"]')?.value.trim();
                const birthDate = document.querySelector('input[name="birth_date"]')?.value;
                const address = document.querySelector('textarea[name="address"]')?.value.trim();
                const gender = document.querySelector('select[name="gender"]')?.value;
                const religion = document.querySelector('select[name="religion"]')?.value;

                if (!fullName) { showErrorModal('Nama lengkap wajib diisi!'); return false; }
                if (!nik) { showErrorModal('NIK wajib diisi!'); return false; }
                if (!birthPlace) { showErrorModal('Tempat lahir wajib diisi!'); return false; }
                if (!birthDate) { showErrorModal('Tanggal lahir wajib diisi!'); return false; }
                if (!address) { showErrorModal('Alamat wajib diisi!'); return false; }
                if (!gender) { showErrorModal('Jenis kelamin wajib dipilih!'); return false; }
                if (!religion) { showErrorModal('Agama wajib diisi!'); return false; }
            }
            return true;
        }

        // SUBMIT FORM - HANYA UNTUK NEXT (menyimpan ke server)
        function submitStep(step) {
            stepInput.value = step;
            form.submit();
        }

        // Next button - SUBMIT ke server untuk menyimpan data
        nextBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (validateStep(currentStep)) {
                if (currentStep < 3) {
                    submitStep(currentStep);
                }
            }
        });

        // Previous button - TIDAK SUBMIT, hanya navigasi lokal
        prevBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentStep > 1) {
                currentStep--;
                updateStepUI(currentStep);
            }
        });

        // Tombol Submit Final - dengan konfirmasi
        if (submitBtn) {
            submitBtn.addEventListener('click', function (e) {
                e.preventDefault();
                showConfirmModal('Apakah Anda yakin data yang diisi sudah benar?', function () {
                    stepInput.value = 3;
                    form.submit();
                });
            });
        }

        // Photo preview
        const photoInput = document.getElementById('photoInput');
        const photoPreview = document.getElementById('photoPreview');
        const uploadPhotoBtn = document.getElementById('uploadPhotoBtn');

        if (uploadPhotoBtn) {
            uploadPhotoBtn.addEventListener('click', function () {
                photoInput.click();
            });
        }

        if (photoInput) {
            photoInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        photoPreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Cancel button handler
        const cancelBtn = document.getElementById('cancelBtn');
        if (cancelBtn) {
            cancelBtn.onclick = function (e) {
                e.preventDefault();
                const modal = new bootstrap.Modal(document.getElementById('cancelModal'));
                modal.show();
            };
        }

        // Confirm cancel button - langsung redirect
        const confirmCancelBtn = document.getElementById('confirmCancelBtn');
        if (confirmCancelBtn) {
            confirmCancelBtn.onclick = function () {
                window.location.href = '/students/cancel-registration';
            };
        }

        updateStepUI(currentStep);
    </script>

    <!-- Modal Cancel -->
    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalTitle">
                        Batalkan Pendaftaran
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body" id="cancelModalBody">
                    Apakah Anda yakin ingin membatalkan pendaftaran? <br>
                    <strong>Semua data yang telah diisi akan hilang!</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </button>
                    <button type="button" class="btn btn-danger ms-1" id="confirmCancelBtn"
                        onclick="window.location.href='/students/cancel-registration'">
                        <i class="bi bi-trash"></i> Ya, Batalkan
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Konfirmasi Mazer -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalTitle">
                        <i class="bi bi-question-circle text-warning"></i> Konfirmasi
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body" id="confirmModalBody">
                    Apakah Anda yakin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary ms-1" id="confirmModalBtn">
                        <i class="bi bi-check-circle"></i> Ya, Lanjutkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>