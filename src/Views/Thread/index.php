
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php use App\Repositories\PostRepository;
    use App\Repositories\Security_UserRepository;

    require 'C:/laragon/www/php-framework/src/Views/Templates/materialize.php';  ?>
    <title>Thread</title>
</head>
<body>
<?php  require_once "C:/laragon/www/php-framework/src/Views/Templates/navbar.php"; ?>
<div action="/Forum" class="container">
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Message</th>
            <th>Auteur</th>
            <th>Date de création</th>
            <th>Date de modification</th>


        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post) { ?>
            <tr>
                <td><?= $post->getPostId(); ?></td>
                <td><?= $post->getPostContent(); ?></td>
                <?php   $userRepo = new Security_UserRepository();
                $nomUtilisateur =$userRepo->findByUserId($post->getCreatorId()) ?>
                <td><?= $nomUtilisateur["user_name"] ?></td>
                <td><?= $post->getCreatedAt()->format('Y-m-d H:i:s'); ?></td>
                <td><?= $post->getUpdatedAt()->format('Y-m-d H:i:s'); ?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <form action="" method="post" class="col s12">
        <tr>

            <?php if (isset($_SESSION["user"]["user_name"])) { ?>
                <th>Poster un message</th>
                <td><textarea type="text" name="message"  placeholder="Veuillez entrer votre message" required></textarea>
                    <button type="submit" >Enregistrer<i class="material-icons right"></i></button></td>
            <?php } else{ ?>
            <th>Connectez vous pour poster un message</th>
            <?php }?>
        </tr>
        </form>
        </tfoot>
    </table>
</div>
</body>
</html>