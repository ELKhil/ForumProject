<?php

namespace App\Controllers;

use App\Repositories\CategoryRepository;
use Framework\Attributes\Controller;
use Framework\Attributes\Request;
use Framework\Http\Response;
use App\Repositories\Security_UserRepository;

#[Controller(prefix: "/User")]
class Security_UserController
{

    #[Request(method: 'GET', path: ['', '/','/register'])]
    public  function showForm() {

        if (isset($_SESSION) && isset($_SESSION["user"])) {
            return Response::send("user/errormessage");
        }else {
            return Response::send("user/register");
        }
    }



     //Méthode d'ajouter un user
    #[Request(method: 'POST', path: ['', '/','/register'])]
    public function addUser() {



        if (!empty($_FILES)) {
            $img = $_FILES["img"];
            var_dump($img["tmp_name"]);
            var_dump($img['name']);
            move_uploaded_file($img['tmp_name'],"images/".$img['name']);
        }
        $userRepo = new Security_UserRepository();
        if (isset($_POST)) {
            if (isset($_POST["username"]) && isset($_POST["password"]) &&
                isset($_POST["passwordVerif"]) && isset($_POST["email"])) {
                list("username" => $username, "password" => $password, "passwordVerif" => $verif, "email" => $email) = $_POST;

                if ($password == $verif) {
                    $inserted = $userRepo->register($username, $password, $email);
                    if (sizeof($inserted) > 0) {
                        return Response::send("user/login");
                    }
                }
            }
        }else{
            return Response::send("user/register");
        }
    }




    #[Request(method: 'GET', path: ['', '/','/login'])]
    public function showLogin() {

        if (isset($_SESSION) && isset($_SESSION["user"])) {
            return Response::send("user/errormessage");
        }

        $userRepo = new Security_UserRepository();
        return Response::send("user/login");
    }



    //Detruire la session :
    #[Request(method: 'GET', path: ['', '/','/logout'])]
    public function logout() {

        //remove all session variables
        session_unset();

        //destroy the session
        session_destroy();
        return Response::send("user/login");
    }


    #[Request(method: 'GET', path: ['', '/','/ShowUtilisateurs'])]
    public function listeALLUsers() {

        $userRepo = new Security_UserRepository();
        $AllUsers = $userRepo->showAllUsers();

        return Response::send("user/ShowUtilisateurs",["users" => $AllUsers]);
    }
    //Méthode bannir un user !!!!! a déplacer
    #[Request(method: 'POST', path: ['/ShowUtilisateurs'])]
    public function bannirUserByID(){
        if(isset($_POST["id_bannir"])){
            $userRepo = new Security_UserRepository();
            $userRepo->bannirById($_POST["id_bannir"]);
            return Response::send("Accueil/index");
        }
    }

}