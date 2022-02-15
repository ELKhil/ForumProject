<?php

namespace App\Controllers;

use Framework\Attributes\Controller;
use Framework\Attributes\Request;
use Framework\Http\Response;
use App\Repositories\ThreadRepository;

#[Controller(prefix: "/Category")]
class CategoryController
{
    #[Request(method: 'GET', path: ['', '/'])]

    public function listThreads()
    {
        $threadRepo = new ThreadRepository();
        $threadAll = $threadRepo->findAllByCategoryId($_GET["id"]);
        return Response::send("category/index", ["threads" => $threadAll]);
    }
}

