<h1>Register</h1>

<?php if (isset($model['error'])) { ?>
    <p><?= $model['error'] ?></p>
<?php } ?>


<form action="/users/register" method="post">

    <label>Name</label>
    <br>
    <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>">
    <br>
    <br>

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

    <button type="submit">Register</button>

</form>