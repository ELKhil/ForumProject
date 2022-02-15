<?php

namespace App\Controllers;

use App\Repositories\PostRepository;
use Framework\Attributes\Controller;
use Framework\Attributes\Request;
use Framework\Http\Response;


#[Controller(prefix: "/Recherche")]
class RechercheController
{
    #[Request(method: 'GET', path: ['', '/'])]
    public function barDerecherche() {
        if(!empty($_GET["motRechercher"]))   {
            $postRepo = new PostRepository();
            $postsRechercher =$postRepo->rechercheMot($_GET["motRechercher"]);
            return Response::send("thread/recherche",["postsRe" => $postsRechercher]);
        }
        $postsRechercher =null;
        return Response::send("thread/recherche",["postsRe" => $postsRechercher]);
    }
}