<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <style>

        @page {
            margin: 15px;
        }

        body {
            font-family: "Times New Roman";
            font-size: 11px;
            line-height: 1.2;
        }

        .page-break {
            page-break-after: always;
        }

    </style>

</head>

<body>

<?php foreach ($students as $index => $student) { ?>

    <?php
        require __DIR__ .
            '/student-biodata.php';
    ?>

    <?php if ($index < count($students) - 1) { ?>

        <div class="page-break"></div>

    <?php } ?>

<?php } ?>

</body>

</html>