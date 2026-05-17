<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

     <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon/favicon.ico">

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">

    <link rel="manifest" href="/favicon/site.webmanifest">


    <link rel="stylesheet" crossorigin href="./assets/compiled/css/app.css">
    <link rel="stylesheet" crossorigin href="./assets/compiled/css/app-dark.css">
    <link rel="stylesheet" crossorigin href="./assets/compiled/css/iconly.css">
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">

        <?php require __DIR__ . '/../Components/navbar.php' ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard <?= $model['user']->role ?></h3>
            </div>

            <div>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>Hello</p>
                    </div>
                    <div class="float-end">
                        <p>Role: <span class="text-danger"></span>
                            <?= $model['user']->role ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <script src="assets/compiled/js/app.js"></script>



    <!-- Need: Apexcharts -->
    <script src="assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="assets/static/js/pages/dashboard.js"></script>

</body>

</html>