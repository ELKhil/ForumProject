
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require 'C:/laragon/www/php-framework/src/Views/templates/materialize.php';  ?>

    <title>S'enregister</title>
</head>
<?php  require_once "C:/laragon/www/php-framework/src/Views/templates/navbar.php"; ?>

<div class="center-align">
    <h4>Inscription</h4>
</div>

<div class="container">
<div class="row">
    <form action="/User" method="post" enctype="multipart/form-data" class="col s12">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" required>
                <label for="username">Nom d'utilisateur</label>
            </div>
        </div>
        <div class="row">
                <div class="input-field col s12">
                    <input class="mdl-textfield__input" type="password" name="password" id="password" placeholder="Mot de passe" required>
                    <label for="password">Mot de passe</label>
                </div>
        </div>

        <div class="row">
             <div class="input-field col s12">
                <input class="mdl-textfield__input" type="password" name="passwordVerif" id="passwordVerif"  placeholder="Confirmation mot de passe " required>
                 <label for="passwordVerif">Confirmation mot de passe</label>
             </div>
        </div>

        <div class="row">
                <div class="input-field col s12">
                    <input class="mdl-textfield__input" type="email" name="email" id="email" placeholder="Email">
                    <label for="email">Email</label>
                </div>
        </div>
        <div class="row">
            <input  type="file" name="img"/>
        </div>

        <div>
            <div>
                <button type="submit" class="btn waves-effect waves-light">Valider<i class="material-icons right"></i></button>
            </div>
        </div>
    </form>
</div>
</div>
</body>
</html>

