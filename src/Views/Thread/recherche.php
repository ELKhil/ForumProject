<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use App\Repositories\Security_UserRepository;

    require 'C:/laragon/www/php-framework/src/Views/templates/materialize.php';  ?>

    <title>message</title>
</head>
<?php  require_once "C:/laragon/www/php-framework/src/Views/templates/navbar.php"; ?>

<div class="center-align">
    <h2>Resultat de recherche</h2>
</div>

<div class="container">
    <div class="row">
        <table>
            <thead>
            <?php if($postsRe) {?>
            <tr>
                <th>Auteur</th>
                <th>Messages</th>
                <th>Date de création</th>

            </tr>
            </thead>

            <tbody>
            <?php foreach( $postsRe as $post){ ?>
                <tr>
                    <?php   $userRepo = new Security_UserRepository();
                    $nomUtilisateur =$userRepo->findByUserId($post->getCreatorId()) ?>
                    <td><?= $nomUtilisateur["user_name"] ?></td>
                    <td><?= $post->getPostContent() ?> </td>
                    <td><?= $post->getCreatedAt()->format('Y-m-d H:i:s') ?> </td>


                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php } else {?>
        <p>Aucun resultat trouvé...</p>
        <?php } ?>
    </div>
</div>
</body>
</html>
















