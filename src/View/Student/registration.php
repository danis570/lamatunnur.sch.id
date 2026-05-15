<h1>Student Registration</h1>

<?php if (isset($model['error'])) { ?>
    <p><?= $model['error'] ?></p>
<?php } ?>

<form action="/students/registration" method="post" enctype="multipart/form-data">

    <label>Photo</label>
    <br>
    <input type="file" name="img">
    <br><br>

    <label>Full Name</label>
    <br>
    <input type="text" name="full_name" value="<?= $_POST['full_name'] ?? '' ?>">
    <br><br>

    <label>Birth Place</label>
    <br>
    <input type="text" name="birth_place" value="<?= $_POST['birth_place'] ?? '' ?>">
    <br><br>

    <label>Birth Date</label>
    <br>
    <input type="date" name="birth_date" value="<?= $_POST['birth_date'] ?? '' ?>">
    <br><br>

    <label>NIK</label>
    <br>
    <input type="text" name="student_nik" value="<?= $_POST['student_nik'] ?? '' ?>">
    <br><br>

    <label>Address</label>
    <br>
    <textarea name="address"><?= $_POST['address'] ?? '' ?></textarea>
    <br><br>

    <label>Gender</label>
    <br>
    <select name="gender">
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
    </select>
    <br><br>

    <label>Child Order</label>
    <br>
    <input type="number" name="child_order" value="<?= $_POST['child_order'] ?? '' ?>">
    <br><br>

    <label>Total Siblings</label>
    <br>
    <input type="number" name="total_siblings" value="<?= $_POST['total_siblings'] ?? '' ?>">
    <br><br>

    <label>Religion</label>
    <br>
    <input type="text" name="religion" value="<?= $_POST['religion'] ?? '' ?>">
    <br><br>

    <label>Parent Phone</label>
    <br>
    <input type="text" name="parent_phone" value="<?= $_POST['parent_phone'] ?? '' ?>">
    <br><br>

    <hr>

    <h3>School Information</h3>

    <label>School Name</label>
    <br>
    <input type="text" name="school_name" value="<?= $_POST['school_name'] ?? '' ?>">
    <br><br>

    <label>School Class</label>
    <br>
    <input type="text" name="school_class" value="<?= $_POST['school_class'] ?? '' ?>">
    <br><br>

    <label>School Address</label>
    <br>
    <textarea name="school_address"><?= $_POST['school_address'] ?? '' ?></textarea>
    <br><br>

    <hr>

    <h3>Father Information</h3>

    <label>Father Name</label>
    <br>
    <input type="text" name="father_name" value="<?= $_POST['father_name'] ?? '' ?>">
    <br><br>

    <label>Father Job</label>
    <br>
    <input type="text" name="father_job" value="<?= $_POST['father_job'] ?? '' ?>">
    <br><br>

    <hr>

    <h3>Mother Information</h3>

    <label>Mother Name</label>
    <br>
    <input type="text" name="mother_name" value="<?= $_POST['mother_name'] ?? '' ?>">
    <br><br>

    <label>Mother Job</label>
    <br>
    <input type="text" name="mother_job" value="<?= $_POST['mother_job'] ?? '' ?>">
    <br><br>

    <label>Parent Address</label>
    <br>
    <textarea name="parent_address"><?= $_POST['parent_address'] ?? '' ?></textarea>
    <br><br>

    <hr>

    <h3>Guardian Information</h3>

    <label>Guardian Name</label>
    <br>
    <input type="text" name="guardian_name" value="<?= $_POST['guardian_name'] ?? '' ?>">
    <br><br>

    <label>Guardian Job</label>
    <br>
    <input type="text" name="guardian_job" value="<?= $_POST['guardian_job'] ?? '' ?>">
    <br><br>

    <label>Guardian Address</label>
    <br>
    <textarea name="guardian_address"><?= $_POST['guardian_address'] ?? '' ?></textarea>
    <br><br>

    <br><br>

    <button type="submit">Register Student</button>

</form>