<h1>Dashboard</h1>

<p>
    Welcome,
    <?= $model['user']->name ?>
</p>

<p>
    Role:
    <?= $model['user']->role ?>
</p>

<br>

<form id="bulkForm" method="POST">

    <?php if ($model['user']->role == 'ADMIN') { ?>

        <div style="margin-bottom: 15px; display:flex; gap:10px;">

            <button type="submit" formaction="/students/accept-multiple">
                Accept Selected
            </button>

            <button type="submit" formaction="/students/delete-multiple"
                onclick="return confirm('Yakin hapus data terpilih?')">

                Delete Selected

            </button>

            <button type="submit" formaction="/students/export/pdf-multiple">
                Export PDF
            </button>

            <button type="submit" formaction="/students/export/excel-multiple">
                Export Excel
            </button>

        </div>

    <?php } ?>

    <table border="1" cellpadding="10" width="100%" style="border-collapse: collapse;">

        <tr>

            <?php if ($model['user']->role == 'ADMIN') { ?>
                <th>
                    <input type="checkbox" id="checkAll">
                </th>
            <?php } ?>

            <th>No</th>
            <th>Nama</th>
            <th>Status</th>

            <?php if ($model['user']->role == 'ADMIN') { ?>
                <th>Menu</th>
            <?php } ?>

        </tr>

        <?php $no = 1; ?>

        <?php foreach ($model['students'] as $student) { ?>

            <tr>

                <?php if ($model['user']->role == 'ADMIN') { ?>

                    <td>
                        <input type="checkbox" name="student_ids[]" value="<?= $student->id ?>">
                    </td>

                <?php } ?>

                <td><?= $no++ ?></td>

                <td>
                    <?= htmlspecialchars($student->full_name) ?>
                </td>

                <td>

                    <?php if ($student->is_re_registered) { ?>

                        <span style="color:green;">
                            Sudah Daftar Ulang
                        </span>

                    <?php } else { ?>

                        <span style="color:red;">
                            Belum Daftar Ulang
                        </span>

                    <?php } ?>

                </td>

                <?php if ($model['user']->role == 'ADMIN') { ?>

                    <td style="position:relative;">

                        <button type="button" onclick="toggleMenu(<?= $student->id ?>)">
                            ⋮
                        </button>

                        <div id="menu-<?= $student->id ?>" class="dropdown-menu" style="
                                display:none;
                                position:absolute;
                                background:white;
                                border:1px solid #ccc;
                                padding:10px;
                                z-index:10;
                            ">

                            <a href="/students/show/<?= $student->id ?>">
                                Lihat Data
                            </a>

                            <br><br>

                            <a href="/students/edit/<?= $student->id ?>">
                                Edit
                            </a>

                            <br><br>

                            <button type="submit" formaction="/students/delete" formmethod="post" name="id"
                                value="<?= $student->id ?>">

                                Delete

                            </button>

                            <br>

                        </div>

                    </td>

                <?php } ?>

            </tr>

        <?php } ?>

    </table>

</form>

<br>

<form action="/users/logout" method="post">
    <button type="submit">Logout</button>
</form>

<script>

    // CHECK ALL

    document.getElementById('checkAll')
        ?.addEventListener('change', function () {

            const checkboxes =
                document.querySelectorAll('input[name="student_ids[]"]');

            checkboxes.forEach(cb => {
                cb.checked = this.checked;
            });

        });

    // DROPDOWN MENU

    function toggleMenu(id) {

        const menu =
            document.getElementById('menu-' + id);

        const allMenus =
            document.querySelectorAll('.dropdown-menu');

        allMenus.forEach(item => {

            if (item !== menu) {
                item.style.display = 'none';
            }

        });

        menu.style.display =
            menu.style.display === 'block'
                ? 'none'
                : 'block';
    }

    // CLOSE MENU WHEN CLICK OUTSIDE

    window.addEventListener('click', function (e) {

        if (!e.target.matches('button')) {

            document
                .querySelectorAll('.dropdown-menu')
                .forEach(menu => {
                    menu.style.display = 'none';
                });

        }

    });

</script>