<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("posts");
    }

    public function findAllByThreadId($id):array
    {

        $queryStr = "SELECT * FROM $this->tableName WHERE thread_id = :id";
        $query = $this->connexion->prepare($queryStr);

        $query->execute(array(
            ":id" => $id
        ));

        $objs = $query->fetchAll(\PDO::FETCH_ASSOC);
        $postAll = [];
        foreach ($objs as $obj){
            $post_id = $obj["post_id"];
            $post_content = $obj["post_content"];
            $creator_id = $obj["creator_id"];
            if ($obj["receiver_id"] != null) {
                $receiver_id = $obj["receiver_id"];
            }else{
                $receiver_id = 0;
            }
            $thread_id = $obj["thread_id"];
            $active = $obj["active"];
            $createdAt = \DateTime::createFromFormat("Y-m-d",$obj["createdAt"]);
            $updatedAt = \DateTime::createFromFormat("Y-m-d",$obj["updatedAt"]);
            $post = new Post($post_id, $post_content, $creator_id, $receiver_id, $thread_id, $active, $createdAt, $updatedAt);
            $postAll[] = $post;
        }
        return $postAll;

    }
    public function posterMessage($message){
        $queryStr = "INSERT INTO $this->tableName(post_content, creator_id, receiver_id, thread_id, createdAt, updatedAt) VALUES
            (:message, :creator, :receive, :thread, NOW(), NOW())";
        $query = $this->connexion->prepare($queryStr);


        if ($query !== false) {
            $query->execute([
                ":message" => $message,
                ":creator" => $_SESSION["user"]["user_id"],
                ":receive" => 6,
                ":thread" => $_GET['id']

            ]);
        }
    }

   public function rechercheMot($id){
       $queryStr = "SELECT * FROM $this->tableName WHERE post_content like CONCAT('%', :id, '%')";
       $query = $this->connexion->prepare($queryStr);

       if($query !== false){
           $query->execute(array(
               ":id" => $id
           ));

           $objs =$query->fetchAll(\PDO::FETCH_ASSOC);
           $postAll =[];
           foreach ($objs as $obj){
               $post_id = $obj["post_id"];
               $post_content = $obj["post_content"];
               $creator_id = $obj["creator_id"];
               $receive_id = $obj["receiver_id"];
               $thread_id =$obj["thread_id"];
               $active = $obj["active"];
               $createdAt = \DateTime::createFromFormat("Y-m-d",$obj["createdAt"]);
               $updatedAt = \DateTime::createFromFormat("Y-m-d",$obj["updatedAt"]);
               $post = new Post($post_id, $post_content, $creator_id,$receive_id,$thread_id, $active, $createdAt, $updatedAt);
               $postAll[] = $post;
           }
           return $postAll;
       }


   }


}