<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require 'C:/laragon/www/php-framework/src/Views/templates/materialize.php';  ?>
    <title>Forum - Framework</title>
</head>
<body>
<?php  require_once "C:/laragon/www/php-framework/src/Views/templates/navbar.php"; ?>
<div action="/Forum" class="container">
    <table>
        <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date de création</th>
                    </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category) { ?>
            <tr>
                <td><?= $category->getCategoryId(); ?></td>
                <td><a href="/Category/?id=<?= $category->getCategoryId(); ?>"><?= $category->getCategoryTitle(); ?></a></td>
                <td><?= $category->getCategoryDesc(); ?></td>
                <td><?= $category->getCreatedAt()->format('Y-m-d H:i:s')?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>

