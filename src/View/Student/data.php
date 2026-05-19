<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar</title>

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

            <?php
            // Di awal file data.php, set default value untuk userRole
            $userRole = $model['userRole'] ?? 'guest';
            ?>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Data Santri</h3>
                            <p class="text-subtitle text-muted">
                                -
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Santri</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Table Pendaftar</h5>
                        </div>
                        <div class="card-body">

                            <!-- Bulk Actions - HANYA UNTUK ADMIN (Ditambahkan id="bulkActionCard" dan d-none) -->
                            <?php if ($userRole === 'ADMIN'): ?>
                                <!-- Ganti d-none menjadi kelas fade bawaan bootstrap/mazer -->
                                <div class="card mb-3 fade" id="bulkActionCard" style="display: none;">
                                    <div class="card-body py-3 bg-light-secondary rounded">
                                        <div class="d-flex gap-2 flex-wrap">
                                            <button type="button" id="btnAcceptSelected" class="btn btn-sm btn-success">
                                                <i class="bi bi-check2-circle"></i> Terima Pilihan
                                            </button>

                                            <button type="button" id="btnDeleteSelected" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> hapus Pilihan
                                            </button>

                                            <button type="button" id="btnExportPDF" class="btn btn-sm btn-secondary">
                                                <i class="bi bi-file-pdf"></i> Ekspor PDF
                                            </button>

                                            <button type="button" id="btnExportExcel"
                                                class="btn btn-sm btn-info text-white">
                                                <i class="bi bi-file-earmark-spreadsheet"></i> Ekspor Excel
                                            </button>
                                            <span class="badge bg-primary ms-2" id="selectedCountBadge"
                                                style="font-size: 14px; padding: 8px 12px;">
                                                <i class="bi bi-check-square"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Form untuk bulk actions -->
                            <form id="bulkActionForm" method="POST">
                                <input type="hidden" name="selected_ids" id="selectedIds" value="">

                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Menu</th>
                                            <!-- Kolom checkbox HANYA untuk ADMIN -->
                                            <?php if ($userRole === 'ADMIN'): ?>
                                                <th class="text-center" style="width: 50px;">
                                                    <div
                                                        style="display: flex; justify-content: center; align-items: center;">
                                                        <input type="checkbox" id="checkAll"
                                                            style="cursor: pointer; z-index: 10; position: relative;">
                                                    </div>
                                                </th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($model['students'] as $student): ?>
                                            <tr>
                                                <td class="align-middle"><?= $no++ ?></td>
                                                <td class="align-middle"><?= htmlspecialchars($student->full_name) ?></td>
                                                <td class="align-middle">
                                                    <?php if ($student->is_re_registered): ?>
                                                        <span class="badge bg-success">Sudah Daftar Ulang</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-danger">Belum Daftar Ulang</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="position-relative align-middle">
                                                    <button class="btn btn-sm btn-light dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        ⋮
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="/students/show/<?= $student->id ?>">
                                                                <i class="bi bi-eye"></i> Lihat Data
                                                            </a>
                                                        </li>

                                                        <?php if ($userRole === 'ADMIN'): ?>
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    href="/students/edit/<?= $student->id ?>">
                                                                    <i class="bi bi-pencil"></i> Edit
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>

                                                        <?php if ($userRole === 'ADMIN'): ?>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li>
                                                                <button type="button" class="dropdown-item text-danger"
                                                                    onclick="showDeleteSingleModal(<?= $student->id ?>, '<?= htmlspecialchars($student->full_name) ?>')">
                                                                    <i class="bi bi-trash"></i> Delete
                                                                </button>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </td>

                                                <!-- Perbaikan baris kode yang terpotong di paling bawah -->
                                                <?php if ($userRole === 'ADMIN'): ?>
                                                    <td class="text-center align-middle">
                                                        <input type="checkbox" name="student_ids[]" value="<?= $student->id ?>"
                                                            class="row-check" style="cursor: pointer;">
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>

                </section>
            </div>

            <!-- Script - HANYA JALANKAN UNTUK ADMIN -->
            <?php if ($userRole === 'ADMIN'): ?>
                <script>

                    // Variabel global untuk menyimpan data yang akan dihapus
                    let pendingDeleteId = null;
                    let pendingDeleteName = '';

                    // Fungsi untuk menampilkan modal delete single
                    function showDeleteSingleModal(studentId, studentName) {
                        pendingDeleteId = studentId;
                        pendingDeleteName = studentName;

                        // Update modal dengan nama siswa
                        document.getElementById('deleteStudentName').innerHTML = studentName;

                        // Tampilkan modal
                        const modal = new bootstrap.Modal(document.getElementById('deleteSingleModal'));
                        modal.show();
                    }

                    // Fungsi eksekusi delete single (dipanggil dari modal)
                    function executeDeleteSingle() {
                        if (!pendingDeleteId) return;

                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '/students/delete';
                        form.style.display = 'none';

                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'id';
                        input.value = pendingDeleteId;

                        form.appendChild(input);
                        document.body.appendChild(form);
                        form.submit();
                    }


                    document.addEventListener("DOMContentLoaded", function () {

                        // ==========================================
                        // DELETE SINGLE MODAL CONFIRM BUTTON
                        // ==========================================
                        const confirmDeleteSingleBtn = document.getElementById('confirmDeleteSingleBtn');
                        if (confirmDeleteSingleBtn) {
                            confirmDeleteSingleBtn.addEventListener('click', function () {
                                // Tutup modal dulu
                                const modal = bootstrap.Modal.getInstance(document.getElementById('deleteSingleModal'));
                                modal.hide();
                                // Eksekusi delete
                                executeDeleteSingle();
                            });
                        }

                        // ==========================================
                        // CHECKBOX LOGIC (Select All)
                        // ==========================================
                        const checkAll = document.getElementById("checkAll");
                        if (!checkAll) return;

                        function getRowChecks() {
                            return document.querySelectorAll(".row-check");
                        }

                        function updateCheckAllState() {
                            const rowChecks = getRowChecks();
                            const total = rowChecks.length;
                            const checkedCount = document.querySelectorAll(".row-check:checked").length;

                            if (total === 0) return;

                            if (checkedCount === total) {
                                checkAll.checked = true;
                                checkAll.indeterminate = false;
                            } else if (checkedCount === 0) {
                                checkAll.checked = false;
                                checkAll.indeterminate = false;
                            } else {
                                checkAll.checked = false;
                                checkAll.indeterminate = true;
                            }
                        }

                        const selectedIdsInput = document.getElementById('selectedIds');


                        // Tambahkan fungsi ini setelah updateCheckAllState()
                        function updateBulkActionCard() {
                            const bulkActionCard = document.getElementById('bulkActionCard');
                            if (!bulkActionCard) return;

                            const checkedCount = document.querySelectorAll('.row-check:checked').length;

                            // TAMBAHKAN INI: Update badge jumlah selected
                            const selectedCountBadge = document.getElementById('selectedCountBadge');
                            if (selectedCountBadge) {
                                selectedCountBadge.innerHTML = `<i class="bi bi-check-square"></i> : ${checkedCount} Dipilih`;

                                // Optional: Ubah warna badge jika banyak yang dipilih
                                if (checkedCount > 0) {
                                    selectedCountBadge.classList.remove('bg-primary');
                                    selectedCountBadge.classList.add('bg-success');
                                } else {
                                    selectedCountBadge.classList.remove('bg-success');
                                    selectedCountBadge.classList.add('bg-primary');
                                }
                            }

                            // Update hidden input
                            const ids = [];
                            document.querySelectorAll('.row-check:checked').forEach(cb => {
                                if (cb.value) ids.push(cb.value);
                            });
                            if (selectedIdsInput) selectedIdsInput.value = ids.join(',');

                            // Tampilkan/sembunyikan menu selected
                            if (checkedCount > 0) {
                                if (bulkActionCard.style.display === 'none') {
                                    bulkActionCard.style.display = 'block';
                                    setTimeout(() => {
                                        bulkActionCard.classList.add('show');
                                    }, 10);
                                }
                            } else {
                                bulkActionCard.classList.remove('show');
                                setTimeout(() => {
                                    if (!bulkActionCard.classList.contains('show')) {
                                        bulkActionCard.style.display = 'none';
                                    }
                                }, 300);
                            }
                        }

                        checkAll.addEventListener("click", function (e) {
                            e.stopPropagation();
                            const isChecked = checkAll.checked;
                            const rowChecks = getRowChecks();

                            rowChecks.forEach(cb => {
                                cb.checked = isChecked;
                            });

                            checkAll.indeterminate = false;
                            updateBulkActionCard()
                        });

                        function bindRowCheckEvents() {
                            document.querySelectorAll(".row-check").forEach(cb => {
                                cb.removeEventListener("change", updateCheckAllState);
                                cb.addEventListener("change", function () {
                                    updateCheckAllState();
                                    updateBulkActionCard();  // ← TAMBAHKAN INI
                                });
                            });
                        }

                        bindRowCheckEvents();
                        updateCheckAllState();
                        updateBulkActionCard();

                        const observer = new MutationObserver(function () {
                            bindRowCheckEvents();
                            updateCheckAllState();
                        });

                        const tbody = document.querySelector('#table1 tbody');
                        if (tbody) {
                            observer.observe(tbody, { childList: true, subtree: true });
                        }

                        // ==========================================
                        // BULK ACTIONS WITH MODAL
                        // ==========================================
                        const btnAcceptSelected = document.getElementById('btnAcceptSelected');
                        const btnDeleteSelected = document.getElementById('btnDeleteSelected');
                        const btnExportPDF = document.getElementById('btnExportPDF');
                        const btnExportExcel = document.getElementById('btnExportExcel');
                        const bulkActionForm = document.getElementById('bulkActionForm');

                        const bulkActionModal = new bootstrap.Modal(document.getElementById('bulkActionModal'));
                        const modalTitle = document.getElementById('bulkActionModalTitle');
                        const modalBody = document.getElementById('bulkActionModalBody');
                        const confirmBtn = document.getElementById('bulkActionConfirmBtn');

                        let currentActionUrl = '';
                        let currentSelectedIds = [];

                        function getSelectedIds() {
                            const selected = [];
                            document.querySelectorAll('.row-check:checked').forEach(cb => {
                                if (cb.value) {
                                    selected.push(cb.value);
                                }
                            });
                            return selected;
                        }

                        function showConfirmModal(actionUrl, isDelete = false) {
                            const selectedIds = getSelectedIds();

                            if (selectedIds.length === 0) {
                                modalTitle.innerHTML = '<i class="bi bi-exclamation-triangle text-warning"></i> Peringatan';
                                modalBody.innerHTML = 'Pilih minimal satu data terlebih dahulu!';
                                confirmBtn.classList.add('d-none');
                                bulkActionModal.show();

                                setTimeout(() => {
                                    bulkActionModal.hide();
                                    confirmBtn.classList.remove('d-none');
                                }, 2000);
                                return;
                            }

                            currentActionUrl = actionUrl;
                            currentSelectedIds = selectedIds;

                            if (actionUrl.includes('accept-multiple')) {
                                modalTitle.innerHTML = '<i class="bi bi-check2-circle text-success"></i> Konfirmasi Daftar Ulang';
                                modalBody.innerHTML = `Apakah Anda yakin ingin <strong>mendaftarkan ulang</strong> <strong class="text-primary">${selectedIds.length}</strong> siswa yang terpilih?`;
                                confirmBtn.className = 'btn btn-success ms-1';
                                confirmBtn.innerHTML = '<i class="bi bi-check2-circle"></i> Ya, Daftarkan';
                            }
                            else if (actionUrl.includes('delete-multiple')) {
                                modalTitle.innerHTML = '<i class="bi bi-exclamation-triangle text-danger"></i> Konfirmasi Hapus';
                                modalBody.innerHTML = `Apakah Anda yakin ingin <strong class="text-danger">menghapus</strong> <strong class="text-primary">${selectedIds.length}</strong> siswa yang terpilih?<br><small class="text-muted">Data yang dihapus tidak dapat dikembalikan!</small>`;
                                confirmBtn.className = 'btn btn-danger ms-1';
                                confirmBtn.innerHTML = '<i class="bi bi-trash"></i> Ya, Hapus';
                            }
                            else if (actionUrl.includes('export/pdf')) {
                                modalTitle.innerHTML = '<i class="bi bi-file-pdf text-danger"></i> Konfirmasi Export PDF';
                                modalBody.innerHTML = `Apakah Anda yakin ingin <strong>mengexport</strong> <strong class="text-primary">${selectedIds.length}</strong> data siswa ke <strong>PDF</strong>?`;
                                confirmBtn.className = 'btn btn-secondary ms-1';
                                confirmBtn.innerHTML = '<i class="bi bi-file-pdf"></i> Ya, Export';
                            }
                            else if (actionUrl.includes('export/excel')) {
                                modalTitle.innerHTML = '<i class="bi bi-file-earmark-spreadsheet text-success"></i> Konfirmasi Export Excel';
                                modalBody.innerHTML = `Apakah Anda yakin ingin <strong>mengexport</strong> <strong class="text-primary">${selectedIds.length}</strong> data siswa ke <strong>Excel</strong>?`;
                                confirmBtn.className = 'btn btn-info text-white ms-1';
                                confirmBtn.innerHTML = '<i class="bi bi-file-earmark-spreadsheet"></i> Ya, Export';
                            }

                            bulkActionModal.show();
                        }

                        function executeBulkAction() {
                            bulkActionModal.hide();

                            // ambil selected ids
                            selectedIdsInput.value = JSON.stringify(currentSelectedIds);

                            bulkActionForm.action = currentActionUrl;
                            bulkActionForm.method = 'POST';
                            bulkActionForm.submit();
                        }

                        confirmBtn.addEventListener('click', executeBulkAction);

                        if (btnAcceptSelected) {
                            btnAcceptSelected.addEventListener('click', function (e) {
                                e.preventDefault();
                                showConfirmModal('/students/accept-multiple');
                            });
                        }

                        if (btnDeleteSelected) {
                            btnDeleteSelected.addEventListener('click', function (e) {
                                e.preventDefault();
                                showConfirmModal('/students/delete-multiple', true);
                            });
                        }

                        if (btnExportPDF) {
                            btnExportPDF.addEventListener('click', function (e) {
                                e.preventDefault();
                                showConfirmModal('/students/export/pdf-multiple');
                            });
                        }

                        if (btnExportExcel) {
                            btnExportExcel.addEventListener('click', function (e) {
                                e.preventDefault();
                                showConfirmModal('/students/export/excel-multiple');
                            });
                        }
                    });
                </script>
            <?php endif; ?>
        </div>
    </div>


    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="/assets/compiled/js/app.js"></script>

    <!-- Menggunakan Simple Datatables bawaan default Mazer -->
    <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/static/js/pages/simple-datatables.js?v=2"></script>

    <!-- Modal Konfirmasi Bulk Actions -->
    <div class="modal fade text-left" id="bulkActionModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bulkActionModalTitle">Konfirmasi</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body" id="bulkActionModalBody">
                    Apakah Anda yakin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="button" class="btn btn-primary ms-1" id="bulkActionConfirmBtn">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Ya, Lanjutkan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Delete Single -->
    <div class="modal fade text-left" id="deleteSingleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="deleteSingleModalTitle">
                        <i class="bi bi-exclamation-triangle-fill"></i> Konfirmasi Hapus Data
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="deleteSingleModalBody">
                    Apakah Anda yakin ingin menghapus data siswa <strong id="deleteStudentName"></strong>?
                    <br><small class="text-muted">Data yang dihapus tidak dapat dikembalikan!</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-arrow-left"></i> Batal
                    </button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteSingleBtn">
                        <i class="bi bi-trash"></i> Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>