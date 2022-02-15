<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require 'C:/laragon/www/php-framework/src/Views/templates/materialize.php';  ?>

    <title>message</title>
</head>
<?php  require_once "C:/laragon/www/php-framework/src/Views/templates/navbar.php"; ?>

<div class="center-align">
    <h4>Poster un message</h4>
</div>

<div class="container">
    <div class="row">
        <form action="" method="post" class="col s12">
            <div class="row">
                <div class="mdl-textfield--align-right-field col s12">
                    <textarea type="text" name="message"  placeholder="Veuillez entrer votre message" required></textarea>

                </div>
            </div>


            <div>
                <div>
                    <button type="submit" class="btn waves-effect waves-light">Enregistrer<i class="material-icons right"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>

