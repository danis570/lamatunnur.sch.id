<h1>Login</h1>

<?php if (isset($model['error'])) { ?>
    <p><?= $model['error'] ?></p>
<?php } ?>

<form action="/users/login" method="post">

    <label>Email</label>
    <br>
    <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
    <br>
    <br>

    <label>Password</label>
    <br>
    <input type="password" name="password">
    <br>
    <br>

    <button type="submit">Login</button>

</form>