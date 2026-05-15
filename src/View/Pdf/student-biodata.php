<?php

// KOP SURAT
$kopPath = __DIR__ . '/../../../public/assets/images/kop.png';
$kopType = pathinfo($kopPath, PATHINFO_EXTENSION);
$kopData = file_get_contents($kopPath);
$kopBase64 = 'data:image/' . $kopType . ';base64,' . base64_encode($kopData);

// FOTO SANTRI
$photoPath = __DIR__ . '/../../../public/uploads/photos/students-registration/' . $student->img;

if (!empty($student->img) && file_exists($photoPath)) {
    $photoType = pathinfo($photoPath, PATHINFO_EXTENSION);
    $photoData = file_get_contents($photoPath);
    $photoBase64 = 'data:image/' . $photoType . ';base64,' . base64_encode($photoData);
} else {
    // Menggunakan SVG base64 murni agar tidak merusak tag HTML img src
    $photoBase64 = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://w3.org" width="120" height="160" viewBox="0 0 120 160"><rect width="100%" height="100%" fill="#eeeeee"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="sans-serif" font-size="12" fill="#888888">Tanpa Foto</text></svg>');
}

?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <style>
        body {
            font-family: "Times New Roman";
            font-size: 14px;
            line-height: 1.4;
        }

        .kop {
            width: 100%;
            height: auto;
            margin-bottom: 5px;
        }

        .title {
            text-align: center;
            font-weight: bold;
            margin: 30px 0 12px;
            text-decoration: underline;
        }

        table {
            width: 100%;
        }

        td {
            vertical-align: top;

            td {
                padding: 1px 3px;
            }
        }

        .photo {
            width: 100%;
            height: auto;
            border: 1px solid #000;
            object-fit: cover;
        }

        .signature {
            margin-top: 20px;
            text-align: right;
        }

        .note {
            margin-top: 10px;
            font-size: 10px;
        }

        @page {
            margin: 15px 60px;
        }
    </style>

</head>

<body>

    <!-- KOP SURAT -->

    <img src="<?= $kopBase64 ?>" class="kop">

    <hr>

    <div class="title">
        BIODATA PRIBADI CALON SANTRI BARU
    </div>

    <table>

        <tr>

            <td width="75%">

                <table>

                    <tr>
                        <td width="5%">1.</td>
                        <td width="35%">NAMA LENGKAP</td>
                        <td width="3%">:</td>
                        <td><?= $student->full_name ?></td>
                    </tr>

                    <tr>
                        <td>2.</td>
                        <td>TEMPAT / TGL LAHIR</td>
                        <td>:</td>
                        <td>
                            <?= $student->birth_place ?>,
                            <?= $student->birth_date ?>
                        </td>
                    </tr>

                    <tr>
                        <td>3.</td>
                        <td>NIK SANTRI</td>
                        <td>:</td>
                        <td><?= $student->student_nik ?></td>
                    </tr>

                    <tr>
                        <td>4.</td>
                        <td>ALAMAT</td>
                        <td>:</td>
                        <td><?= $student->address ?></td>
                    </tr>

                    <tr>
                        <td>5.</td>
                        <td>JENIS KELAMIN</td>
                        <td>:</td>
                        <td><?= $student->gender ?></td>
                    </tr>

                    <tr>
                        <td>6.</td>
                        <td>ANAK YANG KE</td>
                        <td>:</td>
                        <td><?= $student->child_order ?></td>
                    </tr>

                    <tr>
                        <td>7.</td>
                        <td>JUMLAH SAUDARA</td>
                        <td>:</td>
                        <td><?= $student->total_siblings ?></td>
                    </tr>

                    <tr>
                        <td>8.</td>
                        <td>AGAMA</td>
                        <td>:</td>
                        <td><?= $student->religion ?></td>
                    </tr>

                    <tr>
                        <td>9.</td>
                        <td>NO HP ORANG TUA</td>
                        <td>:</td>
                        <td><?= $student->parent_phone ?></td>
                    </tr>

                </table>

            </td>

            <td width="25%" align="right">

                <img src="<?= $photoBase64 ?>" class="photo">

            </td>

        </tr>

    </table>

    <br>

    <strong>10. SEKOLAH ASAL</strong>

    <table>

        <tr>
            <td width="5%"></td>
            <td width="35%">a) NAMA SEKOLAH</td>
            <td width="3%">:</td>
            <td><?= $student->school_name ?></td>
        </tr>

        <tr>
            <td></td>
            <td>b) KELAS</td>
            <td>:</td>
            <td><?= $student->school_class ?></td>
        </tr>

        <tr>
            <td></td>
            <td>c) ALAMAT SEKOLAH</td>
            <td>:</td>
            <td><?= $student->school_address ?></td>
        </tr>

    </table>

    <br>

    <strong>11. ORANG TUA</strong>

    <table>

        <tr>
            <td width="5%"></td>
            <td width="35%">a) NAMA AYAH</td>
            <td width="3%">:</td>
            <td><?= $student->father_name ?></td>
        </tr>

        <tr>
            <td></td>
            <td>b) PEKERJAAN AYAH</td>
            <td>:</td>
            <td><?= $student->father_job ?></td>
        </tr>

        <tr>
            <td></td>
            <td>c) NAMA IBU</td>
            <td>:</td>
            <td><?= $student->mother_name ?></td>
        </tr>

        <tr>
            <td></td>
            <td>d) PEKERJAAN IBU</td>
            <td>:</td>
            <td><?= $student->mother_job ?></td>
        </tr>

        <tr>
            <td></td>
            <td>e) ALAMAT ORANG TUA</td>
            <td>:</td>
            <td><?= $student->parent_address ?></td>
        </tr>

    </table>

    <br>

    <strong>12. NAMA WALI SANTRI</strong>

    <table>

        <tr>
            <td width="5%"></td>
            <td width="35%">a) NAMA WALI</td>
            <td width="3%">:</td>
            <td><?= $student->guardian_name ?></td>
        </tr>

        <tr>
            <td></td>
            <td>b) PEKERJAAN WALI</td>
            <td>:</td>
            <td><?= $student->guardian_job ?></td>
        </tr>

        <tr>
            <td></td>
            <td>c) ALAMAT WALI</td>
            <td>:</td>
            <td><?= $student->guardian_address ?></td>
        </tr>

    </table>

    <div class="signature">

        Cendoro, <?= date('d F Y') ?>

        <br><br><br><br>

        <?= $student->full_name ?>

    </div>

    <div class="note">

        <strong>NB:</strong>

        <ul>
            <li>
                Di lengkapi dengan fotocopy akte kelahiran
                dan kartu keluarga
            </li>

            <li>
                Foto berwarna ukuran 3x4 sebanyak 4 lembar
            </li>

            <li>
                Membayar administrasi pendaftaran Rp 25.000
            </li>
        </ul>

    </div>

</body>

</html>