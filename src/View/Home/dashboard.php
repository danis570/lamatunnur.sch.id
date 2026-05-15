<h1>Dashboard</h1>

<p>
    Welcome,
    <?= $model['user']->name ?>
</p>

<p>
    Role:
    <?= $model['user']->role ?>
</p>

<br>
<br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>

        <?php if ($model['user']->role == 'ADMIN') { ?>
            <th>Action</th>
        <?php } ?>
    </tr>

    <?php foreach ($model['students'] as $student) { ?>

        <tr>
            <td><?= $student->id ?></td>
            <td><?= $student->full_name ?></td>
            <td>
                <?= $student->is_re_registered ?>
            </td>

            <?php if ($model['user']->role == 'ADMIN') { ?>
                <td>
                    <a href="/students/edit/<?= $student->id ?>">
                        Edit
                    </a>

                    <form action="/students/delete" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $student->id ?>">

                        <button type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            <?php } ?>

        </tr>

    <?php } ?>

</table>

<br>
<br>

<?php if ($model['user']->role == 'ADMIN') { ?>

    <a href="/students/export/pdf">Export PDF</a>

    <a href="/students/export/excel">Export Excel</a>

<?php } ?>

<form action="/users/logout" method="post">
    <button type="submit">Logout</button>
</form>