
    <div id="app">

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
                                    <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>"
                                        class="form-control" placeholder="Masukkan email">
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"
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
