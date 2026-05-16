<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="/"><img src="/assets/images/logo.png" alt="Logo" style="width:50px; height:auto;"></a>
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                    </svg>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active ">
                    <a href="/" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>

                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Datatables</span>
                    </a>

                    <ul class="submenu ">

                        <li class="submenu-item  ">
                            <a href="/students/data" class="submenu-link">New Student</a>
                        </li>
                    </ul>

                </li>

            </ul>

            <!-- Menu Logout -->
            <ul class="menu mt-auto">
                <li class="sidebar-title">Account</li>
                <li class="sidebar-item">
                    <button type="button" class="sidebar-link w-100 text-start" data-bs-toggle="modal"
                        data-bs-target="#logoutModal"
                        style="background: none; border: none; width: 100%; cursor: pointer; display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem;">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>


<script>
    // Set active menu berdasarkan URL saat ini
    document.addEventListener("DOMContentLoaded", function () {
        const currentPath = window.location.pathname;

        // Hapus semua class active dari sidebar-item
        document.querySelectorAll('.sidebar-item').forEach(item => {
            item.classList.remove('active');
        });

        // Hapus juga class active dari submenu-item jika ada
        document.querySelectorAll('.submenu-item').forEach(item => {
            item.classList.remove('active');
        });

        // Cek untuk menu Dashboard
        if (currentPath === '/' || currentPath === '/index.html') {
            const dashboardItem = document.querySelector('.sidebar-item a[href="/"]');
            if (dashboardItem) {
                dashboardItem.closest('.sidebar-item').classList.add('active');
            }
        }

        // Cek untuk menu New Student (atau halaman student/data)
        if (currentPath.includes('/students/data')) {
            // Active di submenu-item
            const studentMenu = document.querySelector('.submenu-item a[href="/students/data"]');
            if (studentMenu) {
                studentMenu.closest('.submenu-item').classList.add('active');
                // Juga active parent (Datatables)
                studentMenu.closest('.has-sub').classList.add('active');
            }
        }

        // Alternative: untuk semua link yang match dengan href
        document.querySelectorAll('.sidebar-link, .submenu-link').forEach(link => {
            const href = link.getAttribute('href');
            if (href && href !== '#' && currentPath === href) {
                link.closest('.sidebar-item')?.classList.add('active');
                link.closest('.submenu-item')?.classList.add('active');
                if (link.closest('.has-sub')) {
                    link.closest('.has-sub').classList.add('active');
                }
            }
        });
    });
</script>

<!-- Modal Konfirmasi Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Konfirmasi Logout
                </h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="bi bi-question-circle fs-1 text-warning"></i>
                </div>
                <p class="text-center mb-0">Apakah Anda yakin ingin keluar dari sistem?</p>
                <p class="text-center text-muted small">Session Anda akan berakhir dan Anda perlu login kembali.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <form action="/users/logout" method="post" id="logoutForm" style="display: inline-block;">
                    <button type="submit" class="btn btn-danger">
                        Ya, Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>