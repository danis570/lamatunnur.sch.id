<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>

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
    <div id="app"></div>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">

        <div class="col-md-5 col-sm-8">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <!-- Title -->
                    <h3 class="text-center fw-bold mb-4">
                        Login
                    </h3>

                    <!-- Error -->
                    <?php if (isset($model['error'])) { ?>
                        <div class="alert alert-danger py-2">
                            <?= $model['error'] ?>
                        </div>
                    <?php } ?>

                    <!-- Form -->
                    <form action="/users/login" method="post">

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   value="<?= $_POST['email'] ?? '' ?>"
                                   class="form-control"
                                   placeholder="Masukkan email">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Masukkan password">
                        </div>

                        <!-- Button -->
                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>
</div>
 <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="/assets/compiled/js/app.js"></script>

    <!-- Menggunakan Simple Datatables bawaan default Mazer -->
    <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/static/js/pages/simple-datatables.js"></script>

        

</body>

</html>