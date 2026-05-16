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

            <?php
            // Di awal file data.php, set default value untuk userRole
            $userRole = $model['userRole'] ?? 'guest';
            ?>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Data Student</h3>
                            <p class="text-subtitle text-muted">
                                -
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Table Student</h5>
                        </div>
                        <div class="card-body">

                            <!-- Bulk Actions - HANYA UNTUK ADMIN (Ditambahkan id="bulkActionCard" dan d-none) -->
                            <?php if ($userRole === 'ADMIN'): ?>
                                <!-- Ganti d-none menjadi kelas fade bawaan bootstrap/mazer -->
                                <div class="card mb-3 fade" id="bulkActionCard" style="display: none;">
                                    <div class="card-body py-3 bg-light-secondary rounded">
                                        <div class="d-flex gap-2 flex-wrap">
                                            <button type="button" id="btnAcceptSelected" class="btn btn-sm btn-success">
                                                <i class="bi bi-check2-circle"></i> Accept Selected
                                            </button>

                                            <button type="button" id="btnDeleteSelected" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Delete Selected
                                            </button>

                                            <button type="button" id="btnExportPDF" class="btn btn-sm btn-secondary">
                                                <i class="bi bi-file-pdf"></i> Export PDF
                                            </button>

                                            <button type="button" id="btnExportExcel"
                                                class="btn btn-sm btn-info text-white">
                                                <i class="bi bi-file-earmark-spreadsheet"></i> Export Excel
                                            </button>
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
                                                                <form method="POST" action="/students/delete"
                                                                    onsubmit="return confirm('Yakin hapus data ini?')">
                                                                    <button type="submit" name="id" value="<?= $student->id ?>"
                                                                        class="dropdown-item text-danger">
                                                                        <i class="bi bi-trash"></i> Delete
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </td>

                                                <!-- Perbaikan baris kode yang terpotong di paling bawah -->
                                                <?php if ($userRole === 'ADMIN'): ?>
                                                    <td class="text-center align-middle">
                                                        <input type="checkbox" class="row-checkbox" value="<?= $student->id ?>"
                                                            style="cursor: pointer;">
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
                    document.addEventListener('DOMContentLoaded', function () {
                        const checkAll = document.getElementById('checkAll');
                        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
                        const bulkActionCard = document.getElementById('bulkActionCard');
                        const selectedIdsInput = document.getElementById('selectedIds');

                        if (!bulkActionCard) return;

                        // Fungsi update array ID terpilih dan kelola visibilitas card menu
                        function updateSelectedIds() {
                            const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
                            const ids = Array.from(checkedBoxes).map(cb => cb.value);

                            selectedIdsInput.value = ids.join(',');

                            if (ids.length > 0) {
                                // JIKA ADA YANG DICENTANG:
                                if (bulkActionCard.style.display === 'none') {
                                    bulkActionCard.style.display = 'block'; // Pasang display dulu
                                    // Berikan jeda 10ms menggunakan setTimeout agar efek CSS 'fade' Bootstrap bisa nge-trigger animasi smooth
                                    setTimeout(() => {
                                        bulkActionCard.classList.add('show'); // Tambah class show bawaan Mazer/Bootstrap
                                    }, 10);
                                }
                            } else {
                                // JIKA KOSONG / BERSIH:
                                bulkActionCard.classList.remove('show'); // Hapus class show (efek memudar ke transparan)

                                // Tunggu animasi pudar selesai (300ms sesuai durasi default Bootstrap), lalu sembunyikan display-nya
                                setTimeout(() => {
                                    if (!bulkActionCard.classList.contains('show')) {
                                        bulkActionCard.style.display = 'none';
                                    }
                                }, 300);
                            }
                        }


                        // Event master Check All
                        if (checkAll) {
                            checkAll.addEventListener('change', function () {
                                rowCheckboxes.forEach(cb => cb.checked = checkAll.checked);
                                updateSelectedIds();
                            });
                        }

                        // Event sub-checkbox tiap baris data
                        rowCheckboxes.forEach(cb => {
                            cb.addEventListener('change', function () {
                                if (!cb.checked && checkAll) checkAll.checked = false;

                                const allChecked = document.querySelectorAll('.row-checkbox:checked').length === rowCheckboxes.length;
                                if (allChecked && checkAll) checkAll.checked = true;

                                updateSelectedIds();
                            });
                        });
                    });


                    document.addEventListener("DOMContentLoaded", function () {
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

                        checkAll.addEventListener("click", function (e) {
                            e.stopPropagation();
                            const isChecked = checkAll.checked;
                            const rowChecks = getRowChecks();

                            rowChecks.forEach(cb => {
                                cb.checked = isChecked;
                            });

                            checkAll.indeterminate = false;
                        });

                        function bindRowCheckEvents() {
                            document.querySelectorAll(".row-check").forEach(cb => {
                                cb.removeEventListener("change", updateCheckAllState);
                                cb.addEventListener("change", updateCheckAllState);
                            });
                        }

                        bindRowCheckEvents();
                        updateCheckAllState();

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
                        const selectedIdsInput = document.getElementById('selectedIds');

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
    <script src="/assets/static/js/pages/simple-datatables.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
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

            // Select All - Click handler
            checkAll.addEventListener("click", function (e) {
                e.stopPropagation();
                const isChecked = checkAll.checked;
                const rowChecks = getRowChecks();

                rowChecks.forEach(cb => {
                    cb.checked = isChecked;
                });

                checkAll.indeterminate = false;
            });

            // Bind event untuk setiap row checkbox
            function bindRowCheckEvents() {
                document.querySelectorAll(".row-check").forEach(cb => {
                    cb.removeEventListener("change", updateCheckAllState);
                    cb.addEventListener("change", updateCheckAllState);
                });
            }

            bindRowCheckEvents();
            updateCheckAllState();

            // Observer untuk row yang ditambahkan secara dinamis
            const observer = new MutationObserver(function () {
                bindRowCheckEvents();
                updateCheckAllState();
            });

            const tbody = document.querySelector('#table1 tbody');
            if (tbody) {
                observer.observe(tbody, { childList: true, subtree: true });
            }

            // ==========================================
            // BULK ACTIONS WITH MODAL (Tanpa Loading Modal)
            // ==========================================
            const btnAcceptSelected = document.getElementById('btnAcceptSelected');
            const btnDeleteSelected = document.getElementById('btnDeleteSelected');
            const btnExportPDF = document.getElementById('btnExportPDF');
            const btnExportExcel = document.getElementById('btnExportExcel');
            const bulkActionForm = document.getElementById('bulkActionForm');
            const selectedIdsInput = document.getElementById('selectedIds');

            // Modal elements (hanya modal konfirmasi)
            const bulkActionModal = new bootstrap.Modal(document.getElementById('bulkActionModal'));
            const modalTitle = document.getElementById('bulkActionModalTitle');
            const modalBody = document.getElementById('bulkActionModalBody');
            const confirmBtn = document.getElementById('bulkActionConfirmBtn');

            // Variables to store current action
            let currentActionUrl = '';
            let currentSelectedIds = [];
            let currentIsDelete = false;

            // Fungsi untuk mendapatkan ID yang terpilih
            function getSelectedIds() {
                const selected = [];
                document.querySelectorAll('.row-check:checked').forEach(cb => {
                    if (cb.value) {
                        selected.push(cb.value);
                    }
                });
                return selected;
            }

            // Fungsi untuk menampilkan modal konfirmasi
            function showConfirmModal(actionUrl, isDelete = false) {
                const selectedIds = getSelectedIds();

                if (selectedIds.length === 0) {
                    // Tampilkan modal error
                    modalTitle.innerHTML = '<i class="bi bi-exclamation-triangle text-warning"></i> Peringatan';
                    modalBody.innerHTML = 'Pilih minimal satu data terlebih dahulu!';
                    confirmBtn.classList.add('d-none');
                    bulkActionModal.show();

                    // Sembunyikan tombol confirm setelah 2 detik dan tutup modal
                    setTimeout(() => {
                        bulkActionModal.hide();
                        confirmBtn.classList.remove('d-none');
                    }, 2000);
                    return;
                }

                currentActionUrl = actionUrl;
                currentSelectedIds = selectedIds;
                currentIsDelete = isDelete;

                // Set modal content berdasarkan action
                let actionText = '';
                let confirmClass = '';

                if (actionUrl.includes('accept-multiple')) {
                    actionText = 'mendaftarkan ulang';
                    modalTitle.innerHTML = '<i class="bi bi-check2-circle text-success"></i> Konfirmasi Daftar Ulang';
                    modalBody.innerHTML = `Apakah Anda yakin ingin <strong>mendaftarkan ulang</strong> <strong class="text-primary">${selectedIds.length}</strong> siswa yang terpilih?`;
                    confirmBtn.className = 'btn btn-success ms-1';
                    confirmBtn.innerHTML = '<i class="bi bi-check2-circle"></i> <span class="d-none d-sm-block">Ya, Daftarkan</span>';
                }
                else if (actionUrl.includes('delete-multiple')) {
                    actionText = 'menghapus';
                    modalTitle.innerHTML = '<i class="bi bi-exclamation-triangle text-danger"></i> Konfirmasi Hapus';
                    modalBody.innerHTML = `Apakah Anda yakin ingin <strong class="text-danger">menghapus</strong> <strong class="text-primary">${selectedIds.length}</strong> siswa yang terpilih?<br><small class="text-muted">Data yang dihapus tidak dapat dikembalikan!</small>`;
                    confirmBtn.className = 'btn btn-danger ms-1';
                    confirmBtn.innerHTML = '<i class="bi bi-trash"></i> <span class="d-none d-sm-block">Ya, Hapus</span>';
                }
                else if (actionUrl.includes('export/pdf')) {
                    modalTitle.innerHTML = '<i class="bi bi-file-pdf text-danger"></i> Konfirmasi Export PDF';
                    modalBody.innerHTML = `Apakah Anda yakin ingin <strong>mengexport</strong> <strong class="text-primary">${selectedIds.length}</strong> data siswa ke <strong>PDF</strong>?`;
                    confirmBtn.className = 'btn btn-secondary ms-1';
                    confirmBtn.innerHTML = '<i class="bi bi-file-pdf"></i> <span class="d-none d-sm-block">Ya, Export</span>';
                }
                else if (actionUrl.includes('export/excel')) {
                    modalTitle.innerHTML = '<i class="bi bi-file-earmark-spreadsheet text-success"></i> Konfirmasi Export Excel';
                    modalBody.innerHTML = `Apakah Anda yakin ingin <strong>mengexport</strong> <strong class="text-primary">${selectedIds.length}</strong> data siswa ke <strong>Excel</strong>?`;
                    confirmBtn.className = 'btn btn-info text-white ms-1';
                    confirmBtn.innerHTML = '<i class="bi bi-file-earmark-spreadsheet"></i> <span class="d-none d-sm-block">Ya, Export</span>';
                }

                // Tampilkan modal
                bulkActionModal.show();
            }

            // Fungsi eksekusi action
            function executeBulkAction() {
                // Tutup modal konfirmasi
                bulkActionModal.hide();

                // Set value ke hidden input
                selectedIdsInput.value = JSON.stringify(currentSelectedIds);

                // Set form action dan submit
                bulkActionForm.action = currentActionUrl;
                bulkActionForm.method = 'POST';

                // Submit langsung tanpa delay
                bulkActionForm.submit();
            }

            // Event listener untuk tombol konfirmasi
            confirmBtn.addEventListener('click', executeBulkAction);

            // Event listeners untuk tombol bulk actions
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

            // Inisialisasi Feather Icons (jika diperlukan)
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>
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

</body>

</html>