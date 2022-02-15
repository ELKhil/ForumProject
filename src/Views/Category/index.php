<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require 'C:/laragon/www/php-framework/src/Views/templates/materialize.php';  ?>
    <title>Category</title>
</head>
<body>
<?php  require_once "C:/laragon/www/php-framework/src/Views/templates/navbar.php"; ?>
<div action="/Forum" class="container">
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Titre<th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($threads as $thread) { ?>
            <tr>
                <td><?= $thread->getThreadId(); ?></td>
                <td><a href="/Thread/?id=<?= $thread->getThreadId(); ?>"><?= $thread->getThreadTitle(); ?></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
