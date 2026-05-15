<h1>Detail Data Santri</h1>

<br>

<?php if (!empty($model['student']->img)) { ?>

    <img src="/uploads/photos/students-registration/<?= $model['student']->img ?>" width="150"
        style="border:1px solid #ccc; padding:5px;">

<?php } ?>

<br><br>

<table border="1" cellpadding="10" width="100%" style="border-collapse: collapse;">

    <tr>
        <th colspan="4" style="background:#eee;">
            Biodata Pribadi
        </th>
    </tr>

    <tr>
        <td width="20%">Nama Lengkap</td>
        <td width="30%">
            <?= htmlspecialchars($model['student']->full_name) ?>
        </td>

        <td width="20%">NIK</td>
        <td width="30%">
            <?= htmlspecialchars($model['student']->student_nik) ?>
        </td>
    </tr>

    <tr>
        <td>Tempat Lahir</td>
        <td>
            <?= htmlspecialchars($model['student']->birth_place) ?>
        </td>

        <td>Tanggal Lahir</td>
        <td>
            <?= htmlspecialchars($model['student']->birth_date) ?>
        </td>
    </tr>

    <tr>
        <td>Alamat</td>
        <td colspan="3">
            <?= htmlspecialchars($model['student']->address) ?>
        </td>
    </tr>

    <tr>
        <td>Jenis Kelamin</td>
        <td>
            <?= htmlspecialchars($model['student']->gender) ?>
        </td>

        <td>Agama</td>
        <td>
            <?= htmlspecialchars($model['student']->religion) ?>
        </td>
    </tr>

    <tr>
        <td>Anak Ke</td>
        <td>
            <?= htmlspecialchars($model['student']->child_order) ?>
        </td>

        <td>Jumlah Saudara</td>
        <td>
            <?= htmlspecialchars($model['student']->total_siblings) ?>
        </td>
    </tr>

    <tr>
        <td>No HP Orang Tua</td>
        <td colspan="3">
            <?= htmlspecialchars($model['student']->parent_phone) ?>
        </td>
    </tr>

    <!-- DATA SEKOLAH -->

    <tr>
        <th colspan="4" style="background:#eee;">
            Data Sekolah
        </th>
    </tr>

    <tr>
        <td>Nama Sekolah</td>
        <td>
            <?= htmlspecialchars($model['student']->school_name) ?>
        </td>

        <td>Kelas</td>
        <td>
            <?= htmlspecialchars($model['student']->school_class) ?>
        </td>
    </tr>

    <tr>
        <td>Alamat Sekolah</td>
        <td colspan="3">
            <?= htmlspecialchars($model['student']->school_address) ?>
        </td>
    </tr>

    <!-- DATA ORANG TUA -->

    <tr>
        <th colspan="4" style="background:#eee;">
            Data Orang Tua
        </th>
    </tr>

    <tr>
        <td>Nama Ayah</td>
        <td>
            <?= htmlspecialchars($model['student']->father_name) ?>
        </td>

        <td>Pekerjaan Ayah</td>
        <td>
            <?= htmlspecialchars($model['student']->father_job) ?>
        </td>
    </tr>

    <tr>
        <td>Nama Ibu</td>
        <td>
            <?= htmlspecialchars($model['student']->mother_name) ?>
        </td>

        <td>Pekerjaan Ibu</td>
        <td>
            <?= htmlspecialchars($model['student']->mother_job) ?>
        </td>
    </tr>

    <tr>
        <td>Alamat Orang Tua</td>
        <td colspan="3">
            <?= htmlspecialchars($model['student']->parent_address) ?>
        </td>
    </tr>

    <!-- DATA WALI -->

    <tr>
        <th colspan="4" style="background:#eee;">
            Data Wali
        </th>
    </tr>

    <tr>
        <td>Nama Wali</td>
        <td>
            <?= htmlspecialchars($model['student']->guardian_name) ?>
        </td>

        <td>Pekerjaan Wali</td>
        <td>
            <?= htmlspecialchars($model['student']->guardian_job) ?>
        </td>
    </tr>

    <tr>
        <td>Alamat Wali</td>
        <td colspan="3">
            <?= htmlspecialchars($model['student']->guardian_address) ?>
        </td>
    </tr>

    <!-- STATUS -->

    <tr>
        <th colspan="4" style="background:#eee;">
            Status
        </th>
    </tr>

    <tr>
        <td>Status Daftar Ulang</td>
        <td colspan="3">

            <?php if ($model['student']->is_re_registered) { ?>

                <span style="color:green;">
                    Sudah Daftar Ulang
                </span>

            <?php } else { ?>

                <span style="color:red;">
                    Belum Daftar Ulang
                </span>

            <?php } ?>

        </td>
    </tr>

</table>

<br>

<a href="/">
    Kembali
</a>

<a href="/students/edit/<?= $model['student']->id ?>">
    Edit
</a>

<a href="/students/export/pdf/<?= $model['student']->id ?>">
    Export PDF
</a>