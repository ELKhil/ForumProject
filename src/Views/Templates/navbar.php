<?php $mot = "";
if(isset($_GET["motRechercher"])){
    if(($_GET["motRechercher"]) != null) {
    $mot = $_GET["motRechercher"];
}
} ?>


<nav class="light-green darken-3">
    <ul>
        <li><a href="/Accueil/index">Accueil</a></li>
        <li><a href="/Forum">Forum</a></li>

        <?php if (!isset($_SESSION["user"]["user_name"])) { ?>
            <li><a href="/User/login">Connexion</a></li>
            <li><a href="/User/register">S'enregistrer</a></li>
        <?php } else { ?>
            <li><a href="/User/showall">Amis</a></li>
            <li><a href="/User/showall">Messages privés</a></li>
            <li><a href="/User/ShowUtilisateurs">Utilisateurs</a></li>
            <li style='color: #06def3; font-weight: bold'><?=$_SESSION["user"]["user_name"]?></li>
            <li><a href="/User/logout">Déconnexion</a></li>
            <?php $id = $_SESSION["user"]["user_id"];

            $userRole = new \App\Repositories\Security_RoleRepository();
            $result=$userRole->findAllByUserId($id); ?>

            <?php if($result){
                if($result[0]['role_id']==4){
                   echo ("<li style='color: gold ; font-weight: bold' >{$result[0]["role_label"]}</li>");

                 }
                    }
                }?>

       <form style="float: right; margin-right: 30px" action="/Recherche" methode = "GET">
            <label for="motRechercher"></label>


           <li><input class="light-green darken-3"style="background:white; height: 20px; " type="text" name="motRechercher" placeholder="Mot Clé" value="<?= $mot?>"></li>

            <li><input class="light-green darken-3" type="submit" value= "Recherche"></li>
        </form>

    </ul>
</nav>
