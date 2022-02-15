<?php

namespace App\Controllers;

use Framework\Attributes\Controller;
use Framework\Attributes\Request;
use Framework\Http\Response;
use App\Repositories\PostRepository;


#[Controller(prefix: "/Thread")]

class ThreadController
{
            #[Request(method: 'GET', path: ['', '/'])]
            public function listThreads() {
                $postRepo = new PostRepository();
                $postAll = $postRepo->findAllByThreadId($_GET["id"]);
                return Response::send("thread/index", ["posts" => $postAll]);
            }

    #[Request(method: 'POST', path: ['','/','/poster'])]
    public function posterMessage(){
        $postRepo = new PostRepository();
        if(isset($_POST)) {
            if(isset($_POST["message"]) && (trim($_POST['message']))){

                $message= $_POST["message"];
                $postRepo->posterMessage($message);
                $postAll = $postRepo->findAllByThreadId($_GET["id"]);
            }
        }

        return Response::send("thread/index", ["posts" => $postAll]);
            }


}