<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require 'C:/laragon/www/php-framework/src/Views/templates/materialize.php';  ?>
    <title>Les utilisateurs</title>
</head>
<body>
<?php  require_once "C:/laragon/www/php-framework/src/Views/templates/navbar.php"; ?>
<div action="/User" class="container">
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Date de creation</th>
            <th>Demande d'amitié</th>
            <?php $id = $_SESSION["user"]["user_id"];

            $userRole = new \App\Repositories\Security_RoleRepository();
            $result=$userRole->findAllByUserId($id);

            if($result){
                if($result[0]['role_id']==4){?>
                    <th>Bannir les utilisateurs </th>
                <?php }
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user->getUserName(); ?></td>
                <td><?= $user->getCreatedAt()->format('Y-m-d H:i:s'); ?></td>
                <td><button type="submit" class="btn waves-effect waves-light">Add as Friend<i class="material-icons right"></i></button></td>

                <?php if($result){
                if($result[0]['role_id']==4){?>
                    <form  action="" method="POST" >
                        <input type="hidden" name="id_bannir" value ="<?= $user->getUserId()?>">
                        <td><button style="background: red"type="submit" class="btn waves-effect waves-light">Bloquer l'utilisateur<i class="material-icons right"></i></button></td>
                    </form>

                <?php }
                }?>

            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>

