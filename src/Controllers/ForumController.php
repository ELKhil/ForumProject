<?php

namespace App\Controllers;

use App\Repositories\Security_UserRepository;
use Framework\Attributes\Controller;
use Framework\Attributes\Request;
use Framework\Http\Response;
use App\Repositories\CategoryRepository;

#[Controller(prefix: "/Forum")]

class ForumController
{
    #[Request(method: 'GET', path: ['', '/'])]
    public function listCategories() {

        $catRepo = new CategoryRepository();
        $categoryAll = $catRepo->findAll();

        return Response::send("forum/index",["categories" => $categoryAll]);
    }


    //je récupere les données entrées par l'utilsateur
    #[Request(method: 'POST', path: ['', '/','/login'])]
    public function getSession()
    {


        $userRepo = new Security_UserRepository();

        if (isset($_POST)) {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                if((strlen($_POST['username'])>3) && (trim($_POST['username']))){
                    list("username" => $username, "password" => $password) = $_POST;

                    $user = $userRepo->login($username, $password);
                    if (sizeof($user) > 0) {
                        $_SESSION["user"] = $user;
                        return Response::send("accueil/success");
                    }
                }

            }
        }
        return Response::send("user/login");
    }



}