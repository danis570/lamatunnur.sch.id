<h1>Edit Student</h1>

<form action="/students/update" method="post" enctype="multipart/form-data">

    <label>Foto Siswa Saat Ini:</label><br>
    <?php if (!empty($model['student']->img)): ?>
        <!-- Sesuaikan path/rute URL image ini dengan konfigurasi web server Anda -->
        <img src="/uploads/photos/students-registration/<?= $model['student']->img ?>"
            alt="Foto <?= $model['student']->full_name ?>"
            style="max-width: 150px; height: auto; border: 1px solid #ccc; padding: 5px; margin-bottom: 10px;">
    <?php else: ?>
        <p style="color: gray; font-style: italic;">Belum ada foto</p>
    <?php endif; ?>
    <br>
    <!-- PERTAHANKAN INPUT FILE INI -->
    <input type="file" name="img">
    <small style="color: gray; display: block; margin-top: 5px;">Biarkan kosong jika tidak ingin mengubah foto</small>
    <br><br>

    <!-- Data Utama Sesi Sebelumnya -->
    <input type="hidden" name="id" value="<?= $model['student']->id ?>">

    <label>Nama Lengkap:</label><br>
    <input type="text" name="full_name" value="<?= $model['student']->full_name ?>"><br><br>

    <label>NIK Siswa:</label><br>
    <input type="text" name="student_nik" value="<?= $model['student']->student_nik ?>"><br><br>

    <label>Tempat Lahir:</label><br>
    <input type="text" name="birth_place" value="<?= $model['student']->birth_place ?>"><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="birth_date" value="<?= $model['student']->birth_date ?>"><br><br>

    <label>Alamat Siswa:</label><br>
    <input type="text" name="address" value="<?= $model['student']->address ?>"><br><br>

    <label>Jenis Kelamin:</label><br>
    <input type="text" name="gender" value="<?= $model['student']->gender ?>"><br><br>

    <label>Anak Ke-:</label><br>
    <input type="number" name="child_order" value="<?= $model['student']->child_order ?>"><br><br>

    <label>Jumlah Saudara Kandung:</label><br>
    <input type="number" name="total_siblings" value="<?= $model['student']->total_siblings ?>"><br><br>

    <label>Agama:</label><br>
    <input type="text" name="religion" value="<?= $model['student']->religion ?>"><br><br>

    <label>No. HP Orang Tua:</label><br>
    <input type="text" name="parent_phone" value="<?= $model['student']->parent_phone ?>"><br><br>

    <!-- [SUDAH DIHAPUS]: Bagian <input type="file" name="img"> yang duplikat di sini sudah dibersihkan agar tidak menimpa data -->

    <!-- Tambahan: Data Sekolah Asal -->
    <h3>Data Sekolah Asal</h3>
    <label>Nama Sekolah:</label><br>
    <input type="text" name="school_name" value="<?= $model['student']->school_name ?>"><br><br>

    <label>Kelas Asal:</label><br>
    <input type="text" name="school_class" value="<?= $model['student']->school_class ?>"><br><br>

    <label>Alamat Sekolah:</label><br>
    <input type="text" name="school_address" value="<?= $model['student']->school_address ?>"><br><br>

    <!-- Tambahan: Data Orang Tua -->
    <h3>Data Orang Tua</h3>
    <label>Nama Ayah:</label><br>
    <input type="text" name="father_name" value="<?= $model['student']->father_name ?>"><br><br>

    <label>Pekerjaan Ayah:</label><br>
    <input type="text" name="father_job" value="<?= $model['student']->father_job ?>"><br><br>

    <label>Nama Ibu:</label><br>
    <input type="text" name="mother_name" value="<?= $model['student']->mother_name ?>"><br><br>

    <label>Pekerjaan Ibu:</label><br>
    <input type="text" name="mother_job" value="<?= $model['student']->mother_job ?>"><br><br>

    <label>Alamat Orang Tua:</label><br>
    <input type="text" name="parent_address" value="<?= $model['student']->parent_address ?>"><br><br>

    <!-- Tambahan: Data Wali (Opsional) -->
    <h3>Data Wali</h3>
    <label>Nama Wali:</label><br>
    <input type="text" name="guardian_name" value="<?= $model['student']->guardian_name ?>"><br><br>

    <label>Pekerjaan Wali:</label><br>
    <input type="text" name="guardian_job" value="<?= $model['student']->guardian_job ?>"><br><br>

    <label>Alamat Wali:</label><br>
    <input type="text" name="guardian_address" value="<?= $model['student']->guardian_address ?>"><br><br>

    <!-- Status Daftar Ulang -->
    <h3>Status Administrasi</h3>
    <input type="hidden" name="is_re_registered" value="0">
    <label>
        <input type="checkbox" name="is_re_registered" value="1" <?= $model['student']->is_re_registered == 1 ? 'checked' : '' ?>>
        Sudah Daftar Ulang
    </label>
    <br><br>

    <button type="submit">Update Data</button>

</form>
